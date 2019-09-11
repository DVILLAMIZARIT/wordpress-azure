<?php


namespace Elementor;


if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


class BDDEX_Gallery_Widget extends Widget_Base {

    public function get_name() {
        return 'lae-gallery';
    }

    public function get_title() {
        return esc_html__('Avas Image/Video Gallery', 'avas-core');
    }

    public function get_icon() {
        return 'eicon-gallery-grid';
    }

    public function get_categories() {
        return array('bddex');
    }

    public function get_script_depends() {
        return [
            'lae-widgets-scripts',
            'lae-frontend-scripts',
            'jquery-magnific-popup',
            'isotope.pkgd',
            'imagesloaded.pkgd'
        ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_gallery',
            [
                'label' => esc_html__('Gallery', 'avas-core'),
            ]
        );


        $this->add_control(
            'heading',
            [
                'label' => esc_html__('Heading for the grid', 'avas-core'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__('Title Here', 'avas-core'),
                'default' => esc_html__('Title Here', 'avas-core'),
            ]
        );


        $this->add_control(
            'gallery_items_heading',
            [
                'label' => esc_html__('Gallery Items', 'avas-core'),
                'type' => Controls_Manager::HEADING,
            ]
        );


        $this->add_control(
            'gallery_items',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => [

                    [
                        "type" => Controls_Manager::SELECT,
                        "name" => "item_type",
                        "label" => esc_html__("Item Type", "avas-core"),
                        'options' => array(
                            'image' => esc_html__('Image', 'avas-core'),
                            'youtube' => esc_html__('YouTube Video', 'avas-core'),
                            'vimeo' => esc_html__('Vimeo Video', 'avas-core'),
                        ),
                        'default' => 'image',
                    ],

                    [
                        'name' => 'item_name',
                        'label' => esc_html__('Item Label', 'avas-core'),
                        'type' => Controls_Manager::TEXT,
                        'description' => esc_html__('The label or name for the gallery item.', 'avas-core'),
                    ],

                    [
                        'name' => 'item_image',
                        'label' => esc_html__('Gallery Image', 'avas-core'),
                        'description' => esc_html__('The image for the gallery item. If item type chosen is YouTube or Vimeo video, the image will be used as a placeholder image for video.', 'avas-core'),
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'label_block' => true,
                    ],

                    [
                        'name' => 'item_tags',
                        'label' => esc_html__('Item Tag(s)', 'avas-core'),
                        'type' => Controls_Manager::TEXT,
                        'description' => esc_html__('One or more comma separated tags for the gallery item. Will be used as filters for the items.', 'avas-core'),
                    ],

                    [
                        'name' => 'item_link',
                        'label' => esc_html__('Item Link', 'avas-core'),
                        'description' => esc_html__('The URL of the page to which the image gallery item points to (optional).', 'avas-core'),
                        'type' => Controls_Manager::URL,
                        'label_block' => true,
                        'default' => [
                            'url' => '',
                            'is_external' => 'false',
                        ],
                        'placeholder' => esc_html__('http://your-link.com', 'avas-core'),
                        'condition' => [
                            'item_type' => ['image'],
                        ],
                    ],

                    [
                        'name' => 'video_link',
                        'label' => esc_html__('Video URL', 'avas-core'),
                        'description' => esc_html__('The URL of the YouTube or Vimeo video.', 'avas-core'),
                        'type' => Controls_Manager::TEXT,
                        'condition' => [
                            'item_type' => ['youtube', 'vimeo'],
                        ],
                    ],

                ],
               // 'title_field' => '{{{ item_name }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_settings',
            [
                'label' => esc_html__('General', 'avas-core'),
                'tab' => Controls_Manager::TAB_SETTINGS,
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
                'default' => 4,
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

        $this->start_controls_section(
            'section_pagination',
            [
             //  'label' => esc_html__('Pagination', 'avas-core'),
              // 'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );


        $this->add_control(
            'pagination',
            [
               'type' => Controls_Manager::SELECT,
              //  'label' => esc_html__('Pagination', 'avas-core'),
                // 'description' => esc_html__('Choose pagination type or choose None if no pagination is desired. Make sure you enter the items per page value in the option \'Number of items to be displayed per page and on each load more invocation\' field below to control number of items to display per page.', 'avas-core'),
                'options' => array(
                //    'none' => esc_html__('None', 'avas-core'),
                  //  'paged' => esc_html__('Paged', 'avas-core'),
                  //  'load_more' => esc_html__('Load More', 'avas-core'),
                ),
                'default' => 'none',
            ]
        );


        // $this->add_control(
        //     'show_remaining',
        //     [
        //         // 'label' => esc_html__('Display count of items yet to be loaded with the load more button?', 'avas-core'),
        //         // 'type' => Controls_Manager::SWITCHER,
        //         // 'label_on' => esc_html__('Yes', 'avas-core'),
        //         // 'label_off' => esc_html__('No', 'avas-core'),
        //         // 'return_value' => 'yes',
        //         // 'default' => 'yes',
        //         // 'condition' => [
        //         //     'pagination' => 'load_more',
        //         // ],
        //     ]
        // );


        $this->add_control(
            'items_per_page',
            [
                // 'label' => esc_html__('Number of items to be displayed per page and on each load more invocation.', 'avas-core'),
                // 'type' => Controls_Manager::NUMBER,
                'default' => -1,
                'condition' => [
                    'pagination' => ['load_more', 'paged'],
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_heading_styling',
            [
                'label' => esc_html__('Gallery Heading', 'avas-core'),
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
                    '{{WRAPPER}} .lae-gallery-wrap .lae-heading' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'heading_typography',
                'selector' => '{{WRAPPER}} .lae-gallery-wrap .lae-heading',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_filters_styling',
            [
                'label' => esc_html__('Gallery Filters', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'filter_color',
            [
                'label' => esc_html__( 'Filter Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-gallery-wrap .lae-taxonomy-filter .lae-filter-item a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'filter_hover_color',
            [
                'label' => esc_html__( 'Filter Hover Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-gallery-wrap .lae-taxonomy-filter .lae-filter-item a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'filter_active_border',
            [
                'label' => esc_html__( 'Active Filter Border Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-gallery-wrap .lae-taxonomy-filter .lae-filter-item.lae-active' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'filter_typography',
                'selector' => '{{WRAPPER}} .lae-gallery-wrap .lae-taxonomy-filter .lae-filter-item a',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_thumbnail_styling',
            [
                'label' => esc_html__('Gallery Thumbnail', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_control(
            'thumbnail_hover_bg_color',
            [
                'label' => esc_html__( 'Thumbnail Hover Background Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-gallery-wrap .lae-gallery .lae-gallery-item .lae-project-image .lae-image-overlay' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .lae-gallery-wrap .lae-gallery .lae-gallery-item .lae-project-image:hover .lae-image-overlay' => 'opacity: {{SIZE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_item_title_styling',
            [
                'label' => esc_html__('Gallery Item Title', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'item_title_tag',
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
            'item_title_color',
            [
                'label' => esc_html__( 'Title Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-gallery-wrap .lae-gallery .lae-gallery-item .lae-project-image .lae-image-info .lae-entry-title a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_hover_border_color',
            [
                'label' => esc_html__( 'Title Hover Border Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-gallery-wrap .lae-gallery .lae-gallery-item .lae-project-image .lae-image-info .lae-entry-title a:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'item_title_typography',
                'selector' => '{{WRAPPER}} .lae-gallery-wrap .lae-gallery .lae-gallery-item .lae-project-image .lae-image-info .lae-entry-title',
            ]
        );



        $this->end_controls_section();

        $this->start_controls_section(
            'section_item_tags',
            [
                'label' => esc_html__('Gallery Item Tags', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'item_tags_color',
            [
                'label' => esc_html__( 'Item Tags Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-gallery-wrap .lae-gallery .lae-gallery-item .lae-project-image .lae-image-info .lae-terms' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'item_tags_typography',
                'selector' => '{{WRAPPER}} .lae-gallery-wrap .lae-gallery .lae-gallery-item .lae-project-image .lae-image-info .lae-terms',
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
                    '{{WRAPPER}} .lae-gallery-wrap .lae-pagination .lae-page-nav, {{WRAPPER}} .lae-gallery-wrap .lae-pagination .lae-page-nav:first-child' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'pagination_hover_bg_color',
            [
                'label' => esc_html__( 'Hover Background Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-gallery-wrap .lae-pagination .lae-page-nav:hover, {{WRAPPER}} .lae-gallery-wrap .lae-pagination .lae-page-nav.lae-current-page' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'pagination_nav_icon_color',
            [
                'label' => esc_html__( 'Nav Icon Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-gallery-wrap .lae-pagination .lae-page-nav i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'pagination_disabled_nav_icon_color',
            [
                'label' => esc_html__( 'Disabled Nav Icon Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-gallery-wrap .lae-pagination .lae-page-nav.lae-disabled i' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .lae-gallery-wrap .lae-pagination .lae-page-nav' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label' => esc_html__( 'Nav Text Typography', 'avas-core' ),
                'name' => 'pagination_text_typography',
                'selector' => '{{WRAPPER}} .lae-gallery-wrap .lae-pagination .lae-page-nav',
            ]
        );

        $this->end_controls_section();

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
                    '{{WRAPPER}} .lae-gallery' => 'margin-left: -{{VALUE}}px; margin-right: -{{VALUE}}px;',
                    '{{WRAPPER}} .lae-gallery .lae-gallery-item' => 'padding: {{VALUE}}px;',
                ]
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
                    '(tablet-){{WRAPPER}} .lae-gallery' => 'margin-left: -{{VALUE}}px; margin-right: -{{VALUE}}px;',
                    '(tablet-){{WRAPPER}} .lae-gallery .lae-gallery-item' => 'padding: {{VALUE}}px;',
                ]
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
                    '(mobile-){{WRAPPER}} .lae-gallery' => 'margin-left: -{{VALUE}}px; margin-right: -{{VALUE}}px;',
                    '(mobile-){{WRAPPER}} .lae-gallery .lae-gallery-item' => 'padding: {{VALUE}}px;',
                ]
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

    }

    protected function render() {

        $settings = $this->get_settings();
        $items = $settings['gallery_items'];
        unset($settings['gallery_items']); // exclude items from settings

        if (!empty($items)) :

            $terms = bddex_get_gallery_terms($items);
            $max_num_pages = ceil(count($items) / $settings['items_per_page']);

            ?>

            <div class="lae-gallery-wrap lae-container"
                 data-settings='<?php echo wp_json_encode($settings); ?>'
                 data-items='<?php echo wp_json_encode($items); ?>'
                 data-maxpages='<?php echo $max_num_pages; ?>'
                 data-total='<?php echo count($items); ?>'
                 data-current='1'>

                <?php if (!empty($settings['heading']) || $settings['filterable'] == 'yes'): ?>

                    <div class="lae-gallery-header">

                        <?php if (!empty($settings['heading'])) : ?>

                            <<?php echo $settings['heading_tag']; ?> class="lae-heading"><?php echo wp_kses_post($settings['heading']); ?></<?php echo $settings['heading_tag']; ?>>

                        <?php endif; ?>

                        <?php

                        if ($settings['filterable'] == 'yes')
                            echo bddex_get_gallery_terms_filter($terms);

                        ?>

                    </div>

                <?php endif; ?>

                <div id="<?php echo uniqid('lae-gallery'); ?>"
                     class="lae-gallery js-isotope lae-<?php echo esc_attr($settings['layout_mode']); ?>"
                     data-isotope-options='{ "itemSelector": ".lae-gallery-item", "layoutMode": "<?php echo esc_attr($settings['layout_mode']); ?>" }'>

                    <?php bddex_display_gallery($items, $settings, 1); ?>

                </div><!-- Isotope items -->

                <?php echo bddex_paginate_gallery($items, $settings); ?>

            </div>

            <?php

        endif;
    }

    protected function content_template() {
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new BDDEX_Gallery_Widget() );


