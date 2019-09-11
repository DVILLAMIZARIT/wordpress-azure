<?php
/**
* @package bddex
* @author theme-x
* @link https://x-theme.com/
*
*/

function bddex_team_meta_box() {

    add_meta_box(
        'team_sectionid',
        esc_html__( 'Team Profile', 'avas-core' ),
        'bddex_team_meta_box_callback',
        'team',              // post type
        'normal'
    );

}
add_action( 'add_meta_boxes', 'bddex_team_meta_box' );

/**
 * Prints the box content.
 *
 * @param WP_Post $post The object for the current post/page.
 */
function bddex_team_meta_box_callback( $post ) {

// Add a nonce field so we can check for it later.
wp_nonce_field( 'bddex_team_save_meta_box_data', 'bddex_team_meta_box_nonce' );

/*
 * Use get_post_meta() to retrieve an existing value
 * from the database and use the value for the form.
 */

$team_html = get_post_meta( $post->ID, 'team_html', true );
$team_css = get_post_meta( $post->ID, 'team_css', true );
$team_php = get_post_meta( $post->ID, 'team_php', true );
$team_js = get_post_meta( $post->ID, 'team_js', true );

$team_html_percentage = get_post_meta( $post->ID, 'team_html_percentage', true );
$team_css_percentage = get_post_meta( $post->ID, 'team_css_percentage', true );
$team_php_percentage = get_post_meta( $post->ID, 'team_php_percentage', true );
$team_js_percentage = get_post_meta( $post->ID, 'team_js_percentage', true );

$team_fb = get_post_meta( $post->ID, 'team_fb', true );
$team_tw = get_post_meta( $post->ID, 'team_tw', true );
$team_gp = get_post_meta( $post->ID, 'team_gp', true );
$team_ln = get_post_meta( $post->ID, 'team_ln', true );
$team_in = get_post_meta( $post->ID, 'team_in', true );

$hire_me = get_post_meta( $post->ID, 'hire_me', true );
$hour_rate = get_post_meta( $post->ID, 'hour_rate', true );


echo '<table class="form-table">';

// echo '<tr><th>';
// echo esc_html_e( 'Skills', 'avas-core' );
// echo '</th></tr>';
echo '<tr>';
echo '<td><input type="text" id="team_html" name="team_html" value="' . esc_attr( $team_html ) . '" placeholder="Please enter skill name here" size="50" /></td>';
echo '<td><input type="text" id="team_html_percentage" name="team_html_percentage" value="' . esc_attr( $team_html_percentage ) . '" placeholder="%" size="5" /></td>';
echo '</tr>';

echo '<tr>';
echo '<td><input type="text" id="team_css" name="team_css" value="' . esc_attr( $team_css ) . '" placeholder="Please enter skill name here" size="50" /></td>';
echo '<td><input type="text" id="team_css_percentage" name="team_css_percentage" value="' . esc_attr( $team_css_percentage ) . '" placeholder="%" size="5" /></td>';
echo '</tr>';

echo '<tr>';
echo '<td><input type="text" id="team_php" name="team_php" value="' . esc_attr( $team_php ) . '" placeholder="Please enter skill name here" size="50" /></td>';
echo '<td><input type="text" id="team_php_percentage" name="team_php_percentage" value="' . esc_attr( $team_php_percentage ) . '" placeholder="%" size="5" /></td>';
echo '</tr>';

echo '<tr>';
echo '<td><input type="text" id="team_js" name="team_js" value="' . esc_attr( $team_js ) . '" placeholder="Please enter skill name here" size="50" /></td>';
echo '<td><input type="text" id="team_js_percentage" name="team_js_percentage" value="' . esc_attr( $team_js_percentage ) . '" placeholder="%" size="5" /></td>';
echo '</tr>';

// echo '<tr><th>';
// echo esc_html_e( 'Social Media', 'avas-core' );
// echo '</th></tr>';

echo '<tr>';
echo '<th><label for="team_fb">';
esc_html_e( 'Facebook', 'avas-core' );
echo '</label></th>';
echo '<td><input type="text" id="team_fb" name="team_fb" value="' . esc_attr( $team_fb ) . '" size="50" /></td>';
echo '</tr>';

echo '<tr>';
echo '<th><label for="team_tw">';
esc_html_e( 'Twitter', 'avas-core' );
echo '</label></th>';
echo '<td><input type="text" id="team_tw" name="team_tw" value="' . esc_attr( $team_tw ) . '" size="50" /></td>';
echo '</tr>';

echo '<tr>';
echo '<th><label for="team_gp">';
esc_html_e( 'Google Plus', 'avas-core' );
echo '</label></th>';
echo '<td><input type="text" id="team_gp" name="team_gp" value="' . esc_attr( $team_gp ) . '" size="50" /></td>';
echo '</tr>';

echo '<tr>';
echo '<th><label for="team_ln">';
esc_html_e( 'LinkedIn', 'avas-core' );
echo '</label></th>';
echo '<td><input type="text" id="team_ln" name="team_ln" value="' . esc_attr( $team_ln ) . '" size="50" /></td>';
echo '</tr>';

echo '<tr>';
echo '<th><label for="team_in">';
esc_html_e( 'Instagram', 'avas-core' );
echo '</label></th>';
echo '<td><input type="text" id="team_in" name="team_in" value="' . esc_attr( $team_in ) . '" size="50" /></td>';
echo '</tr>';

echo '<tr>';
echo '<th><label for="hire_me">';
esc_html_e( 'Link', 'avas-core' );
echo '</label></th>';
echo '<td><input type="text" id="hire_me" name="hire_me" value="' . esc_attr( $hire_me ) . '" size="40" /></td>';
echo '</tr>';

echo '<tr>';
echo '<th><label for="hour_rate">';
esc_html_e( 'Link Text', 'avas-core' );
echo '</label></th>';
echo '<td><input type="text" id="hour_rate" name="hour_rate" value="' . esc_attr( $hour_rate ) . '" size="40" /></td>';
echo '</tr>';

echo '</table>';

}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
 function bddex_team_save_meta_box_data( $post_id ) {

 if ( ! isset( $_POST['bddex_team_meta_box_nonce'] ) ) {
    return;
 }

 if ( ! wp_verify_nonce( $_POST['bddex_team_meta_box_nonce'], 'bddex_team_save_meta_box_data' ) ) {
    return;
 }

 if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
    return;
 }

 // Check the user's permissions.
 if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

    if ( ! current_user_can( 'edit_page', $post_id ) ) {
        return;
    }

 } else {

    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }
 }


// Sanitize user input
$team_html_data = isset( $_POST[ 'team_html' ] ) ? sanitize_text_field( $_POST[ 'team_html' ] ) : '';
$team_css_data = isset( $_POST[ 'team_css' ] ) ? sanitize_text_field( $_POST[ 'team_css' ] ) : '';
$team_php_data = isset( $_POST[ 'team_php' ] ) ? sanitize_text_field( $_POST[ 'team_php' ] ) : '';
$team_js_data = isset( $_POST[ 'team_js' ] ) ? sanitize_text_field( $_POST[ 'team_js' ] ) : '';

$team_html_percentage_data = isset( $_POST[ 'team_html_percentage' ] ) ? sanitize_text_field( $_POST[ 'team_html_percentage' ] ) : '';
$team_css_percentage_data = isset( $_POST[ 'team_css_percentage' ] ) ? sanitize_text_field( $_POST[ 'team_css_percentage' ] ) : '';
$team_php_percentage_data = isset( $_POST[ 'team_php_percentage' ] ) ? sanitize_text_field( $_POST[ 'team_php_percentage' ] ) : '';
$team_js_percentage_data = isset( $_POST[ 'team_js_percentage' ] ) ? sanitize_text_field( $_POST[ 'team_js_percentage' ] ) : '';

$team_fb_data = isset( $_POST[ 'team_fb' ] ) ? sanitize_text_field( $_POST[ 'team_fb' ] ) : '';
$team_tw_data = isset( $_POST[ 'team_tw' ] ) ? sanitize_text_field( $_POST[ 'team_tw' ] ) : '';
$team_gp_data = isset( $_POST[ 'team_gp' ] ) ? sanitize_text_field( $_POST[ 'team_gp' ] ) : '';
$team_ln_data = isset( $_POST[ 'team_ln' ] ) ? sanitize_text_field( $_POST[ 'team_ln' ] ) : '';
$team_in_data = isset( $_POST[ 'team_in' ] ) ? sanitize_text_field( $_POST[ 'team_in' ] ) : '';
$hire_me_data = isset( $_POST[ 'hire_me' ] ) ? sanitize_text_field( $_POST[ 'hire_me' ] ) : '';
$hour_rate_data = isset( $_POST[ 'hour_rate' ] ) ? sanitize_text_field( $_POST[ 'hour_rate' ] ) : '';

// Update the meta field in the database
update_post_meta( $post_id, 'team_html', $team_html_data );
update_post_meta( $post_id, 'team_css', $team_css_data );
update_post_meta( $post_id, 'team_php', $team_php_data );
update_post_meta( $post_id, 'team_js', $team_js_data );

update_post_meta( $post_id, 'team_html_percentage', $team_html_percentage_data );
update_post_meta( $post_id, 'team_css_percentage', $team_css_percentage_data );
update_post_meta( $post_id, 'team_php_percentage', $team_php_percentage_data );
update_post_meta( $post_id, 'team_js_percentage', $team_js_percentage_data );

update_post_meta( $post_id, 'team_fb', $team_fb_data );
update_post_meta( $post_id, 'team_tw', $team_tw_data );
update_post_meta( $post_id, 'team_gp', $team_gp_data );
update_post_meta( $post_id, 'team_ln', $team_ln_data );
update_post_meta( $post_id, 'team_in', $team_in_data );
update_post_meta( $post_id, 'hire_me', $hire_me_data );
update_post_meta( $post_id, 'hour_rate', $hour_rate_data );

}
add_action( 'save_post', 'bddex_team_save_meta_box_data' );


/* ---------------------------------------------------------
   EOF
------------------------------------------------------------ */ 