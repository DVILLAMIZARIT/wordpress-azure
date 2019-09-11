<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com/
*
*
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content">
        <header class="entry-header">
            <?php the_title(sprintf('<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h1>'); ?>
            <?php if ('post' == get_post_type()) : ?>
                <div class="entry-meta">
                    <?php do_action('bddex_date'); ?>
                    <?php do_action('bddex_author'); ?>
                    <?php do_action('bddex_comments'); ?>
                </div><!-- .entry-meta -->
            <?php endif; ?>
        </header><!-- .entry-header -->
        <div class="post-excerpts"><?php echo bddex_excerpt(150); ?></div>
    </div><!-- .entry-content -->
    
    <footer class="entry-footer">
        <?php do_action('bddex_category'); ?>
        <?php do_action('bddex_tags'); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->