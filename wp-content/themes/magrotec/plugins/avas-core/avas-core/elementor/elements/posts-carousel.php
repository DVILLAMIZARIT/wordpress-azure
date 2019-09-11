<?php

namespace Elementor;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class BDDEX_Posts_Carousel_Widget extends Widget_Base {

    public function get_name() {
        return 'lae-posts-carousel';
    }

    public function get_title() {
        return esc_html__('Avas Posts Carousel 1', 'avas-core');
    }

    public function get_icon() {
        return 'eicon-posts-carousel';
    }

    public function get_categories() {
        return array('bddex');
    }

    public function get_script_depends() {
        return [
            'lae-widgets-scripts',
            'lae-frontend-scripts',
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
                'label' => esc_html__('Gutter', 'avas-core'),
                'description' => esc_html__('Space between columns.', 'avas-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 10,
                'selectors' => [
                    '{{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item' => 'padding: {{VALUE}}px;',
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
                    '(tablet-){{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item' => 'padding: {{VALUE}}px;',
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
                    '(mobile-){{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item' => 'padding: {{VALUE}}px;',
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
                'label' => esc_html__( 'Thumbnail Hover Background Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item .lae-project-image .lae-image-overlay' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item .lae-project-image:hover .lae-image-overlay' => 'opacity: {{SIZE}};',
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
                    '{{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item .lae-project-image .lae-image-info .lae-post-title a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_hover_border_color',
            [
                'label' => esc_html__( 'Title Hover Border Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item .lae-project-image .lae-image-info .lae-post-title a:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item .lae-project-image .lae-image-info .lae-post-title',
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
                    '{{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item .lae-project-image .lae-image-info .lae-terms, {{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item .lae-project-image .lae-image-info .lae-terms a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'tags_typography',
                'selector' => '{{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item .lae-project-image .lae-image-info .lae-terms, {{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item .lae-project-image .lae-image-info .lae-terms a',
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
                    '{{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item .entry-title a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'entry_title_typography',
                'selector' => '{{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item .entry-title',
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
                    '{{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item .entry-summary' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'entry_summary_typography',
                'selector' => '{{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item .entry-summary',
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
                    '{{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item .lae-entry-meta span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'entry_meta_typography',
                'selector' => '{{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item .lae-entry-meta span',
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
                    '{{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item .lae-entry-meta span a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'entry_meta_link_typography',
                'selector' => '{{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item .lae-entry-meta span a',
            ]
        );


    }

    protected function render() {

        $settings = $this->get_settings();
        $taxonomies = array();

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

            <div id="lae-posts-carousel-<?php echo uniqid(); ?>"
                 class="lae-posts-carousel lae-container"
                 data-settings='<?php echo wp_json_encode($carousel_settings); ?>'>

                <?php $taxonomies[] = $settings['taxonomy_chosen']; ?>

                <?php while ($loop->have_posts()) : $loop->the_post(); ?>

                    <div data-id="id-<?php the_ID(); ?>" class="lae-posts-carousel-item">

                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                            <?php if ($thumbnail_exists = has_post_thumbnail()): ?>

                                <div class="lae-project-image">

                                    <?php if ($settings['image_linkable'] == 'yes'): ?>

                                        <a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('large'); ?> </a>

                                    <?php else: ?>

                                        <?php the_post_thumbnail('large'); ?>

                                    <?php endif; ?>

                                    <div class="lae-image-info">

                                        <div class="lae-entry-info">

                                            <?php the_title('<'. $settings['title_tag']. ' class="lae-post-title"><a href="' . get_permalink() . '" title="' . get_the_title() . '"
                                               rel="bookmark">', '</a></'. $settings['title_tag'] . '>'); ?>

                                            <?php echo bddex_get_info_for_taxonomies($taxonomies); ?>

                                        </div>

                                    </div>

                                    <div class="lae-image-overlay"></div>

                                </div>

                            <?php endif; ?>

                            <?php if (($settings['display_title'] == 'yes') || ($settings['display_summary'] == 'yes')) : ?>

                                <div class="lae-entry-text-wrap <?php echo($thumbnail_exists ? '' : ' nothumbnail'); ?>">

                                    <?php if ($settings['display_title'] == 'yes') : ?>

                                        <?php the_title('<'. $settings['entry_title_tag']. ' class="entry-title"><a href="' . get_permalink() . '" title="' . get_the_title() . '"
                                               rel="bookmark">', '</a></'. $settings['entry_title_tag'] . '>'); ?>

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

                        </article>
                        <!-- .hentry -->

                    </div><!--.lae-posts-carousel-item -->

                <?php endwhile; ?>

                <?php wp_reset_postdata(); ?>

            </div> <!-- .lae-posts-carousel -->

        <?php endif; ?>

        <?php
    }

    protected function content_template() {
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new BDDEX_Posts_Carousel_Widget() );