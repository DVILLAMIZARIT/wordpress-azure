<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com/
*
* Single service
*
*/
global $bddex;
get_header();
if ($bddex['sub-header-switch']) {
    bddex_sub_header();
}

$service_brochure = get_post_meta( get_the_ID(), 'bddex_attachment', true );
if ($service_brochure) :
$brochure = $service_brochure['url'];
endif;

?>
<div class="container space-content">
    <div class="row">	
        <?php if (have_posts()): while (have_posts()): the_post(); ?>

		<div class="col-lg-12 col-sm-12">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('bddex-service-large'); ?>
            <?php endif; ?>
			
		</div>
        <div class="service-separate"></div>
        <div class="col-lg-8 col-sm-8">
            <div class="service-content">
                <?php the_content(); ?>
            </div>
        </div>
        <?php wp_reset_postdata(); ?>
        <?php endwhile; ?>
                <?php endif; ?><!-- End left part -->
        <?php if($bddex['service_sidebar']): ?>
        <div class="col-md-4 col-sm-4">
            <div class="service-brochure">
            
            <?php if ($bddex['service-brochure-title']) : ?>
                  <h4><?php printf(esc_html__('%s','avas'), $bddex['service-brochure-title']); ?></h4> 
            <?php endif; ?>

            <?php if ($bddex['service-brochure-title']) : ?>
                  <p class="service-brochure-desc"><?php printf(esc_html__('%s', 'avas'), $bddex['service-brochure-desc']); ?></p>
            <?php endif; ?>

            <div class="brochure-img"><!-- brochure image or contact form -->
            <?php do_action( 'service_side_img_form' ); ?> 
            </div>
            <?php 
                if($bddex['service_sidebar_pdf_btn']=='1') {
            if(!empty($brochure)) : ?>
                  <a class="btn-brochure" href="<?php echo esc_url($brochure); ?>" target="_blank"><i class="fa fa-file-pdf-o"></i><?php esc_html_e('DOWNLOAD PDF', 'avas'); ?></a>
            <?php endif; } ?>
            </div><!-- brochure end -->
            
		    <?php if($bddex['service_sidebar_testimonial'] == '1') :bddex_client_side(); 
                endif; ?> <!-- client feedback -->
            <?php 
                if($bddex['social-share']) :
                   if($bddex['social_share_post']['service'] == '1'){
                    do_action( 'bddex_social_share' );
                    } 
                endif;
            ?><!-- social share -->
			
		</div> <!-- right part end -->
		<?php endif; ?>
        <?php if($bddex['pagination-services']) : ?>
        <?php  bddex_pagination(); ?> <!-- pagination -->
        <?php endif; ?>
    </div> <!-- end row -->

</div> <!-- end container -->
<?php //bddex_get_quote(); ?> <!-- get quote bar -->

<?php get_footer(); ?>
