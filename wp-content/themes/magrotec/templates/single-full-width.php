<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com/
*
* Template Name: Full Width Image
* Template Post Type: post
*
*/
get_header();
if ($bddex['sub-header-switch']) {
    bddex_sub_header();
} 
bddex_setPostViews(get_the_ID());
global $post;
$img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'bddex-extra-large-img');
$img_src = (!empty($img) && is_array($img)) ? ' style="background-image:url('.esc_url($img[0]).');"':'';
$gallery = get_post_meta($post->ID, 'bddex_gallery_id', true);
?>


	<?php if (have_posts()): while (have_posts()): the_post(); ?>
		<div class="row">
		<?php if ( has_post_format('gallery') ) {
       	 	if($gallery) { ?>
        	<div class="flexslider">
                <ul class="slides">
                <?php         
                $images = get_post_meta($post->ID, 'bddex_gallery_id', true);  
                if($images) :
                foreach ($images as $image) {
                $gallery = wp_get_attachment_link($image, 'bddex-extra-large-img');
                    echo '<li>';                
                    echo  wp_kses_post($gallery); // no need to escape
                    echo '</li>';  
                }
                endif;
                ?>
                </ul>
            </div><!-- slider end -->
        <?php }else{ ?>
			<?php if (has_post_thumbnail()) : ?>
            <div class="large-featured col-md-12" <?php echo wp_kses_post($img_src); ?>></div>
            <?php endif; } }else{ ?>
        	<?php if (has_post_thumbnail()) : ?>
            <div class="large-featured col-md-12" <?php echo wp_kses_post($img_src); ?>></div>
        <?php endif; } ?>
		</div><!-- /.row -->
		<div class="container">
			<div class="row">
		<div class="title-mag">
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
		</div><!-- /.title-mag -->
    	<?php 
	        if($bddex['sidebar-select'] == 'sidebar-left') :
	        get_sidebar('left');
	        endif;
    	?>
   		<div id="primary" class="col-md-<?php echo bddex_sidebar_no_sidebar(); ?> space-content-bottom">
        <main id="main" class="site-main">
            
                <?php
			        if ( is_home () || is_category() || is_archive() ) {
			        the_excerpt('');
			        } else {
			        /* translators: %s: Name of current post */
			        the_content(sprintf(
			                        esc_attr__('Read more %s &rarr;', 'avas'), the_title('<span class="screen-reader-text">"', '"</span>', false)
			        ));
			        }
			    ?>
			    <div class="clearfix"></div>
			    <footer class="entry-footer">
			        <?php bddex_category(); ?>
			        <?php bddex_tags(); ?>
			    </footer><!-- .entry-footer -->
			    <?php
			        if ( is_home () || is_category() || is_archive() ) {
			        
			        } else {
			            
			               do_action('bddex_social_share_footer'); 
			            
			    } ?>
                <?php if($bddex['social-share-footer']) : 
                      do_action('bddex_social_share'); 
                      endif; 
                ?><!-- social share on footer -->
                <?php 
                if ($bddex['related-posts']) :
                bddex_related_post(); 
                endif;
                ?> <!-- related posts -->
                <?php 
                    if (!post_password_required()) :
                       if ($bddex['author-bio']) {
                        bddex_author_bio(); 
                        } 
                    endif;    
                ?><!-- author bio -->
                <?php
                if ($bddex['comments-posts']) :
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                endif;
                ?> <!-- comments -->
                 <!--BEGIN .author-bio-->
            <?php do_action('bddex_pagination'); ?>
        </main><!-- #main -->

    	</div><!-- #primary -->

<?php endwhile; // end of the loop.  ?>
<?php endif; ?>
<?php  
get_sidebar();
get_footer();