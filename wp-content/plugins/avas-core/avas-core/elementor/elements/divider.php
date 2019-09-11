<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Divider Widget
 */
class bddex_Divider_Widget extends Widget_Base {
    
    /**
	 * Retrieve divider widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
    public function get_name() {
        return 'bddex-divider';
    }

    /**
	 * Retrieve divider widget title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
    public function get_title() {
        return esc_html__( 'Avas Divider', 'avas-core' );
    }

    /**
	 * Retrieve the list of categories the divider widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
    public function get_categories() {
        return [ 'bddex' ];
    }

    /**
	 * Retrieve divider widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
    public function get_icon() {
        return 'eicon-divider';
    }

    /**
	 * Register divider widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
    protected function _register_controls() {

        /*-----------------------------------------------------------------------------------*/
        /*	CONTENT TAB
        /*-----------------------------------------------------------------------------------*/
        
        /**
         * Content Tab: Divider
         */
        $this->start_controls_section(
            'section_buton',
            [
                'label'                 => esc_html__( 'Divider', 'avas-core' ),
            ]
        );
        
        $this->add_control(
			'divider_type',
			[
				'label'                 => esc_html__( 'Type', 'avas-core' ),
				'type'                  => Controls_Manager::CHOOSE,
				'label_block'           => false,
				'options'               => [
					'plain'        => [
						'title'    => esc_html__( 'Plain', 'avas-core' ),
						'icon'     => 'fa fa-ellipsis-h',
					],
					'text'         => [
						'title'    => esc_html__( 'Text', 'avas-core' ),
						'icon'     => 'fa fa-file-text-o',
					],
					'icon'         => [
						'title'    => esc_html__( 'Icon', 'avas-core' ),
						'icon'     => 'fa fa-certificate',
					],
					'image'        => [
						'title'    => esc_html__( 'Image', 'avas-core' ),
						'icon'     => 'fa fa-picture-o',
					],
				],
				'default'               => 'plain',
			]
		);

        $this->add_control(
            'divider_direction',
            [
                'label'                 => esc_html__( 'Direction', 'avas-core' ),
                'type'                  => Controls_Manager::SELECT,
                'default'               => 'horizontal',
                'options'               => [
                   'horizontal'     => esc_html__( 'Horizontal', 'avas-core' ),
                   'vertical'       => esc_html__( 'Vertical', 'avas-core' ),
                ],
				'condition'             => [
					'divider_type'    => 'plain',
				],
            ]
        );

        $this->add_control(
            'divider_text',
            [
                'label'                 => esc_html__( 'Text', 'avas-core' ),
                'type'                  => Controls_Manager::TEXT,
                'default'               => esc_html__( 'Divider Text', 'avas-core' ),
				'condition'             => [
					'divider_type'    => 'text',
				],
            ]
        );

		$this->add_control(
			'divider_icon',
			[
				'label'                 => esc_html__( 'Icon', 'avas-core' ),
				'type'                  => Controls_Manager::ICON,
				'label_block'           => true,
				'default'               => 'fa fa-circle',
				'condition'             => [
					'divider_type'    => 'icon',
				],
			]
		);

        $this->add_control(
            'text_html_tag',
            [
                'label'                 => esc_html__( 'HTML Tag', 'avas-core' ),
                'type'                  => Controls_Manager::SELECT,
                'default'               => 'span',
                'options'               => [
                    'h1'            => esc_html__( 'H1', 'avas-core' ),
                    'h2'            => esc_html__( 'H2', 'avas-core' ),
                    'h3'            => esc_html__( 'H3', 'avas-core' ),
                    'h4'            => esc_html__( 'H4', 'avas-core' ),
                    'h5'            => esc_html__( 'H5', 'avas-core' ),
                    'h6'            => esc_html__( 'H6', 'avas-core' ),
                    'div'           => esc_html__( 'div', 'avas-core' ),
                    'span'          => esc_html__( 'span', 'avas-core' ),
                    'p'             => esc_html__( 'p', 'avas-core' ),
                ],
				'condition'             => [
					'divider_type'    => 'text',
				],
            ]
        );
        
        $this->add_control(
            'divider_image',
            [
                'label'                 => esc_html__( 'Image', 'avas-core' ),
                'type'                  => Controls_Manager::MEDIA,
                'default'               => [
                    'url'           => Utils::get_placeholder_image_src(),
                ],
				'condition'             => [
					'divider_type'    => 'image',
				],
            ]
        );
        
        $this->add_responsive_control(
			'align',
			[
				'label'                 => esc_html__( 'Alignment', 'avas-core' ),
				'type'                  => Controls_Manager::CHOOSE,
				'default'               => 'center',
				'options'               => [
					'left'          => [
						'title'     => esc_html__( 'Left', 'avas-core' ),
						'icon'      => 'eicon-h-align-left',
					],
					'center'        => [
						'title'     => esc_html__( 'Center', 'avas-core' ),
						'icon'      => 'eicon-h-align-center',
					],
					'right'         => [
						'title'     => esc_html__( 'Right', 'avas-core' ),
						'icon'      => 'eicon-h-align-right',
					],
				],
				'selectors'             => [
					'{{WRAPPER}}'   => 'text-align: {{VALUE}};',
				],
			]
		);

        $this->end_controls_section();

        /*-----------------------------------------------------------------------------------*/
        /*	STYLE TAB
        /*-----------------------------------------------------------------------------------*/
        
        /**
         * Style Tab: Divider
         */
        $this->start_controls_section(
            'section_divider_style',
            [
                'label'                 => esc_html__( 'Divider', 'avas-core' ),
                'tab'                   => Controls_Manager::TAB_STYLE,
            ]
        );
        
        
        $this->add_control(
			'divider_vertical_align',
			[
				'label'                 => esc_html__( 'Vertical Alignment', 'avas-core' ),
				'type'                  => Controls_Manager::CHOOSE,
                'label_block'           => false,
				'default'               => 'middle',
				'options'               => [
					'top'          => [
						'title'    => esc_html__( 'Top', 'avas-core' ),
						'icon'     => 'eicon-v-align-top',
					],
					'middle'       => [
						'title'    => esc_html__( 'Center', 'avas-core' ),
						'icon'     => 'eicon-v-align-middle',
					],
					'bottom'       => [
						'title'    => esc_html__( 'Bottom', 'avas-core' ),
						'icon'     => 'eicon-v-align-bottom',
					],
				],
				'selectors'             => [
					'{{WRAPPER}} .divider-text-wrap'   => 'align-items: {{VALUE}};',
				],
				'selectors_dictionary'  => [
					'top'          => 'flex-start',
					'middle'       => 'center',
					'bottom'       => 'flex-end',
				],
				'condition'             => [
					'divider_type!'   => 'plain',
				],
			]
		);

        $this->add_control(
            'divider_style',
            [
                'label'                 => esc_html__( 'Style', 'avas-core' ),
                'type'                  => Controls_Manager::SELECT,
                'default'               => 'dashed',
                'options'               => [
                   'solid'          => esc_html__( 'Solid', 'avas-core' ),
                   'dashed'         => esc_html__( 'Dashed', 'avas-core' ),
                   'dotted'         => esc_html__( 'Dotted', 'avas-core' ),
                   'double'         => esc_html__( 'Double', 'avas-core' ),
                ],
				'selectors'             => [
					'{{WRAPPER}} .pp-divider, {{WRAPPER}} .divider-border' => 'border-style: {{VALUE}};',
				],
            ]
        );
        
        $this->add_responsive_control(
			'horizontal_height',
			[
				'label'                 => esc_html__( 'Height', 'avas-core' ),
				'type'                  => Controls_Manager::SLIDER,
				'size_units'            => [ '%', 'px' ],
				'range'                 => [
					'px'       => [
						'max'  => 60,
					],
				],
				'default'               => [
					'size'     => 3,
					'unit'     => 'px',
				],
				'tablet_default'    => [
					'unit'     => 'px',
				],
				'mobile_default'    => [
					'unit'     => 'px',
				],
				'selectors'             => [
					'{{WRAPPER}} .pp-divider.horizontal' => 'border-bottom-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .divider-border' => 'border-top-width: {{SIZE}}{{UNIT}};',
				],
				'condition'             => [
					'divider_direction'    => 'horizontal',
				],
			]
		);
        
        $this->add_responsive_control(
			'vertical_height',
			[
				'label'                 => esc_html__( 'Height', 'avas-core' ),
				'type'                  => Controls_Manager::SLIDER,
				'size_units'            => [ '%', 'px' ],
				'range'                 => [
					'px'           => [
						'max'      => 500,
					],
				],
				'default'               => [
					'size'         => 80,
					'unit'         => 'px',
				],
				'tablet_default'   => [
					'unit'         => 'px',
				],
				'mobile_default'   => [
					'unit'         => 'px',
				],
				'selectors'             => [
					'{{WRAPPER}} .pp-divider.vertical' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .divider-border' => 'border-top-width: {{SIZE}}{{UNIT}};',
				],
				'condition'             => [
					'divider_direction'    => 'vertical',
				],
			]
		);
        
        $this->add_responsive_control(
			'horizontal_width',
			[
				'label'                 => esc_html__( 'Width', 'avas-core' ),
				'type'                  => Controls_Manager::SLIDER,
				'size_units'            => [ '%', 'px' ],
				'range'                 => [
					'px'           => [
						'max'      => 1200,
					],
				],
				'default'               => [
					'size'         => 300,
					'unit'         => 'px',
				],
				'tablet_default'   => [
					'unit'         => 'px',
				],
				'mobile_default'   => [
					'unit'         => 'px',
				],
				'selectors'             => [
					'{{WRAPPER}} .pp-divider.horizontal' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .divider-text-container' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition'             => [
					'divider_direction'    => 'horizontal',
				],
			]
		);
        
        $this->add_responsive_control(
			'vertical_width',
			[
				'label'                 => esc_html__( 'Width', 'avas-core' ),
				'type'                  => Controls_Manager::SLIDER,
				'size_units'            => [ '%', 'px' ],
				'range'                 => [
					'px'           => [
						'max'      => 100,
					],
				],
				'default'               => [
					'size'         => 3,
					'unit'         => 'px',
				],
				'tablet_default'   => [
					'unit'         => 'px',
				],
				'mobile_default'   => [
					'unit'         => 'px',
				],
				'selectors'             => [
					'{{WRAPPER}} .pp-divider.vertical' => 'border-left-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .divider-text-container' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition'             => [
					'divider_direction'    => 'vertical',
				],
			]
		);

        $this->add_control(
            'divider_border_color',
            [
                'label'                 => esc_html__( 'Divider Color', 'avas-core' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '',
                'selectors'             => [
                    '{{WRAPPER}} .pp-divider, {{WRAPPER}} .divider-border' => 'border-color: {{VALUE}};',
                ],
				'condition'             => [
					'divider_type'    => 'plain',
				],
            ]
        );

        $this->start_controls_tabs( 'tabs_before_after_style' );

        $this->start_controls_tab(
            'tab_before_style',
            [
                'label'                 => esc_html__( 'Before', 'avas-core' ),
				'condition'             => [
					'divider_type!'   => 'plain',
				],
            ]
        );

        $this->add_control(
            'divider_before_color',
            [
                'label'                 => esc_html__( 'Divider Color', 'avas-core' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '',
				'condition'             => [
					'divider_type!'   => 'plain',
				],
                'selectors'             => [
                    '{{WRAPPER}} .divider-border-left .divider-border' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_after_style',
            [
                'label'                 => esc_html__( 'After', 'avas-core' ),
				'condition'             => [
					'divider_type!'   => 'plain',
				],
            ]
        );

        $this->add_control(
            'divider_after_color',
            [
                'label'                 => esc_html__( 'Divider Color', 'avas-core' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '',
				'condition'             => [
					'divider_type!'   => 'plain',
				],
                'selectors'             => [
                    '{{WRAPPER}} .divider-border-right .divider-border' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        /**
         * Style Tab: Text
         */
        $this->start_controls_section(
            'section_text_style',
            [
                'label'                 => esc_html__( 'Text', 'avas-core' ),
                'tab'                   => Controls_Manager::TAB_STYLE,
				'condition'             => [
					'divider_type'    => 'text',
				],
            ]
        );
        
        $this->add_control(
			'text_position',
			[
				'label'                 => esc_html__( 'Position', 'avas-core' ),
				'type'                  => Controls_Manager::CHOOSE,
				'options'               => [
					'left'         => [
						'title'    => esc_html__( 'Left', 'avas-core' ),
						'icon'     => 'eicon-h-align-left',
					],
					'center'       => [
						'title'    => esc_html__( 'Center', 'avas-core' ),
						'icon'     => 'eicon-h-align-center',
					],
					'right'        => [
						'title'    => esc_html__( 'Right', 'avas-core' ),
						'icon'     => 'eicon-h-align-right',
					],
				],
				'default'               => 'center',
                'prefix_class'		    => 'pp-divider-'
			]
		);

        $this->add_control(
            'divider_text_color',
            [
                'label'                 => esc_html__( 'Color', 'avas-core' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '',
				'condition'             => [
					'divider_type'    => 'text',
				],
                'selectors'             => [
                    '{{WRAPPER}} .pp-divider-text' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'                  => 'typography',
                'label'                 => esc_html__( 'Typography', 'avas-core' ),
                'scheme'                => Scheme_Typography::TYPOGRAPHY_4,
                'selector'              => '{{WRAPPER}} .pp-divider-text',
				'condition'             => [
					'divider_type'    => 'text',
				],
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name'                  => 'divider_text_shadow',
                'selector'              => '{{WRAPPER}} .pp-divider-text',
            ]
        );
        
        $this->add_responsive_control(
			'text_spacing',
			[
				'label'                 => esc_html__( 'Spacing', 'avas-core' ),
				'type'                  => Controls_Manager::SLIDER,
				'size_units'            => [ '%', 'px' ],
				'range'                 => [
					'px' => [
						'max' => 200,
					],
				],
				'condition'             => [
					'divider_type'    => 'text',
				],
				'selectors'             => [
					'{{WRAPPER}}.pp-divider-center .pp-divider-content' => 'margin-left: {{SIZE}}{{UNIT}}; margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.pp-divider-left .pp-divider-content' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.pp-divider-right .pp-divider-content' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);
        
        $this->end_controls_section();

        /**
         * Style Tab: Icon
         */
        $this->start_controls_section(
            'section_icon_style',
            [
                'label'                 => esc_html__( 'Icon', 'avas-core' ),
                'tab'                   => Controls_Manager::TAB_STYLE,
				'condition'             => [
					'divider_type'    => 'icon',
				],
            ]
        );
        
        $this->add_control(
			'icon_position',
			[
				'label'                 => esc_html__( 'Position', 'avas-core' ),
				'type'                  => Controls_Manager::CHOOSE,
				'options'               => [
					'left'         => [
						'title'    => esc_html__( 'Left', 'avas-core' ),
						'icon'     => 'eicon-h-align-left',
					],
					'center'       => [
						'title'    => esc_html__( 'Center', 'avas-core' ),
						'icon'     => 'eicon-h-align-center',
					],
					'right'        => [
						'title'    => esc_html__( 'Right', 'avas-core' ),
						'icon'     => 'eicon-h-align-right',
					],
				],
				'default'               => 'center',
                'prefix_class'		    => 'pp-divider-'
			]
		);

        $this->add_control(
            'divider_icon_color',
            [
                'label'                 => esc_html__( 'Color', 'avas-core' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '',
				'condition'             => [
					'divider_type'    => 'icon',
				],
                'selectors'             => [
                    '{{WRAPPER}} .pp-divider-icon' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
			'icon_size',
			[
				'label'                 => esc_html__( 'Size', 'avas-core' ),
				'type'                  => Controls_Manager::SLIDER,
				'size_units'            => [ '%', 'px' ],
				'range'                 => [
					'px' => [
						'max' => 100,
					],
				],
				'default'               => [
					'size' => 16,
					'unit' => 'px',
				],
				'condition'             => [
					'divider_type'    => 'icon',
				],
				'selectors'             => [
					'{{WRAPPER}} .pp-divider-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
        
        $this->add_responsive_control(
			'icon_rotation',
			[
				'label'                 => esc_html__( 'Icon Rotation', 'avas-core' ),
				'type'                  => Controls_Manager::SLIDER,
				'size_units'            => [ '%', 'px' ],
				'range'                 => [
					'px' => [
						'max' => 360,
					],
				],
				'default'               => [
					'unit' => 'px',
				],
				'tablet_default'    => [
					'unit' => 'px',
				],
				'mobile_default'    => [
					'unit' => 'px',
				],
				'selectors'             => [
					'{{WRAPPER}} .pp-divider-icon .fa' => 'transform: rotate( {{SIZE}}deg );',
				],
				'condition'             => [
					'divider_type'    => 'icon',
				],
			]
		);
        
        $this->add_responsive_control(
			'icon_spacing',
			[
				'label'                 => esc_html__( 'Spacing', 'avas-core' ),
				'type'                  => Controls_Manager::SLIDER,
				'size_units'            => [ '%', 'px' ],
				'range'                 => [
					'px' => [
						'max' => 200,
					],
				],
				'condition'             => [
					'divider_type'    => 'icon',
				],
				'selectors'             => [
					'{{WRAPPER}}.pp-divider-center .pp-divider-content' => 'margin-left: {{SIZE}}{{UNIT}}; margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.pp-divider-left .pp-divider-content' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.pp-divider-right .pp-divider-content' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);
        
        $this->end_controls_section();

        /**
         * Style Tab: Image
         */
        $this->start_controls_section(
            'section_image_style',
            [
                'label'                 => esc_html__( 'Image', 'avas-core' ),
                'tab'                   => Controls_Manager::TAB_STYLE,
				'condition'             => [
					'divider_type'    => 'image',
				],
            ]
        );
        
        $this->add_control(
			'image_position',
			[
				'label'                 => esc_html__( 'Position', 'avas-core' ),
				'type'                  => Controls_Manager::CHOOSE,
				'options'               => [
					'left'      => [
						'title' => esc_html__( 'Left', 'avas-core' ),
						'icon'  => 'eicon-h-align-left',
					],
					'center'    => [
						'title' => esc_html__( 'Center', 'avas-core' ),
						'icon'  => 'eicon-h-align-center',
					],
					'right'     => [
						'title' => esc_html__( 'Right', 'avas-core' ),
						'icon'  => 'eicon-h-align-right',
					],
				],
				'default'               => 'center',
                'prefix_class'		    => 'pp-divider-'
			]
		);
        
        $this->add_responsive_control(
			'image_width',
			[
				'label'                 => esc_html__( 'Width', 'avas-core' ),
				'type'                  => Controls_Manager::SLIDER,
				'size_units'            => [ '%', 'px' ],
				'range'                 => [
					'px' => [
						'max' => 1200,
					],
				],
				'default'               => [
					'size' => 80,
					'unit' => 'px',
				],
				'tablet_default'    => [
					'unit' => 'px',
				],
				'mobile_default'    => [
					'unit' => 'px',
				],
				'condition'             => [
					'divider_type'    => 'image',
				],
				'selectors'             => [
					'{{WRAPPER}} .pp-divider-image' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'icon_border_radius',
			[
				'label'                 => esc_html__( 'Border Radius', 'avas-core' ),
				'type'                  => Controls_Manager::DIMENSIONS,
				'size_units'            => [ 'px', '%' ],
				'condition'             => [
					'divider_type'    => 'image',
				],
				'selectors'             => [
					'{{WRAPPER}} .pp-divider-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        
        $this->add_responsive_control(
			'image_spacing',
			[
				'label'                 => esc_html__( 'Spacing', 'avas-core' ),
				'type'                  => Controls_Manager::SLIDER,
				'size_units'            => [ '%', 'px' ],
				'range'                 => [
					'px' => [
						'max' => 200,
					],
				],
				'condition'             => [
					'divider_type'    => 'image',
				],
				'selectors'             => [
					'{{WRAPPER}}.pp-divider-center .pp-divider-content' => 'margin-left: {{SIZE}}{{UNIT}}; margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.pp-divider-left .pp-divider-content' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.pp-divider-right .pp-divider-content' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);
        
        $this->end_controls_section();

    }

    /**
	 * Render divider widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
    protected function render() {
        $settings = $this->get_settings();

        $this->add_render_attribute( 'divider', 'class', 'pp-divider' );

        if ( $settings['divider_direction'] ) {
            $this->add_render_attribute( 'divider', 'class', $settings['divider_direction'] );
        }

        if ( $settings['divider_style'] ) {
            $this->add_render_attribute( 'divider', 'class', $settings['divider_style'] );
        }
        
        $this->add_render_attribute( 'divider-content', 'class', 'pp-divider-' . $settings['divider_type'] );
        
        $this->add_inline_editing_attributes( 'divider_text', 'none' );
        $this->add_render_attribute( 'divider_text', 'class', 'pp-divider-' . $settings['divider_type'] );
        
        if ( $settings['divider_type'] == 'plain' ) { ?>
            <div <?php echo $this->get_render_attribute_string( 'divider' ); ?>></div>
            <?php
        }
        else { ?>
            <div class="divider-text-container">
                <div class="divider-text-wrap">
                    <span class="divider-border-wrap divider-border-left">
                        <span class="divider-border"></span>
                    </span>
                    <span class="pp-divider-content">
                        <?php if ( $settings['divider_type'] == 'text' && $settings['divider_text'] ) { ?>
                            <?php
                                printf('<%1$s %2$s>%3$s</%1$s>', $settings['text_html_tag'], $this->get_render_attribute_string( 'divider_text' ), esc_attr( $settings['divider_text'] ) );
                            ?>
                        <?php } elseif ( $settings['divider_type'] == 'icon' && $settings['divider_icon'] ) { ?>
                            <span <?php echo $this->get_render_attribute_string( 'divider-content' ); ?>>
                                <span class="<?php echo esc_attr( $settings['divider_icon'] ); ?>" aria-hidden="true"></span>
                            </span>
                        <?php } elseif ( $settings['divider_type'] == 'image' ) { ?>
                            <span <?php echo $this->get_render_attribute_string( 'divider-content' ); ?>>
                                <?php
                                    $image = $settings['divider_image'];
                                    if ( $image['url'] ) { ?>
                                        <img src="<?php echo esc_url( $image['url'] ); ?>">
                                <?php } ?>
                            </span>
                        <?php } ?>
                    </span>
                    <span class="divider-border-wrap divider-border-right">
                        <span class="divider-border"></span>
                    </span>
                </div>
            </div>
            <?php
        }
    }

    /**
	 * Render divider widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @access protected
	 */
    protected function _content_template() {
        ?>
        <# if ( settings.divider_type == 'plain' ) { #>
            <div class="pp-divider {{ settings.divider_direction }} {{ settings.divider_style }} "></div>
        <# } else { #>
            <div class="divider-text-container">
                <div class="divider-text-wrap">
                    <span class="divider-border-wrap divider-border-left">
                        <span class="divider-border"></span>
                    </span>
                    <span class="pp-divider-content">
                        <# if ( settings.divider_type == 'text' && settings.divider_text != '' ) { #>
                            <{{ settings.text_html_tag }} class="pp-divider-{{ settings.divider_type }} elementor-inline-editing" data-elementor-setting-key="divider_text" data-elementor-inline-editing-toolbar="none">
                                {{ settings.divider_text }}
                            </{{ settings.text_html_tag }}>
                        <# } else if ( settings.divider_type == 'icon' && settings.divider_icon != '' ) { #>
                            <span class="pp-divider-{{ settings.divider_type }}">
                                <span class="{{ settings.divider_icon }}" aria-hidden="true"></span>
                            </span>
                        <# } else if ( settings.divider_type == 'image' ) { #>
                            <span class="pp-divider-{{ settings.divider_type }}">
                                <img src="{{ settings.divider_image.url }}">
                            </span>
                        <# } #>
                    </span>
                    <span class="divider-border-wrap divider-border-right">
                        <span class="divider-border"></span>
                    </span>
                </div>
            </div>
        <# } #>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new bddex_Divider_Widget() );