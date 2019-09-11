<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com/
*
* Template Name: Blog - 2 Cols Right Sidebar
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
		<?php bddex_content_page(); ?>
		<div class="col-md-8">
			<?php $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
			global $bddex;
		  	$args = array(
		      'post_type' => 'post',
		      'posts_per_page' => $bddex['blog-posts-per-page'],
		      'paged' => $paged
		    );

			$query = new WP_Query( $args ); ?>
			<?php if ( $query->have_posts() ) : ?>

  	 		<!-- the loop -->
		<?php while ( $query->have_posts() ) : $query->the_post(); ?>
		<div class="col-lg-6 col-md-6 col-xs-12 blog-cols">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
					<div class="zoom-thumb">
						<a href="<?php the_permalink(); ?>" rel="bookmark">
						<?php if (has_post_thumbnail()) : 
						the_post_thumbnail('bddex-blog-two-img'); 
						endif; 
						?>
						</a>
					</div>
					<div class="details-box">
                    <?php bddex_date(); ?>
                        <h5 class="post-title">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
                        <?php the_title(); ?>
                        </a></h5>
                        <?php if ('post' == get_post_type()) : ?>
                    <div class="entry-meta">
                    <?php bddex_category(); ?>
                    <?php bddex_comments(); ?>
                    <?php echo bddex_getPostViews(get_the_ID()); ?>
                    </div>
                    <?php endif; ?><!-- .entry-meta -->
                        <?php echo bddex_excerpt(20); ?>

                <div class="clearfix"></div>
                <footer class="entry-footer">       
                    <a href="<?php the_permalink(); ?>" class="read-more"><?php echo esc_html__( 'Read More', 'avas' ); ?></a>
                </footer>    
                </div>
			</article>	
		</div> <!-- end cols -->
		<?php endwhile; ?><!-- end of the loop -->
			
		
		<?php wp_reset_postdata(); ?>
		<div class="clearfix"></div>
		<!-- pagination here -->
		<?php bddex_pagination_number($query->max_num_pages,"",$paged); ?>
		<?php else:  ?>
    		<?php get_template_part('content', 'none'); ?>
  		<?php endif; ?>
		</div> <!-- end .col-md-8 -->

<?php get_sidebar(); ?>
<?php get_footer();