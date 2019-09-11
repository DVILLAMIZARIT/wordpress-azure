<?php

namespace Elementor;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class BDDEX_Posts_Carousel extends Widget_Base {

    public function get_name() {
        return 'bddex-posts-carousel';
    }

    public function get_title() {
        return esc_html__('Avas Posts Carousel 3', 'avas-core');
    }

    public function get_icon() {
        return 'eicon-posts-carousel';
    }

    public function get_categories() {
        return array('bddex');
    }

    public function get_script_depends() {
        return [
            'slick',
        ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_posts_carousel',
            [
                'label' => esc_html__('Posts Query', 'avas-core'),
            ]
        );

        $this->add_control(
            'post_types',
            [
                'label' => esc_html__('Post Types', 'avas-core'),
                'type' => Controls_Manager::SELECT2,
                'default' => 'post',
                'options' => bddex_get_all_post_type_options(),
                'multiple' => true
            ]
        );

        $this->add_control(
            'tax_query',
            [
                'label' => esc_html__('Taxonomies', 'avas-core'),
                'type' => Controls_Manager::SELECT2,
                'options' => bddex_get_all_taxonomy_options(),
                'multiple' => true,
                'label_block' => true
            ]
        );

        $this->add_control(
            'post_in',
            [
                'label' => esc_html__('Post In', 'avas-core'),
                'description' => esc_html__('Provide a comma separated list of Post IDs to display in the grid.', 'avas-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true
            ]
        );

        $this->add_control(
            'posts_per_page',
            [
                'label' => esc_html__('Posts Per Page', 'avas-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 6,
            ]
        );

        $this->add_control(
            'advanced',
            [
                'label' => esc_html__('Advanced', 'avas-core'),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'orderby',
            [
                'label' => esc_html__('Order By', 'avas-core'),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    'none' => esc_html__('No order', 'avas-core'),
                    'ID' => esc_html__('Post ID', 'avas-core'),
                    'author' => esc_html__('Author', 'avas-core'),
                    'title' => esc_html__('Title', 'avas-core'),
                    'date' => esc_html__('Published date', 'avas-core'),
                    'modified' => esc_html__('Modified date', 'avas-core'),
                    'parent' => esc_html__('By parent', 'avas-core'),
                    'rand' => esc_html__('Random order', 'avas-core'),
                    'comment_count' => esc_html__('Comment count', 'avas-core'),
                    'menu_order' => esc_html__('Menu order', 'avas-core'),
                    'post__in' => esc_html__('By include order', 'avas-core'),
                ),
                'default' => 'date',
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => esc_html__('Order', 'avas-core'),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    'ASC' => esc_html__('Ascending', 'avas-core'),
                    'DESC' => esc_html__('Descending', 'avas-core'),
                ),
                'default' => 'DESC',
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'bddex_section_post_block_layout',
            [
                'label' => __( 'Layout Settings', 'avas-core' )
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
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'image',
                'exclude' => [ 'custom' ],
                'default' => 'medium',
                // 'condition' => [
                //     'bddex_show_image' => '1',
                // ]
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
                        'step' => 5,
                    ]
                ],
                // 'condition' => [
                //     'bddex_show_image' => '1',
                // ],
                'selectors' => [
                    '{{WRAPPER}} .bddex-entry-thumbnail' => 'height: {{SIZE}}px;',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_post_content',
            [
                'label' => esc_html__('Post Content', 'avas-core'),
            ]
        );


        $this->add_control(
            'taxonomy_chosen',
            [
                'label' => esc_html__('Choose the taxonomy to display info.', 'avas-core'),
                'description' => esc_html__('Choose the taxonomy to use for display of taxonomy information for posts/custom post types.', 'avas-core'),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'default' => 'category',
                'options' => bddex_get_taxonomies_map(),
            ]
        );


        $this->add_control(
            'image_linkable',
            [
                'label' => esc_html__('Link Images to Posts?', 'avas-core'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'avas-core'),
                'label_off' => esc_html__('No', 'avas-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'display_title',
            [
                'label' => esc_html__('Display posts title?', 'avas-core'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'avas-core'),
                'label_off' => esc_html__('No', 'avas-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'p_c_title_text_limit',
            [
                'label' => esc_html__( 'Title character', 'avas-core' ),
                'type' => Controls_Manager::NUMBER,
                'default' => '50',
                'condition' => [
                    'display_title' => 'yes',
                ]

            ]
        );
        $this->add_control(
            'display_summary',
            [
                'label' => esc_html__('Display post excerpt?', 'avas-core'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'avas-core'),
                'label_off' => esc_html__('No', 'avas-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_post_meta',
            [
                'label' => esc_html__('Post Meta', 'avas-core'),
            ]
        );


        $this->add_control(
            'display_author',
            [
                'label' => esc_html__('Display post author info below the post item?', 'avas-core'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'avas-core'),
                'label_off' => esc_html__('No', 'avas-core'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->add_control(
            'post_meta_divider',
            [
                'label'             => esc_html__( 'Post Meta Divider', 'avas-core' ),
                'type'              => Controls_Manager::TEXT,
                'default'           => '|',
                'selectors'         => [
                    '{{WRAPPER}} .lae-entry-info .author:after' => 'content: "{{UNIT}}";',
                ],
                'condition'         => [
                    'display_author' => 'yes',
                    'bddex_post_block_grid_style'    => 'post-block-style-overlay'
                ],
            ]
        );

        $this->add_control(
            'display_post_date',
            [
                'label' => esc_html__('Display post date info below the post item?', 'avas-core'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'avas-core'),
                'label_off' => esc_html__('No', 'avas-core'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );


        $this->add_control(
            'display_taxonomy',
            [
                'label' => esc_html__('Display taxonomy info below the post item?', 'avas-core'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'avas-core'),
                'label_off' => esc_html__('No', 'avas-core'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_carousel_settings',
            [
                'label' => esc_html__('Carousel Settings', 'avas-core'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $this->add_control(
            'arrows',
            [
                'type' => Controls_Manager::SWITCHER,
                'label_off' => esc_html__('No', 'avas-core'),
                'label_on' => esc_html__('Yes', 'avas-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'label' => esc_html__('Prev/Next Arrows?', 'avas-core'),
            ]
        );


        $this->add_control(
            'dots',
            [
                'type' => Controls_Manager::SWITCHER,
                'label_off' => esc_html__('No', 'avas-core'),
                'label_on' => esc_html__('Yes', 'avas-core'),
                'return_value' => 'yes',
                'default' => 'no',
                'label' => esc_html__('Show dot indicators for navigation?', 'avas-core'),
            ]
        );

        $this->add_control(
            'pause_on_hover',
            [
                'type' => Controls_Manager::SWITCHER,
                'label_off' => esc_html__('No', 'avas-core'),
                'label_on' => esc_html__('Yes', 'avas-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'label' => esc_html__('Pause on Hover?', 'avas-core'),
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'type' => Controls_Manager::SWITCHER,
                'label_off' => esc_html__('No', 'avas-core'),
                'label_on' => esc_html__('Yes', 'avas-core'),
                'return_value' => 'yes',
                'default' => 'no',
                'label' => esc_html__('Autoplay?', 'avas-core'),
                'description' => esc_html__('Should the carousel autoplay as in a slideshow.', 'avas-core'),
            ]
        );

        $this->add_control(
            'autoplay_speed',
            [
                'label' => esc_html__('Autoplay speed in ms', 'avas-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 3000,
            ]
        );


        $this->add_control(
            'animation_speed',
            [
                'label' => esc_html__('Autoplay animation speed in ms', 'avas-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 300,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_responsive',
            [
                'label' => esc_html__('Responsive Options', 'avas-core'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $this->add_control(
            'heading_desktop',
            [
                'label' => esc_html__( 'Desktop', 'avas-core' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );


        $this->add_control(
            'gutter',
            [
                'label'             => esc_html__( 'Padding', 'avas-core' ),
                'type'              => Controls_Manager::DIMENSIONS,
                'size_units'        => [ 'px', 'em', '%' ],
                'selectors'         => [
                    '{{WRAPPER}} .bddex-posts-carousel .bddex-posts-carousel-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );
        $this->add_control(
            'display_columns',
            [
                'label' => esc_html__('Columns per row', 'avas-core'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 5,
                'step' => 1,
                'default' => 3,
            ]
        );


        $this->add_control(
            'scroll_columns',
            [
                'label' => esc_html__('Columns to scroll', 'avas-core'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 5,
                'step' => 1,
                'default' => 3,
            ]
        );

        $this->add_control(
            'heading_tablet',
            [
                'label' => esc_html__( 'Tablet', 'avas-core' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'tablet_gutter',
            [
                'label' => esc_html__('Gutter', 'avas-core'),
                'description' => esc_html__('Space between columns.', 'avas-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 10,
                'selectors' => [
                    '(tablet-){{WRAPPER}} .bddex-posts-carousel .bddex-posts-carousel-item' => 'padding: {{VALUE}}px;',
                ],
            ]
        );


        $this->add_control(
            'tablet_display_columns',
            [
                'label' => esc_html__('Columns per row', 'avas-core'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 5,
                'step' => 1,
                'default' => 2,
            ]
        );

        $this->add_control(
            'tablet_scroll_columns',
            [
                'label' => esc_html__('Columns to scroll', 'avas-core'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 5,
                'step' => 1,
                'default' => 2,
            ]
        );

        $this->add_control(
            'tablet_width',
            [
                'label' => esc_html__('Tablet Resolution', 'avas-core'),
                'description' => esc_html__('The resolution to treat as a tablet resolution.', 'avas-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 800,
            ]
        );


        $this->add_control(
            'heading_mobile',
            [
                'label' => esc_html__( 'Mobile Phone', 'avas-core' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'mobile_gutter',
            [
                'label' => esc_html__('Mobile Gutter', 'avas-core'),
                'description' => esc_html__('Space between columns.', 'avas-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 10,
                'selectors' => [
                    '(mobile-){{WRAPPER}} .bddex-posts-carousel .bddex-posts-carousel-item' => 'padding: {{VALUE}}px;',
                ],
            ]
        );

        $this->add_control(
            'mobile_display_columns',
            [
                'label' => esc_html__('Columns per row', 'avas-core'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 3,
                'step' => 1,
                'default' => 1,
            ]
        );

        $this->add_control(
            'mobile_scroll_columns',
            [
                'label' => esc_html__('Columns to scroll', 'avas-core'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 3,
                'step' => 1,
                'default' => 1,
            ]
        );

        $this->add_control(
            'mobile_width',
            [
                'label' => esc_html__('Mobile Resolution', 'avas-core'),
                'description' => esc_html__('The resolution to treat as a mobile resolution.', 'avas-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 480,
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_carousel_item_thumbnail_styling',
            [
                'label' => esc_html__('Post Thumbnail', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'thumbnail_hover_bg_color',
            [
                'label' => esc_html__( 'Thumbnail Background Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bddex-posts-carousel .bddex-posts-carousel-item .lae-project-image .lae-image-overlay' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'thumbnail_hover_opacity',
            [
                'label' => esc_html__( 'Thumbnail Opacity (%)', 'avas-core' ),
                'type' => Controls_Manager::SLIDER,
                // 'default' => [
                //     'size' => 0.5,
                // ],
                'range' => [
                    'px' => [
                        'max' => 1,
                        'min' => 0,
                        'step' => 0.01,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .bddex-posts-carousel .bddex-posts-carousel-item .lae-project-image .lae-image-overlay' => 'opacity: {{SIZE}};',
                ],
            ]
        );
         $this->end_controls_section();
        $this->start_controls_section(
            'p_c_c_bg',
            [
                'label' => esc_html__('Content', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'              => 'post_carousel_content_bg',
                'label'             => esc_html__( 'Post Content Background', 'avas-core' ),
                'types'             => [ 'classic', 'gradient' ],
                'selector'          => '{{WRAPPER}} .bddex-posts-carousel .bddex-posts-carousel-item .lae-project-image .lae-image-info .lae-entry-info,.bddex-posts-carousel .bddex-posts-carousel-item .lae-entry-text-wrap',
            ]
        );
        $this->add_control(
            'p_c_c_padding',
            [
                'label'             => esc_html__( 'Padding', 'avas-core' ),
                'type'              => Controls_Manager::DIMENSIONS,
                'size_units'        => [ 'px', 'em', '%' ],
                'selectors'         => [
                    '{{WRAPPER}} .bddex-posts-carousel .bddex-posts-carousel-item .lae-project-image .lae-image-info .lae-entry-info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );
        $this->add_responsive_control(
            'bddex_post_car_content_alignment',
            [
                'label' => esc_html__( 'Alignment', 'avas-core' ),
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
                    '{{WRAPPER}} .post-carousel-overlay .lae-entry-info' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'bddex_post_carousel_box_shadow',
                'selector' => '{{WRAPPER}} .bddex-posts-carousel-item',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_entry_title_styling',
            [
                'label' => esc_html__('Post Entry Title', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'entry_title_color',
            [
                'label' => esc_html__( 'Entry Title Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bddex-posts-carousel .bddex-posts-carousel-item .entry-title a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'entry_title_color_hover',
            [
                'label' => esc_html__( 'Entry Title Hover Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bddex-posts-carousel .bddex-posts-carousel-item .entry-title a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'p_c_t_margin',
            [
                'label'             => esc_html__( 'Margin', 'avas-core' ),
                'type'              => Controls_Manager::DIMENSIONS,
                'size_units'        => [ 'px', 'em', '%' ],
                'selectors'         => [
                    '{{WRAPPER}} .bddex-posts-carousel .bddex-posts-carousel-item .entry-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition'         => [
                    'display_taxonomy'     => 'yes',
                    'bddex_post_block_grid_style'    => 'post-block-style-overlay'
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'entry_title_typography',
                'selector' => '{{WRAPPER}} .bddex-posts-carousel .bddex-posts-carousel-item .entry-title',
            ]
        );
        $this->add_responsive_control(
            'title_align',
            [
                'label'     => esc_html__( 'Alignment', 'avas-core' ),
                'type'      => Controls_Manager::CHOOSE,
                'options'   => [
                    'left'      => [
                        'title' => esc_html__( 'Left', 'avas-core' ),
                        'icon'  => 'fa fa-align-left',
                    ],
                    'center'    => [
                        'title' => esc_html__( 'Center', 'avas-core' ),
                        'icon'  => 'fa fa-align-center',
                    ],
                    'right'     => [
                        'title' => esc_html__( 'Right', 'avas-core' ),
                        'icon'  => 'fa fa-align-right',
                    ],
                    'justify'   => [
                        'title' => esc_html__( 'Justified', 'avas-core' ),
                        'icon'  => 'fa fa-align-justify',
                    ],
                ],
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .lae-entry-info .entry-title' => 'text-align: {{VALUE}};',
                ],
                'condition'         => [
                    'display_taxonomy'     => 'yes',
                    'bddex_post_block_grid_style'    => 'post-block-style-overlay'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_entry_summary_styling',
            [
                'label' => esc_html__('Post Entry Summary', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'entry_summary_color',
            [
                'label' => esc_html__( 'Entry Summary Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bddex-posts-carousel .bddex-posts-carousel-item .entry-summary' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'entry_summary_typography',
                'selector' => '{{WRAPPER}} .bddex-posts-carousel .bddex-posts-carousel-item .entry-summary',
            ]
        );

        $this->end_controls_section();
       
        $this->start_controls_section(
            'section_entry_meta_styling',
            [
                'label' => esc_html__('Post Entry Meta', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

  
        $this->add_control(
            'cat_bg_color',
            [
                'label'             => esc_html__( 'Category Background Color', 'avas-core' ),
                'type'              => Controls_Manager::COLOR,
                'scheme'            => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,

                ],
                'selectors'         => [
                    '{{WRAPPER}} .lae-entry-info .lae-terms a' => 'background: {{VALUE}}',
                ],
                'condition'         => [
                    'display_taxonomy'     => 'yes',
                    'bddex_post_block_grid_style'    => 'post-block-style-overlay'
                ]
            ]
        );
        $this->add_control(
            'cat_bg_hover_color',
            [
                'label'             => esc_html__( 'Category Background Hover Color', 'avas-core' ),
                'type'              => Controls_Manager::COLOR,
                'scheme'            => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,

                ],
                'selectors'         => [
                    '{{WRAPPER}} .lae-entry-info .lae-terms a:hover' => 'background: {{VALUE}}',
                ],
                'condition'         => [
                    'display_taxonomy'     => 'yes',
                    'bddex_post_block_grid_style'    => 'post-block-style-overlay'
                ]
            ]
        );
        $this->add_control(
            'cat_color',
            [
                'label'             => esc_html__( 'Category Color', 'avas-core' ),
                'type'              => Controls_Manager::COLOR,
                'scheme'            => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,

                ],
                'selectors'         => [
                    '{{WRAPPER}} .lae-entry-info .lae-terms a' => 'color: {{VALUE}}',
                ],
                'condition'         => [
                    'display_taxonomy'     => 'yes',
                    'bddex_post_block_grid_style'    => 'post-block-style-overlay'
                ]
            ]
        );
        $this->add_control(
            'cat_hover_color',
            [
                'label'             => esc_html__( 'Category Hover Color', 'avas-core' ),
                'type'              => Controls_Manager::COLOR,
                'scheme'            => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,

                ],
                'selectors'         => [
                    '{{WRAPPER}} .lae-entry-info .lae-terms a:hover' => 'color: {{VALUE}}',
                ],
                'condition'         => [
                    'display_taxonomy'     => 'yes',
                    'bddex_post_block_grid_style'    => 'post-block-style-overlay'
                ]
            ]
        );

        
        $this->add_control(
            'cat_padding',
            [
                'label'             => esc_html__( 'Padding', 'avas-core' ),
                'type'              => Controls_Manager::DIMENSIONS,
                'size_units'        => [ 'px', 'em', '%' ],
                'selectors'         => [
                    '{{WRAPPER}} .lae-entry-info .lae-terms a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition'         => [
                    'display_taxonomy'     => 'yes',
                    'bddex_post_block_grid_style'    => 'post-block-style-overlay'
                ]
            ]
        );


        $this->add_control(
            'entry_meta_color',
            [
                'label' => esc_html__( 'Entry Meta Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bddex-posts-carousel .bddex-posts-carousel-item .lae-entry-meta span, .lae-image-info span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'entry_meta_typography',
                'selector' => '{{WRAPPER}} .lae-entry-info .lae-terms a',
            ]
        );


        

        $this->add_control(
            'entry_meta_link_color',
            [
                'label' => esc_html__( 'Entry Meta Link Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-entry-meta span a,.lae-entry-info .author-link,.author a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'entry_meta_link_hover_color',
            [
                'label' => esc_html__( 'Entry Meta Link Hover Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-entry-meta span a:hover,.lae-entry-info .author-link:hover,.author a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'entry_meta_link_typography',
                'selector' => '{{WRAPPER}} .bddex-posts-carousel .bddex-posts-carousel-item .author-link,.author a, .published',
            ]
        );
        $this->add_responsive_control(
            'meta_align',
            [
                'label'     => esc_html__( 'Alignment', 'avas-core' ),
                'type'      => Controls_Manager::CHOOSE,
                'options'   => [
                    'left'      => [
                        'title' => esc_html__( 'Left', 'avas-core' ),
                        'icon'  => 'fa fa-align-left',
                    ],
                    'center'    => [
                        'title' => esc_html__( 'Center', 'avas-core' ),
                        'icon'  => 'fa fa-align-center',
                    ],
                    'right'     => [
                        'title' => esc_html__( 'Right', 'avas-core' ),
                        'icon'  => 'fa fa-align-right',
                    ],
                    'justify'   => [
                        'title' => esc_html__( 'Justified', 'avas-core' ),
                        'icon'  => 'fa fa-align-justify',
                    ],
                ],
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .lae-entry-info .lae-terms,.author-date' => 'text-align: {{VALUE}};',
                ],
                'condition'         => [
                    'display_taxonomy'     => 'yes',
                    'display_author' => 'yes',
                    'display_post_date' =>'yes',
                    'bddex_post_block_grid_style'    => 'post-block-style-overlay'
                ]
            ]
        );
        


    }

    protected function render() {

        $settings = $this->get_settings();
        $taxonomies = array();
        // title text limit
        $title_text_limit   = $settings['p_c_title_text_limit'];
        if( $title_text_limit ){
            $title_text_limit = $title_text_limit;
        } else {
            $title_text_limit = 50;
        }
        $carousel_settings = [
            'arrows' => ('yes' === $settings['arrows']),
            'dots' => ('yes' === $settings['dots']),
            'autoplay' => ('yes' === $settings['autoplay']),
            'autoplay_speed' => absint($settings['autoplay_speed']),
            'animation_speed' => absint($settings['animation_speed']),
            'pause_on_hover' => ('yes' === $settings['pause_on_hover']),
        ];

        $responsive_settings = [
            'display_columns' => $settings['display_columns'],
            'scroll_columns' => $settings['scroll_columns'],
            'gutter' => $settings['gutter'],
            'tablet_width' => $settings['tablet_width'],
            'tablet_display_columns' => $settings['tablet_display_columns'],
            'tablet_scroll_columns' => $settings['tablet_scroll_columns'],
            'tablet_gutter' => $settings['tablet_gutter'],
            'mobile_width' => $settings['mobile_width'],
            'mobile_display_columns' => $settings['mobile_display_columns'],
            'mobile_scroll_columns' => $settings['mobile_scroll_columns'],
            'mobile_gutter' => $settings['mobile_gutter'],

        ];

        $carousel_settings = array_merge($carousel_settings, $responsive_settings);

        // Use the processed post selector query to find posts.
        $query_args = bddex_build_query_args($settings);

        $loop = new \WP_Query($query_args);

        // Loop through the posts and do something with them.
        if ($loop->have_posts()) : ?>

            <div id="bddex-posts-carousel-<?php echo uniqid(); ?>"
                 class="bddex-posts-carousel lae-container"
                 data-settings='<?php echo wp_json_encode($carousel_settings); ?>'>

                <?php $taxonomies[] = $settings['taxonomy_chosen']; ?>

                <?php while ($loop->have_posts()) : $loop->the_post(); ?>

                    <div data-id="id-<?php the_ID(); ?>" class="bddex-posts-carousel-item">
                        <?php if($settings['bddex_post_block_grid_style'] == 'post-block-style-default'){ ?>
                        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                            <?php if ($thumbnail_exists = has_post_thumbnail()): ?>

                                <div class="lae-project-image">
                                    <div class="bddex-entry-media">
                                        <div class="bddex-entry-thumbnail">
                                            <?php if ($thumbnail_exists = has_post_thumbnail()): ?>
                                                <img src="<?php echo wp_get_attachment_image_url(get_post_thumbnail_id(), $settings['image_size'])?>" alt="image">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="lae-image-overlay"></div>
                                </div>

                            <?php endif; ?>

                            <?php if (($settings['display_title'] == 'yes') || ($settings['display_summary'] == 'yes')) : ?>

                                <div class="lae-entry-text-wrap <?php echo($thumbnail_exists ? '' : ' nothumbnail'); ?>">

                                    <?php if ($settings['display_title'] == 'yes') : ?>

                                        <h3 class="entry-title"><a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo bddex_title_max_charlengths($title_text_limit); ?></a></h3>

                                    <?php endif; ?>

                                    <?php if (($settings['display_post_date'] == 'yes') || ($settings['display_author'] == 'yes') || ($settings['display_taxonomy'] == 'yes')) : ?>

                                        <div class="lae-entry-meta">

                                            <?php if ($settings['display_author'] == 'yes'): ?>

                                                <?php echo bddex_entry_author(); ?>

                                            <?php endif; ?>

                                            <?php if ($settings['display_post_date'] == 'yes'): ?>

                                                <?php echo bddex_entry_published(); ?>

                                            <?php endif; ?>

                                            <?php if ($settings['display_taxonomy'] == 'yes'): ?>

                                                <?php echo bddex_get_info_for_taxonomies($taxonomies); ?>

                                            <?php endif; ?>

                                        </div>

                                    <?php endif; ?>

                                    <?php if ($settings['display_summary'] == 'yes') : ?>

                                        <div class="entry-summary">

                                            <?php echo bddex_excerpt(20); ?>

                                        </div>

                                    <?php endif; ?>

                                </div>

                            <?php endif; ?>

                        </div>
                    <?php } ?>
                    <?php if($settings['bddex_post_block_grid_style'] == 'post-block-style-overlay'){ ?>
                        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                            <?php if ($thumbnail_exists = has_post_thumbnail()): ?>

                                <div class="lae-project-image">
                                    <div class="bddex-entry-media">
                                        <div class="bddex-entry-thumbnail">
                                            <?php if ($thumbnail_exists = has_post_thumbnail()): ?>
                                                <img src="<?php echo wp_get_attachment_image_url(get_post_thumbnail_id(), $settings['image_size'])?>" alt="image">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    
                                    <div class="lae-image-info post-carousel-overlay">
                                        <div class="lae-entry-info">
                                            <?php if ($settings['display_taxonomy'] == 'yes'): ?>

                                                <?php echo bddex_get_info_for_taxonomies($taxonomies); ?>

                                            <?php endif; ?>

                                           <?php if ($settings['display_title'] == 'yes') : ?>
                            
                                            <h3 class="entry-title"><a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo bddex_title_max_charlengths($title_text_limit); ?></a></h3>

                                            <?php endif; ?>
                                            <div class="author-date">
                                            <?php if ($settings['display_author'] == 'yes'): ?>
                                                <?php echo bddex_entry_author(); ?>
                                            <?php endif; ?>

                                            <?php if ($settings['display_post_date'] == 'yes'): ?>
                                            <?php echo bddex_entry_published(); ?>
                                            <?php endif; ?>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="lae-image-overlay"></div>

                                </div>

                            <?php endif; ?>

                        </div>
                    <?php } ?>
                        <!-- .hentry -->

                    </div><!--.bddex-posts-carousel-item -->

                <?php endwhile; ?>

                <?php wp_reset_postdata(); ?>

            </div> <!-- .bddex-posts-carousel -->

        <?php endif; ?>

        <?php
    }

    protected function content_template() {
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new BDDEX_Posts_Carousel() );