<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com/
 *===========================
 * search results
 *===========================
 * 
 */

get_header();

if ($bddex['sub-header-switch']) {
    bddex_sub_header();
}
?>

<div class="container space-single">
    <div class="row">
        <div id="primary" class="col-lg-8 col-md-8">
            <main id="main" class="site-main">
            <?php if (have_posts()) : ?>
                <header class="page-header">
                    <h1 class="page-title"><?php printf(esc_html__('Search Results for: %s', 'avas'), '<span>' . get_search_query() . '</span>'); ?></h1>
                </header><!-- .page-header -->

                <?php while (have_posts()) : the_post(); ?>
                    <?php
                    get_template_part('content', 'search');
                    ?>
                <?php endwhile; ?>
                <?php bddex_navigation(); ?>
            <?php else : ?>
                <?php get_template_part('content', 'none'); ?>
            <?php endif; ?>
            </main><!-- #main -->
        </div><!-- #primary -->

<?php
get_sidebar();
get_footer();