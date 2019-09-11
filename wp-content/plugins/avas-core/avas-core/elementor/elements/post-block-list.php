<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class bddex_Widget_post_block1 extends Widget_Base {

	public function get_name() {
		return 'avas-post-block1';
	}

	public function get_title() {
		return esc_html__( 'Avas Post Block List', 'avas-core' );
	}

	public function get_icon() {
		return 'eicon-post-list';
	}

	public function get_categories() {
		return [ 'bddex' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
            'thwsmart_post_block1',
            [
                'label' 	=> esc_html__( 'Post block list Info', 'avas-core' )
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
        $this->add_control(
          'post_catd',
          [
             'label'    => esc_html__( 'Select category', 'avas-core' ),
             'type'     => Controls_Manager::SELECT,
             'options'  => bddex_category_list( 'category' ),
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
            'post_title_colors',
            [
                'label'     => esc_html__( 'Title color', 'avas-core' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} h4.post-title a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'posts_titles_color_hover',
            [
                'label'     => esc_html__( 'Title hover color', 'avas-core' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} h4.post-title a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'posts_title_typography',
                'label' => esc_html__( 'Typography', 'avas-core' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} h4.post-title a',
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
                'name' => 'cat_text_typography',
                'label' => esc_html__( 'Typography', 'avas-core' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
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
                    '{{WRAPPER}} .recent-posts-widget .post-info .post-title a' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .recent-posts-widget .post-info .post-title a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
         $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_small_text_typography',
                'label' => esc_html__( 'Typography', 'avas-core' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .recent-posts-widget .post-info .post-title a',
            ]
        );
         $this->add_control(
            'date_color',
            [
                'label'     => esc_html__( 'Date text color', 'avas-core' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default'   => '#888',
                'selectors' => [
                    '{{WRAPPER}} .recent-posts-widget .post-meta time' => 'color: {{VALUE}};',
                ],
            ]
        );
         $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'date_text_typography',
                'label' => esc_html__( 'Typography', 'avas-core' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .recent-posts-widget .post-meta time',
            ]
        );
        $this->end_controls_section();
	}

	protected function render( ) {

		$settings 			= $this->get_settings();
        $post_count 		= $settings['post_count'];
        $post_offset                 = $settings['post_offset'];
		$post_catd 			= $settings['post_catd'];
        $post_order         = $settings['post_order'];
        $post_sortby        = $settings['post_sortby'];
		$post_orderby 		= $settings['post_orderby'];
        $custom_title_en    = $settings['custom_title_en'];
        $title_text_limit   = $settings['title_text_limit'];
        $post_data_en       = $settings['post_data_en'];
        $post_cat_en       = $settings['post_cat_en'];

        // post count
        if( $post_count ){
            $post_count = $post_count;
        } else {
            $post_count = 5;
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
            $post_order = 5;
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
            <div class="recent-posts-widget post-block1-element">
                <ul class="list-unstyled clearfix">
                    <?php
                    $i = 1;
                    while ($queryd->have_posts()) : $queryd->the_post();
                    if ( $i == 1 ) { ?>
                        <li>
                        <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
                                <div class="posts-thumb-full">
                                    <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" title="<?php echo esc_attr( get_the_title() ); ?>"><?php the_post_thumbnail('bddex-xmedium-size'); ?></a>
                                    <div class="post-info-full">
                                        <?php if($post_cat_en == 'yes') { ?>
                                            <span class="category-meta-bg"><?php echo get_the_category_list(' '); ?></span>
                                        <?php }?>
                                        <?php if( $custom_title_en == 'yes' ){ ?>
                                            <h4 class="post-title"><a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo bddex_title_max_charlength($title_text_limit); ?></a></h4>
                                        <?php } else { ?>
                                            <h4 class="post-title"><a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo get_the_title(); ?></a></h4>
                                        <?php } ?>
                                        <?php if($post_data_en == 'yes') { ?>
                                            <p class="post-meta"><time class="post-date" datetime="<?php echo esc_attr( get_the_time( 'c' ) ); ?>"><?php echo get_the_date(); ?></time></p>
                                        <?php }?>
                                    </div>
                                </div>
                            <?php } else{?>
                                <div class="post-info-full">
                                    <?php if( $custom_title_en == 'yes' ){ ?>
                                        <h4 class="post-title"><a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo bddex_title_max_charlength($title_text_limit); ?></a></h4>
                                    <?php } else { ?>
                                        <h4 class="post-title"><a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo get_the_title(); ?></a></h4>
                                    <?php } ?>
                                    <?php if($post_data_en == 'yes') { ?>
                                        <p class="post-meta"><time class="post-date" datetime="<?php echo esc_attr( get_the_time( 'c' ) ); ?>"><?php echo get_the_date(); ?></time></p>
                                    <?php }?>
                                </div>
                            <?php } ?>
                            <div class="clearfix"></div>
                        </li>
                    <?php } else { ?>
                        <li class="media">
                            <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
                                <div class="posts-thumb d-flex mr-3">
                                    <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" title="<?php echo esc_attr( get_the_title() ); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                                    <?php if($post_cat_en == 'yes') { ?>
                                    <span class="category-meta-bg"><?php echo get_the_category_list(' '); ?></span>
                                    <?php } ?>
                                </div>
                                <div class="post-info media-body">
                                    <?php if( $custom_title_en == 'yes' ){ ?>
                                        <h4 class="post-title title-small mt-0 mb-1"><a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo bddex_title_max_charlength($title_text_limit); ?></a></h4>
                                    <?php } else { ?>
                                        <h4 class="post-title title-small mt-0 mb-1"><a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo get_the_title(); ?></a></h4>
                                    <?php } ?>
                                    <?php if($post_data_en == 'yes') { ?>
                                        <p class="post-meta"><time class="post-date" datetime="<?php echo esc_attr( get_the_time( 'c' ) ); ?>"><?php echo get_the_date(); ?></time></p>
                                    <?php }?>
                                </div>
                            <?php } else{?>
                                <div class="post-info media-body">
                                    <?php if( $custom_title_en == 'yes' ){ ?>
                                        <h4 class="post-title title-small mt-0 mb-1"><a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo bddex_title_max_charlength($title_text_limit); ?></a></h4>
                                    <?php } else { ?>
                                        <h4 class="post-title title-small mt-0 mb-1"><a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo get_the_title(); ?></a></h4>
                                    <?php } ?>
                                    <?php if($post_data_en == 'yes') { ?>
                                        <p class="post-meta"><time class="post-date" datetime="<?php echo esc_attr( get_the_time( 'c' ) ); ?>"><?php echo get_the_date(); ?></time></p>
                                    <?php }?>
                                </div>
                            <?php } ?>
                            <div class="clearfix"></div>
                        </li>

                    <?php }

                    $i ++;
                    endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </ul>
            </div>
	    <?php endif; ?>
	<?php }
	protected function _content_template() { }
}

Plugin::instance()->widgets_manager->register_widget_type( new bddex_Widget_post_block1() );