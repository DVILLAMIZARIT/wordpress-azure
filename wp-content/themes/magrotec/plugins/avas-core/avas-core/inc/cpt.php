<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com/avas
*
*
*/
/*-------------------------------------------------------
 *             Register portfolio
*-------------------------------------------------------*/

if( !function_exists('bddex_portfolio') ) :
add_action( 'init', 'bddex_portfolio' );
function bddex_portfolio() {
	global $bddex;
	if(isset($bddex['portfolio_post_type'])) {
	if(isset($bddex['portfolio-slug']) && $bddex['portfolio-slug'] != ''){
		$portfolio_slug = $bddex['portfolio-slug'];
	} else {
		$portfolio_slug = 'portfolio-item';
	}
	
	if(isset($bddex['portfolio_title'])) :
	$pt = $bddex['portfolio_title'];
	$labels = array(
		'name'               => esc_html__( $pt, 'avas-core' ),
		'singular_name'      => esc_html__( 'Portfolio',  'avas-core' ),
		'menu_name'          => esc_html__( $pt, 'avas-core' ),
		'name_admin_bar'     => esc_html__( 'Portfolio',  'avas-core' ),
		'add_new'            => esc_html__( 'Add New Portfolio', 'avas-core' ),
		'add_new_item'       => esc_html__( 'Add New Portfolio', 'avas-core' ),
		'new_item'           => esc_html__( 'New Portfolio', 'avas-core' ),
		'edit_item'          => esc_html__( 'Edit Portfolio', 'avas-core' ),
		'view_item'          => esc_html__( 'View Portfolio', 'avas-core' ),
		'all_items'          => esc_html__( 'All Portfolios', 'avas-core' ),
		'search_items'       => esc_html__( 'Search Portfolios', 'avas-core' ),
		'parent_item_colon'  => esc_html__( 'Parent Portfolios:', 'avas-core' ),
		'not_found'          => esc_html__( 'No Portfolio found.', 'avas-core' ),
		'not_found_in_trash' => esc_html__( 'No Portfolio found in Trash.', 'avas-core' )
	);
	
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => $portfolio_slug), // Permalink
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_icon'			 => 'dashicons-portfolio',
		'menu_position'      => null,
		'supports'           => array( 'title','thumbnail','editor','excerpt' )
	);
	register_post_type( 'portfolio-item', $args );
	endif;
}
}
endif;
/*-------------------------------------------------------
 *             Portfolio texonomy
*-------------------------------------------------------*/
if( !function_exists('bddex_portfolio_taxonomy') ) :
add_action( 'init', 'bddex_portfolio_taxonomy'); 	
function bddex_portfolio_taxonomy() {
	global $bddex;
	if(isset($bddex['portfolio_post_type'])) {
	if(isset($bddex['portfolio-cat-slug']) && $bddex['portfolio-cat-slug'] != ''){
		$portfolio_cat_slug = $bddex['portfolio-cat-slug'];
	} else {
		$portfolio_cat_slug = 'portfolio-category';
	}
	register_taxonomy(
		'portfolio-category',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
		'portfolio-item',                  //post type name
		array(
			'hierarchical'          => true,
			'label'                 => esc_html__('Portfolio Catagory','avas-core'),  //Display name
			'query_var'             => true,
			'show_admin_column'     => true,
			'rewrite'               => array(
			'slug'                  => $portfolio_cat_slug, // This controls the base slug that will display before each term
			'with_front'    		=> true // Don't display the category base before
				)
			)
	);
}
}
endif;

/*-------------------------------------------------------
 *             Team
*-------------------------------------------------------*/
if( !function_exists('bddex_team') ) :
add_action( 'init', 'bddex_team' );	
function bddex_team() {
	global $bddex;
	if(isset($bddex['team_post_type'])) {
	if(isset($bddex['team-slug']) && $bddex['team-slug'] != ''){
		$team_slug = $bddex['team-slug'];
	} else {
		$team_slug = 'team';
	}
	if(isset($bddex['team_title'])) :
	$tt = $bddex['team_title'];
	$labels = array(
		'name'               => esc_html__( $tt, 'avas-core' ),
		'singular_name'      => esc_html__( 'Team',  'avas-core' ),
		'menu_name'          => esc_html__( $tt, 'avas-core' ),
		'name_admin_bar'     => esc_html__( 'Team',  'avas-core' ),
		'add_new'            => esc_html__( 'Add New', 'avas-core' ),
		'add_new_item'       => esc_html__( 'Add New', 'avas-core' ),
		'new_item'           => esc_html__( 'New Team', 'avas-core' ),
		'edit_item'          => esc_html__( 'Edit Team', 'avas-core' ),
		'view_item'          => esc_html__( 'View Team', 'avas-core' ),
		'all_items'          => esc_html__( 'View All', 'avas-core' ),
		'search_items'       => esc_html__( 'Search Team', 'avas-core' ),
		'parent_item_colon'  => esc_html__( 'Parent Team:', 'avas-core' ),
		'not_found'          => esc_html__( 'No Team found.', 'avas-core' ),
		'not_found_in_trash' => esc_html__( 'No Team found in Trash.', 'avas-core' )
	);
	
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => $team_slug), // Permalink
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_icon'			 => 'dashicons-businessman',
		'menu_position'      => null,
		'supports'           => array( 'title','thumbnail','editor' )
	);

	register_post_type( 'team', $args );
	endif;
}
}
endif;

/*-------------------------------------------------------
 *             Team Texonomy
*-------------------------------------------------------*/
if( !function_exists('bddex_team_taxonomy') ) :
add_action( 'init', 'bddex_team_taxonomy'); 
function bddex_team_taxonomy() {
	global $bddex;
	if(isset($bddex['team_post_type'])) {
	if(isset($bddex['team-cat-slug']) && $bddex['team-cat-slug'] != ''){
		$team_cat_slug = $bddex['team-cat-slug'];
	} else {
		$team_cat_slug = 'team-category';
	}
		register_taxonomy(
		'team-category',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
		'team',                  //post type name
		array(
			'hierarchical'          => true,
			'label'                 => esc_html__('Team Catagory', 'avas-core'),  //Display name
			'query_var'             => true,
			'show_admin_column'     => true,
			'rewrite'               => array(
			'slug'                  => $team_cat_slug, // This controls the base slug that will display before each term
			'with_front'    		=> true // Don't display the category base before
				)
			)
		);
	
}
}
endif;

/*-------------------------------------------------------
 *             Register Services
*-------------------------------------------------------*/
if(!function_exists('bddex_services')) :
add_action( 'init', 'bddex_services' );
function bddex_services() {
		global $bddex;
		if(isset($bddex['service_post_type'])) {
		if(isset($bddex['service-slug']) && $bddex['service-slug'] != ''){
			$service_slug = $bddex['service-slug'];
		} else {
			$service_slug = 'service';
		}

		if(isset($bddex['services_title'])) :
		$st = $bddex['services_title'];
		$labels = array(
		'name'               => esc_html__( $st, 'avas-core' ),
		'singular_name'      => esc_html__( 'Services',  'avas-core' ),
		'menu_name'          => esc_html__( $st, 'avas-core' ),
		'name_admin_bar'     => esc_html__( 'Services',  'avas-core' ),
		'add_new'            => esc_html__( 'Add New Services', 'avas-core' ),
		'add_new_item'       => esc_html__( 'Add New Services', 'avas-core' ),
		'new_item'           => esc_html__( 'New Services', 'avas-core' ),
		'edit_item'          => esc_html__( 'Edit Services', 'avas-core' ),
		'view_item'          => esc_html__( 'View Services', 'avas-core' ),
		'all_items'          => esc_html__( 'All Services', 'avas-core' ),
		'search_items'       => esc_html__( 'Search Services', 'avas-core' ),
		'parent_item_colon'  => esc_html__( 'Parent Services:', 'avas-core' ),
		'not_found'          => esc_html__( 'No Services found.', 'avas-core' ),
		'not_found_in_trash' => esc_html__( 'No Services found in Trash.', 'avas-core' )
	);
	
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => $service_slug), // Permalink
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_icon'			 => 'dashicons-admin-tools',
		'menu_position'      => null,
		'supports'           => array( 'title','thumbnail','editor' )
	);

	register_post_type( 'service', $args );
	endif;
}
}
endif;

/*-------------------------------------------------------
 *             Service Texonomy
*-------------------------------------------------------*/
if( !function_exists('bddex_service_taxonomy') ) :
add_action( 'init', 'bddex_service_taxonomy'); 
function bddex_service_taxonomy() {
	global $bddex;
	if(isset($bddex['service_post_type'])) {
	if(isset($bddex['service-cat-slug']) && $bddex['service-cat-slug'] != ''){
		$service_cat_slug = $bddex['service-cat-slug'];
	} else {
		$service_cat_slug = 'service-category';
	}
		register_taxonomy(
		'service-category',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
		'service',                  //post type name
		array(
			'hierarchical'          => true,
			'label'                 => esc_html__('Service Catagory', 'avas-core'),  //Display name
			'query_var'             => true,
			'show_admin_column'     => true,
			'rewrite'               => array(
			'slug'                  => $service_cat_slug, // This controls the base slug that will display before each term
			'with_front'    		=> true // Don't display the category base before
				)
			)
		);
	
}
}
endif;

/*-------------------------------------------------------
 *             EOF
*-------------------------------------------------------*/