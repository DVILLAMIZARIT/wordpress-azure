<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.


class bddex_profile_carousel extends Widget_Base {

	public function get_name() {
		return 'bddex-profile-carousel';
	}

	public function get_title() {
		return esc_html__( 'Avas Profile Carousel ', 'avas-core' );
	}

	public function get_icon() {
		return 'fa fa-users';
	}

   public function get_categories() {
		return [ 'bddex' ];
	}
	
	
	protected function _register_controls() {


  		$this->start_controls_section(
  			'bddex_section_pc_content',
  			[
  				'label' => esc_html__( 'Content', 'avas-core' )
  			]
  		);


		$this->add_control(
			'bddex_testimonial_slider_item',
			[
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'bddex_testimonial_name' => 'John Smith',
					],
					[
						'bddex_testimonial_name' => 'Sarah Vertefeuille',
					],
					[
						'bddex_testimonial_name' => 'Leona Doe',
					],
					[
						'bddex_testimonial_name' => 'James Cole',
					],
					[
						'bddex_testimonial_name' => 'Donna Gomez',
					],

				],
				'fields' => [

					[
						'name' => 'bddex_testimonial_enable_avatar',
						'label' => esc_html__( 'Display Avatar?', 'avas-core' ),
						'type' => Controls_Manager::SWITCHER,
						'default' => 'yes',
					],
					[
						'name' => 'bddex_testimonial_image',
						'label' => esc_html__( 'Avatar', 'avas-core' ),
						'type' => Controls_Manager::MEDIA,
						'default' => [
							'url' => Utils::get_placeholder_image_src(),
						],
						'condition' => [
							'bddex_testimonial_enable_avatar' => 'yes',
						],
					],
					[
						'name' => 'bddex_testimonial_name',
						'label' => esc_html__( 'User Name', 'avas-core' ),
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__( 'John Smith', 'avas-core' ),
					],
					[
                        'name'  => 'bddex_name_link',
                        'label' => esc_html__( 'Link', 'avas-core' ),
                        'type'  => Controls_Manager::URL,
                        'placeholder' => 'Enter link',
                        'default'     => [
                            'url' => '',
                        ],
                    ],
					[
						'name' => 'bddex_p_c_job_title',
						'label' => esc_html__( 'Job Title', 'avas-core' ),
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__( 'Envato', 'avas-core' ),
					],
					[
						'name' => 'bddex_testimonial_description',
						'label' => esc_html__( 'Description', 'avas-core' ),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__( 'Add description here. Edit and place your own text.', 'avas-core' ),
					],
					[
                        'name' => 'social_profile',
                        'label' => esc_html__('Social Profile', 'avas'),
                        'type' => Controls_Manager::HEADING,
                    ],
                    [
                        'type' => Controls_Manager::TEXT,
                        'name' => 'email',
                        'label' => esc_html__('Email', 'avas'),
                    ],

                    [
                        'type' => Controls_Manager::TEXT,
                        'name' => 'facebook_url',
                        'label' => esc_html__('Facebook', 'avas'),
                    ],

                    [
                        'type' => Controls_Manager::TEXT,
                        'name' => 'twitter_url',
                        'label' => esc_html__('Twitter', 'avas'),
                    ],

                    [
                        'type' => Controls_Manager::TEXT,
                        'name' => 'google_plus_url',
                        'label' => esc_html__('GooglePlus', 'avas'),
                    ],

                    [
                        'type' => Controls_Manager::TEXT,
                        'name' => 'linkedin_url',
                        'label' => esc_html__('LinkedIn', 'avas'),
                    ],

                    [
                        'type' => Controls_Manager::TEXT,
                        'name' => 'instagram_url',
                        'label' => esc_html__('Instagram', 'avas'),
                    ],

                    [
                        'type' => Controls_Manager::TEXT,
                        'name' => 'pinterest_url',
                        'label' => esc_html__('Pinterest', 'avas'),
                    ],

                    [
                        'type' => Controls_Manager::TEXT,
                        'name' => 'dribbble_url',
                        'label' => esc_html__('Dribbble', 'avas'),
                    ],

				],
				'title_field' => '{{{bddex_testimonial_name}}}',
			]
		);



		$this->end_controls_section();

		
		
		$this->start_controls_section(
			'bddex_section_testimonial_slider_settings',
			[
				'label' => esc_html__( 'Settings', 'avas-core' ),
			]
		);

		$this->add_control(
		  'bddex_testimonial_max_item',
		  [
		     'label'   => __( 'Max Visible Item', 'avas-core' ),
		     'type'    => Controls_Manager::NUMBER,
		     'default' => 4,
		     'min'     => 1,
		     'max'     => 100,
		     'step'    => 1,
		  ]
		);

		$this->add_control(
		  'bddex_testimonial_slide_item',
		  [
		     'label'   => __( 'Slide to Scroll', 'avas-core' ),
		     'type'    => Controls_Manager::NUMBER,
		     'default' => 2,
		     'min'     => 1,
		     'max'     => 100,
		     'step'    => 1,
		  ]
		);

		$this->add_control(
		  'bddex_testimonial_max_tab_item',
		  [
		     'label'   => __( 'Max Visible Items for Tablet', 'avas-core' ),
		     'type'    => Controls_Manager::NUMBER,
		     'default' => 1,
		     'min'     => 1,
		     'max'     => 100,
		     'step'    => 1,
		  ]
		);
		
		$this->add_control(
		  'bddex_testimonial_max_mobile_item',
		  [
		     'label'   => __( 'Max Visible Items for Mobile', 'avas-core' ),
		     'type'    => Controls_Manager::NUMBER,
		     'default' => 1,
		     'min'     => 1,
		     'max'     => 100,
		     'step'    => 1,
		  ]
		);

		$this->add_control(
		  'bddex_testimonial_slide_speed',
		  [
		     'label'   => __( 'Slide Speed', 'avas-core' ),
		     'type'    => Controls_Manager::NUMBER,
		     'default' => 300,
		     'min'     => 100,
		     'max'     => 3000,
		     'step'    => 100,
		  ]
		);


		$this->add_control(
			'bddex_testimonial_slider_autoplay',
			[
				'label' => esc_html__( 'Autoplay?', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'true',
				'default' => 'false',
			]
		);

		$this->add_control(
			'bddex_testimonial_slider_infinite',
			[
				'label' => esc_html__( 'Infinite Loop?', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'true',
				'default' => 'false',
			]
		);

		$this->add_control(
			'bddex_testimonial_slider_pause_hover',
			[
				'label' => esc_html__( 'Pause on Hover?', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'true',
				'default' => 'false',
			]
		);

		$this->add_control(
			'bddex_testimonial_slide_draggable',
			[
				'label' => esc_html__( 'Draggable?', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'true',
				'default' => 'true',
			]
		);

		$this->add_control(
			'bddex_testimonial_slide_variable_width',
			[
				'label' => esc_html__( 'Variable Width?', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'true',
				'default' => 'false',
			]
		);

		$this->add_control(
			'bddex_testimonial_slider_navigation',
			[
				'label' => esc_html__( 'Navigation & Pagination', 'avas-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'prev-next',
				'options' => [
					'none' => esc_html__( 'None', 'avas-core' ),
					'dots' => esc_html__( 'Dots Only', 'avas-core' ),
					'prev-next' => esc_html__( 'Prev/Next Only', 'avas-core' ),
					'dots-nav' => esc_html__( 'Dots & Prev/Next', 'avas-core' ),
				],
			]
		);

		$this->add_control(
			'bddex_testimonial_slider_navigation_position',
			[
				'label' => esc_html__( 'Navigation & Pagination', 'avas-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'nav-top-right',
				'options' => [
					'nav-left-right' => esc_html__( 'Normal (Left Right)', 'avas-core' ),
					'nav-top-left' => esc_html__( 'Navigation Top Left', 'avas-core' ),
					'nav-top-right' => esc_html__( 'Navigation Top Right', 'avas-core' ),
				],
				'condition' => [
					'bddex_testimonial_slider_navigation!' => 'none',
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'bddex_section_testimonial_styles_general',
			[
				'label' => esc_html__( 'Styles', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'bddex_testimonial_background',
			[
				'label' => esc_html__( 'Background Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-testimonial-item' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bddex_testimonial_alignment',
			[
				'label' => esc_html__( 'Set Alignment', 'avas-core' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => true,
				'options' => [
					'bddex-p-c-align-left' => [
						'title' => esc_html__( 'Left', 'avas-core' ),
						'icon' => 'fa fa-align-left',
					],
					'bddex-p-c-align-centered' => [
						'title' => esc_html__( 'Center', 'avas-core' ),
						'icon' => 'fa fa-align-center',
					],
					'bddex-p-c-align-right' => [
						'title' => esc_html__( 'Right', 'avas-core' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'bddex-p-c-align-centered',
			]
		);

		$this->add_responsive_control(
			'bddex_testimonial_margin',
			[
				'label' => esc_html__( 'Margin', 'avas-core' ),
				'description' => 'Need to refresh the page to see the change properly',
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .bddex-testimonial-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'bddex_testimonial_padding',
			[
				'label' => esc_html__( 'Padding', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .bddex-testimonial-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'bddex_testimonial_border',
				'label' => esc_html__( 'Border', 'avas-core' ),
				'selector' => '{{WRAPPER}} .bddex-testimonial-item',
			]
		);

		$this->add_control(
			'bddex_testimonial_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .bddex-testimonial-item' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
				],
			]
		);
		$this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'bddex_p_c_box_shadow',
                'selector' => '{{WRAPPER}} .bddex-profile-carousel-content',
            ]
        );
		$this->add_responsive_control(
			'bddex_p_c_content_padding',
			[
				'label' => esc_html__( 'Content Padding', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .bddex-profile-carousel-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'bddex_section_testimonial_image_styles',
			[
				'label' => esc_html__( 'Image Style', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);		

		$this->add_responsive_control(
			'bddex_testimonial_image_width',
			[
				'label' => esc_html__( 'Image Width', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 280,
					'unit' => 'px',
				],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'size_units' => [ '%', 'px' ],
				'selectors' => [
					'{{WRAPPER}} .bddex-profile-carousel-image img' => 'width:{{SIZE}}{{UNIT}};',
				],
			]
		);


		$this->add_responsive_control(
			'bddex_testimonial_image_margin',
			[
				'label' => esc_html__( 'Margin', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bddex-profile-carousel-image img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'bddex_testimonial_image_padding',
			[
				'label' => esc_html__( 'Padding', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .bddex-profile-carousel-image img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'bddex_testimonial_image_border',
				'label' => esc_html__( 'Border', 'avas-core' ),
				'selector' => '{{WRAPPER}} .bddex-profile-carousel-image img',
			]
		);

		$this->add_control(
			'bddex_testimonial_image_rounded',
			[
				'label' => esc_html__( 'Rounded Avatar?', 'avas-core' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'testimonial-avatar-rounded',
				'default' => '',
			]
		);


		$this->add_control(
			'bddex_testimonial_image_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .bddex-profile-carousel-image img' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
				],
				'condition' => [
					'bddex_testimonial_image_rounded!' => 'testimonial-avatar-rounded',
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'bddex_section_testimonial_typography',
			[
				'label' => esc_html__( 'Color &amp; Typography', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);


		$this->add_control(
			'bddex_testimonial_name_color',
			[
				'label' => esc_html__( 'Name Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#272727',
				'selectors' => [
					'{{WRAPPER}} .bddex-profile-carousel-content .bddex-p-c-name a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'bddex_testimonial_name_hov_color',
			[
				'label' => esc_html__( 'Name Hover Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#000',
				'selectors' => [
					'{{WRAPPER}} .bddex-profile-carousel-content .bddex-p-c-name a:hover' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'bddex_testimonial_name_typography',
				'selector' => '{{WRAPPER}} .bddex-profile-carousel-content .bddex-p-c-name',
			]
		);


		$this->add_control(
			'bddex_p_c_job_title_color',
			[
				'label' => esc_html__( 'Job Title Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#272727',
				'selectors' => [
					'{{WRAPPER}} .bddex-profile-carousel-content .bddex-p-c-job-title' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'bddex_testimonial_position_typography',
				'selector' => '{{WRAPPER}} .bddex-profile-carousel-content .bddex-p-c-job-title',
			]
		);


		$this->add_control(
			'bddex_testimonial_description_color',
			[
				'label' => esc_html__( 'Description text Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#7a7a7a',
				'selectors' => [
					'{{WRAPPER}} .bddex-profile-carousel-content .bddex-testimonial-text' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'bddex_testimonial_description_typography',
				'selector' => '{{WRAPPER}} .bddex-profile-carousel-content .bddex-testimonial-text',
			]
		);

		$this->end_controls_section();
		$this->start_controls_section(
            'section_social_icon_styling',
            [
                'label' => esc_html__('Social Icons', 'avas'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'social_icon_size',
            [
                'label' => esc_html__('Icon size in pixels', 'avas'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em' ],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 128,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .bddex-social-list i' => 'font-size: {{SIZE}}{{UNIT}};'
                ],
            ]
        );

        $this->add_control(
            'social_icon_spacing',
            [
                'label' => esc_html__('Spacing', 'avas'),
                'description' => esc_html__('Space between icons.', 'avas'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'default' => [
                    'top' => 0,
                    'right' => 5,
                    'bottom' => 0,
                    'left' => 5,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .bddex-social-list .bddex-social-list-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'isLinked' => false
            ]
        );

        $this->add_control(
            'social_icon_color',
            [
                'label' => esc_html__('Icon Color', 'avas'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bddex-social-list .bddex-social-list-item i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'social_icon_hover_color',
            [
                'label' => esc_html__('Icon Hover Color', 'avas'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bddex-social-list .bddex-social-list-item i:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
		$this->start_controls_section(
			'bddex_section_testimonial_navigation_style',
			[
				'label' => esc_html__( 'Navigation/Pagination Style', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);


		$this->add_control(
			'bddex_testimonial_navigation_color',
			[
				'label' => esc_html__( 'Navigation Color (Arrows & Bullets)', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .bddex-testimonial-slider .slick-prev::before' => 'color: {{VALUE}};',
					'{{WRAPPER}} .bddex-testimonial-slider .slick-next::before' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bddex_testimonial_navigation_bg',
			[
				'label' => esc_html__( 'Navigation Background Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#333',
				'selectors' => [
					'{{WRAPPER}} .bddex-testimonial-slider .slick-dots li button::before' => 'color: {{VALUE}};',
					'{{WRAPPER}} .bddex-testimonial-slider .slick-dots li.slick-active button::before' => 'color: {{VALUE}};',
					'{{WRAPPER}} .bddex-testimonial-slider .slick-prev' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bddex-testimonial-slider .slick-next' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'bddex_testimonial_slider_bullet_size',
			[
				'label' => esc_html__( 'Bullet Size', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 12,
					'unit' => 'px',
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .bddex-testimonial-slider .slick-dots li button::before' => 'font-size:{{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'bddex_testimonial_slider_active_bullet_size',
			[
				'label' => esc_html__( 'Active Bullet Size', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 18,
					'unit' => 'px',
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .bddex-testimonial-slider .slick-dots li.slick-active button::before' => 'font-size:{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	}


	protected function render( ) {
		
      $settings = $this->get_settings();
	  $testimonial_classes = $this->get_settings('bddex_testimonial_image_rounded') . " " . $this->get_settings('bddex_testimonial_alignment');
	  $navigation_type = $this->get_settings('bddex_testimonial_slider_navigation');

	// Pagination type
	switch ( $navigation_type ) {
	  case 'dots':
	    $dots = 'true';
	    $nav  = 'false';
	    break;

	  case 'prev-next':
	    $dots = 'false';
	    $nav  = 'true';
	    break;

	  case 'dots-nav':
	    $dots = 'true';
	    $nav  = 'true';
	    break;

	  default: // NONE
	    $nav  = 'false';
	    $dots = 'false';
	    break;
	}

	$auto_play 		  = ( ($settings['bddex_testimonial_slider_autoplay'] 	  == 'true') ? "true" : "false" );
	$infinite    	  = ( ($settings['bddex_testimonial_slider_infinite']   	  == 'true') ? "true" : "false" );
	$pause_hover 	  = ( ($settings['bddex_testimonial_slider_pause_hover']   == 'true') ? "true" : "false" );
	$draggable   	  = ( ($settings['bddex_testimonial_slide_draggable'] 	  == 'true') ? "true" : "false" );
	$variable_width   = ( ($settings['bddex_testimonial_slide_variable_width'] == 'true') ? "true" : "false" );

	?>

	<div id="bddex-testimonial-<?php echo esc_attr($this->get_id()); ?>" class="bddex-testimonial-slider <?php echo $settings['bddex_testimonial_slider_navigation_position'];?>">
		<?php foreach ( $settings['bddex_testimonial_slider_item'] as $item ) : ?>
		<div class="bddex-testimonial-item clearfix <?php echo $testimonial_classes; ?>">

			<?php if ( $item['bddex_testimonial_enable_avatar'] == 'yes' ) : ?>
			<div class="bddex-profile-carousel-image">
				<figure>
  					<?php $image = $item['bddex_testimonial_image']; ?>
  					<img src="<?php echo $image['url'];?>" alt="<?php echo esc_attr( $item['bddex_testimonial_name'] ); ?>">	
				</figure>
			</div>
			<?php endif; ?>
			<div class="bddex-profile-carousel-content <?php echo esc_attr( $settings['bddex_testimonial_alignment'] ); ?>" <?php if ( $item['bddex_testimonial_enable_avatar'] == '' ) : ?> style="width: 100%;" <?php endif; ?> >
				<?php if($item['bddex_name_link']['is_external']) { ?> 
				<h4 class="bddex-p-c-name"><a href="<?php echo ($item['bddex_name_link']['url']); ?>" target="_blank""><?php echo esc_attr( $item['bddex_testimonial_name'] ); ?></a></h4>
				<?php }else{ ?>
				<h4 class="bddex-p-c-name"><a href="<?php echo ($item['bddex_name_link']['url']); ?>"><?php echo esc_attr( $item['bddex_testimonial_name'] ); ?></a></h4>
				<?php } ?>
				<p class="bddex-p-c-job-title"><?php echo esc_attr( $item['bddex_p_c_job_title'] ); ?></p>
				<p class="bddex-testimonial-text"><?php echo $item['bddex_testimonial_description']; ?></p>
				 <?php $this->social_profile($item) ?>
			</div>
		</div>
		<?php endforeach; ?>
	</div>

<script type="text/javascript">

  jQuery(document).ready(function($) {
    $("#bddex-testimonial-<?php echo esc_attr($this->get_id()); ?>").slick({
      autoplay: <?php echo $auto_play;?>,
      infinite: <?php echo $infinite;?>,
      speed: <?php echo $settings['bddex_testimonial_slide_speed'];?>,
      slidesToShow: <?php echo $settings['bddex_testimonial_max_item'];?>,
      slidesToScroll: <?php echo $settings['bddex_testimonial_slide_item'];?>,
      arrows: <?= $nav ?>,
      dots: <?= $dots ?>,
      pauseOnHover: <?php echo $pause_hover;?>,
      draggable: <?php echo $draggable;?>,
      variableWidth: <?php echo $variable_width;?>,
      responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: <?php echo $settings['bddex_testimonial_max_tab_item'];?>,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: <?php echo $settings['bddex_testimonial_max_mobile_item'];?>,
        slidesToScroll: 1
      }
    }
  ]
    });
  });
</script> 

	<?php
	
	}
	 private function social_profile($item) {
        ?>

        <div class="bddex-social-wrap">

            <div class="bddex-social-list">

                <?php

                $email = $item['email'];
                $facebook_url = $item['facebook_url'];
                $twitter_url = $item['twitter_url'];
                $linkedin_url = $item['linkedin_url'];
                $dribbble_url = $item['dribbble_url'];
                $pinterest_url = $item['pinterest_url'];
                $googleplus_url = $item['google_plus_url'];
                $instagram_url = $item['instagram_url'];


                if ($email) :
                    echo '<div class="bddex-social-list-item"><a class="bddex-email" href="mailto:' . $email . '" title="' . esc_html__("Send an email", 'avas') . '"><i class="lae-icon-email"></i></a></div>';
                endif;
                if ($facebook_url) :
                    echo '<div class="bddex-social-list-item"><a class="bddex-facebook" href="' . $facebook_url . '" target="_blank"><i class="lae-icon-facebook"></i></a></div>';
                endif;
                if ($twitter_url) :
                    echo '<div class="bddex-social-list-item"><a class="bddex-twitter" href="' . $twitter_url . '" target="_blank"><i class="lae-icon-twitter"></i></a></div>';
                endif;
                if ($linkedin_url) :
                    echo '<div class="bddex-social-list-item"><a class="bddex-linkedin" href="' . $linkedin_url . '" target="_blank"><i class="lae-icon-linkedin"></i></a></div>';
                endif;
                if ($googleplus_url) :
                    echo '<div class="bddex-social-list-item"><a class="bddex-googleplus" href="' . $googleplus_url . '" target="_blank"><i class="lae-icon-googleplus"></i></a></div>';
                endif;
                if ($instagram_url) :
                    echo '<div class="bddex-social-list-item"><a class="bddex-instagram" href="' . $instagram_url . '" target="_blank"><i class="lae-icon-instagram"></i></a></div>';
                endif;
                if ($pinterest_url) :
                    echo '<div class="bddex-social-list-item"><a class="bddex-pinterest" href="' . $pinterest_url . '" target="_blank" ><i class="lae-icon-pinterest"></i></a></div>';
                endif;
                if ($dribbble_url) :
                    echo '<div class="bddex-social-list-item"><a class="bddex-dribbble" href="' . $dribbble_url . '" target="_blank" title="' . esc_html__("View Dribbble Portfolio", 'avas') . '"><i class="lae-icon-dribbble"></i></a></div>';
                endif;

                ?>

            </div>

        </div>
        <?php
    }
	protected function content_template() {
		
		?>
		
	
		<?php
	}
}


Plugin::instance()->widgets_manager->register_widget_type( new bddex_profile_carousel() );