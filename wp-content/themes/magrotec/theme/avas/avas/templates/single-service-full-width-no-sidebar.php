<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com/
*
* Template Name: Full Width No Sidebar
* Template Post Type: service
*
*/
global $bddex;
get_header();
if ($bddex['sub-header-switch']) {
    bddex_sub_header();
}
?>
<div class="container space-content">
    <div class="row">	
        <?php if (have_posts()): while (have_posts()): the_post(); ?>

		<div class="col-lg-12 col-sm-12">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('bddex-service-large'); ?>
            <?php endif; ?>
			
		</div>
        <div class="service-separate"></div>
        <div class="col-lg-12 col-sm-12">
            <div class="service-content">
                <?php the_content(); ?>
            </div>
        </div>
        <?php wp_reset_postdata(); ?>
        <?php endwhile; ?>
        <?php endif; ?><!-- End left part -->
        <?php  bddex_pagination(); ?> <!-- pagination -->
    </div> <!-- end row -->

</div> <!-- end container -->
<?php //bddex_get_quote(); ?> <!-- get quote bar -->

<?php get_footer(); ?>
