<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Widget_bddex_Flip_Box_2 extends Widget_Base {

	public function get_name() {
		return 'bddex-flip-box-2';
	}

	public function get_title() {
		return esc_html__( 'Avas Flip Box 2', 'avas-core' );
	}

	public function get_icon() {
		return 'eicon-flip-box';
	}

   public function get_categories() {
		return [ 'bddex' ];
	}
	
	protected function _register_controls() {

  		$this->start_controls_section(
  			'ex_flipbox_icon_flip_settings',
  			[
  				'label' => esc_html__( 'Icon & Flip', 'avas-core' )
  			]
  		);

  		$this->add_responsive_control(
			'ex_flipbox_icon_img',
			[
				'label' => esc_html__( 'Icon / Image', 'avas-core' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => true,
				'options' => [
						'icon' => [
						'title' => esc_html__( 'Icon', 'avas-core' ),
						'icon' => 'fa fa-info-circle',
						],
						'img' => [
							'title' => esc_html__( 'Image', 'avas-core' ),
							'icon' => 'fa fa-picture-o',
						],
					
				],
				'default' => 'icon',
			]
		);

  		$this->add_control(
			'ex_flipbox_icon',
			[
				'label' => esc_html__( 'Icon', 'avas-core' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-smile-o',
				'condition' => [
					'ex_flipbox_icon_img' => 'icon'
				]
			]
		);

		$this->add_control(
			'ex_flipbox_image',
			[
				'label' => esc_html__( 'Flipbox Image', 'avas-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'ex_flipbox_icon_img' => 'img'
				]
			]
		);

		$this->add_control(
			'ex_flipbox_image_resizer',
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
					'{{WRAPPER}} .ex-flip-box-icon-image img' => 'width: {{SIZE}}px;',
				],
				'condition' => [
					'ex_flipbox_icon_img' => 'img'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail',
				'default' => 'full',
				'condition' => [
					'ex_flipbox_image[url]!' => '',
				],
				'condition' => [
					'ex_flipbox_icon_img' => 'img'
				]
			]
		);
		
		$this->add_control(
		  'ex_flipbox_type',
		  	[
		   	'label'       	=> esc_html__( 'Select Flip', 'avas-core' ),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'flip-up',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'flip-left'  		=> esc_html__( 'Flip Left', 'avas-core' ),
		     		'flip-right' 		=> esc_html__( 'Flip Right', 'avas-core' ),
		     		'flip-up' 			=> esc_html__( 'Flip Top', 'avas-core' ),
		     		'flip-down' 		=> esc_html__( 'Flip Bottom', 'avas-core' ),
		     		'flip-zoom-in' 		=> esc_html__( 'Zoom In', 'avas-core' ),
		     		'flip-zoom-out' 	=> esc_html__( 'Zoom Out', 'avas-core' ),
		     	],
		  	]
		);

		$this->end_controls_section();

		$this->start_controls_section( 
			'ex_flipbox_content',
			[
				'label' => esc_html__( 'Content', 'avas-core' ),
			]
		);
		$this->add_responsive_control(
			'ex_flipbox_front_or_back_content',
			[
				'label' => esc_html__( 'Front / Back', 'avas-core' ),
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

		$this->add_control( 
			'ex_flipbox_front_title',
			[
				'label' => esc_html__( 'Front Title', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Front title goes here', 'avas-core' ),
				'condition' => [
					'ex_flipbox_front_or_back_content' => 'front'
				]
			]
		);
		$this->add_control( 
			'ex_flipbox_front_text',
			[
				'label' => esc_html__( 'Front Description', 'avas-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__( 'Front description goes here ...', 'avas-core' ),
				'condition' => [
					'ex_flipbox_front_or_back_content' => 'front'
				]
			]
		);

		$this->add_control( 
			'ex_flipbox_back_icon_switcher',
			[   
                'type' => Controls_Manager::SWITCHER,
                'name' => 'ex_flipbox_back_icon_btn',
                'label' => esc_html__('Icon / Image', 'avas-core'),
                'label_off' => esc_html__('No', 'avas-core'),
                'label_on' => esc_html__('Yes', 'avas-core'),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => [
                	'ex_flipbox_front_or_back_content' => 'back'

                ]
            ]
        );
		$this->add_control( 
			'ex_flipbox_back_title',
			
			[
				'label' => esc_html__( 'Back Title', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Back title goes here', 'avas-core' ),
				'condition' => [
					'ex_flipbox_front_or_back_content' => 'back'
				]
			]
		);
		$this->add_control( 
			'ex_flipbox_back_title_link',
			[
                'name'  => 'flip_title_link',
                'label' => esc_html__( 'Title Link', 'avas-core' ),
                'type'  => Controls_Manager::URL,
                'placeholder' => 'Example: http://your-website.com',
                'default'     => [
                        'url' => '',
                    ],
                'condition' => [
                	'ex_flipbox_front_or_back_content' => 'back'

                ]    
            ]
        );
		$this->add_control( 
			'ex_flipbox_back_text',
			[
				'label' => esc_html__( 'Back Description', 'avas-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__( 'Back description goes here ...', 'avas-core' ),
				'condition' => [
					'ex_flipbox_front_or_back_content' => 'back'
				]
			]
		);
		$this->add_responsive_control(
			'ex_flipbox_content_alignment',
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
				'prefix_class' => 'ex-flipbox-content-align-',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'ex_section_flipbox_style_settings',
			[
				'label' => esc_html__( 'Filp Box Style', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'ex_flipbox_front_bg_color',
			[
				'label' => esc_html__( 'Front Background Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#00AF92',
				'selectors' => [
					'{{WRAPPER}} .ex-flip-box-front-container' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'ex_flipbox_back_bg_color',
			[
				'label' => esc_html__( 'Back Background Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#00CDED',
				'selectors' => [
					'{{WRAPPER}} .ex-flip-box-rear-container' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'ex_flipbox_container_padding',
			[
				'label' => esc_html__( 'Padding', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .ex-progression-flip-box-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_responsive_control(
			'ex_flipbox_front_back_padding',
			[
				'label' => esc_html__( 'Fornt / Back Content Padding', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .ex-flip-box-front-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 					'{{WRAPPER}} .ex-flip-box-rear-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_responsive_control(
			'ex_flipbox_container_margin',
			[
				'label' => esc_html__( 'Margin', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .ex-progression-flip-box-container' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		
		$this->add_group_control(
			Group_Control_Border::get_type(),
				[
					'name' => 'ex_filbpox_border',
					'label' => esc_html__( 'Border Style', 'avas-core' ),
					'selectors' => ['{{WRAPPER}} .ex-flip-box-front-container,{{WRAPPER}} .ex-flip-box-rear-container'],
				]
		);

		$this->add_control(
			'ex_flipbox_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ex-progression-flip-box-container' => 'border-radius: {{SIZE}}px;',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'ex_flipbox_shadow',
				'selector' => '{{WRAPPER}} .ex-progression-flip-box-container',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'ex_section_flipbox_imgae_style_settings',
			[
				'label' => esc_html__( 'Image Style', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
		     		'ex_flipbox_icon_img' => 'img'
		     	]
			]
		);

		$this->add_control(
		  'ex_flipbox_img_type',
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
		     	'prefix_class' => 'ex-flipbox-img-',
		     	'condition' => [
		     		'ex_flipbox_icon_img' => 'img'
		     	]
		  	]
		);

		$this->add_control(
			'ex_filpbox_img_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ex-flip-box-icon-image img' => 'border-radius: {{SIZE}}px;',
				],
				'condition' => [
					'ex_flipbox_icon_img' => 'img',
					'ex_flipbox_img_type' => 'radius'
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'ex_section_flipbox_icon_style_settings',
			[
				'label' => esc_html__( 'Icon Style', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
		     		'ex_flipbox_icon_img' => 'icon'
		     	]
			]
		);
		$this->add_control(
            'ex_flipbox_icon_color',
            [
                'label' => esc_html__('Icon Color', 'avas'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ex-flip-box-icon-image i' => 'color: {{VALUE}};',
                ],
            ]
        );
		$this->add_group_control(
			Group_Control_Border::get_type(),
				[
					'name' => 'ex_flipbox_border',
					'label' => esc_html__( 'Border', 'avas-core' ),
					'selector' => '{{WRAPPER}} .ex-flip-box-icon-image',
					'condition' => [
						'ex_flipbox_icon_img' => 'icon'
					]
				]
		);

		$this->add_control(
			'ex_flipbox_icon_border_padding',
			[
				'label' => esc_html__( 'Border Padding', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ex-flip-box-icon-image' => 'padding: {{SIZE}}px;',
				],
				'condition' => [
					'ex_flipbox_icon_img' => 'icon'
				]
			]
		);

		$this->add_control(
			'ex_flipbox_icon_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ex-flip-box-icon-image' => 'border-radius: {{SIZE}}px;',
				],
				'condition' => [
					'ex_flipbox_icon_img' => 'icon'
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'ex_section_flipbox_title_style_settings',
			[
				'label' => esc_html__( 'Color &amp; Typography', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		// $this->add_responsive_control(
		// 	'ex_flipbox_front_back_content_toggler',
		// 	[
		// 		'label' => esc_html__( 'Front or Rear Content', 'avas-core' ),
		// 		'type' => Controls_Manager::CHOOSE,
		// 		'label_block' => true,
		// 		'options' => [
		// 			'front' => [
		// 				'title' => esc_html__( 'Front Content', 'avas-core' ),
		// 				'icon' => 'fa fa-arrow-left',
		// 			],
		// 			'back' => [
		// 				'title' => esc_html__( 'Rear Content', 'avas-core' ),
		// 				'icon' => 'fa fa-arrow-right',
		// 			],
		// 		],
		// 		'default' => 'front',
		// 	]
		// );
		
		$this->add_control(
			'ex_flipbox_front_title_heading',
			[
				'label' => esc_html__( 'Title Style', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'ex_flipbox_front_title_color',
			[
				'label' => esc_html__( 'Front Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .ex-flip-box-front-container .ex-flip-box-heading' => 'color: {{VALUE}};',
				],
				// 'condition' => [
				// 	'ex_flipbox_front_back_content_toggler' => 'front'
				// ]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
            	'name' => 'ex_flipbox_front_title_typography',
				'selector' => '{{WRAPPER}} .ex-flip-box-front-container .ex-flip-box-heading',
				// 'condition' => [
				// 	'ex_flipbox_front_back_content_toggler' => 'front'
				// ],
			]
		);
		$this->add_control(
			'ex_flipbox_back_title_color',
			[
				'label' => esc_html__( 'Back Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .ex-flip-box-rear-container .ex-flip-box-heading' => 'color: {{VALUE}};',
				],
				// 'condition' => [
				// 	'ex_flipbox_front_back_content_toggler' => 'back'
				// ]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
            	'name' => 'ex_flipbox_back_title_typography',
				'selector' => '{{WRAPPER}} .ex-flip-box-rear-container .ex-flip-box-heading',
				// 'condition' => [
				// 	'ex_flipbox_front_back_content_toggler' => 'back'
				// ],
			]
		);

		$this->add_control(
			'ex_flipbox_content_heading',
			[
				'label' => esc_html__( 'Content Style', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'ex_flipbox_front_content_color',
			[
				'label' => esc_html__( 'Front Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .ex-flip-box-front-container .ex-flip-box-content' => 'color: {{VALUE}};',
				],
				// 'condition' => [
				// 	'ex_flipbox_front_back_content_toggler' => 'front'
				// ]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
            	'name' => 'ex_flipbox_front_content_typography',
				'selector' => '{{WRAPPER}} .ex-flip-box-front-container .ex-flip-box-content',
				// 'condition' => [
				// 	'ex_flipbox_front_back_content_toggler' => 'front'
				// ]
			]
		);
		$this->add_control(
			'ex_flipbox_back_content_color',
			[
				'label' => esc_html__( 'Back Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .ex-flip-box-rear-container .ex-flip-box-content' => 'color: {{VALUE}};',
				],
				// 'condition' => [
				// 	'ex_flipbox_front_back_content_toggler' => 'back'
				// ]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
            	'name' => 'ex_flipbox_back_content_typography',
				'selector' => '{{WRAPPER}} .ex-flip-box-rear-container .ex-flip-box-content',
				// 'condition' => [
				// 	'ex_flipbox_front_back_content_toggler' => 'back'
				// ]
			]
		);
		
		$this->end_controls_section();

	}

	protected function render( ) {
		
   		$settings = $this->get_settings();
      	$flipbox_image = $this->get_settings( 'ex_flipbox_image' );
	  	$flipbox_image_url = Group_Control_Image_Size::get_attachment_image_src( $flipbox_image['id'], 'thumbnail', $settings );
	  	if( empty( $flipbox_image_url ) ) : $flipbox_image_url = $flipbox_image['url']; else: $flipbox_image_url = $flipbox_image_url; endif;

	?>
	
	<div class="ex-progression-flip-box-container ex-flip-flip ex-<?php echo esc_attr( $settings['ex_flipbox_type'] ); ?>">
	    <div class="ex-flip-box-flip-card">
	        <div class="ex-flip-box-front-container">
	            <div class="ex-slider-display-table">
	                <div class="ex-flip-box-vertical-align">
	                    <div class="ex-flip-box-padding">
	                        <div class="ex-flip-box-icon-image">
	                        	<?php if( 'icon' === $settings['ex_flipbox_icon_img'] ) : ?>
	                           	<i class="<?php echo esc_attr( $settings['ex_flipbox_icon'] ); ?>"></i>
	                           <?php elseif( 'img' === $settings['ex_flipbox_icon_img'] ): ?>
	                           	<img src="<?php echo esc_url( $flipbox_image_url ); ?>" alt="">
	                           <?php endif; ?>
	                        </div>
	                        <h3 class="ex-flip-box-heading"><?php echo esc_html__( $settings['ex_flipbox_front_title'], 'avas-core' ); ?></h3>
	                        <div class="ex-flip-box-content">
	                           <p><?php echo esc_html__( $settings['ex_flipbox_front_text'], 'avas-core' ); ?></p>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <div class="ex-flip-box-rear-container">
	            <div class="ex-slider-display-table">
	                <div class="ex-flip-box-vertical-align">
	                    <div class="ex-flip-box-padding">
	                    	<?php if ($settings['ex_flipbox_back_icon_switcher'] == 'yes' ) : ?>
	                    	<div class="ex-flip-box-icon-image">
	                        	<?php if( 'icon' === $settings['ex_flipbox_icon_img'] ) : ?>
	                           	<i class="<?php echo esc_attr( $settings['ex_flipbox_icon'] ); ?>"></i>
	                           <?php elseif( 'img' === $settings['ex_flipbox_icon_img'] ): ?>
	                           	<img src="<?php echo esc_url( $flipbox_image_url ); ?>" alt="">
	                           <?php endif; ?>
	                        </div>
	                    	<?php endif; ?>
	                    	<?php if($settings['ex_flipbox_back_title_link']['is_external']) { ?>    
    						<a class="ex-title" href="<?php echo $settings['ex_flipbox_back_title_link']['url']; ?>" target="_blank">
	                        <h3 class="ex-flip-box-heading"><?php echo esc_html__( $settings['ex_flipbox_back_title'], 'avas-core' ); ?></h3>
	                    	</a>
	                    	<?php }else{ ?>
                    		<a class="ex-title" href="<?php echo $settings['ex_flipbox_back_title_link']['url']; ?>">
                    		<h3 class="ex-flip-box-heading"><?php echo esc_html__( $settings['ex_flipbox_back_title'], 'avas-core' ); ?></h3>
	                    	</a>
	                    	<?php } ?>	
	                        <div class="ex-flip-box-content">
	                           <p><?php echo esc_html__( $settings['ex_flipbox_back_text'], 'avas-core' ); ?></p>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>

	<?php
	}

	protected function content_template() {}
}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_bddex_Flip_Box_2() );