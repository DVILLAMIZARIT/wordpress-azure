<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com/
 *
 * Template Name: Home - Business Header No Top Menu
 */
global $bddex;
get_header();
?>
<div class="container space_business_no_top">
    <div class="row">
        <?php do_action('bddex_content_page'); ?>
    </div>
</div>   
<?php get_footer(); 