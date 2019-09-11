<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class bddex_dual_testimonial extends Widget_Base {
    public function get_name() {
        return 'dual_testimonials';
    }
    public function get_title() {
        return esc_html__( 'Avas Dual Testimonials', 'avas-core' );
    }
    public function get_icon() {
        return 'fa fa-commenting-o';
    }
    public function get_categories() {
        return [ 'bddex' ];
    }
    protected function _register_controls() {
        $this->start_controls_section(
            'avas_dual_testimonials',
            [
                'label' => esc_html__( 'Go to Theme Options > Testimonial ', 'avas-core' ),
            ]
        );
        $this->add_control(
            'dt_infinite',
            [
                'label' => esc_html__( 'Infinite Loop?', 'avas-core' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'true',
                'default' => 'true',
            ]
        );
        $this->add_control(
            'dt_autoplay',
            [
                'label' => esc_html__( 'Auto Play?', 'avas-core' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'true',
                'default' => 'true',
            ]
        );
        $this->add_control(
          'dt_max_item',
          [
             'label'   => esc_html__( 'Max Visible Item', 'avas-core' ),
             'type'    => Controls_Manager::NUMBER,
             'default' => 2,
             'min'     => 1,
             'max'     => 6,
             'step'    => 1,
          ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'testimonial_dual_style',
            [
                'label'                 => esc_html__( 'Styles', 'avas-core' ),
                'tab'                   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'name_color',
            [
                'label'                 => esc_html__( 'Client Name Color', 'avas-core' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '#111',              
                'selectors'             => [
                    '{{WRAPPER}} .client-name' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'company_color',
            [
                'label'                 => esc_html__( 'Company Name Color', 'avas-core' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '#8cc63f',              
                'selectors'             => [
                    '{{WRAPPER}} .client-left a,.client-left a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'content_color',
            [
                'label'                 => esc_html__( 'Content Color', 'avas-core' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '#fff',              
                'selectors'             => [
                    '{{WRAPPER}} .client-feedback' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'content_bg_color',
            [
                'label'                 => esc_html__( 'Content Background Color', 'avas-core' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '#00CDED',              
                'selectors'             => [
                    '{{WRAPPER}} .client-feedback' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'content_arrow_bg_color',
            [
                'label'                 => esc_html__( 'Content Background Arrow Color', 'avas-core' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '#00CDED',              
                'selectors'             => [
                    '{{WRAPPER}} .client-feedback:after' => 'border-top-color: {{VALUE}};',
                ],
            ]
        );
       $this->add_control(
            'arrow_bg_color',
            [
                'label'                 => esc_html__( 'Navigation Background Color', 'avas-core' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '#00CDED',              
                'selectors'             => [
                    '{{WRAPPER}} .testimonial.owl-carousel button.owl-prev,.testimonial.owl-carousel button.owl-next' => 'background: {{VALUE}};',
                ],
            ]
        );
       $this->add_control(
            'arrow_bg_hover_color',
            [
                'label'                 => esc_html__( 'Navigation Background Hover Color', 'avas-core' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '#8cc63f',              
                'selectors'             => [
                    '{{WRAPPER}} .testimonial button.owl-prev:hover, .testimonial.owl-carousel button.owl-next:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render( ) {
        $settings = $this->get_settings();
        $auto_play  = ( ($settings['dt_autoplay']     == 'true') ? "true" : "false" );
        $infinite   = ( ($settings['dt_infinite']     == 'true') ? "true" : "false" );
global $bddex;
if (isset($bddex['testimonial-switch']) && !empty($bddex['testimonial-switch'])) : ?>
    <div class="testimonial owl-carousel">
<?php 
if($bddex['testimonial-slides']) :
foreach($bddex['testimonial-slides'] as $testimonial) : 
$sl_btntxt = $testimonial['btntxt'];
$sl_url = $testimonial['url'];  
?>
            <div class="item">
                <div class="client-left"><?php echo '<img src="' . $testimonial['image'] . '" alt="client" />'; ?>
                    <h6 class="client-name"><?php echo $testimonial['title']; ?></h6>
                    <?php if (isset($sl_url) && ($sl_btntxt)) : ?>
                    <a href="<?php echo $sl_url; ?>" target="_blank"><?php echo $sl_btntxt; ?></a>
                    <?php endif; ?>
                </div>     
                <div class="client-feedback">
                    <p><?php echo $testimonial['description']; ?></p>
                </div>    
            </div>
    <?php endforeach; ?>
    <script>
    jQuery(document).ready(function($) {            
        var $client =  $('.testimonial')
        if ($client.length) {
            $client.owlCarousel({
                loop:<?php echo $infinite;?>,
                margin:30,
                nav:true,
                autoplayHoverPause:false,
                autoplay: <?php echo $auto_play;?>,
                smartSpeed: 500,
                navText: [ '<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>' ],
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:1
                    },
                    760:{
                        items:2
                    },
                    1024:{
                        items:<?php echo $settings['dt_max_item'];?>
                    },
                }
            });         
        }
    });
    </script>
<?php
      endif;
?>
</div>
<?php endif; 
    }
protected function content_template() {}
}
Plugin::instance()->widgets_manager->register_widget_type( new bddex_dual_testimonial() );