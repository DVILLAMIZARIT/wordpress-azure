<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com/
*
* Template Name: Full Width
*
*/
global $bddex;
get_header();
if ($bddex['sub-header-switch']) {
    bddex_sub_header();
}
?>
<div class="container-fluid space-single">
    <div class="row">
        <?php bddex_content_page(); ?>
    </div>
</div>
<?php get_footer();