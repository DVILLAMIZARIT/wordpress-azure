<?php 
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Widget_bddex_Pricing_Table extends Widget_Base {

	public function get_name() {
		return 'bddex-pricing-table';
	}

	public function get_title() {
		return esc_html__( 'Avas Pricing Table 2', 'avas-core' );
	}

	public function get_icon() {
		return 'eicon-price-table';
	}

   public function get_categories() {
		return [ 'bddex' ];
	}
	
	protected function _register_controls() {

  		/**
  		 * Pricing Table Settings
  		 */
  		$this->start_controls_section(
  			'bddex_section_pricing_table_settings',
  			[
  				'label' => esc_html__( 'Settings', 'avas-core' )
  			]
  		);

  		$this->add_control(
		  'bddex_pricing_table_style',
		  	[
		   	'label'       	=> esc_html__( 'Pricing Style', 'avas-core' ),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'style-1',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'style-1'  	=> esc_html__( 'Default', 'avas-core' ),
		     		'style-2' 	=> esc_html__( 'Pricing Style 2', 'avas-core' ),
		     		'style-3' 	=> esc_html__( 'Pricing Style 3', 'avas-core' ),
		     		'style-4' 	=> esc_html__( 'Pricing Style 4', 'avas-core' ),
		     	],
		  	]
		);


		/**
		 * Condition: 'bddex_pricing_table_style' => [ 'style-3', 'style-4' ], 'bddex_pricing_table_featured' => 'yes'
		 */
		$this->add_control(
			'bddex_pricing_table_icon_enabled',
			[
				'label' => esc_html__( 'List Icon', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'show',
				'default' => 'show',
			]
		);

  		$this->add_control( 
			'bddex_pricing_table_title',
			[
				'label' => esc_html__( 'Title', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => false,
				'default' => esc_html__( 'Startup', 'avas-core' )
			]
		);

		/**
		 * Condition: 'bddex_pricing_table_style' => 'style-2'
		 */
		$this->add_control( 
			'bddex_pricing_table_sub_title',
			[
				'label' => esc_html__( 'Sub Title', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => false,
				'default' => esc_html__( 'A tagline here.', 'avas-core' ),
				'condition' => [
					'bddex_pricing_table_style' => [ 'style-2', 'style-3', 'style-4' ]
				]
			]
		);

		/**
		 * Condition: 'bddex_pricing_table_style' => 'style-2'
		 */
		$this->add_control(
			'bddex_pricing_table_style_2_icon',
			[
				'label' => esc_html__( 'Icon', 'avas-core' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-home',
				'condition' => [
					'bddex_pricing_table_style' => 'style-2'
				]
			]
		);

		/**
		 * Condition: 'bddex_pricing_table_style' => 'style-4'
		 */
		$this->add_control(
			'bddex_pricing_table_style_4_image',
			[
				'label' => esc_html__( 'Header Image', 'avas-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-pricing-image' => 'background-image: url({{URL}});',
				],
				'condition' => [
					'bddex_pricing_table_style' => 'style-4'
				]
			]
		);

  		$this->end_controls_section();

  		/**
  		 * Pricing Table Price
  		 */
  		$this->start_controls_section(
  			'bddex_section_pricing_table_price',
  			[
  				'label' => esc_html__( 'Price', 'avas-core' )
  			]
  		);

		$this->add_control( 
			'bddex_pricing_table_price',
			[
				'label' => esc_html__( 'Price', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => false,
				'default' => esc_html__( '99', 'avas-core' )
			]
		);

  		$this->add_control( 
			'bddex_pricing_table_price_cur',
			[
				'label' => esc_html__( 'Price Currency', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => false,
				'default' => esc_html__( '$', 'avas-core' ),
				'selectors' => [
            	'{{WRAPPER}} .bddex-pricing .bddex-pricing-item .price-tag:before ' => 'content: "{{VALUE}}";',
        		],
			]
		);

		$this->add_responsive_control(
			'bddex_pricing_table_price_cur_alignment',
			[
				'label' => esc_html__( 'Alignment', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 12
				],
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-pricing-item .price-tag:before' => 'left: -{{SIZE}}px;',
				],
			]
		);

		/**
		 * Condition: 'bddex_pricing_table_style' => 'style-3'
		 */
		$this->add_control(
		  'bddex_pricing_table_style_3_price_position',
		  	[
		   	'label'       	=> esc_html__( 'Pricing Position', 'avas-core' ),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'bottom',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'top'  		=> esc_html__( 'On Top', 'avas-core' ),
		     		'bottom' 	=> esc_html__( 'At Bottom', 'avas-core' ),
		     	],
		     	'condition' => [
		     		'bddex_pricing_table_style' => 'style-3'
		     	]
		  	]
		);

		$this->add_control( 
			'bddex_pricing_table_price_period',
			[
				'label' => esc_html__( 'Price Period (per)', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => false,
				'default' => esc_html__( 'month', 'avas-core' )
			]
		);

  		$this->end_controls_section();

  		/**
  		 * Pricing Table Feature
  		 */
  		$this->start_controls_section(
  			'bddex_section_pricing_table_feature',
  			[
  				'label' => esc_html__( 'Feature', 'avas-core' )
  			]
  		);

  		$this->add_control(
			'bddex_pricing_table_items',
			[
				'type' => Controls_Manager::REPEATER,
				'seperator' => 'before',
				'default' => [
					[ 'bddex_pricing_table_item' => 'Unlimited calls' ],
					[ 'bddex_pricing_table_item' => 'Free hosting' ],
					[ 'bddex_pricing_table_item' => '500 MB of storage space' ],
					[ 'bddex_pricing_table_item' => '500 MB Bandwidth' ],
					[ 'bddex_pricing_table_item' => '24/7 support' ]
				],
				'fields' => [
					[
						'name' => 'bddex_pricing_table_item',
						'label' => esc_html__( 'List Item', 'avas-core' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'default' => esc_html__( 'Pricing table list item', 'avas-core' )
					],
					[
						'name' => 'bddex_pricing_table_list_icon',
						'label' => esc_html__( 'List Icon', 'avas-core' ),
						'type' => Controls_Manager::ICON,
						'label_block' => false,
						'default' => 'fa fa-check',
					],
					[
						'name' => 'bddex_pricing_table_icon_mood',
						'label' => esc_html__( 'Item Active?', 'avas-core' ),
						'type' => Controls_Manager::SWITCHER,
						'return_value' => 'yes',
						'default' => 'yes',
					],
					[
						'name' => 'bddex_pricing_table_list_icon_color',
						'label' => esc_html__( 'Icon Color', 'avas-core' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#00C853',
					]
				],
				'title_field' => '{{bddex_pricing_table_item}}',
			]
		);

  		$this->end_controls_section();

  		/**
  		 * Pricing Table Footer
  		 */
  		$this->start_controls_section(
  			'bddex_section_pricing_table_footerr',
  			[
  				'label' => esc_html__( 'Footer', 'avas-core' )
  			]
  		);

  		$this->add_control(
			'bddex_pricing_table_button_icon',
			[
				'label' => esc_html__( 'Button Icon', 'avas-core' ),
				'type' => Controls_Manager::ICON,
			]
		);

		$this->add_control(
			'bddex_pricing_table_button_icon_alignment',
			[
				'label' => esc_html__( 'Icon Position', 'avas-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left' => esc_html__( 'Before', 'avas-core' ),
					'right' => esc_html__( 'After', 'avas-core' ),
				],
				'condition' => [
					'bddex_pricing_table_button_icon!' => '',
				],
			]
		);
		
		$this->add_control(
			'bddex_pricing_table_button_icon_indent',
			[
				'label' => esc_html__( 'Icon Spacing', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 60,
					],
				],
				'condition' => [
					'bddex_pricing_table_button_icon!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-pricing-button i.fa-icon-left' => 'margin-right: {{SIZE}}px;',
					'{{WRAPPER}} .bddex-pricing-button i.fa-icon-right' => 'margin-left: {{SIZE}}px;',
				],
			]
		);

		$this->add_control( 
			'bddex_pricing_table_btn',
			[
				'label' => esc_html__( 'Button Text', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Choose Plan', 'avas-core' ),
			]
		);

		$this->add_control( 
			'bddex_pricing_table_btn_link',
			[
				'label' => esc_html__( 'Button Link', 'avas-core' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
				'default' => [
        			'url' => '#',
        			'is_external' => '',
     			],
     			'show_external' => true,
			]
		);

  		$this->end_controls_section();

  		/**
  		 * Pricing Table Rebon
  		 */
  		$this->start_controls_section(
  			'bddex_section_pricing_table_featured',
  			[
  				'label' => esc_html__( 'Ribbon', 'avas-core' )
  			]
  		);

  		$this->add_control(
			'bddex_pricing_table_featured',
			[
				'label' => esc_html__( 'Featured?', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		/**
		 * Condition: 'bddex_pricing_table_style' => [ 'style-3', 'style-4' ], 'bddex_pricing_table_featured' => 'yes'
		 */
		$this->add_control( 
			'bddex_pricing_table_featured_tag_text',
			[
				'label' => esc_html__( 'Featured Tag Text', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => false,
				'default' => esc_html__( 'Featured', 'avas-core' ),
				'selectors' => [
					'{{WRAPPER}} .bddex-pricing.style-3 .bddex-pricing-item.featured:before' => 'content: "{{VALUE}}";',
					'{{WRAPPER}} .bddex-pricing.style-4 .bddex-pricing-item.featured:before' => 'content: "{{VALUE}}";',
				],
				'condition' => [
					'bddex_pricing_table_style' => [ 'style-3', 'style-4' ],
					'bddex_pricing_table_featured' => 'yes'
				]
			]
		);

  		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Pricing Table Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'bddex_section_pricing_table_style_settings',
			[
				'label' => esc_html__( 'Pricing Table Style', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'bddex_pricing_table_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-pricing .bddex-pricing-item' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bddex_pricing_table_featured_bg_color',
			[
				'label' => esc_html__( 'Featured Background Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-pricing.style-4 .bddex-pricing-item.featured .header' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'bddex_pricing_table_style' => 'style-4'
				]
			]
		);

		$this->add_responsive_control(
			'bddex_pricing_table_container_padding',
			[
				'label' => esc_html__( 'Padding', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .bddex-pricing .bddex-pricing-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_responsive_control(
			'bddex_pricing_table_container_margin',
			[
				'label' => esc_html__( 'Margin', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .bddex-pricing .bddex-pricing-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'bddex_pricing_table_border',
				'label' => esc_html__( 'Border Type', 'avas-core' ),
				'selector' => '{{WRAPPER}} .bddex-pricing .bddex-pricing-item',
			]
		);

		$this->add_control(
			'bddex_pricing_table_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 4,
				],
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-pricing .bddex-pricing-item' => 'border-radius: {{SIZE}}px;',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'bddex_pricing_table_shadow',
				'selectors' => [
					'{{WRAPPER}} .bddex-pricing .bddex-pricing-item',
				],
			]
		);


		$this->add_responsive_control(
			'bddex_pricing_table_content_alignment',
			[
				'label' => esc_html__( 'Content Alignment', 'avas-core' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => true,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'avas-core' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'avas-core' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'avas-core' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'prefix_class' => 'bddex-pricing-content-align-',
			]
		);

		$this->add_responsive_control(
			'bddex_pricing_table_content_button_alignment',
			[
				'label' => esc_html__( 'Button Alignment', 'avas-core' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => true,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'avas-core' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'avas-core' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'avas-core' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'prefix_class' => 'bddex-pricing-button-align-',
			]
		);

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Pricing Table Title Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'bddex_section_pricing_table_title_style_settings',
			[
				'label' => esc_html__( 'Color &amp; Typography', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'bddex_pricing_table_title_heading',
			[
				'label' => esc_html__( 'Title Style', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'bddex_pricing_table_title_color',
			[
				'label' => esc_html__( 'Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-pricing-item .header .title' => 'color: {{VALUE}};',
					'{{WRAPPER}} .bddex-pricing.style-3 .bddex-pricing-item:hover .header:after' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bddex_pricing_table_style_2_title_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#C8E6C9',
				'selectors' => [
					'{{WRAPPER}} .bddex-pricing.style-2 .bddex-pricing-item .header' => 'background: {{VALUE}};',
					'{{WRAPPER}} .bddex-pricing.style-4 .bddex-pricing-item .header' => 'background: {{VALUE}};',
				],
				'condition' => [
					'bddex_pricing_table_style' => ['style-2', 'style-4']
				]
			]
		);

		$this->add_control(
			'bddex_pricing_table_style_1_title_line_color',
			[
				'label' => esc_html__( 'Line Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#dbdbdb',
				'selectors' => [
					'{{WRAPPER}} .bddex-pricing.style-1 .bddex-pricing-item .header:after' => 'background: {{VALUE}};',
				],
				'condition' => [
					'bddex_pricing_table_style' => ['style-1']
				]
			]
		);

		$this->add_control(
			'bddex_pricing_table_style_3_title_line_color',
			[
				'label' => esc_html__( 'Line Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#E25A77',
				'selectors' => [
					'{{WRAPPER}} .bddex-pricing.style-3 .bddex-pricing-item .header:after' => 'background: {{VALUE}};',
				],
				'condition' => [
					'bddex_pricing_table_style' => ['style-3']
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'bddex_pricing_table_title_typography',
				'selector' => '{{WRAPPER}} .bddex-pricing-item .header .title',
			]
		);

		$this->add_control(
			'bddex_pricing_table_subtitle_heading',
			[
				'label' => esc_html__( 'Subtitle Style', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'bddex_pricing_table_style!' => 'style-1'
				]
			]
		);

		$this->add_control(
			'bddex_pricing_table_subtitle_color',
			[
				'label' => esc_html__( 'Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-pricing-item .header .subtitle' => 'color: {{VALUE}};',
				],
				'condition' => [
					'bddex_pricing_table_style!' => 'style-1'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             	'name' => 'bddex_pricing_table_subtitle_typography',
				'selector' => '{{WRAPPER}} .bddex-pricing-item .header .subtitle',
				'condition' => [
					'bddex_pricing_table_style!' => 'style-1'
				]
			]
			
		);

		$this->add_control(
			'bddex_pricing_table_price_tag_heading',
			[
				'label' => esc_html__( 'Price Tag Style', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' =>  'before'
			]
		);

		$this->add_control(
			'bddex_pricing_table_pricing_color',
			[
				'label' => esc_html__( 'Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-pricing-item .price-tag' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bddex_pricing_table_pricing_icon_color',
			[
				'label' => esc_html__( 'Currency Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-pricing-item .price-tag:before' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'bddex_pricing_table_pricing_line_color',
			[
				'label' => esc_html__( 'Line Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-pricing.style-1 .bddex-pricing-item .bddex-pricing-tag:after' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
            'name' => 'bddex_pricing_table_price_tag_typography',
				'selector' => '{{WRAPPER}} .bddex-pricing-item .price-tag',
			]
		);

		$this->add_control(
			'bddex_pricing_table_pricing_period_heading',
			[
				'label' => esc_html__( 'Pricing Period Style', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'bddex_pricing_table_pricing_period_color',
			[
				'label' => esc_html__( 'Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-pricing-item .price-period' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
            'name' => 'bddex_pricing_table_price_preiod_typography',
				'selector' => '{{WRAPPER}} .bddex-pricing-item .price-period',
			]
		);

		$this->add_control(
			'bddex_pricing_table_price_list_heading',
			[
				'label' => esc_html__( 'Feature List Style', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' =>  'before'
			]
		);

		$this->add_control(
			'bddex_pricing_table_list_item_color',
			[
				'label' => esc_html__( 'Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-pricing-item .body ul li' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'bddex_pricing_table_list_item_border_color',
			[
				'label' => esc_html__( 'border Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-pricing-item .body ul li' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
            'name' => 'bddex_pricing_table_list_item_typography',
				'selector' => '{{WRAPPER}} .bddex-pricing-item .body ul li',
			]
		);

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Pricing Table Featured Tag Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'bddex_section_pricing_table_style_3_featured_tag_settings',
			[
				'label' => esc_html__( 'Ribbon Style', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'bddex_pricing_table_style' => [ 'style-1', 'style-3', 'style-4' ]
				]
			]
		);

		$this->add_control(
			'bddex_pricing_table_style_1_featured_bar_color',
			[
				'label' => esc_html__( 'Line Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#00C853',
				'selectors' => [
					'{{WRAPPER}} .bddex-pricing.style-1 .bddex-pricing-item.featured:before' => 'background: {{VALUE}};',
				],
				'condition' => [
					'bddex_pricing_table_style' => 'style-1',
					'bddex_pricing_table_featured' => 'yes'
				],
			]
		);

		$this->add_control(
			'bddex_pricing_table_style_1_featured_bar_height',
			[
				'label' => esc_html__( 'Line Height', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 3
				],
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-pricing.style-1 .bddex-pricing-item.featured:before' => 'height: {{SIZE}}px;',
				],
				'condition' => [
					'bddex_pricing_table_style' => 'style-1',
					'bddex_pricing_table_featured' => 'yes'
				],
			]
		);

		$this->add_control(
			'bddex_pricing_table_featured_tag_font_size',
			[
				'label' => esc_html__( 'Font Size', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 10
				],
				'range' => [
					'px' => [
						'max' => 18,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-pricing.style-3 .bddex-pricing-item.featured:before' => 'font-size: {{SIZE}}px;',
					'{{WRAPPER}} .bddex-pricing.style-4 .bddex-pricing-item.featured:before' => 'font-size: {{SIZE}}px;',
				],
				'condition' => [
					'bddex_pricing_table_style' => ['style-3', 'style-4'],
					'bddex_pricing_table_featured' => 'yes'
				],
			]
		);

		$this->add_control(
			'bddex_pricing_table_featured_tag_text_color',
			[
				'label' => esc_html__( 'Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-pricing.style-3 .bddex-pricing-item.featured:before' => 'color: {{VALUE}};',
					'{{WRAPPER}} .bddex-pricing.style-4 .bddex-pricing-item.featured:before' => 'color: {{VALUE}};',
				],
				'condition' => [
					'bddex_pricing_table_style' => ['style-3', 'style-4'],
					'bddex_pricing_table_featured' => 'yes'
				],
			]
		);

		$this->add_control(
			'bddex_pricing_table_featured_tag_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-pricing.style-3 .bddex-pricing-item.featured:before' => 'background: {{VALUE}};',
					'{{WRAPPER}} .bddex-pricing.style-3 .bddex-pricing-item.featured:after' => 'border-bottom-color: {{VALUE}};',
					'{{WRAPPER}} .bddex-pricing.style-4 .bddex-pricing-item.featured:before' => 'background: {{VALUE}};',
				],
				'condition' => [
					'bddex_pricing_table_style' => ['style-3', 'style-4'],
					'bddex_pricing_table_featured' => 'yes'
				],
			]
		);

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Pricing Table Icon Style)
		 * Condition: 'bddex_pricing_table_style' => 'style-2'
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'bddex_section_pricing_table_icon_settings',
			[
				'label' => esc_html__( 'Icon Settings', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'bddex_pricing_table_style' => 'style-2'
				]
			]
		);

		$this->add_control(
			'bddex_pricing_table_icon_bg_show',
			[
				'label' => __( 'Show Background', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => __( 'Show', 'avas-core' ),
				'label_off' => __( 'Hide', 'avas-core' ),
				'return_value' => 'yes',
			]
		);

		/**
		 * Condition: 'bddex_pricing_table_icon_bg_show' => 'yes'
		 */
		$this->add_control(
			'bddex_pricing_table_icon_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-pricing.style-2 .bddex-pricing-item .bddex-pricing-icon .icon' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'bddex_pricing_table_icon_bg_show' => 'yes'
				]
			]
		);

		/**
		 * Condition: 'bddex_pricing_table_icon_bg_show' => 'yes'
		 */
		$this->add_control(
			'bddex_pricing_table_icon_bg_hover_color',
			[
				'label' => esc_html__( 'Background Hover Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-pricing.style-2 .bddex-pricing-item:hover .bddex-pricing-icon .icon' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'bddex_pricing_table_icon_bg_show' => 'yes'
				],
				'separator'=> 'after',
			]
		);


		$this->add_control(
			'bddex_pricing_table_icon_settings',
			[
				'label' => esc_html__( 'Icon Size', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 30
				],
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-pricing.style-2 .bddex-pricing-item .bddex-pricing-icon .icon i' => 'font-size: {{SIZE}}px;',
				],
			]
		);

		$this->add_control(
			'bddex_pricing_table_icon_area_width',
			[
				'label' => esc_html__( 'Icon Area Width', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 80
				],
				'range' => [
					'px' => [
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-pricing.style-2 .bddex-pricing-item .bddex-pricing-icon .icon' => 'width: {{SIZE}}px;',
				],
			]
		);

		$this->add_control(
			'bddex_pricing_table_icon_area_height',
			[
				'label' => esc_html__( 'Icon Area Height', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 80
				],
				'range' => [
					'px' => [
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-pricing.style-2 .bddex-pricing-item .bddex-pricing-icon .icon' => 'height: {{SIZE}}px;',
				],
			]
		);

		$this->add_control(
			'bddex_pricing_table_icon_line_height',
			[
				'label' => esc_html__( 'Icon Alignment', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 80
				],
				'range' => [
					'px' => [
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-pricing.style-2 .bddex-pricing-item .bddex-pricing-icon .icon i' => 'line-height: {{SIZE}}px;',
				],
			]
		);



		$this->add_control(
			'bddex_pricing_table_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-pricing.style-2 .bddex-pricing-item .bddex-pricing-icon .icon i' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bddex_pricing_table_icon_hover_color',
			[
				'label' => esc_html__( 'Icon Hover Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-pricing.style-2 .bddex-pricing-item:hover .bddex-pricing-icon .icon i' => 'color: {{VALUE}};',
				],
				'separator' => 'after'
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
				[
					'name' => 'bddex_pricing_table_icon_border',
					'label' => esc_html__( 'Border', 'avas-core' ),
					'selector' => '{{WRAPPER}} .bddex-pricing.style-2 .bddex-pricing-item .bddex-pricing-icon .icon',
				]
		);

		$this->add_control(
			'bddex_pricing_table_icon_border_hover_color',
			[
				'label' => esc_html__( 'Hover Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-pricing.style-2 .bddex-pricing-item:hover .bddex-pricing-icon .icon' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'bddex_pricing_table_icon_border_border!' => ''
				]
			]
		);

		$this->add_control(
			'bddex_pricing_table_icon_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 50,
				],
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-pricing.style-2 .bddex-pricing-item .bddex-pricing-icon .icon' => 'border-radius: {{SIZE}}%;',
				],
			]
		);

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Button Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'bddex_section_pricing_table_btn_style_settings',
			[
				'label' => esc_html__( 'Button Style', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_responsive_control(
			'bddex_pricing_table_btn_padding',
			[
				'label' => esc_html__( 'Padding', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .bddex-pricing .bddex-pricing-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_responsive_control(
			'bddex_pricing_table_btn_margin',
			[
				'label' => esc_html__( 'Margin', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .bddex-pricing .bddex-pricing-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
	         'name' => 'bddex_pricing_table_btn_typography',
				'selector' => '{{WRAPPER}} .bddex-pricing .bddex-pricing-button',
			]
		);

		$this->start_controls_tabs( 'bddex_cta_button_tabs' );

			// Normal State Tab
			$this->start_controls_tab( 'bddex_pricing_table_btn_normal', [ 'label' => esc_html__( 'Normal', 'avas-core' ) ] );

			$this->add_control(
				'bddex_pricing_table_btn_normal_text_color',
				[
					'label' => esc_html__( 'Text Color', 'avas-core' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#fff',
					'selectors' => [
						'{{WRAPPER}} .bddex-pricing .bddex-pricing-button' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'bddex_pricing_table_btn_normal_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'avas-core' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#00C853',
					'selectors' => [
						'{{WRAPPER}} .bddex-pricing .bddex-pricing-button' => 'background: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
			Group_Control_Border::get_type(),
				[
					'name' => 'bddex_pricing_table_btn_border',
					'label' => esc_html__( 'Border', 'avas-core' ),
					'selector' => '{{WRAPPER}} .bddex-pricing .bddex-pricing-button',
				]
			);

			$this->add_control(
				'bddex_pricing_table_btn_border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'avas-core' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'max' => 50,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .bddex-pricing .bddex-pricing-button' => 'border-radius: {{SIZE}}px;',
					],
				]
			);

			$this->end_controls_tab();

			// Hover State Tab
			$this->start_controls_tab( 'bddex_pricing_table_btn_hover', [ 'label' => esc_html__( 'Hover', 'avas-core' ) ] );

			$this->add_control(
				'bddex_pricing_table_btn_hover_text_color',
				[
					'label' => esc_html__( 'Text Color', 'avas-core' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#f9f9f9',
					'selectors' => [
						'{{WRAPPER}} .bddex-pricing .bddex-pricing-button:hover' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'bddex_pricing_table_btn_hover_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'avas-core' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#03b048',
					'selectors' => [
						'{{WRAPPER}} .bddex-pricing .bddex-pricing-button:hover' => 'background: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'bddex_pricing_table_btn_hover_border_color',
				[
					'label' => esc_html__( 'Border Color', 'avas-core' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .bddex-pricing .bddex-pricing-button:hover' => 'border-color: {{VALUE}};',
					],
				]

			);

			$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'bddex_cta_button_shadow',
				'selector' => '{{WRAPPER}} .bddex-pricing .bddex-pricing-button',
				'separator' => 'before'
			]
		);

		$this->end_controls_section();

	}


	protected function render( ) {
		
   	$settings = $this->get_settings();
      $pricing_table_image = $this->get_settings( 'bddex_pricing_table_image' );
	  	$pricing_table_image_url = Group_Control_Image_Size::get_attachment_image_src( $pricing_table_image['id'], 'thumbnail', $settings );	
		$target = $settings['bddex_pricing_table_btn_link']['is_external'] ? 'target="_blank"' : '';
		$nofollow = $settings['bddex_pricing_table_btn_link']['nofollow'] ? 'rel="nofollow"' : '';
		if( 'yes' === $settings['bddex_pricing_table_featured'] ) : $featured_class = 'featured'; else : $featured_class = ''; endif;
	?>
	<?php if( 'style-1' === $settings['bddex_pricing_table_style'] ) : ?>
	<div class="bddex-pricing style-1">
	    <div class="bddex-pricing-item <?php echo esc_attr( $featured_class ); ?>">
	        <div class="header">
	            <h2 class="title"><?php echo $settings['bddex_pricing_table_title']; ?></h2>
	        </div>
	        <div class="bddex-pricing-tag">
	            <span class="price-tag"><?php echo $settings['bddex_pricing_table_price'] ?></span> <span class="price-period"> <?php echo $settings['bddex_pricing_table_price_period']; ?></span>
	        </div>
	        <div class="body">
	            <ul>
	            	<?php 
	            		foreach( $settings['bddex_pricing_table_items'] as $item ) : 
	            		if( 'yes' === $item['bddex_pricing_table_icon_mood'] ) : $icon_mood = ''; else : $icon_mood = 'disable-item'; endif;
	            	?>
	                	<li class="<?php echo esc_attr( $icon_mood ); ?>">
	                		<?php if( 'show' === $settings['bddex_pricing_table_icon_enabled'] ) : ?>
	                		<span class="li-icon" style="color:<?php echo esc_attr( $item['bddex_pricing_table_list_icon_color'] ); ?>"><i class="<?php echo esc_attr( $item['bddex_pricing_table_list_icon'] ); ?>"></i></span> 
	                		<?php endif; ?>
	                		<?php echo $item['bddex_pricing_table_item']; ?>
	                	</li>
	               <?php endforeach; ?> 
	            </ul>
	        </div>
	        <div class="footer">
		    	<a href="<?php echo esc_url( $settings['bddex_pricing_table_btn_link']['url'] ); ?>" <?php echo $target; ?> <?php echo $nofollow; ?> class="bddex-pricing-button">
		    		<?php if( 'left' == $settings['bddex_pricing_table_button_icon_alignment'] ) : ?>
						<i class="<?php echo esc_attr( $settings['bddex_pricing_table_button_icon'] ); ?> fa-icon-left"></i>
						<?php echo $settings['bddex_pricing_table_btn']; ?>
					<?php elseif( 'right' == $settings['bddex_pricing_table_button_icon_alignment'] ) : ?>
						<?php echo $settings['bddex_pricing_table_btn']; ?>
		        		<i class="<?php echo esc_attr( $settings['bddex_pricing_table_button_icon'] ); ?> fa-icon-right"></i>
		        	<?php endif; ?>
		    	</a>
		    </div>
	    </div>
	</div>
	<?php elseif( 'style-2' === $settings['bddex_pricing_table_style'] ) : ?>
	<div class="bddex-pricing style-2">
	    <div class="bddex-pricing-item <?php echo esc_attr( $featured_class ); ?>">
	        <div class="bddex-pricing-icon">
	            <span class="icon" style="background:<?php if('yes' != $settings['bddex_pricing_table_icon_bg_show']) : echo 'none'; endif;  ?>;"><i class="<?php echo esc_attr( $settings['bddex_pricing_table_style_2_icon'] ); ?>"></i></span>
	        </div>
	        <div class="header">
	            <h2 class="title"><?php echo $settings['bddex_pricing_table_title']; ?></h2>
	            <span class="subtitle"><?php echo $settings['bddex_pricing_table_sub_title']; ?></span>
	        </div>
	        <div class="bddex-pricing-tag">
	            <span class="price-tag"><?php echo $settings['bddex_pricing_table_price'] ?></span> <span class="price-period">/ <?php echo $settings['bddex_pricing_table_price_period']; ?></span>
	        </div>
	        <div class="body">
	            <ul>
	            	<?php 
	            		foreach( $settings['bddex_pricing_table_items'] as $item ) : 
	            		if( 'yes' === $item['bddex_pricing_table_icon_mood'] ) : $icon_mood = ''; else : $icon_mood = 'disable-item'; endif;
	            	?>
	                	<li class="<?php echo esc_attr( $icon_mood ); ?>">
	                		<?php if( 'show' === $settings['bddex_pricing_table_icon_enabled'] ) : ?>
	                		<span class="li-icon" style="color:<?php echo esc_attr( $item['bddex_pricing_table_list_icon_color'] ); ?>"><i class="<?php echo esc_attr( $item['bddex_pricing_table_list_icon'] ); ?>"></i></span> 
	                		<?php endif; ?>
	                		<?php echo $item['bddex_pricing_table_item']; ?>
	                	</li>
	               <?php endforeach; ?> 
	            </ul>
	        </div>
	        <div class="footer">
		    	<a href="<?php echo esc_url( $settings['bddex_pricing_table_btn_link']['url'] ); ?>" <?php echo $target; ?> <?php echo $nofollow; ?> class="bddex-pricing-button">
		    		<?php if( 'left' == $settings['bddex_pricing_table_button_icon_alignment'] ) : ?>
						<i class="<?php echo esc_attr( $settings['bddex_pricing_table_button_icon'] ); ?> fa-icon-left"></i>
						<?php echo $settings['bddex_pricing_table_btn']; ?>
					<?php elseif( 'right' == $settings['bddex_pricing_table_button_icon_alignment'] ) : ?>
						<?php echo $settings['bddex_pricing_table_btn']; ?>
		        		<i class="<?php echo esc_attr( $settings['bddex_pricing_table_button_icon'] ); ?> fa-icon-right"></i>
		        	<?php endif; ?>
		    	</a>
		    </div>
	    </div>
	</div>
	<?php elseif( 'style-3' === $settings['bddex_pricing_table_style'] ) : ?>
	<div class="bddex-pricing style-3">
		<div class="bddex-pricing-item <?php echo esc_attr( $featured_class ); ?>">
			<?php if( 'top' === $settings['bddex_pricing_table_style_3_price_position'] ) : ?>
		    <div class="bddex-pricing-tag on-top">
		        <span class="price-tag"><?php echo $settings['bddex_pricing_table_price'] ?></span> <span class="price-period">/ <?php echo $settings['bddex_pricing_table_price_period']; ?></span>
		    </div>
		 	<?php endif; ?>
		    <div class="header">
		        <h2 class="title"><?php echo $settings['bddex_pricing_table_title']; ?></h2>
		        <span class="subtitle"><?php echo $settings['bddex_pricing_table_sub_title']; ?></span>
		    </div>
		    <div class="body">
		        <ul>
	            	<?php 
	            		foreach( $settings['bddex_pricing_table_items'] as $item ) : 
	            		if( 'yes' === $item['bddex_pricing_table_icon_mood'] ) : $icon_mood = ''; else : $icon_mood = 'disable-item'; endif;
	            	?>
	                	<li class="<?php echo esc_attr( $icon_mood ); ?>">
	                		<?php if( 'show' === $settings['bddex_pricing_table_icon_enabled'] ) : ?>
	                		<span class="li-icon" style="color:<?php echo esc_attr( $item['bddex_pricing_table_list_icon_color'] ); ?>"><i class="<?php echo esc_attr( $item['bddex_pricing_table_list_icon'] ); ?>"></i></span> 
	                		<?php endif; ?>
	                		<?php echo $item['bddex_pricing_table_item']; ?>
	                	</li>
	               <?php endforeach; ?> 
	            </ul>
		    </div>
		    <?php if( 'bottom' === $settings['bddex_pricing_table_style_3_price_position'] ) : ?>
		    <div class="bddex-pricing-tag">
		        <span class="price-tag"><?php echo $settings['bddex_pricing_table_price'] ?></span> <span class="price-period">/ <?php echo $settings['bddex_pricing_table_price_period']; ?></span>
		    </div>
		 	<?php endif; ?>
		    <div class="footer">
		    	<a href="<?php echo esc_url( $settings['bddex_pricing_table_btn_link']['url'] ); ?>" <?php echo $target; ?> <?php echo $nofollow; ?> class="bddex-pricing-button">
		    		<?php if( 'left' == $settings['bddex_pricing_table_button_icon_alignment'] ) : ?>
						<i class="<?php echo esc_attr( $settings['bddex_pricing_table_button_icon'] ); ?> fa-icon-left"></i>
						<?php echo $settings['bddex_pricing_table_btn']; ?>
					<?php elseif( 'right' == $settings['bddex_pricing_table_button_icon_alignment'] ) : ?>
						<?php echo $settings['bddex_pricing_table_btn']; ?>
		        		<i class="<?php echo esc_attr( $settings['bddex_pricing_table_button_icon'] ); ?> fa-icon-right"></i>
		        	<?php endif; ?>
		    	</a>
		    </div>
		</div>
	</div>
	<?php elseif( 'style-4' === $settings['bddex_pricing_table_style'] ) : ?>
	<div class="bddex-pricing style-4">
		<div class="bddex-pricing-item <?php echo esc_attr( $featured_class ); ?>">
		    <div class="bddex-pricing-image">
		        <div class="bddex-pricing-tag">
		            <span class="price-tag"><?php echo $settings['bddex_pricing_table_price'] ?></span> <span class="price-period">/ <?php echo $settings['bddex_pricing_table_price_period']; ?></span>
		        </div>
		    </div>
		    <div class="header">
		        <h2 class="title"><?php echo $settings['bddex_pricing_table_title']; ?></h2>
		        <span class="subtitle"><?php echo $settings['bddex_pricing_table_sub_title']; ?></span>
		    </div>
		    <div class="body">
		        <ul>
	            	<?php 
	            		foreach( $settings['bddex_pricing_table_items'] as $item ) : 
	            		if( 'yes' === $item['bddex_pricing_table_icon_mood'] ) : $icon_mood = ''; else : $icon_mood = 'disable-item'; endif;
	            	?>
	                	<li class="<?php echo esc_attr( $icon_mood ); ?>">
	                		<?php if( 'show' === $settings['bddex_pricing_table_icon_enabled'] ) : ?>
	                		<span class="li-icon" style="color:<?php echo esc_attr( $item['bddex_pricing_table_list_icon_color'] ); ?>"><i class="<?php echo esc_attr( $item['bddex_pricing_table_list_icon'] ); ?>"></i></span> 
	                		<?php endif; ?>
	                		<?php echo $item['bddex_pricing_table_item']; ?>
	                	</li>
	               <?php endforeach; ?> 
	            </ul>
		    </div>
		    <div class="footer">
		    	<a href="<?php echo esc_url( $settings['bddex_pricing_table_btn_link']['url'] ); ?>" <?php echo $target; ?> <?php echo $nofollow; ?> class="bddex-pricing-button">
		    		<?php if( 'left' == $settings['bddex_pricing_table_button_icon_alignment'] ) : ?>
						<i class="<?php echo esc_attr( $settings['bddex_pricing_table_button_icon'] ); ?> fa-icon-left"></i>
						<?php echo $settings['bddex_pricing_table_btn']; ?>
					<?php elseif( 'right' == $settings['bddex_pricing_table_button_icon_alignment'] ) : ?>
						<?php echo $settings['bddex_pricing_table_btn']; ?>
		        		<i class="<?php echo esc_attr( $settings['bddex_pricing_table_button_icon'] ); ?> fa-icon-right"></i>
		        	<?php endif; ?>
		    	</a>
		    </div>
		</div>
	</div>
	<?php endif; ?>
	<?php
	}

	protected function content_template() {
		
		?>
		
	
		<?php
	}
}


Plugin::instance()->widgets_manager->register_widget_type( new Widget_bddex_Pricing_Table() );