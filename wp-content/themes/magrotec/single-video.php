<?php
/**
 * 
 * @package bddex
 * @author theme-x
 * @link https://x-theme.com/
 *
 * ====================================
 *         Single Video
 * ====================================
 */
get_header();

if ($bddex['sub-header-switch']) {
    bddex_sub_header();
} 
?>
<div class="container-fluid">
<div class="row">
    <div class="video_post_section">
        <div class="video_post_link">
            <?php 
                if (function_exists('bddex_post_video_link')) :
                    bddex_post_video_link(); 
                endif;
            ?>
                
        </div>
    </div><!-- video post section -->
</div>
</div>
    <div class="container">
    <div class="row">
        <?php 
            if($bddex['sidebar-select'] == 'sidebar-left') :
            get_sidebar('left');
            endif;
        ?>
    <div id="primary" class="col-md-<?php echo bddex_sidebar_no_sidebar(); ?>" >
        <main id="main" class="site-main">
            <?php while (have_posts()) : the_post(); ?>
                <?php bddex_setPostViews(get_the_ID()); ?>
                <?php get_template_part( 'content', get_post_format() ); ?>
                <?php if($bddex['social-share-footer']) : 
                      do_action('bddex_social_share'); 
                      endif; 
                ?><!-- social share on footer -->
                
                <?php 
                if ($bddex['related-posts']) :
                    do_action( 'bddex_related_post' ); 
                endif;
                ?> <!-- related posts -->
                <?php 
                     if (!post_password_required()) :

                        if ($bddex['author-bio']) {
                            if (function_exists('bddex_author_bio')) {
                                bddex_author_bio();
                            }
                        }
                    endif;    
                ?><!-- author bio -->

                <?php
                if ( class_exists( 'ReduxFramework' ) ) {
                if ($bddex['comments-posts']) :
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                endif;
                }else{
                    if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                }
                ?> <!-- comments -->
                <?php if ( class_exists( 'ReduxFramework' ) ) { 
                      if($bddex['pagination-posts']) : 
                        bddex_pagination(); 
                      endif; 
                    } else {
                        bddex_pagination();
                    }
                ?> <!-- pagination -->
                <?php wp_reset_postdata(); ?>
            <?php endwhile; // end of the loop.  ?>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php  
get_sidebar();
get_footer();