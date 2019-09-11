<?php
/**
*
* @package bddex
* @author theme-x
* @link https://x-theme.com
* ============================
*  Woocommerce Right Sidebar
* ============================
*/

	if (is_active_sidebar('sidebar-woo-right')) : ?>

	<div id="secondary" class="widget-area col-md-3 col-sm-12" role="complementary">
        <?php dynamic_sidebar('sidebar-woo-right'); ?>
	</div><!-- #secondary -->

	<?php endif; ?>
</div>
</div>