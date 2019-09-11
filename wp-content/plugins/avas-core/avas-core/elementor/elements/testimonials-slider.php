<?php
namespace Elementor;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


class BDDEX_Testimonials_Slider_Widget extends Widget_Base {

    public function get_name() {
        return 'lae-testimonials-slider';
    }

    public function get_title() {
        return esc_html__('Avas Testimonials Slider', 'avas-core');
    }

    public function get_icon() {
        return 'eicon-blockquote';
    }

    public function get_categories() {
        return array('bddex');
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_testimonials_slider',
            [
                'label' => esc_html__('Testimonials Slider', 'avas-core'),
            ]
        );

        $this->add_control(
            'testimonials',
            [
                'label' => esc_html__('Testimonials', 'avas-core'),
                'type' => Controls_Manager::REPEATER,
                'default' => [
                    [
                        'client_name' => esc_html__('Leona Lopez', 'avas-core'),
                        'credentials' => esc_html__('Envato', 'avas-core'),
                        'testimonial_text' => esc_html__('I am testimonial text. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'avas-core'),
                    ],
                    [
                        'client_name' => esc_html__('John Smith', 'avas-core'),
                        'credentials' => esc_html__('Themeforest', 'avas-core'),
                        'testimonial_text' => esc_html__('I am testimonial text. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'avas-core'),
                    ],
                    [
                        'client_name' => esc_html__('Liza Doe', 'avas-core'),
                        'credentials' => esc_html__('Theme X', 'avas-core'),
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
                        'description' => esc_html__('The details of the client/customer like company name, position held, company URL etc. HTML accepted.', 'avas-core'),
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
                        'default' => esc_html__( 'I am testimonial text. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'avas-core' ),
                        'show_label' => false,
                    ],

                ],
              //  'title_field' => '{{{ client_name }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_settings',
            [
                'label' => esc_html__('Slider Settings', 'avas-core'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $this->add_control(
            'slide_animation',
            [
                'label' => esc_html__('Animation', 'avas-core'),
                'type' => Controls_Manager::SELECT,
                'default' => 'slide',
                'options' => [
                    'slide' => esc_html__('Slide', 'avas-core'),
                    'fade' => esc_html__('Fade', 'avas-core'),
                ],
            ]
        );

        $this->add_control(
            'direction',
            [
                'label' => esc_html__('Direction', 'avas-core'),
                'type' => Controls_Manager::SELECT,
                'default' => 'horizontal',
                'options' => [
                    'horizontal' => esc_html__('Horizontal', 'avas-core'),
                    'vertical' => esc_html__('Vertical', 'avas-core'),
                ],
            ]
        );

        $this->add_control(
            'slideshow_speed',
            [
                'label' => esc_html__('Slideshow Speed', 'avas-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 5000,
            ]
        );


        $this->add_control(
            'animation_speed',
            [
                'label' => esc_html__('Animation Speed', 'avas-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 600,
            ]
        );

        $this->add_control(
            'pause_on_hover',
            [
                'type' => Controls_Manager::SWITCHER,
                'label_off' => esc_html__('No', 'avas-core'),
                'label_on' => esc_html__('Yes', 'avas-core'),
                'return_value' => 'yes',
                'separator' => 'before',
                'default' => 'yes',
                'label' => esc_html__('Pause on Hover?', 'avas-core'),
                'description' => esc_html__('Should the slider pause on mouse hover over the slider.', 'avas-core'),
            ]
        );

        $this->add_control(
            'pause_on_action',
            [
                'type' => Controls_Manager::SWITCHER,
                'label_off' => esc_html__('No', 'avas-core'),
                'label_on' => esc_html__('Yes', 'avas-core'),
                'return_value' => 'yes',
                'default' => 'no',
                'label' => esc_html__('Pause slider on action?', 'avas-core'),
                'description' => esc_html__('Should the slideshow pause once user initiates an action using navigation/direction controls.', 'avas-core'),
            ]
        );

        $this->add_control(
            'direction_nav',
            [
                'type' => Controls_Manager::SWITCHER,
                'label_off' => esc_html__('No', 'avas-core'),
                'label_on' => esc_html__('Yes', 'avas-core'),
                'return_value' => 'yes',
                'separator' => 'before',
                'default' => 'yes',
                'label' => esc_html__('Direction Navigation?', 'avas-core'),
                'description' => esc_html__('Should the slider have direction navigation?', 'avas-core'),
            ]
        );


        $this->add_control(
            'control_nav',
            [
                'type' => Controls_Manager::SWITCHER,
                'label_off' => esc_html__('No', 'avas-core'),
                'label_on' => esc_html__('Yes', 'avas-core'),
                'return_value' => 'yes',
                'default' => 'no',
                'label' => esc_html__('Navigation Controls?', 'avas-core'),
                'description' => esc_html__('Should the slider have navigation controls?', 'avas-core'),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_testimonials_thumbnail',
            [
                'label' => esc_html__('Author Thumbnail', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
                'show_label' => false,
            ]
        );

        $this->add_control(
            'thumbnail_border_radius',
            [
                'label' => esc_html__('Author Thumbnail Border Radius', 'avas-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .lae-testimonials-slider .lae-testimonial-user .lae-image-wrapper img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'thumbnail_size',
            [
                'label' => esc_html__('Author Thumbnail Size', 'avas-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['%', 'px'],
                'range' => [
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 50,
                        'max' => 300,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .lae-testimonials-slider .lae-testimonial-user .lae-image-wrapper img' => 'max-width: {{SIZE}}{{UNIT}};',
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

        $this->add_control(
            'text_color',
            [
                'label' => esc_html__('Color', 'avas-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-testimonials-slider .lae-testimonial-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'text_typography',
                'selector' => '{{WRAPPER}} .lae-testimonials-slider .lae-testimonial-text',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_testimonials_author_name',
            [
                'label' => esc_html__('Author Name', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_control(
            'title_tag',
            [
                'label' => esc_html__('Title HTML Tag', 'avas-core'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => esc_html__('H1', 'avas-core'),
                    'h2' => esc_html__('H2', 'avas-core'),
                    'h3' => esc_html__('H3', 'avas-core'),
                    'h4' => esc_html__('H4', 'avas-core'),
                    'h5' => esc_html__('H5', 'avas-core'),
                    'h6' => esc_html__('H6', 'avas-core'),
                    'div' => esc_html__('div', 'avas-core'),
                ],
                'default' => 'h4',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Color', 'avas-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-testimonials-slider .lae-testimonial-user .lae-text .lae-author-name' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .lae-testimonials-slider .lae-testimonial-user .lae-text .lae-author-name',
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
                'label' => esc_html__('Color', 'avas-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-testimonials-slider .lae-testimonial-user .lae-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'credential_typography',
                'selector' => '{{WRAPPER}} .lae-testimonials-slider .lae-testimonial-user .lae-text',
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_quote_icon_styling',
            [
                'label' => esc_html__('Quote Icon', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'quote_icon_size',
            [
                'label' => esc_html__('Icon size in pixels', 'avas-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 128,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .lae-testimonials-slider .lae-testimonial-text i' => 'font-size: {{SIZE}}{{UNIT}};'
                ],
            ]
        );

        $this->add_control(
            'quote_icon_color',
            [
                'label' => esc_html__('Icon Color', 'avas-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .lae-testimonials-slider .lae-testimonial-text i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


    }

    protected function render() {

        $settings = $this->get_settings();

        $slider_options = [
            'slide_animation' => $settings['slide_animation'],
            'direction' => $settings['direction'],
            'slideshow_speed' => absint($settings['slideshow_speed']),
            'animation_speed' => absint($settings['animation_speed']),
            'control_nav' => ('yes' === $settings['control_nav']),
            'direction_nav' => ('yes' === $settings['direction_nav']),
            'pause_on_hover' => ('yes' === $settings['pause_on_hover']),
            'pause_on_action' => ('yes' === $settings['pause_on_action'])
        ];
        ?>

        <div class="lae-testimonials-slider lae-flexslider lae-container"
             data-settings='<?php echo wp_json_encode($slider_options); ?>'>

            <div class="lae-slides">

                <?php foreach ($settings['testimonials'] as $testimonial) : ?>

                <div class="lae-slide lae-testimonial-wrapper">

                    <div class="lae-testimonial">

                        <div class="lae-testimonial-text">

                            <i class="lae-icon-quote"></i>

                            <?php echo $this->parse_text_editor($testimonial['testimonial_text']); ?>

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

            </div>

            <?php endforeach; ?>

        </div>

        </div>

        <?php
    }

    protected function content_template() {
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new BDDEX_Testimonials_Slider_Widget() );