<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com/
*
*
* Author template
*/
global $bddex;
get_header(); 
if ($bddex['sub-header-switch']) {
    bddex_sub_header();
}
?>

    <div class="container space-author profile">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-xs-12 profile_left_sec">
        <?php 
        $authorImage = get_the_author_meta('image');
        if($authorImage){
        echo '<img src='.$authorImage . '>';
        }
        else {
            echo get_avatar(get_the_author_meta('user_email'), '330'); 
        }
        echo '<div class="profile_info">';

        echo '<div class="profile_name">';
        echo the_author_meta('display_name');
        echo '</div>';

        echo '<div class="profile_address">';
        echo the_author_meta('address');
        echo '</div>';

        echo '<div class="profile_url">';
        echo the_author_meta('url');
        echo '</div>';

        echo '<div class="profile_description">';
        echo the_author_meta('description');
        echo '</div>';

        echo '<div class="social_profile">';
        $fb = get_the_author_meta('facebook');
        if ($fb !='') {
        echo '<a href="'.$fb.'" target="_blank" class="profile_link_fb"><i class="fa fa-facebook" aria-hidden="true"></i></a>';
        }
         $tw = get_the_author_meta('twitter');
        if ($tw !='') {
        echo '<a href="'.$tw.'" target="_blank" class="profile_link"><i class="fa fa-twitter" aria-hidden="true"></i></a>';
        }
         $gp = get_the_author_meta('googleplus');
        if ($gp !='') {
        echo '<a href="'.$gp.'" target="_blank" class="profile_link"><i class="fa fa-google-plus" aria-hidden="true"></i></a>';
        }
         $in = get_the_author_meta('linkedin');
        if ($in !='') {
        echo '<a href="'.$in.'" target="_blank" class="profile_link"><i class="fa fa-linkedin" aria-hidden="true"></i></a>';
        }
         $ig = get_the_author_meta('instagram');
        if ($ig !='') {
        echo '<a href="'.$ig.'" target="_blank" class="profile_link"><i class="fa fa-instagram" aria-hidden="true"></i></a>';
        }
        echo '</div>';


        echo '</div>';
        ?>

    </div>

    <div id="primary" class="col-lg-8 col-md-8 col-xs-12 profile_right_sec right">
 
            
         <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
                <header class="entry-header">
                <?php the_title(sprintf('<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h1>'); ?>
                 <?php if ('post' == get_post_type()) : ?>
                <div class="entry-meta">
                    <?php bddex_date(); ?>
                    <?php bddex_author(); ?>
                    <?php bddex_comments(); ?>
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
        <?php //bddex_pagination($wp_query->max_num_pages,"",$paged); ?>

        <?php else:  ?>
        <p><?php esc_html_e( 'Sorry, nothing found.', 'avas' ); ?></p>
        <?php endif; ?>

        
    </div><!-- end #primary -->
    
    </div> <!-- .row -->
</div> <!-- .container -->

<?php 
get_footer(); 
