<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Bddex_Post_Grid_View extends Widget_Base {

    public function get_name() {
        return 'bddex-post-grid-view';
    }

    public function get_title() {
        return esc_html__( 'Avas Post Grid View', 'avas-core' );
    }

    public function get_icon() {
        return 'eicon-thumbnails-half';
    }

    public function get_categories() {
        return [ 'bddex' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'bddex_post_block11',
            [
                'label'     => esc_html__( 'Settings', 'avas-core' )
            ]
        );
        $this->add_control(
          'post_count',
          [
            'label'         => esc_html__( 'Post count', 'avas-core' ),
            'type'          => Controls_Manager::NUMBER,
            'label_block'   => true,
            'default'       => esc_html__( '5', 'avas-core' ),

          ]
        );
        $this->add_control(
            'post_offset',
            [
              'label'         => esc_html__( 'Post Offset', 'avas-core' ),
              'type'          => Controls_Manager::NUMBER,
              'label_block'   => true,
              'default'       => esc_html__( '0', 'avas-core' ),
  
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
        $this->add_control(
          'post_catd',
          [
             'label'    => esc_html__( 'Select category', 'avas-core' ),
             'type'     => Controls_Manager::SELECT,
             'options'  => bddex_category_lists( 'category' ),
             'multiple' => false,
             'default'  => '0'
          ]
        );
        $this->add_control(
            'custom_title_en',
            [
                'label'         => esc_html__( 'Enable custom title limit', 'avas-core' ),
                'type'          => Controls_Manager::SWITCHER,
                'default'       => 'no',
                'label_on'      => esc_html__( 'Yes', 'avas-core' ),
                'label_off'     => esc_html__( 'No', 'avas-core' ),
            ]
        );
        $this->add_control(
          'title_text_limit',
          [
            'label'         => esc_html__( 'Add title text limit', 'avas-core' ),
            'type'          => Controls_Manager::NUMBER,
            'label_block'   => true,
            'default'       => 50,
            'condition' => [
                'custom_title_en' => 'yes',
            ],
          ]
        );
        $this->add_control(
            'into_text_en',
            [
                'label'         => esc_html__( 'Enable Content intro text', 'avas-core' ),
                'type'          => Controls_Manager::SWITCHER,
                'default'       => 'no',
                'label_on'      => esc_html__( 'Yes', 'avas-core' ),
                'label_off'     => esc_html__( 'No', 'avas-core' ),
            ]
        );

        $this->add_control(
          'intro_text_limit',
          [
            'label'         => esc_html__( 'Content text limit', 'avas-core' ),
            'type'          => Controls_Manager::NUMBER,
            'label_block'   => true,
            'default'       => 80,
            'condition' => [
                'into_text_en' => 'yes',
            ],
          ]
        );
        $this->add_control(
            'post_data_en',
            [
                'label'         => esc_html__( 'Enable Date', 'avas-core' ),
                'type'          => Controls_Manager::SWITCHER,
                'default'       => 'yes',
                'label_on'      => esc_html__( 'Yes', 'avas-core' ),
                'label_off'     => esc_html__( 'No', 'avas-core' ),
            ]
        );
        $this->add_control(
            'post_cat_en',
            [
                'label'         => esc_html__( 'Enable Category', 'avas-core' ),
                'type'          => Controls_Manager::SWITCHER,
                'default'       => 'yes',
                'label_on'      => esc_html__( 'Yes', 'avas-core' ),
                'label_off'     => esc_html__( 'No', 'avas-core' ),
            ]
        );
        $this->add_control(
            'post_author_en',
            [
                'label'         => esc_html__( 'Enable Author', 'avas-core' ),
                'type'          => Controls_Manager::SWITCHER,
                'default'       => 'yes',
                'label_on'      => esc_html__( 'Yes', 'avas-core' ),
                'label_off'     => esc_html__( 'No', 'avas-core' ),
            ]
        );
        $this->add_control(
            'post_sortby',
            [
                'label'     => esc_html__( 'Post sort by', 'avas-core' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'latestpost',
                'options'   => [
                        'latestpost'      => esc_html__( 'Latest posts', 'avas-core' ),
                        'popularposts'    => esc_html__( 'Popular posts', 'avas-core' ),
                        'mostdiscussed'    => esc_html__( 'Most discussed', 'avas-core' ),
                    ],
            ]
        );
        $this->add_control(
            'post_order',
            [
                'label'     => esc_html__( 'Post order', 'avas-core' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'DESC',
                'options'   => [
                        'DESC'      => esc_html__( 'Descending', 'avas-core' ),
                        'ASC'       => esc_html__( 'Ascending', 'avas-core' ),
                    ],
            ]
        );
        $this->add_control(
            'post_orderby',
            [
                'label'     => esc_html__( 'Post order by', 'avas-core' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'date',
                'options'   => [
                    'none'           => esc_html__( 'None', 'avas-core' ),
                    'date'           => esc_html__( 'Date', 'avas-core' ),
                    'title'          => esc_html__( 'Title', 'avas-core' ),
                    'name'           => esc_html__( 'Name', 'avas-core' ),
                    'modified'       => esc_html__( 'Modified', 'avas-core' ),
                    'rand'           => esc_html__( 'Random', 'avas-core' ),
                ],
                'condition' => [
                    'post_sortby' => ['latestpost'],
                ],
            ]
        );
        $this->end_controls_section();


       $this->start_controls_section(
            'section_title_style',
            [
                'label'     => esc_html__( 'Styles', 'avas-core' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'cat_bg_color1',
            [
                'label'     => esc_html__( 'Category Background color', 'avas-core' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default'   => '#1c1c1c',
                'selectors' => [
                    '{{WRAPPER}} .category-meta-bg a' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'cat_h_bg_color1',
            [
                'label'     => esc_html__( 'Category hover background color', 'avas-core' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default'   => '#ec0000',
                'selectors' => [
                    '{{WRAPPER}} .category-meta-bg a:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

         $this->add_control(
            'cat_color',
            [
                'label'     => esc_html__( 'Category text color', 'avas-core' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .category-meta-bg a' => 'color: {{VALUE}};',
                ],
            ]
        );
         $this->add_control(
            'cat_h_color',
            [
                'label'     => esc_html__( 'Category text hover color', 'avas-core' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .category-meta-bg a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'              => 'cate_typography',
                'label'             => esc_html__( 'Typography', 'avas-core' ),
                'scheme'            => Scheme_Typography::TYPOGRAPHY_4,
                'selector'          => '{{WRAPPER}} .category-meta-bg a',
                
            ]
        );
         $this->add_control(
            'title_color',
            [
                'label'     => esc_html__( 'Title text color', 'avas-core' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default'   => '#1c1c1c',
                'selectors' => [
                    '{{WRAPPER}} .post-content .post-title a' => 'color: {{VALUE}};',
                ],
            ]
        );
         $this->add_control(
            'title_h_color',
            [
                'label'     => esc_html__( 'Title text hover color', 'avas-core' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default'   => '#ec0000',
                'selectors' => [
                    '{{WRAPPER}} .post-content .post-title a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
         $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'              => 'pgv_title_typography',
                'label'             => esc_html__( 'Typography', 'avas-core' ),
                'scheme'            => Scheme_Typography::TYPOGRAPHY_4,
                'selector'          => '{{WRAPPER}} .post-content .post-title a',
                
            ]
        );
         $this->add_control(
            'author_color',
            [
                'label'     => esc_html__( 'Author text color', 'avas-core' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default'   => '#1c1c1c',
                'selectors' => [
                    '{{WRAPPER}} .post-meta .post-author a' => 'color: {{VALUE}};',
                ],
            ]
        );
         $this->add_control(
            'author_h_color',
            [
                'label'     => esc_html__( 'Author text hover color', 'avas-core' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default'   => '#ec0000',
                'selectors' => [
                    '{{WRAPPER}} .post-meta .post-author a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
         $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'              => 'pgv_author_typography',
                'label'             => esc_html__( 'Typography', 'avas-core' ),
                'scheme'            => Scheme_Typography::TYPOGRAPHY_4,
                'selector'          => '{{WRAPPER}} .post-meta .post-author a',
                
            ]
        );
         $this->add_control(
            'date_color',
            [
                'label'     => esc_html__( 'date text color', 'avas-core' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default'   => '#888',
                'selectors' => [
                    '{{WRAPPER}} .post-content .post-meta span' => 'color: {{VALUE}};',
                ],
            ]
        );
          $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'              => 'pgv_date_typography',
                'label'             => esc_html__( 'Typography', 'avas-core' ),
                'scheme'            => Scheme_Typography::TYPOGRAPHY_4,
                'selector'          => '{{WRAPPER}} .post-content .post-meta span',
                
            ]
        );
        $this->end_controls_section();

    }

    protected function render( ) {

        $settings           = $this->get_settings();
        $post_count         = $settings['post_count'];
        $post_offset        = $settings['post_offset'];
        $post_catd          = $settings['post_catd'];
        $post_order         = $settings['post_order'];
        $post_sortby        = $settings['post_sortby'];
        $post_orderby       = $settings['post_orderby'];
        $custom_title_en    = $settings['custom_title_en'];
        $title_text_limit   = $settings['title_text_limit'];
        $into_text_en       = $settings['into_text_en'];
        $intro_text_limit   = $settings['intro_text_limit'];
        $post_data_en       = $settings['post_data_en'];
        $post_cat_en        = $settings['post_cat_en'];
        $post_author_en     = $settings['post_author_en'];

        // post count
        if( $post_count ){
            $post_count = $post_count;
        } else {
            $post_count = 4;
        }
        // post offset
        if( $post_offset ){
            $post_offset = $post_offset;
        } else {
            $post_offset = 0;
        }
        // enable title text
        if( $custom_title_en ){
            $custom_title_en = $custom_title_en;
        } else {
            $custom_title_en = 'no';
        }

        // title text limit
        if( $title_text_limit ){
            $title_text_limit = $title_text_limit;
        } else {
            $title_text_limit = 50;
        }

        // enable intro text
        if( $into_text_en ){
            $into_text_en = $into_text_en;
        } else {
            $into_text_en = 'yes';
        }

        // intro text limit
        if( $intro_text_limit ){
            $intro_text_limit = $intro_text_limit;
        } else {
            $intro_text_limit = 80;
        }

        // enable date
        if( $post_data_en ){
            $post_data_en = $post_data_en;
        } else {
            $post_data_en = 'no';
        }

        // enable category
        if( $post_cat_en ){
            $post_cat_en = $post_cat_en;
        } else {
            $post_cat_en = 'no';
        }

        //post order
        if( $post_order ){
            $post_order = $post_order;
        } else {
            $post_order = 'DESC';
        }

        //post sortby
        if( $post_sortby ){
            $post_sortby = $post_sortby;
        } else {
            $post_sortby = 'latestpost';
        }

        //post orderby
        if( $post_orderby ){
            $post_orderby = $post_orderby;
        } else {
            $post_orderby = 'date';
        }

        //post category
        if( $post_catd ){
            $post_catd = $post_catd;
        } else {
            $post_catd = '0';
        }

        if ( $post_sortby == 'popularposts' ) {
            $arg = array(
                'post_type'   =>  'post',
                'post_status' => 'publish',
                'order' => $post_order,
                'posts_per_page' => $post_count,
                'meta_key' => '_post_views_count',
                'orderby' => 'meta_value_num',
                'category_name' => $post_catd,
                'offset' => $post_offset,
            );
        } elseif ( $post_sortby == 'mostdiscussed' ) {
            $arg = array(
                'post_type'   =>  'post',
                'post_status' => 'publish',
                'order' => $post_order,
                'posts_per_page' => $post_count,
                'orderby' => 'comment_count',
                'category_name' => $post_catd,
                'offset' => $post_offset,
            );
        } else {
            $arg = array(
                'post_type'   =>  'post',
                'post_status' => 'publish',
                'posts_per_page' => $post_count,
                'order' => $post_order,
                'orderby' => $post_orderby,
                'category_name' => $post_catd,
                'offset' => $post_offset,
            );
        }

        $queryd = new \WP_Query( $arg );
    ?>

        <?php if ( $queryd->have_posts() ) : ?>
            <div class="post-block11-element">
                <div class="block-item11">
                    <div class="row">
                        <?php
                        $k = 1;
                        while ($queryd->have_posts()) : $queryd->the_post(); ?>
                         <?php if ( $k == 1 ) { ?>
                            <div class="col-md-6 col-sm-12">
                                <div class="post-block-style clearfix">
                                    <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
                                        <div class="post-thumb">
                                            <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" title="<?php echo esc_attr( get_the_title() ); ?>"><img src="<?php echo wp_get_attachment_image_url(get_post_thumbnail_id(), $settings['image_size'])?>" alt="<?php echo esc_attr( get_the_title() ); ?>"></a>
                                        </div>
                                    <?php } else { ?>
                                        <div class="post-thumb block6img-blank"></div>
                                    <?php } ?>
                                    <?php if($post_cat_en == 'yes') { ?>
                                        <span class="category-meta-bg"><?php echo get_the_category_list(' '); ?></span>
                                    <?php }?>
                                    <div class="post-content">
                                        <?php if( $custom_title_en == 'yes' ){ ?>
                                            <h4 class="post-title"><a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo bddex_title_max_charlengths($title_text_limit); ?></a></h4>
                                        <?php } else { ?>
                                            <h4 class="post-title"><a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo get_the_title(); ?></a></h4>
                                        <?php } ?>
                                        <div class="post-meta">
                                            <?php if( $post_author_en == 'yes') { ?>
                                                <?php if ( get_the_author_meta('first_name') != "" || get_the_author_meta('last_name') != "" ) { ?>
                                                    <span class="post-author"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author_meta('first_name');?> <?php echo get_the_author_meta('last_name');?></a></span>
                                                <?php } else { ?>
                                                    <span class="post-author"><?php the_author_posts_link() ?></span>
                                                <?php }?>
                                            <?php } ?>
                                            <?php if($post_data_en == 'yes') { ?>
                                                <span class="post-date"><?php echo get_the_date(); ?></span>
                                            <?php } ?>
                                        </div>
                                        <p><?php echo bddex_excerpt_max_charlength($intro_text_limit);?></p>
                                    </div><!-- Post content end -->
                                </div><!-- Post Block style end -->
                            </div><!-- Col end -->
                         <?php } else { ?>
                                <?php if ( $k == 2 ) { ?>
                                <div class="col-md-6 col-sm-12">
                                    <div class="row">
                                    <?php } ?>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="block-item11">
                                            <div class="post-block-style clearfix">
                                                <div class="post-thumb">
                                                    <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" title="<?php echo esc_attr( get_the_title() ); ?>"><img src="<?php echo wp_get_attachment_image_url(get_post_thumbnail_id(), $settings['image_size'])?>" alt="<?php echo esc_attr( get_the_title() ); ?>"></a>
                                                </div>
                                                <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
                                                    <?php if($post_cat_en == 'yes') { ?>
                                                        <span class="category-meta-bg"><?php echo get_the_category_list(' '); ?></span>
                                                    <?php }?>
                                                <?php }?>
                                                <div class="post-content">
                                                    <?php if( $custom_title_en == 'yes' ){ ?>
                                                        <h4 class="post-title"><a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo bddex_title_max_charlengths($title_text_limit); ?></a></h4>
                                                    <?php } else { ?>
                                                        <h4 class="post-title"><a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo get_the_title(); ?></a></h4>
                                                    <?php } ?>
                                                    <div class="post-meta">
                                                        <?php if($post_author_en == 'yes') { ?>
                                                            <?php if ( get_the_author_meta('first_name') != "" || get_the_author_meta('last_name') != "" ) { ?>
                                                                <span class="post-author"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author_meta('first_name');?> <?php echo get_the_author_meta('last_name');?></a></span>
                                                            <?php } else { ?>
                                                                <span class="post-author"><?php the_author_posts_link() ?></span>
                                                            <?php }?>
                                                        <?php } ?>
                                                        <?php if($post_data_en == 'yes') { ?>
                                                            <span class="post-date"><?php echo get_the_date(); ?></span>
                                                        <?php } ?>
                                                    </div>
                                                </div><!-- Post content end -->
                                            </div><!-- Post Block style end -->
                                        </div><!-- block-item5 -->
                                        </div><!-- col-md-6 col-sm-6 -->
                                    <?php if ( $k == $post_count ) { ?>
                                    </div><!-- row -->
                                </div><!-- col-md-6 col-sm-6 -->
                                <?php } ?>
                         <?php } ?>
                        <?php  $k++;
                        endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    </div><!-- Row 1 end -->
                </div> <!-- block-item11 -->
            </div> <!--/.post-block1-element-->
        <?php endif; ?>
    <?php }
    protected function _content_template() { }
}

Plugin::instance()->widgets_manager->register_widget_type( new Bddex_Post_Grid_View() );