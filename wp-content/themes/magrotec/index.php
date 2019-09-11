<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com/
*
* ============================
*         Index
* ============================
*
*/
global $bddex;
get_header();
?>
<div class="container space-single">
	<div class="row">
	    <div id="primary" class="col-md-8">
	        <main id="main" class="site-main">
	            <?php if (have_posts()) : ?>
	                <?php while (have_posts()) : the_post(); ?>
	                    <?php get_template_part('content', get_post_format()); ?>
	                <?php endwhile; ?>
	                <?php bddex_navigation(); ?>
	            <?php else : ?>
	                <?php get_template_part('content', 'none'); ?>
	            <?php endif; ?>
	        </main><!-- #main -->
	    </div><!-- #primary -->
<?php
get_sidebar('index'); 
get_footer(); 