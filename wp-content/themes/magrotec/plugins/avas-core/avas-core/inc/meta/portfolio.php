<?php
/**
*
* @package bddex
* @author theme-x
* @link https://x-theme.com
*
*/

/**
 * Custom mata box for Portfolio
 */
function bddex_portfolio_add_meta_box() {

	$screens = array( 'portfolio-item' );

	foreach ( $screens as $screen ) {

		add_meta_box(
			'bddex_portfolio_meta_box_id',
			esc_html__( 'Website link', 'avas-core' ),
			'bddex_portfolio_plugin_meta_box_callback',
			$screen
		);
	}
}
add_action( 'add_meta_boxes', 'bddex_portfolio_add_meta_box' );

/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function bddex_portfolio_plugin_meta_box_callback( $post ) {

	// Add an nonce field so we can check for it later.
	wp_nonce_field( 'bddex_portfolio_plugin_meta_box', 'bddex_portfolio_plugin_meta_box_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$portfolio_link = get_post_meta( $post->ID, 'portfolio_link', true );

	echo '<label for="bddex_portfolio_new_field">';
	esc_html_e( 'Please enter url. Example: https://google.com', 'avas-core' );
	echo '</label> ';
	echo '<input type="text" id="bddex_portfolio_new_field" name="bddex_portfolio_new_field" value="' . esc_attr( $portfolio_link ) . '" size="50" />';
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function bddex_portfolio_save_meta_box_data( $post_id ) {

	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */

	// Check if our nonce is set.
	if ( ! isset( $_POST['bddex_portfolio_plugin_meta_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['bddex_portfolio_plugin_meta_box_nonce'], 'bddex_portfolio_plugin_meta_box' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
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

	/* OK, it's safe for us to save the data now. */
	
	// Make sure that it is set.
	if ( ! isset( $_POST['bddex_portfolio_new_field'] ) ) {
		return;
	}

	// Sanitize user input.
	$my_data = sanitize_text_field( $_POST['bddex_portfolio_new_field'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, 'portfolio_link', $my_data );
}
add_action( 'save_post', 'bddex_portfolio_save_meta_box_data' );

// project details meta
function bddex_project_meta_box() {

    add_meta_box(
        'project_sectionid',
        esc_html__( 'Project Details', 'avas-core' ),
        'bddex_project_meta_box_callback',
        'portfolio-item',              // post type
        'normal'
    );

}
add_action( 'add_meta_boxes', 'bddex_project_meta_box' );

/**
 * Prints the box content.
 *
 * @param WP_Post $post The object for the current post/page.
 */
function bddex_project_meta_box_callback( $post ) {

// Add a nonce field so we can check for it later.
wp_nonce_field( 'bddex_project_save_meta_box_data', 'bddex_project_meta_box_nonce' );

/*
 * Use get_post_meta() to retrieve an existing value
 * from the database and use the value for the form.
 */
$project_type = get_post_meta( $post->ID, 'project_type', true );
$project_size = get_post_meta( $post->ID, 'project_size', true );
$project_completion_date = get_post_meta( $post->ID, 'project_completion_date', true );
$project_contract_value = get_post_meta( $post->ID, 'project_contract_value', true );
$project_client = get_post_meta( $post->ID, 'project_client', true );
$under_construction = get_post_meta( $post->ID, 'under_construction', true );



echo '<table class="form-table">';

echo '<tr>';
echo '<th><label for="project_type">';
esc_html_e( 'Project Type', 'avas-core' );
echo '</label></th>';
echo '<td><input type="text" id="project_type" name="project_type" value="' . esc_attr( $project_type ) . '" size="50" /></td>';
echo '</tr>';

echo '<tr>';
echo '<th><label for="project_size">';
esc_html_e( 'Project Size', 'avas-core' );
echo '</label></th>';
echo '<td><input type="text" id="project_size" name="project_size" value="' . esc_attr( $project_size ) . '" size="50" /></td>';
echo '</tr>';

echo '<tr>';
echo '<th><label for="project_completion_date">';
esc_html_e( 'Completion Date', 'avas-core' );
echo '</label></th>';
echo '<td><input type="text" id="project_completion_date" name="project_completion_date" value="' . esc_attr( $project_completion_date ) . '" size="50" /></td>';
echo '</tr>';

echo '<tr>';
echo '<th><label for="project_contract_value">';
esc_html_e( 'Contract Value', 'avas-core' );
echo '</label></th>';
echo '<td><input type="text" id="project_contract_value" name="project_contract_value" value="' . esc_attr( $project_contract_value ) . '" size="50" /></td>';
echo '</tr>';

echo '<tr>';
echo '<th><label for="project_client">';
esc_html_e( 'Client', 'avas-core' );
echo '</label></th>';
echo '<td><input type="text" id="project_client" name="project_client" value="' . esc_attr( $project_client ) . '" size="50" /></td>';
echo '</tr>';

echo '<tr>';
echo '<th><label for="under_construction">';
esc_html_e( 'Completion %', 'avas-core' );
echo '</label></th>';
echo '<td><input type="text" id="under_construction" name="under_construction" value="' . esc_attr( $under_construction ) . '" size="5" /></td>';
echo '</tr>';

echo '</table>';

}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
 function bddex_project_save_meta_box_data( $post_id ) {

 if ( ! isset( $_POST['bddex_project_meta_box_nonce'] ) ) {
    return;
 }

 if ( ! wp_verify_nonce( $_POST['bddex_project_meta_box_nonce'], 'bddex_project_save_meta_box_data' ) ) {
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
        return ;
    }
 }


// Sanitize user input
$project_type_data = isset( $_POST[ 'project_type' ] ) ? sanitize_text_field( $_POST[ 'project_type' ] ) : '';
$project_size_data = isset( $_POST[ 'project_size' ] ) ? sanitize_text_field( $_POST[ 'project_size' ] ) : '';
$project_completion_date_data = isset( $_POST[ 'project_completion_date' ] ) ? sanitize_text_field( $_POST[ 'project_completion_date' ] ) : '';
$project_contract_value_data = isset( $_POST[ 'project_contract_value' ] ) ? sanitize_text_field( $_POST[ 'project_contract_value' ] ) : '';
$project_client_data = isset( $_POST[ 'project_client' ] ) ? sanitize_text_field( $_POST[ 'project_client' ] ) : '';
$under_construction_data = isset( $_POST[ 'under_construction' ] ) ? sanitize_text_field( $_POST[ 'under_construction' ] ) : '';
// Update the meta field in the database
update_post_meta( $post_id, 'project_type', $project_type_data );
update_post_meta( $post_id, 'project_size', $project_size_data );
update_post_meta( $post_id, 'project_completion_date', $project_completion_date_data );
update_post_meta( $post_id, 'project_contract_value', $project_contract_value_data );
update_post_meta( $post_id, 'project_client', $project_client_data );
update_post_meta( $post_id, 'under_construction', $under_construction_data );

}
add_action( 'save_post', 'bddex_project_save_meta_box_data' );

/* ---------------------------------------------------------
   EOF
------------------------------------------------------------ */ 