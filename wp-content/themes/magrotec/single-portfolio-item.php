<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com
*
* ------------------------------------
*         Single Portfolio
* ------------------------------------
*
*/
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct access denied.' );
}
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
		<div class="col-md-8 col-sm-8">
            <?php global $bddex;
                if($bddex['portfolio-gallery']) { ?>
			<div class="item">  <!-- slider starts -->         
                <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                <?php         
                $images = get_post_meta($post->ID, 'bddex_gallery_id', true);  
                if($images) :
                foreach ($images as $image) {

                $image_thumb_url = wp_get_attachment_image_src($image, 'bddex-small-img'); 
                $thumbs = $image_thumb_url[0];
                $gallery = wp_get_attachment_link($image, 'bddex-large-img');

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
                <?php the_post_thumbnail('bddex-large-img'); ?>
            <?php endif; ?>
            <?php } ?>
            <div class="portfolio_content">
            	<?php the_content(); ?>
            </div>
		</div>
        <!-- right side start -->
		<div class="col-md-4 col-sm-4 portfolio-content-right">
			<h2 class="portfolio-title"><?php the_title(); ?></h2>	
			<?php the_excerpt(); ?>
            <!-- project details start -->
            <table class="project-table">
                <tbody>
                    <tr>
                        <?php if (!empty($project_type)) : ?>
                        <td><?php esc_html_e( 'Project Type','avas' ); ?></td>
                        <td><?php printf(esc_html__('%s', 'avas'), $project_type ); ?></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <?php if (!empty($project_size)) : ?>
                        <td><?php esc_html_e( 'Project Size','avas' ); ?></td>
                        <td><?php printf(esc_html__('%s', 'avas'), $project_size ); ?></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <?php if (!empty($project_completion_date)) : ?>
                        <td><?php esc_html_e( 'Completion Date','avas' ); ?></td>
                        <td><?php printf(esc_html__('%s', 'avas'), $project_completion_date ); ?></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <?php if (!empty($project_contract_value)) : ?>
                        <td><?php esc_html_e( 'Contract Price','avas' ); ?></td>
                        <td><?php printf(esc_html__('%s', 'avas'), $project_contract_value ); ?></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <?php if (!empty($project_client)) : ?>
                        <td><?php esc_html_e( 'Client','avas' ); ?></td>
                        <td><?php printf(esc_html__('%s', 'avas'), $project_client ); ?></td>
                        <?php endif; ?>
                    </tr>
                </tbody>
            </table> <!-- project details table end -->
            <?php if (!empty($under_construction)) : ?>
            <h5><?php esc_html_e('Completion', 'avas'); ?></h5>
            <div class="progress">
                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="<?php echo esc_attr($under_construction); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo esc_attr($under_construction); ?>%"> <span class="pro-per"><?php echo esc_attr( $under_construction . '&#37;'); ?></span>
                </div>
            </div>
            <?php endif; ?> <!-- Completion end -->
			<?php
                if($bddex['portfolio-meta-switch']) :
                    bddex_portfolio_meta(); 
                endif;
            ?>

			<?php 
                if($bddex['social-share']) :
                   if($bddex['social_share_post']['portfolio'] == '1'){
                    do_action( 'bddex_social_share' );
                    } 
                endif;
            ?><!-- social share -->
            
		</div>
    </div>
</div>
<div class="space-100"></div>
<?php endwhile;	
	endif; ?>
<?php get_footer(); ?>