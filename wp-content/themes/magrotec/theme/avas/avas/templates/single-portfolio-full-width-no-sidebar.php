<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com
*
* Template Name: Full Width No Sidebar
* Template Post Type: portfolio-item
*
*/
global $bddex;
$project_type = get_post_meta( $post->ID, 'project_type', true );
$project_size = get_post_meta( $post->ID, 'project_size', true );
$project_completion_date = get_post_meta( $post->ID, 'project_completion_date', true );
$project_contract_value = get_post_meta( $post->ID, 'project_contract_value', true );
$project_client = get_post_meta( $post->ID, 'project_client', true );
$under_construction = get_post_meta( $post->ID, 'under_construction', true );
get_header(); 
if ($bddex['sub-header-switch']) {
    bddex_sub_header();
}
if (have_posts()): while (have_posts()): the_post(); ?>
<div class="container space-content">
  	<div class="row">
        <div class="col-md-12 col-sm-12"> 
        <div class=""><!-- Image part start -->
            <?php global $bddex;
            if($bddex['portfolio-gallery']) { ?>
            <div class="item">  <!-- slider starts -->         
                <ul id="image-gallerys" class="gallery list-unstyled cS-hidden">
                <?php         
                $images = get_post_meta($post->ID, 'bddex_gallery_id', true);  
                if($images) :
                foreach ($images as $image) {

                $image_thumb_url = wp_get_attachment_image_src($image, 'bddex-small-img'); 
                $thumbs = $image_thumb_url[0];
                $gallery = wp_get_attachment_link($image, 'bddex-service-large');

                    echo '<li data-thumb = "'.$thumbs.'">';                
                    echo  wp_kses_post($gallery); // no need to escape
                    echo '</li>';  
            }
                  endif;
            ?>
                </ul>
            </div>  <!-- slider end -->
            <?php } else { ?>
             <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('bddex-service-large'); ?>
            <?php endif; ?>
            <?php } ?>
        </div><!-- Image part end -->
            <div class="portfolio_content">
                <?php the_content(); ?>
            </div>
        </div>
    </div> <!-- row end -->
</div> <!-- container end -->
<div class="space-100"></div>
<?php endwhile;	
	endif; ?>
<?php get_footer(); ?>