<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com
*
* Portfolio archives
*
*/

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct access denied.' );

}
global $bddex;
?>

<?php
get_header(); 
bddex_sub_header();?>
<div class="container space-content">
	<div class="row">
<?php
 $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
global $bddex;
  $portfolio_args = array(
      'post_type' => 'portfolio-item',
      'posts_per_page' => $bddex['portfolio-per-page'],
      'paged' => $paged
    );

  $query = new WP_Query( $portfolio_args ); ?>

  <?php if ( $query->have_posts() ) : ?>
  	 <!-- the loop -->
  	 <div class="portfolio-items space-50">
		
<?php while ( $query->have_posts() ) : $query->the_post(); ?>

			<div class="portfolio-item col-lg-3 col-md-6">
				<figure>
					<a href="<?php the_permalink(); ?>" rel="bookmark">
					<?php the_post_thumbnail('bddex_thumb_4box'); ?>		
					</a>	
					<figcaption>
						<h4><?php the_title(); ?></h4>
						<?php  
						if (!empty($bddex['portfolio-button-text'])) { ?>
						<a href="<?php the_permalink(); ?>" rel="bookmark" class="button details">
						<?php echo esc_html($bddex['portfolio-button-text']); ?>
						</a> 
						<?php } ?>
					</figcaption>
				</figure>
			</div>				
	<?php endwhile; ?>
		
 	</div>	
 			<?php wp_reset_postdata(); ?>
 			<div class="clearfix"></div>
	<!-- pagination here -->
    <?php bddex_pagination_number($query->max_num_pages,"",$paged); ?>
	


	<?php else:  ?>
    <?php get_template_part('content', 'none'); ?>
  <?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>
