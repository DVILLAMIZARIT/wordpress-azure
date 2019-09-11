<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Bddex_News_Ticker extends Widget_Base {

	public function get_name() {
		return 'bddex-news-ticker';
	}

	public function get_title() {
		return esc_html__( 'Avas News Ticker', 'avas-core' );
	}

    public function get_icon() {
        return 'eicon-slideshow';
    }

	public function get_categories() {
		return [ 'bddex' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
            'section_news_ticker',
            [
                'label' 	=> esc_html__( 'Settings', 'avas-core' )
            ]
        );
        $this->add_control(
            'news_ticker_label',
            [
                'label' => esc_html__( 'News Ticker Label', 'avas-core' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'separator' => 'before',
                'default' => 'yes',
            ]
        );
        
        $this->add_control(
            'news_ticker_label_text',
            [
                'label' => esc_html__( 'News Ticker Label Text', 'avas-core' ),
                'default' => esc_html__( 'Trending', 'avas-core' ),
                'type' => Controls_Manager::TEXT,
                'condition' => [
                    'news_ticker_label' => 'yes',
                ],
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
        $this->add_control(
            'post_slide1_en_nav',
            [
                'label'         => esc_html__( 'Enable Navigation', 'avas-core' ),
                'type'      => Controls_Manager::SELECT,
                'default'       => 'true',
                'options'   => [
                    'true'      => esc_html__( 'Yes', 'avas-core' ),
                    'false'     => esc_html__( 'No', 'avas-core' ),
                ],
            ]
        );
        $this->add_control(
            'news_ticker_autoplay',
            [
                'label'         => esc_html__( 'Enable Autoplay', 'avas-core' ),
                'type'      => Controls_Manager::SELECT,
                'default'       => 'false',
                'options'   => [
                    'false'     => esc_html__( 'No', 'avas-core' ),
                    '2000'      => esc_html__( 'Delay 2000ms', 'avas-core' ),
                    '3000'      => esc_html__( 'Delay 3000ms', 'avas-core' ),
                    '4000'      => esc_html__( 'Delay 4000ms', 'avas-core' ),
                    '5000'      => esc_html__( 'Delay 5000ms', 'avas-core' ),
                    '6000'      => esc_html__( 'Delay 6000ms', 'avas-core' ),
                    '8000'      => esc_html__( 'Delay 8000ms', 'avas-core' ),
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'news_ticker_style',
            [
                'label'     => esc_html__( 'Style', 'avas-core' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
            'nt_label_bg_color',
            [
                'label'     => esc_html__( 'Label Background Color', 'avas-core' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default'   => '#333',
                'selectors' => [
                    '{{WRAPPER}} .bddex_news_ticker_bar' => 'background: {{VALUE}};',
                ],
                'condition' => [
                'news_ticker_label' => 'yes',
            ],
            ]
        );
      
        $this->add_control(
            'nt_label_txt_color',
            [
                'label'     => esc_html__( 'Label Text Color', 'avas-core' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .bddex_news_ticker_bar' => 'color: {{VALUE}};',
                ],
                'condition' => [
                'news_ticker_label' => 'yes',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'bddex_nt_label_typography',
                'label' => esc_html__( 'Typography', 'avas-core' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .bddex_news_ticker_bar',
                'condition' => [
                'news_ticker_label' => 'yes',
                ],
            ]
        );
        $this->add_responsive_control(
            'bddex_nt_label_width',
            [
                'label'                 => esc_html__( 'Width', 'avas-core' ),
                'type'                  => Controls_Manager::SLIDER,
                'range'                 => [
                    'px'        => [
                        'min'   => 0,
                        'max'   => 500,
                        'step'  => 1,
                    ],
                ],
                'size_units'            => [ 'px', 'em', '%' ],
                'selectors'             => [
                    '{{WRAPPER}} .bddex_news_ticker_bar' => 'width: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'bddex_nt_label_padding',
            [
                'label' => esc_html__( 'Padding', 'avas-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bx_news_ticker_main .bddex_news_ticker_bar' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                'news_ticker_label' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'nt_title_color',
            [
                'label'     => esc_html__( 'Title color', 'avas-core' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default'   => '#333',
                'selectors' => [
                    '{{WRAPPER}} .news-ticker-title a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'nt_title_h_color',
            [
                'label'     => esc_html__( 'Title hover color', 'avas-core' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default'   => '#ccc',
                'selectors' => [
                    '{{WRAPPER}} .news-ticker-title a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'bddex_nt_title_typography',
                'label' => esc_html__( 'Typography', 'avas-core' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .news-ticker-title a',
            ]
        );
        
        $this->add_control(
            'arrow_bg_color',
            [
                'label'     => esc_html__( 'Navigation Border Color', 'avas-core' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default'   => '#dedede',
                'selectors' => [
                    '{{WRAPPER}} .news-ticker-btns a' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'arrow_bg_hover_color',
            [
                'label'     => esc_html__( 'Navigation Border Hover Color', 'avas-core' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default'   => '#333',
                'selectors' => [
                    '{{WRAPPER}} .news-ticker-btns a:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'arrow_color',
            [
                'label'     => esc_html__( 'Navigation Color', 'avas-core' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default'   => '#dedede',
                'selectors' => [
                    '{{WRAPPER}} .news-ticker-btns a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'arrow_hover_color',
            [
                'label'     => esc_html__( 'Navigation Hover Color', 'avas-core' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default'   => '#222',
                'selectors' => [
                    '{{WRAPPER}} .news-ticker-btns a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'nav_bg_color',
            [
                'label'     => esc_html__( 'Navigation Background Color', 'avas-core' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .news-ticker-btns a' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'nav_bg_hover_color',
            [
                'label'     => esc_html__( 'Navigation Background Hover Color', 'avas-core' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .news-ticker-btns a:hover' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'bddex_nt_nav_typography',
                'label' => esc_html__( 'Typography', 'avas-core' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .news-ticker-btns a',
            ]
        );
        $this->add_responsive_control(
            'bddex_nt_nav_width',
            [
                'label'                 => esc_html__( 'Width', 'avas-core' ),
                'type'                  => Controls_Manager::SLIDER,
                'range'                 => [
                    'px'        => [
                        'min'   => 0,
                        'max'   => 150,
                        'step'  => 1,
                    ],
                ],
                'size_units'            => [ 'px', 'em', '%' ],
                'selectors'             => [
                    '{{WRAPPER}} .news-ticker-btns a' => 'width: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'bddex_nt_nav_height',
            [
                'label'                 => esc_html__( 'Height', 'avas-core' ),
                'type'                  => Controls_Manager::SLIDER,
                'range'                 => [
                    'px'        => [
                        'min'   => 0,
                        'max'   => 150,
                        'step'  => 1,
                    ],
                ],
                'size_units'            => [ 'px', 'em', '%' ],
                'selectors'             => [
                    '{{WRAPPER}} .news-ticker-btns a' => 'height: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'bddex_nt_nav_padding',
            [
                'label' => esc_html__( 'Margin', 'avas-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .news-ticker-btns' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                'news_ticker_label' => 'yes',
                ],
            ]
        );
        $this->end_controls_section();
	}

	protected function render( ) {

		$settings 			        = $this->get_settings();
        $post_count 		        = $settings['post_count'];
        $post_offset                = $settings['post_offset'];
		$post_catd 			        = $settings['post_catd'];
        $post_order                 = $settings['post_order'];
        $post_sortby                = $settings['post_sortby'];
		$post_orderby 		        = $settings['post_orderby'];
        $post_slide1_en_nav         = $settings['post_slide1_en_nav'];
        $news_ticker_autoplay       = $settings['news_ticker_autoplay'];
        $custom_title_en            = $settings['custom_title_en'];
        $title_text_limit           = $settings['title_text_limit'];
        $news_ticker_label          = $settings['news_ticker_label'];
        $news_ticker_label_text     = $settings['news_ticker_label_text'];
       

        // navigation
        if ($post_slide1_en_nav) {
            $post_slide1_en_nav     = $settings['post_slide1_en_nav'];
        } else {
            $post_slide1_en_nav = 'true';
        }

        // autoplay
        if ($news_ticker_autoplay) {
            $news_ticker_autoplay     = $settings['news_ticker_autoplay'];
        } else {
            $news_ticker_autoplay = 'false';
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
        }  elseif ( $post_sortby == 'mostdiscussed' ) {
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
<div class="news-ticker-wrap">
    <?php if ($news_ticker_label == 'yes') : ?>
    <div class="bx_news_ticker_main">
        <?php if ( ! empty( $news_ticker_label_text ) ) : ?>
        <div class="bddex_news_ticker_bar">
        <?php echo esc_attr($news_ticker_label_text); ?>
        </div>
        <?php endif; ?><!-- /.bddex_news_ticker_bar -->
    </div><!-- /.bx_news_ticker_main -->
    <?php endif; ?><!-- News Ticker Label End -->


	<?php if ( $queryd->have_posts() ) : ?>
    <div id="news-tickers" class="news-ticker bxtrending carousel slide" data-bxtrending="<?php echo $news_ticker_autoplay; ?>" data-ride="carousel">
        <div class="carousel-inner">
          <?php
          $x = 1;
          while ($queryd->have_posts()) : $queryd->the_post();?>
          <?php if( $x == 1 ){ ?>
            <div class="item active">
              <?php } else { ?>
                <div class="item">
                <?php } ?>
                  <div class="news-ticker-title">
                    <?php if( $custom_title_en == 'yes' ){ ?>
                       <h5 class="post-title title-extra-large"><a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo bddex_title_max_charlengths($title_text_limit); ?></a></h5>
                        <?php } else { ?>
                        <h5 class="post-title title-extra-large"><a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo get_the_title(); ?></a></h5>
                            <?php } ?>
                  </div><!-- /.news-ticker-title -->
                </div><!--/.carousel-item -->
            <?php
              $x++;
              endwhile;
              wp_reset_postdata(); ?>
            </div> <!--/.carousel-item active -->
        </div> <!-- /.carousel-inner -->
    </div>

    <?php if( $post_slide1_en_nav == 'true' ) { ?>
    <div class="news-ticker-btns">
      <a class="tp-control-prev" href="#news-tickers" role="button" data-slide="prev">
      <i class="fa fa-angle-left"></i>
      </a>
      <a class="tp-control-next" href="#news-tickers" role="button" data-slide="next">
      <i class="fa fa-angle-right"></i>
      </a>
    </div><!-- /.news-ticker-btns -->
    <?php } ?>

    
    
	<?php endif; ?>
    
	<?php }

	protected function _content_template() { }
}

Plugin::instance()->widgets_manager->register_widget_type( new Bddex_News_Ticker() );