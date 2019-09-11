<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com/
*======================================================================
* This is main functions file you may add your custom functions here. 
*======================================================================
*/
$theme = wp_get_theme();
define('THEME_PATH', get_template_directory());
define('THEME_DIR', get_template_directory_uri());
define('STYLESHEET_PATH', get_stylesheet_directory());
define('STYLESHEET_DIR', get_stylesheet_directory_uri());
define('THEME_VERSION', $theme->get('Version'));

/* ---------------------------------------------------------
   Include files
------------------------------------------------------------ */ 
require_once THEME_PATH . '/inc/header/header.php'; // Header
require_once THEME_PATH . '/inc/theme-options.php'; // Theme options
require_once THEME_PATH . '/inc/bootstrap-navwalker.php'; // bootstrap navwalker
require_once THEME_PATH . '/inc/tgm.php'; // TGM plugin activation
require_once THEME_PATH . '/inc/sub-header.php'; // Sub header
require_once THEME_PATH . '/inc/comments-callback.php'; // Comments callback
require_once THEME_PATH . '/inc/pagination.php'; // Pagination
require_once THEME_PATH . '/inc/related-post.php'; // Related post
require_once THEME_PATH . '/inc/custom-widgets.php'; // Widgets
require_once THEME_PATH . '/inc/testimonial.php'; // testimonial
require_once THEME_PATH . '/learnpress/lp-functions.php'; // learnpress functions
require_once THEME_PATH . '/inc/welcome.php'; // welcome screen
require_once THEME_PATH . '/inc/meta.php'; // meta
require_once THEME_PATH . '/inc/login.php'; // login
require_once THEME_PATH . '/inc/import.php'; // import

/* ---------------------------------------------------------
  Theme Setup
------------------------------------------------------------ */
if( !function_exists('bddex_theme_setup') ) :
function bddex_theme_setup() {
// menu setup
        register_nav_menus(array(
            'top_menu'    => esc_html__('Top Menu', 'avas'),
            'main_menu'   => esc_html__('Main Menu', 'avas'),
            'side_menu'   => esc_html__('Side Menu', 'avas'),
            'footer_menu' => esc_html__('Footer Menu', 'avas')
        ));

// Makes theme available for translation.
load_theme_textdomain( 'avas', THEME_PATH . '/languages' );

// Post format
add_theme_support('post-formats', array('video','gallery'));

// Add RSS Links to head section
add_theme_support( 'automatic-feed-links' );

// Custom header setup
add_theme_support( 'custom-header', array() );

// Custom backgrounds setup
add_theme_support( 'custom-background', array() );

// Custom logo
add_theme_support(
      'custom-logo', array(
        'width'       => 250,
        'height'      => 60,
        'flex-width'  => true,
        'flex-height' => true,
      )
);

// Title Tag support
add_theme_support( 'title-tag' );

// Enable WP Responsive embedded content
add_theme_support( 'responsive-embeds' );

// Enable WP Gutenberg Align Wide
add_theme_support( 'align-wide' );

// Enable WP Gutenberg Block Style
add_theme_support( 'wp-block-styles' );

// Add support for editor styles.
add_theme_support( 'editor-styles' );

// Partial refresh support in the Customize
add_theme_support( 'customize-selective-refresh-widgets' );

// Enable support for custom Editor Style.
add_editor_style( 'custom-editor-style.css' );

// Enable Custom Color Scheme For Block Style
add_theme_support( 'editor-color-palette', array(
    array(
        'name' => esc_html__( 'deep cerise', 'avas' ),
        'slug' => 'deep-cerise',
        'color' => '#e51681',
    ),    
    array(
        'name' => esc_html__( 'strong magenta', 'avas' ),
        'slug' => 'strong-magenta',
        'color' => '#a156b4',
    ),
    array(
        'name' => esc_html__( 'light grayish magenta', 'avas' ),
        'slug' => 'light-grayish-magenta',
        'color' => '#d0a5db',
    ),
    array(
        'name' => esc_html__( 'very light gray', 'avas' ),
        'slug' => 'very-light-gray',
        'color' => '#eee',
    ),
    array(
        'name' => esc_html__( 'very dark gray', 'avas' ),
        'slug' => 'very-dark-gray',
        'color' => '#444',
    ),
    array(
        'name'  =>  esc_html__( 'strong blue', 'avas' ),
        'slug'  => 'strong-blue',
        'color' => '#0073aa',
    ),
    array(
        'name'  =>  esc_html__( 'lighter blue', 'avas' ),
        'slug'  => 'lighter-blue',
        'color' => '#229fd8',
    ),
) );

// Block Font Sizes
add_theme_support( 'editor-font-sizes', array(
    array(
        'name' => esc_html__( 'Small', 'avas' ),
        'size' => 12,
        'slug' => 'small'
    ),
    array(
        'name' => esc_html__( 'Regular', 'avas' ),
        'size' => 16,
        'slug' => 'regular'
    ),
    array(
        'name' => esc_html__( 'Large', 'avas' ),
        'size' => 36,
        'slug' => 'large'
    ),
    array(
        'name' => esc_html__( 'Huge', 'avas' ),
        'size' => 50,
        'slug' => 'larger'
    )
) );

// Load WP Comment Reply JS
if(is_singular()){
  wp_enqueue_script( 'comment-reply' );
}

// Content Width
if ( ! isset( $content_width ) ) $content_width = 1170;

}
add_action( 'after_setup_theme', 'bddex_theme_setup' );
endif;

/* ------------------------------------------------------------------------
  Enable support for Post Thumbnails on posts, pages and custom post type.
--------------------------------------------------------------------------- */
if ( function_exists( 'add_image_size' ) ) add_theme_support( 'post-thumbnails' ); 
add_image_size('bddex-extra-large-img', 1920, 700, true); // 
add_image_size('bddex-large-img', 770, 430, true); // 
add_image_size('bddex-small-img', 100, 75, true); // 
add_image_size('bddex-xmedium-size', 580, 460, true);
add_image_size('bddex-small-size', 350, 220, true);
add_image_size('bddex-project-carousel', 150, 120, true); // project carousel 5:4
add_image_size('bddex-team-full', 390, 390, true); // team full wide
add_image_size('bddex-team', 262, 262, true); // team
add_image_size('bddex-team-profile-img', 470, 560, true); // team profile single
add_image_size('bddex-service', 370, 240, true); // service 3:2
add_image_size('bddex-service-large', 1170, 500, true); // booking service 
add_image_size('bddex-blog-two-img', 345, 230, true); // blog two cols 3:2
add_image_size('bddex-blog-three-img', 380, 220, true); // blog three cols
add_image_size('bddex-related-img', 160, 110, true); // related 
add_image_size('bddex-masonry-img', 300, 460, false); // related
add_image_size('woo-340x0', 340, 0, false); // woo-340x400
add_image_size('single_course_image', 1170, 550, true); // single course featured image learnpress for education
add_image_size('bddex_course_thumbnail', 278, 185, true); // course featured image learnpress for education

/* ---------------------------------------------------------
   Enqueue Styles and Scripts
------------------------------------------------------------ */ 

if(!function_exists('bddex_enqueue')):
add_action('wp_enqueue_scripts', 'bddex_enqueue');
function bddex_enqueue() {

  // CSS
  wp_enqueue_style( 'bootstrap', THEME_DIR . '/assets/css/bootstrap.min.css' );
  wp_enqueue_style( 'bddex-styles', THEME_DIR . '/assets/css/styles.min.css' );
  
  // JS
  wp_enqueue_script( 'bootstrap', THEME_DIR . '/assets/js/bootstrap.min.js', array('jquery'), THEME_VERSION, true );
  wp_enqueue_script( 'bddex-main', THEME_DIR . '/assets/js/main.min.js', array('jquery'), THEME_VERSION, true );
  }
endif;

/* ---------------------------------------------------------
   Enqueue Styles for Admin
------------------------------------------------------------ */
if(!function_exists('bddex_admin_enqueue')):
add_action('admin_enqueue_scripts', 'bddex_admin_enqueue');
function bddex_admin_enqueue() {
  wp_enqueue_style( 'admin-css', THEME_DIR . '/assets/css/admin.min.css' );
}
endif;
/* ---------------------------------------------------------
  menu button link open in new window target = _blank
------------------------------------------------------------ */
if(!function_exists('bddex_menu_btn_link_new_window')) :
  function bddex_menu_btn_link_new_window() {
    global $bddex;

    if ($bddex['menu_btn_link_new_window'] == '1') {
      echo 'target="_blank"';
    }
     if ($bddex['menu_btn_link_new_window'] == '0') {
      echo '';
    }
  }
endif;

/* ---------------------------------------------------------
  ads link open in new window target = _blank
------------------------------------------------------------ */
if(!function_exists('bddex_head_ad_banner_link_new_window')) :
  function bddex_head_ad_banner_link_new_window() {
    global $bddex;

    if ($bddex['head_ad_banner_link_new_window'] == '1') {
      echo 'target="_blank"';
    }
     if ($bddex['head_ad_banner_link_new_window'] == '0') {
      echo '';
    }
  }
endif;

/* ---------------------------------------------------------
  WooCommerce
------------------------------------------------------------ */
function bddex_woocommerce_support() {
  add_theme_support('woocommerce');
  add_theme_support( 'wc-product-gallery-zoom' );
  add_theme_support( 'wc-product-gallery-lightbox' );
  add_theme_support( 'wc-product-gallery-slider' );
}
add_action('after_setup_theme', 'bddex_woocommerce_support');

// Change number or products per row to 4
add_filter('loop_shop_columns', 'bddex_loop_columns');
  function bddex_loop_columns() {
    global $bddex;
    return $bddex['woo-product-per-row']; // 4 products per row
  }

function bddex_remove_woo_stuff(){
  remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0); // breadcrumbs
  remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15, 0); // you may interested in / cross-sells on product page
  remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 ); // related product
  remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' ); // cross-sells / you may interested in  at cart
  //remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 ); // price
}
add_action('template_redirect', 'bddex_remove_woo_stuff' );

// product per page
function bddex_loop_shop_per_page( $cols ) {
  global $bddex;
  $cols = $bddex['woo-product-per-page'];
  return $cols;
}
add_filter( 'loop_shop_per_page', 'bddex_loop_shop_per_page', 20 );


// removes Order Notes Title - Additional Information
add_filter( 'woocommerce_enable_order_notes_field', '__return_false' );

// Remove address 2 and company name from checkout page
add_filter( 'woocommerce_checkout_fields' , 'bddex_override_checkout_fields' );
function bddex_override_checkout_fields( $fields ) {
unset($fields['billing']['billing_address_2']);
unset($fields['billing']['billing_company']);
return $fields;
}
// re order phone & email on checkout page
add_filter( 'woocommerce_checkout_fields', 'bddex_checkout_fields_re_order' );
function bddex_checkout_fields_re_order( $fields ) {
  $fields['billing']['billing_phone']['priority'] = 20;
  $fields['billing']['billing_email']['priority'] = 20;
  return $fields;
}

/* ---------------------------------------------------------
  Project carousel
------------------------------------------------------------ */
function bddex_project_exp() {
  global $bddex;
  $args = array(
      'post_type' => $bddex['portfolio-slug'],
      'posts_per_page' => -1,
      'post_status' => 'publish',
      'orderby' => 'rand',
    );
    $query = new WP_Query( $args ); ?>
    <?php if ( $query->have_posts() ) : ?>
     <!-- the loop -->
    <div class="project-carousel owl-carousel">
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
      <div class="item row ">
        <div class="col-md-12">
        <figure>
          <a href="<?php the_permalink(); ?>" rel="bookmark">
          <?php the_post_thumbnail('bddex-project-carousel'); ?>    
          </a>
          <figcaption>
            <h4><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
          </figcaption>
        </figure>
        </div>
      </div>        
    <?php endwhile; ?>
    </div> <!-- end loop -->
  <?php wp_reset_postdata(); ?>
  <?php else: ?>
    <p><?php esc_html_e( 'Sorry, nothing found.', 'avas' ); ?></p>
  <?php endif; 
}


/* ---------------------------------------------------------
  Page content
------------------------------------------------------------ */
if(!function_exists('bddex_content_page')) :
add_action( 'bddex_content_page', 'bddex_content_page' );
function bddex_content_page() { ?>
        <div id="primary" class="single_page">
            <main id="main" class="site-main">
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('content', 'page'); ?>
                    <?php
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    ?>
                <?php endwhile; // end of the loop.  ?>
            </main><!-- #main -->
        </div><!-- #primary -->

<?php 
}
endif;

/* ---------------------------------------------------------
  Post format
------------------------------------------------------------ */
function bddex_post_format( $template ) {
    if ( is_single() && has_post_format() ) {
        $post_format_template = locate_template( 'single-' . get_post_format() . '.php' );
        if ( $post_format_template ) {
            $template = $post_format_template;
        }
    }

    return $template;
}   
add_filter( 'template_include', 'bddex_post_format' );

/* ---------------------------------------------------------
  Insert ads after paragraph of single post content.
------------------------------------------------------------ */
 if ( class_exists( 'ReduxFramework' ) ) :
add_filter( 'the_content', 'bddex_insert_post_ads' );
 
function bddex_insert_post_ads( $content ) {
    global $bddex;
    $img_code = '<div class="ad_300_250"><a href="'.$bddex['s_ad_banner_link'].'"><img src="'.$bddex['s_ad_banner']['url'].'" alt="ads" ></a></div>';
   // $bddex['s_ad_js'] = '';
    $js_code = '<div class="ad_300_250">'.$bddex['s_ad_js'].'</div>';
   
    if($bddex['post_ads']) :
    if ( is_singular('post') && ! is_admin() ) {
      global $bddex;
      if (!empty($bddex['s_ad_banner']['url'] && $bddex['s_ads_switch'])) {
        if(isset($bddex['s_ads_after_p'])) {
        return bddex_insert_after_paragraph( $img_code, $bddex['s_ads_after_p'], $content );
        }
      }
      if(isset($bddex['s_ads_after_p'])) {
        return bddex_insert_after_paragraph( $js_code, $bddex['s_ads_after_p'], $content );
      }
    }
    endif; 
    
    return $content;
}
endif;  

// Parent Function that makes the magic happen
function bddex_insert_after_paragraph( $insertion, $paragraph_id, $content ) {
    $closing_p = '</p>';
    $paragraphs = explode( $closing_p, $content );
    foreach ($paragraphs as $index => $paragraph) {
 
        if ( trim( $paragraph ) ) {
            $paragraphs[$index] .= $closing_p;
        }
 
        if ( $paragraph_id == $index + 1 ) {
            $paragraphs[$index] .= $insertion;
        }
    }
     
    return implode( '', $paragraphs );
}

// Service single page sidebar Brochure Image and Cotnact Form function
add_action( 'service_side_img_form','bddex_single_service_sidebar_image_form' );
function bddex_single_service_sidebar_image_form() {
  global $bddex;
  if ($bddex['service_sidebar_img_form']=='1') { ?>
       <?php if (isset($bddex['service-brochure-img']['url']) && ($bddex['service-brochure-img']['url'] != "" )) : ?>
                <img src="<?php echo esc_url($bddex['service-brochure-img']['url']); ?>" />
            <?php endif; ?>
<?php }
  if ($bddex['service_sidebar_img_form']=='0') {
     echo do_shortcode( $bddex['service-contact-form'] );
  }
}

// tag limit
//Register tag cloud filter callback
add_filter('widget_tag_cloud_args', 'bddex_tag_widget_limit');
//Limit number of tags inside widget
function bddex_tag_widget_limit($args) {
    global $bddex;
//Check if taxonomy option inside widget is set to tags
if(isset($args['taxonomy']) && $args['taxonomy'] == 'post_tag'){
$args['number'] = $bddex['tag_limit']; //Limit number of tags
}
return $args;
}

// category limit
add_filter( 'widget_categories_args', 'bddex_cat_widget_limit' );
function bddex_cat_widget_limit( $args ) {
    global $bddex;
    $args['number']         = $bddex['cat_limit'];;
    $args['orderby']        = 'count';
    $args['order']          = 'DESC';
    $args['hierarchical']   = 0;
    $args['hide_empty']     = 1;

    return $args;
} 

/* ---------------------------------------------------------
    Single Post Sidebar / No Sidebar
------------------------------------------------------------ */
if(!function_exists('bddex_sidebar_no_sidebar')) :
function bddex_sidebar_no_sidebar() {
  if ( class_exists( 'ReduxFramework' ) ) {
  global $bddex;
  if($bddex['sidebar-select'] == 'no-sidebar') {
    echo 12;
  } else {
   echo 8;
  }
 }else{
  echo 12;
 } 
}
endif;

/* ---------------------------------------------------------
    WooCommerce Sidebar / No Sidebar
------------------------------------------------------------ */
if(!function_exists('bddex_woo_sidebar_no_sidebar')) :
function bddex_woo_sidebar_no_sidebar() {
  global $bddex;
  if($bddex['woo-sidebar-select'] == null) {
    echo 12;
  } else {
   echo 9;
 }

}
endif;

/* ---------------------------------------------------------
  Add sidebra classes to body
------------------------------------------------------------ */

add_filter('body_class', 'bddex_add_sidebar_classes_to_body');
function bddex_add_sidebar_classes_to_body($classes = '') {

  global $bddex;
    if($bddex['sidebar-select'] == 'sidebar-right') {
        $classes[] = 'sidebar-right';
    }

    elseif ($bddex['sidebar-select'] == 'sidebar-left') {
            $classes[] = 'sidebar-left';
    }else{
            $classes[] = 'no-sidebar';
}
  return $classes;

}

/* ---------------------------------------------------------
  Excerpt word limit
------------------------------------------------------------ */
function bddex_excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
    }
    function bddex_content($limit) {
      $content = explode(' ', get_the_content(), $limit);
      if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
      } else {
        $content = implode(" ",$content);
      } 
      $content = preg_replace('/\[.+\]/','', $content);
      $content = apply_filters('the_content', $content); 
      $content = str_replace(']]>', ']]&gt;', $content);
      return $content;
    }

/* ---------------------------------------------------------
  Excerpt read more
------------------------------------------------------------ */
function bddex_excerpt_more( $more ) {
     return '.';
}
add_filter( 'excerpt_more', 'bddex_excerpt_more' );

/* ---------------------------------------------------------
    EOF
------------------------------------------------------------ */