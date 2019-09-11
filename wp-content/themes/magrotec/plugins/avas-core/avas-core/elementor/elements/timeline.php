<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Bddex_Timeline extends Widget_Base {

	public function get_name() {
		return 'avas-timeline';
	}

	public function get_title() {
		return esc_html__( 'Avas Timeline', 'avas-core' );
	}

	public function get_icon() {
		return 'eicon-time-line';
	}

	public function get_categories() {
		return [ 'bddex' ];
	}

	protected function _register_controls() {
		/**
		 * Custom Timeline Settings
		 */
		$this->start_controls_section(
			'bddex_section_custom_timeline_settings',
			[
				'label' => esc_html__( 'Timeline Content', 'avas-core' )
			]
		);

		$this->add_control(
		  'bddex_content_timeline_choose',
		  	[
		   	'label'       	=> esc_html__( 'Content Source', 'avas-core' ),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'dynamic',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'custom'  	=> esc_html__( 'Custom', 'avas-core' ),
		     		'dynamic'  	=> esc_html__( 'Dynamic', 'avas-core' ),
		     	],
		  	]
		);

		$this->end_controls_section();
		/**
		 * Custom Content
		 */
		$this->start_controls_section(
			'bddex_section_custom_content_settings',
			[
				'label' => esc_html__( 'Custom Content Settings', 'avas-core' ),
				'condition' => [
					'bddex_content_timeline_choose' => 'custom'
				]
			]
		);

		$this->add_control(
			'bddex_coustom_content_posts',
			[
				'type' => Controls_Manager::REPEATER,
				'seperator' => 'before',
				'default' => [
					[
						'bddex_custom_title' => esc_html__( 'Avas Multi Purpose Theme', 'avas-core' ),
						'bddex_custom_excerpt' => esc_html__( 'Them most customizable WordPress Theme.', 'avas-core' ),
						'bddex_custom_post_date' => 'May 01, 2018',
						'bddex_read_more_text_link' => '#',
						'bddex_show_custom_read_more' => '1',
						'bddex_show_custom_read_more_text' => 'Read More',
					],
				],
				'fields' => [
					[
						'name' => 'bddex_custom_title',
						'label' => esc_html__( 'Title', 'avas-core' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'default' => esc_html__( 'Avas Multi Purpose Theme', 'avas-core' )
					],
					[
						'name' => 'bddex_custom_excerpt',
		 				'label' => esc_html__( 'Content', 'avas-core' ),
		 				'type' => Controls_Manager::TEXTAREA,
		 				'label_block' => true,
		 				'default' => esc_html__( 'Them most customizable WordPress Theme.', 'avas-core' ),
		 			],
		 			[
		     			'name' => 'bddex_custom_post_date',
		     			'label' => esc_html__( 'Post Date', 'avas-core' ),
		     			'type' => Controls_Manager::TEXT,
		     			'default' => esc_html__( 'Nov 09, 2017', 'avas-core' ),
		  			],
					[
						'name' => 'bddex_show_custom_image_or_icon',
		                'label' => esc_html__( 'Show Circle Image / Icon', 'avas-core' ),
		                'type' => Controls_Manager::CHOOSE,
		                'options' => [
							'img' => [
								'title' => esc_html__( 'Image', 'avas-core' ),
								'icon' => 'fa fa-picture-o',
							],
							'icon' => [
								'title' => esc_html__( 'Icon', 'avas-core' ),
								'icon' => 'fa fa-info',
							],
							'bullet' => [
								'title' => esc_html__( 'Bullet', 'avas-core' ),
								'icon' => 'fa fa-circle',
							]
						],
						'default' => 'icon',
						'separator' => 'before'
		            ],
		            [
						'name' => 'bddex_custom_icon_image',
						'label' => esc_html__( 'Icon Image', 'avas-core' ),
						'type' => Controls_Manager::MEDIA,
						'default' => [
							'url' => Utils::get_placeholder_image_src(),
						],
						'condition' => [
		                    'bddex_show_custom_image_or_icon' => 'img',
		                ]
					],
					[
						'name' => 'bddex_custom_icon_image_size',
						'label' => esc_html__( 'Icon Image Size', 'avas-core' ),
						'type' => Controls_Manager::NUMBER,
						'default' => 24,
						'condition' => [
		                    'bddex_show_custom_image_or_icon' => 'img',
		                ],
					],
					[
						'name' => 'bddex_custom_content_timeline_circle_icon',
						'label' => esc_html__( 'Icon', 'avas-core' ),
						'type' => Controls_Manager::ICON,
						'default' => 'fa fa-pencil',
						'condition' => [
		                    'bddex_show_custom_image_or_icon' => 'icon',
		                ]
					],
					[
		                'name' => 'bddex_show_custom_read_more',
		                'label' => esc_html__( 'Show Read More', 'avas-core' ),
		                'type' => Controls_Manager::CHOOSE,
		                'options' => [
							'1' => [
								'title' => esc_html__( 'Yes', 'avas-core' ),
								'icon' => 'fa fa-check',
							],
							'0' => [
								'title' => esc_html__( 'No', 'avas-core' ),
								'icon' => 'fa fa-ban',
							]
						],
						'default' => '1',
						'separator' => 'before'
		            ],
					[
						'name' => 'bddex_show_custom_read_more_text',
						'label' => esc_html__( 'Label Text', 'avas-core' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'default' => esc_html__( 'Read More', 'avas-core' ),
						'condition' => [
							'bddex_show_custom_read_more' => '1',
						]
					],
		  	 		[
					 	'name' => 'bddex_read_more_text_link',
					 	'label' => esc_html__( 'Button Link', 'avas-core' ),
					 	'type' => Controls_Manager::URL,
					 	'label_block' => true,
					 	'default' => [
		         			'url' => '#',
		         			'is_external' => '',
		      			],
		      			'show_external' => true,
		      			'condition' => [
							'bddex_show_custom_read_more' => '1',
						]
					],
				],
				'title_field' => '{{bddex_custom_title}}',
			]
		);

		$this->end_controls_section();

		/**
		 * Dynamic Content
		 */
		$this->start_controls_section(
			'bddex_section_post_timeline_filters',
			[
				'label' => esc_html__( 'Dynamic Content Settings', 'avas-core' ),
				'condition' => [
					'bddex_content_timeline_choose' => 'dynamic'
				]
			]
		);


		$this->add_control(
            'bddex_post_type',
            [
                'label' => esc_html__( 'Post Type', 'avas-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => bddex_get_post_types(),
                'default' => 'post',

            ]
        );

        $this->add_control(
            'category',
            [
                'label' => esc_html__( 'Categories', 'avas-core' ),
                'type' => Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => bddex_post_type_categories(),
                'condition' => [
                       'bddex_post_type' => 'post'
                ]
            ]
        );


        $this->add_control(
            'bddex_posts_count',
            [
                'label' => esc_html__( 'Number of Posts', 'avas-core' ),
                'type' => Controls_Manager::NUMBER,
                'default' => '4'
            ]
        );

        $this->add_control(
            'bddex_post_offset',
            [
                'label' => esc_html__( 'Post Offset', 'avas-core' ),
                'type' => Controls_Manager::NUMBER,
                'default' => '0'
            ]
        );

        $this->add_control(
            'bddex_post_orderby',
            [
                'label' => esc_html__( 'Order By', 'avas-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => bddex_get_post_orderby_options(),
                'default' => 'date',

            ]
        );

        $this->add_control(
            'bddex_post_order',
            [
                'label' => esc_html__( 'Order', 'avas-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'asc' => 'Ascending',
                    'desc' => 'Descending'
                ],
                'default' => 'desc',

            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
			'bddex_section_post_timeline_layout',
			[
				'label' => esc_html__( 'Layout Settings', 'avas-core' )
			]
		);

        $this->add_control(
            'bddex_show_read_more',
            [
                'label' => esc_html__( 'Show Read More', 'avas-core' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
					'1' => [
						'title' => esc_html__( 'Yes', 'avas-core' ),
						'icon' => 'fa fa-check',
					],
					'0' => [
						'title' => esc_html__( 'No', 'avas-core' ),
						'icon' => 'fa fa-ban',
					]
				],
				'default' => '1',
				'condition' => [
					'bddex_content_timeline_choose' => 'dynamic'
				]
            ]
        );

        $this->add_control(
			'bddex_read_more_text',
			[
				'label' => esc_html__( 'Label Text', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => false,
				'default' => esc_html__( 'Read More', 'avas-core' ),
				'condition' => [
					'bddex_content_timeline_choose' => 'dynamic',
					'bddex_show_read_more' => '1',
				]
			]
		);
        $this->add_control(
            'bddex_show_image_or_icon',
            [
                'label' => esc_html__( 'Show Circle Image / Icon', 'avas-core' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
					'img' => [
						'title' => esc_html__( 'Image', 'avas-core' ),
						'icon' => 'fa fa-picture-o',
					],
					'icon' => [
						'title' => esc_html__( 'Icon', 'avas-core' ),
						'icon' => 'fa fa-info',
					],
					'bullet' => [
						'title' => esc_html__( 'Bullet', 'avas-core' ),
						'icon' => 'fa fa-circle',
					]
				],
				'default' => 'icon',
				'condition' => [
					'bddex_content_timeline_choose' => 'dynamic'
				]
            ]
        );
        $this->add_control(
			'bddex_icon_image',
			[
				'label' => esc_html__( 'Icon Image', 'avas-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
                    'bddex_show_image_or_icon' => 'img',
                ]
			]
		);
        $this->add_control(
			'bddex_icon_image_size',
			[
				'label' => esc_html__( 'Icon Image Size', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 24,
				],
				'range' => [
					'px' => [
						'max' => 60,
					],
				],
				'condition' => [
                    'bddex_show_image_or_icon' => 'img',
                ],
				'selectors' => [
					'{{WRAPPER}} .bddex-timeline-img img' => 'width: {{SIZE}}px;',
				],
			]
		);

		$this->add_control(
			'bddex_content_timeline_circle_icon',
			[
				'label' => esc_html__( 'Icon', 'avas-core' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-pencil',
				'condition' => [
					'bddex_content_timeline_choose' => 'dynamic',
                    'bddex_show_image_or_icon' => 'icon',
                ]
			]
		);


		$this->add_control(
            'bddex_show_title',
            [
                'label' => esc_html__( 'Show Title', 'avas-core' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
					'1' => [
						'title' => esc_html__( 'Yes', 'avas-core' ),
						'icon' => 'fa fa-check',
					],
					'0' => [
						'title' => esc_html__( 'No', 'avas-core' ),
						'icon' => 'fa fa-ban',
					]
				],
				'default' => '1'
            ]
        );

		$this->add_control(
            'bddex_show_excerpt',
            [
                'label' => esc_html__( 'Show Excerpt', 'avas-core' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
					'1' => [
						'title' => esc_html__( 'Yes', 'avas-core' ),
						'icon' => 'fa fa-check',
					],
					'0' => [
						'title' => esc_html__( 'No', 'avas-core' ),
						'icon' => 'fa fa-ban',
					]
				],
				'default' => '1'
            ]
        );
		$this->add_control(
            'bddex_show_button',
            [
                'label' => esc_html__( 'Show Button', 'avas-core' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
					'1' => [
						'title' => esc_html__( 'Yes', 'avas-core' ),
						'icon' => 'fa fa-check',
					],
					'0' => [
						'title' => esc_html__( 'No', 'avas-core' ),
						'icon' => 'fa fa-ban',
					]
				],
				'default' => '1'
            ]
        );
        $this->add_control(
            'bddex_excerpt_length',
            [
                'label' => esc_html__( 'Excerpt Words', 'avas-core' ),
                'type' => Controls_Manager::NUMBER,
                'default' => '23',
                'condition' => [
                	'bddex_content_timeline_choose' => 'dynamic',
                    'bddex_show_excerpt' => '1',
                ]

            ]
        );


		$this->end_controls_section();

        $this->start_controls_section(
            'bddex_section_post_timeline_style',
            [
                'label' => esc_html__( 'Timeline Style', 'avas-core' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
			'bddex_timeline_line_size',
			[
				'label' => esc_html__( 'Line Size', 'avas-core' ),
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
					'{{WRAPPER}} .bddex-timeline-line' => 'width: {{SIZE}}px;',
					'{{WRAPPER}} .bddex-timeline-line .bddex-timeline-inner' => 'width: {{SIZE}}px;',
				],
			]
		);

		$this->add_control(
			'bddex_timeline_line_from_left',
			[
				'label' => esc_html__( 'Position From Left', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 2,
				],
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-timeline-line' => 'margin-left: -{{SIZE}}px;',
					'{{WRAPPER}} .bddex-timeline-line .bddex-timeline-inner' => 'margin-left: -{{SIZE}}px;',
				],
				'description' => esc_html__( 'Use half of the Line size for perfect centering', 'avas-core' ),
			]
		);

		$this->add_control(
			'bddex_timeline_line_color',
			[
				'label' => esc_html__( 'Inactive Line Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				// 'default' => '#d7e4ed',
				'selectors' => [
					'{{WRAPPER}} .bddex-timeline-container::before' => 'background: {{VALUE}}',
				]

			]
		);

		$this->add_control(
			'bddex_timeline_line_active_color',
			[
				'label' => esc_html__( 'Active Line Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#00bcd4',
				'selectors' => [
					'{{WRAPPER}} .bddex-timeline-line .bddex-timeline-inner' => 'background: {{VALUE}}',
				]

			]
		);

		$this->end_controls_section();

		/**
		 * Card Style
		 */
		$this->start_controls_section(
            'bddex_section_post_timeline_card_style',
            [
                'label' => esc_html__( 'Card Style', 'avas-core' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
			'bddex_card_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#f1f2f3',
				'selectors' => [
					'{{WRAPPER}} .bddex-timeline-content' => 'background: {{VALUE}};',
					'{{WRAPPER}} .bddex-timeline-content::before' => 'border-left-color: {{VALUE}}; border-right-color: {{VALUE}};',
				]

			]
		);

		$this->add_responsive_control(
			'bddex_card_padding',
			[
				'label' => esc_html__( 'Padding', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .bddex-timeline-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_responsive_control(
			'bddex_card_margin',
			[
				'label' => esc_html__( 'Margin', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .bddex-timeline-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'bddex_card_border',
				'label' => esc_html__( 'Border', 'avas-core' ),
				'selector' => '{{WRAPPER}} .bddex-timeline-content',
			]
		);

		$this->add_responsive_control(
			'bddex_card_radius',
			[
				'label' => esc_html__( 'Border Radius', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .bddex-timeline-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'bddex_card_shadow',
				'selector' => '{{WRAPPER}} .bddex-timeline-content',
			]
		);

		$this->end_controls_section();

		/**
		 * Icon Circle Style
		 */
		$this->start_controls_section(
            'bddex_section_post_timeline_icon_circle_style',
            [
                'label' => esc_html__( 'Bullet Style', 'avas-core' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

		$this->add_responsive_control(
			'bddex_icon_circle_size',
			[
				'label' => esc_html__( 'Bullet Size', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 40,
				],
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-timeline-img' => 'width: {{SIZE}}px; height: {{SIZE}}px;',
				],
			]
		);

		$this->add_responsive_control(
			'bddex_icon_font_size',
			[
				'label' => esc_html__( 'Icon Font Size', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 14,
				],
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-timeline-img i' => 'font-size: {{SIZE}}px;',
				],
			]
		);

		$this->add_responsive_control(
			'bddex_icon_circle_from_top',
			[
				'label' => esc_html__( 'Position From Top', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 8,
				],
				'range' => [
					'px' => [
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-timeline-img' => 'margin-top: {{SIZE}}px;',
					'{{WRAPPER}} .bddex-timeline-line' => 'margin-top: {{SIZE}}px;',
					'{{WRAPPER}} ..bddex-timeline-line .bddex-timeline-inner' => 'margin-top: {{SIZE}}px;',
				],
			]
		);

		$this->add_responsive_control(
			'bddex_icon_circle_from_left',
			[
				'label' => esc_html__( 'Position From Left', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'description' => esc_html__( 'Use half of the Icon Cicle Size for perfect centering', 'avas-core' ),
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-timeline-img' => 'margin-left: -{{SIZE}}px;',
				],
			]
		);

		$this->add_responsive_control(
			'bddex_icon_circle_border_width',
			[
				'label' => esc_html__( 'Bullet Border Width', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 6,
				],
				'range' => [
					'px' => [
						'max' => 30,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-timeline-img.bddex-picture' => 'border-width: {{SIZE}}px;',
				],
			]
		);

		$this->add_control(
			'bddex_icon_circle_color',
			[
				'label' => esc_html__( 'Bullet Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#f1f2f3',
				'selectors' => [
					'{{WRAPPER}} .bddex-timeline-img.bddex-picture' => 'background: {{VALUE}}',
				]

			]
		);


		$this->add_control(
			'bddex_icon_circle_border_color',
			[
				'label' => esc_html__( 'Bullet Border Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#f9f9f9',
				'selectors' => [
					'{{WRAPPER}} .bddex-timeline-img.bddex-picture' => 'border-color: {{VALUE}}',
				]

			]
		);


		$this->add_control(
			'bddex_icon_circle_font_color',
			[
				'label' => esc_html__( 'Bullet Font Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .bddex-timeline-img i' => 'color: {{VALUE}}',
				]

			]
		);


		$this->add_control(
			'bddex_timeline_icon_active_state',
			[
				'label' => esc_html__( 'Active State (Highlighted)', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'bddex_icon_circle_active_color',
			[
				'label' => esc_html__( 'Bullet Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#00bcd4',
				'selectors' => [
					'{{WRAPPER}} .bddex-timeline-block.highlight .bddex-timeline-img.bddex-picture' => 'background: {{VALUE}}',
				]

			]
		);


		$this->add_control(
			'bddex_icon_circle_active_border_color',
			[
				'label' => esc_html__( 'Bullet Border Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .bddex-timeline-block.highlight .bddex-timeline-img.bddex-picture' => 'border-color: {{VALUE}}',
				]

			]
		);

		$this->add_control(
			'bddex_icon_circle_active_font_color',
			[
				'label' => esc_html__( 'Bullet Font Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .bddex-timeline-block.highlight .bddex-timeline-img i' => 'color: {{VALUE}}',
				]

			]
		);


		$this->end_controls_section();

        $this->start_controls_section(
            'bddex_section_typography',
            [
                'label' => esc_html__( 'Color & Typography', 'avas-core' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

		$this->add_control(
			'bddex_timeline_title_style',
			[
				'label' => esc_html__( 'Title Style', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_control(
			'bddex_timeline_title_color',
			[
				'label' => esc_html__( 'Title Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default'=> '#303e49',
				'selectors' => [
					'{{WRAPPER}} .bddex-timeline-content h2' => 'color: {{VALUE}};',
					'{{WRAPPER}} .bddex-timeline-content h2 a' => 'color: {{VALUE}};',
				]

			]
		);

		$this->add_responsive_control(
			'bddex_timeline_title_alignment',
			[
				'label' => esc_html__( 'Title Alignment', 'avas-core' ),
				'type' => Controls_Manager::CHOOSE,
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
					]
				],
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} .bddex-timeline-content h2' => 'text-align: {{VALUE}};',
					'{{WRAPPER}} .bddex-timeline-content h2 a' => 'text-align: {{VALUE}};',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'bddex_timeline_title_typography',
				'label' => esc_html__( 'Typography', 'avas-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .bddex-timeline-content h2 a',
			]
		);

		$this->add_control(
			'bddex_timeline_excerpt_style',
			[
				'label' => esc_html__( 'Excerpt Style', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_control(
			'bddex_timeline_excerpt_color',
			[
				'label' => esc_html__( 'Excerpt Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default'=> '#333',
				'selectors' => [
					'{{WRAPPER}} .bddex-timeline-content p' => 'color: {{VALUE}};',
				]
			]
		);

        $this->add_responsive_control(
			'bddex_timeline_excerpt_alignment',
			[
				'label' => esc_html__( 'Excerpt Alignment', 'avas-core' ),
				'type' => Controls_Manager::CHOOSE,
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
					'justify' => [
						'title' => esc_html__( 'Justified', 'avas-core' ),
						'icon' => 'fa fa-align-justify',
					],
				],
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} .bddex-timeline-content' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'bddex_timeline_excerpt_typography',
				'label' => esc_html__( 'Typography', 'avas-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .bddex-timeline-content p',
			]
		);

		$this->add_control(
			'bddex_timeline_date_style',
			[
				'label' => esc_html__( 'Date Style', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'bddex_timeline_date_margin',
			[
				'label' => esc_html__( 'Margin', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .bddex-timeline-content .bddex-date' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

        $this->add_control(
			'bddex_timeline_date_color',
			[
				'label' => esc_html__( 'Date Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default'=> '#4d4d4d',
				'selectors' => [
					'{{WRAPPER}} .bddex-timeline-content .bddex-date' => 'color: {{VALUE}};',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'bddex_timeline_date_typography',
				'label' => esc_html__( 'Typography', 'avas-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .bddex-timeline-content .bddex-date',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'bddex_section_load_more_btn',
            [
                'label' => esc_html__( 'Load More Button Style', 'avas-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                	'bddex_post_timeline_show_load_more' => '1'
                ]
            ]
        );

		$this->add_responsive_control(
			'bddex_post_block_load_more_btn_padding',
			[
				'label' => esc_html__( 'Padding', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .bddex-load-more-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_responsive_control(
			'bddex_post_block_load_more_btn_margin',
			[
				'label' => esc_html__( 'Margin', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .bddex-load-more-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
	         'name' => 'bddex_post_block_load_more_btn_typography',
				'selector' => '{{WRAPPER}} .bddex-load-more-button',
			]
		);

		$this->start_controls_tabs( 'bddex_post_block_load_more_btn_tabs' );

			// Normal State Tab
			$this->start_controls_tab( 'bddex_post_block_load_more_btn_normal', [ 'label' => esc_html__( 'Normal', 'avas-core' ) ] );

			$this->add_control(
				'bddex_post_block_load_more_btn_normal_text_color',
				[
					'label' => esc_html__( 'Text Color', 'avas-core' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#fff',
					'selectors' => [
						'{{WRAPPER}} .bddex-load-more-button' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'bddex_load_more_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'avas-core' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#29d8d8',
					'selectors' => [
						'{{WRAPPER}} .bddex-load-more-button' => 'background: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'bddex_post_block_load_more_btn_normal_border',
					'label' => esc_html__( 'Border', 'avas-core' ),
					'selector' => '{{WRAPPER}} .bddex-load-more-button',
				]
			);

			$this->add_control(
				'bddex_post_block_load_more_btn_border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'avas-core' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .bddex-load-more-button' => 'border-radius: {{SIZE}}px;',
					],
				]
			);

			$this->end_controls_tab();

			// Hover State Tab
			$this->start_controls_tab( 'bddex_post_block_load_more_btn_hover', [ 'label' => esc_html__( 'Hover', 'avas-core' ) ] );

			$this->add_control(
				'bddex_post_block_load_more_btn_hover_text_color',
				[
					'label' => esc_html__( 'Text Color', 'avas-core' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#fff',
					'selectors' => [
						'{{WRAPPER}} .bddex-load-more-button:hover' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'bddex_post_block_load_more_btn_hover_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'avas-core' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#27bdbd',
					'selectors' => [
						'{{WRAPPER}} .bddex-load-more-button:hover' => 'background: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'bddex_post_block_load_more_btn_hover_border_color',
				[
					'label' => esc_html__( 'Border Color', 'avas-core' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .bddex-load-more-button:hover' => 'border-color: {{VALUE}};',
					],
				]

			);

			$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'bddex_post_block_load_more_btn_shadow',
				'selector' => '{{WRAPPER}} .bddex-load-more-button',
				'separator' => 'before'
			]
		);

		$this->add_control(
			'bddex_post_timeline_load_more_loader_pos_title',
			[
				'label' => esc_html__( 'Loader Position', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'bddex_post_timeline_loader_pos_left',
			[
				'label' => esc_html__( 'From Left', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 15
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-load-more-button.button--loading .button__loader' => 'left: {{SIZE}}px;',
				],
			]
		);

		$this->add_control(
			'bddex_post_timeline_loader_pos_top',
			[
				'label' => esc_html__( 'From Top', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 15
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-load-more-button.button--loading .button__loader' => 'top: {{SIZE}}px;',
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
			'bddex_read_more_button_style',
			[
				'label' => esc_html__( 'Read More Button Style', 'avas-core' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_responsive_control(
			'bddex_read_more_padding',
			[
				'label' => esc_html__( 'Padding', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .bddex-timeline-content .bddex-read-more' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_responsive_control(
			'bddex_read_more_margin',
			[
				'label' => esc_html__( 'Margin', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .bddex-timeline-content .bddex-read-more' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
	         'name' => 'bddex_read_more_typography',
				'selector' => '{{WRAPPER}} .bddex-timeline-content .bddex-read-more',
			]
		);

		$this->start_controls_tabs( 'bddex_read_more_tabs' );

			// Normal State Tab
			$this->start_controls_tab( 'bddex_read_more_normal', [ 'label' => esc_html__( 'Normal', 'avas-core' ) ] );

			$this->add_control(
				'bddex_read_more_normal_text_color',
				[
					'label' => esc_html__( 'Text Color', 'avas-core' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#fff',
					'selectors' => [
						'{{WRAPPER}} .bddex-timeline-content .bddex-read-more' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'bddex_read_more_normal_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'avas-core' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#00bcd4',
					'selectors' => [
						'{{WRAPPER}} .bddex-timeline-content .bddex-read-more' => 'background: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'bddex_read_more_normal_border',
					'label' => esc_html__( 'Border', 'avas-core' ),
					'selector' => '{{WRAPPER}} .bddex-timeline-content .bddex-read-more',
				]
			);

			$this->add_control(
				'bddex_read_more_border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'avas-core' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .bddex-timeline-content .bddex-read-more' => 'border-radius: {{SIZE}}px;',
					],
				]
			);

			$this->end_controls_tab();

			// Hover State Tab
			$this->start_controls_tab( 'bddex_read_more_hover', [ 'label' => esc_html__( 'Hover', 'avas-core' ) ] );

			$this->add_control(
				'bddex_read_more_hover_text_color',
				[
					'label' => esc_html__( 'Text Color', 'avas-core' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#f9f9f9',
					'selectors' => [
						'{{WRAPPER}} .bddex-timeline-content .bddex-read-more:hover' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'bddex_read_more_hover_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'avas-core' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#bac4cb',
					'selectors' => [
						'{{WRAPPER}} .bddex-timeline-content .bddex-read-more:hover' => 'background: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'bddex_read_more_hover_border_color',
				[
					'label' => esc_html__( 'Border Color', 'avas-core' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .bddex-timeline-content .bddex-read-more:hover' => 'border-color: {{VALUE}};',
					],
				]

			);

			$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'bddex_read_more_shadow',
				'selector' => '{{WRAPPER}} .bddex-timeline-content .bddex-read-more',
				'separator' => 'before'
			]
		);

		$this->end_controls_section();

	}


	protected function render() {
        $settings = $this->get_settings();
        $icon_image = $this->get_settings( 'bddex_icon_image' );
	  	if( empty( $icon_image_url ) ) : $icon_image_url = $icon_image['url']; else: $icon_image_url = $icon_image_url; endif;

        $post_args = bddex_get_post_settings($settings);

        $posts = bddex_get_post_data($post_args);

        ?>

		<div id="bddex-timeline-<?php echo esc_attr( $this->get_id() ); ?>">
			<div class="bddex-timeline-container">
				<div class="bddex-timeline-container">
					<?php if( 'dynamic' === $settings['bddex_content_timeline_choose'] ) : ?>
						<?php if( count( $posts ) ) : global $post; ?>
							<?php foreach( $posts as $post ) : setup_postdata( $post ); ?>
								<div class="bddex-timeline-block">
									<div class="bddex-timeline-line">
										<div class="bddex-timeline-inner"></div>
									</div>
									<div class="bddex-timeline-img bddex-picture <?php if( 'bullet' === $settings['bddex_show_image_or_icon'] ) : echo 'bddex-timeline-bullet'; endif;?>">
										<?php if( 'img' === $settings['bddex_show_image_or_icon'] ) : ?>
											<img src="<?php echo esc_url( $icon_image_url ); ?>" alt="Icon Image">
										<?php endif; ?>
										<?php if( 'icon' === $settings['bddex_show_image_or_icon'] ) : ?>
											<i class="<?php echo esc_attr( $settings['bddex_content_timeline_circle_icon'] ); ?>"></i>
										<?php endif; ?>
									</div>

									<div class="bddex-timeline-content">
										<?php if( '1' == $settings['bddex_show_title'] ) : ?>
											<h2><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo the_title(); ?></a></h2>
										<?php endif; ?>
										<?php if( '1' == $settings['bddex_show_excerpt'] ) : ?>
											<p><?php echo bddex_get_excerpt_by_id( get_the_ID(), $settings['bddex_excerpt_length'] );?></p>
										<?php endif; ?>
										<?php if( '1' === $settings['bddex_show_read_more'] && !empty( $settings['bddex_read_more_text'] ) ) : ?>
										<a href="<?php echo esc_url( get_permalink() ); ?>" class="bddex-read-more"><?php echo esc_html__( $settings['bddex_read_more_text'], 'avas-core' ); ?></a>
										<?php endif; ?>
										<span class="bddex-date"><?php echo get_the_date(); ?></span>
									</div>
								</div>
							<?php endforeach; ?>
						<?php endif; ?>
					<?php elseif( 'custom' === $settings['bddex_content_timeline_choose'] ) : ?>

						<?php foreach( $settings['bddex_coustom_content_posts'] as $custom_content ) : ?>
							<?php
								$custom_icon_image = $custom_content['bddex_custom_icon_image'];
		  						if( empty( $custom_icon_image ) ) : $custom_icon_image = $custom_content['bddex_custom_icon_image']['url']; else: $custom_icon_image = $custom_content['bddex_custom_icon_image']['url']; endif;
								$target = $custom_content['bddex_read_more_text_link']['is_external'] ? 'target="_blank"' : '';
								$nofollow = $custom_content['bddex_read_more_text_link']['nofollow'] ? 'rel="nofollow"' : '';
							?>
							<div class="bddex-timeline-block">
								<div class="bddex-timeline-line">
									<div class="bddex-timeline-inner"></div>
								</div>
								<div class="bddex-timeline-img bddex-picture <?php if( 'bullet' === $settings['bddex_show_image_or_icon'] ) : echo 'bddex-timeline-bullet'; endif;?>">
										<?php if( 'img' === $custom_content['bddex_show_custom_image_or_icon'] ) : ?>
											<img src="<?php echo esc_url( $custom_icon_image ); ?>" style="width: <?php echo $custom_content['bddex_custom_icon_image_size']; ?>px;" alt="Icon Image">
										<?php endif; ?>
										<?php if( 'icon' === $custom_content['bddex_show_custom_image_or_icon'] ) : ?>
											<i class="<?php echo esc_attr( $custom_content['bddex_custom_content_timeline_circle_icon'] ); ?>"></i>
										<?php endif; ?>
									</div>

								<div class="bddex-timeline-content">
									<?php if( '1' == $settings['bddex_show_title'] ) : ?>
										<h2><a href="<?php echo esc_url( $custom_content['bddex_read_more_text_link']['url'] ); ?> <?php echo $target; ?> <?php echo $nofollow; ?>"><?php echo $custom_content['bddex_custom_title']; ?></a></h2>
									<?php endif; ?>
									<?php if( '1' == $settings['bddex_show_excerpt'] ) : ?>
										<p><?php echo $custom_content['bddex_custom_excerpt']; ?></p>
									<?php endif; ?>
									<?php if( '1' == $custom_content['bddex_show_custom_read_more'] && '1' === $settings['bddex_show_button'] && !empty( $custom_content['bddex_show_custom_read_more_text'] ) ) : ?>
										<a href="<?php echo esc_url( $custom_content['bddex_read_more_text_link']['url'] ); ?>" class="bddex-read-more" <?php echo $target; ?> <?php echo $nofollow; ?> ><?php echo esc_html__( $custom_content['bddex_show_custom_read_more_text'], 'avas-core' ); ?></a>
									<?php endif; ?>
									<?php if( !empty( $custom_content['bddex_custom_post_date'] ) ) : ?>
										<span class="bddex-date"><?php echo $custom_content['bddex_custom_post_date']; ?></span>
									<?php endif; ?>
								</div>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
<script>
	jQuery(document).ready(function($) {

		var contentContainer = $( '.bddex-timeline-container' ),
			contentBlock = $( '.bddex-timeline-block' ),
			line = $( '.bddex-timeline-inner' );

		var contentBlockHeight = [];

		$( window ).on( 'scroll', function(e) {
			contentBlock.each(function( index ) {
				contentBlockHeight.push( $(this).outerHeight() );
				if( $(this).find( '.highlight' ) ) {
					$(this).find( '.bddex-timeline-inner' ).css( 'height', contentBlockHeight[index] + 'px' );
				}
			});

			if( this.oldScroll > this.scrollY == false ) {
				this.oldScroll = this.scrollY;
				// Scroll Down
				$( '.bddex-timeline-block.highlight' ).prev().find('.bddex-timeline-inner').removeClass( 'bddex-muted' ).addClass( 'bddex-highlighted' );

			}else if( this.oldScroll > this.scrollY == true ) {
				this.oldScroll = this.scrollY;
				// Scroll Up
				$( '.bddex-timeline-block.highlight' ).find('.bddex-timeline-inner').addClass( 'bddex-prev-highlighted' );
				$( '.bddex-timeline-block.highlight' ).next().find('.bddex-timeline-inner').removeClass( 'bddex-highlighted' ).removeClass( 'bddex-prev-highlighted' ).addClass( 'bddex-muted' );

			}
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
Plugin::instance()->widgets_manager->register_widget_type( new Bddex_Timeline() );