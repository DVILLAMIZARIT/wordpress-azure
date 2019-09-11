<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com/
*
*
*/
if(!function_exists('bddex_related_post')) :
add_action( 'bddex_related_post', 'bddex_related_post' ); 
function bddex_related_post() { ?>
    <div>
    <div class="relatedposts">
        <?php
        global $post;
        $orig_post = $post;
        $tags = wp_get_post_tags($post->ID);
        if ($tags) {
            $tag_ids = array();
        foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
            $args=array(
                'tag__in' => $tag_ids,
                'post__not_in' => array($post->ID),
                'posts_per_page'=>4, // Number of related posts to display.
                'ignore_sticky_posts'=>1
            );
        $my_query = new wp_query( $args ); ?>
        <h3><?php echo esc_html__('Related posts','avas'); ?></h3>
        <div class="related-loop row">
        <?php while( $my_query->have_posts() ) :
        $my_query->the_post();
        ?>
        <div class="related-thumb col-md-3">
            <a href="<?php the_permalink(); ?>">
            <?php 
            if (has_post_thumbnail()) :
               the_post_thumbnail('bddex-related-img'); ?>
            <?php endif; ?>
            </a>
            <?php the_title(sprintf('<h6 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h6>'); ?>
        </div>
        <?php endwhile;
        }
        $post = $orig_post;
        ?>
    </div>
        <?php  wp_reset_postdata(); ?>
    </div>
<?php }
endif;
/* ---------------------------------------------------------
   EOF
------------------------------------------------------------ */ 