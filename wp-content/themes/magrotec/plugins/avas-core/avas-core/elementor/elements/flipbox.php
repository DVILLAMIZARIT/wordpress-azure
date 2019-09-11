<?php 
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Widget_bddex_Flip_Box extends Widget_Base {

	public function get_name() {
		return 'bddex-flip-box';
	}

	public function get_title() {
		return esc_html__( 'Avas Flip Box', 'avas-core' );
	}

	public function get_icon() {
		return 'eicon-flip-box';
	}

   public function get_categories() {
		return [ 'bddex' ];
	}
	
	protected function _register_controls() {

  		/**
  		 * Flipbox Image Settings
  		 */
  		$this->start_controls_section(
  			'bddex_section_flipbox_content_settings',
  			[
  				'label' => esc_html__( 'Flipbox Settings', 'avas-core' )
  			]
  		);

  		$this->add_control(
		  'bddex_flipbox_type',
		  	[
		   	'label'       	=> esc_html__( 'Flipbox Type', 'avas-core' ),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'animate-left',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'animate-left'  		=> esc_html__( 'Flip Left', 'avas-core' ),
		     		'animate-right' 		=> esc_html__( 'Flip Right', 'avas-core' ),
		     		'animate-up' 			=> esc_html__( 'Flip Top', 'avas-core' ),
		     		'animate-down' 		=> esc_html__( 'Flip Bottom', 'avas-core' ),
		     		'animate-zoom-in' 	=> esc_html__( 'Zoom In', 'avas-core' ),
		     		'animate-zoom-out' 	=> esc_html__( 'Zoom Out', 'avas-core' ),
		     	],
		  	]
		);

		$this->add_responsive_control(
			'bddex_flipbox_img_or_icon',
			[
				'label' => esc_html__( 'Image or Icon', 'avas-core' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => true,
				'options' => [
					'img' => [
						'title' => esc_html__( 'Image', 'avas-core' ),
						'icon' => 'fa fa-picture-o',
					],
					'icon' => [
						'title' => esc_html__( 'Icon', 'avas-core' ),
						'icon' => 'fa fa-info-circle',
					],
				],
				'default' => 'icon',
			]
		);
		/**
		 * Condition: 'bddex_flipbox_img_or_icon' => 'img'
		 */
		$this->add_control(
			'bddex_flipbox_image',
			[
				'label' => esc_html__( 'Flipbox Image', 'avas-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'bddex_flipbox_img_or_icon' => 'img'
				]
			]
		);

		$this->add_control(
			'bddex_flipbox_image_resizer',
			[
				'label' => esc_html__( 'Image Resizer', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => '100'
				],
				'range' => [
					'px' => [
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-elements-flip-box-icon-image img' => 'width: {{SIZE}}px;',
				],
				'condition' => [
					'bddex_flipbox_img_or_icon' => 'img'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail',
				'default' => 'full',
				'condition' => [
					'bddex_flipbox_image[url]!' => '',
				],
				'condition' => [
					'bddex_flipbox_img_or_icon' => 'img'
				]
			]
		);
		/**
		 * Condition: 'bddex_flipbox_img_or_icon' => 'icon'
		 */
		$this->add_control(
			'bddex_flipbox_icon',
			[
				'label' => esc_html__( 'Icon', 'avas-core' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-snowflake-o',
				'condition' => [
					'bddex_flipbox_img_or_icon' => 'icon'
				]
			]
		);

		$this->end_controls_section();

		/**
		 * Flipbox Content
		 */
		$this->start_controls_section( 
			'bddex_flipbox_content',
			[
				'label' => esc_html__( 'Flipbox Content', 'avas-core' ),
			]
		);
		$this->add_responsive_control(
			'bddex_flipbox_front_or_back_content',
			[
				'label' => esc_html__( 'Front or Back Content', 'avas-core' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => true,
				'options' => [
					'front' => [
						'title' => esc_html__( 'Front Content', 'avas-core' ),
						'icon' => 'fa fa-reply',
					],
					'back' => [
						'title' => esc_html__( 'Back Content', 'avas-core' ),
						'icon' => 'fa fa-share',
					],
				],
				'default' => 'front',
			]
		);
		/**
		 * Condition: 'bddex_flipbox_front_or_back_content' => 'front'
		 */
		$this->add_control( 
			'bddex_flipbox_front_title',
			[
				'label' => esc_html__( 'Front Title', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Elementor Flipbox', 'avas-core' ),
				'condition' => [
					'bddex_flipbox_front_or_back_content' => 'front'
				]
			]
		);
		$this->add_control( 
			'bddex_flipbox_front_text',
			[
				'label' => esc_html__( 'Front Text', 'avas-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__( 'This is front-end content.', 'avas-core' ),
				'condition' => [
					'bddex_flipbox_front_or_back_content' => 'front'
				]
			]
		);
		/**
		 * Condition: 'bddex_flipbox_front_or_back_content' => 'back'
		 */
		$this->add_control( 
			'bddex_flipbox_back_title',
			[
				'label' => esc_html__( 'Back Title', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Elementor Flipbox', 'avas-core' ),
				'condition' => [
					'bddex_flipbox_front_or_back_content' => 'back'
				]
			]
		);
		$this->add_control( 
			'bddex_flipbox_back_text',
			[
				'label' => esc_html__( 'Back Text', 'avas-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__( 'This is back-end content.', 'avas-core' ),
				'condition' => [
					'bddex_flipbox_front_or_back_content' => 'back'
				]
			]
		);
		$this->add_responsive_control(
			'bddex_flipbox_content_alignment',
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
				'prefix_class' => 'bddex-flipbox-content-align-',
			]
		);
		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Flipbox Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'bddex_section_flipbox_style_settings',
			[
				'label' => esc_html__( 'Filp Box Style', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'bddex_flipbox_front_bg_color',
			[
				'label' => esc_html__( 'Front Background Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#14bcc8',
				'selectors' => [
					'{{WRAPPER}} .bddex-elements-flip-box-front-container' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bddex_flipbox_back_bg_color',
			[
				'label' => esc_html__( 'Back Background Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ff7e70',
				'selectors' => [
					'{{WRAPPER}} .bddex-elements-flip-box-rear-container' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'bddex_flipbox_container_padding',
			[
				'label' => esc_html__( 'Padding', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .bddex-elements-progression-flip-box-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_responsive_control(
			'bddex_flipbox_front_back_padding',
			[
				'label' => esc_html__( 'Fornt / Back Content Padding', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .bddex-elements-flip-box-front-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 					'{{WRAPPER}} .bddex-elements-flip-box-rear-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_responsive_control(
			'bddex_flipbox_container_margin',
			[
				'label' => esc_html__( 'Margin', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .bddex-elements-progression-flip-box-container' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
				[
					'name' => 'bddex_filbpox_border',
					'label' => esc_html__( 'Border Style', 'avas-core' ),
					'selectors' => [
						'{{WRAPPER}} .bddex-elements-flip-box-front-container, {{WRAPPER}} .bddex-elements-flip-box-rear-container'
					],
				]
		);

		$this->add_control(
			'bddex_flipbox_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-elements-progression-flip-box-container' => 'border-radius: {{SIZE}}px;',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'bddex_flipbox_shadow',
				'selector' => '{{WRAPPER}} .bddex-elements-progression-flip-box-container',
			]
		);

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Flip Box Image)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'bddex_section_flipbox_imgae_style_settings',
			[
				'label' => esc_html__( 'Image Style', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
		     		'bddex_flipbox_img_or_icon' => 'img'
		     	]
			]
		);

		$this->add_control(
		  'bddex_flipbox_img_type',
		  	[
		   	'label'       	=> esc_html__( 'Image Type', 'avas-core' ),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'default',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'circle'  	=> esc_html__( 'Circle', 'avas-core' ),
		     		'radius' 	=> esc_html__( 'Radius', 'avas-core' ),
		     		'default' 	=> esc_html__( 'Default', 'avas-core' ),
		     	],
		     	'prefix_class' => 'bddex-flipbox-img-',
		     	'condition' => [
		     		'bddex_flipbox_img_or_icon' => 'img'
		     	]
		  	]
		);

		/**
		 * Condition: 'bddex_flipbox_img_type' => 'radius'
		 */
		$this->add_control(
			'bddex_filpbox_img_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-elements-flip-box-icon-image img' => 'border-radius: {{SIZE}}px;',
				],
				'condition' => [
					'bddex_flipbox_img_or_icon' => 'img',
					'bddex_flipbox_img_type' => 'radius'
				]
			]
		);

		$this->end_controls_section();

		
		$this->start_controls_section(
			'bddex_section_flipbox_icon_style_settings',
			[
				'label' => esc_html__( 'Icon Style', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
		     		'bddex_flipbox_img_or_icon' => 'icon'
		     	]
			]
		);
		$this->add_control(
            'flipbox_icon_size',
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
                    '{{WRAPPER}} .bddex-elements-flip-box-icon-image i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'flipbox_icon_color',
            [
                'label' => esc_html__('Icon Color', 'avas-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bddex-elements-flip-box-icon-image i' => 'color: {{VALUE}};',
                ],
            ]
        );
		$this->add_group_control(
			Group_Control_Border::get_type(),
				[
					'name' => 'bddex_flipbox_border',
					'label' => esc_html__( 'Border', 'avas-core' ),
					'selector' => '{{WRAPPER}} .bddex-elements-flip-box-icon-image',
					'condition' => [
						'bddex_flipbox_img_or_icon' => 'icon'
					]
				]
		);

		$this->add_control(
			'bddex_flipbox_icon_border_padding',
			[
				'label' => esc_html__( 'Border Padding', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-elements-flip-box-icon-image' => 'padding: {{SIZE}}px;',
				],
				'condition' => [
					'bddex_flipbox_img_or_icon' => 'icon'
				]
			]
		);

		$this->add_control(
			'bddex_flipbox_icon_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-elements-flip-box-icon-image' => 'border-radius: {{SIZE}}px;',
				],
				'condition' => [
					'bddex_flipbox_img_or_icon' => 'icon'
				]
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'bddex_section_flipbox_title_style_settings',
			[
				'label' => esc_html__( 'Color &amp; Typography', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_responsive_control(
			'bddex_flipbox_front_back_content_toggler',
			[
				'label' => esc_html__( 'Front or Rear Content', 'avas-core' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => true,
				'options' => [
					'front' => [
						'title' => esc_html__( 'Front Content', 'avas-core' ),
						'icon' => 'fa fa-arrow-left',
					],
					'back' => [
						'title' => esc_html__( 'Rear Content', 'avas-core' ),
						'icon' => 'fa fa-arrow-right',
					],
				],
				'default' => 'front',
			]
		);
		
		$this->add_control(
			'bddex_flipbox_front_title_heading',
			[
				'label' => esc_html__( 'Title Style', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
			]
		);
		/**
		 * Condition: 'bddex_flipbox_front_back_content_toggler' => 'front'
		 */
		$this->add_control(
			'bddex_flipbox_front_title_color',
			[
				'label' => esc_html__( 'Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .bddex-elements-flip-box-front-container .bddex-elements-flip-box-heading' => 'color: {{VALUE}};',
				],
				'condition' => [
					'bddex_flipbox_front_back_content_toggler' => 'front'
				]
			]
		);

		/**
		 * Condition: 'bddex_flipbox_front_back_content_toggler' => 'back'
		 */
		$this->add_control(
			'bddex_flipbox_back_title_color',
			[
				'label' => esc_html__( 'Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .bddex-elements-flip-box-rear-container .bddex-elements-flip-box-heading' => 'color: {{VALUE}};',
				],
				'condition' => [
					'bddex_flipbox_front_back_content_toggler' => 'back'
				]
			]
		);

		/**
		 * Condition: 'bddex_flipbox_front_back_content_toggler' => 'front'
		 */
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
            	'name' => 'bddex_flipbox_front_title_typography',
				'selector' => '{{WRAPPER}} .bddex-elements-flip-box-front-container .bddex-elements-flip-box-heading',
				'condition' => [
					'bddex_flipbox_front_back_content_toggler' => 'front'
				],
			]
		);

		/**
		 * Condition: 'bddex_flipbox_front_back_content_toggler' => 'back'
		 */
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
            	'name' => 'bddex_flipbox_back_title_typography',
				'selector' => '{{WRAPPER}} .bddex-elements-flip-box-rear-container .bddex-elements-flip-box-heading',
				'condition' => [
					'bddex_flipbox_front_back_content_toggler' => 'back'
				],
			]
		);

		/**
		 * Content
		 */
		$this->add_control(
			'bddex_flipbox_content_heading',
			[
				'label' => esc_html__( 'Content Style', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		/**
		 * Condition: 'bddex_flipbox_front_back_content_toggler' => 'front'
		 */
		$this->add_control(
			'bddex_flipbox_front_content_color',
			[
				'label' => esc_html__( 'Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .bddex-elements-flip-box-front-container .bddex-elements-flip-box-content' => 'color: {{VALUE}};',
				],
				'condition' => [
					'bddex_flipbox_front_back_content_toggler' => 'front'
				]
			]
		);

		/**
		 * Condition: 'bddex_flipbox_front_back_content_toggler' => 'back'
		 */
		$this->add_control(
			'bddex_flipbox_back_content_color',
			[
				'label' => esc_html__( 'Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .bddex-elements-flip-box-rear-container .bddex-elements-flip-box-content' => 'color: {{VALUE}};',
				],
				'condition' => [
					'bddex_flipbox_front_back_content_toggler' => 'back'
				]
			]
		);

		/**
		 * Condition: 'bddex_flipbox_front_back_content_toggler' => 'front'
		 */
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
            	'name' => 'bddex_flipbox_front_content_typography',
				'selector' => '{{WRAPPER}} .bddex-elements-flip-box-front-container .bddex-elements-flip-box-content',
				'condition' => [
					'bddex_flipbox_front_back_content_toggler' => 'front'
				]
			]
		);

		/**
		 * Condition: 'bddex_flipbox_front_back_content_toggler' => 'back'
		 */
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
            	'name' => 'bddex_flipbox_back_content_typography',
				'selector' => '{{WRAPPER}} .bddex-elements-flip-box-rear-container .bddex-elements-flip-box-content',
				'condition' => [
					'bddex_flipbox_front_back_content_toggler' => 'back'
				]
			]
		);
		
		$this->end_controls_section();

	}


	protected function render( ) {
		
   		$settings = $this->get_settings();
      	$flipbox_image = $this->get_settings( 'bddex_flipbox_image' );
	  	$flipbox_image_url = Group_Control_Image_Size::get_attachment_image_src( $flipbox_image['id'], 'thumbnail', $settings );
	  	if( empty( $flipbox_image_url ) ) : $flipbox_image_url = $flipbox_image['url']; else: $flipbox_image_url = $flipbox_image_url; endif;

	?>
	
	<div class="bddex-elements-progression-flip-box-container bddex-animate-flip bddex-<?php echo esc_attr( $settings['bddex_flipbox_type'] ); ?>">
	    <div class="bddex-elements-flip-box-flip-card">
	        <div class="bddex-elements-flip-box-front-container">
	            <div class="bddex-elements-slider-display-table">
	                <div class="bddex-elements-flip-box-vertical-align">
	                    <div class="bddex-elements-flip-box-padding">
	                        <div class="bddex-elements-flip-box-icon-image">
	                        	<?php if( 'icon' === $settings['bddex_flipbox_img_or_icon'] ) : ?>
	                           	<i class="<?php echo esc_attr( $settings['bddex_flipbox_icon'] ); ?>"></i>
	                           <?php elseif( 'img' === $settings['bddex_flipbox_img_or_icon'] ): ?>
	                           	<img src="<?php echo esc_url( $flipbox_image_url ); ?>" alt="">
	                           <?php endif; ?>
	                        </div>
	                        <h2 class="bddex-elements-flip-box-heading"><?php echo esc_html__( $settings['bddex_flipbox_front_title'], 'avas-core' ); ?></h2>
	                        <div class="bddex-elements-flip-box-content">
	                           <p><?php echo esc_html__( $settings['bddex_flipbox_front_text'], 'avas-core' ); ?></p>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <div class="bddex-elements-flip-box-rear-container">
	            <div class="bddex-elements-slider-display-table">
	                <div class="bddex-elements-flip-box-vertical-align">
	                    <div class="bddex-elements-flip-box-padding">
	                        <h2 class="bddex-elements-flip-box-heading"><?php echo esc_html__( $settings['bddex_flipbox_back_title'], 'avas-core' ); ?></h2>
	                        <div class="bddex-elements-flip-box-content">
	                           <p><?php echo esc_html__( $settings['bddex_flipbox_back_text'], 'avas-core' ); ?></p>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>

	<?php
	}

	protected function content_template() {
		
		?>
		
	
		<?php
	}
}


Plugin::instance()->widgets_manager->register_widget_type( new Widget_bddex_Flip_Box() );