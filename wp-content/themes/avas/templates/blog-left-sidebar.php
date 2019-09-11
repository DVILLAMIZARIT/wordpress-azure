<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com/
*
* Template Name: Blog - Left Sidebar
*
*/
get_header(); 
if ($bddex['sub-header-switch']) {
    bddex_sub_header();
}
?>
<div class="container space-content">
	<div class="row">
		<?php bddex_content_page(); ?>
		<?php get_sidebar('left'); ?> <!-- sidebar -->
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
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
			 	<header class="entry-header">
         		<?php the_title(sprintf('<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h1>'); ?>
           		 <?php if ('post' == get_post_type()) : ?>
                <div class="entry-meta">
                    <?php bddex_date(); ?>
                    <?php bddex_author(); ?>
                    <?php bddex_comments(); ?>
                    <?php echo bddex_getPostViews(get_the_ID()); ?>
                    <?php do_action('bddex_social_share_header'); ?>
                </div><!-- .entry-meta -->
            	<?php endif; ?>
       			</header><!-- .entry-header -->
       				<div class="zoom-thumb">
						<?php if (has_post_thumbnail()) :  ?>
						<a href="<?php the_permalink(); ?>" rel="bookmark">
						<?php the_post_thumbnail('bddex-large-img'); ?>
						</a>
						<?php endif; ?>
					</div>	
					<div class="post-excerpts"><?php echo bddex_excerpt(150); ?></div>
			<div class="clearfix"></div>
			<footer class="entry-footer">
	        <?php bddex_category(); ?>
	        <?php bddex_tags(); ?>
   			 </footer><!-- .entry-footer -->
    		</article>
			<?php endwhile; ?><!-- end of the loop -->
		<!-- pagination here -->
		<?php bddex_pagination_number($query->max_num_pages,"",$paged); ?>
		<?php wp_reset_postdata(); ?>
		<div class="clearfix"></div>
		<?php else:  ?>
    		<?php get_template_part('content', 'none'); ?>
  		<?php endif; ?>
		</div> <!-- end col -->
	</div> <!-- .row -->
</div> <!-- .container -->	
<?php get_footer();