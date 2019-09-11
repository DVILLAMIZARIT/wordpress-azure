<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_bddex_PostTimeline extends Widget_Base {

	public function get_name() {
		return 'bddex-post-timeline';
	}

	public function get_title() {
		return __( 'Avas Post Timeline', 'avas-core' );
	}

	public function get_icon() {
		return 'eicon-post-list';
	}

	public function get_categories() {
		return [ 'bddex' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'bddex_section_post_timeline_filters',
			[
				'label' => __( 'Post Settings', 'avas-core' )
			]
		);


		$this->add_control(
            'bddex_post_type',
            [
                'label' => __( 'Post Type', 'avas-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => bddex_get_post_types(),
                'default' => 'post',

            ]
        );

        $this->add_control(
            'category',
            [
                'label' => __( 'Categories', 'avas-core' ),
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
                'label' => __( 'Number of Posts', 'avas-core' ),
                'type' => Controls_Manager::NUMBER,
                'default' => '4'
            ]
        );

        $this->add_control(
            'bddex_post_offset',
            [
                'label' => __( 'Post Offset', 'avas-core' ),
                'type' => Controls_Manager::NUMBER,
                'default' => '0'
            ]
        );

        $this->add_control(
            'bddex_post_orderby',
            [
                'label' => __( 'Order By', 'avas-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => bddex_get_post_orderby_options(),
                'default' => 'date',

            ]
        );

        $this->add_control(
            'bddex_post_order',
            [
                'label' => __( 'Order', 'avas-core' ),
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
				'label' => __( 'Layout Settings', 'avas-core' )
			]
		);

    
        $this->add_control(
            'bddex_show_image',
            [
                'label' => __( 'Show Image', 'avas-core' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
					'1' => [
						'title' => __( 'Yes', 'avas-core' ),
						'icon' => 'fa fa-check',
					],
					'0' => [
						'title' => __( 'No', 'avas-core' ),
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


		$this->add_control(
            'bddex_show_title',
            [
                'label' => __( 'Show Title', 'avas-core' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
					'1' => [
						'title' => __( 'Yes', 'avas-core' ),
						'icon' => 'fa fa-check',
					],
					'0' => [
						'title' => __( 'No', 'avas-core' ),
						'icon' => 'fa fa-ban',
					]
				],
				'default' => '1'
            ]
        );

		$this->add_control(
            'bddex_show_excerpt',
            [
                'label' => __( 'Show excerpt', 'avas-core' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
					'1' => [
						'title' => __( 'Yes', 'avas-core' ),
						'icon' => 'fa fa-check',
					],
					'0' => [
						'title' => __( 'No', 'avas-core' ),
						'icon' => 'fa fa-ban',
					]
				],
				'default' => '1'
            ]
        );

        $this->add_control(
            'bddex_excerpt_length',
            [
                'label' => __( 'Excerpt Words', 'avas-core' ),
                'type' => Controls_Manager::NUMBER,
                'default' => '10',
                'condition' => [
                    'bddex_show_excerpt' => '1',
                ]

            ]
        );


		$this->end_controls_section();

        $this->start_controls_section(
            'bddex_section_post_timeline_style',
            [
                'label' => __( 'Timeline Style', 'avas-core' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
			'bddex_timeline_overlay_color',
			[
				'label' => __( 'Overlay Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'description' => __('Leave blank or Clear to use default gradient overlay', 'avas'),
				'default' => 'linear-gradient(45deg, #3f3f46 0%, #05abe0 100%) repeat scroll 0 0 rgba(0, 0, 0, 0)',
				'selectors' => [
					'{{WRAPPER}} .bddex-timeline-post-inner' => 'background: {{VALUE}}',
				]

			]
		);

        $this->add_control(
			'bddex_timeline_bullet_color',
			[
				'label' => __( 'Timeline Bullet Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default'=> '#9fa9af',
				'selectors' => [
					'{{WRAPPER}} .bddex-timeline-bullet' => 'background-color: {{VALUE}};',
				]

			]
		);

        $this->add_control(
			'bddex_timeline_bullet_border_color',
			[
				'label' => __( 'Timeline Bullet Border Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default'=> '#fff',
				'selectors' => [
					'{{WRAPPER}} .bddex-timeline-bullet' => 'border-color: {{VALUE}};',
				]

			]
		);

        $this->add_control(
			'bddex_timeline_vertical_line_color',
			[
				'label' => __( 'Timeline Vertical Line Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default'=> 'rgba(83, 85, 86, .2)',
				'selectors' => [
					'{{WRAPPER}} .bddex-timeline-post:after' => 'background-color: {{VALUE}};',
				]

			]
		);

        $this->add_control(
			'bddex_timeline_border_color',
			[
				'label' => __( 'Border & Arrow Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default'=> '#e5eaed',
				'selectors' => [
					'{{WRAPPER}} .bddex-timeline-post-inner' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .bddex-timeline-post-inner::after' => 'border-left-color: {{VALUE}};',
					'{{WRAPPER}} .bddex-timeline-post:nth-child(2n) .bddex-timeline-post-inner::after' => 'border-right-color: {{VALUE}};',
				]

			]
		);

        $this->add_control(
			'bddex_timeline_date_background_color',
			[
				'label' => __( 'Date Background Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default'=> 'rgba(0, 0, 0, 0.7)',
				'selectors' => [
					'{{WRAPPER}} .bddex-timeline-post time' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bddex-timeline-post time::before' => 'border-bottom-color: {{VALUE}};',
				]

			]
		);

        $this->add_control(
			'bddex_timeline_date_color',
			[
				'label' => __( 'Date Text Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default'=> '#fff',
				'selectors' => [
					'{{WRAPPER}} .bddex-timeline-post time' => 'color: {{VALUE}};',
				]

			]
		);


		$this->end_controls_section();

        $this->start_controls_section(
            'bddex_section_typography',
            [
                'label' => __( 'Typography', 'avas-core' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

		$this->add_control(
			'bddex_timeline_title_style',
			[
				'label' => __( 'Title Style', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_control(
			'bddex_timeline_title_color',
			[
				'label' => __( 'Title Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default'=> '#fff',
				'selectors' => [
					'{{WRAPPER}} .bddex-timeline-post-title h2' => 'color: {{VALUE}};',
				]

			]
		);

		$this->add_responsive_control(
			'bddex_timeline_title_alignment',
			[
				'label' => __( 'Title Alignment', 'avas-core' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'avas-core' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'avas-core' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'avas-core' ),
						'icon' => 'fa fa-align-right',
					]
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-timeline-post-title h2' => 'text-align: {{VALUE}};',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'bddex_timeline_title_typography',
				'label' => __( 'Typography', 'avas-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .bddex-timeline-post-title h2',
			]
		);

		$this->add_control(
			'bddex_timeline_excerpt_style',
			[
				'label' => __( 'Excerpt Style', 'avas-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_control(
			'bddex_timeline_excerpt_color',
			[
				'label' => __( 'Excerpt Color', 'avas-core' ),
				'type' => Controls_Manager::COLOR,
				'default'=> '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .bddex-timeline-post-excerpt p' => 'color: {{VALUE}};',
				]
			]
		);

        $this->add_responsive_control(
			'bddex_timeline_excerpt_alignment',
			[
				'label' => __( 'Excerpt Alignment', 'avas-core' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'avas-core' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'avas-core' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'avas-core' ),
						'icon' => 'fa fa-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'avas-core' ),
						'icon' => 'fa fa-align-justify',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bddex-timeline-post-excerpt p' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'bddex_timeline_excerpt_typography',
				'label' => __( 'excerpt Typography', 'avas-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .bddex-timeline-post-excerpt p',
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
            'bddex_section_load_more_btn',
            [
                'label' => __( 'Load More Button Style', 'avas-core' ),
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

	}


	protected function render( ) {
        $settings = $this->get_settings();

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
	        	//$total_post = $total_post + $category->category_count;
	        }
        }else {
        	$categories_id_string = '';
        	$total_post = wp_count_posts()->publish;
        }

        ?>

		<div id="bddex-post-timeline-<?php echo esc_attr($this->get_id()); ?>" class="bddex-post-timeline">
		    <div class="bddex-post-timeline bddex-post-appender-<?php echo esc_attr( $this->get_id() ); ?>">
		    <?php
		        if(count($posts)){
		            global $post;
		            ?>
		                <?php
		                    foreach($posts as $post){
		                        setup_postdata($post);
		                    ?>
		                    <article class="bddex-timeline-post bddex-timeline-column">
		                        <div class="bddex-timeline-bullet"></div>
		                        <div class="bddex-timeline-post-inner">
		                            <a class="bddex-timeline-post-link" href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
			                            <time datetime="<?php echo get_the_date(); ?>"><?php echo get_the_date(); ?></time>
			                            <div class="bddex-timeline-post-image" <?php if($settings['bddex_show_image'] == 1){ ?> style="background-image: url('<?php echo wp_get_attachment_image_url(get_post_thumbnail_id(), $settings['image_size'])?>');" <?php } ?>></div>
			                            <?php if($settings['bddex_show_excerpt']){ ?>
			                            <div class="bddex-timeline-post-excerpt">
			                                <p><?php echo  bddex_get_excerpt_by_id(get_the_ID(),$settings['bddex_excerpt_length']);?></p>
			                            </div>
			                            <?php } ?>

			                            <?php if($settings['bddex_show_title']){ ?>
			                            <div class="bddex-timeline-post-title">
			                                <h2><?php the_title(); ?></h2>
			                            </div>
			                            <?php } ?>
		                            </a>
		                        </div>
		                    </article>
		                    <?php
		                    }
		                    wp_reset_postdata();
		                ?>
		            <?php
		        }
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
Plugin::instance()->widgets_manager->register_widget_type( new Widget_bddex_PostTimeline() );