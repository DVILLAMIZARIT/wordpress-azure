<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com/
*
*
*/


// client feedback carousel for sidebar coming from Theme Options > Testimonial
if(!function_exists('bddex_client_side')) :
add_action('bddex_client_side','bddex_client_side');
function bddex_client_side() {
    global $bddex;
        if($bddex['testimonial-switch']) :   ?>
           <div class="service-brochure">
                <h5 class="client-title"><?php esc_html_e(' TESTIMONIAL', 'avas'); ?></h5> 
                <div class="service_testimonial owl-carousel">
                <?php 
                global $bddex;
                 if($bddex['testimonial-slides']) :
                foreach($bddex['testimonial-slides'] as $testimonial) : 
                    global $bddex;
                    $sl_url = $testimonial['url']; 
                    $sl_img = $testimonial['image'] 
                ?>
                <div class="item">
                    <div class="client">
                        <?php if (isset($sl_url)) : ?>
                        <h6 class="client-name"><a href="<?php echo esc_url($sl_url); ?>"><?php echo esc_attr($testimonial['title']); ?></h6></a>
                        <?php endif; ?>
                        <?php if ($sl_img) : 
                        echo '<img src="' . esc_url($sl_img) . '" >'; 
                        endif; ?>
                    </div>     
                    <div class="client-feedback">
                        <p><?php printf(esc_html__('%s', 'avas'),$testimonial['description']); ?></p>
                    </div>    
                </div>
                <?php 
                endforeach; 
                endif;
                ?>
                </div>
            </div>

        <?php endif; 
    }
endif;

/* ---------------------------------------------------------
   EOF
------------------------------------------------------------ */ 