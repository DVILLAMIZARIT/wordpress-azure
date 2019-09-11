<?php

namespace Elementor;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class BDDEX_Product_Grid extends Widget_Base {

    public function get_name() {
        return 'bddex-product-grid';
    }

    public function get_title() {
        return esc_html__('Avas WC Product Grid', 'avas-core');
    }

    public function get_icon() {
        return 'eicon-posts-grid';
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
                'label' => esc_html__('Query', 'avas-core'),
            ]
        );

       $this->add_control(
            'product_type',
            [
                'label'   => esc_html__( 'Product Type', 'avas-core' ),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'featured'        => esc_html__( 'Featured', 'avas-core' ),
                    'prodcut_cate' => esc_html__( 'Categories', 'avas-core' ),
                ],
                'default' => 'prodcut_cate',
            ]
        );
        $this->add_control(
            'source',
            [
                'label'   => esc_html__( 'Source', 'avas-core' ),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    ''        => esc_html__( 'Show All', 'avas-core' ),
                    'by_name' => esc_html__( 'Manual Selection', 'avas-core' ),
                ],
                'label_block' => true,
                 'condition'   => [
                    'product_type'    => 'prodcut_cate',
                ],
            ]
        );


        $product_categories = get_terms( 'product_cat' );

        $options = [];
        foreach ( $product_categories as $category ) {
            $options[ $category->slug ] = $category->name;
        }

        $this->add_control(
            'product_categories',
            [
                'label'       => esc_html__( 'Categories', 'avas-core' ),
                'type'        => Controls_Manager::SELECT2,
                'options'     => $options,
                'default'     => [],
                'label_block' => true,
                'multiple'    => true,
                'condition'   => [
                    'source'    => 'by_name',
                    'product_type'    => 'prodcut_cate',
                ],
            ]
        );


        $this->add_control(
            'posts_per_page',
            [
                'label' => esc_html__('Product Per Page', 'avas-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 8,
            ]
        );
        $this->add_control(
            'display_columns',
            [
                'label' => esc_html__('Columns per row', 'avas-core'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 6,
                'step' => 1,
                'default' => 4,
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
                'label'   => esc_html__( 'Order by', 'avas-core' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'date',
                'options' => [
                    'date'     => esc_html__( 'Date', 'avas-core' ),
                    'title'    => esc_html__( 'Title', 'avas-core' ),
                    'category' => esc_html__( 'Category', 'avas-core' ),
                    'rand'     => esc_html__( 'Random', 'avas-core' ),
                ],
            ]
        );
        // $this->add_control(
        //     'meta_key',
        //     [
        //         'label'   => esc_html__( 'Meta Key', 'avas-core' ),
        //         'type'    => Controls_Manager::SELECT,
        //         'default' => 'total_sales',
        //         'options' => [
        //             'total_sales'    => esc_html__( 'Total Sales', 'avas-core' ),
        //             '_regular_price' => esc_html__( 'Regular Price', 'avas-core' ),
        //             '_sale_price'    => esc_html__( 'Sale Price', 'avas-core' ),
        //         ],
        //     ]
        // );

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
                'label' => esc_html__( 'Layout Settings', 'avas-core' )
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'image',
                'exclude' => [ 'custom' ],
                'default' => 'medium',

            ]
        );
        $this->add_responsive_control(
            'bddex_post_block_thumb_image_height',
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
                        'max' => 500,
                        'step' => 5,
                    ]
                ],

                'selectors' => [
                    '{{WRAPPER}} .bddex-entry-thumbnail' => 'height: {{SIZE}}px;',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_post_content',
            [
                'label' => esc_html__('Content', 'avas-core'),
            ]
        );


        $this->add_control(
            'taxonomy_chosen',
            [
                'label' => esc_html__('Choose the taxonomy to display info.', 'avas-core'),
                'description' => esc_html__('Choose the taxonomy to use for display of taxonomy information for posts/custom post types.', 'avas-core'),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'default' => 'product_cat',
                'options' => bddex_get_taxonomies_map(),
            ]
        );


        $this->add_control(
            'image_linkable',
            [
                'label' => esc_html__('Link Images to product?', 'avas-core'),
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
                'label' => esc_html__('Display product title?', 'avas-core'),
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
                'label' => esc_html__( 'Title character', 'avas-core-core' ),
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
                'label' => esc_html__('Display product excerpt?', 'avas-core'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'avas-core'),
                'label_off' => esc_html__('No', 'avas-core'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->add_control(
            'display_price',
            [
                'label' => esc_html__('Display price?', 'avas-core'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'avas-core'),
                'label_off' => esc_html__('No', 'avas-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'display_sale_badge',
            [
                'label' => esc_html__('Display Sale Badge?', 'avas-core'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'avas-core'),
                'label_off' => esc_html__('No', 'avas-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'display_cart',
            [
                'label' => esc_html__('Display Cart?', 'avas-core'),
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
                'label' => esc_html__('Meta', 'avas-core'),
            ]
        );


        $this->add_control(
            'display_author',
            [
                'label' => esc_html__('Display product author info below the product item?', 'avas-core'),
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
                'label' => esc_html__('Display product date info below the product item?', 'avas-core'),
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
                'label' => esc_html__('Display taxonomy info below the product item?', 'avas-core'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'avas-core'),
                'label_off' => esc_html__('No', 'avas-core'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->end_controls_section();

        

        $this->start_controls_section(
            'section_carousel_item_thumbnail_styling',
            [
                'label' => esc_html__('Thumbnail', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'thumbnail_hover_bg_color',
            [
                'label' => esc_html__( 'Thumbnail Background Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-project-image .lae-image-overlay' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'thumbnail_hover_opacity',
            [
                'label' => esc_html__( 'Thumbnail Opacity (%)', 'avas-core' ),
                'type' => Controls_Manager::SLIDER,
                
                'range' => [
                    'px' => [
                        'max' => 1,
                        'min' => 0,
                        'step' => 0.01,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .lae-project-image .lae-image-overlay' => 'opacity: {{SIZE}};',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'p_c_c_bgs',
            [
                'label' => esc_html__('Content', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        // $this->add_group_control(
        //     Group_Control_Background::get_type(),
        //     [
        //         'name'              => 'bddex-product-wrap',
        //         'label'             => esc_html__( 'Content Background', 'avas-core' ),
        //         'types'             => [ 'classic', 'gradient' ],
        //         'selector'          => '{{WRAPPER}} .bddex-product-wrap',
        //     ]
        // );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'              => 'post_carousel_content_bgs',
                'label'             => esc_html__( 'Content Background', 'avas-core' ),
                'types'             => [ 'classic', 'gradient' ],
                'selector'          => '{{WRAPPER}} .bddex-product-wrap',
            ]
        );
        $this->add_control(
            'p_c_c_paddings',
            [
                'label'             => esc_html__( 'Padding', 'avas-core' ),
                'type'              => Controls_Manager::DIMENSIONS,
                'size_units'        => [ 'px', 'em', '%' ],
                'selectors'         => [
                    '{{WRAPPER}} .bddex-product-grid .bddex-product-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );
        $this->add_control(
            'p_c_c_margs',
            [
                'label'             => esc_html__( 'Margin', 'avas-core' ),
                'type'              => Controls_Manager::DIMENSIONS,
                'size_units'        => [ 'px', 'em', '%' ],
                'selectors'         => [
                    '{{WRAPPER}} .bddex-product-grid' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );
        $this->add_responsive_control(
            'bddex_post_car_content_alignments',
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
                    '{{WRAPPER}} .bddex-product-grid .bddex-product-wrap' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'bddex_product_grid_box_shadow',
                'selector' => '{{WRAPPER}} .bddex-product-grid .bddex-product-wrap',
            ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_entry_title_styling',
            [
                'label' => esc_html__('Entry Title', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'entry_title_color',
            [
                'label' => esc_html__( 'Entry Title Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bddex-product-grid .entry-title a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'entry_title_color_hover',
            [
                'label' => esc_html__( 'Entry Title Hover Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bddex-product-grid .entry-title a:hover' => 'color: {{VALUE}};',
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
                'selector' => '{{WRAPPER}} .bddex-product-grid .entry-title',
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
                    '{{WRAPPER}} .bddex-product-grid .entry-title' => 'text-align: {{VALUE}};',
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
                'label' => esc_html__('Entry Summary', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'entry_summary_color',
            [
                'label' => esc_html__( 'Entry Summary Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bddex-product-grid .entry-summary' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'entry_summary_typography',
                'selector' => '{{WRAPPER}} .bddex-product-grid .entry-summary',
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'section_product_price_styling',
            [
                'label' => esc_html__('Price', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'product_reg_price_color',
            [
                'label' => esc_html__( 'Regular Price Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-price .price' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'prod_sale_price_color',
            [
                'label' => esc_html__( 'Sale Price Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bddex-product-grid .product-price .price del' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'product_price_typography',
                'selector' => '{{WRAPPER}} .bddex-product-grid .product-price',
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'section_product_sale_badge_styling',
            [
                'label' => esc_html__('Sale Badge', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'prod_sale_badge_color',
            [
                'label' => esc_html__( 'Sale Badge Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-badge .onsale' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'prod_sale_badge_bg_color',
            [
                'label' => esc_html__( 'Sale Badge Background Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-badge .onsale' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'product_sale_badge_typography',
                'selector' => '{{WRAPPER}} .product-badge .onsale',
            ]
        );
        $this->add_control(
            'prod_sale_badge_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'avas-core' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    '%' => [
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .product-badge .onsale' => 'border-radius: {{SIZE}}px;',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_product_cart_styling',
            [
                'label' => esc_html__('Cart', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'product_cart_typography',
                'selector' => '{{WRAPPER}} .product-cart a',
            ]
        );
        $this->add_control(
            'prod_cart_bg_color',
            [
                'label' => esc_html__( 'Background Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-cart' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'prod_cart_bg_hover_color',
            [
                'label' => esc_html__( 'Background Hover Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-cart:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'prod_cart_color',
            [
                'label' => esc_html__( 'Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-cart a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'prod_cart_hover_color',
            [
                'label' => esc_html__( 'Hover Color', 'avas-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-cart:hover a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'prod_cart_padding',
            [
                'label' => esc_html__( 'Padding', 'avas-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                        '{{WRAPPER}} .product-cart' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'prod_cart_border',
                'label' => esc_html__( 'Border', 'avas-core' ),
                'selector' => '{{WRAPPER}} .product-cart',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_entry_meta_styling',
            [
                'label' => esc_html__('Entry Meta', 'avas-core'),
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
                    '{{WRAPPER}} .published' => 'color: {{VALUE}};',
                ],
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
                'selector' => '{{WRAPPER}} .author-link,.author a,.lae-terms a, .published',
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
        

         $query_args = array(
            'post_type'           => 'product',
            'post_status'         => 'publish',
            'ignore_sticky_posts' => 1,
            'posts_per_page'      => $settings['posts_per_page'],
            'no_found_rows'       => true,
        //    'meta_key'            => $settings['meta_key'],
            'orderby'             => $settings['orderby'],
        //    'orderby'             => 'meta_value_num',
            'order'               => $settings['order'],
        );
        
        if($settings['product_type'] == 'featured'){
            $query_args['tax_query'][] = array(
                'taxonomy' => 'product_visibility',
                'field'    => 'name',
                'terms'    => 'featured',
            );
        } 

        elseif ( 'by_name' === $settings['source'] and !empty($settings['product_categories']) ) {            
            $query_args['tax_query'][] = array(
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => $settings['product_categories'],
            );
        }

        $loop = new \WP_Query($query_args);

        // Loop through the posts and do something with them.
        if ($loop->have_posts()) : ?>

            <div class="ex-container">

                <?php $taxonomies[] = $settings['taxonomy_chosen']; ?>

                <?php while ($loop->have_posts()) : $loop->the_post(); ?>

                    <div class="ex-col-<?php echo $settings['display_columns']; ?> tx-ip-2 bddex-product-grid">
                       
                        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                            <?php if ($thumbnail_exists = has_post_thumbnail()): ?>

                                <div class="lae-project-image">
                                    <?php if ($settings['display_sale_badge'] == 'yes'): ?>
                                    <div class="product-badge"><?php woocommerce_show_product_loop_sale_flash(); ?></div>
                                    <?php endif; ?>
                                    
                                    <div class="bddex-entry-media">

                                        <div class="bddex-entry-thumbnail">
                                            <?php if ($thumbnail_exists = has_post_thumbnail()): ?>
                                                <img src="<?php echo wp_get_attachment_image_url(get_post_thumbnail_id(), $settings['image_size'])?>" alt="image">
                                            <?php endif; ?>
                                        </div>
                                        <?php if ($settings['display_cart'] == 'yes'): ?>
                                    <div class="product-cart"><?php woocommerce_template_loop_add_to_cart();?></div>
                                    <?php endif; ?>
                                    <div class="lae-image-overlay"></div>
                                    </div>

                                </div>

                            <?php endif; ?>

                            <?php if (($settings['display_title'] == 'yes') || ($settings['display_summary'] == 'yes')) : ?>

                                <div class="bddex-product-wrap <?php echo($thumbnail_exists ? '' : ' nothumbnail'); ?>">

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
                                    <?php if ($settings['display_price'] == 'yes'): ?>
                                    <div class="product-price"><?php woocommerce_template_single_price(); ?></div>
                                    <?php endif; ?>
                                </div>

                            <?php endif; ?>

                        </div>
                   
                   
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

Plugin::instance()->widgets_manager->register_widget_type( new BDDEX_Product_Grid() );