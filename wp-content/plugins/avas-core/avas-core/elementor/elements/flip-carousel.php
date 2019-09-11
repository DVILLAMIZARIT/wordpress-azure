<?php 
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Widget_bddex_Flip_Carousel extends Widget_Base {

	public function get_name() {
		return 'bddex-flip-carousel';
	}

	public function get_title() {
		return esc_html__( 'Avas Flip Carousel', 'avas-core' );
	}

	public function get_icon() {
		return 'eicon-carousel';
	}

   public function get_categories() {
		return [ 'bddex' ];
	}
	
	protected function _register_controls() {

		/**
  		 * Flip Carousel Settings
  		 */
  		$this->start_controls_section(
  			'bddex_section_flip_carousel_settings',
  			[
  				'label' => esc_html__( 'Filp Carousel Settings', 'avas-core' )
  			]
  		);

  		$this->add_control(
		  'bddex_flip_carousel_type',
		  	[
		   	'label'       	=> esc_html__( 'Carousel Type', 'avas-core' ),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'coverflow',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'coverflow' => esc_html__( 'Cover-Flow', 'avas-core' ),
		     		'carousel'  => esc_html__( 'Carousel', 'avas-core' ),
		     		'flat'  	=> esc_html__( 'Flat', 'avas-core' ),
		     		'wheel'  	=> esc_html__( 'Wheel', 'avas-core' ),
		     	],
		  	]
		);

		$this->add_control( 
			'bddex_flip_carousel_fade_in',
			[
				'label' => esc_html__( 'Fade In (ms)', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => false,
				'default' => 400,
			]
		);

		$this->add_control(
		  'bddex_flip_carousel_start_from',
		  	[
				'label' => __( 'Item Starts From Center?', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'true',
				'label_on' => esc_html__( 'Yes', 'avas-core' ),
				'label_off' => esc_html__( 'No', 'avas-core' ),
				'return_value' => 'true',
		  	]
		);

		/**
		 * Condition: 'bddex_flip_carousel_start_from' => 'true'
		 */
		$this->add_control( 
			'bddex_flip_carousel_starting_number',
			[
				'label' => esc_html__( 'Enter Starts Number', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => false,
				'default' => 1,
				'condition' => [
					'bddex_flip_carousel_start_from!' => 'true'
				]
			]
		);

		$this->add_control(
		  'bddex_flip_carousel_loop',
		  	[
				'label' => __( 'Loop', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'false',
				'label_on' => esc_html__( 'Yes', 'avas-core' ),
				'label_off' => esc_html__( 'No', 'avas-core' ),
				'return_value' => 'true',
		  	]
		);

		$this->add_control(
		  'bddex_flip_carousel_autoplay',
		  	[
				'label' => __( 'Autoplay', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'false',
				'label_on' => esc_html__( 'Yes', 'avas-core' ),
				'label_off' => esc_html__( 'No', 'avas-core' ),
				'return_value' => 'true',
		  	]
		);

		/**
		 * Condition: 'bddex_flip_carousel_autoplay' => 'true'
		 */
		$this->add_control( 
			'bddex_flip_carousel_autoplay_time',
			[
				'label' => esc_html__( 'Autoplay Timeout (ms)', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => false,
				'default' => 2000,
				'condition' => [
					'bddex_flip_carousel_autoplay' => 'true'
				]
			]
		);

		$this->add_control(
		  'bddex_flip_carousel_pause_on_hover',
		  	[
				'label' => __( 'Pause On Hover', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'true',
				'label_on' => esc_html__( 'Yes', 'avas-core' ),
				'label_off' => esc_html__( 'No', 'avas-core' ),
				'return_value' => 'true',
		  	]
		);

		$this->add_control(
		  'bddex_flip_carousel_click',
		  	[
				'label' => __( 'On Click Play?', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'true',
				'label_on' => esc_html__( 'Yes', 'avas-core' ),
				'label_off' => esc_html__( 'No', 'avas-core' ),
				'return_value' => 'true',
		  	]
		);

		$this->add_control(
		  'bddex_flip_carousel_scrollwheel',
		  	[
				'label' => __( 'On Scroll Wheel Play?', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'true',
				'label_on' => esc_html__( 'Yes', 'avas-core' ),
				'label_off' => esc_html__( 'No', 'avas-core' ),
				'return_value' => 'true',
		  	]
		);

		$this->add_control(
		  'bddex_flip_carousel_touch',
		 	[
				'label' => __( 'On Touch Play?', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'true',
				'label_on' => esc_html__( 'Yes', 'avas-core' ),
				'label_off' => esc_html__( 'No', 'avas-core' ),
				'return_value' => 'true',
		  	]
		);

		$this->add_control(
		  'bddex_flip_carousel_button',
		  	[
				'label' => __( 'Carousel Navigator', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'true',
				'label_on' => esc_html__( 'Yes', 'avas-core' ),
				'label_off' => esc_html__( 'No', 'avas-core' ),
				'return_value' => 'true',
		  	]
		);

		$this->add_control(
			'bddex_flip_carousel_spacing',
			[
				'label' => esc_html__( 'Slide Spacing', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => -0.6
				],
				'range' => [
					'px' => [
						'min' => -1,
						'max' => 1,
						'step' => 0.1
					],
				],
			]
		);

		$this->end_controls_section();

		/**
		 * Filp Carousel Slides
		 */
		$this->start_controls_section( 
			'bddex_fli_carousel_slides',
			[
				'label' => esc_html__( 'Flip Carousel Slides', 'avas-core' ),
			]
		);

		$this->add_control(
			'bddex_flip_carousel_slides',
			[
				'type' => Controls_Manager::REPEATER,
				'seperator' => 'before',
				'default' => [
					[ 'bddex_flip_carousel_slide' => THEME_DIR . '/assets/img/flip-carousel.png' ],
					[ 'bddex_flip_carousel_slide' => THEME_DIR . '/assets/img/flip-carousel.png' ],
					[ 'bddex_flip_carousel_slide' => THEME_DIR . '/assets/img/flip-carousel.png' ],
					[ 'bddex_flip_carousel_slide' => THEME_DIR . '/assets/img/flip-carousel.png' ],
					[ 'bddex_flip_carousel_slide' => THEME_DIR . '/assets/img/flip-carousel.png' ],
					[ 'bddex_flip_carousel_slide' => THEME_DIR . '/assets/img/flip-carousel.png' ],
					[ 'bddex_flip_carousel_slide' => THEME_DIR . '/assets/img/flip-carousel.png' ],
					[ 'bddex_flip_carousel_slide' => THEME_DIR . '/assets/img/flip-carousel.png' ],
				],
				'fields' => [
					[
						'name' => 'bddex_flip_carousel_slide',
						'label' => esc_html__( 'Slide', 'avas-core' ),
						'type' => Controls_Manager::MEDIA,
						'default' => [
							'url' => THEME_DIR . '/assets/img/flip-carousel.png',
						],
					],
					[
						'name' => 'bddex_flip_carousel_slide_text',
						'label' => esc_html__( 'Slide Text', 'avas-core' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'default' => '',
					],
					[
						'name' => 'bddex_flip_carousel_enable_slide_link',
						'label' => __( 'Enable Slide Link', 'avas-core' ),
						'type' => Controls_Manager::SWITCHER,
						'default' => 'false',
						'label_on' => esc_html__( 'Yes', 'avas-core' ),
						'label_off' => esc_html__( 'No', 'avas-core' ),
						'return_value' => 'true',
				  	],
				  	[
						'name' => 'bddex_flip_carousel_slide_link',
						'label' => esc_html__( 'Slide Link', 'avas-core' ),
						'type' => Controls_Manager::URL,
						'label_block' => true,
						'default' => [
		        			'url' => '#',
		        			'is_external' => '',
		     			],
		     			'show_external' => true,
		     			'condition' => [
		     				'bddex_flip_carousel_enable_slide_link' => 'true'
		     			]
					]
				],
				//'title_field' => '{{bddex_flip_carousel_slide_text}}',
			]
		);

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Flip Carousel Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'bddex_section_flip_carousel_style_settings',
			[
				'label' => esc_html__( 'Flip Carousel Style', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'bddex_flip_carousel_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-flip-carousel' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'bddex_flip_carousel_container_padding',
			[
				'label' => esc_html__( 'Padding', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .bddex-flip-carousel' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_responsive_control(
			'bddex_flip_carousel_container_margin',
			[
				'label' => esc_html__( 'Margin', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .bddex-flip-carousel' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'bddex_flip_carousel_border',
				'label' => esc_html__( 'Border', 'avas-core' ),
				'selector' => '{{WRAPPER}} .bddex-flip-carousel',
			]
		);

		$this->add_control(
			'bddex_flip_carousel_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 4,
				],
				'range' => [
					'px' => [
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-flip-carousel' => 'border-radius: {{SIZE}}px;',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'bddex_flip_carousel_shadow',
				'selector' => '{{WRAPPER}} .bddex-flip-carousel',
			]
		);

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Flip Carousel Navigator Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'bddex_section_filp_carousel_custom_nav_settings',
			[
				'label' => esc_html__( 'Navigator Style', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
		  'bddex_flip_carousel_custom_nav',
		  	[
				'label' => __( 'Custom Navigator', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'false',
				'label_on' => esc_html__( 'Yes', 'avas-core' ),
				'label_off' => esc_html__( 'No', 'avas-core' ),
				'return_value' => 'true',
		  	]
		);

		/**
		 * Condition: 'bddex_flip_carousel_custom_nav' => 'true'
		 */
		$this->add_control(
			'bddex_flip_carousel_custom_nav_prev',
			[
				'label' => esc_html__( 'Previous Icon', 'avas-core' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-arrow-left',
				'condition' => [
					'bddex_flip_carousel_custom_nav' => 'true'
				]
			]
		);

		/**
		 * Condition: 'bddex_flip_carousel_custom_nav' => 'true'
		 */
		$this->add_control(
			'bddex_flip_carousel_custom_nav_next',
			[
				'label' => esc_html__( 'Next Icon', 'avas-core' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-arrow-right',
				'condition' => [
					'bddex_flip_carousel_custom_nav' => 'true'
				]
			]
		);

		$this->add_responsive_control(
			'bddex_flip_carousel_custom_nav_margin',
			[
				'label' => esc_html__( 'Margin', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .flip-custom-nav' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_control(
			'bddex_flip_carousel_custom_nav_size',
			[
				'label' => esc_html__( 'Icon Size', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => '30'
				],
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .flip-custom-nav' => 'font-size: {{SIZE}}px;',
				],
			]
		);

		$this->add_control(
			'bddex_flip_carousel_custom_nav_bg_size',
			[
				'label' => esc_html__( 'Background Size', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 40,
				],
				'range' => [
					'px' => [
						'max' => 80,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .flip-custom-nav' => 'width: {{SIZE}}px; height: {{SIZE}}px; line-height: {{SIZE}}px;',
				],
			]
		);

		$this->add_control(
			'bddex_flip_carousel_custom_nav_border_radius',
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
					'{{WRAPPER}} .flip-custom-nav' => 'border-radius: {{SIZE}}px;',
				],
			]
		);

		$this->add_control(
			'bddex_flip_carousel_custom_nav_color',
			[
				'label' => esc_html__( 'Icon Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#42418e',
				'selectors' => [
					'{{WRAPPER}} .flip-custom-nav' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bddex_flip_carousel_custom_nav_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .flip-custom-nav' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'bddex_flip_carousel_custom_nav_border',
				'label' => esc_html__( 'Border', 'avas-core' ),
				'selector' => '{{WRAPPER}} .flip-custom-nav',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'bddex_flip_carousel_custom_navl_shadow',
				'selector' => '{{WRAPPER}} .flip-custom-nav',
			]
		);
		
		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Flip Carousel Content Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'bddex_section_filp_carousel_content_style_settings',
			[
				'label' => esc_html__( 'Color &amp; Typography', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'bddex_flip_carousel_content_heading',
			[
				'label' => esc_html__( 'Content Style', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'bddex_filp_carousel_content_color',
			[
				'label' => esc_html__( 'Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#4d4d4d',
				'selectors' => [
					'{{WRAPPER}} .flip-carousel-text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'bddex_flip_carousel_content_typography',
				'selector' => '{{WRAPPER}} .flip-carousel-text',
			]
		);
		
		$this->end_controls_section();



	}


	protected function render( ) {
		
   	$settings = $this->get_settings();
    $flipbox_image = $this->get_settings( 'bddex_flipbox_image' );
	$flipbox_image_url = Group_Control_Image_Size::get_attachment_image_src( $flipbox_image['id'], 'thumbnail', $settings );	

	// Loop Value
	if( 'true' == $settings['bddex_flip_carousel_loop'] ) : $bddex_loop = 'true'; else: $bddex_loop = 'false'; endif;
	// Autoplay Value
	if( 'true' == $settings['bddex_flip_carousel_autoplay'] ) : $bddex_autoplay = $settings['bddex_flip_carousel_autoplay_time']; else: $bddex_autoplay = 'false'; endif;
	// Pause On Hover Value
	if( 'true' == $settings['bddex_flip_carousel_pause_on_hover'] ) : $bddex_pause_hover = 'true'; else: $bddex_pause_hover = 'false'; endif;
	// Click Value
	if( 'true' == $settings['bddex_flip_carousel_click'] ) : $bddex_click = 'true'; else: $bddex_click = 'false'; endif;
	// Scroll Wheel Value
	if( 'true' == $settings['bddex_flip_carousel_scrollwheel'] ) : $bddex_wheel = 'true'; else: $bddex_wheel = 'false'; endif;
	// Touch Play Value
	if( 'true' == $settings['bddex_flip_carousel_touch'] ) : $bddex_touch = 'true'; else: $bddex_touch = 'false'; endif;
	// Navigator Value
	if( 'true' == $settings['bddex_flip_carousel_button'] ) : $bddex_buttons = 'true'; else: $bddex_buttons = 'false'; endif;
	if( 'true' == $settings['bddex_flip_carousel_custom_nav'] ) : $bddex_custom_buttons = 'custom';else: $bddex_custom_buttons = ''; endif; 
	// Start Value
	if( 'true' == $settings['bddex_flip_carousel_start_from'] ) : $bddex_start = 'center'; else: $bddex_start = (int) $settings['bddex_flip_carousel_starting_number']; endif;
	
	
	?>
	<div class="bddex-flip-carousel flip-carousel-<?php echo esc_attr( $this->get_id() ); ?>">
	    <ul class="flip-items">
	    	<?php foreach( $settings['bddex_flip_carousel_slides'] as $slides ) : 
	    	?>
		        <li>
		        	<?php if( 'true' == $slides['bddex_flip_carousel_enable_slide_link'] ) : 
		        		$bddex_slide_link = $slides['bddex_flip_carousel_slide_link']['url']; 
		        		$target = $slides['bddex_flip_carousel_slide_link']['is_external'] ? 'target="_blank"' : '';
		        		$nofollow = $slides['bddex_flip_carousel_slide_link']['nofollow'] ? 'rel="nofollow"' : '';
		        		?>
						<a href="<?php echo esc_url($bddex_slide_link); ?>" <?php echo $target; ?> <?php echo $nofollow; ?>><img src="<?php echo $slides['bddex_flip_carousel_slide']['url'] ?>"></a>
		            	<?php if( $slides['bddex_flip_carousel_slide_text'] !='' ) : ?>
		            		<p class="flip-carousel-text"><?php echo esc_html__( $slides['bddex_flip_carousel_slide_text'] ); ?></p>
		        		<?php endif; ?>
		        	<?php else: ?>
						<img src="<?php echo $slides['bddex_flip_carousel_slide']['url'] ?>">
		            	<?php if( $slides['bddex_flip_carousel_slide_text'] !='' ) : ?>
		            		<p class="flip-carousel-text"><?php echo esc_html__( $slides['bddex_flip_carousel_slide_text'] ); ?></p>
		        		<?php endif; ?>
		        	<?php endif; ?>
		            
		        </li>
	    	<?php endforeach; ?>
	    </ul>
	</div>

	<script>
		jQuery( document ).ready( function($) {
			$(".flip-carousel-<?php echo esc_attr( $this->get_id() ); ?>").flipster({
	      		style: '<?php echo esc_attr( $settings['bddex_flip_carousel_type'] ); ?>',
	      		start: <?php if( !(int) $bddex_start ) : ?>'<?php echo $bddex_start; ?>'<?php else: echo $bddex_start - 1; endif; ?>,
	      		fadeIn: <?php echo esc_attr( (int) $settings['bddex_flip_carousel_fade_in'] ); ?>,
	      		loop: <?php echo $bddex_loop; ?>,
	      		autoplay: <?php echo $bddex_autoplay; ?>,
	      		pauseOnHover: <?php echo $bddex_pause_hover; ?>,
	      		spacing: <?php echo esc_attr( $settings['bddex_flip_carousel_spacing']['size'] ); ?>,
	      		click: <?php echo $bddex_click; ?>,
	      		scrollwheel: <?php echo $bddex_wheel; ?>,
	      		touch: <?php echo $bddex_touch; ?>,
	      		<?php if( $bddex_custom_buttons == '' ) : ?>
	      			buttons: <?php echo $bddex_buttons; ?>,
	      		<?php elseif( $bddex_custom_buttons == 'custom' ): ?>
	      			buttons: '<?php echo $bddex_custom_buttons; ?>',
	      		<?php endif; ?>
	      		buttonPrev: '<i class="flip-custom-nav <?php echo esc_attr( $settings['bddex_flip_carousel_custom_nav_prev'] ); ?>"></i>',
	      		buttonNext: '<i class="flip-custom-nav <?php echo esc_attr( $settings['bddex_flip_carousel_custom_nav_next'] ); ?>"></i>',
	    	});
		});

		
	</script>

	<?php
	}

	protected function content_template() {
		
		?>
		
	
		<?php
	}
}


Plugin::instance()->widgets_manager->register_widget_type( new Widget_bddex_Flip_Carousel() );