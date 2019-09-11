<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com/
*
* Template Name: Shop - Right Sidebar
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
    <div id="primary" class="col-md-9" >          
      <?php    
      $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
      $args = array(
      'post_type' => 'product',
      'posts_per_page' => $bddex['woo-product-per-page'],
      'paged' => $paged
      );
      $query = new WP_Query( $args ); ?>
      <?php if ( $query->have_posts() ) : ?>
      <!-- the loop -->
      <ul class="woocom">
      <?php while ( $query->have_posts() ) : $query->the_post(); ?>
      <?php wc_get_template_part( 'content', 'product' ); ?>
      <?php endwhile; ?>
      </ul> <!-- end loop -->
      <?php wp_reset_postdata(); ?>
      <div class="clearfix"></div>
      <!-- pagination -->
      <?php  bddex_pagination_number($query->max_num_pages,"",$paged); ?>
      <?php else:  ?>
      <?php get_template_part('content', 'none'); ?>
      <?php endif; ?>
    </div><!-- end #primary -->
<?php get_sidebar('woo'); ?> <!-- sidebar -->
<?php get_footer(); ?>