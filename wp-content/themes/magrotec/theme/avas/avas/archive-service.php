<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com/
*
* Archvie Services
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

		<?php
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		$args = array(
		      'post_type' => 'service',
		      'posts_per_page' => $bddex['service-per-page'],
		      'paged' => $paged
		    );

		$query = new WP_Query( $args ); ?>
		<?php if ( $query->have_posts() ) : ?>
	  	<!-- the loop -->
	  	<div class="service">
		<?php while ( $query->have_posts() ) : $query->the_post(); ?>
			<div class="col-lg-4 col-md-4 col-sm-6 item">
				<figure class="zoom-thumb">
					<?php if (has_post_thumbnail()) : ?>
					<a href="<?php the_permalink(); ?>" rel="bookmark">
					<?php the_post_thumbnail('bddex-service'); ?>
					</a>
					<?php endif; ?>
				</figure>
				<figcaption>
				<?php if($bddex['service-button-text'] != '') : ?>
					<a href="<?php the_permalink(); ?>" rel="bookmark" class="button"><?php printf(esc_html__('%s', 'avas'), $bddex['service-button-text']); ?></a>
				<?php endif; ?>	
				</figcaption>
				<div class="details">
				<h3><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
				<?php echo bddex_excerpt(25); ?>
				</div>
			</div>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
		</div> <!-- end loop -->

		<div class="clearfix"></div>

		<!-- pagination -->
    	<?php bddex_pagination_number($query->max_num_pages,"",$paged); ?>

   		<?php else : ?>
			<?php get_template_part('content', 'none'); ?>
		<?php endif; ?>
	</div> <!-- end row -->
</div> <!-- end container -->

<?php get_footer( ); ?>