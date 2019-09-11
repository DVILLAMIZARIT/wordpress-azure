<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class bddex_Widget_post_block5 extends Widget_Base {

	public function get_name() {
		return 'avas-post-block5';
	}

	public function get_title() {
		return __( 'Avas Post grid slide', 'avas-core' );
	}

	public function get_icon() {
		return 'eicon-posts-carousel';
	}

	public function get_categories() {
		return [ 'bddex' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
            'thwsmart_post_block5',
            [
                'label' 	=> __( 'Avas Post grid slide', 'avas-core' )
            ]
        );
		$this->add_control(
		  'post_count',
		  [
		    'label'         => __( 'Post count', 'avas-core' ),
            'type'          => Controls_Manager::NUMBER,
            'label_block'   => true,
            'default'       => __( '12', 'avas-core' ),

		  ]
        );
        $this->add_control(
            'post_offset',
            [
              'label'         => __( 'Post Offset', 'avas-core' ),
              'type'          => Controls_Manager::NUMBER,
              'label_block'   => true,
              'default'       => __( '0', 'avas-core' ),
  
            ]
        );
        $this->add_control(
          'post_catd',
          [
             'label'    => __( 'Select category', 'avas-core' ),
             'type'     => Controls_Manager::SELECT,
             'options'  => bddex_category_list( 'category' ),
             'multiple' => false,
             'default'  => '0'
          ]
        );
        $this->add_control(
            'custom_title_en',
            [
                'label'         => __( 'Enable custom title limit', 'avas-core' ),
                'type'          => Controls_Manager::SWITCHER,
                'default'       => 'yes',
                'label_on'      => __( 'Yes', 'avas-core' ),
                'label_off'     => __( 'No', 'avas-core' ),
            ]
        );
        $this->add_control(
          'title_text_limit',
          [
            'label'         => __( 'Add title text limit', 'avas-core' ),
            'type'          => Controls_Manager::NUMBER,
            'label_block'   => true,
            'default'       => 70,
            'condition' => [
                'custom_title_en' => 'yes',
            ],
          ]
        );
        $this->add_control(
            'post_data_en',
            [
                'label'         => __( 'Enable Date', 'avas-core' ),
                'type'          => Controls_Manager::SWITCHER,
                'default'       => 'yes',
                'label_on'      => __( 'Yes', 'avas-core' ),
                'label_off'     => __( 'No', 'avas-core' ),
            ]
        );
        $this->add_control(
            'post_author_en',
            [
                'label'         => __( 'Enable Author', 'avas-core' ),
                'type'          => Controls_Manager::SWITCHER,
                'default'       => 'yes',
                'label_on'      => __( 'Yes', 'avas-core' ),
                'label_off'     => __( 'No', 'avas-core' ),
            ]
        );
        $this->add_control(
            'post_cat_en',
            [
                'label'         => __( 'Enable Category', 'avas-core' ),
                'type'          => Controls_Manager::SWITCHER,
                'default'       => 'yes',
                'label_on'      => __( 'Yes', 'avas-core' ),
                'label_off'     => __( 'No', 'avas-core' ),
            ]
        );
        $this->add_control(
            'post_sortby',
            [
                'label'     => __( 'Post sort by', 'avas-core' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'latestpost',
                'options'   => [
                        'latestpost'      => __( 'Latest posts', 'avas-core' ),
                        'popularposts'    => __( 'Popular posts', 'avas-core' ),
                        'mostdiscussed'    => __( 'Most discussed', 'avas-core' ),
                    ],
            ]
        );
        $this->add_control(
            'post_order',
            [
                'label'     => __( 'Post order', 'avas-core' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'DESC',
                'options'   => [
                        'DESC'      => __( 'Descending', 'avas-core' ),
                        'ASC'       => __( 'Ascending', 'avas-core' ),
                    ],
            ]
        );
        $this->add_control(
            'post_orderby',
            [
                'label'     => __( 'Post order by', 'avas-core' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'date',
                'options'   => [
                    'none'           => __( 'None', 'avas-core' ),
                    'date'           => __( 'Date', 'avas-core' ),
                    'title'          => __( 'Title', 'avas-core' ),
                    'name'           => __( 'Name', 'avas-core' ),
                    'modified'       => __( 'Modified', 'avas-core' ),
                    'rand'           => __( 'Random', 'avas-core' ),
                ],
                'condition' => [
                    'post_sortby' => ['latestpost'],
                ],
            ]
        );
        $this->add_control(
            'post_block5_en_nav',
            [
                'label'         => __( 'Enable Navigation', 'avas-core' ),
                'type'      => Controls_Manager::SELECT,
                'default'       => 'true',
                'options'   => [
                    'true'      => __( 'True', 'avas-core' ),
                    'false'     => __( 'False', 'avas-core' ),
                ],
            ]
        );
        $this->add_control(
            'post_block5_en_autoplay',
            [
                'label'         => __( 'Enable Autoplay', 'avas-core' ),
                'type'      => Controls_Manager::SELECT,
                'default'       => 'false',
                'options'   => [
                    'true'      => __( 'True', 'avas-core' ),
                    'false'     => __( 'False', 'avas-core' ),
                ],
            ]
        );

        $this->end_controls_section();

       $this->start_controls_section(
            'section_title_style',
            [
                'label'     => __( 'Category', 'avas-core' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'cat_arrow_bg_color',
            [
                'label'     => __( 'Arrow background color', 'avas-core' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default'   => '#1c1c1c',
                'selectors' => [
                    '{{WRAPPER}} .category-meta-bg a:before' => 'border-top-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'cat_arrow_h_bg_color',
            [
                'label'     => __( 'Arrow hover background color', 'avas-core' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default'   => '#ec0000',
                'selectors' => [
                    '{{WRAPPER}} .category-meta-bg a:hover:before' => 'border-top-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'cat_bg_color1',
            [
                'label'     => __( 'Category Background color', 'avas-core' ),
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
                'label'     => __( 'Category hover background color', 'avas-core' ),
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
                'label'     => __( 'Category text color', 'avas-core' ),
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
                'label'     => __( 'Category text hover color', 'avas-core' ),
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
         $this->add_control(
            'title_color',
            [
                'label'     => __( 'title text color', 'avas-core' ),
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
                'label'     => __( 'title text hover color', 'avas-core' ),
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
         $this->add_control(
            'author_color',
            [
                'label'     => __( 'Author text color', 'avas-core' ),
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
                'label'     => __( 'Author text hover color', 'avas-core' ),
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
         $this->add_control(
            'date_color',
            [
                'label'     => __( 'date text color', 'avas-core' ),
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
        $this->end_controls_section();
	}

	protected function render( ) {

		$settings 			        = $this->get_settings();
        $post_count 		        = $settings['post_count'];
        $post_offset        = $settings['post_offset'];
		$post_catd 			        = $settings['post_catd'];
        $post_order                 = $settings['post_order'];
        $post_sortby                = $settings['post_sortby'];
		$post_orderby 		        = $settings['post_orderby'];
        $post_block5_en_nav         = $settings['post_block5_en_nav'];
        $post_block5_en_autoplay    = $settings['post_block5_en_autoplay'];
        $custom_title_en    = $settings['custom_title_en'];
        $title_text_limit   = $settings['title_text_limit'];
        $post_data_en       = $settings['post_data_en'];
        $post_cat_en       = $settings['post_cat_en'];
        $post_author_en       = $settings['post_author_en'];

        // navigation
        if ($post_block5_en_nav) {
            $post_block5_en_nav     = $settings['post_block5_en_nav'];
        } else {
            $post_block5_en_nav = 'true';
        }

        // autoplay
        if ($post_block5_en_autoplay) {
            $post_block5_en_autoplay     = $settings['post_block5_en_autoplay'];
        } else {
            $post_block5_en_autoplay = 'false';
        }

        // post count
        if( $post_count ){
            $post_count = $post_count;
        } else {
            $post_count = 10;
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
            $custom_title_en = 'yes';
        }

        // title text limit
        if( $title_text_limit ){
            $title_text_limit = $title_text_limit;
        } else {
            $title_text_limit = 50;
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

        // enable author
        if( $post_author_en ){
            $post_author_en = $post_author_en;
        } else {
            $post_author_en = 'no';
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
            <div class="post-block5-warp">
                <div class="post-block5-element pb-common-nav-wrap" data-pb5_nav="<?php echo $post_block5_en_nav; ?>" data-pb5_en_ap="<?php echo $post_block5_en_autoplay; ?>">
                <?php
                    while ($queryd->have_posts()) : $queryd->the_post();?>

                            <div class="block-item5">
                                <div class="post-block-style clearfix">
                                    <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
                                        <div class="post-thumb">
                                            <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" title="<?php echo esc_attr( get_the_title() ); ?>"><?php the_post_thumbnail('bddex-small-size'); ?></a>
                                        </div>
                                        <?php if($post_cat_en == 'yes') { ?>
                                            <span class="category-meta-bg"><?php echo get_the_category_list(' '); ?></span>
                                        <?php }?>
                                    <?php } ?>
                                    <div class="post-content">
                                        <?php if( $custom_title_en == 'yes' ){ ?>
                                            <h4 class="post-title title-medium"><a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo bddex_title_max_charlength($title_text_limit); ?></a></h4>
                                        <?php } else { ?>
                                            <h4 class="post-title title-medium"><a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo get_the_title(); ?></a></h4>
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

                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </div><!--/.post-block5-element-->
            </div><!--/.post-block5-warp-->
	    <?php endif; ?>
	<?php }
	protected function _content_template() { }
}

Plugin::instance()->widgets_manager->register_widget_type( new bddex_Widget_post_block5() );