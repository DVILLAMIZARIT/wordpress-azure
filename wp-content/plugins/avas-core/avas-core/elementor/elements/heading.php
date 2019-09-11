<?php


namespace Elementor;


if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


class BDDEX_Heading_Widget extends Widget_Base {

    public function get_name() {
        return 'lae-heading';
    }

    public function get_title() {
        return __('Avas Heading', 'avas-core');
    }

    public function get_icon() {
        return 'eicon-text-area';
    }

    public function get_categories() {
        return array('bddex');
    }

    public function get_script_depends() {
        return [
            'lae-widgets-scripts',
            'lae-frontend-scripts',
            'waypoints'
        ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_heading',
            [
                'label' => __('Avas Heading', 'avas-core'),
            ]
        );


        $this->add_control(

            'style', [
                'type' => Controls_Manager::SELECT,
                'label' => __('Choose Style', 'avas-core'),
                'default' => 'style1',
                'options' => [
                    'style1' => __('Style 1', 'avas-core'),
                    'style2' => __('Style 2', 'avas-core'),
                    'style3' => __('Style 3', 'avas-core'),
                ],
            ]
        );

        $this->add_control(
            'heading',
            [
                'type' => Controls_Manager::TEXT,
                'label' => __('Heading Title', 'avas-core'),
                'label_block' => true,
                'separator' => 'before',
                'default' => __('Heading Title', 'avas-core'),
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'type' => Controls_Manager::TEXT,
                'label' => __('Subheading', 'avas-core'),
                'label_block' => true,
                'description' => __('A subtitle displayed above the title heading.', 'avas-core'),
                'condition' => [
                    'style' => 'style2',
                ],
            ]
        );

        $this->add_control(
            'short_text',
            [
                'type' => 'textarea',
                'label' => __('Short Text', 'avas-core'),
                'description' => __('Short text generally displayed below the heading title.', 'avas-core'),
                'condition' => [
                    'style' => ['style1', 'style2']
                ],
            ]
        );

        $this->add_control(
            'heading_settings',
            [
                'label' => __( 'Settings', 'avas-core' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'align',
            [
                'label' => __('Alignment', 'avas-core'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'avas-core'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'avas-core'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'avas-core'),
                        'icon' => 'fa fa-align-right',
                    ],
                    'justify' => [
                        'title' => __('Justified', 'avas-core'),
                        'icon' => 'fa fa-align-justify',
                    ],
                ],
                'default' => 'center',
            ]
        );

          $this->add_control(
             'widget_animation',
             [
                 "type" => Controls_Manager::SELECT,
                 "label" => __("Animation Type", "avas-core"),
           //      'options' => bddex_get_animation_options(),
                 'default' => 'none',
        ]
         ); 

        $this->end_controls_section();


        $this->start_controls_section(
            'section_styling',
            [
                'label' => __('Title', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => __( 'Title HTML Tag', 'avas-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => __( 'H1', 'avas-core' ),
                    'h2' => __( 'H2', 'avas-core' ),
                    'h3' => __( 'H3', 'avas-core' ),
                    'h4' => __( 'H4', 'avas-core' ),
                    'h5' => __( 'H5', 'avas-core' ),
                    'h6' => __( 'H6', 'avas-core' ),
                    'div' => __( 'div', 'avas-core' ),
                ],
                'default' => 'h3',
            ]
        );

        $this->add_control(
            'heading_color',
            [
                'label' => __('Heading Color', 'avas-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .lae-heading .lae-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'heading_typography',
                'label' => __('Typography', 'avas-core'),
                'selector' => '{{WRAPPER}} .lae-heading .lae-title',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'section_subtitle',
            [
                'label' => __('Subtitle', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __( 'Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-heading .lae-subtitle' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'selector' => '{{WRAPPER}} .lae-heading .lae-subtitle',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'section_short_text',
            [
                'label' => __('Short Text', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label' => __( 'Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-heading .lae-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'text_typography',
                'selector' => '{{WRAPPER}} .lae-heading .lae-text',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings();

        ?>

   <!--      <?php list($animate_class, $animation_attr) = bddex_get_animation_atts($settings['widget_animation']); ?> -->

        <div class="lae-heading lae-<?php echo $settings['style']; ?> lae-align<?php echo $settings['align']; ?><?php echo $animate_class; ?>" <?php echo $animation_attr; ?>>

            <?php if ($settings['style'] == 'style2' && !empty($settings['subtitle'])): ?>

                <div class="lae-subtitle"><?php echo esc_html($settings['subtitle']); ?></div>

            <?php endif; ?>

            <<?php echo esc_html($settings['title_tag']); ?> class="lae-title"><?php echo wp_kses_post($settings['heading']); ?></<?php echo esc_html($settings['title_tag']); ?>>

            <?php if ($settings['style'] != 'style3' && !empty($settings['short_text'])): ?>

                <p class="lae-text"><?php echo wp_kses_post($settings['short_text']); ?></p>

            <?php endif; ?>

        </div>

        <?php
    }

    protected function content_template() {
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new BDDEX_Heading_Widget() );