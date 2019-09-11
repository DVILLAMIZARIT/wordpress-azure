<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com/
* ============================
*     Narrow  Right Sidebar
* ============================
*/

	if (is_active_sidebar('sidebar-right')) : ?>

	<div id="secondary" class="widget-area col-md-3 col-lg-3 col-sm-12" role="complementary">
        <?php dynamic_sidebar('sidebar-right'); ?>
	</div><!-- #secondary -->

	<?php endif; ?>
</div> <!-- /.row -->
</div> <!-- /.content -->