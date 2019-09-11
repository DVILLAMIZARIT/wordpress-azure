<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com/
* ============================
*       Right Sidebar
* ============================
*/
global $bddex;

	if (is_active_sidebar('sidebar-right')) :
	if ( class_exists( 'ReduxFramework' ) ) :	
	if($bddex['sidebar-select'] == 'sidebar-right') : ?>	
		<div id="secondary" class="widget-area col-md-4 col-sm-12" role="complementary">
	        <?php dynamic_sidebar('sidebar-right'); ?>
		</div><!-- #secondary -->
	<?php endif; ?>
	<?php endif; ?>
	<?php endif; ?>
</div> <!-- /.row -->
</div> <!-- /.content -->