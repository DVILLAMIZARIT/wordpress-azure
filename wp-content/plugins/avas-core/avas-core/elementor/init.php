<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com/
*
*
*/

require_once AVAS_PLUGIN_PATH . 'elementor/queries.php'; //posts queries
require_once AVAS_PLUGIN_PATH . 'elementor/helper.php'; //posts queries

add_action('elementor/init','bddex_elementor_init');
function bddex_elementor_init(){
    Elementor\Plugin::instance()->elements_manager->add_category(
        'bddex',
        [
            'title'  => esc_html__('Avas Widgets','avas-core'),
            'icon' => 'apps'
        ],
        0
    );
}


add_action('elementor/widgets/widgets_registered','bddex_new_elements');
function bddex_new_elements(){

    require_once AVAS_PLUGIN_PATH . 'elementor/elements/heading.php';
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/dual-heading.php';
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/dual-color-header.php';
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/title.php';

    require_once AVAS_PLUGIN_PATH . 'elementor/elements/divider.php';
    
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/fancy-text.php';
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/icon-list.php';
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/business-hours.php';
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/link-effects.php';
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/lightbox.php';

    require_once AVAS_PLUGIN_PATH . 'elementor/elements/any-posts.php';
    
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/post-grid.php';
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/post-grid-view.php';
    
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/post-video-grid.php';

    require_once AVAS_PLUGIN_PATH . 'elementor/elements/post-block.php';
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/post-block-list.php';
    
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/posts-carousel.php';
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/posts-carousel2.php';
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/posts-carousel3.php';

    require_once AVAS_PLUGIN_PATH . 'elementor/elements/post-list.php';
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/post-list-one.php';

    require_once AVAS_PLUGIN_PATH . 'elementor/elements/post-list-slide.php';
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/post-grid-slide.php';

    require_once AVAS_PLUGIN_PATH . 'elementor/elements/post-tiled.php';
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/post-timeline.php';
        
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/portfolio.php';
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/news-ticker.php';

if ( class_exists( 'WooCommerce' ) ) {
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/wc-product-grid.php';
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/wc-product-carousel.php';
}

if ( class_exists( 'LearnPress' ) ) {
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/lp-carousel.php';
}

    require_once AVAS_PLUGIN_PATH . 'elementor/elements/flipbox.php';
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/flipbox-2.php';
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/flip-carousel.php';

	require_once AVAS_PLUGIN_PATH . 'elementor/elements/infobox.php';
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/interactive-promo.php';
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/timeline.php';
       
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/gallery.php';
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/instagram-gallery.php';
    
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/tabs.php';
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/image-accordion.php';

    require_once AVAS_PLUGIN_PATH . 'elementor/elements/services.php';
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/services2.php';
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/services3.php';

    require_once AVAS_PLUGIN_PATH . 'elementor/elements/features.php';
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/static-product.php';

    require_once AVAS_PLUGIN_PATH . 'elementor/elements/testimonials-slider.php';
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/testimonials-rating-slider.php';
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/testimonials.php';
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/testimonials-rating.php';
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/testimonials-dual.php';
    
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/piecharts.php';
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/stats-bars.php';
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/odometers.php';
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/countdown.php';

    require_once AVAS_PLUGIN_PATH . 'elementor/elements/team-members1.php';
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/team-members2.php';
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/team-members3.php';
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/team-members-carousel.php';
    
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/profile-carousel.php';
    
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/table.php';
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/pricing-table1.php';
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/pricing-table2.php';
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/price-menu.php';
	
    require_once AVAS_PLUGIN_PATH . 'elementor/elements/call-to-action.php';

    require_once AVAS_PLUGIN_PATH . 'elementor/elements/contact-form-7.php';
    
}
