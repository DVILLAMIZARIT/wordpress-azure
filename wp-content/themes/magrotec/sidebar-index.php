<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com/
* ============================
*     Index  Right Sidebar
* ============================
*/

	if (is_active_sidebar('sidebar-right')) : ?>

	<div id="secondary" class="widget-area col-md-4 col-lg-4 col-sm-12" role="complementary">
        <?php dynamic_sidebar('sidebar-right'); ?>
	</div><!-- #secondary -->

	<?php endif; ?>
</div> <!-- /.row -->
</div> <!-- /.content -->