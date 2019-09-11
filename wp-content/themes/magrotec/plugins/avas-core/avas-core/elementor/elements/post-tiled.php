<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class Bddex_Post_Tiled extends Widget_Base {

    public function get_name() {
        return 'bddex-tiled-posts';
    }

    public function get_title() {
        return esc_html__( 'Avas Tiled Posts', 'avas-core' );
    }

    public function get_categories() {
        return [ 'bddex' ];
    }

    public function get_icon() {
        return 'eicon-posts-group';
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_post_settings',
            [
                'label'             => esc_html__( 'Settings', 'avas-core' ),
            ]
        );

        $this->add_control(
            'layout',
            [
                'label'             => esc_html__( 'Layout', 'avas-core' ),
                'type'              => Controls_Manager::SELECT,
                'options'           => [
                   'layout-1'       => esc_html__( 'Layout 1', 'avas-core' ),
                   'layout-2'       => esc_html__( 'Layout 2', 'avas-core' ),
                   'layout-3'       => esc_html__( 'Layout 3', 'avas-core' ),
                   'layout-4'       => esc_html__( 'Layout 4', 'avas-core' ),
                   'layout-5'       => esc_html__( 'Layout 5', 'avas-core' ),
                   'layout-6'       => esc_html__( 'Layout 6', 'avas-core' ),
                   'layout-7'       => esc_html__( 'Layout 7', 'avas-core' ),
                   'layout-8'       => esc_html__( 'Layout 8', 'avas-core' ),
                   'layout-9'       => esc_html__( 'Layout 9', 'avas-core' ),
                   'layout-10'       => esc_html__( 'Layout 10', 'avas-core' ),
                   'layout-11'       => esc_html__( 'Layout 11', 'avas-core' ),
                   'layout-12'       => esc_html__( 'Layout 12', 'avas-core' ),
                   'layout-13'       => esc_html__( 'Layout 13', 'avas-core' ),
                ],
                'default'           => 'layout-1',
            ]
        );

        $this->add_control(
            'content_vertical_position',
            [
                'label'             => esc_html__( 'Content Position', 'avas-core' ),
                'type'              => Controls_Manager::CHOOSE,
                'label_block'       => false,
                'options'           => [
                    'top'       => [
                        'title' => esc_html__( 'Top', 'avas-core' ),
                        'icon'  => 'eicon-v-align-top',
                    ],
                    'middle'    => [
                        'title' => esc_html__( 'Middle', 'avas-core' ),
                        'icon'  => 'eicon-v-align-middle',
                    ],
                    'bottom'    => [
                        'title' => esc_html__( 'Bottom', 'avas-core' ),
                        'icon'  => 'eicon-v-align-bottom',
                    ],
                ],
                'default'           => 'bottom',
            ]
        );
        
        $this->add_control(
            'post_title',
            [
                'label'             => esc_html__( 'Post Title', 'avas-core' ),
                'type'              => Controls_Manager::SWITCHER,
                'default'           => 'yes',
                'label_on'          => esc_html__( 'Yes', 'avas-core' ),
                'label_off'         => esc_html__( 'No', 'avas-core' ),
                'return_value'      => 'yes',
            ]
        );
        
        $this->add_control(
            'post_excerpt',
            [
                'label'             => esc_html__( 'Post Excerpt', 'avas-core' ),
                'type'              => Controls_Manager::SWITCHER,
                'default'           => 'no',
                'label_on'          => esc_html__( 'Yes', 'avas-core' ),
                'label_off'         => esc_html__( 'No', 'avas-core' ),
                'return_value'      => 'yes',
            ]
        );
        
        $this->add_control(
            'excerpt_length',
            [
                'label'             => esc_html__( 'Excerpt Length', 'avas-core' ),
                'type'              => Controls_Manager::NUMBER,
                'default'           => 20,
                'min'               => 0,
                'max'               => 58,
                'step'              => 1,
                'condition'         => [
                    'post_excerpt'  => 'yes'
                ]
            ]
        );
        
        $this->add_control(
            'read_more',
            [
                'label'             => esc_html__( 'Read More', 'avas-core' ),
                'type'              => Controls_Manager::SWITCHER,
                'default'           => 'no',
                'label_on'          => esc_html__( 'Yes', 'avas-core' ),
                'label_off'         => esc_html__( 'No', 'avas-core' ),
                'return_value'      => 'yes',
                'condition'         => [
                    'content_vertical_position'  => 'top'
                ]
            ]
        );

        $this->add_control(
            'read_more_text',
            [
                'label'             => esc_html__( 'Read More Text', 'avas-core' ),
                'type'              => Controls_Manager::TEXT,
                'default'           => esc_html__( 'Read More', 'avas-core' ),
                'condition'         => [
                    'read_more'     => 'yes'
                ]
            ]
        );
        
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name'              => 'image_size',
                'label'             => esc_html__( 'Image Size', 'avas-core' ),
                'default'           => 'medium_large',
            ]
        );

        $this->end_controls_section();

 
        $this->start_controls_section(
            'section_post_query',
            [
                'label'             => esc_html__( 'Query', 'avas-core' ),
            ]
        );

        $this->add_control(
            'post_type',
            [
                'label'             => esc_html__( 'Post Type', 'avas-core' ),
                'type'              => Controls_Manager::SELECT,
                'options'           => bddex_get_post_types(),
                'default'           => 'post',

            ]
        );

        $this->add_control(
            'categories',
            [
                'label'             => esc_html__( 'Categories', 'avas-core' ),
                'type'              => Controls_Manager::SELECT2,
                'label_block'       => true,
                'multiple'          => true,
                'options'           => bddex_post_type_categories(),
                'condition'         => [
                    'post_type' => 'post'
                ]
            ]
        );

        $this->add_control(
            'authors',
            [
                'label'             => esc_html__( 'Authors', 'avas-core' ),
                'type'              => Controls_Manager::SELECT2,
                'label_block'       => true,
                'multiple'          => true,
                'options'           => bddex_get_auhtors(),
            ]
        );

        $this->add_control(
            'tags',
            [
                'label'             => esc_html__( 'Tags', 'avas-core' ),
                'type'              => Controls_Manager::SELECT2,
                'label_block'       => true,
                'multiple'          => true,
                'options'           => bddex_get_tags(),
            ]
        );

        $this->add_control(
            'exclude_posts',
            [
                'label'             => esc_html__( 'Exclude Posts', 'avas-core' ),
                'type'              => Controls_Manager::SELECT2,
                'label_block'       => true,
                'multiple'          => true,
                'options'           => bddex_get_posts(),
            ]
        );

        $this->add_control(
            'order',
            [
                'label'             => esc_html__( 'Order', 'avas-core' ),
                'type'              => Controls_Manager::SELECT,
                'options'           => [
                   'DESC'           => esc_html__( 'Descending', 'avas-core' ),
                   'ASC'            => esc_html__( 'Ascending', 'avas-core' ),
                ],
                'default'           => 'DESC',
            ]
        );

        $this->add_control(
            'orderby',
            [
                'label'             => esc_html__( 'Order By', 'avas-core' ),
                'type'              => Controls_Manager::SELECT,
                'options'           => [
                   'date'           => esc_html__( 'Date', 'avas-core' ),
                   'modified'       => esc_html__( 'Last Modified Date', 'avas-core' ),
                   'rand'           => esc_html__( 'Rand', 'avas-core' ),
                   'comment_count'  => esc_html__( 'Comment Count', 'avas-core' ),
                   'title'          => esc_html__( 'Title', 'avas-core' ),
                   'ID'             => esc_html__( 'Post ID', 'avas-core' ),
                   'author'         => esc_html__( 'Post Author', 'avas-core' ),
                ],
                'default'           => 'date',
            ]
        );

        $this->add_control(
            'offset',
            [
                'label'             => esc_html__( 'Offset', 'avas-core' ),
                'type'              => Controls_Manager::TEXT,
                'default'           => '',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'section_post_meta',
            [
                'label'             => esc_html__( 'Post Meta', 'avas-core' ),
            ]
        );
        
        $this->add_control(
            'post_meta',
            [
                'label'             => esc_html__( 'Post Meta', 'avas-core' ),
                'type'              => Controls_Manager::SWITCHER,
                'default'           => 'yes',
                'label_on'          => esc_html__( 'Yes', 'avas-core' ),
                'label_off'         => esc_html__( 'No', 'avas-core' ),
                'return_value'      => 'yes',
            ]
        );

        $this->add_control(
            'post_meta_divider',
            [
                'label'             => esc_html__( 'Post Meta Divider', 'avas-core' ),
                'type'              => Controls_Manager::TEXT,
                'default'           => '|',
                'selectors'         => [
                    '{{WRAPPER}} .bx-tiled-posts-meta > span:not(:last-child):after' => 'content: "{{UNIT}}";',
                ],
                'condition'         => [
                    'post_meta'     => 'yes',
                ],
            ]
        );
        
        $this->add_control(
            'post_author',
            [
                'label'             => esc_html__( 'Post Author', 'avas-core' ),
                'type'              => Controls_Manager::SWITCHER,
                'default'           => 'yes',
                'label_on'          => esc_html__( 'Yes', 'avas-core' ),
                'label_off'         => esc_html__( 'No', 'avas-core' ),
                'return_value'      => 'yes',
                'condition'         => [
                    'post_meta'     => 'yes',
                ],
            ]
        );
        
        $this->add_control(
            'post_category',
            [
                'label'             => esc_html__( 'Post Category', 'avas-core' ),
                'type'              => Controls_Manager::SWITCHER,
                'default'           => 'yes',
                'label_on'          => esc_html__( 'Yes', 'avas-core' ),
                'label_off'         => esc_html__( 'No', 'avas-core' ),
                'return_value'      => 'yes',
                'condition'         => [
                    'post_meta'     => 'yes',
                ],
            ]
        );
        
        $this->add_control(
            'post_date',
            [
                'label'             => esc_html__( 'Post Date', 'avas-core' ),
                'type'              => Controls_Manager::SWITCHER,
                'default'           => 'yes',
                'label_on'          => esc_html__( 'Yes', 'avas-core' ),
                'label_off'         => esc_html__( 'No', 'avas-core' ),
                'return_value'      => 'yes',
                'condition'         => [
                    'post_meta'     => 'yes',
                ],
            ]
        );

        $this->end_controls_section();
        

        $this->start_controls_section(
            'section_post_content_style',
            [
                'label'             => esc_html__( 'Content', 'avas-core' ),
                'tab'               => Controls_Manager::TAB_STYLE,
            ]
        );
            
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'              => 'post_content_bg',
                'label'             => esc_html__( 'Post Content Background', 'avas-core' ),
                'types'             => [ 'classic', 'gradient' ],
                'selector'          => '{{WRAPPER}} .bx-tiled-post-content',
            ]
        );

        $this->add_control(
            'post_content_padding',
            [
                'label'             => esc_html__( 'Padding', 'avas-core' ),
                'type'              => Controls_Manager::DIMENSIONS,
                'size_units'        => [ 'px', 'em', '%' ],
                'selectors'         => [
                    '{{WRAPPER}} .bx-tiled-post-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->end_controls_section();

        $this->start_controls_section(
            'section_title_style',
            [
                'label'             => esc_html__( 'Title', 'avas-core' ),
                'tab'               => Controls_Manager::TAB_STYLE,
                'condition'         => [
                    'post_title'  => 'yes'
                ]
            ]
        );

        $this->add_control(
            'title_text_color',
            [
                'label'             => esc_html__( 'Text Color', 'avas-core' ),
                'type'              => Controls_Manager::COLOR,
                'default'           => '',
                'selectors'         => [
                    '{{WRAPPER}} .bx-tiled-post-title' => 'color: {{VALUE}}',
                ],
                'condition'         => [
                    'post_title'  => 'yes'
                ]
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'              => 'title_typography',
                'label'             => esc_html__( 'Typography', 'avas-core' ),
                'scheme'            => Scheme_Typography::TYPOGRAPHY_4,
                'selector'          => '{{WRAPPER}} .bx-tiled-post-title',
                'condition'         => [
                    'post_title'  => 'yes'
                ]
            ]
        );
        
        $this->add_responsive_control(
            'title_margin_bottom',
            [
                'label'             => esc_html__( 'Margin Bottom', 'avas-core' ),
                'type'              => Controls_Manager::SLIDER,
                'range'             => [
                    'px' => [
                        'min'   => 0,
                        'max'   => 100,
                        'step'  => 1,
                    ],
                ],
                'size_units'        => [ 'px' ],
                'selectors'         => [
                    '{{WRAPPER}} .bx-tiled-post-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
                'condition'         => [
                    'post_title'  => 'yes'
                ]
            ]
        );
        
        $this->end_controls_section();

        $this->start_controls_section(
            'section_cat_style',
            [
                'label'             => esc_html__( 'Post Category', 'avas-core' ),
                'tab'               => Controls_Manager::TAB_STYLE,
                'condition'         => [
                    'post_category'  => 'yes'
                ]
            ]
        );

        $this->add_control(
            'category_style',
            [
                'label'             => esc_html__( 'Category Style', 'avas-core' ),
                'type'              => Controls_Manager::SELECT,
                'options'           => [
                   'style-1'       => esc_html__( 'Style 1', 'avas-core' ),
                   'style-2'       => esc_html__( 'Style 2', 'avas-core' ),
                ],
                'default'           => 'style-1',
                'condition'         => [
                    'post_category'  => 'yes'
                ]
            ]
        );

        $this->add_control(
            'cat_bg_color',
            [
                'label'             => esc_html__( 'Background Color', 'avas-core' ),
                'type'              => Controls_Manager::COLOR,
                'scheme'            => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors'         => [
                    '{{WRAPPER}} .bx-post-categories-style-2 span' => 'background: {{VALUE}}',
                ],
                'condition'         => [
                    'post_category'     => 'yes',
                    'category_style'    => 'style-2'
                ]
            ]
        );

        $this->add_control(
            'cat_text_color',
            [
                'label'             => esc_html__( 'Text Color', 'avas-core' ),
                'type'              => Controls_Manager::COLOR,
                'default'           => '#fff',
                'selectors'         => [
                    '{{WRAPPER}} .bx-post-categories' => 'color: {{VALUE}}',
                ],
                'condition'         => [
                    'post_category'  => 'yes'
                ]
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'              => 'cat_typography',
                'label'             => esc_html__( 'Typography', 'avas-core' ),
                'scheme'            => Scheme_Typography::TYPOGRAPHY_4,
                'selector'          => '{{WRAPPER}} .bx-post-categories',
                'condition'         => [
                    'post_category'  => 'yes'
                ]
            ]
        );
        
        $this->add_responsive_control(
            'cat_margin_bottom',
            [
                'label'             => esc_html__( 'Margin Bottom', 'avas-core' ),
                'type'              => Controls_Manager::SLIDER,
                'range'             => [
                    'px' => [
                        'min'   => 0,
                        'max'   => 100,
                        'step'  => 1,
                    ],
                ],
                'size_units'        => [ 'px' ],
                'selectors'         => [
                    '{{WRAPPER}} .bx-post-categories' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
                'condition'         => [
                    'post_category'  => 'yes'
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
                    '{{WRAPPER}} .bx-post-categories-style-2 span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition'         => [
                    'post_category'     => 'yes',
                    'category_style'    => 'style-2'
                ]
            ]
        );
        
        $this->end_controls_section();


        $this->start_controls_section(
            'section_meta_style',
            [
                'label'             => esc_html__( 'Post Meta', 'avas-core' ),
                'tab'               => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'meta_text_color',
            [
                'label'             => esc_html__( 'Text Color', 'avas-core' ),
                'type'              => Controls_Manager::COLOR,
                'default'           => '#fff',
                'selectors'         => [
                    '{{WRAPPER}} .bx-tiled-posts-meta' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'              => 'meta_typography',
                'label'             => esc_html__( 'Typography', 'avas-core' ),
                'scheme'            => Scheme_Typography::TYPOGRAPHY_4,
                'selector'          => '{{WRAPPER}} .bx-tiled-posts-meta',
            ]
        );

        $this->end_controls_section();

    }


    protected function render() {
        $settings = $this->get_settings();
        
        $this->add_render_attribute( 'tiled-posts', 'class', 'bx-tiled-posts clearfix' );
        
        if ( $settings['layout'] ) {
            $this->add_render_attribute( 'tiled-posts', 'class', 'bx-tiled-posts-' . $settings['layout'] );
        }
        
        $this->add_render_attribute( 'post-content', 'class', 'bx-tiled-post-content' );
        
        if ( $settings['content_vertical_position'] ) {
            $this->add_render_attribute( 'post-content', 'class', 'bx-tiled-post-content-' . $settings['content_vertical_position'] );
        }
        
        $this->add_render_attribute( 'post-categories', 'class', 'bx-post-categories' );
        
        if ( $settings['category_style'] ) {
            $this->add_render_attribute( 'post-categories', 'class', 'bx-post-categories-' . $settings['category_style'] );
        }
        ?>
        <div <?php echo $this->get_render_attribute_string( 'tiled-posts' ); ?>>
            <?php
                $bx_post_position = 1;
        
                $bx_layout = $settings['layout'];

                if ( $bx_layout == 'layout-12' ) {
                    $bx_posts_count = '2';
                }

                elseif ( $bx_layout == 'layout-2' || $bx_layout == 'layout-3' || $bx_layout == 'layout-7' || $bx_layout == 'layout-9' || $bx_layout == 'layout-10' ) {
                    $bx_posts_count = '3';
                }
        
                elseif ( $bx_layout == 'layout-1' || $bx_layout == 'layout-6' || $bx_layout == 'layout-8' ) {
                    $bx_posts_count = '4';
                }
                
                elseif ( $bx_layout == 'layout-4' || $bx_layout == 'layout-5' || $bx_layout == 'layout-13' ) {
                    $bx_posts_count = '5';
                }
                elseif ( $bx_layout == 'layout-11' ) {
                    $bx_posts_count = '6';
                }
                else {
                    $bx_posts_count = '3';
                }

                // Post Authors
                $bx_tiled_post_author = '';
                $bx_tiled_post_authors = $settings['authors'];
                if ( !empty( $bx_tiled_post_authors) ) {
                    $bx_tiled_post_author = implode( ",", $bx_tiled_post_authors );
                }

                // Post Categories
                $bx_tiled_post_cat = '';
                $bx_tiled_post_cats = $settings['categories'];
                if ( !empty( $bx_tiled_post_cats) ) {
                    $bx_tiled_post_cat = implode( ",", $bx_tiled_post_cats );
                }
        
                // Query Arguments
                $args = array(
                    'post_status'           => array( 'publish' ),
                    'post_type'             => $settings['post_type'],
                    'post__in'              => '',
                    'cat'                   => $bx_tiled_post_cat,
                    'author'                => $bx_tiled_post_author,
                    'tag__in'               => $settings['tags'],
                    'orderby'               => $settings['orderby'],
                    'order'                 => $settings['order'],
                    'post__not_in'          => $settings['exclude_posts'],
                    'offset'                => $settings['offset'],
                    'ignore_sticky_posts'   => 1,
                    'showposts'             => $bx_posts_count
                );
                $featured_posts = new \WP_Query( $args );

                if ( $featured_posts->have_posts() ) : while ($featured_posts->have_posts()) : $featured_posts->the_post();
                    if ( $bx_layout == 'layout-1' || $bx_layout == 'layout-2' || $bx_layout == 'layout-3' || $bx_layout == 'layout-4' ) {

                        if ( $bx_post_position == 2 ) { ?><div class="bx-tiles-posts-right"><?php }
                    }

                    elseif ( $bx_layout == 'layout-13' ) {

                        if ( $bx_post_position == 1 ) { ?><div class="bx-tiles-posts-left"><?php }
                    }

                    if ( has_post_thumbnail() ) {
                        $image_id = get_post_thumbnail_id( get_the_ID() );
                        $bx_thumb_url = Group_Control_Image_Size::get_attachment_image_src( $image_id, 'image_size', $settings );
                    } else {
                        $bx_thumb_url = '';
                    }
                    ?>
                    <div class="bx-tiled-post bx-tiled-post-<?php echo intval( $bx_post_position ); ?>">
                            <div class="bx-tiled-post-bg" <?php if ( $bx_thumb_url ) { echo "style='background-image:url(".esc_url( $bx_thumb_url ).")'"; } ?>>
                                
                        <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
                        </a>
                            </div>
                        <div <?php echo $this->get_render_attribute_string( 'post-content' ); ?>>
                            <?php if ( $settings['post_meta'] == 'yes' ) { ?>
                                <?php if ( $settings['post_category'] == 'yes' ) { ?>
                                    <div <?php echo $this->get_render_attribute_string( 'post-categories' ); ?>>
                                        <span>
                                            <?php
                                                $category = get_the_category();
                                                if ( $category ) {
                                                    echo esc_attr( $category[0]->name );
                                                }
                                            ?>
                                        </span>
                                    </div><!---categories-->
                                <?php } ?>
                            <?php } ?>
                            <?php if ( $settings['post_title'] == 'yes' ) { ?>
                                <header>
                                    <h2 class="bx-tiled-post-title">
                                        <?php the_title(); ?>
                                    </h2>
                                </header>
                            <?php } ?>
                            <?php if ( $settings['post_meta'] == 'yes' ) { ?>
                                <div class="bx-tiled-posts-meta">
                                    <?php if ( $settings['post_author'] == 'yes' ) { ?>
                                        <span class="bx-post-author">
                                            <?php echo get_the_author(); ?>
                                        </span>
                                    <?php } ?>
                                    <?php if ( $settings['post_date'] == 'yes' ) { ?>
                                            <?php
                                                $bx_time_string = sprintf( '<time class="entry-date" datetime="%1$s">%2$s</time>',
                                                    esc_attr( get_the_date( 'c' ) ),
                                                    get_the_date()
                                                );

                                                printf( '<span class="bx-post-date"><span class="screen-reader-text">%1$s </span>%2$s</span>',
                                                    esc_html__( 'Posted on', 'avas-core' ),
                                                    $bx_time_string
                                                );
                                            ?>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div><!--.post-inner-->
                        <?php if ( $bx_layout == 'style-2') { ?>
                            <span class="read-story heading">
                                <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> <?php _e( 'Read Story', 'avas-core' ); ?>
                            </span>
                        <?php } ?>
                    </div>
                    <?php
                     if ( $bx_layout == 'layout-12' ) {
                        if ( $bx_post_position == 2 ) { ?></div><?php }
                    }
                    elseif ( $bx_layout == 'layout-1' || $bx_layout == 'layout-6' || $bx_layout == 'layout-8' ) {
                        if ( $bx_post_position == 4 ) { ?></div><?php }
                    }
                    elseif ( $bx_layout == 'layout-2' || $bx_layout == 'layout-3' || $bx_layout == 'layout-7' || $bx_layout == 'layout-9' || $bx_layout == 'layout-10' ) {
                        if ( $bx_post_position == 3 ) { ?></div><?php }
                    }
                    if ( $bx_layout == 'layout-4' || $bx_layout == 'layout-12' ) {
                        if ( $bx_post_position == 5 ) { ?></div><?php }
                    }
                    elseif ( $bx_layout == 'layout-11' ) {
                        if ( $bx_post_position == 6 ) { ?><?php }
                    }
                    elseif ( $bx_layout == 'layout-13' ) {
                        if ( $bx_post_position == 2 ) { ?></div><?php }
                    }
                $bx_post_position++; endwhile; endif; wp_reset_query();
        ?>
        </div>
        <?php
    }


    protected function _content_template() {}
}

Plugin::instance()->widgets_manager->register_widget_type( new Bddex_Post_Tiled() );