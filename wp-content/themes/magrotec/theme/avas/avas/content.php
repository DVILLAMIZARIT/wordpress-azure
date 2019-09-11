<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com/
*
*/
global $bddex;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content">

        <?php 
            if ( class_exists( 'ReduxFramework' ) ) {
            if($bddex['featured-img']) { ?>
        <div class="space-20">    
        <?php if (has_post_thumbnail()) { ?>
            <div class="zoom-thumb">
                <?php the_post_thumbnail('bddex-large-img'); ?>
            </div>
        <?php } ?>
        </div>
         <?php } ?>
        <?php }else{ ?>
            <?php if (has_post_thumbnail()) { ?>
            <div class="zoom-thumb">
                <?php the_post_thumbnail('bddex-large-img'); ?>
            </div>
        <?php } 
        } ?>

        <header class="entry-header">
            <?php the_title(sprintf('<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h1>'); ?>
            <?php if ('post' == get_post_type()) : ?>
                <div class="entry-meta">
                    <?php do_action('bddex_date'); ?>
                    <?php do_action('bddex_author'); ?>
                    <?php do_action('bddex_comments'); ?>
                    <?php if(function_exists('bddex_getPostViews')) :
                            echo bddex_getPostViews(get_the_ID()); 
                          endif;
                    ?>
                    <?php do_action('bddex_social_share_header'); ?>
                </div><!-- .entry-meta -->
            <?php endif; ?>
        </header><!-- .entry-header -->

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
        <?php
        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'avas'),
            'after' => '</div>',
        ));
        ?>
    </div><!-- .entry-content -->
  
    <footer class="entry-footer">
        <?php do_action('bddex_category'); ?>
        <?php do_action('bddex_tags'); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->