<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com/
*
*
* All meta tags functions here.
*/


/* date */

add_action('bddex_date','bddex_date');
function bddex_date() {
  if ( class_exists( 'ReduxFramework' ) ) {
	global $bddex;
  if ($bddex['post-time']) :
    echo '<span class="post-time"><i class="fa fa-clock-o"></i>';
    echo  the_time(' F j, Y'); 
    echo '</span>';
  endif;
} else {
    echo '<span class="post-time"><i class="fa fa-clock-o"></i>';
    echo  the_time(' F j, Y'); 
    echo '</span>';
}
}

/* author */
add_action( 'bddex_author', 'bddex_author' );
function bddex_author() {
if ( class_exists( 'ReduxFramework' ) ) {  
global $bddex;
if ($bddex['post-author']) :
    echo '<span class="nickname">';
    echo '<i class="fa fa-user-o"></i> ';
    echo '<a href="' . get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) . '">' . esc_html( get_the_author() ) . '</a>';
    echo '</span>';
  endif;
} else {
    echo '<span class="nickname">';
    echo '<i class="fa fa-user-o"></i> ';
    echo '<a href="' . get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) . '">' . esc_html( get_the_author() ) . '</a>';
    echo '</span>';
}
}

/* comment */
add_action( 'bddex_comments', 'bddex_comments' );
function bddex_comments() {
  if ( class_exists( 'ReduxFramework' ) ) {
	global $bddex;
  if ($bddex['post-comment']) :
	if ( 'post' == get_post_type() ) {
    echo '<span class="comments-link"><i class="fa fa-comment-o"></i> ';
  if ( ! comments_open() && get_comments_number() < 1 ) :
    comments_number( esc_html__( 'No Comments', 'avas' ), esc_html__( '1 Comment', 'avas' ), esc_html__( '% Comments', 'avas' ) );
  else :
    echo '<a href="' . esc_url( get_comments_link() ) . '">';
    comments_number( esc_html__( 'Leave a Comment', 'avas' ), esc_html__( '1 Comment', 'avas' ), esc_html__( '% Comments', 'avas' ) );
    echo '</a>';
    endif;
        echo '</span>';
    }
    endif; 
} else {
  if ( 'post' == get_post_type() ) {
    echo '<span class="comments-link"><i class="fa fa-comment-o"></i> ';
  if ( ! comments_open() && get_comments_number() < 1 ) :
    comments_number( esc_html__( 'No Comments', 'avas' ), esc_html__( '1 Comment', 'avas' ), esc_html__( '% Comments', 'avas' ) );
  else :
    echo '<a href="' . esc_url( get_comments_link() ) . '">';
    comments_number( esc_html__( 'Leave a Comment', 'avas' ), esc_html__( '1 Comment', 'avas' ), esc_html__( '% Comments', 'avas' ) );
    echo '</a>';
    endif;
        echo '</span>';
    }  
}
}

/* category */
add_action( 'bddex_category', 'bddex_category' );  
function bddex_category() { 
if ( class_exists( 'ReduxFramework' ) ) {
global $bddex; 
if ($bddex['post-category']) :
	if (has_category()) {
    echo '<i class="fa fa-folder-open-o"></i> ' ;
    echo '<span class="post-category">';
    echo the_category(', ');
    echo '</span>';
  }
endif;
} else{
  if (has_category()) {
    echo '<i class="fa fa-folder-open-o"></i> ' ;
    echo '<span class="post-category">';
    echo the_category(', ');
    echo '</span>';
  }
}
}

/* tags */
add_action( 'bddex_tags', 'bddex_tags' );  
function bddex_tags() {
if ( class_exists( 'ReduxFramework' ) ) {
global $bddex;
  if ($bddex['post-tag']) :
    if (has_tag( )) {
      echo '<i class="fa fa-tags"></i> ';
      echo '<span class="post-tag">';
      echo the_tags('', ', ', '<br />');
      echo '</span>';
    }
  endif;
} else {
  if (has_tag( )) {
      echo '<i class="fa fa-tags"></i> ';
      echo '<span class="post-tag">';
      echo the_tags('', ', ', '<br />');
      echo '</span>';
    }
}
}

/* ---------------------------------------------------------
  Portfolio meta
------------------------------------------------------------ */
function bddex_portfolio_meta() { 
  global $bddex;
    echo '<div class="portfolio-meta">';
  if ($bddex['portfolio-time']) :
    echo '<div class="portfolio-time">';
    echo '<span>Date</span>';
    echo the_time('F j, Y'); 
    echo '</div>';
  endif;
  if ($bddex['portfolio-author']) :
    echo '<div class="portfolio-author">';
    echo '<span>Created by</span>';
    echo the_author_meta('display_name');
    echo '</div>';
  endif;
  global $post;
  $portfolio_link = get_post_meta( $post->ID, 'portfolio_link', true );
  if(!empty($portfolio_link)) :
    echo '<div class="portfolio-url">';
    echo '<span>URL</span>' ;
    echo '<a href="'.$portfolio_link.'" target="_blank">Visit website</a>';    
    echo '</div>';
  endif;
    echo '</div>';
}



/* ---------------------------------------------------------
    Post View
------------------------------------------------------------ */

if ( class_exists( 'ReduxFramework' ) ) {
    // function to display number of posts.
    function bddex_getPostViews($postID){
      global $bddex;
      if ($bddex['post-views']) :
        $count_key = 'post_views_count';
        $count = get_post_meta($postID, $count_key, true);
        if($count==''){
            delete_post_meta($postID, $count_key);
            add_post_meta($postID, $count_key, '0');
            return '<span class="post-views"><i class="fa fa-eye"></i> 0 <span>' . esc_html__('View', 'avas') . '</span></span>';
        }
        return '<span class="post-views"><i class="fa fa-eye"></i> '.$count.' <span>' . esc_html__('Views', 'avas') . '</span></span>';
      endif;
    }
}

if ( ! function_exists('bddex_setPostViews')) {
    // function to count views.
    function bddex_setPostViews($postID) {
        $count_key = 'post_views_count';
        $count = get_post_meta($postID, $count_key, true);
        if($count==''){
            $count = 0;
            delete_post_meta($postID, $count_key);
            add_post_meta($postID, $count_key, '0');
        }else{
            $count++;
            update_post_meta($postID, $count_key, $count);
        }
    }
}
/* ---------------------------------------------------------
   EOF
------------------------------------------------------------ */ 
