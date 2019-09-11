<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class bddex_Widget_tm_carousel extends Widget_Base {
    public function get_name() {
        return 'avas-taem-member-carousel';
    }

    public function get_title() {
        return esc_html__( 'Avas Team Members Carousel', 'avas-core' );
    }
    public function get_icon() {
        return 'fa fa-users';
    }
    public function get_categories() {
        return [ 'bddex' ];
    }
    protected function _register_controls() {
        $this->start_controls_section(
            'team_carousel_settings',
            [
                'label' => esc_html__( 'Go to WP Dashboard > Team', 'avas-core' )
            ]
        );
        $this->add_control(
          'tc_post_count',
          [
            'label'         => esc_html__( 'Post count', 'avas-core' ),
            'type'          => Controls_Manager::NUMBER,
            'label_block'   => true,
            'default'       => esc_html__( '6', 'avas-core' ),

          ]
        );
        $this->add_control(
            'tc_profile_switch',
            [
                'label' => esc_html__( 'Profile Hover Text?', 'avas-core' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'true',
                'default' => 'true',
            ]
        );
        $this->add_control(
            'tc_view_profile',
            [
                'label' => esc_html__( 'Text', 'avas-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'View Profile', 'avas-core' ),
                'condition' => [
                    'tc_profile_switch' => 'true',
                ],
            ]
            
        );
        $this->add_control(
            'tc_social_icon',
            [
                'label' => esc_html__( 'Social Icon?', 'avas-core' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'true',
                'default' => 'true',
            ]
        );
        $this->add_control(
            'tc_infinite',
            [
                'label' => esc_html__( 'Infinite Loop?', 'avas-core' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'true',
                'default' => 'true',
            ]
        );
        $this->add_control(
            'tc_autoplay',
            [
                'label' => esc_html__( 'Auto Play?', 'avas-core' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'true',
                'default' => 'true',
            ]
        );
        $this->add_control(
          'tc_max_item',
          [
             'label'   => esc_html__( 'Max Visible Item', 'avas-core' ),
             'type'    => Controls_Manager::NUMBER,
             'default' => 3,
             'min'     => 1,
             'max'     => 8,
             'step'    => 1,
          ]
        );
        $this->end_controls_section(); 

        $this->start_controls_section(
            'testimonial_dual_style',
            [
                'label'                 => esc_html__( 'Style', 'avas-core' ),
                'tab'                   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'bg_color',
            [
                'label'                 => esc_html__( 'Background Color', 'avas-core' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '#8CC63F',              
                'selectors'             => [
                    '{{WRAPPER}} .engineers .eng-head' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'bg_hover_color',
            [
                'label'                 => esc_html__( 'Background Hover Color', 'avas-core' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '#00CDED',              
                'selectors'             => [
                    '{{WRAPPER}} .engineers figcaption' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'image_border_width',
            [
                'label' => esc_html__( 'Image Border Width', 'avas-core' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 5,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .engineers img' => 'border-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'image_border_color',
            [
                'label'                 => esc_html__( 'Image Border Color', 'avas-core' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '#fff',              
                'selectors'             => [
                    '{{WRAPPER}} .engineers img' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'button_bg_color',
            [
                'label'                 => esc_html__( 'Button Background Color', 'avas-core' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '#0d162d',              
                'selectors'             => [
                    '{{WRAPPER}} .engineers .hire_me' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'button_bg_hover_color',
            [
                'label'                 => esc_html__( 'Button Background Hover Color', 'avas-core' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '#00CDED',              
                'selectors'             => [
                    '{{WRAPPER}} .engineers .hire_me:hover' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'button_color',
            [
                'label'                 => esc_html__( 'Button Color', 'avas-core' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '#fff',              
                'selectors'             => [
                    '{{WRAPPER}} .engineers .hire_me' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'button_hover_color',
            [
                'label'                 => esc_html__( 'Button Hover Color', 'avas-core' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '#fff',              
                'selectors'             => [
                    '{{WRAPPER}} .engineers .hire_me:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'name_color',
            [
                'label'                 => esc_html__( 'Name Color', 'avas-core' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '#fff',              
                'selectors'             => [
                    '{{WRAPPER}} .engineers .eng-head h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'position_color',
            [
                'label'                 => esc_html__( 'Position Color', 'avas-core' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '#444',              
                'selectors'             => [
                    '{{WRAPPER}} .engineers .eng-head p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'social_icon_color',
            [
                'label'                 => esc_html__( 'Social Icon Color', 'avas-core' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '#fff',              
                'selectors'             => [
                    '{{WRAPPER}} .engineers .eng-social i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'social_icon_border_color',
            [
                'label'                 => esc_html__( 'Social Icon Border Color', 'avas-core' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '#fff',              
                'selectors'             => [
                    '{{WRAPPER}} .eng-social li' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'social_icon_hover_color',
            [
                'label'                 => esc_html__( 'Social Icon Hover Color', 'avas-core' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '#111',              
                'selectors'             => [
                    '{{WRAPPER}} .engineers .eng-social i:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'social_icon_border_hover_color',
            [
                'label'                 => esc_html__( 'Social Icon Border Hover Color', 'avas-core' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '#111',              
                'selectors'             => [
                    '{{WRAPPER}} .eng-social li:hover,.engineers .eng-social i:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'nav_color',
            [
                'label'                 => esc_html__( 'Navigation Color', 'avas-core' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '#233C75',              
                'selectors'             => [
                    '{{WRAPPER}} .cleaners .owl-prev,.cleaners .owl-next' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'nav_hover_color',
            [
                'label'                 => esc_html__( 'Navigation Hover Color', 'avas-core' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '#00CDED',              
                'selectors'             => [
                    '{{WRAPPER}} .cleaners .owl-prev:hover, .cleaners .owl-next:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section(); 
    }
    protected function render( ) {
        $settings = $this->get_settings();
        $post_count = $settings['tc_post_count'];
        $tc_view_profile = $settings['tc_view_profile'];

         if( $post_count ){
            $post_count = $post_count;
        } else {
            $post_count = 6;
        }
    $auto_play        = ( ($settings['tc_autoplay']     == 'true') ? "true" : "false" );
    $infinite         = ( ($settings['tc_infinite']     == 'true') ? "true" : "false" );
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    $arg = array(
      'post_type' => 'team',
      'post_status' => 'publish',
      'posts_per_page' => $post_count
    );

  $query = new \WP_Query( $arg );


if ( $query->have_posts() ) : ?>

   <div class="engineers cleaners owl-carousel">
        
<?php while ( $query->have_posts() ) : $query->the_post(); ?>

                <figure>
                    <a href="<?php the_permalink(); ?>" rel="bookmark">
                    <?php the_post_thumbnail('bddex-team-full'); ?>      
                    </a>
                    <div class="eng-head">
                        <h4><?php the_title(); ?></h4>
                        <?php global $post; $cleaner_cat = get_the_term_list( $post->ID,'team-category', '', '<br> ', '');
                        if (!empty($cleaner_cat)) echo '<p>', strip_tags($cleaner_cat) ,'</p>'; ?>  
                    </div>  
                    <figcaption>
                            <?php
                            global $post;
                            $team_fb = get_post_meta( $post->ID, 'team_fb', true );
                            $team_tw = get_post_meta( $post->ID, 'team_tw', true );
                            $team_gp = get_post_meta( $post->ID, 'team_gp', true );
                            $team_ln = get_post_meta( $post->ID, 'team_ln', true );
                            $team_in = get_post_meta( $post->ID, 'team_in', true );
                            ?>
                    <?php if($settings['tc_profile_switch']) : ?>
                        <a href="<?php the_permalink(); ?>" rel="bookmark" class="hire_me" ><?php esc_html_e( $tc_view_profile, 'avas-core' ); ?></a>
                    <?php endif; ?>
                        <div class="clearfix"></div>
                    <?php if($settings['tc_social_icon']) : ?>   
                        <ul class="eng-social">
                            <?php if (!empty($team_fb)) : ?>
                            <li><a href="<?php echo esc_url($team_fb); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <?php endif; ?>
                            <?php if (!empty($team_tw)) : ?>
                            <li><a href="<?php echo esc_url($team_tw); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <?php endif; ?>
                            <?php if (!empty($team_gp)) : ?>
                            <li><a href="<?php echo esc_url($team_gp); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                            <?php endif; ?>
                            <?php if (!empty($team_ln)) : ?>
                            <li><a href="<?php echo esc_url($team_ln); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            <?php endif; ?>
                            <?php if (!empty($team_in)) : ?>
                            <li><a href="<?php echo esc_url($team_in); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            <?php endif; ?>
                        </ul>
                    <?php endif; ?>    
                    </figcaption>
                </figure>

    <?php endwhile; ?>
    </div> <!-- end loop -->
    <script>
         jQuery(document).ready(function($) {
         var $tc = $('.cleaners')
    if ($tc.length) {
        $tc.owlCarousel({
            loop:<?php echo $infinite;?>,
            margin:30,
            rtl:false,
            nav:true,
            smartSpeed: 500,
            autoplay: <?php echo $auto_play;?>,
            navText: [ '<i class="fa fa-long-arrow-left"></i>', '<i class="fa fa-long-arrow-right"></i>' ],
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1024:{
                    items:<?php echo $settings['tc_max_item'];?>
                },
            }
        });         
    }
});
    </script>
    <?php wp_reset_postdata(); ?>
    <?php else:  ?>
    <?php echo esc_html__( 'Nothing found, please make sure Team post item added already', 'avas-core' ); ?>
    <?php endif;  
    }


protected function content_template() {}
}

Plugin::instance()->widgets_manager->register_widget_type( new bddex_Widget_tm_carousel() );