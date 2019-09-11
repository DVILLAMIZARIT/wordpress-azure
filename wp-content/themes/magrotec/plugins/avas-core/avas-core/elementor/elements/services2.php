<?php
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) exit;

class bddex_Widget_services2 extends Widget_Base {
    public function get_name() {
        return 'avas-services2';
    }

    public function get_title() {
        return esc_html__( 'Avas services 2', 'avas-core' );
    }

    public function get_icon() {
        return 'fa fa-cogs';
    }

    public function get_categories() {
        return [ 'bddex' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'section_services',
            [
                'label' => esc_html__( 'Go to Dashboard > Services > Add New Services ', 'avas-core' )
            ]
        );

$this->add_control(
          'post_count',
          [
            'label'         => esc_html__( 'Post count', 'avas-core' ),
            'type'          => Controls_Manager::NUMBER,
            'label_block'   => true,
            'default'       => esc_html__( '6', 'avas-core' ),

          ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'services2_style',
            [
                'label'                 => esc_html__( 'Go to Theme Options > Colors > Services', 'avas-core' ),
                'tab'                   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->end_controls_section();

    }

    protected function render( ) {
        $settings = $this->get_settings();
        $post_count = $settings['post_count'];


 // post count
        if( $post_count ){
            $post_count = $post_count;
        } else {
            $post_count = 6;
        }


        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
        $arg = array(
      'post_type' => 'service',
      'post_status' => 'publish',
      'posts_per_page' => $post_count

    );

  $query = new \WP_Query( $arg );


if ( $query->have_posts() ) : ?>

   <div id="project-items" class="project-items p3cols">
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        

            <div class="project-content portfolio-item col-xs-12 col-sm-6 col-md-6 col-lg-4">
                <figure>
                    <a href="<?php the_permalink(); ?>" rel="bookmark">
                    <?php the_post_thumbnail('bddex-service'); ?>      
                    </a>    
                    <figcaption>
                        <a href="<?php the_permalink(); ?>" rel="bookmark" >
                        <h4><?php the_title(); ?></h4>
                        </a>
                        <?php  
                        global $bddex;
                        if (!empty($bddex['service-button-text'])) : ?>
                        <a href="<?php the_permalink(); ?>" rel="bookmark" class="services button details">
                        <?php echo esc_html($bddex['service-button-text']); ?>
                        </a> 
                        <?php endif; ?>
                    </figcaption>
                </figure>
            </div>  

        <?php endwhile; 
         wp_reset_postdata(); 
        ?>
        </div>

    <?php else:  ?>
    <p><?php esc_html_e( 'Sorry, nothing found.', 'avas-core' ); ?></p>
    <?php endif;  
echo '<div class="clearfix"></div>';


    }
protected function content_template() {}
}
Plugin::instance()->widgets_manager->register_widget_type( new bddex_Widget_services2() );