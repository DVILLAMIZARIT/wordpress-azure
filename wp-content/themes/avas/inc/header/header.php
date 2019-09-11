<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com/
*======================================================================
* Header functions 
*======================================================================
*/
/* ---------------------------------------------------------
  Preloader
------------------------------------------------------------ */
if (!function_exists('bddex_preloader')) :
  add_action( 'bddex_preloader','bddex_preloader' );
  function bddex_preloader() { ?>
    <div class="pre-loader">
      <div class="sk-fading-circle">
        <div class="sk-circle1 sk-circle"></div>
        <div class="sk-circle2 sk-circle"></div>
        <div class="sk-circle3 sk-circle"></div>
        <div class="sk-circle4 sk-circle"></div>
        <div class="sk-circle5 sk-circle"></div>
        <div class="sk-circle6 sk-circle"></div>
        <div class="sk-circle7 sk-circle"></div>
        <div class="sk-circle8 sk-circle"></div>
        <div class="sk-circle9 sk-circle"></div>
        <div class="sk-circle10 sk-circle"></div>
        <div class="sk-circle11 sk-circle"></div>
        <div class="sk-circle12 sk-circle"></div>
      </div>
    </div>
<?php }
endif;

/* ---------------------------------------------------------
  // page layout
------------------------------------------------------------ */

if (!function_exists('bddex_page_layout')) :
  function bddex_page_layout() {
  if ( class_exists( 'ReduxFramework' ) ) {  
  global $bddex;
  if ($bddex['page-layout'] == 'width') {
    echo '-fluid';
  }
  if ($bddex['page-layout'] == 'boxed') {
    echo '';
  }
}else{
  echo '-fluid';
}
}
endif;

/* ---------------------------------------------------------
  Layout wide / boxed
------------------------------------------------------------ */
// Header
if (!function_exists('bddex_full_width')) :
function bddex_full_width() {
  if ( class_exists( 'ReduxFramework' ) ) {
  global $bddex;
  if ($bddex['header_layout'] == '') {
    echo '-fluid';
  }
   if ($bddex['header_layout'] == 'boxed') {
    echo '';
  }
}else{
  echo '-fluid';
}
}
endif;

// Footer
if(!function_exists('bddex_footer_width')) :
function bddex_footer_width() {
  if ( class_exists( 'ReduxFramework' ) ) {
    global $bddex;
    if ($bddex['footer_layout'] == '') {
      echo '';
    }
    if ($bddex['footer_layout'] == 'wide') {
      echo '-fluid';
    }
  }else{
    echo '-fluid';
  }
}
endif;

/* ---------------------------------------------------------
  Top Header
------------------------------------------------------------ */
if(!function_exists('bddex_top_head')):
add_action( 'bddex_top_head', 'bddex_top_head' );
function bddex_top_head() {
global $bddex;
if ($bddex['top_head']) { ?>
            <div id="top_head">
              <div class="container<?php echo bddex_full_width(); ?>">
                    
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="head_contact">
                              <div class="row">
                                <!-- welcome message -->
                                <?php if($bddex['wel_msg'] == '1') {
                                        echo '<p class="welcome_msg">'.$bddex['welcome_msg'].'</p>';
                                        }
                                ?>
                                <!-- date -->
                                <?php if($bddex['bddex-date']) { ?>
                                <div class="bddex-date">
                                    <i class="fa fa-clock-o"></i><?php echo date(' F j, Y'); ?>
                                </div>
                                <?php } 
                                // phone & email
                                if ($bddex['phone_email']) { ?>
                                <ul class="phone_email">
                                    <li><i class="fa fa-phone"></i><a href="tel:<?php echo esc_html($bddex['phone']); ?>"><?php echo esc_html($bddex['phone']); ?></a></li>
                                    <li><i class="fa fa-envelope"></i><a href="mailto:<?php echo esc_html($bddex['email']); ?>"><?php echo esc_html($bddex['email']); ?></a></li>
                                </ul>
                                <?php } ?>
                              </div>
                            </div>
                        </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                  <div class="row">
                      <!-- social icons -->
                      <?php if ($bddex['top_socials']) : ?>
                        <div class="social_media m-l-md"> 
                        <?php echo bddex_social_media(); ?>
                        </div>
                      <?php endif; ?>
                      <!-- login register -->
                      <?php if($bddex['login_register'] == 1) : 
                            bddex_login_register(); 
                     endif; ?>
                  <!-- top menu -->
                  <?php if($bddex['top_menu'] == 1 )  : ?>
                    <?php
                    if ( has_nav_menu( 'top_menu' ) ) : 
                        wp_nav_menu( array(
                        'theme_location' => 'top_menu',
                        'menu_class'     => 'top_menu',
                        'depth'          => 1,
                        ) );
                    endif;
                  endif; ?>
                    
                    
                     </div>
                </div><!-- top menu end -->
              </div> <!-- /.container end -->
            </div> <!-- /#top_head -->
            <?php }
          }
endif;

/* ---------------------------------------------------------
  Header Style / Select header
------------------------------------------------------------ */
if(!function_exists('bddex_header_select')):
add_action( 'bddex_header_select', 'bddex_header_select' );  
function bddex_header_select() {
  global $bddex;
  if($bddex['header_select'] == '1') {
                get_template_part('inc/header/main-default'); 
            }
  if($bddex['header_select'] == '2') {
                get_template_part('inc/header/main-business'); 
            }            
  if($bddex['header_select'] == '3') {
                get_template_part('inc/header/main-news');
            }
  if($bddex['header_select'] == '4') {
                get_template_part('inc/header/main-center');
            }
  if($bddex['header_select'] == '5') {
                get_template_part('inc/header/main-center-top');
            } 

}
endif;

/* ---------------------------------------------------------
  Header position
------------------------------------------------------------ */
if(!function_exists('bddex_header_position')):
add_action( 'bddex_header_position', 'bddex_header_position' );
function bddex_header_position() {
  global $bddex;
  if($bddex['header_position'] == 'absolute') {
    echo 'hp-abs';
  }
  if($bddex['header_position'] == 'inherit') {
    echo 'hp-inh';
  }
}
endif;

/* ---------------------------------------------------------
   Email or Time
------------------------------------------------------------ */
if(!function_exists('bddex_email_time')):
add_action( 'email_time', 'bddex_email_time' );
function bddex_email_time() {
  global $bddex;
if($bddex['email_time'] == '1') { ?>
  <div class="upper-column info-box last">
    <div class="icon-box"><img src="<?php echo THEME_DIR.'/assets/img/email.png' ?>" alt="email" ></div>
      <ul>
        <li><?php echo wp_kses_post($bddex['send_email']); ?></li>
      </ul>
  </div>
<?php }
if($bddex['email_time'] == '2') { ?>
  <div class="upper-column info-box last">
    <div class="icon-box"><img src="<?php echo THEME_DIR.'/assets/img/clock.png' ?>" alt="time" ></div>
      <ul>
        <li><?php echo wp_kses_post($bddex['working_time']); ?></li>
      </ul>
  </div>
<?php }
}
endif;

/* ---------------------------------------------------------
   // search
------------------------------------------------------------ */
if (!function_exists('bddex_search')) :
  add_action( 'bddex_search', 'bddex_search' );
  function bddex_search() { ?>
    <div id="search" class="search-form">
      <form role="search" id="search-form" class="search-box" action="<?php echo esc_url(home_url('/')); ?>" method="get">
          <input type="search" required="" aria-required="true" name="s" placeholder="<?php esc_html_e('Search here ...','avas'); ?>" value="<?php echo get_search_query(); ?>">
          <span class="search-close"><i class="fa fa-times"></i></span>
      </form>
    </div>
<?php  }
endif;  


/* ---------------------------------------------------------
   // main menu
------------------------------------------------------------ */
if(!function_exists('bddex_main_menu')) :
  add_action( 'bddex_main_menu', 'bddex_main_menu' );
  function bddex_main_menu() { ?>
  <div class="collapse navbar-collapse bddex-menu-list" id="bs-example-navbar-collapse-1">
      <?php if(has_nav_menu('main_menu')) {
                wp_nav_menu( array(
                      'theme_location' => 'main_menu',
                      'container' =>false,
                      'menu_id' => 'nav',
                      'echo' => true,
                      'menu_class' => 'nav navbar-nav navbar-right',
                      'before' => '',
                      'after' => '',
                      'link_before' => '',
                      'link_after' => '',
                      'depth' => 5,
                      'walker'     => new wp_bootstrap_navwalker()
                      )
                      ); 
                      }elseif(is_user_logged_in()) {
                      echo '<h5 class="no-menu">';
                      echo esc_html_e('No Menu assigned. Go to Appearance > Menus and create a menu or select a menu if already created.', 'avas');
                      echo '</h5>';
                      } ?>
  </div> <!-- menu end -->
<?php }
endif;                            


/* ---------------------------------------------------------
   // menu button 
------------------------------------------------------------ */

if (!function_exists('bddex_menu_btn')) :
  add_action( 'bddex_menu_btn', 'bddex_menu_btn' );
  function bddex_menu_btn() {
    global $bddex;
    if($bddex['menu_btn_switch']) {
    ?>
    <div class="bddex-menu-btn-wrap">
      <a href="<?php if($bddex['menu_btn_url']){echo esc_url($bddex['menu_btn_url']);} ?>" <?php bddex_menu_btn_link_new_window(); ?> class="bddex-menu-btn"><?php if($bddex['menu_btn_txt']){printf(esc_html__('%s','avas'),$bddex['menu_btn_txt']);} ?></a>
    </div>
  <?php }
  }
endif;


/* ---------------------------------------------------------
    side menu
------------------------------------------------------------ */

if (!function_exists('bddex_side_menu')) :
  add_action( 'bddex_side_menu', 'bddex_side_menu' );
  function bddex_side_menu() {
    global $bddex;
    if($bddex['side_menu']) {
    ?>
    <a id="side-menu-icon" href="#" class="side_menu_icon"><i class="fa fa-bars"></i></a>
    <?php get_template_part("/inc/header/sidemenu");
   }
 }
endif;


/* ---------------------------------------------------------
    search icon
------------------------------------------------------------ */

if(!function_exists('bddex_search_icon')) :
  add_action( 'bddex_search_icon', 'bddex_search_icon' );
  function bddex_search_icon() {
      global $bddex;
      if($bddex['search']) {  
        echo '<ul class="search-icon">';
        echo '<li><a href="#search"><i class="fa fa-search"></i></a></li>';
        echo '</ul>';
        }
  }
endif;


/* ---------------------------------------------------------
    cart icon
------------------------------------------------------------ */

if(!function_exists('bddex_cart_icon')) :
  add_action( 'bddex_cart_icon', 'bddex_cart_icon' );
  function bddex_cart_icon() {
    global $bddex;
    if($bddex['woo_cart']) : 
     if ( class_exists( 'WooCommerce' ) ) { ?> 
      <div class="woo_cart">
        <?php global $woocommerce;
          echo '<a id="header_cart" href="'. esc_url( wc_get_cart_url() ) .'"><i class="fa fa-shopping-cart"></i><span>'. $woocommerce->cart->cart_contents_count .'</span></a>';
        ?>
      </div>
        <?php  
          } else {
          echo esc_html_e('Please install / activate WooCommerce plugin or disable the Cart Icon via Theme Options > Header > Menu > Cart Icon > Off.', 'avas');
          } 
          endif;
  }
endif;


/* ---------------------------------------------------------
   Favicon
------------------------------------------------------------ */
if( !function_exists('bddex_favicon') ) {
    function bddex_favicon() {
      global $bddex;
        if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
         if($bddex['bddex-favicon'] != ''){     
          echo '<link rel="shortcut icon" href="' . wp_kses_post($bddex['bddex-favicon']['url']) . '"/>';
        } else {
          echo '<link rel="shortcut icon" href="' . THEME_DIR . '/assets/img/icon.png"/>';
        }
      }
    }
  }

/* ---------------------------------------------------------
  Logo
------------------------------------------------------------ */
if(!function_exists('bddex_logo')) :
  add_action( 'bddex_logo', 'bddex_logo' );
  function bddex_logo() { 
    global $bddex; 
    ?>
    <div class="navbar-header">
      <div id="bddex-hamburger" class="bddex-hamburger"><span></span></div>
        <?php 
          if ( class_exists( 'ReduxFramework' ) ) {
            if (isset($bddex['bddex_logo']['url']) && ($bddex['bddex_logo']['url'] != "" )) : ?>
            <a class="navbar-brand bddex_logo" href="<?php echo esc_url(get_site_url()); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>"><img src="<?php echo esc_url($bddex['bddex_logo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" /></a> 
          <?php endif; 
          } 
            // custom logo
            elseif(has_custom_logo()) {
              $custom_logo_id = get_theme_mod( 'custom_logo' );
              $custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
            echo '<a class="navbar-brand bddex_logo" href="'.esc_url(get_site_url()).'"><img src="' . esc_url( $custom_logo_url ) . '" alt="' . get_bloginfo( 'name' ) . '"></a>';
            } else {
            echo '<a class="navbar-brand bddex_logo" href="'.esc_url(get_site_url()).'"><h1>'. get_bloginfo( 'name' ) .'</h1></a>';
            }
          
        ?>

        <!-- sticky logo -->
        <?php if (isset($bddex['bddex_sticky_logo']['url']) && ($bddex['bddex_sticky_logo']['url'] != "" )) : ?>
          <a class="navbar-brand bddex_sticky_logo" href="<?php echo esc_url(get_site_url()); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>"><img src="<?php echo esc_url($bddex['bddex_sticky_logo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" /></a> 
        <?php endif; ?>
    </div> 
<?php  }
endif;


/* ---------------------------------------------------------
  Sticky Header
------------------------------------------------------------ */
if(!function_exists('bddex_sticky_header')) :

  function bddex_sticky_header() {
    global $bddex;

    if ($bddex['sticky_header'] == '1') {
      echo '';
    }

    if ($bddex['sticky_header'] == '0') {
      echo 'no-sticky';
    }
    

  }

endif;

/* ---------------------------------------------------------
   EOF
------------------------------------------------------------ */