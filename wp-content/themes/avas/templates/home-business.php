<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com/
 *
 * Template Name: Home - Business Header
 */
global $bddex;
get_header();
?>
<div class="container space_business">
    <div class="row">
        <?php do_action('bddex_content_page'); ?>
    </div>
</div>   
<?php get_footer(); 