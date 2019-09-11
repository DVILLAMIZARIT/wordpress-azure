<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Bddex_Post_Block extends Widget_Base {

	public function get_name() {
		return 'bddex-post-block';
	}

	public function get_title() {
		return esc_html__( 'Avas Post Block', 'avas-core' );
	}

	public function get_icon() {
		return 'eicon-posts-grid';
	}

	public function get_categories() {
		return [ 'bddex' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'bddex_section_post_block_filters',
			[
				'label' => esc_html__( 'Settings', 'avas-core' )
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
			'bddex_section_post_block_layout',
			[
				'label' => esc_html__( 'Layout Settings', 'avas-core' )
			]
		);

		$this->add_control(
			'bddex_post_block_grid_style',
			[
				'label' => esc_html__( 'Post Block Style Preset', 'avas-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'post-block-style-default',
				'options' => [
					'post-block-style-default' => esc_html__( 'Default', 'avas-core' ),
					'post-block-style-overlay' => esc_html__( 'Overlay',   'avas-core' ),
				],
			]
		);
		$this->add_control(
            'bddex_post_block_show_load_more',
            [
                'label' => esc_html__( 'Show Load More', 'avas-core' ),
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
				'default' => '0'
            ]
        );

        $this->add_control(
			'bddex_post_block_show_load_more_text',
			[
				'label' => esc_html__( 'Label Text', 'avas-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => false,
				'default' => esc_html__( 'Load More', 'avas-core' ),
				'condition' => [
					'bddex_post_block_show_load_more' => '1',
				]
			]
		);

        $this->add_control(
            'bddex_show_image',
            [
                'label' => esc_html__( 'Show Image', 'avas-core' ),
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

        $this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'image',
				'exclude' => [ 'custom' ],
				'default' => 'medium',
				'condition' => [
                    'bddex_show_image' => '1',
                ]
			]
		);


		$this->add_responsive_control(
			'bddex_post_block_thumb_image_height',
			[
				'label' => esc_html__( 'Image Height', 'avas-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 180,
					'unit' => 'px',
				],
				'size_units' => [ 'px' ],
				'range' => [
		            'px' => [
		                'min' => 0,
		                'max' => 1000,
		                'step' => 1,
		            ]
				],
				'condition' => [
                    'bddex_show_image' => '1',
                ],
				'selectors' => [
					'{{WRAPPER}} .bddex-post-block-item .bddex-entry-thumbnail' => 'height: {{SIZE}}px;',
				],
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
            'p_b_title_text_limit',
            [
                'label' => esc_html__( 'Title character', 'avas-core' ),
                'type' => Controls_Manager::NUMBER,
                'default' => '50',
                'condition' => [
                    'bddex_show_title' => '1',
                ]

            ]
        );
		$this->add_control(
            'bddex_show_excerpt',
            [
                'label' => esc_html__( 'Show excerpt', 'avas-core' ),
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
                'default' => '10',
                'condition' => [
                    'bddex_show_excerpt' => '1',
                ]

            ]
        );
		$this->add_control(
            'bddex_show_meta',
            [
                'label' => esc_html__( 'Show Meta', 'avas-core' ),
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
			'bddex_post_block_meta_position',
			[
				'label' => esc_html__( 'Meta Position', 'avas-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'meta-entry-footer',
				'options' => [
					'meta-entry-header' => esc_html__( 'Entry Header', 'avas-core' ),
					'meta-entry-footer' => esc_html__( 'Entry Footer',   'avas-core' ),
				],
                'condition' => [
                    'bddex_show_meta' => '1',
                ]
			]
		);

		$this->end_controls_section();

        $this->start_controls_section(
            'bddex_section_post_block_style',
            [
                'label' => esc_html__( 'Post Block Style', 'avas-core' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );


        $this->add_control(
			'bddex_post_block_bg_color',
			[
				'label' => esc_html__( 'Post Background Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .bddex-post-block-item' => 'background-color: {{VALUE}}',
				]

			]
		);


        $this->add_control(
			'bddex_thumbnail_overlay_color',
			[
				'label' => esc_html__( 'Thumbnail Overlay Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bddex-entry-overlay, {{WRAPPER}} .bddex-post-block.post-block-style-overlay .bddex-entry-wrapper' => 'background-color: {{VALUE}}',
				]

			]
		);

		$this->add_responsive_control(
			'bddex_post_block_spacing',
			[
				'label' => esc_html__( 'Spacing Between Items', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .bddex-post-block-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'bddex_post_block_border',
				'label' => esc_html__( 'Border', 'avas-core' ),
				'selector' => '{{WRAPPER}} .bddex-post-block-item',
			]
		);

		$this->add_control(
			'bddex_post_block_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'avas-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .bddex-post-block-item' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'bddex_post_block_box_shadow',
				'selector' => '{{WRAPPER}} .bddex-post-block-item',
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
			'bddex_post_block_title_style',
			[
				'label' => esc_html__( 'Title Style', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_control(
			'bddex_post_block_title_color',
			[
				'label' => esc_html__( 'Title Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default'=> '#303133',
				'selectors' => [
					'{{WRAPPER}} .bddex-entry-title, {{WRAPPER}} .bddex-entry-title a' => 'color: {{VALUE}};',
				]

			]
		);

        $this->add_control(
			'bddex_post_block_title_hover_color',
			[
				'label' => esc_html__( 'Title Hover Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default'=> '#23527c',
				'selectors' => [
					'{{WRAPPER}} .bddex-entry-title:hover, {{WRAPPER}} .bddex-entry-title a:hover' => 'color: {{VALUE}};',
				]

			]
		);

		$this->add_responsive_control(
			'bddex_post_block_title_alignment',
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
				'selectors' => [
					'{{WRAPPER}} .bddex-entry-title' => 'text-align: {{VALUE}};',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'bddex_post_block_title_typography',
				'label' => esc_html__( 'Typography', 'avas-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .bddex-entry-title',
			]
		);

		$this->add_control(
			'bddex_post_block_excerpt_style',
			[
				'label' => esc_html__( 'Excerpt Style', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_control(
			'bddex_post_block_excerpt_color',
			[
				'label' => esc_html__( 'Excerpt Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default'=> '',
				'selectors' => [
					'{{WRAPPER}} .bddex-grid-post-excerpt p' => 'color: {{VALUE}};',
				]
			]
		);

        $this->add_responsive_control(
			'bddex_post_block_excerpt_alignment',
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
				'selectors' => [
					'{{WRAPPER}} .bddex-grid-post-excerpt p' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'bddex_post_block_excerpt_typography',
				'label' => esc_html__( 'excerpt Typography', 'avas-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .bddex-grid-post-excerpt p',
			]
		);


		$this->add_control(
			'bddex_post_block_meta_style',
			[
				'label' => esc_html__( 'Meta Style', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_control(
			'bddex_post_block_meta_color',
			[
				'label' => esc_html__( 'Meta Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default'=> '',
				'selectors' => [
					'{{WRAPPER}} .bddex-entry-meta, .bddex-entry-meta a' => 'color: {{VALUE}};',
				]
			]
		);

        $this->add_responsive_control(
			'bddex_post_block_meta_alignment_footer',
			[
				'label' => esc_html__( 'Meta Alignment', 'avas-core' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => esc_html__( 'Left', 'avas-core' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'avas-core' ),
						'icon' => 'fa fa-align-center',
					],
					'flex-end' => [
						'title' => esc_html__( 'Right', 'avas-core' ),
						'icon' => 'fa fa-align-right',
					],
					'stretch' => [
						'title' => esc_html__( 'Justified', 'avas-core' ),
						'icon' => 'fa fa-align-justify',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-entry-footer' => 'justify-content: {{VALUE}};',
				],
                'condition' => [
                    'bddex_post_block_meta_position' => 'meta-entry-footer',
                ]
			]
		);

        $this->add_responsive_control(
			'bddex_post_block_meta_alignment_header',
			[
				'label' => esc_html__( 'Meta Alignment', 'avas-core' ),
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
				'selectors' => [
					'{{WRAPPER}} .bddex-entry-meta' => 'text-align: {{VALUE}};',
				],
                'condition' => [
                    'bddex_post_block_meta_position' => 'meta-entry-header',
                ]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'bddex_post_block_meta_typography',
				'label' => esc_html__( 'Excerpt Typography', 'avas-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .bddex-entry-meta > div, {{WRAPPER}} .bddex-entry-meta > span',
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
            'bddex_section_load_more_btn',
            [
                'label' => esc_html__( 'Load More Button Style', 'avas-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                	'bddex_post_block_show_load_more' => '1'
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
				'bddex_cta_btn_normal_bg_color',
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
			$this->start_controls_tab( 
				'bddex_post_block_load_more_btn_hover', 
				[ 'label' => esc_html__( 'Hover', 'avas-core' ) 
				] 
			);

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
			'bddex_post_block_load_more_loader_pos_title',
			[
				'label' => esc_html__( 'Loader Position', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'bddex_post_block_loader_pos_left',
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
			'bddex_post_block_loader_pos_top',
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

	}


	protected function render( ) {
        $settings = $this->get_settings();

        $title_text_limit   = $settings['p_b_title_text_limit'];

      // title text limit
        if( $title_text_limit ){
            $title_text_limit = $title_text_limit;
        } else {
            $title_text_limit = 50;
        }

        $post_args = bddex_get_post_settings($settings);

        $posts = bddex_get_post_data($post_args);

        /* Get Post Categories */
        $post_categories = $this->get_settings( 'category' );
        if( !empty( $post_categories ) ) {
        	foreach ( $post_categories as $key=>$value ) {
	        	$categories[] = $value;
	        }
	        $categories_id_string = implode( ',' , $categories );

	        /* Get All Post Count */
	        $total_post = 0;
	        foreach( $categories as $cat ) {
	        	$category = get_category( $cat );
	        //	$total_post = $total_post + $category->category_count;
	        }
        }else {
        	$categories_id_string = '';
        	$total_post = wp_count_posts()->publish;
        }

        ?>

		<div id="bddex-post-block-<?php echo esc_attr($this->get_id()); ?>" class="bddex-post-block <?php echo esc_attr($settings['bddex_post_block_grid_style'] ); ?>">
		    <div class="bddex-post-block-grid bddex-post-appender-<?php echo esc_attr( $this->get_id() ); ?>">
		    <?php
		        if(count($posts)){
		            global $post;
		            ?>
		                <?php
		                    foreach($posts as $post){
		                        setup_postdata($post);
		                    ?>


		                    <?php if($settings['bddex_post_block_grid_style'] == 'post-block-style-default'){ ?>

		                    <div class="bddex-post-block-item bddex-post-block-column">
		                    	<div class="bddex-post-block-item-holder">
			                    	<div class="bddex-post-block-item-holder-inner">

			                    		<?php if($settings['bddex_show_image'] == 1){ ?>
			                    		<div class="bddex-entry-media">
			                    			<div class="bddex-entry-overlay">
			                    				<a href="<?php echo get_permalink(); ?>"></a>
			                    			</div>
				                    		<div class="bddex-entry-thumbnail">
				                    		<?php if ($thumbnail_exists = has_post_thumbnail()): ?>
				                    			<img src="<?php echo wp_get_attachment_image_url(get_post_thumbnail_id(), $settings['image_size'])?>" alt="image">
				                    		<?php endif; ?>
				                    		</div>
			                    		</div>
			                    		<?php } ?>


			                    		<div class="bddex-entry-wrapper">
			                    			<header class="bddex-entry-header">
			                    				<?php if($settings['bddex_show_title']){ ?>
			                    				<h2 class="bddex-entry-title"><a class="bddex-grid-post-link" href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>"><?php echo bddex_title_max_charlengths($title_text_limit); ?></a></h2>
			                    				<?php } ?>

			                    				<?php if($settings['bddex_show_meta'] && $settings['bddex_post_block_meta_position'] == 'meta-entry-header'){ ?>
				                    			<div class="bddex-entry-meta post-block">
				                    				<span class="bddex-posted-by"><?php the_author_posts_link(); ?></span>
				                    				<span class="bddex-posted-on"><time datetime="<?php echo get_the_date(); ?>"><?php echo get_the_date(); ?></time></span>
				                    			</div>
				                    			<?php } ?>
			                    			</header>

			                    			<div class="bddex-entry-content">
					                            <?php if($settings['bddex_show_excerpt']){ ?>
					                            <div class="bddex-grid-post-excerpt">
					                                <p><?php echo  bddex_get_excerpt_by_id(get_the_ID(),$settings['bddex_excerpt_length']);?></p>
					                            </div>
					                            <?php } ?>
			                    			</div>

			                    		</div>
			                    		<?php if($settings['bddex_show_meta'] && $settings['bddex_post_block_meta_position'] == 'meta-entry-footer'){ ?>
			                    		<div class="bddex-entry-footer">
			                    			<div class="bddex-author-avatar">
			                    				<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ), 96 ); ?> </a>
			                    			</div>
			                    			<div class="bddex-entry-meta">
			                    				<div class="bddex-posted-by"><?php the_author_posts_link(); ?></div>
			                    				<div class="bddex-posted-on"><time datetime="<?php echo get_the_date(); ?>"><?php echo get_the_date(); ?></time></div>
			                    			</div>
			                    		</div>
				                    	<?php } ?>
			                    	</div>
		                    	</div>
		                    </div>
		                    <?php } ?>

		                    <?php if($settings['bddex_post_block_grid_style'] == 'post-block-style-overlay'){ ?>

		                    <div class="bddex-post-block-item bddex-post-block-column">
		                    	<div class="bddex-post-block-item-holder">
			                    	<div class="bddex-post-block-item-holder-inner">

			                    		<?php if($settings['bddex_show_image'] == 1){ ?>
			                    		<div class="bddex-entry-media">
				                    		<div class="bddex-entry-thumbnail">
				                    		<?php if ($thumbnail_exists = has_post_thumbnail()): ?>
				                    			<img src="<?php echo wp_get_attachment_image_url(get_post_thumbnail_id(), $settings['image_size'])?>" alt="image">
				                    		<?php endif; ?>
				                    		</div>
			                    		</div>
			                    		<?php } ?>


			                    		<div class="bddex-entry-wrapper">
			                    			<header class="bddex-entry-header">
			                    				<?php if($settings['bddex_show_title']){ ?>
			                    				<h2 class="bddex-entry-title"><a class="bddex-grid-post-link" href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>"><?php echo bddex_title_max_charlengths($title_text_limit); ?></a></h2>
			                    				<?php } ?>

			                    				<?php if($settings['bddex_show_meta'] && $settings['bddex_post_block_meta_position'] == 'meta-entry-header'){ ?>
				                    			<div class="bddex-entry-meta">
				                    				<span class="bddex-posted-by"><?php the_author_posts_link(); ?></span>
				                    				<span class="bddex-posted-on"><time datetime="<?php echo get_the_date(); ?>"><?php echo get_the_date(); ?></time></span>
				                    			</div>
				                    			<?php } ?>
			                    			</header>

			                    			<div class="bddex-entry-content">
					                            <?php if($settings['bddex_show_excerpt']){ ?>
					                            <div class="bddex-grid-post-excerpt">
					                                <p><?php echo  bddex_get_excerpt_by_id(get_the_ID(),$settings['bddex_excerpt_length']);?></p>
					                            </div>
					                            <?php } ?>
			                    			</div>
				                    		<?php if($settings['bddex_show_meta'] && $settings['bddex_post_block_meta_position'] == 'meta-entry-footer'){ ?>
				                    		<div class="bddex-entry-footer">
				                    			<div class="bddex-author-avatar">
				                    				<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ), 96 ); ?> </a>
				                    			</div>
				                    			<div class="bddex-entry-meta">
				                    				<div class="bddex-posted-by"><?php the_author_posts_link(); ?></div>
				                    				<div class="bddex-posted-on"><time datetime="<?php echo get_the_date(); ?>"><?php echo get_the_date(); ?></time></div>
				                    			</div>
				                    		</div>
					                    	<?php } ?>
			                    			<div class="bddex-entry-overlay">
			                    				<a href="<?php echo get_permalink(); ?>"></a>
			                    			</div>
			                    		</div>

			                    	</div>
		                    	</div>
		                    </div>
		                    <?php } ?>
		                    <?php
		                    }
		                    wp_reset_postdata();

		                ?>
		            <?php
		        }
		    ?>
		    </div>
		</div>
		
       <?php if( 1 == $settings['bddex_post_block_show_load_more'] ) : ?>
		<!-- Load More Button -->
		<div class="clearfix"></div>
		<div class="bddex-load-more-button-wrap">
			<button class="bddex-load-more-button" id="bddex-load-more-btn-<?php echo $this->get_id(); ?>">
				<div class="bddex-btn-loader button__loader"></div>
		  		<span><?php echo esc_html__( $settings['bddex_post_block_show_load_more_text'], 'avas-core' ); ?></span>
			</button>
		</div>
		<?php endif; ?>
<!-- Loading Lode More Js -->
<script>
jQuery(document).ready(function($) {

	'use strict';
	var options = {
		siteUrl: '<?php echo home_url( '/' ); ?>',
		totalPosts: <?php echo $total_post; ?>,
		loadMoreBtn: $('#bddex-load-more-btn-<?php echo $this->get_id(); ?>'),
		postContainer: $('.bddex-post-appender-<?php echo esc_attr( $this->get_id() ); ?>'),
		postStyle: 'block',
	}

	var settings = {
		postType: '<?php echo $settings['bddex_post_type']; ?>',
		perPage: parseInt( <?php echo $settings['bddex_posts_count'] ?>, 10 ),
		postOrder: '<?php echo $settings['bddex_post_order'] ?>',
		showImage: <?php echo $settings['bddex_show_image']; ?>,
		showTitle: <?php echo $settings['bddex_show_title']; ?>,
		showExcerpt: <?php echo $settings['bddex_show_excerpt']; ?>,
		showMeta: <?php echo $settings['bddex_show_meta']; ?>,
		metaPosition: '<?php echo $settings['bddex_post_block_meta_position']; ?>',
		excerptLength: parseInt( <?php echo $settings['bddex_excerpt_length']; ?>, 10 ),
		btnText: '<?php echo $settings['bddex_post_block_show_load_more_text']; ?>',
		categories: '<?php echo $categories_id_string; ?>',
	}

	bddexLoadMore( options, settings );

});

</script>
        <?php
	}

	protected function content_template() {
		?>

		<?php
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new Bddex_Post_Block() );