<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com/
*
* archive team
*
*/
global $bddex;
get_header();
if ($bddex['sub-header-switch']) {
    bddex_sub_header();
}  
?>

<div class="container-fluid">
	<div class="row">
		
		<?php
		global $bddex;
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		$args = array(
	      'post_type' => 'team',
	      'posts_per_page' => $bddex['team-per-page'],
	      'paged' => $paged
	    );

		$query = new WP_Query( $args ); ?>
  		<?php if ( $query->have_posts() ) : ?>
  	 	
  		<div class="team">
		<?php while ( $query->have_posts() ) : $query->the_post(); ?>
			<div class="col-lg-15 col-xs-12 col-sm-6">
				<div class="row">
				<figure>
					<a href="<?php the_permalink(); ?>" rel="bookmark">
					<?php the_post_thumbnail('bddex-team-full'); ?>		
					</a>
					
					<figcaption>
						<h4><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
						<?php $team_cat = get_the_term_list( $post->ID,'team-category', '', '<br> ', '');
						if (!empty($team_cat)) echo '<p class="team-cat">', strip_tags($team_cat) ,'</p>'; ?>
						<div class="team-bio"><?php echo bddex_excerpt(20); ?></div>
						<ul class="team-social">
							<?php
							$team_fb = get_post_meta( $post->ID, 'team_fb', true );
							$team_tw = get_post_meta( $post->ID, 'team_tw', true );
							$team_gp = get_post_meta( $post->ID, 'team_gp', true );
							$team_ln = get_post_meta( $post->ID, 'team_ln', true );
							$team_in = get_post_meta( $post->ID, 'team_in', true );
							?>
							<li><a href="<?php echo esc_url($team_fb); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
							<li><a href="<?php echo esc_url($team_tw); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
							<li><a href="<?php echo esc_url($team_gp); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="<?php echo esc_url($team_ln); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="<?php echo esc_url($team_in); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
						</ul>
					</figcaption>
					</a>
				</figure>
				</div> <!-- end row -->
			</div>				
		<?php endwhile; ?>
 		</div>	<!-- end loop -->
 		
	 	<div class="clearfix"></div>
		<!-- pagination -->
	    
	    
		<?php wp_reset_postdata(); ?>

		<?php else:  ?>
	    <?php get_template_part('content', 'none'); ?>
	  	<?php endif; ?>
		<?php bddex_pagination_number($query->max_num_pages,"",$paged); ?>
	</div> <!-- end .row -->
</div> <!-- end .container -->

<?php get_footer(); ?>
