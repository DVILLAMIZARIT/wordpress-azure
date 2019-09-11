<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com/
*
* ============================
*         Header
* ============================
*
*/
global $bddex;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php bddex_favicon(); ?>
        <?php wp_head(); ?>
    </head>
<body <?php body_class(); ?>>
<div class="bx-wrapper container<?php echo bddex_page_layout(); ?>">
    <div class="row">
    <?php 
        if ( class_exists( 'ReduxFramework' ) ) :
        if ($bddex['preloader']) {
          do_action('bddex_preloader');
        }
        endif;
     ?>
    <?php 
        if ( class_exists( 'ReduxFramework' ) ) {
        if($bddex['header_on_off']) { ?>
        <header id="header" itemscope="itemscope" itemtype="http://schema.org/WPHeader" class="header double-header <?php echo bddex_header_position();?> <?php echo bddex_sticky_header(); ?>">
            <!-- Top header start -->          
            <?php do_action('bddex_top_head'); ?>
            <!-- Main header start -->
            <?php do_action('bddex_header_select'); ?>
        </header>
    <?php } ?>
    <?php }else{ ?>
         <header id="header" itemscope="itemscope" itemtype="http://schema.org/WPHeader" class="header double-header <?php echo bddex_header_position();?> <?php echo bddex_sticky_header(); ?> ">
            <!-- Top header start -->          
            <?php do_action('bddex_top_head'); ?>
            <!-- Main header start -->
            <?php get_template_part('inc/header/main-default'); ?>
        </header>
    <?php } ?>    