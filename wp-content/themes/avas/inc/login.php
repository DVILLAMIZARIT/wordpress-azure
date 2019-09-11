<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com/
*
*/

function bddex_ajax_login_init(){
global $wp;
    wp_register_script('ajax-login-script', get_template_directory_uri() . '/assets/js/main.min.js', array('jquery'),THEME_VERSION, true ); 
    wp_enqueue_script('ajax-login-script');
    wp_localize_script( 'ajax-login-script', 'ajax_login_object', array( 
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'redirecturl' =>  home_url(add_query_arg(array(),$wp->request)),
       // 'redirecturl' => $_SERVER['REQUEST_URI'],
        'loadingmessage' => esc_html__('Sending user info, please wait...','avas')
    ));
    // Enable the user with no privileges to run ajax_login() in AJAX
    add_action( 'wp_ajax_nopriv_ajaxlogin', 'bddex_ajax_login' );
}
// Execute the action only if the user isn't logged in
if (!is_user_logged_in()) {
    add_action('init', 'bddex_ajax_login_init');
}
function bddex_ajax_login(){
    // First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-login-nonce', 'security' );
    // Nonce is checked, get the POST data and sign user on
    $info = array();
    $info['user_login'] = sanitize_text_field($_POST['username']);
    $info['user_password'] = sanitize_text_field($_POST['password']);
    $info['remember'] = true;
   // $user_signon = wp_signon( $info, false );
    $user_signon = wp_signon($info);
    if ( is_wp_error($user_signon) ){
        echo json_encode(array('loggedin'=>false, 'message'=>esc_html__('Wrong username or password.','avas')));
    } else {
        echo json_encode(array('loggedin'=>true, 'message'=>esc_html__('Login successful, redirecting...','avas')));
    }
    wp_die();
}
                function bddex_login_register() {
                    global $bddex;
                    if (is_user_logged_in()) { ?>
                        <a class="login_button" href="<?php echo wp_logout_url( home_url() ); ?>"><?php esc_html_e('Logout', 'avas'); ?></a>
                    <?php } else { ?>
                        <a class="login_button" id="show_login" href=""><?php echo esc_html_e($bddex['login-register'],'avas'); ?></a>
                    <?php } ?>
                    <form id="login" class="bddex_login_register" action="login" method="post">
                        <h2><?php esc_html_e( 'Login', 'avas' ); ?></h2>
                        <p class="status"></p>
                        <div>
                            <div class="space-20">
                            <input id="username" type="text" name="username" placeholder="Username">
                            </div>
                        </div>
                        <div>
                            <div class="space-20">
                        <input id="password" type="password" name="password" placeholder="Password">
                            </div>
                        </div>
                        <a class="lost bddex_lost" href="<?php echo wp_lostpassword_url(); ?>"><?php esc_html_e( 'Lost your password?', 'avas' ); ?></a>
                        <input class="submit_button" type="submit" value="Login" name="submit">
                        <a class="close bddex_close" href="#"><i class="fa fa-window-close"></i></a>
                        <?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
                        <div class="clearfix"></div>
                        <div class="no_acc">
                            <?php esc_html_e('Don\'t have an account?','avas'); ?>
                        <a href="<?php echo wp_kses_post($bddex['signup-text']); ?>"><?php esc_html_e('Sign Up','avas'); ?></a>
                        </div>
                    </form>
<?php }