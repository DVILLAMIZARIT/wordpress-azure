<?php

    // Exit if accessed directly
    if ( ! defined( 'ABSPATH' ) ) {
        exit;
    }

    // Don't duplicate me!
    if ( ! class_exists( 'ReduxFramework_extension_tlm' ) ) {


        /**
         * Main ReduxFramework tlm extension class
         *
         * @since       3.1.6
         */
        class ReduxFramework_extension_tlm {

            // Protected vars
            protected $parent;
            public $extension_url;
            public $extension_dir;
            public static $theInstance;
            public static $version = "1.0";

            /**
             * Class Constructor. Defines the args for the extensions class
             *
             * @since       1.0.0
             * @access      public
             *
             * @param       array $sections   Panel sections.
             * @param       array $args       Class constructor arguments.
             * @param       array $extra_tabs Extra panel tabs.
             *
             * @return      void
             */
            public function __construct( $parent ) {

                $this->theme_name = 'Avas'; // Theme name

                $this->trial_period_limit = -1; // Theme trial period. Set -1 if you need to disable trial period.

                $this->path_verify_file = 'https://x-theme.com/vapi/index.php'; // Processing file url 

                $this->extension_url = AVAS_PLUGIN_URL . '/inc/extensions/tlm/'; // Extention url

                $this->parent = $parent;

                $this->field_name = 'tlm';

                self::$theInstance = $this;

                $this->add_section();

                add_filter( 'redux/' . $this->parent->args['opt_name'] . '/field/class/' . $this->field_name, array( &$this, 'overload_field_path' ) ); // Adds the local field

                add_action( "admin_footer", array( $this, "start_verification" ) ); // First verification

                add_action( "wp_ajax_current_theme_verification", array( $this, "current_theme_verification" ) ); // Ajax verification

                add_action( 'admin_notices', array( $this, "dev_check_current_screen" ) ); // Check current screen
            }

            /**
             * Adds the appropriate mime types to WordPress
             *
             * @param array $existing_mimes
             *
             * @return array
             */
            function custom_upload_mimes( $existing_mimes = array() ) {
                $existing_mimes['redux'] = 'application/redux';

                return $existing_mimes;
            }

            // Adds new section to redux Theme options
            public function add_section() {

                $whitelist = array( '127.0.0.1', '::1' );
                if (!in_array( $_SERVER['REMOTE_ADDR'], $whitelist)) {
                    $this->parent->sections[] = array(
                        'id'         => 'tlm',
                        'title'      => esc_html__( 'License', 'avas-core' ),
                        'heading'    => '',
                        'icon'       => 'el-lock-alt',
                        'icon_class' => 'el-icon-large',
                        'class'      => 'redux-tlm-class',
                        'customizer' => false,
                        'fields'     => array(
                            array(
                                'id'         => 'redux_tlm',
                                'type'       => 'tlm',
                                'full_width' => true,
                            ),
                            array(
                                'id'    => 'verification_status',
                                'type'  => 'info',
                                'style' => 'warning',
                                'desc'  => esc_html__('The license is not verified.', 'avas-core')
                            ),
                        ),
                    );
                }

                $trial_period = $this->trial_period();
                $trial_period_limit = $this->trial_period_limit;
                if ($trial_period > $trial_period_limit && !get_option( 'enable_full_version' )) {
                    $this->parent->args['allow_sub_menu'] = false;
                }
            }

            // Forces the use of the embeded field path vs what the core typically would use
            public function overload_field_path( $field ) {
                return dirname( __FILE__ ) . '/' . $this->field_name . '/field_' . $this->field_name . '.php';
            }

            // Starting verification and showing modal window
            public function start_verification(){
                $whitelist = array( '127.0.0.1', '::1' );
                if( !in_array( $_SERVER['REMOTE_ADDR'], $whitelist) ){
                    if (!get_option( 'trial_period' )) {
                        update_option( 'trial_period', date("Y-m-d"));
                    }
                    if (get_option( 'enable_full_version' )) {
                        $content = esc_html__('The license is verified.','avas-core');
                    }else{
                        $content = esc_html__('The license is not verified.','avas-core');
                    }
                    echo "<script> jQuery('#info-verification_status p').html('$content'); jQuery('#info-verification_status').show('fast'); </script>";
                    if (get_option( 'enable_full_version' )) {
                        echo "<script> setTimeout(function(){jQuery('#validation_activate').click();},3000); </script>";
                    }
                    $trial_period = $this->trial_period();
                    $trial_period_limit = $this->trial_period_limit;
                    if ($trial_period <= $trial_period_limit) {
                        if ($trial_period == $trial_period_limit) {
                            $count = __('last', 'avas-core');
                        }else{
                            $count = $trial_period_limit-$trial_period;
                        }
                        $popup_content = __('Dear customer, thank you for using '.$this->theme_name.' theme! Please enter purchase code to register your copy. <br/><b>'.$count.' day(s)</b>  trial period left. <br/><p align="center"><a href="https://youtu.be/lvgylymAPgc" target="_blank">how to obtain purchase code?</a></p>','avas-core');
                    }else{
                        $popup_content = __('Dear customer, please register to proceed using '.$this->theme_name.' theme. <br/><p align="center"><a href="https://youtu.be/lvgylymAPgc" target="_blank">How to obtain purchase code?</a></p>','avas-core');
                        if (!get_option( 'enable_full_version' )) {
                            echo "<script>  
                                jQuery('.redux-group-tab-link-li').hide(); 
                                jQuery('.redux-group-tab-link-li.redux-tlm-class').show().addClass('active');
                                setTimeout(function(){
                                    jQuery('.redux-group-tab').hide();
                                    jQuery('.redux-group-tab.redux-tlm-class').show();
                                }, 500);
                              </script>";
                        }
                    }
                    if ($this->parent->args['page_slug'] == $this->dev_check_current_screen() && !get_option( 'enable_full_version' )) {
                        echo    '<div class="popup-license" data-remodal-id="popup_license" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
                                  <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
                                  <div>
                                    <h2 id="modal1Title">'.__('Theme registration','avas-core').'</h2>
                                    <p id="modal1Desc">'.
                                      $popup_content
                                    .'</p>
                                  </div>
                                  <br>
                                  <button data-remodal-action="confirm" class="remodal-confirm">'.__('Register now','avas-core').'</button>
                                  <button data-remodal-action="cancel" class="remodal-cancel">'.__('Remind me later','avas-core').'</button>
                                </div>';
                        echo '<script type="text/javascript" src="'. $this->extension_url . '/tlm/remodal.js"></script>';
                        echo "<script> var inst = jQuery('[data-remodal-id=popup_license]').remodal(); setTimeout(function(){ inst.open(); }, 2500); </script>";
                    }
                }
            }

            // Ajax function for theme verification
            public function current_theme_verification() {

                $this->parent->get_options();
                $options = $this->parent->options;

                if($_POST['purchase_code'] !== $options['tlm']){
                    echo __('Could you save the changes at first.', 'avas-core');
                }else{
                    if (function_exists('curl_version')) {
                        $code_to_verify = $options['tlm'];
                        $verify = $_POST['verify']; 
                        $path = $_SERVER['HTTP_HOST'];
                        $agent = base64_encode($_SERVER['HTTP_USER_AGENT']);
                        $email = wp_get_current_user()->data->user_email;
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL,  $this->path_verify_file.'?p_code='.$code_to_verify.'&path='.$path.'&email='.$email.'&removed_status='.$verify.'&agent='.$agent);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        $output = json_decode(curl_exec($ch), true);
                        curl_close($ch);
                        if (is_null($output['result'])) {
                            $content = __('Something wrong. Could you try register the purchase code later.', 'avas-core');
                        }elseif ($output['result'] == 'access_success') {
                            $content = __('Dear '.$output['user'].', the theme was successfully activated. Please refresh the page once. Please ignore this message if you already refresh the page and see all the options.', 'avas-core');
                            if (!get_option('enable_full_version')) {
                              update_option( 'enable_full_version', 1);
                            }
                        }elseif($output['result'] == 'access_denied'){
                            if ($output['reason'] == 'wrong_p_code') {
                                $content = __('The purcahase code is wrong.', 'avas-core');
                                update_option( 'enable_full_version', 0);
                            }elseif ($output['reason'] == 'code_registered') {
                                $content = __('The purchase code already has been registered. Could you deregister purchase code on the another domain and try again.', 'avas-core');
                                update_option( 'enable_full_version', 0);
                            }elseif ($output['reason'] == 'db_error') {
                                $content = __('Something wrong. Could you try register the purchase code later.', 'avas-core');
                            }
                        }elseif($output['result'] == 'remove_success'){
                            $content = __('Dear '.$output['user'].', the theme was successfully deactivated. Thank you.', 'avas-core');
                            update_option( 'enable_full_version', 0);
                        }
                    }else{
                        $content = __('Please enable Curl on your hosting server. It is necessary for license verification.', 'avas-core');
                    }
                    echo $content;
                }
                die();
            }

            // Function return a difference between trial period and date of registration
            public function trial_period(){
                $datetime1 = new DateTime(get_option( 'trial_period' ));
                $datetime2 = new DateTime(date("Y-m-d"));
                $interval = round(($datetime2->format('U') - $datetime1->format('U')) / (60*60*24));
                return $interval;
            }

            // Function return current page slug
            public function dev_check_current_screen() {
              if( !is_admin() ) return;
              
              global $current_screen;
              
              return $current_screen->parent_base;
            }

        }
    }
