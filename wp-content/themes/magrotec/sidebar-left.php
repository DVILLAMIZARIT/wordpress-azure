<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com/
* ============================
*       Left Sidebar
* ============================
*/

	if (is_active_sidebar('sidebar-left')) : ?>
    <div id="secondary" class="widget-area col-md-4 col-lg-4" role="complementary">
        <?php dynamic_sidebar('sidebar-left'); ?>
	</div><!-- #secondary -->
	<?php endif; ?>

