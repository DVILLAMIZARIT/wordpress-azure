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
            <div class="flexslider">
                <ul class="slides">
                <?php         
                $images = get_post_meta($post->ID, 'bddex_gallery_id', true);  
                if($images) :
                foreach ($images as $image) {
                $gallery = wp_get_attachment_link($image, 'bddex-large-img');
                    echo '<li>';                
                    echo  wp_kses_post($gallery); // no need to escape
                    echo '</li>';  
                }
                endif;
                ?>
                </ul>
            </div><!-- slider end -->
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
            } else { ?>
            <div class="single-content">
                <?php the_content(); ?>
            </div>
        <?php } ?>
        
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