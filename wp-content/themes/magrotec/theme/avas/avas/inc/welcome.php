<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com
*
* Welcome Screen
*
*/


if(!class_exists('BDDEX_Welcome_Screen')) {
  class BDDEX_Welcome_Screen {
    public $is_activated;
    function __construct() {
      $this->bddex_init();
    }

    public function bddex_init() {
      $this->is_activated = get_option('is_valid');
      add_action('admin_menu', array($this, 'bddex_welcome_menu'));
      add_action('admin_init', array($this, 'bddex_theme_redirect'));
    }

    public function bddex_welcome_menu() {
      call_user_func('add_'. 'menu' .'_page', 'Welcome Menu', 'Avas', 'edit_posts', 'Welcome', array($this, 'bddex_welcome_msg'), null, 60);
    }

    public function bddex_welcome_msg() { 

    ?>

      <div class="bddex-wel-wrap">
        <h1><?php esc_html_e( 'Welcome to Avas', 'avas'); ?></h1>
        <div class="bddex-wel-txt">
          <?php echo '<p>'.wp_kses_post('Thanks for choosing Avas theme. This theme requires the following plugins installed: <strong>Avas Core, Redux Framework, Elementor.</strong>','avas').'</p>'; ?>
          <h3><a class="button-primary" href="<?php echo esc_url(admin_url('admin.php?page=avas-install-plugins')); ?>"><?php esc_html_e('Manage Plugins','avas'); ?></a></h3>
          
      	  <?php echo '<p>'.wp_kses_post('After install and activate required plugins please go to <a href="'.esc_url(admin_url('admin.php?page=Avas')).'">Theme Opations</a> > License > Register license to unlcok all demo.','avas').'</p>'; ?>	
         
          <?php echo '<p>'.wp_kses_post('For more information about how to install theme and import demo please check our documentation <a href="'.esc_url('https://x-theme.com/doc-avas/').'" target="_blank">here.</a>','avas').'</p>'; ?>

          <?php echo '<p>'.wp_kses_post('For any issue please contact us via our Themeforest sale page support section <a href="'.esc_url('https://themeforest.net/item/avas-multi-purpose-responsive-wordpress-theme/19775390/support').'" target="_blank">here.</a>','avas').'</p>'; ?>
        </div>
      </div>
    <?php
        }
  
    public function bddex_theme_redirect() {
      global $pagenow;
      if ( is_admin() && isset( $_GET['activated'] ) && 'themes.php' == $pagenow ) {
        wp_redirect(admin_url('admin.php?page=Welcome')); 
      }
    }

  }

  new BDDEX_Welcome_Screen();
}

