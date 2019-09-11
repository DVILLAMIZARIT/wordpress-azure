<?php
namespace Elementor;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class BDDEX_Portfolio extends Widget_Base {

    public function get_name() {
        return 'bddex-portfolio';
    }

    public function get_title() {
        return esc_html__('Avas Portfolio', 'avas-core');
    }

    public function get_icon() {
        return 'eicon-posts-grid';
    }

    public function get_categories() {
        return array('bddex');
    }

    public function get_script_depends() {
        return [
            'misc',
            'magnific-popup',
            'isotope',
            'imagesloaded'
        ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_query',
            [
                'label' => esc_html__('Post Query', 'avas-core'),
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
            'section_post_content',
            [
                'label' => esc_html__('Post Content', 'avas-core'),
            ]
        );

        $this->add_control(
            'heading',
            [
                'label' => esc_html__('Heading for the grid', 'avas-core'),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'taxonomy_filter',
            [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Choose the taxonomy to display and filter on.', 'avas-core'),
                'label_block' => true,
                'description' => esc_html__('Choose the taxonomy information to display for posts/portfolio and the taxonomy that is used to filter the portfolio/post. Takes effect only if no taxonomy filters are specified when building query.', 'avas-core'),
                'options' => bddex_get_taxonomies_map(),
                'default' => 'portfolio_category',
            ]
        );

        $this->add_control(
            'display_title',
            [
                'label' => esc_html__('Display posts title below the post item?', 'avas-core'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'avas-core'),
                'label_off' => esc_html__('No', 'avas-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'display_summary',
            [
                'label' => esc_html__('Display post excerpt/summary below the post item?', 'avas-core'),
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
                'label' => esc_html__('Display taxonomy info below the post item? Choose the right taxonomy in Post Content section above.', 'avas-core'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'avas-core'),
                'label_off' => esc_html__('No', 'avas-core'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_settings',
            [
                'label' => esc_html__('General Settings', 'avas-core'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );
        // $this->add_group_control(
        //     Group_Control_Image_Size::get_type(),
        //     [
        //         'name' => 'image',
        //         'exclude' => [ 'custom' ],
        //         'default' => 'medium',
        //     ]
        // );
        $this->add_responsive_control(
            'bddex_portfolio_image_height',
            [
                'label' => esc_html__( 'Image Height', 'avas-core' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => '',
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
                'selectors' => [
                    '{{WRAPPER}} .lae-project-image img' => 'height: {{SIZE}}px;',
                ],
            ]
        );
        $this->add_responsive_control(
            'bddex_portfolio_image_width',
            [
                'label' => esc_html__( 'Image Width', 'avas-core' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => '',
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
                'selectors' => [
                    '{{WRAPPER}} .lae-project-image img' => 'width: {{SIZE}}px;',
                ],
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
            'filterable',
            [
                'label' => esc_html__('Filterable?', 'avas-core'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'avas-core'),
                'label_off' => esc_html__('No', 'avas-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'per_line',
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
            'layout_mode',
            [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Choose a layout for the grid', 'avas-core'),
                'options' => array(
                    'fitRows' => esc_html__('Fit Rows', 'avas-core'),
                    'masonry' => esc_html__('Masonry', 'avas-core'),
                ),
                'default' => 'fitRows',
            ]
        );


        $this->add_control(
            'enable_lightbox',
            [
                'type' => Controls_Manager::SWITCHER,
                'label_off' => esc_html__('No', 'avas-core'),
                'label_on' => esc_html__('Yes', 'avas-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'label' => esc_html__('Enable Lightbox Gallery?', 'avas-core'),
            ]
        );

        $this->end_controls_section();

        // $this->start_controls_section(
        //     'section_pagination',
        //     [
        //         'label' => __('Pagination', 'avas-core'),
        //         'tab' => Controls_Manager::TAB_SETTINGS,
        //     ]
        // );

        // $this->add_control(
        //     'pagination',
        //     [
        //         'type' => Controls_Manager::SELECT,
        //         'label' => __('Pagination', 'avas-core'),
        //         'description' => __('Choose pagination type or choose None if no pagination is desired. Make sure the \'Post per page\' field value is set in the Build Query window to control number of posts to display per page.', 'avas-core'),
        //         'options' => array(
        //             'none' => __('None', 'avas-core'),
        //             'paged' => __('Paged', 'avas-core'),
        //             'load_more' => __('Load More', 'avas-core'),
        //         ),
        //         'default' => 'none',
        //     ]
        // );


        // $this->add_control(
        //     'show_remaining',
        //     [
        //         'label' => __('Display count of posts yet to be loaded with the load more button?', 'avas-core'),
        //         'type' => Controls_Manager::SWITCHER,
        //         'label_on' => __('Yes', 'avas-core'),
        //         'label_off' => __('No', 'avas-core'),
        //         'return_value' => 'yes',
        //         'default' => 'yes',
        //         'condition' => [
        //             'pagination' => 'load_more',
        //         ],
        //     ]
        // );

        // $this->end_controls_section();

        $this->start_controls_section(
            'section_responsive',
            [
                'label' => esc_html__('Gutter Options', 'avas-core'),
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
                'label' => esc_html__('Gutter', 'avas-core'),
                'description' => esc_html__('Space between columns in the grid.', 'avas-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 20,
                'selectors' => [
                    '{{WRAPPER}} .lae-portfolio' => 'margin-left: -{{VALUE}}px; margin-right: -{{VALUE}}px;',
                    '{{WRAPPER}} .lae-portfolio .lae-portfolio-item' => 'padding: {{VALUE}}px;',
                ],
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
                    '(tablet-){{WRAPPER}} .lae-portfolio' => 'margin-left: -{{VALUE}}px; margin-right: -{{VALUE}}px;',
                    '(tablet-){{WRAPPER}} .lae-portfolio .lae-portfolio-item' => 'padding: {{VALUE}}px;',
                ],
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
                'label' => esc_html__('Gutter', 'avas-core'),
                'description' => esc_html__('Space between columns.', 'avas-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 10,
                'selectors' => [
                    '(mobile-){{WRAPPER}} .lae-portfolio' => 'margin-left: -{{VALUE}}px; margin-right: -{{VALUE}}px;',
                    '(mobile-){{WRAPPER}} .lae-portfolio .lae-portfolio-item' => 'padding: {{VALUE}}px;',
                ],
            ]
        );

        $this->add_control(
            'mobile_width',
            [
                'label' => esc_html__('Tablet Resolution', 'avas-core'),
                'description' => esc_html__('The resolution to treat as a tablet resolution.', 'avas-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 480,
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_heading_styling',
            [
                'label' => esc_html__('Grid Heading', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_control(
            'heading_tag',
            [
                'label' => esc_html__( 'Heading HTML Tag', 'avas-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => esc_html__( 'H1', 'avas-core' ),
                    'h2' => esc_html__( 'H2', 'avas-core' ),
                    'h3' => esc_html__( 'H3', 'avas-core' ),
                    'h4' => esc_html__( 'H4', 'avas-core' ),
                    'h5' => esc_html__( 'H5', 'avas-core' ),
                    'h6' => esc_html__( 'H6', 'avas-core' ),
                    'div' => esc_html__( 'div', 'avas-core' ),
                ],
                'default' => 'h3',
            ]
        );

        $this->add_control(
            'heading_color',
            [
                'label' => esc_html__( 'Heading Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-portfolio-wrap .lae-heading' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'heading_typography',
                'selector' => '{{WRAPPER}} .lae-portfolio-wrap .lae-heading',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_filters_styling',
            [
                'label' => esc_html__('Grid Filters', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'filter_color',
            [
                'label' => esc_html__( 'Filter Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-portfolio-wrap .lae-taxonomy-filter .lae-filter-item a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'filter_hover_color',
            [
                'label' => esc_html__( 'Filter Hover Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-portfolio-wrap .lae-taxonomy-filter .lae-filter-item a:hover, {{WRAPPER}} .lae-portfolio-wrap .lae-taxonomy-filter .lae-filter-item.lae-active a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'filter_active_border',
            [
                'label' => esc_html__( 'Active Filter Border Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-portfolio-wrap .lae-taxonomy-filter .lae-filter-item.lae-active' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'filter_typography',
                'selector' => '{{WRAPPER}} .lae-portfolio-wrap .lae-taxonomy-filter .lae-filter-item a',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_grid_thumbnail_styling',
            [
                'label' => esc_html__('Grid Thumbnail', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_control(
            'thumbnail_hover_bg_color',
            [
                'label' => esc_html__( 'Thumbnail Hover Background Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-portfolio-wrap .lae-portfolio .lae-portfolio-item .lae-project-image .lae-image-overlay' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'thumbnail_hover_opacity',
            [
                'label' => esc_html__( 'Thumbnail Hover Opacity (%)', 'avas-core' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 0.5,
                ],
                'range' => [
                    'px' => [
                        'max' => 1,
                        'min' => 0.10,
                        'step' => 0.01,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .lae-portfolio-wrap .lae-portfolio .lae-portfolio-item .lae-project-image:hover .lae-image-overlay' => 'opacity: {{SIZE}};',
                ],
            ]
        );

        $this->add_control(
            'heading_thumbnail_info',
            [
                'label' => esc_html__( 'Thumbnail Info Entry Title', 'avas-core' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => esc_html__( 'Title HTML Tag', 'avas-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => esc_html__( 'H1', 'avas-core' ),
                    'h2' => esc_html__( 'H2', 'avas-core' ),
                    'h3' => esc_html__( 'H3', 'avas-core' ),
                    'h4' => esc_html__( 'H4', 'avas-core' ),
                    'h5' => esc_html__( 'H5', 'avas-core' ),
                    'h6' => esc_html__( 'H6', 'avas-core' ),
                    'div' => esc_html__( 'div', 'avas-core' ),
                ],
                'default' => 'h3',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-portfolio-wrap .lae-portfolio .lae-portfolio-item .lae-project-image .lae-image-info .lae-post-title a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_hover_border_color',
            [
                'label' => esc_html__( 'Title Hover Border Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-portfolio-wrap .lae-portfolio .lae-portfolio-item .lae-project-image .lae-image-info .lae-post-title a:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .lae-portfolio-wrap .lae-portfolio .lae-portfolio-item .lae-project-image .lae-image-info .lae-post-title',
            ]
        );

        $this->add_control(
            'heading_thumbnail_info_taxonomy',
            [
                'label' => esc_html__( 'Thumbnail Info Taxonomy Terms', 'avas-core' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'thumbnail_info_tags_color',
            [
                'label' => esc_html__( 'Taxonomy Terms Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-portfolio-wrap .lae-portfolio .lae-portfolio-item .lae-project-image .lae-image-info .lae-terms, {{WRAPPER}} .lae-portfolio-wrap .lae-portfolio .lae-portfolio-item .lae-project-image .lae-image-info .lae-terms a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'tags_typography',
                'selector' => '{{WRAPPER}} .lae-portfolio-wrap .lae-portfolio .lae-portfolio-item .lae-project-image .lae-image-info .lae-terms, {{WRAPPER}} .lae-portfolio-wrap .lae-portfolio .lae-portfolio-item .lae-project-image .lae-image-info .lae-terms a',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_entry_title_styling',
            [
                'label' => esc_html__('Grid Item Entry Title', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'entry_title_tag',
            [
                'label' => esc_html__( 'Entry Title HTML Tag', 'avas-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => esc_html__( 'H1', 'avas-core' ),
                    'h2' => esc_html__( 'H2', 'avas-core' ),
                    'h3' => esc_html__( 'H3', 'avas-core' ),
                    'h4' => esc_html__( 'H4', 'avas-core' ),
                    'h5' => esc_html__( 'H5', 'avas-core' ),
                    'h6' => esc_html__( 'H6', 'avas-core' ),
                    'div' => esc_html__( 'div', 'avas-core' ),
                ],
                'default' => 'h3',
            ]
        );

        $this->add_control(
            'entry_title_color',
            [
                'label' => esc_html__( 'Entry Title Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-portfolio-wrap .lae-portfolio .lae-portfolio-item .entry-title a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'entry_title_typography',
                'selector' => '{{WRAPPER}} .lae-portfolio-wrap .lae-portfolio .lae-portfolio-item .entry-title',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_entry_summary_styling',
            [
                'label' => esc_html__('Grid Item Entry Summary', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'entry_summary_color',
            [
                'label' => esc_html__( 'Entry Summary Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-portfolio-wrap .lae-portfolio .lae-portfolio-item .entry-summary' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'entry_summary_typography',
                'selector' => '{{WRAPPER}} .lae-portfolio-wrap .lae-portfolio .lae-portfolio-item .entry-summary',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_entry_meta_styling',
            [
                'label' => esc_html__('Grid Item Entry Meta', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'heading_entry_meta',
            [
                'label' => esc_html__( 'Entry Meta', 'avas-core' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'entry_meta_color',
            [
                'label' => esc_html__( 'Entry Meta Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-portfolio-wrap .lae-portfolio .lae-portfolio-item .lae-entry-meta span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'entry_meta_typography',
                'selector' => '{{WRAPPER}} .lae-portfolio-wrap .lae-portfolio .lae-portfolio-item .lae-entry-meta span',
            ]
        );


        $this->add_control(
            'heading_entry_meta_link',
            [
                'label' => esc_html__( 'Entry Meta Link', 'avas-core' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'entry_meta_link_color',
            [
                'label' => esc_html__( 'Entry Meta Link Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-portfolio-wrap .lae-portfolio .lae-portfolio-item .lae-entry-meta span a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'entry_meta_link_typography',
                'selector' => '{{WRAPPER}} .lae-portfolio-wrap .lae-portfolio .lae-portfolio-item .lae-entry-meta span a',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_pagination_styling',
            [
                'label' => esc_html__('Pagination', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'pagination_border_color',
            [
                'label' => esc_html__( 'Border Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-portfolio-wrap .lae-pagination .lae-page-nav, {{WRAPPER}} .lae-portfolio-wrap .lae-pagination .lae-page-nav:first-child' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'pagination_hover_bg_color',
            [
                'label' => esc_html__( 'Hover Background Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-portfolio-wrap .lae-pagination .lae-page-nav:hover, {{WRAPPER}} .lae-portfolio-wrap .lae-pagination .lae-page-nav.lae-current-page' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'pagination_nav_icon_color',
            [
                'label' => esc_html__( 'Nav Icon Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-portfolio-wrap .lae-pagination .lae-page-nav i' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'pagination_hover_nav_icon_color',
            [
                'label' => esc_html__( 'Hover Nav Icon Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-portfolio-wrap .lae-pagination .lae-page-nav.lae-disabled i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'pagination_disabled_nav_icon_color',
            [
                'label' => esc_html__( 'Disabled Nav Icon Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-portfolio-wrap .lae-pagination .lae-page-nav.lae-disabled i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'heading_nav_text',
            [
                'label' => esc_html__( 'Navigation text', 'avas-core' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_control(
            'pagination_text_color',
            [
                'label' => esc_html__( 'Nav Text Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-portfolio-wrap .lae-pagination .lae-page-nav' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'pagination_hover_text_color',
            [
                'label' => esc_html__( 'Hover Nav Text Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-portfolio-wrap .lae-pagination .lae-page-nav:hover, {{WRAPPER}} .lae-portfolio-wrap .lae-pagination .lae-page-nav.lae-current-page' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label' => esc_html__( 'Nav Text Typography', 'avas-core' ),
                'name' => 'pagination_text_typography',
                'selector' => '{{WRAPPER}} .lae-portfolio-wrap .lae-pagination .lae-page-nav',
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings();

        // Use the processed post selector query to find posts.
        $query_args = bddex_build_query_args($settings);

        $loop = new \WP_Query($query_args);

        // Loop through the posts and do something with them.
        if ($loop->have_posts()) :

            // Check if any taxonomy filter has been applied
            list($chosen_terms, $taxonomies) = bddex_get_chosen_terms($query_args);
            if (empty($chosen_terms))
                $taxonomies[] = $settings['taxonomy_filter'];

            ?>

            <div class="lae-portfolio-wrap lae-container"
                 data-query='<?php echo wp_json_encode($query_args); ?>'
                 data-settings='<?php echo wp_json_encode($settings); ?>'
                 data-taxonomies='<?php echo wp_json_encode($taxonomies); ?>'
                 data-current="1"
                 data-maxpages="<?php echo $loop->max_num_pages; ?>"
                 data-total="<?php echo $loop->found_posts; ?>">

                <?php if (!empty($settings['heading']) || $settings['filterable'] == 'yes'): ?>

                    <div class="lae-portfolio-header">

                        <?php if (!empty($settings['heading'])) : ?>

                            <<?php echo $settings['heading_tag']; ?> class="lae-heading"><?php echo wp_kses_post($settings['heading']); ?></<?php echo $settings['heading_tag']; ?>>

                        <?php endif; ?>

                        <?php

                        if ($settings['filterable'] == 'yes')
                            echo bddex_get_taxonomy_terms_filter($taxonomies, $chosen_terms);

                        ?>

                    </div>

                <?php endif; ?>

                <div id="lae-portfolio-<?php echo uniqid(); ?>"
                     class="lae-portfolio js-isotope lae-<?php echo esc_attr($settings['layout_mode']); ?>"
                     data-isotope-options='{ "itemSelector": ".lae-portfolio-item", "layoutMode": "<?php echo esc_attr($settings['layout_mode']); ?>" }'>

                    <?php bddex_posts_grid($loop, $settings, $taxonomies); ?>

                </div><!-- Isotope items -->

                <?php //echo lae_paginate_links($loop, $settings); ?>

            </div>

            <?php

        endif;
    }

    protected function content_template() {
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new BDDEX_Portfolio() );