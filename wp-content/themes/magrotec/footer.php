<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com/
*
* ============================
*         Footer
* ============================
*/
global $bddex;
$footer_cols = $bddex['footer_cols'];
?>
<div class="footer">
<?php
if (is_active_sidebar('footer-one') || is_active_sidebar('footer-two') || is_active_sidebar('footer-three') || is_active_sidebar('footer-four') ) {
?>  
    <?php 
    if ( class_exists( 'ReduxFramework' ) ) {
    if($bddex['footer_top']): ?>
    <div id="footer-top" class="footer_bg">
        <div class="container<?php echo bddex_footer_width(); ?>"> 
            <!-- <div class="row"> -->
                <div class="col-lg-<?php echo esc_attr($footer_cols); ?> col-sm-6">
                    <?php dynamic_sidebar('footer-one'); ?>
                </div>
                <div class="col-lg-<?php echo esc_attr($footer_cols); ?> col-sm-6">
                    <?php dynamic_sidebar('footer-two'); ?>
                </div>
                <div class="col-lg-<?php echo esc_attr($footer_cols); ?> col-sm-6">
                    <?php dynamic_sidebar('footer-three'); ?>
                </div>
                <div class="col-lg-<?php echo esc_attr($footer_cols); ?> col-sm-6">
                    <?php dynamic_sidebar('footer-four'); ?>
                </div>
            <!-- </div> --><!-- end of .row -->
        </div><!-- .container end-->
    </div>
    <?php endif; ?>
    <?php }else{ ?>
        <div id="footer-top" class="footer_bg">
        <div class="container<?php echo bddex_footer_width(); ?>"> 
            <!-- <div class="row"> -->
                <div class="col-lg-3 col-sm-6">
                    <?php dynamic_sidebar('footer-one'); ?>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <?php dynamic_sidebar('footer-two'); ?>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <?php dynamic_sidebar('footer-three'); ?>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <?php dynamic_sidebar('footer-four'); ?>
                </div>
            <!-- </div> --><!-- end of .row -->
        </div><!-- .container end-->
    </div>
    <?php } ?>
<?php } ?>
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <div class="copyright">
                    <?php  if ( class_exists( 'ReduxFramework' ) ) { ?>
                        <p><?php echo wp_kses_post($bddex['copyright']) ?></p>
                    <?php }else{ ?>
                        <p>Copryright &copy; <?php echo date("Y"); ?>, By <a href="https://themeforest.net/user/theme-x">theme-x</a> | All rights reserved.</p>
                    <?php }?>
                </div>
            </div>
            <!-- footer menu start -->
            <?php if($bddex['footer-menu'] == 1 )  : ?>
            <div class="col-md-6 col-xs-12">
            <?php
            if ( has_nav_menu( 'footer_menu' ) ) : 
                wp_nav_menu( array(
                'theme_location' => 'footer_menu',
                'menu_class'     => 'footer-menu',
                'depth'          => 1,
                ) );
            endif; ?>
            </div>
            <?php endif; ?>
            <?php 
            if ( class_exists( 'ReduxFramework' ) ) :
            if($bddex['footer-menu'] == 0 )  : ?>
            <div class="col-md-6 col-xs-12">
                <?php if ($bddex['social']) : ?>
                            <div class="social_media"> 
                                <?php 
                                if(function_exists('bddex_social_media')):
                                    echo bddex_social_media(); 
                                endif;
                                ?>
                            </div>
                <?php endif; ?>
            </div>
            <?php endif; ?> 
            <?php endif; ?> 
            <!-- footer menu end -->
        </div> <!-- .row end -->
    </div>  <!-- .container end-->
</footer>
<?php 
    if ( class_exists( 'ReduxFramework' ) ) :
    if($bddex['back_top']) : ?>
    <div id="back_top" class="back_top"><i class="fa fa-arrow-up"></i></div>
    <?php endif; ?>
    <?php endif; ?>
</div>
<?php wp_footer(); ?>
</div>
</div> 
</body>
</html>