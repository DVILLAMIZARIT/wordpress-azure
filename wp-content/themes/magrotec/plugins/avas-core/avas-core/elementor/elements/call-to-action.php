<?php 
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Widget_bddex_Cta_Box extends Widget_Base {

	public function get_name() {
		return 'bddex-cta-box';
	}

	public function get_title() {
		return esc_html__( 'Avas Call to Action', 'avas-core' );
	}

	public function get_icon() {
		return 'eicon-call-to-action';
	}

   public function get_categories() {
		return [ 'bddex' ];
	}
	
	protected function _register_controls() {

  		/**
  		 * Call to Action Content Settings
  		 */
  		$this->start_controls_section(
  			'bddex_section_cta_content_settings',
  			[
  				'label' => esc_html__( 'Content Settings', 'avas-core' )
  			]
  		);

  		$this->add_control(
		  'bddex_cta_type',
		  	[
		   	'label'       	=> esc_html__( 'Content Style', 'avas-core' ),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'cta-basic',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'cta-basic'  		=> esc_html__( 'Basic', 'avas-core' ),
		     		'cta-flex' 			=> esc_html__( 'Flex Grid', 'avas-core' ),
		     		'cta-icon-flex' 	=> esc_html__( 'Flex Grid with Icon', 'avas-core' ),
		     	],
		  	]
		);

  		/**
  		 * Condition: 'bddex_cta_type' => 'cta-basic'
  		 */
		$this->add_control(
		  'bddex_cta_content_type',
		  	[
		   	'label'       	=> esc_html__( 'Content Type', 'avas-core' ),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'cta-default',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'cta-default'  	=> esc_html__( 'Left', 'avas-core' ),
		     		'cta-center' 		=> esc_html__( 'Center', 'avas-core' ),
		     		'cta-right' 		=> esc_html__( 'Right', 'avas-core' ),
		     	],
		     	'condition'    => [
		     		'bddex_cta_type' => 'cta-basic'
		     	]
		  	]
		);

		$this->add_control(
		  'bddex_cta_color_type',
		  	[
		   	'label'       	=> esc_html__( 'Color Style', 'avas-core' ),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'cta-bg-color',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'cta-bg-color'  		=> esc_html__( 'Background Color', 'avas-core' ),
		     		'cta-bg-img' 			=> esc_html__( 'Background Image', 'avas-core' ),
		     		'cta-bg-img-fixed' 	=> esc_html__( 'Background Fixed Image', 'avas-core' ),
		     	],
		  	]
		);

		/**
		 * Condition: 'bddex_cta_type' => 'cta-icon-flex'
		 */
		$this->add_control(
			'bddex_cta_flex_grid_icon',
			[
				'label' => esc_html__( 'Icon', 'avas-core' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-bullhorn',
				'condition' => [
					'bddex_cta_type' => 'cta-icon-flex'
				]
			]
		);

		$this->add_control( 
			'bddex_cta_title',
			[
				'label' => esc_html__( 'Title', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Avas Call to Action widget', 'avas-core' )
			]
		);
		$this->add_control( 
			'bddex_cta_content',
			[
				'label' => esc_html__( 'Content', 'avas-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__( 'Add a strong one liner supporting the heading above and giving users a reason to click on the button below.', 'avas-core' ),
				'separator' => 'after'
			]
		);

		$this->add_control( 
			'bddex_cta_btn_text',
			[
				'label' => esc_html__( 'Button Text', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Button Text', 'avas-core' )
			]
		);

		$this->add_control( 
			'bddex_cta_btn_link',
			[
				'label' => esc_html__( 'Button Link', 'avas-core' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
				'default' => [
        			'url' => 'http://',
        			'is_external' => '',
     			],
     			'show_external' => true,
     			'separator' => 'after'
			]
		);

		/**
		 * Condition: 'bddex_cta_color_type' => 'cta-bg-img' && 'bddex_cta_color_type' => 'cta-bg-img-fixed',
		 */
		$this->add_control(
			'bddex_cta_bg_image',
			[
				'label' => esc_html__( 'Background Image', 'avas-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'selectors' => [
            	'{{WRAPPER}} .bddex-call-to-action.bg-img' => 'background-image: url({{URL}});',
            	'{{WRAPPER}} .bddex-call-to-action.bg-img-fixed' => 'background-image: url({{URL}});',
        		],
				'condition' => [
					'bddex_cta_color_type' => [ 'cta-bg-img', 'cta-bg-img-fixed' ],
				]
			]
		);

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Cta Title Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'bddex_section_cta_style_settings',
			[
				'label' => esc_html__( 'Call to Action Style', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'bddex_cta_container_width',
			[
				'label' => esc_html__( 'Set max width for the container?', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'yes', 'avas-core' ),
				'label_off' => esc_html__( 'no', 'avas-core' ),
				'default' => 'yes',
			]
		);

		$this->add_responsive_control(
			'bddex_cta_container_width_value',
			[
				'label' => esc_html__( 'Container Max Width (% or px)', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 1170,
					'unit' => 'px',
				],
				'size_units' => [ 'px', '%' ],
				'range' => [
		            'px' => [
		                'min' => 0,
		                'max' => 1500,
		                'step' => 5,
		            ],
					'%' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-call-to-action' => 'max-width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'bddex_cta_container_width' => 'yes',
				],
			]
		);

		$this->add_control(
			'bddex_cta_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#f4f4f4',
				'selectors' => [
					'{{WRAPPER}} .bddex-call-to-action' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'bddex_cta_container_padding',
			[
				'label' => esc_html__( 'Padding', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .bddex-call-to-action' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_responsive_control(
			'bddex_cta_container_margin',
			[
				'label' => esc_html__( 'Margin', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .bddex-call-to-action' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'bddex_cta_border',
				'label' => esc_html__( 'Border', 'avas-core' ),
				'selector' => '{{WRAPPER}} .bddex-call-to-action',
			]
		);

		$this->add_control(
			'bddex_cta_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-call-to-action' => 'border-radius: {{SIZE}}px;',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'bddex_cta_shadow',
				'selector' => '{{WRAPPER}} .bddex-call-to-action',
			]
		);


		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Cta Title Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'bddex_section_cta_title_style_settings',
			[
				'label' => esc_html__( 'Color &amp; Typography ', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'bddex_cta_title_heading',
			[
				'label' => esc_html__( 'Title Style', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'bddex_cta_title_color',
			[
				'label' => esc_html__( 'Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-call-to-action .title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'bddex_cta_title_typography',
				'selector' => '{{WRAPPER}} .bddex-call-to-action .title',
			]
		);

		$this->add_control(
			'bddex_cta_content_heading',
			[
				'label' => esc_html__( 'Content Style', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'bddex_cta_content_color',
			[
				'label' => esc_html__( 'Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-call-to-action p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'bddex_cta_content_typography',
				'selector' => '{{WRAPPER}} .bddex-call-to-action p',
			]
		);

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Button Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'bddex_section_cta_btn_style_settings',
			[
				'label' => esc_html__( 'Button Style', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
		  'bddex_cta_btn_effect_type',
		  	[
		   	'label'       	=> esc_html__( 'Effect', 'avas-core' ),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'default',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'default'  			=> esc_html__( 'Default', 'avas-core' ),
		     		'top-to-bottom'  	=> esc_html__( 'Top to Bottom', 'avas-core' ),
		     		'left-to-right'  	=> esc_html__( 'Left to Right', 'avas-core' ),
		     	],
		  	]
		);

		$this->add_responsive_control(
			'bddex_cta_btn_padding',
			[
				'label' => esc_html__( 'Padding', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .bddex-call-to-action .cta-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_responsive_control(
			'bddex_cta_btn_margin',
			[
				'label' => esc_html__( 'Margin', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .bddex-call-to-action .cta-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
	         'name' => 'bddex_cta_btn_typography',
				'selector' => '{{WRAPPER}} .bddex-call-to-action .cta-button',
			]
		);

		$this->start_controls_tabs( 'bddex_cta_button_tabs' );

			// Normal State Tab
			$this->start_controls_tab( 'bddex_cta_btn_normal', [ 'label' => esc_html__( 'Normal', 'avas-core' ) ] );

			$this->add_control(
				'bddex_cta_btn_normal_text_color',
				[
					'label' => esc_html__( 'Text Color', 'avas-core' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#4d4d4d',
					'selectors' => [
						'{{WRAPPER}} .bddex-call-to-action .cta-button' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'bddex_cta_btn_normal_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'avas-core' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#f9f9f9',
					'selectors' => [
						'{{WRAPPER}} .bddex-call-to-action .cta-button' => 'background: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'bddex_cat_btn_normal_border',
					'label' => esc_html__( 'Border', 'avas-core' ),
					'selector' => '{{WRAPPER}} .bddex-call-to-action .cta-button',
				]
			);

			$this->add_control(
				'bddex_cta_btn_border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'avas-core' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .bddex-call-to-action .cta-button' => 'border-radius: {{SIZE}}px;',
					],
				]
			);

			$this->end_controls_tab();

			// Hover State Tab
			$this->start_controls_tab( 'bddex_cta_btn_hover', [ 'label' => esc_html__( 'Hover', 'avas-core' ) ] );

			$this->add_control(
				'bddex_cta_btn_hover_text_color',
				[
					'label' => esc_html__( 'Text Color', 'avas-core' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#f9f9f9',
					'selectors' => [
						'{{WRAPPER}} .bddex-call-to-action .cta-button:hover' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'bddex_cta_btn_hover_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'avas-core' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#3F51B5',
					'selectors' => [
						'{{WRAPPER}} .bddex-call-to-action .cta-button:after' => 'background: {{VALUE}};',
						'{{WRAPPER}} .bddex-call-to-action .cta-button:hover' => 'background: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'bddex_cta_btn_hover_border_color',
				[
					'label' => esc_html__( 'Border Color', 'avas-core' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .bddex-call-to-action .cta-button:hover' => 'border-color: {{VALUE}};',
					],
				]

			);

			$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'bddex_cta_button_shadow',
				'selector' => '{{WRAPPER}} .bddex-call-to-action .cta-button',
				'separator' => 'before'
			]
		);

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Button Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'bddex_section_cta_icon_style_settings',
			[
				'label' => esc_html__( 'Icon Style', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'bddex_cta_type' => 'cta-icon-flex'
				]
			]
		);

		$this->add_control(
			'bddex_section_cta_icon_size',
			[
				'label' => esc_html__( 'Font Size', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 80
				],
				'range' => [
					'px' => [
						'max' => 160,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-call-to-action.cta-icon-flex .icon' => 'font-size: {{SIZE}}px;',
				],
			]
		);

		$this->add_control(
			'bddex_section_cta_icon_color',
			[
				'label' => esc_html__( 'Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#444',
				'selectors' => [
					'{{WRAPPER}} .bddex-call-to-action.cta-icon-flex .icon' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

	}


	protected function render( ) {
		
   		$settings = $this->get_settings();	
	  	$target = $settings['bddex_cta_btn_link']['is_external'] ? 'target="_blank"' : '';
	  	$nofollow = $settings['bddex_cta_btn_link']['nofollow'] ? 'rel="nofollow"' : '';
	  	if( 'cta-bg-color' == $settings['bddex_cta_color_type'] ) {
	  		$cta_class = 'bg-lite';
	  	}else if( 'cta-bg-img' == $settings['bddex_cta_color_type'] ) {
	  		$cta_class = 'bg-img';
	  	}else if( 'cta-bg-img-fixed' == $settings['bddex_cta_color_type'] ) {
	  		$cta_class = 'bg-img bg-fixed';
	  	}else {
	  		$cta_class = '';
	  	}
	  	// Is Basic Cta Content Center or Not
	  	if( 'cta-center' === $settings['bddex_cta_content_type'] ) {
	  		$cta_alignment = 'cta-center';
	  	}elseif( 'cta-right' === $settings['bddex_cta_content_type'] ) {
	  		$cta_alignment = 'cta-right';
	  	}else {
	  		$cta_alignment = 'cta-left';
	  	}
	  	// Button Effect
	  	if( 'left-to-right' == $settings['bddex_cta_btn_effect_type'] ) {
	  		$cta_btn_effect = 'effect-2';
	  	}elseif( 'top-to-bottom' == $settings['bddex_cta_btn_effect_type'] ) {
	  		$cta_btn_effect = 'effect-1';
	  	}else {
	  		$cta_btn_effect = '';
	  	}
	
	?>
	<?php if( 'cta-basic' == $settings['bddex_cta_type'] ) : ?>
	<div class="bddex-call-to-action <?php echo esc_attr( $cta_class ); ?> <?php echo esc_attr( $cta_alignment ); ?>">
	    <h2 class="title"><?php echo $settings['bddex_cta_title']; ?></h2>
	    <p><?php echo $settings['bddex_cta_content']; ?></p>
	    <a href="<?php echo esc_url( $settings['bddex_cta_btn_link']['url'] ); ?>" <?php echo $target; ?> <?php echo $nofollow; ?> class="cta-button <?php echo esc_attr( $cta_btn_effect ); ?>"><?php esc_html_e( $settings['bddex_cta_btn_text'], 'avas-core' ); ?></a>
	</div>		
	<?php endif; ?>
	<?php if( 'cta-flex' == $settings['bddex_cta_type'] ) : ?>
	<div class="bddex-call-to-action cta-flex <?php echo esc_attr( $cta_class ); ?>">
	    <div class="content">
	        <h2 class="title"><?php echo $settings['bddex_cta_title']; ?></h2>
	        <p><?php echo $settings['bddex_cta_content']; ?></p>
	    </div>
	    <div class="action">
	        <a href="<?php echo esc_url( $settings['bddex_cta_btn_link']['url'] ); ?>" <?php echo $target; ?> <?php echo $nofollow; ?> class="cta-button <?php echo esc_attr( $cta_btn_effect ); ?>"><?php esc_html_e( $settings['bddex_cta_btn_text'], 'avas-core' ); ?></a>
	    </div>
	</div>
	<?php endif; ?>
	<?php if( 'cta-icon-flex' == $settings['bddex_cta_type'] ) : ?>
	<div class="bddex-call-to-action cta-icon-flex <?php echo esc_attr( $cta_class ); ?>">
	    <div class="icon">
	        <i class="<?php echo esc_attr( $settings['bddex_cta_flex_grid_icon'] ); ?>"></i>
	    </div>
	    <div class="content">
	        <h2 class="title"><?php echo $settings['bddex_cta_title']; ?></h2>
	        <p><?php echo $settings['bddex_cta_content']; ?></p>
	    </div>
	    <div class="action">
	       <a href="<?php echo esc_url( $settings['bddex_cta_btn_link']['url'] ); ?>" <?php echo $target; ?> class="cta-button <?php echo esc_attr( $cta_btn_effect ); ?>"><?php esc_html_e( $settings['bddex_cta_btn_text'], 'avas-core' ); ?></a>
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


Plugin::instance()->widgets_manager->register_widget_type( new Widget_bddex_Cta_Box() );