<?php
/**
 * The Template for displaying all single products
 *
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $bddex;
get_header();
if ($bddex['sub-header-switch']) {
    bddex_sub_header();
}    

?>

<div class="container space-content">
	<div class="row">
    <div id="primary">
        
        <main id="main" class="site-main">
            
        <?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
		?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php wc_get_template_part( 'content', 'single-product' ); ?>
		<?php endwhile; // end of the loop. ?>
		<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
		?>
            
        </main><!-- end #main -->
        
    </div><!-- end #primary -->
    
  	</div> <!-- end .row -->

</div> <!-- end .container -->

<?php 
get_footer(); 