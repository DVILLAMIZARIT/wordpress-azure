<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Bddex_Post_Grid_Video extends Widget_Base {

	public function get_name() {
		return 'bddex-post-grid-video';
	}

	public function get_title() {
		return esc_html__( 'Avas Video Post Grid', 'avas-core' );
	}

	public function get_icon() {
		return 'eicon-form-vertical';
	}

	public function get_categories() {
		return [ 'bddex' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
            'bddex_video_post_grid',
            [
                'label' 	=> esc_html__( 'Settings', 'avas-core' )
            ]
        );
		$this->add_control(
		  'post_count',
		  [
		    'label'         => esc_html__( 'Post count', 'avas-core' ),
            'type'          => Controls_Manager::NUMBER,
            'label_block'   => true,
            'default'       => esc_html__( '4', 'avas-core' ),

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
            'count_col',
            [
                'label'     => esc_html__( 'Select Column', 'avas-core' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 3,
                'options'   => [
                        '12'    => esc_html__( '1 Column', 'avas-core' ),
                        '6'     => esc_html__( '2 Column', 'avas-core' ),
                        '4'     => esc_html__( '3 Column', 'avas-core' ),
                        '3'     => esc_html__( '4 Column', 'avas-core' ),
                    ],
            ]
        );
        $this->add_control(
            'custom_title_en',
            [
                'label'         => esc_html__( 'Enable custom title limit', 'avas-core' ),
                'type'          => Controls_Manager::SWITCHER,
                'default'       => 'yes',
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
            'default'       => 70,
            'condition' => [
                'custom_title_en' => 'yes',
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
            'post_sortby',
            [
                'label'     => esc_html__( 'Post sort by', 'avas-core' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'latestpost',
                'options'   => [
                        'latestpost'      => esc_html__( 'Latest posts', 'avas-core' ),
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
                'label'     => esc_html__( 'Category', 'avas-core' ),
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
             'name' => 'v_g_cat_t',
                'selector' => '{{WRAPPER}} .category-meta-bg a',
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
             'name' => 'v_g_t',
                'selector' => '{{WRAPPER}} .post-content .post-title a',
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
             'name' => 'v_g_a',
                'selector' => '{{WRAPPER}} .post-meta .post-author a',
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
             'name' => 'v_g_d',
                'selector' => '{{WRAPPER}} .post-content .post-meta span',
            ]
        );
        $this->end_controls_section();

	}

	protected function render( ) {

		$settings 			        = $this->get_settings();
		$post_count 		        = $settings['post_count'];
		$post_catd 			        = $settings['post_catd'];
        $post_order                 = $settings['post_order'];
        $post_sortby                = $settings['post_sortby'];
		$post_orderby 		        = $settings['post_orderby'];
        $custom_title_en    = $settings['custom_title_en'];
        $title_text_limit   = $settings['title_text_limit'];
        $post_data_en       = $settings['post_data_en'];
        $post_cat_en       = $settings['post_cat_en'];
        $post_author_en       = $settings['post_author_en'];
        $count_col       = $settings['count_col'];

        // post count
        if( $post_count ){
            $post_count = $post_count;
        } else {
            $post_count = 10;
        }

        // column count
        if( $count_col ){
            $count_col = $count_col;
        } else {
            $count_col = 3;
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

        if ( $post_sortby == 'mostdiscussed' ) {
            $arg = array(
                'post_type'   =>  'post',
                'post_status' => 'publish',
                'order' => $post_order,
                'posts_per_page' => $post_count,
                'meta_query' => array(
                    array(
                      //  'key'     => 'thwmain_postvideo',
                        'value'   => '1',
                        'compare' => 'NOT LIKE',
                    ),
                ),
                'orderby' => 'comment_count',
                'category_name' => $post_catd,
            );
        } else {
            $arg = array(
                'post_type'   =>  'post',
                'post_status' => 'publish',
                'meta_query' => array(
                    array(
                      //  'key'     => 'thwmain_postvideo',
                        'value'   => '1',
                        'compare' => 'NOT LIKE',
                    ),
                ),
                'posts_per_page' => $post_count,
                'order' => $post_order,
                'orderby' => $post_orderby,
                'category_name' => $post_catd,
            );
        }

		$queryd = new \WP_Query( $arg );
	?>

		<?php if ( $queryd->have_posts() ) : ?>
            <div class="post-block14-warp">
                <div class="post-block14-element pb-common-nav-wrap">
                <?php
                   $i = 1;
                    while ($queryd->have_posts()) : $queryd->the_post();?>
                        <?php if ( $i == 1 ) { ?>
                            <div class="row">
                        <?php } ?>
                            <div class="col-sm-6 col-md-<?php echo $count_col; ?>">
                                <div class="block-item5">
                                    <div class="post-block-style clearfix">
                                        <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
                                            <div class="post-thumb ">
                                                <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" title="<?php echo esc_attr( get_the_title() ); ?>"><img src="<?php echo wp_get_attachment_image_url(get_post_thumbnail_id(), $settings['image_size'])?>" alt="<?php echo esc_attr( get_the_title() ); ?>"></a>
                                                <a href="<?php echo esc_url( get_permalink()); ?>">
                                                  <div class="video-icon">
                                                    <i class="fa fa-play"></i>
                                                </div>
                                                </a>
                                            </div>
                                            <?php if($post_cat_en == 'yes') { ?>
                                                <span class="category-meta-bg"><?php echo get_the_category_list(' '); ?></span>
                                            <?php }?>
                                        <?php } ?>
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
                            </div><!-- col -->
                        <?php if ( $i == $post_count ) { ?>
                            </div> <!--/.row-->
                        <?php } ?>
                    <?php
                    $i ++;
                    endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </div><!--/.post-block14-element-->
            </div><!--/.post-block14-warp-->
	    <?php endif; ?>
	<?php }
	protected function _content_template() { }
}

Plugin::instance()->widgets_manager->register_widget_type( new Bddex_Post_Grid_Video() );