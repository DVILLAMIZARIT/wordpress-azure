<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class bddex_Widget_news extends Widget_Base {
    public function get_name() {
        return 'avas-blog';
    }

    public function get_title() {
        return esc_html__( 'Avas Posts Carousel 2', 'avas-core' );
    }

    public function get_icon() {
        return 'eicon-slideshow';
    }

    public function get_categories() {
        return [ 'bddex' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'section_post_car_2',
            [
               
                'label'   => esc_html__('Settings','avas-core'),
            ]
        );

        $this->add_control(
          'post_count',
          [
            'label'         => esc_html__( 'Post count', 'avas-core' ),

            'type'          => Controls_Manager::NUMBER,
            'label_block'   => true,
            'default'       => esc_html__( '9', 'avas-core' ),

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
            'pc2_infinite',
            [
                'label' => esc_html__( 'Infinite Loop?', 'avas-core' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'true',
                'default' => 'true',
            ]
        );
        $this->add_control(
            'pc2_autoplay',
            [
                'label' => esc_html__( 'Auto Play?', 'avas-core' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'true',
                'default' => 'true',
            ]
        );
        $this->add_control(
          'pc2_max_item',
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
            'section_carousel_item_thumbnail_styling',
            [
                'label' => esc_html__('Style under Theme Options > Colors > Blog', 'avas-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->end_controls_section();
    }

    protected function render( ) {
        $settings = $this->get_settings();
        $post_count = $settings['post_count'];
        $post_catd  = $settings['post_catd'];
        $auto_play  = ( ($settings['pc2_autoplay']     == 'true') ? "true" : "false" );
        $infinite   = ( ($settings['pc2_infinite']     == 'true') ? "true" : "false" );
        
 // post count
        if( $post_count ){
            $post_count = $post_count;
        } else {
            $post_count = 9;
        }




    $arg = array(
    'post_status' => 'publish',
    'posts_per_page' => $post_count,
    'category_name' => $post_catd

    );

  $query = new \WP_Query( $arg );


if ( $query->have_posts() ) : ?>

   <div class="blog-cars owl-carousel">     
    <?php while($query->have_posts()) : $query->the_post(); ?>
        <div class="item row ">
        <div class="col-md-12 post blog-cols">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
                    <div class="zoom-thumb">
                        <a href="<?php the_permalink(); ?>" rel="bookmark">
                        <?php if (has_post_thumbnail()) : 
                        the_post_thumbnail('bddex-blog-three-img'); 
                        endif; 
                        ?>
                        </a>
                    </div>
                <div class="details-box">
                    <?php bddex_date(); ?>
                        <h5 class="post-title">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
                        <?php the_title(); ?>
                        </a></h5>
                        <?php if ('post' == get_post_type()) : ?>
                    <div class="entry-meta">
                    <?php bddex_category(); ?>
                    <?php bddex_comments(); ?>
                    </div>
                    <?php endif; ?><!-- .entry-meta -->
                        <?php echo bddex_excerpt(20); ?>

                <div class="clearfix"></div>
                <footer class="entry-footer">       
                    <a href="<?php the_permalink(); ?>" class="read-more"><?php echo esc_html__( 'Read More', 'avas-core' ); ?></a>
                </footer>    
                </div>
            </article>  
        </div>
        </div>
    <?php endwhile; ?>
    </div> <!-- end loop -->
    <script>
        jQuery(document).ready(function($) {
            var $woo = $('.blog-cars')
            if ($woo.length) {
                $woo.owlCarousel({
                    loop:<?php echo $infinite;?>,
                    margin:30,
                    nav:true,
                    smartSpeed: 500,
                    autoplay: <?php echo $auto_play;?>,
                    navText: [ '<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>' ],
                    responsive:{
                        0:{
                            items:1
                        },
                        600:{
                            items:2
                        },
                        1024:{
                            items:<?php echo $settings['pc2_max_item'];?>
                        },
                    }
                });         
            }
        });
    </script>
<?php  wp_reset_postdata(); ?>
    <?php else:  ?>
    <p><?php esc_html_e( 'Sorry, nothing found.', 'avas-core' ); ?></p>
    <?php endif;  
echo '<div class="clearfix"></div>';
    }
protected function content_template() {}
}
Plugin::instance()->widgets_manager->register_widget_type( new bddex_Widget_news() );