<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class BDDEX_Services_3 extends Widget_Base {

    public function get_name() {
        return 'avas-services-3';
    }

    public function get_title() {
        return esc_html__( 'Avas Services 3', 'avas-core' );
    }

    public function get_icon() {
        return 'fa fa-cubes';
    }
    
    public function get_categories() {
        return [ 'element-x' ];
    }

protected function _register_controls() {

        $this->start_controls_section(
            'ex_services_settings',
            [
                'label'             => esc_html__( 'Settings', 'avas-core' ),
            ]
        );
        
        $this->add_control(
            'ex_service_layout',
            [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Layout', 'avas-core'),
                'options' => [
                    'service-layout-1' => esc_html__('Layout 1', 'avas-core'),
                    'service-layout-2' => esc_html__('Layout 2', 'avas-core'),
                    'service-layout-3' => esc_html__('Layout 3', 'avas-core'),
                ],
                'default' => 'service-layout-1',
            ]
        );

        $this->add_control(
            'ex_services_columns',
            [
                'label' => esc_html__('Columns', 'avas-core'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 6,
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
                        'service_title' => esc_html__('Web Development', 'avas-core'),
                        'icon_type' => 'icon',
                        'icon' => 'fa fa-desktop',
                        'service_excerpt' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Enim ad minim venia quis.',
                    ],
                    [
                        'service_title' => esc_html__('Graphics Design', 'avas-core'),
                        'icon_type' => 'icon',
                        'icon' => 'fa fa-paint-brush',
                        'service_excerpt' => 'Duis aute irure dolor in repreh enderit in volu ptate velit esse cillum dolore eu fugiat nulla pariatur. Exce pteur sint occaecat cupidatat non proident nunc amet ultrices.',
                    ],
                    [
                        'service_title' => esc_html__('SEO Services', 'avas-core'),
                        'icon_type' => 'icon',
                        'icon' => 'fa fa-line-chart',
                        'service_excerpt' => 'Suspendisse potenti Phasellus euismod libero in neque molestie et elementum libero maximus. Etiam in enim vestibulum suscipit sem quis molestie nibh.',
                    ],
                ],
                'fields' => [
                    [
                        'name' => 'icon_type',
                        'label' => esc_html__('Icon Type', 'avas-core'),
                        'type' => Controls_Manager::SELECT,
                        'default' => 'icon',
                        'options' => [
                            'none' => esc_html__('None', 'avas-core'),
                            'icon' => esc_html__('Icon', 'avas-core'),
                            'icon_image' => esc_html__('Image', 'avas-core'),
                        ],
                    ],
                    [
                        'name' => 'icon_image',
                        'label' => esc_html__('Image', 'avas-core'),
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
                        'label' => esc_html__('Icon', 'avas-core'),
                        'type' => Controls_Manager::ICON,
                        'label_block' => true,
                        'default' => '',
                        'condition' => [
                            'icon_type' => 'icon',
                        ],
                    ],
                    [
                        'name' => 'service_title',
                        'label' => esc_html__('Title', 'avas-core'),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__('Title goes here', 'avas-core'),
                    ],
                    [
                        'name'  => 'title_link',
                        'label' => esc_html__( 'Title Link', 'avas-core' ),
                        'type'  => Controls_Manager::URL,
                        'placeholder' => 'Example: http://your-website.com',
                        'default'     => [
                            'url' => '',
                        ],
                    ],
                    [
                        'name' => 'service_excerpt',
                        'label' => esc_html__('Description', 'avas-core'),
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => esc_html__('Description goes here', 'avas-core'),
                        'label_block' => true,
                    ],
                    [   
                        'type' => Controls_Manager::SWITCHER,
                        'name' => 'ex_service_button',
                        'label' => esc_html__('Button', 'avas-core'),
                        'label_off' => esc_html__('No', 'avas-core'),
                        'label_on' => esc_html__('Yes', 'avas-core'),
                        'return_value' => 'yes',
                        'default' => 'no',
                    ],
                    [
                        'name'  => 'btn_text',
                        'label' => esc_html__('Button Text', 'avas-core'),
                        'type'  => Controls_Manager::TEXT,
                        'default' => esc_html__( 'Read More', 'avas-core' ),
                        'condition' => [
                            'ex_service_button' => 'yes',
                        ],
                    ],
                    [
                        'name'  => 'btn_link',
                        'label' => esc_html__( 'Link', 'avas-core' ),
                        'type'  => Controls_Manager::URL,
                        'placeholder' => 'https://www.your-link.com',
                        'default'     => [
                            'url' => '#',
                        ],
                        'condition' => [
                            'ex_service_button' => 'yes',
                        ],
                    ],

                    [
                        'name'  => 'ex_service_button_icon',
                        'label' => esc_html__( 'Icon', 'avas-core' ),
                        'type'  => Controls_Manager::ICON,
                        'condition' => [
                                'ex_service_button' => 'yes',
                            ],
                    ],


            
                    [   
                        'name'  => 'ex_service_button_icon_align',
                        'label' => esc_html__( 'Icon Position', 'avas-core' ),
                        'type' => Controls_Manager::SELECT,
                        'default' => 'left',
                        'options' => [
                            'left' => esc_html__( 'Before', 'avas-core' ),
                            'right' => esc_html__( 'After', 'avas-core' ),
                        ],
                        'condition' => [
                            'ex_service_button' => 'yes',
                        ],
                    ],

                ],
    
                'title_field' => '{{{ service_title }}}',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'ex_services_column_style',
            [
                'label' => esc_html__('Column', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
                    'service_alignment',
                    [   
                    'label'             => esc_html__( 'Content Alignment', 'avas-core' ),
                    'type'              => Controls_Manager::CHOOSE,
                    'options'           => [
                    'left'      => [
                        'title' => esc_html__( 'Left', 'avas-core' ),
                        'icon'  => 'fa fa-align-left',
                    ],
                    'center'    => [
                        'title' => esc_html__( 'Center', 'avas-core' ),
                        'icon'  => 'fa fa-align-center',
                    ],
                    'right'     => [
                        'title' => esc_html__( 'Right', 'avas-core' ),
                        'icon'  => 'fa fa-align-right',
                    ],
                    
                ],
                'default'           => 'center',
                'selectors'         => [
                    '{{WRAPPER}} .service-layout-1 .ex-service-content'   => 'text-align: {{VALUE}};',
                ],
                'condition'     => [
                    'ex_service_layout' => 'service-layout-1'
                ],

            ]
           );

        $this->add_responsive_control(
            'ex_services_width',
            [
                'label' => esc_html__( 'Column Width', 'avas-core' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1200,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .ex-service-content' => 'width:{{SIZE}}px;',
                ],
            ]
        );

        $this->add_control(
            'ex_servcices_color',
            [
                'label' => esc_html__('Column Background Color', 'avas-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ex-service-content' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'ex_servcices_hover_color',
            [
                'label' => esc_html__('Column Background Hover Color', 'avas-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ex-service-content:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'ex_services_border',
                'selector' => '{{WRAPPER}} .ex-service-content',
            ]
        );

        $this->add_control(
            'ex_services_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'avas-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .ex-service-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'ex_services_padding',
            [
                'label' => esc_html__( 'Padding', 'avas-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .ex-service-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'ex_services_margin',
            [
                'label' => esc_html__( 'Margin', 'avas-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .ex-service-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'service_content',
            [
                'label' => esc_html__( 'Content', 'avas-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'icon_size',
            [
                'label' => esc_html__('Icon size', 'avas-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                    ],
                
                ],
                'selectors' => [
                    '{{WRAPPER}} .ex-service-content img' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .ex-service-content span' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__('Icon Color', 'avas-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ex-service-content span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'icon_hover_color',
            [
                'label' => esc_html__('Icon Hover Color', 'avas-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ex-service-content span:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_padding',
            [
                'label' => esc_html__( 'Icon Padding', 'avas-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .ex-service-content span, .ex-service-content img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'avas-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ex-service-content .ex-title h3' => 'color: {{VALUE}};', 
                ]
            ]
        );

        $this->add_control(
            'title_color_hover',
            [
                'label' => esc_html__('Title Hover Color', 'avas-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ex-service-content .ex-title h3:hover' => 'color: {{VALUE}};', 
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .ex-service-content .ex-title h3',
            ]
        );

        $this->add_responsive_control(
            'ex_services_title_padding',
            [
                'label' => esc_html__( 'Title Padding', 'avas-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .ex-service-content .ex-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'desc_color',
            [
                'label' => esc_html__('Description Color', 'avas-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ex-service-content .ex-text' => 'color: {{VALUE}};', 
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typography',
                'selector' => '{{WRAPPER}} .ex-service-content .ex-text',
            ]
        );

        
        $this->end_controls_section();
        $this->start_controls_section(
            'ex_services_btn_style',
            [
                'label' => esc_html__('Button', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->start_controls_tabs( 'btns_link_style' );
            $this->start_controls_tab(
            'btns_link_normal',
            [
                'label'             => esc_html__( 'Normal', 'avas-core' ),
            ]
        );

        $this->add_control(
            'btns_color_normal',
            [
                'label'             => esc_html__( 'Text Color', 'avas-core' ),
                'type'              => Controls_Manager::COLOR,
                'default'           => '',
                'selectors'         => [
                    '{{WRAPPER}} .ex-service-content .service_btns a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'background_color_normal',
            [
                'label'             => esc_html__( 'Background Color', 'avas-core' ),
                'type'              => Controls_Manager::COLOR,
                'default'           => '',
                'selectors'         => [
                    '{{WRAPPER}} .ex-service-content .service_btns a' => 'background-color: {{VALUE}};',
                ],
            ]
        );
         $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typography',
                'selector' => '{{WRAPPER}} .ex-service-content .service_btns a',
            ]
        );
        $this->add_control(
            'ex_service_btn_icon_space',
            [
                'label' => esc_html__( 'Icon Spacing', 'avas-core' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 100,
                    ],
                ],
                
                'selectors' => [
                    '{{WRAPPER}} .ex-service-button-icon-right' => 'margin-left: {{SIZE}}px;',
                    '{{WRAPPER}} .ex-service-button-icon-left' => 'margin-right: {{SIZE}}px;',
                ],
            ]
        ); 
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'btn_border',
                'placeholder' => '1px',
                'default' => '1px',
                'selector' => '{{WRAPPER}} .ex-service-content .service_btns a',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'avas-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .ex-service-content .service_btns a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .ex-service-content .service_btns a',
            ]
        );

        $this->add_responsive_control(
            'text_padding',
            [
                'label' => esc_html__( 'Padding', 'avas-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .ex-service-content .service_btns a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'text_margin',
            [
                'label' => esc_html__( 'Margin', 'avas-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .ex-service-content .service_btns' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'btns_link_hover',
            [
                'label'             => esc_html__( 'Hover', 'avas-core' ),
            ]
        );

        $this->add_control(
            'link_color_hover',
            [
                'label'             => esc_html__( 'Text Color', 'avas-core' ),
                'type'              => Controls_Manager::COLOR,
                'default'           => '',
                'selectors'         => [
                    '{{WRAPPER}} .ex-service-content .service_btns a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'background_color_hover',
            [
                'label'             => esc_html__( 'Background Color', 'avas-core' ),
                'type'              => Controls_Manager::COLOR,
                'default'           => '',
                'selectors'         => [
                    '{{WRAPPER}} .ex-service-content .service_btns a:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'border_color_hover',
            [
                'label'             => esc_html__( 'Border Color', 'avas-core' ),
                'type'              => Controls_Manager::COLOR,
                'default'           => '',
                'selectors'         => [
                    '{{WRAPPER}} .ex-service-content .service_btns a:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_tab();  

        $this->end_controls_section();
    }

    protected function render() {
    	$settings = $this->get_settings(); ?>

    	<div class="ex-container <?php echo $settings['ex_service_layout']; ?>">
            <div class="ex-row">
    		<?php foreach ($settings['services'] as $service): ?>
    			<div class="ex-service-content ex-col-<?php echo $settings['ex_services_columns']; ?> ex-hover">
                    <?php if ($service['icon_type'] == 'icon_image') : ?>
                            <?php $icon_image = $service['icon_image']; ?>
                            <?php if (!empty($icon_image)): ?>
                                <div class="ex-icon">
                                    <?php echo wp_get_attachment_image($icon_image['id'], 'full', false); ?>
                                </div>
                            <?php endif; ?>
                        <?php elseif ($service['icon_type'] == 'icon') : ?>
                            <div class="ex-icon">
                                <span class="<?php echo esc_attr($service['icon']); ?>"></span>
                            </div>
                        <?php endif; ?>
                    <div class="ex-service-title-desc">    
                    <?php if($service['title_link']['is_external']) { ?>    
    				<a class="ex-title" href="<?php echo $service['title_link']['url']; ?>" target="_blank"><h3><?php echo esc_html($service['service_title']) ?></h3></a>
                    <?php }else{ ?>
                    <a class="ex-title" href="<?php echo $service['title_link']['url']; ?>"><h3><?php echo esc_html($service['service_title']) ?></h3></a>
                    <?php } ?>    
    				<div class="ex-text"><p><?php echo wp_kses_post($service['service_excerpt']); ?></p></div>
                    <?php if($service['ex_service_button'] == 'yes') : ?>
                        <div class="service_btns">
                        <?php 
                        if($service['btn_link']['is_external']) { ?>
                        <a href="<?php echo $service['btn_link']['url']; ?>" target="_blank">
                            <?php if ( ! empty( $service['ex_service_button_icon'] ) && $service['ex_service_button_icon_align'] == 'left' ) : ?>
                                <i class="<?php echo esc_attr($service['ex_service_button_icon'] ); ?> ex-service-button-icon-left" aria-hidden="true"></i> 
                            <?php endif; ?>
                            <?php echo $service['btn_text']; ?>
                            <?php if ( ! empty( $service['ex_service_button_icon'] ) && $service['ex_service_button_icon_align'] == 'right' ) : ?>
                                <i class="<?php echo esc_attr($service['ex_service_button_icon'] ); ?> ex-service-button-icon-right" aria-hidden="true"></i> 
                            <?php endif; ?>    
                        </a>
                            <?php 
                                }else{ ?>
                        <a href="<?php echo $service['btn_link']['url']; ?>">
                            <?php if ( ! empty( $service['ex_service_button_icon'] ) && $service['ex_service_button_icon_align'] == 'left' ) : ?>
                                <i class="<?php echo esc_attr($service['ex_service_button_icon'] ); ?> ex-service-button-icon-left" aria-hidden="true"></i> 
                            <?php endif; ?>
                            <?php echo $service['btn_text']; ?>
                            <?php if ( ! empty( $service['ex_service_button_icon'] ) && $service['ex_service_button_icon_align'] == 'right' ) : ?>
                                <i class="<?php echo esc_attr($service['ex_service_button_icon'] ); ?> ex-service-button-icon-right" aria-hidden="true"></i> 
                            <?php endif; ?> 
                        </a>
                         <?php } ?>
                        </div>
                    <?php endif; ?><!-- button end -->
    			    </div>
                </div>
    		<?php endforeach ; ?>
            </div><!-- row -->
    	</div>
    	<div class="clear"></div>

    <?php }

    protected function content_template() {}

}
Plugin::instance()->widgets_manager->register_widget_type( new BDDEX_Services_3() );