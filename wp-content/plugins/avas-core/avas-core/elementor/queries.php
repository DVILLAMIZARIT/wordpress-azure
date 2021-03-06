<?php


function bddex_get_post_data($args){
    $defaults = array(
        'posts_per_page'   => 5,
        'offset'           => 0,
        'category'         => '',
        'category_name'    => '',
        'orderby'          => 'date',
        'order'            => 'DESC',
        'include'          => '',
        'exclude'          => '',
        'meta_key'         => '',
        'meta_value'       => '',
        'post_type'        => 'post',
        'post_mime_type'   => '',
        'post_parent'      => '',
        'author'	   => '',
        'author_name'	   => '',
        'post_status'      => 'publish',
        'suppress_filters' => true
    );

    $atts = wp_parse_args($args,$defaults);

    $posts = get_posts($atts);

    return $posts;
}


function bddex_get_post_types(){

    $bddex_cpts = get_post_types( array( 'public'   => true, 'show_in_nav_menus' => true ) );
    $bddex_exclude_cpts = array( 'elementor_library', 'attachment', 'product' );

    foreach ( $bddex_exclude_cpts as $exclude_cpt ) {
        unset($bddex_cpts[$exclude_cpt]);
    }

    $post_types = array_merge($bddex_cpts);
    return $post_types;
}


function bddex_get_post_settings($settings){
    $post_args['post_type'] = $settings['bddex_post_type'];

    if($settings['bddex_post_type'] == 'post'){
        $post_args['category'] = $settings['category'];
    }

    $post_args['posts_per_page'] = $settings['bddex_posts_count'];
    $post_args['offset'] = $settings['bddex_post_offset'];
    $post_args['orderby'] = $settings['bddex_post_orderby'];
    $post_args['order'] = $settings['bddex_post_order'];

    return $post_args;
}

function bddex_get_excerpt_by_id($post_id,$excerpt_length){
    $the_post = get_post($post_id); //Gets post ID

    $the_excerpt = null;
    if ($the_post)
    {
        $the_excerpt = $the_post->post_excerpt ? $the_post->post_excerpt : $the_post->post_content;
    }

    $the_excerpt = strip_tags(strip_shortcodes($the_excerpt)); //Strips tags and images
    $words = explode(' ', $the_excerpt, $excerpt_length + 1);

     if(count($words) > $excerpt_length) :
         array_pop($words);
         array_push($words, '…');
         $the_excerpt = implode(' ', $words);
     endif;

     return $the_excerpt;
}

function bddex_get_thumbnail_sizes(){
    $sizes = get_intermediate_image_sizes();
    foreach($sizes as $s){
        $ret[$s] = $s;
    }

    return $ret;
}

function bddex_get_post_orderby_options(){
    $orderby = array(
        'ID' => 'Post ID',
        'author' => 'Post Author',
        'title' => 'Title',
        'date' => 'Date',
        'modified' => 'Last Modified Date',
        'parent' => 'Parent Id',
        'rand' => 'Random',
        'comment_count' => 'Comment Count',
        'menu_order' => 'Menu Order',
    );

    return $orderby;
}

function bddex_post_type_categories(){
    $terms = get_terms( array(
        'taxonomy' => 'category',
        'hide_empty' => true,
    ));

    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
    foreach ( $terms as $term ) {
        $options[ $term->term_id ] = $term->name;
    }
    return $options;
    }

    
}


//Product Queries

function bddex_woocommerce_product_categories(){
    $terms = get_terms( array(
        'taxonomy' => 'product_cat',
        'hide_empty' => true,
    ));

    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
    foreach ( $terms as $term ) {
        $options[ $term->slug ] = $term->name;
    }
    return $options;
    }


}

function bddex_woocommerce_product_get_product_by_id(){
    $postlist = get_posts(array(
        'post_type' => 'product',
        'showposts' => 9999,
    ));
    $posts = array();

    if ( ! empty( $postlist ) && ! is_wp_error( $postlist ) ){
    foreach ( $postlist as $post ) {
        $options[ $post->ID ] = $post->post_title;
    }
    return $options;

    }
}

function bddex_woocommerce_product_categories_by_id(){
    $terms = get_terms( array(
        'taxonomy' => 'product_cat',
        'hide_empty' => true,
    ));

    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
    foreach ( $terms as $term ) {
        $options[ $term->term_id ] = $term->name;
    }
    return $options;
    }

}

// Get Contact Form 7 forms

if ( function_exists( 'wpcf7' ) ) {
function bddex_select_contact_form(){
    $wpcf7_form_list = get_posts(array(
        'post_type' => 'wpcf7_contact_form',
        'showposts' => 999,
    ));
    $posts = array();

    if ( ! empty( $wpcf7_form_list ) && ! is_wp_error( $wpcf7_form_list ) ){
    foreach ( $wpcf7_form_list as $post ) {
        $options[ $post->ID ] = $post->post_title;
    }
    return $options;
    }
}
}

// Get weForms
function bddex_select_weform() {

    $wpuf_form_list = get_posts( array(
        'post_type' => 'wpuf_contact_form',
        'showposts' => 999,
    ));
    $posts = array();

    if ( ! empty( $wpuf_form_list ) && ! is_wp_error( $wpuf_form_list ) ) {
        foreach ( $wpuf_form_list as $post ) {
            $options[ $post->ID ] = $post->post_title;
        }
        return $options;
    }

}

// Get all elementor page templates
if ( !function_exists('bddex_get_page_templates') ) {
    function bddex_get_page_templates(){
        $page_templates = get_posts( array(
            'post_type'         => 'elementor_library',
            'posts_per_page'    => -1
        ));

        $options = array();

        if ( ! empty( $page_templates ) && ! is_wp_error( $page_templates ) ){
            foreach ( $page_templates as $post ) {
                $options[ $post->ID ] = $post->post_title;
            }
        }
        return $options;
    }
}