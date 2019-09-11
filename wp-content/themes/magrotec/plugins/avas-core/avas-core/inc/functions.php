<?php

/* ---------------------------------------------------------
  video embed for video post format
------------------------------------------------------------ */
if(!function_exists('bddex_post_video_link')) :
  function bddex_post_video_link() {
    global $post;
    $post_video_link = get_post_meta( $post->ID, 'post_link', true );
    if(!empty($post_video_link)) :
    global $wp_embed;
    $post_embed = $wp_embed->run_shortcode('[embed width="1140"]'.$post_video_link.'[/embed]');
    echo $post_embed;

    endif;
  }
endif;
/* ---------------------------------------------------------
  Remove Query Strings From Static Resources
------------------------------------------------------------ */
function bddex_remove_script_version( $src ) {
  $parts = explode( '?ver', $src );
        return $parts[0];
}
add_filter( 'script_loader_src', 'bddex_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', 'bddex_remove_script_version', 15, 1 );

/* ---------------------------------------------------------
  Title Limit
------------------------------------------------------------ */
function bddex_title($n) {
  global $post;
  $title = get_the_title($post->ID);
  $title = substr($title,0,$n);
  echo $title;
}

/* ---------------------------------------------------------
  Dynamic styles
------------------------------------------------------------ */
if ( !function_exists( 'bddex_custom_css' ) ) {
  add_action('wp_head', 'bddex_custom_css');
  function bddex_custom_css() {
    global $bddex;
    $custom_css = (!empty($bddex['custom_css']) ? ($bddex['custom_css']) : null);
    $custom_css_output = "<style type=\"text/css\">\n" . $custom_css . "\n</style>\n";
    if( !empty($custom_css) ) {
      echo $custom_css_output; 
    }

    $menu_border_top = ( ($bddex['menu_item_border']) ?  '.bddex-menu-list > ul > li > a:hover:before{opacity:1}' : null );
    $menu_item_hover_border = "<style type=\"text/css\">\n" . $menu_border_top . "\n</style>\n";
    if($bddex['menu_item_border'] == 1 ) {
      echo $menu_item_hover_border;
    }

    $top_head_top_spc = '#top_head{top:'.$bddex['top_head_top_space'].'px}';
    $main_head_top_spc = '#main_head{padding-top:'.$bddex['main_head_top_space'].'px}';
    $mobile_logo_height = '@media(max-width: 812px){.navbar-brand > img {max-height:'.$bddex['mobile-logo-height'].'px;}}';
    echo "<style type=\"text/css\">\n" . $top_head_top_spc . "\n" . $main_head_top_spc . "\n" . $mobile_logo_height . "\n</style>\n";

  }

}

/* ---------------------------------------------------------
  Dynamic scripts
------------------------------------------------------------ */
if ( !function_exists( 'bddex_custom_js_head' ) ) {
  add_action('wp_footer', 'bddex_custom_js');
  function bddex_custom_js_head() {
    global $bddex;
    $custom_js_head = (!empty($bddex['custom_js_head']) ? ($bddex['custom_js_head']) : null); 
    if( !empty($custom_js_head) ) {
      echo $custom_js_head; 
    }
  }
}
add_action('wp_head', 'bddex_custom_js_head');

if ( !function_exists( 'bddex_custom_js' ) ) {
  function bddex_custom_js() {
    global $bddex;
    $custom_js = (!empty($bddex['custom_js']) ? ($bddex['custom_js']) : null); 
    if( !empty($custom_js) ) {
      echo $custom_js; 
    }
  }
}


/* ---------------------------------------------------------
  redux extension
------------------------------------------------------------ */
$redux_opt_name = "bddex";

if ( !function_exists( 'bddex_redux_extension_loader' ) ) {
  function bddex_redux_extension_loader( $ReduxFramework ) {
    $path    = dirname( __FILE__ ) . '/extensions/';
    $folders = scandir( $path, 1 );
    foreach ( $folders as $folder ) {
      if ( $folder === '.' or $folder === '..' or ! is_dir( $path . $folder ) ) {
        continue;
      }
      $extension_class = 'ReduxFramework_Extension_' . $folder;
      if ( ! class_exists( $extension_class ) ) {
        // In case you wanted override your override, hah.
        $class_file = $path . $folder . '/extension_' . $folder . '.php';
        $class_file = apply_filters( 'redux/extension/' . $ReduxFramework->args['opt_name'] . '/' . $folder, $class_file );
        if ( $class_file ) {
          require_once $class_file;
        }
      }
      if ( ! isset( $ReduxFramework->extensions[ $folder ] ) ) {
        $ReduxFramework->extensions[ $folder ] = new $extension_class( $ReduxFramework );
      }
    }
  }
  // Modify {$redux_opt_name} to match your opt_name
  add_action( "redux/extensions/{$redux_opt_name}/before", 'bddex_redux_extension_loader', 0 );
}

/* ---------------------------------------------------------
  remove redux activation message
------------------------------------------------------------ */
add_action('admin_init', 'bddex_override_redux_message', 30);

function bddex_override_redux_message() {
    update_option( 'ReduxFrameworkPlugin_ACTIVATED_NOTICES', []);
}

/* ---------------------------------------------------------
  remove Elementor welcome screen after activate plugin
------------------------------------------------------------ */
add_action( 'admin_init', function() {
  if ( did_action( 'elementor/loaded' ) ) {
    remove_action( 'admin_init', [ \Elementor\Plugin::$instance->admin, 'maybe_redirect_to_getting_started' ] );
  }
}, 1 );

/* ---------------------------------------------------------
  remove redux welcome screen after activate plugin
------------------------------------------------------------ */
add_action( 'redux/construct', 'bddex_remove_as_plugin_flag' );
/**
Remove plugin flag from redux. Get rid of redirect
@since 1.0.0
*/
function bddex_remove_as_plugin_flag() {
ReduxFramework::$_as_plugin = false;
}

/* ---------------------------------------------------------
  remove Activate Demo Mode in pluigin
------------------------------------------------------------ */
function bddex_DemoModeLink() { 
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
    }
}
add_action('init', 'bddex_DemoModeLink');

/* ---------------------------------------------------------
  EOF
------------------------------------------------------------ */