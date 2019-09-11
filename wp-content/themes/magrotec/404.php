<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com/
*
* ============================
*        404 Error page
* ============================
*
*/


global $bddex;

get_header(); 



?>

<div class="container space-single">
	<div class="row">
	<article>
		<div class="error-404">
			<h1><?php esc_html_e('404', 'avas'); ?></h1>	
			<h4><?php esc_html_e('OOPS! SOMETHING WENT WRONG' , 'avas'); ?></h4>
			<p><?php esc_html_e('The page you are looking for doesn\'t exist.', 'avas'); ?></p>
		</div>
	</article>
	</div>
</div>

<?php get_footer();