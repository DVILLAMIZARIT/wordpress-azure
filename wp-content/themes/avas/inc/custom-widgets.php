<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com/
*
*
*/

/* ---------------------------------------------------------
  Sidebars setup
------------------------------------------------------------ */
// Right Sidebar   
function bddex_widget_setup() {
            register_sidebar(array(
            'name'          => esc_html__( 'Right Sidebar', 'avas' ),
            'id'            => 'sidebar-right',
            'description'   => esc_html__('Right sidebar for all the widget', 'avas'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',

 ) );

// Left Sidebar 
register_sidebar(array(
            'name'          => esc_html__( 'Left Sidebar', 'avas' ),
            'id'            => 'sidebar-left',
            'description'   => esc_html__('Left sidebar for all the widget', 'avas'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',

 ) );
// Side Menu
register_sidebar(array(
            'name'          => esc_html__( 'Side Menu', 'avas' ),
            'id'            => 'side-menu-widget',
            'description'   => esc_html__('Side menu widget', 'avas'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',

 ) );
// Mega Menu 1
register_sidebar(array(
            'name'          => esc_html__( 'Mega Menu 1', 'avas' ),
            'id'            => 'mega-menu-1',
            'description'   => esc_html__('Mega menu widget', 'avas'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',

 ) );
// Mega Menu 2
register_sidebar(array(
            'name'          => esc_html__( 'Mega Menu 2', 'avas' ),
            'id'            => 'mega-menu-2',
            'description'   => esc_html__('Mega menu widget', 'avas'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',

 ) );
// Mega Menu 3
register_sidebar(array(
            'name'          => esc_html__( 'Mega Menu 3', 'avas' ),
            'id'            => 'mega-menu-3',
            'description'   => esc_html__('Mega menu widget', 'avas'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',

 ) );
// Mega Menu 4
register_sidebar(array(
            'name'          => esc_html__( 'Mega Menu 4', 'avas' ),
            'id'            => 'mega-menu-4',
            'description'   => esc_html__('Mega menu widget', 'avas'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',

 ) );
// Woocommerce Right Sidebar 
register_sidebar(array(
            'name'          => esc_html__( 'WooCommerce Right Sidebar', 'avas' ),
            'id'            => 'sidebar-woo-right',
            'description'   => esc_html__('WooCommerce sidebar for WooCommerce widgets', 'avas'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',

 ) );

// Woocommerce Left Sidebar 
register_sidebar(array(
            'name'          => esc_html__( 'WooCommerce Left Sidebar', 'avas' ),
            'id'            => 'sidebar-woo-left',
            'description'   => esc_html__('WooCommerce sidebar for WooCommerce widgets', 'avas'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',

 ) );

// Footer One          
            register_sidebar(array(
            'name'          => esc_html__( 'Footer one', 'avas' ),
            'id'            => 'footer-one',
            'description'   => esc_html__('Footer for all the widget', 'avas'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
 ) );
    
// Footer Two          
            register_sidebar(array(
            'name'          => esc_html__( 'Footer two', 'avas' ),
            'id'            => 'footer-two',
            'description'   => esc_html__('Footer for all the widget', 'avas'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
 ) );     

// Footer Three          
            register_sidebar(array(
            'name'          => esc_html__( 'Footer three', 'avas' ),
            'id'            => 'footer-three',
            'description'   => esc_html__('Footer for all the widget', 'avas'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
 ) );   

// Footer Four          
            register_sidebar(array(
            'name'          => esc_html__( 'Footer four', 'avas' ),
            'id'            => 'footer-four',
            'description'   => esc_html__('Footer for all the widget', 'avas'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
 ) );      
}

add_action('widgets_init','bddex_widget_setup');   

/* ---------------------------------------------------------
   EOF
------------------------------------------------------------ */ 