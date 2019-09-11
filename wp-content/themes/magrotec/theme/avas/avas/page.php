<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com/
*===========================
* Default Page template
*===========================
*/

global $bddex;

get_header();

if($bddex['sub-header-switch']) {
    bddex_sub_header();
} 
?>

<div class="container space-content">
    <?php bddex_content_page(); ?>
</div>

<?php get_footer(); 