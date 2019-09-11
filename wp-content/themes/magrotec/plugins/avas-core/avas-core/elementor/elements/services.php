<?php
namespace Elementor;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class BDDEX_Services_Widget extends Widget_Base {
    public function get_name() {
        return 'lae-services';
    }
    public function get_title() {
        return __('Avas Services', 'avas-core');
    }
    public function get_icon() {
        return 'fa fa-clone';
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
            'section_services',
            [
                'label' => __('Services', 'avas-core'),
            ]
        );
        $this->add_control(
            'style',
            [
                'type' => Controls_Manager::SELECT,
                'label' => __('Choose Style', 'avas-core'),
                'default' => 'style1',
                'options' => [
                    'style1' => __('Style 1', 'avas-core'),
                    'style2' => __('Style 2', 'avas-core'),
                    'style3' => __('Style 3', 'avas-core'),
                    'style4' => __('Style 4', 'avas-core'),
                    'style5' => __('Style 5', 'avas-core'),
                    'style6' => __('Style 6', 'avas-core'),
                ],
                'prefix_class' => 'lae-services-',
            ]
        );
        $this->add_control(
            'per_line',
            [
                'label' => __('Columns per row', 'avas-core'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 5,
                'step' => 1,
                'default' => 3,
            ]
        );
        $this->add_control(
            'services',
            [
                'type' => Controls_Manager::REPEATER,
                'default' => [
                    [
                        'service_title' => __('Web Design', 'avas-core'),
                        'icon_type' => 'icon',
                        'icon' => 'fa fa-bell-o',
                        'service_excerpt' => 'Curabitur ligula sapien tincidunt non euismod vitae, posuere imperdiet leo. Donec venenatis vulputate lorem. In hac habitasse aliquam.',
                    ],
                    [
                        'service_title' => __('SEO Services', 'avas-core'),
                        'icon_type' => 'icon',
                        'icon' => 'fa fa-laptop',
                        'service_excerpt' => 'Suspendisse nisl elit rhoncus eget elementum acian condimentum eget diam. Phasellus nec sem in justo pellentesque facilisis platea.',
                    ],
                    [
                        'service_title' => __('Brand Marketing', 'avas-core'),
                        'icon_type' => 'icon',
                        'icon' => 'fa fa-toggle-off',
                        'service_excerpt' => 'Nunc egestas augue at pellentesque laoreet felis eros vehicula leo ater malesuada velit leo quis pede. Etiam ut purus mattis mauris.',
                    ],
                ],
                'fields' => [
                    [
                        'name' => 'service_title',
                        'label' => __('Service Title', 'avas-core'),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __('My service title', 'avas-core'),
                    ],
                    [
                        'name' => 'icon_type',
                        'label' => __('Icon Type', 'avas-core'),
                        'type' => Controls_Manager::SELECT,
                        'default' => 'icon',
                        'options' => [
                            'none' => __('None', 'avas-core'),
                            'icon' => __('Icon', 'avas-core'),
                            'icon_image' => __('Icon Image', 'avas-core'),
                        ],
                    ],
                    [
                        'name' => 'icon_image',
                        'label' => __('Service Image', 'avas-core'),
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'label_block' => true,
                        'condition' => [
                            'icon_type' => 'icon_image',
                        ],
                    ],
                    [
                        'name' => 'icon',
                        'label' => __('Service Icon', 'avas-core'),
                        'type' => Controls_Manager::ICON,
                        'label_block' => true,
                        'default' => '',
                        'condition' => [
                            'icon_type' => 'icon',
                        ],
                    ],
                    [
                        'name' => 'service_excerpt',
                        'label' => __('Service description', 'avas-core'),
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => __('Service description goes here', 'avas-core'),
                        'label_block' => true,
                    ],
                    [
                        "type" => Controls_Manager::SELECT,
                        "name" => "widget_button",
                        "label" => __("Button", "avas-core"),
                        'options' => [
                            'btn_no' => __('No', 'avas-core'),
                            'btn_yes' => __('Yes', 'avas-core'),
                        ],
                        'default' => 'btn_no',
                    ],
                    [
                        'name'  => 'btn_text',
                        'label' => __('Button Text', 'avas-core'),
                        'type'  => Controls_Manager::TEXT,
                        'default' => __( 'Read More', 'avas-core' ),
                        'condition' => [
                            'widget_button' => 'btn_yes',
                        ],
                    ],
                    [
                        'name'  => 'btn_link',
                        'label' => __( 'Link', 'avas-core' ),
                        'type'  => Controls_Manager::URL,
                        'placeholder' => 'https://www.your-link.com',
                        'default'     => [
                            'url' => '#',
                        ],
                        'condition' => [
                            'widget_button' => 'btn_yes',
                        ],
                    ],

                ],
    
                'title_field' => '{{{ service_title }}}',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_service_title',
            [
                'label' => __('Service Title', 'avas-core'),
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
            'title_color',
            [
                'label' => __( 'Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-services .lae-service .lae-service-text .lae-title' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .lae-services .lae-service .lae-service-text .lae-title',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_service_text',
            [
                'label' => __('Service Text', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'text_color',
            [
                'label' => __( 'Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-services .lae-service .lae-service-text .lae-service-details' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'text_typography',
                'selector' => '{{WRAPPER}} .lae-services .lae-service .lae-service-text .lae-service-details',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_service_icon',
            [
                'label' => __('Service Icons', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'icon_size',
            [
                'label' => __('Icon or Icon Image size in pixels', 'avas-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em' ],
                'range' => [
                    'px' => [
                        'min' => 6,
                        'max' => 300,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .lae-services .lae-service .lae-image-wrapper img' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .lae-services .lae-service .lae-icon-wrapper span' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'icon_color',
            [
                'label' => __('Icon Custom Color', 'avas-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-services .lae-service .lae-icon-wrapper span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'hover_color',
            [
                'label' => __('Icon Hover Color', 'avas-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-services .lae-service .lae-icon-wrapper span:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
             'section_service_button',
            [
                'label' => __('Service Button', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typography',
                'selector' => '{{WRAPPER}} .service_btns a',
            ]
        );
            $this->add_control(
                    'btn_alignment',
                    [   
                    'label'             => __( 'Button Alignment', 'avas-core' ),
                    'type'              => Controls_Manager::CHOOSE,
                    'options'           => [
                    'left'      => [
                        'title' => __( 'Left', 'avas-core' ),
                        'icon'  => 'fa fa-align-left',
                    ],
                    'center'    => [
                        'title' => __( 'Center', 'avas-core' ),
                        'icon'  => 'fa fa-align-center',
                    ],
                    'right'     => [
                        'title' => __( 'Right', 'avas-core' ),
                        'icon'  => 'fa fa-align-right',
                    ],
                    
                ],
                'default'           => 'center',
                'selectors'         => [
                    '{{WRAPPER}} .service_btns'   => 'text-align: {{VALUE}};',
                ],

            ]
           );

        $this->start_controls_tabs( 'tabs_link_style' );
            $this->start_controls_tab(
            'tab_link_normal',
            [
                'label'             => __( 'Normal', 'avas-core' ),
            ]
        );

        $this->add_control(
            'link_color_normal',
            [
                'label'             => __( 'Text Color', 'avas-core' ),
                'type'              => Controls_Manager::COLOR,
                'default'           => '',
                'selectors'         => [
                    '{{WRAPPER}} .service_btns a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'background_color_normal',
            [
                'label'             => __( 'Background Color', 'avas-core' ),
                'type'              => Controls_Manager::COLOR,
                'default'           => '',
                'selectors'         => [
                    '{{WRAPPER}} .service_btns a' => 'background-color: {{VALUE}};',
                ],
            ]
        );
            $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'placeholder' => '1px',
                'default' => '1px',
                'selector' => '{{WRAPPER}} .service_btns a',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'border_radius',
            [
                'label' => __( 'Border Radius', 'avas-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .service_btns a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .service_btns a',
            ]
        );

        $this->add_responsive_control(
            'text_padding',
            [
                'label' => __( 'Padding', 'avas-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .service_btns a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'text_margin',
            [
                'label' => __( 'Margin', 'avas-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .service_btns' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_link_hover',
            [
                'label'             => __( 'Hover', 'avas-core' ),
            ]
        );

        $this->add_control(
            'link_color_hover',
            [
                'label'             => __( 'Text Color', 'avas-core' ),
                'type'              => Controls_Manager::COLOR,
                'default'           => '',
                'selectors'         => [
                    '{{WRAPPER}} .service_btns a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'background_color_hover',
            [
                'label'             => __( 'Background Color', 'avas-core' ),
                'type'              => Controls_Manager::COLOR,
                'default'           => '',
                'selectors'         => [
                    '{{WRAPPER}} .service_btns a:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'border_color_hover',
            [
                'label'             => __( 'Border Color', 'avas-core' ),
                'type'              => Controls_Manager::COLOR,
                'default'           => '',
                'selectors'         => [
                    '{{WRAPPER}} .service_btns a:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_tab();           
        $this->end_controls_section();
       
    }
    protected function render() {
        $settings = $this->get_settings();
        ?>
        <?php $column_style = bddex_get_column_class(intval($settings['per_line'])); ?>
        <div class="lae-services lae-<?php echo $settings['style']; ?> lae-container">
            <?php foreach ($settings['services'] as $service): ?>
                <div class="lae-service-wrapper <?php echo $column_style; ?>">
                    <div class="lae-service">
                        <?php if ($service['icon_type'] == 'icon_image') : ?>
                            <?php $icon_image = $service['icon_image']; ?>
                            <?php if (!empty($icon_image)): ?>
                                <div class="lae-image-wrapper">
                                    <?php echo wp_get_attachment_image($icon_image['id'], 'full', false, array('class' => 'lae-image full')); ?>
                                </div>
                            <?php endif; ?>
                        <?php elseif ($service['icon_type'] == 'icon') : ?>
                            <div class="lae-icon-wrapper">
                                <span class="<?php echo esc_attr($service['icon']); ?>"></span>
                            </div>
                        <?php endif; ?>
                        <div class="lae-service-text">
                            <<?php echo $settings['title_tag']; ?> class="lae-title"><?php echo esc_html($service['service_title']) ?></<?php echo $settings['title_tag']; ?>>
                            <div class="lae-service-details"><?php echo do_shortcode(wp_kses_post($service['service_excerpt'])); ?></div>
                        </div>
                        <!-- button start -->
                        <?php if($service['widget_button'] == 'btn_yes') : ?>
                        <div class="service_btns">
                        <?php 
                        if($service['btn_link']['is_external']) { ?>
                        <a href="<?php echo $service['btn_link']['url']; ?>" target="_blank"><?php echo $service['btn_text']; ?></a>
                            <?php 
                                }else{ ?>
                        <a href="<?php echo $service['btn_link']['url']; ?>"><?php echo $service['btn_text']; ?></a>
                         <?php   } ?>
                        </div><!-- button end -->
                        <?php endif; ?>
                    </div>
                </div>
                <?php
            endforeach;
            ?>
        </div>
        <div class="lae-clear"></div>
        <?php
    }
    protected function content_template() {}
}
Plugin::instance()->widgets_manager->register_widget_type( new BDDEX_Services_Widget() );