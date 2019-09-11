<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com/
*
*
*/
global $bddex;
/* ---------------------------------------------------------
  Social media
------------------------------------------------------------ */
if (!function_exists('bddex_social_media')) :
add_action( 'bddex_social_media', 'bddex_social_media' );
add_shortcode( 'avas-social-media', 'bddex_social_media' );

function bddex_social_media() { 
    global $bddex; 
    ob_start();
    ?>
    <ul class="social">
        <?php if ($bddex['facebook']) : ?>
        <li><a href="<?php echo esc_html($bddex['facebook']); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
        <?php endif; ?>
        <?php if ($bddex['twitter']) : ?>
        <li><a href="<?php echo esc_html($bddex['twitter']); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
        <?php endif; ?>
        <?php if ($bddex['google-plus']) : ?>
        <li><a href="<?php echo esc_html($bddex['google-plus']); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
        <?php endif; ?>
        <?php if ($bddex['linkedin']) : ?>
        <li><a href="<?php echo esc_html($bddex['linkedin']); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
        <?php endif; ?>
        <?php if ($bddex['youtube']) : ?>
        <li><a href="<?php echo esc_html($bddex['youtube']); ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
        <?php endif; ?>
        <?php if ($bddex['instagram']) : ?>
        <li><a href="<?php echo esc_html($bddex['instagram']); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
        <?php endif; ?>
        <?php if ($bddex['pinterest']) : ?>
        <li><a href="<?php echo esc_html($bddex['pinterest']); ?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
        <?php endif; ?>
    </ul> 
    <?php
    return ob_get_clean();
} 
endif;
/* ---------------------------------------------------------
    Social Share
------------------------------------------------------------ */

if (!function_exists('bddex_social_share_header')) :
add_action( 'bddex_social_share_header', 'bddex_social_share_header' );
function bddex_social_share_header() {
global $bddex;
  if($bddex['social-share-header']) {
  global $post;

    // Get current page URL 
    $SSURL = urlencode(get_permalink());
 
    // Get current page title
    $SSTitle = str_replace( ' ', '%20', get_the_title());
    
    // Get Post Thumbnail
    $SSThumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
 
    $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$SSURL;
    $twitterURL = 'https://twitter.com/intent/tweet?text='.$SSTitle.'&amp;url='.$SSURL;
    $googleURL = 'https://plus.google.com/share?url='.$SSURL;
    $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$SSURL.'&amp;title='.$SSTitle;
    $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$SSURL.'&amp;media='.$SSThumb[0].'&amp;description='.$SSTitle;
    
    $html = '';
    $html .= '<span class="social-share-header">';
    $html .= '<span class="share-on">'.esc_html__( 'Share on','avas-core' ).'</span>';
    $html .= '<a class="ss-fb" href="'.$facebookURL.'" target="_blank"><i class="fa fa-facebook"></i></a>';
    $html .= '<a class="ss-tw" href="'. $twitterURL .'" target="_blank"><i class="fa fa-twitter"></i></a>';
    $html .= '<a class="ss-gp" href="'.$googleURL.'" target="_blank"><i class="fa fa-google-plus"></i></a>';
    $html .= '<a class="ss-ln" href="'.$linkedInURL.'" target="_blank"><i class="fa fa-linkedin"></i></a>';
    $html .= '<a class="ss-pin" href="'.$pinterestURL.'" data-pin-custom="true" target="_blank"><i class="fa fa-pinterest-p"></i></a>';
    $html .= '</span>';

    return print $html;
 
  } 
}
endif;


// social share on footer of post

if (!function_exists('bddex_social_share')) :
add_action( 'bddex_social_share', 'bddex_social_share' );
function bddex_social_share() {
  global $post;

    // Get current page URL 
    $SSURL = urlencode(get_permalink());
 
    // Get current page title
    $SSTitle = str_replace( ' ', '%20', get_the_title());
    
    // Get Post Thumbnail
    $SSThumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
 
    $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$SSURL;
    $twitterURL = 'https://twitter.com/intent/tweet?text='.$SSTitle.'&amp;url='.$SSURL;
    $googleURL = 'https://plus.google.com/share?url='.$SSURL;
    $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$SSURL.'&amp;title='.$SSTitle;
    $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$SSURL.'&amp;media='.$SSThumb[0].'&amp;description='.$SSTitle;
    
    $html = '';
    $html .= '<div class="social-share">';
    $html .= '<div class="share-on-title">';
    $html .= '<h5>'.esc_html__( 'Share on','avas-core' ).'</h5>';
    $html .= '</div>';
    $html .= '<a class="ss-fb" href="'.$facebookURL.'" target="_blank"><i class="fa fa-facebook"></i> Facebook</a>';
    $html .= '<a class="ss-tw" href="'. $twitterURL .'" target="_blank"><i class="fa fa-twitter"></i> Twitter</a>';
    $html .= '<a class="ss-gp" href="'.$googleURL.'" target="_blank"><i class="fa fa-google-plus"></i> Google+</a>';
    $html .= '<a class="ss-ln" href="'.$linkedInURL.'" target="_blank"><i class="fa fa-linkedin"></i> Linkedin</a>';
    $html .= '<a class="ss-pin" href="'.$pinterestURL.'" data-pin-custom="true" target="_blank"><i class="fa fa-pinterest-p"></i> Pinterest</a>';
    $html .= '</div>';

    return print $html;
 
}
endif;

/* ---------------------------------------------------------
   EOF
------------------------------------------------------------ */ 