<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class bddex_Widget_team extends Widget_Base {

    public function get_name() {
        return 'avas-team';
    }

    public function get_title() {
        return esc_html__( 'Avas Team Members 3', 'avas-core' );
    }

    public function get_icon() {
        return 'fa fa-user-secret';
    }

    public function get_categories() {
        return [ 'bddex' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'shop',
            [
                'label' => esc_html__( 'To add team member go to WordPress Dashboard > Team.', 'avas-core' )
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

        $this->add_control(
          'team_cols',
          [
            'label'         => esc_html__( 'Layout', 'avas-core' ),
            'type'          => Controls_Manager::SELECT,
            'label_block'   => false,
            'default'       => '3',
                'options'       => [
                    '3'         => esc_html__( 'Boxed', 'avas-core' ),
                    '15'        => esc_html__( 'Wide', 'avas-core' )
                    
                ],

          ]
        );
        $this->add_control(
            'team_member_3_enable_name',
            [
                'label' => esc_html__( 'Display Name?', 'avas-core' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'team_member_3_enable_position',
            [
                'label' => esc_html__( 'Display Position?', 'avas-core' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'team_member_3_enable_bio',
            [
                'label' => esc_html__( 'Display BIO?', 'avas-core' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'team_member_3_enable_social_profiles',
            [
                'label' => esc_html__( 'Display Social Profiles?', 'avas-core' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'team_members_3_styles',
            [
                'label' => esc_html__( 'To change color please go to Theme Options > Colors > Team', 'avas-core' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        $this->end_controls_section();

    }

    protected function render( ) {
        
        $settings = $this->get_settings();
        $post_count = $settings['post_count'];
        $team_cols = $settings['team_cols'];
       

 // post count
        if( $post_count ){
            $post_count = $post_count;
        } else {
            $post_count = 4;
        }

        if( $team_cols ){
            $team_cols = $team_cols;
        } else {
            $team_cols = 3;
        }

        

        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
        $arg = array(
        'post_type' => 'team',
        'post_status' => 'publish',
        'orderby' => 'date',
        'posts_per_page' => $post_count

    );

  $query = new \WP_Query( $arg );


if ( $query->have_posts() ) : ?>

  <div class="team">
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="col-lg-<?php echo $team_cols; ?> col-xs-12 col-sm-6">
                <div class="row">
                <figure>
                    <a href="<?php the_permalink(); ?>" rel="bookmark">
                    <?php the_post_thumbnail('bddex-team-full'); ?>      
                    </a>
                    
                    <figcaption>
                         <?php if ( ! empty( $settings['team_member_3_enable_name'] ) ): ?>
                        <h4><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
                        <?php endif; ?>
                        <?php if ( ! empty( $settings['team_member_3_enable_position'] ) ): ?>
                        <?php global $post; $team_cat = get_the_term_list( $post->ID,'team-category', '', '<br> ', '');
                        if (!empty($team_cat)) echo '<p class="team-cat">', strip_tags($team_cat) ,'</p>'; ?>
                        <?php endif; ?>
                        <?php if ( ! empty( $settings['team_member_3_enable_bio'] ) ): ?>
                        <div class="team-bio"><?php echo bddex_excerpt(20); ?></div>
                        <?php endif; ?>
                        <?php if ( ! empty( $settings['team_member_3_enable_social_profiles'] ) ): ?>
                        <ul class="team-social">
                            <?php
                            $team_fb = get_post_meta( $post->ID, 'team_fb', true );
                            $team_tw = get_post_meta( $post->ID, 'team_tw', true );
                            $team_gp = get_post_meta( $post->ID, 'team_gp', true );
                            $team_ln = get_post_meta( $post->ID, 'team_ln', true );
                            $team_in = get_post_meta( $post->ID, 'team_in', true );
                            ?>
                            <li><a href="<?php echo esc_url($team_fb); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="<?php echo esc_url($team_tw); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="<?php echo esc_url($team_gp); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="<?php echo esc_url($team_ln); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="<?php echo esc_url($team_in); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                        <?php endif; ?>
                    </figcaption>
                    </a>
                </figure>
                </div><!-- end row -->
            </div>              
        <?php endwhile; ?>
        </div>  <!-- end loop -->

    <?php wp_reset_postdata(); ?>
    
    <?php endif;  



    }
protected function content_template() {}    
}
Plugin::instance()->widgets_manager->register_widget_type( new bddex_Widget_team() );