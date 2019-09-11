<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com/
*======================================================================
* Sidebar Menu
*======================================================================
*/
?>
<div id="side-menu-wrapper" class="side-menu">
    <a id="side-menu-icon-close" class="s-menu-icon-close" href="#"><i class="fa fa-times"></i></a>
<?php 
   if (has_nav_menu('side_menu')) :
     wp_nav_menu(array(
                'theme_location' => 'side_menu',
                'menu_id' => 'side_menu',
                'menu_class' => 'side-menus',
                ));
    endif;

if (is_active_sidebar('side-menu-widget')) : ?>
    <div class="side_menu_widget" role="complementary">
        <?php dynamic_sidebar('side-menu-widget'); ?>
    </div>
<?php endif; ?>

</div>

