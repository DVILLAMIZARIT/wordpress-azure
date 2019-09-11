<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com/
*
*
*/

// Default sub header
function bddex_sub_header() { 
	global $bddex;
	$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');				 			
?>
	<div class="sub-header" <?php if(is_page()) { if (has_post_thumbnail()) : echo 'style="background-image:url('.$featured_img_url.')"'; endif; } ?> >
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					 <?php if($bddex['sub_h_title']): 
					 		if(is_singular('post') && $bddex['sub_h_post_title']['post'] == '1'){
					 			the_title('<h1 class="sub-header-title">', '</h1>');
					 		}
					 		if(is_category()) {
					 			single_cat_title('<h1 class="sub-header-title">', '</h1>');
					 		}
					 		if(is_tag()) {
					 			single_tag_title('<h1 class="sub-header-title">', '</h1>');
					 		}
					 		if(is_page() && $bddex['sub_h_post_title']['page'] == '1'){
					 			the_title('<h1 class="sub-header-title">', '</h1>');
					 		}
					 		if(is_singular('portfolio-item') && $bddex['sub_h_post_title']['portfolio'] == '1'){
					 			the_title('<h1 class="sub-header-title">', '</h1>');
					 		}
					 		if(is_post_type_archive('portfolio-item')) { 
								echo '<h1 class="sub-header-title">';
								post_type_archive_title();
								echo '</h1>';
							}
					 		if(is_singular('service') && $bddex['sub_h_post_title']['service'] == '1'){
					 			the_title('<h1 class="sub-header-title">', '</h1>');
					 		}
					 		if(is_post_type_archive('service')) { 
								echo '<h1 class="sub-header-title">';
								post_type_archive_title();
								echo '</h1>';
							}
					 		if(is_singular('team') && $bddex['sub_h_post_title']['team'] == '1'){
					 			the_title('<h1 class="sub-header-title">', '</h1>');
					 		}
					 		if(is_post_type_archive('team')) { 
								echo '<h1 class="sub-header-title">';
								post_type_archive_title();
								echo '</h1>';
							}
					 		if(is_post_type_archive('lp_course')) {
								echo '<h1 class="sub-header-title">';
								post_type_archive_title();
								echo '</h1>';
							}
							if(is_singular('lp_course')) {
								the_title('<h1 class="sub-header-title">', '</h1>');
							}

					endif;
					 ?>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12">
					<?php  
						  if($bddex['breadcrumbs']) : 
						  	if(is_singular('post') && $bddex['sub_h_post_breadcrumbs']['post'] == '1'){
					 			do_action('bddex_breadcrumbs');
					 		}
					 		if(is_category()) {
								do_action('bddex_breadcrumbs');
							}
							if(is_tag()) {
								do_action('bddex_breadcrumbs');
							}
					 		if(is_page() && $bddex['sub_h_post_breadcrumbs']['page'] == '1'){
					 			do_action('bddex_breadcrumbs');
					 		}
					 		if(is_singular('portfolio-item') && $bddex['sub_h_post_breadcrumbs']['portfolio'] == '1'){
					 			do_action('bddex_breadcrumbs');
					 		}
					 		if(is_post_type_archive('portfolio-item')) {
								do_action('bddex_breadcrumbs');
							}
					 		if(is_singular('service') && $bddex['sub_h_post_breadcrumbs']['service'] == '1'){
					 			do_action('bddex_breadcrumbs');
					 		}
					 		if(is_post_type_archive('service')) {
								do_action('bddex_breadcrumbs');
							}
					 		if(is_singular('team') && $bddex['sub_h_post_breadcrumbs']['team'] == '1'){
					 			do_action('bddex_breadcrumbs');
					 		}
					 		if(is_post_type_archive('team')) {
								do_action('bddex_breadcrumbs');
							}
							if(is_post_type_archive('lp_course')) {
								echo '<div class="breadcrumbs"><span class="breadcrumbs__current">' . esc_html__('All Courses','avas') . '</span></div>';
							}
							if(is_singular('lp_course')) {
								do_action('bddex_breadcrumbs');
							}

						  endif; 
					?>
				</div>	
			</div>
		</div>
	</div>			

<?php }




/* ---------------------------------------------------------
   EOF
------------------------------------------------------------ */ 