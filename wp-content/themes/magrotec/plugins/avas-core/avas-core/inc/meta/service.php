<?php
/**
* @package bddex
* @author theme-x
* @link https://x-theme.com/
*
*/


function bddex_service_meta_boxes() {  
    add_meta_box('bddex_attachment', 'Brochure', 'bddex_attachment', 'service', 'normal', 'high');  
}
add_action('add_meta_boxes', 'bddex_service_meta_boxes');  

if(!function_exists('bddex_attachment')) :
function bddex_attachment() {  
    wp_nonce_field(plugin_basename(__FILE__), 'bddex_attachment_nonce');
    $html = '<p class="description">';
    $html .= 'Upload your PDF here.';
    $html .= '</p>';
    $html .= '<input type="file" id="bddex_attachment" name="bddex_attachment" value="" size="25">';

 // Grab the array of file information currently associated with the post
    $doc = get_post_meta(get_the_ID(), 'bddex_attachment', true);

if( !empty($doc) ){

$html .= '<p>' . $doc['url'] . '</p>';


} // end !empty


    echo $html;
}
endif;

add_action('save_post', 'bddex_save_service_meta_data');
function bddex_save_service_meta_data($id) {
    if(!empty($_FILES['bddex_attachment']['name'])) {
        $supported_types = array('application/pdf');
        $arr_file_type = wp_check_filetype(basename($_FILES['bddex_attachment']['name']));
        $uploaded_type = $arr_file_type['type'];

        if(in_array($uploaded_type, $supported_types)) {
        	WP_Filesystem();
            global $wp_filesystem;
            $upload = wp_upload_bits($_FILES['bddex_attachment']['name'], null, $wp_filesystem->get_contents($_FILES['bddex_attachment']['tmp_name'])); //consider theme check
            if(isset($upload['error']) && $upload['error'] != 0) {
                wp_die('There was an error uploading your file. The error is: ' . $upload['error']);
            } else {
//                 
                $upload['file'] = str_replace('\\', '/', $upload['file']);
add_post_meta($id, 'bddex_attachment', $upload);
update_post_meta($id, 'bddex_attachment', $upload);
add_post_meta($id, 'bddex_attachment_url', $_POST['bddex_attachment_url']);
update_post_meta($id, 'bddex_attachment_url', $_POST['bddex_attachment_url']);
            }
        }
        else {
            wp_die("The file type that you've uploaded is not a PDF.");

        } // end else

// Grab the value for the URL to the file stored in the text element
$delete_flag = $_POST['bddex_attachment_url'];

// Determine if a file is associated with this post and if the delete flag has been set (by clearing out the input box)
if(strlen(trim($doc['url'])) > 0 && strlen(trim($delete_flag)) === 0) 
{
// Attempt to remove the file. If deleting it fails, print a WordPress error.
if(unlink($doc['file']))
{
// Delete succeeded so reset the WordPress meta data
update_post_meta($id, 'bddex_attachment', null);
update_post_meta($id, 'bddex_attachment_url', '');
} else 
{
wp_die('There was an error trying to delete your file.');
}
}

    } // end if
}
if(!function_exists('bddex_update_edit_form')) :
function bddex_update_edit_form() {
    echo ' enctype="multipart/form-data"';
}
endif;
add_action('post_edit_form_tag', 'bddex_update_edit_form');

/* ---------------------------------------------------------
   EOF
------------------------------------------------------------ */ 