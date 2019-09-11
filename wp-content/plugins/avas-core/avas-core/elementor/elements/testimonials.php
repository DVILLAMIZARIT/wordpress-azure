<?php


namespace Elementor;


if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


class BDDEX_Testimonials_Widget extends Widget_Base {

    public function get_name() {
        return 'lae-testimonials';
    }

    public function get_title() {
        return esc_html__('Avas Testimonials', 'avas-core');
    }

    public function get_icon() {
        return 'fa fa-comments-o';
    }

    public function get_categories() {
        return array('bddex');
    }

    public function get_script_depends() {
        return [
            'lae-widgets-scripts',
            'lae-frontend-scripts'
        ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_testimonials',
            [
                'label' => esc_html__('Testimonials', 'avas-core'),
            ]
        );
        
        $this->add_control(
            'per_line',
            [
                'label' => esc_html__('Columns per row', 'avas-core'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 5,
                'step' => 1,
                'default' => 3,
            ]
        );


        $this->add_control(
            'testimonials',
            [
                'label' => esc_html__('Testimonials', 'avas-core'),
                'type' => Controls_Manager::REPEATER,
                'separator' => 'before',
                'default' => [
                    [
                        'client_name' => esc_html__('Customer #1', 'avas-core'),
                        'credentials' => esc_html__('Envato.', 'avas-core'),
                        'testimonial_text' => esc_html__('I am testimonial text. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'avas-core'),
                    ],
                    [
                        'client_name' => esc_html__('Customer #2', 'avas-core'),
                        'credentials' => esc_html__('Theme X', 'avas-core'),
                        'testimonial_text' => esc_html__('I am testimonial text. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'avas-core'),
                    ],
                    [
                        'client_name' => esc_html__('Customer #3', 'avas-core'),
                        'credentials' => esc_html__('Themeforest', 'avas-core'),
                        'testimonial_text' => esc_html__('I am testimonial text. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'avas-core'),
                    ],
                ],
                'fields' => [
                    [
                        'name' => 'client_name',
                        'label' => esc_html__('Name', 'avas-core'),
                        'type' => Controls_Manager::TEXT,
                        'description' => esc_html__('The client or customer name for the testimonial', 'avas-core'),
                    ],
                    [
                        'name' => 'credentials',
                        'label' => esc_html__('Client Details', 'avas-core'),
                        'type' => Controls_Manager::TEXT,
                        'description' => esc_html__('The details of the client/customer like company name, credential held, company URL etc. HTML accepted.', 'avas-core'),
                    ],

                    [
                        'name' => 'client_image',
                        'label' => esc_html__('Customer/Client Image', 'avas-core'),
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'label_block' => true,
                    ],

                    [
                        'name' => 'testimonial_text',
                        'label' => esc_html__('Testimonials Text', 'avas-core'),
                        'type' => Controls_Manager::WYSIWYG,
                        'description' => esc_html__('What your customer/client had to say', 'avas-core'),
                        'show_label' => false,
                    ],
                    
                    [
                        "type" => Controls_Manager::SELECT,
                        "name" => "widget_animation",
                        "label" => esc_html__("Animation Type", "avas-core"),
                     //   'options' => bddex_get_animation_options(),
                        'default' => 'none',
                    ],
                    
                ],
             //   'title_field' => '{{{ client_name }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_testimonials_thumbnail',
            [
                'label' => esc_html__( 'Author Thumbnail', 'avas-core-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'show_label' => false,
            ]
        );

        $this->add_control(
            'thumbnail_border_radius',
            [
                'label' => esc_html__('Thumbnail Border Radius', 'avas-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .lae-testimonials .lae-testimonial-user .lae-image-wrapper img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_control(
            'thumbnail_size',
            [
                'label' => esc_html__('Thumbnail Size', 'avas-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ '%', 'px' ],
                'range' => [
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 50,
                        'max' => 156,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .lae-testimonials .lae-testimonial-user .lae-image-wrapper img' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_testimonials_text',
            [
                'label' => esc_html__('Author Testimonial', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_responsive_control(
            'text_padding',
            [
                'label' => esc_html__('Text Padding', 'avas-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .lae-testimonials .lae-testimonial-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'isLinked' => false,
            ]
        );
        $this->add_control(
            'bg_color',
            [
                'label' => esc_html__( 'Background Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-testimonials .lae-testimonial-text,.lae-testimonials .lae-testimonial-text:after' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'text_color',
            [
                'label' => esc_html__( 'Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-testimonials .lae-testimonial-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'text_border_color',
            [
                'label' => esc_html__( 'Border Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-testimonials .lae-testimonial-text, {{WRAPPER}} .lae-testimonials .lae-testimonial-text:after' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'text_border_width',
            [
                'label' => esc_html__( 'Border Width', 'avas-core' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 5,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .lae-testimonials .lae-testimonial-text, {{WRAPPER}} .lae-testimonials .lae-testimonial-text:after' => 'border-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'text_typography',
                'selector' => '{{WRAPPER}} .lae-testimonials .lae-testimonial-text',
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_testimonials_author_name',
            [
                'label' => esc_html__( 'Author Name', 'avas-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => esc_html__( 'Title HTML Tag', 'avas-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => esc_html__( 'H1', 'avas-core' ),
                    'h2' => esc_html__( 'H2', 'avas-core' ),
                    'h3' => esc_html__( 'H3', 'avas-core' ),
                    'h4' => esc_html__( 'H4', 'avas-core' ),
                    'h5' => esc_html__( 'H5', 'avas-core' ),
                    'h6' => esc_html__( 'H6', 'avas-core' ),
                    'div' => esc_html__( 'div', 'avas-core' ),
                ],
                'default' => 'h4',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-testimonials .lae-testimonial-user .lae-text .lae-author-name' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .lae-testimonials .lae-testimonial-user .lae-text .lae-author-name',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_testimonials_author_credentials',
            [
                'label' => esc_html__('Author Credentials', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'credential_color',
            [
                'label' => esc_html__( 'Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-testimonials .lae-testimonial-user .lae-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'credential_typography',
                'selector' => '{{WRAPPER}} .lae-testimonials .lae-testimonial-user .lae-text',
            ]
        );


        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings();
        ?>

        <?php $column_style = bddex_get_column_class(intval($settings['per_line'])); ?>

        <div class="lae-testimonials lae-container">

            <?php foreach ($settings['testimonials'] as $testimonial) : ?>

                <?php list($animate_class, $animation_attr) = bddex_get_animation_atts($testimonial['widget_animation']); ?>

                <div class="lae-testimonial <?php echo $column_style; ?> <?php echo $animate_class; ?>" <?php echo $animation_attr; ?>>

                    <div class="lae-testimonial-text">
                        
                        <?php echo $this->parse_text_editor($testimonial['testimonial_text']) ?>
                        
                    </div>

                    <div class="lae-testimonial-user">

                        <div class="lae-image-wrapper">

                            <?php $client_image = $testimonial['client_image']; ?>

                            <?php if (!empty($client_image)): ?>

                                <?php echo wp_get_attachment_image($client_image['id'], 'thumbnail', false, array('class' => 'lae-image full')); ?>

                            <?php endif; ?>
                            
                        </div>

                        <div class="lae-text">
                            
                            <<?php echo $settings['title_tag']; ?> class="lae-author-name"><?php echo esc_html($testimonial['client_name']) ?></<?php echo $settings['title_tag']; ?>>
                            
                            <div class="lae-author-credentials"><?php echo wp_kses_post($testimonial['credentials']); ?></div>
                            
                        </div>

                    </div>

                </div>

                <?php

            endforeach;

            ?>

        </div>

        <div class="lae-clear"></div>

        <?php
    }

    protected function content_template() {
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new BDDEX_Testimonials_Widget() );