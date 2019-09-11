<?php
use Elementor\Group_Control_Image_Size;
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



// Get all forms of Gravity Forms plugin
if ( !function_exists('bddex_get_gravity_forms') ) {
    function bddex_get_gravity_forms() {
        if ( class_exists( 'GFCommon' ) ) {
            $options = array();

            $contact_forms = RGFormsModel::get_forms( null, 'title' );

            if ( ! empty( $contact_forms ) && ! is_wp_error( $contact_forms ) ) {

                $i = 0;

                foreach ( $contact_forms as $form ) {   
                    if ( $i == 0 ) {
                        $options[0] = esc_html__( 'Select a Contact form', 'avas-core' );
                    }
                    $options[ $form->id ] = $form->title;
                    $i++;
                }
            }
        } else {
            $options = array();
        }

        return $options;
    }
}

// Get all forms of Ninja Forms plugin
if ( !function_exists('bddex_get_ninja_forms') ) {
    function bddex_get_ninja_forms() {
        if ( class_exists( 'Ninja_Forms' ) ) {
            $options = array();

            $contact_forms = Ninja_Forms()->form()->get_forms();

            if ( ! empty( $contact_forms ) && ! is_wp_error( $contact_forms ) ) {

                $i = 0;

                foreach ( $contact_forms as $form ) {   
                    if ( $i == 0 ) {
                        $options[0] = esc_html__( 'Select a Contact form', 'avas-core' );
                    }
                    $options[ $form->get_id() ] = $form->get_setting( 'title' );
                    $i++;
                }
            }
        } else {
            $options = array();
        }

        return $options;
    }
}

// Get all forms of Caldera plugin
if ( !function_exists('bddex_get_caldera_forms') ) {
    function bddex_get_caldera_forms() {
        if ( class_exists( 'Caldera_Forms' ) ) {
            $options = array();

            $contact_forms = Caldera_Forms_Forms::get_forms( true, true );

            if ( ! empty( $contact_forms ) && ! is_wp_error( $contact_forms ) ) {

            $i = 0;

            foreach ( $contact_forms as $form ) {   
                if ( $i == 0 ) {
                    $options[0] = esc_html__( 'Select a Contact form', 'avas-core' );
                }
                $options[ $form['ID'] ] = $form['name'];
                $i++;
            }
            }
        } else {
            $options = array();
        }

        return $options;
    }
}

// Get all forms of WPForms plugin
if ( !function_exists('bddex_get_wpforms_forms') ) {
    function bddex_get_wpforms_forms() {
        if ( class_exists( 'WPForms' ) ) {
            $options = array();

            $args = array(
                'post_type'         => 'wpforms',
                'posts_per_page'    => -1
            );

            $contact_forms = get_posts( $args );

            if ( ! empty( $contact_forms ) && ! is_wp_error( $contact_forms ) ) {

            $i = 0;

            foreach ( $contact_forms as $post ) {   
                if ( $i == 0 ) {
                    $options[0] = esc_html__( 'Select a Contact form', 'avas-core' );
                }
                $options[ $post->ID ] = $post->post_title;
                $i++;
            }
            }
        } else {
            $options = array();
        }

        return $options;
    }
}

// Get categories
if ( !function_exists('bddex_get_post_categories') ) {
    function bddex_get_post_categories() {

        $options = array();
        
        $terms = get_terms( array( 
            'taxonomy'      => 'category',
            'hide_empty'    => true,
        ));

        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
            foreach ( $terms as $term ) {
                $options[ $term->term_id ] = $term->name;
            }
        }

        return $options;
    }
}

// Get Post Types
if ( !function_exists('bddex_get_post_types') ) {
    function bddex_get_post_types() {

        $bddex_post_types = get_post_types( array(
            'public'            => true,
            'show_in_nav_menus' => true
        ) );

        return $bddex_post_types;
    }
}

// Get all Authors
if ( !function_exists('bddex_get_auhtors') ) {
    function bddex_get_auhtors() {

        $options = array();

        $users = get_users();

        foreach ( $users as $user ) {
            $options[ $user->ID ] = $user->display_name;
        }

        return $options;
    }
}

// Get all Authors
if ( !function_exists('bddex_get_tags') ) {
    function bddex_get_tags() {

        $options = array();

        $tags = get_tags();

        foreach ( $tags as $tag ) {
            $options[ $tag->term_id ] = $tag->name;
        }

        return $options;
    }
}

// Get all Posts
if ( !function_exists('bddex_get_posts') ) {
    function bddex_get_posts() {

        $post_list = get_posts( array(
            'post_type'         => 'post',
            'orderby'           => 'date',
            'order'             => 'DESC',
            'posts_per_page'    => -1,
        ) );

        $posts = array();

        if ( ! empty( $post_list ) && ! is_wp_error( $post_list ) ) {
            foreach ( $post_list as $post ) {
               $posts[ $post->ID ] = $post->post_title;
            }
        }

        return $posts;
    }
}

// Custom Excerpt
if ( !function_exists('bddex_custom_excerpt') ) {
    function bddex_custom_excerpt( $limit ) {
        $excerpt = explode(' ', get_the_excerpt(), $limit);
        if ( count( $excerpt ) >= $limit ) {
            array_pop( $excerpt );
            $excerpt = implode( " ", $excerpt ).'...';
        } else {
            $excerpt = implode( " ", $excerpt );
        }
        $excerpt = preg_replace( '`[[^]]*]`', '', $excerpt );
        return $excerpt;
    }
}
add_filter( 'get_the_excerpt', 'do_shortcode' );

if ( !function_exists('bddex_get_image_alt') ) {
function bddex_get_image_alt($attachment_id) {

    if (empty($attachment_id)) {
        return '';
    }

    if (!$attachment_id) {
        return '';
    }

    $attachment = get_post($attachment_id);
    if (!$attachment) {
        return '';
    }

    $alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
    if (!$alt) {
        $alt = $attachment->post_excerpt;
        if (!$alt) {
            $alt = $attachment->post_title;
        }
    }
    return trim(strip_tags($alt));
}
}

if ( !function_exists('bddex_get_image_html') ) {
function bddex_get_image_html($image_setting, $image_size_key, $settings) {

    $image_html = '';

    $attachment_id = $image_setting['id'];

    // Old version of image settings.
    if (!isset($settings[$image_size_key . '_size'])) {
        $settings[$image_size_key . '_size'] = '';
    }

    $size = $settings[$image_size_key . '_size'];

    $image_class = 'lae-image';

    // If is the new version - with image size.
    $image_sizes = get_intermediate_image_sizes();

    $image_sizes[] = 'full';

    if (!empty($attachment_id) && in_array($size, $image_sizes)) {
        $image_class .= " attachment-$size size-$size";

        $image_attr = array(
            'class' => trim($image_class),
        );

        $image_html .= wp_get_attachment_image($attachment_id, $size, false, $image_attr);
    }
    else {
        $image_src = Group_Control_Image_Size::get_attachment_image_src($attachment_id, $image_size_key, $settings);

        if (!$image_src && isset($image_setting['url'])) {
            $image_src = $image_setting['url'];
        }

        if (!empty($image_src)) {
            $image_class_html = !empty($image_class) ? ' class="' . $image_class . '"' : '';

            $image_html .= sprintf('<img src="%s" title="%s" alt="%s"%s />', esc_attr($image_src), get_the_title($attachment_id), bddex_get_image_alt($attachment_id), $image_class_html);
        }
    }

    return $image_html;
}
}

//Query Post Formats
function bddex_post_type_format(){

    $terms = get_terms( array( 
        'taxonomy' => 'post_format',
        'hide_empty' => true,
    ));
    
    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
    foreach ( $terms as $term ) {
        $options[ $term->term_id ] = $term->name;
    }
    }
    
    return $options;
    
}

// title
if(!function_exists('bddex_title_max_charlengths')):

    function bddex_title_max_charlengths($charlength) {

        $title = get_the_title();
        $charlength++;

        if ( mb_strlen( $title ) > $charlength ) {
            $subex = mb_substr( $title, 0, $charlength - 5 );
            $exwords = explode( ' ', $subex );
            $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
            if ( $excut < 0 ) {
                return mb_substr( $subex, 0, $excut );
            } else {
                return $subex;
            }

        } else {
            return $title;
        }
    }

endif;

function bddex_excerpts($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  } 
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

// categoryory list
if(!function_exists('bddex_category_lists')) :
function bddex_category_lists( $catarg ) {
    $catd = array();
    $catd['0'] = 'All Categories';
    $catqu = get_terms( $catarg );
    if(is_array($catqu)){
        foreach ( $catqu as $post ) {
          $catd[ $post->slug ] = $post->name;
        }
    }
    return $catd;
}
endif;


function bddex_get_all_post_type_options() {
    $post_types = get_post_types(array('public' => true), 'objects');
    $options = ['' => ''];
    foreach ($post_types as $post_type) {
        $options[$post_type->name] = $post_type->label;
    }
    return $options;
}
/**
 * Action to handle searching taxonomy terms.
 */
function bddex_get_all_taxonomy_options() {
    global $wpdb;
    $results = array();
    foreach ($wpdb->get_results("
        SELECT terms.slug AS 'slug', terms.name AS 'label', termtaxonomy.taxonomy AS 'type'
        FROM $wpdb->terms AS terms
        JOIN $wpdb->term_taxonomy AS termtaxonomy ON terms.term_id = termtaxonomy.term_id
        LIMIT 999
    ") as $result) {
        $results[$result->type . ':' . $result->slug] = $result->type . ':' . $result->label;
    }
    return $results;
}
function bddex_build_query_args($settings) {
    $query_args = [
        'orderby' => $settings['orderby'],
        'order' => $settings['order'],
        'ignore_sticky_posts' => 1,
        'post_status' => 'publish',
    ];
    if (!empty($settings['post_in'])) {
        $query_args['post_type'] = 'any';
        $query_args['post__in'] = explode(',', $settings['post_in']);
        $query_args['post__in'] = array_map('intval', $query_args['post__in']);
    }
    else {
        if (!empty($settings['post_types'])) {
            $query_args['post_type'] = $settings['post_types'];
        }
        if (!empty($settings['tax_query'])) {
            $tax_queries = $settings['tax_query'];
            $query_args['tax_query'] = array();
            $query_args['tax_query']['relation'] = 'OR';
            foreach ($tax_queries as $tq) {
                list($tax, $term) = explode(':', $tq);
                if (empty($tax) || empty($term))
                    continue;
                $query_args['tax_query'][] = array(
                    'taxonomy' => $tax,
                    'field' => 'slug',
                    'terms' => $term
                );
            }
        }
    }
    $query_args['posts_per_page'] = $settings['posts_per_page'];
    $query_args['paged'] = max(1, get_query_var('paged'), get_query_var('page'));
    return $query_args;
}
function bddex_get_terms($taxonomy) {
    global $wpdb;
    $term_coll = array();
    if (taxonomy_exists($taxonomy)) {
        $terms = get_terms($taxonomy); // Get all terms of a taxonomy
        if ($terms && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                $term_coll[$term->term_id] = $term->name;
            }
        }
    }
    else {
        $qt = 'SELECT * FROM ' . $wpdb->terms . ' AS t INNER JOIN ' . $wpdb->term_taxonomy . ' AS tt ON t.term_id = tt.term_id WHERE tt.taxonomy =  "' . $taxonomy . '" AND tt.count > 0 ORDER BY  t.term_id DESC LIMIT 0 , 30';
        $terms = $wpdb->get_results($qt, ARRAY_A);
        if ($terms && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                $term_coll[$term['term_id']] = $term['name'];
            }
        }
    }
    return $term_coll;
}
function bddex_get_chosen_terms($query_args) {
    $chosen_terms = array();
    $taxonomies = array();
    if (!empty($query_args) && !empty($query_args['tax_query'])) {
        $term_queries = $query_args['tax_query'];
        foreach ($term_queries as $terms_query) {
            if (!is_array($terms_query))
                continue;
            $field = $terms_query['field'];
            $taxonomy = $terms_query['taxonomy'];
            $terms = $terms_query['terms'];
            if (empty($taxonomy) || empty($terms))
                continue;
            if (!in_array($taxonomy, $taxonomies))
                $taxonomies[] = $taxonomy;
            if (is_array($terms)) {
                foreach ($terms as $term) {
                    $chosen_terms[] = get_term_by($field, $term, $taxonomy);
                }
            }
            else {
                $chosen_terms[] = get_term_by($field, $terms, $taxonomy);
            }
        }
    }
    // Remove duplicates
    $taxonomies = array_unique($taxonomies);
    return array($chosen_terms, $taxonomies);
}
function bddex_entry_terms_list($taxonomy = 'category', $separator = ', ', $before = ' ', $after = ' ') {
    global $post;
    $output = '<span class="lae-' . $taxonomy . '-list">';
    $output .= get_the_term_list($post->ID, $taxonomy, $before, $separator, $after);
    $output .= '</span>';
    return $output;
}
function bddex_get_taxonomy_info($taxonomy) {
    $output = '';
    $terms = get_the_terms(get_the_ID(), $taxonomy);
    if (!empty($terms) && !is_wp_error($terms)) {
        $output .= '<span class="lae-terms">';
        $term_count = 0;
        foreach ($terms as $term) {
            if ($term_count != 0)
                $output .= ', ';
            $output .= '<a href="' . get_term_link($term->slug, $taxonomy) . '">' . $term->name . '</a>';
            $term_count = $term_count + 1;
        }
        $output .= '</span>';
    }
    return $output;
}
function bddex_get_info_for_taxonomies($taxonomies) {
    $output = '';
    foreach ($taxonomies as $taxonomy)  {
        $output .= bddex_get_taxonomy_info($taxonomy);
    }
    return $output;
}
function bddex_entry_published($format = null) {
    if (empty($format))
        $format = esc_html__("M d, Y", 'avas-core');
    $published = '<span class="published" title="' . sprintf(get_the_time(esc_html__('l, F, Y, g:i a', 'avas-core'))) . '">' . sprintf(get_the_time($format)) . '</span>';
    return $published;
    $link = '<span class="published">' . '<a href="' . get_day_link(get_the_time(esc_html__('Y', 'avas-core')), get_the_time(esc_html__('m', 'avas-core')), get_the_time(esc_html__('d', 'avas-core'))) . '" title="' . sprintf(get_the_time(esc_html__('l, F, Y, g:i a', 'avas-core'))) . '">' . '<span class="updated">' . get_the_time($format) . '</span>' . '</a></span>';
    return $link;
}
function bddex_entry_author() {
    $author = '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '" title="' . esc_attr(get_the_author_meta('display_name')) . '">' . esc_html(get_the_author_meta('display_name')) . '</a></span>';
    return $author;
}
/* Return the css class name to help achieve the number of columns specified */
function bddex_get_column_class($column_size = 3, $no_margin = false) {
    $style_class = 'lae-threecol';
    $no_margin = bddex_to_boolean($no_margin); // make sure it is not string
    $column_styles = array(
        1 => 'lae-twelvecol',
        2 => 'lae-sixcol',
        3 => 'lae-fourcol',
        4 => 'lae-threecol',
        5 => 'lae-onefifthcol',
        6 => 'lae-twocol',
        12 => 'lae-onecol'
    );
    if (array_key_exists($column_size, $column_styles) && !empty($column_styles[$column_size])) {
        $style_class = $column_styles[$column_size];
    }
    $style_class = $no_margin ? ($style_class . ' lae-zero-margin') : $style_class;
    return $style_class;
}
/*
* Converting string to boolean is a big one in PHP
*/
function bddex_to_boolean($value) {
    if (!isset($value))
        return false;
    if ($value == 'true' || $value == '1')
        $value = true;
    elseif ($value == 'false' || $value == '0')
        $value = false;
    return (bool)$value; // Make sure you do not touch the value if the value is not a string
}
// get all registered taxonomies
function bddex_get_taxonomies_map() {
    $map = array();
    $taxonomies = get_taxonomies();
    foreach ($taxonomies as $taxonomy) {
        $map [$taxonomy] = $taxonomy;
    }
    return $map;
}
/**
 * Lightens/darkens a given colour (hex format), returning the altered colour in hex format.7
 * @param str $hex Colour as hexadecimal (with or without hash);
 * @percent float $percent Decimal ( 0.2 = lighten by 20%(), -0.4 = darken by 40%() )
 * @return str Lightened/Darkend colour as hexadecimal (with hash);
 */
function bddex_color_luminance($hex, $percent) {
    // validate hex string
    $hex = preg_replace('/[^0-9a-f]/i', '', $hex);
    $new_hex = '#';
    if (strlen($hex) < 6) {
        $hex = $hex[0] + $hex[0] + $hex[1] + $hex[1] + $hex[2] + $hex[2];
    }
    // convert to decimal and change luminosity
    for ($i = 0; $i < 3; $i++) {
        $dec = hexdec(substr($hex, $i * 2, 2));
        $dec = min(max(0, $dec + $dec * $percent), 255);
        $new_hex .= str_pad(dechex($dec), 2, 0, STR_PAD_LEFT);
    }
    return $new_hex;
}
function bddex_get_option($option_name, $default = null) {
    $settings = get_option('lae_settings');
    if (!empty($settings) && isset($settings[$option_name]))
        $option_value = $settings[$option_name];
    else
        $option_value = $default;
    return $option_value;
}
function bddex_update_option($option_name, $option_value) {
    $settings = get_option('lae_settings');
    if (empty($settings))
        $settings = array();
    $settings[$option_name] = $option_value;
    update_option('lae_settings', $settings);
}
/**
 * Update multiple options in one go
 * @param array $setting_data An collection of settings key value pairs;
 */
function bddex_update_options($setting_data) {
    $settings = get_option('lae_settings');
    if (empty($settings))
        $settings = array();
    foreach ($setting_data as $setting => $value) {
        // because of get_magic_quotes_gpc()
        $value = stripslashes($value);
        $settings[$setting] = $value;
    }
    update_option('lae_settings', $settings);
}
function bddex_get_animation_atts($animation) {
    $animate_class = "";
    $animation_attr = "";
    if ($animation != "none") {
        $animate_class = ' lae-animate-on-scroll';
        if (in_array(
            $animation,
            array('bounceIn', 'bounceInUp', 'bounceInDown', 'bounceInLeft', 'bounceInRight',
                  'fadeIn', 'fadeInLeft', 'fadeInRight', 'fadeInUp', 'fadeInDown',
                  'fadeInLeftBig', 'fadeInRightBig', 'fadeInUpBig', 'fadeInDownBig',
                  'flipInX', 'flipInY',
                  'lightSpeedIn',
                  'rotateIn', 'rotateInDownLeft', 'rotateInDownRight', 'rotateInUpLeft', 'rotateInUpRight',
                  'slideInUp', 'slideInDown', 'slideInLeft', 'slideInRight',
                  'zoomIn', 'zoomInUp', 'zoomInDown', 'zoomInLeft', 'zoomInRight',
                  'rollIn'
            ))) {
            $animate_class .= ' lae-visible-on-scroll';
        }
        $animation_attr = ' data-animation="' . esc_attr($animation) . '"';
    }
    return array($animate_class, $animation_attr);
}
// eof



function bddex_category_list( $catarg ){
    $catd = array();
    $catd['0'] = 'All Categories';
    $catqu = get_terms( $catarg );
    if(is_array($catqu)){
        foreach ( $catqu as $post ) {
          $catd[ $post->slug ] = $post->name;
        }
    }
    return $catd;
}

function bddex_category_list2( $catarg ){
    $catd = array();
    $catd['allitem'] = 'All Categories';
    $catqu = get_terms( $catarg );
    if(is_array($catqu)){
        foreach ( $catqu as $post ) {
          $catd[ $post->term_id ] = $post->name;
        }
    }
    return $catd;
}


if(!function_exists('bddex_excerpt_max_charlength')):

    function bddex_excerpt_max_charlength($charlength) {

        $excerpt = get_the_excerpt();
        $charlength++;

        if ( mb_strlen( $excerpt ) > $charlength ) {
            $subex = mb_substr( $excerpt, 0, $charlength - 5 );
            $exwords = explode( ' ', $subex );
            $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
            if ( $excut < 0 ) {
                return mb_substr( $subex, 0, $excut );
            } else {
                return $subex;
            }

        } else {
            return $excerpt;
        }
    }

endif;


if(!function_exists('bddex_title_max_charlength')):

    function bddex_title_max_charlength($charlength) {

        $title = get_the_title();
        $charlength++;

        if ( mb_strlen( $title ) > $charlength ) {
            $subex = mb_substr( $title, 0, $charlength - 5 );
            $exwords = explode( ' ', $subex );
            $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
            if ( $excut < 0 ) {
                return mb_substr( $subex, 0, $excut );
            } else {
                return $subex;
            }

        } else {
            return $title;
        }
    }

endif;

add_action('wp_ajax_lae_load_gallery_items', 'bddex_load_gallery_items_callback');

add_action('wp_ajax_nopriv_lae_load_gallery_items', 'bddex_load_gallery_items_callback');

function bddex_load_gallery_items_callback() {
    $items = bddex_parse_items($_POST['items']);
    $settings = bddex_parse_gallery_settings($_POST['settings']);
    $paged = intval($_POST['paged']);

    bddex_display_gallery($items, $settings, $paged);

    wp_die();

}

function bddex_parse_items($items) {

    return $items;
}

function bddex_parse_gallery_settings($settings) {

    $s = $settings;

    $s['filterable'] = filter_var($s['filterable'], FILTER_VALIDATE_BOOLEAN);
    $s['per_line'] = filter_var($s['per_line'], FILTER_VALIDATE_INT);
    $s['items_per_page'] = filter_var($s['items_per_page'], FILTER_VALIDATE_INT);

    return $s;
}

function bddex_display_gallery($items, $settings, $paged = 1) {


    $num_of_columns = intval($settings['per_line']);
    $items_per_page = intval($settings['items_per_page']); ?>

    <?php $column_style = bddex_get_column_class($num_of_columns); ?>

    <?php
    // If pagination option is chosen, filter the items for the current page
    if ($settings['pagination'] != 'none')
        $items = bddex_get_items_to_display($items, $paged, $items_per_page);
    ?>

    <?php foreach ($items as $item): ?>

        <?php

        $style = '';
        if (!empty($item['item_tags'])) {
            $terms = explode(',', $item['item_tags']);

            foreach ($terms as $term) {
                // Get rid of spaces before adding the term
                $style .= ' term-' . preg_replace('/\s+/', '-', $term);
            }
        }
        ?>

        <?php

        $item_type = $item['item_type'];
        $item_class = 'lae-' . $item_type . '-type';

        ?>

        <div
            class="lae-gallery-item <?php echo $style; ?> <?php echo $column_style; ?> <?php echo $item_class; ?> lae-zero-margin">

            <div class="lae-project-image">

                <?php if ($item_type == 'image' && !empty($item['item_image']) && !empty($item['item_link']['url'])): ?>

                    <a href="<?php echo esc_url($item['item_link']['url']); ?>"
                       title="<?php echo esc_html($item['item_name']); ?>"><?php echo wp_get_attachment_image($item['item_image']['id'], 'large', false, array('class' => 'lae-image large', 'alt' => $item['item_name'])); ?> </a>

                <?php else: ?>

                    <?php echo wp_get_attachment_image($item['item_image']['id'], 'large', false, array('class' => 'lae-image large', 'alt' => $item['item_name'])); ?>

                <?php endif; ?>

                <div class="lae-image-info">

                    <div class="lae-entry-info">

                        <<?php echo $settings['item_title_tag']; ?> class="lae-entry-title">

                            <?php if ($item_type == 'image' && !empty($item['item_link']['url'])): ?>

                                <?php $target = $item['item_link']['is_external'] ? 'target="_blank"' : ''; ?>

                                <a href="<?php echo esc_url($item['item_link']['url']); ?>"
                                   title="<?php echo esc_html($item['item_name']); ?>"
                                   <?php echo $target; ?>><?php echo esc_html($item['item_name']); ?></a>

                            <?php else: ?>

                                <?php echo esc_html($item['item_name']); ?>

                            <?php endif; ?>

                        </<?php echo $settings['item_title_tag']; ?>>

                        <?php if ($item_type == 'youtube' || $item_type == 'vimeo') : ?>

                            <?php
                            $video_url = $item['video_link'];
                            ?>
                            <?php if (!empty($video_url)) : ?>

                                <a class="lae-video-lightbox"
                                   href="<?php echo $video_url; ?>"
                                   title="<?php echo esc_html($item['item_name']); ?>"><i
                                        class="lae-icon-video-play"></i></a>

                            <?php endif; ?>

                        <?php endif; ?>

                        <span class="lae-terms"><?php echo esc_html($item['item_tags']); ?></span>

                    </div>

                    <?php if ($item_type == 'image' && !empty($item['item_image']) && $settings['enable_lightbox']) : ?>

                        <?php
                        $image_data = wp_get_attachment_image_src($item['item_image']['id'], 'full');
                        ?>
                        <?php if ($image_data) : ?>

                            <?php $image_src = $image_data[0]; ?>

                            <a class="lae-lightbox-item"
                               href="<?php echo $image_src; ?>"
                               title="<?php echo esc_html($item['item_name']); ?>"><i
                                    class="lae-icon-full-screen"></i></a>

                        <?php endif; ?>

                    <?php endif; ?>


                </div>

                <div class="lae-image-overlay"></div>

            </div>

        </div>

        <?php

    endforeach;

}

function bddex_get_gallery_terms($items) {

    $tags = $terms = array();

    foreach ($items as $item) {
        $tags = array_merge($tags, explode(',', $item['item_tags']));
    }
    $terms = array_values(array_unique($tags));

    return $terms;

}

function bddex_get_items_to_display($items, $paged, $items_per_page) {

    $offset = $items_per_page * ($paged - 1);

    $items = array_slice($items, $offset, $items_per_page);

    return $items;
}

function bddex_paginate_gallery($items, $settings) {

    $pagination_type = $settings['pagination'];

    // no pagination required if option is not chosen by user or if all posts are already displayed
    if ($pagination_type == 'none' || count($items) <= $settings['items_per_page'])
        return;

    $max_num_pages = ceil(count($items) / $settings['items_per_page']);

    $output = '<div class="lae-pagination">';

    if ($pagination_type == 'load_more') {
        $output .= '<a href="#" class="lae-load-more lae-button">';
        $output .= esc_html__('Load More', 'avas-core');
        if ($settings['show_remaining'])
            $output .= ' - ' . '<span>' . (count($items) - $settings['items_per_page']) . '</span>';
        $output .= '</a>';
    }
    else {
        $page_links = array();

        for ($n = 1; $n <= $max_num_pages; $n++) :
            $page_links[] = '<a class="lae-page-nav' . ($n == 1 ? ' lae-current-page' : '') . '" href="#" data-page="' . $n . '">' . number_format_i18n($n) . '</a>';
        endfor;

        $r = join("\n", $page_links);

        if (!empty($page_links)) {
            $prev_link = '<a class="lae-page-nav lae-disabled" href="#" data-page="prev"><i class="lae-icon-arrow-left3"></i></a>';
            $next_link = '<a class="lae-page-nav" href="#" data-page="next"><i class="lae-icon-arrow-right3"></i></a>';

            $output .= $prev_link . "\n" . $r . "\n" . $next_link;
        }
    }

    $output .= '<span class="lae-loading"></span>';

    $output .= '</div>';

    return $output;

}

/** Isotope filtering support for Gallery * */

function bddex_get_gallery_terms_filter($terms) {

    $output = '';

    if (!empty($terms)) {

        $output .= '<div class="lae-taxonomy-filter">';

        $output .= '<div class="lae-filter-item segment-0 lae-active"><a data-value="*" href="#">' . esc_html__('All', 'avas-core') . '</a></div>';

        $segment_count = 1;
        foreach ($terms as $term) {

            $output .= '<div class="lae-filter-item segment-' . intval($segment_count) . '"><a href="#" data-value=".term-' . preg_replace('/\s+/', '-', $term) . '" title="' . esc_html__('View all items filed under ', 'avas-core') . esc_attr($term) . '">' . esc_html($term) . '</a></div>';

            $segment_count++;
        }

        $output .= '</div>';

    }

    return $output;
}

function bddex_posts_grid($loop, $settings, $taxonomies) {

    $column_style = bddex_get_column_class(intval($settings['per_line'])); ?>

    <?php $current_page = get_queried_object_id(); ?>

    <?php while ($loop->have_posts()) : $loop->the_post(); ?>

        <?php $post_id = get_the_ID(); ?>

        <?php
        if ($post_id === $current_page)
            continue; // skip current page since we can run into infinite loop when users choose All option in build query
        ?>

        <?php
        $style = '';
        foreach ($taxonomies as $taxonomy) {
            $terms = get_the_terms($post_id, $taxonomy);
            if (!empty($terms) && !is_wp_error($terms)) {
                foreach ($terms as $term) {
                    $style .= ' term-' . $term->term_id;
                }
            }
        }
        ?>

        <div data-id="id-<?php echo $post_id; ?>"
             class="lae-portfolio-item <?php echo $style; ?> <?php echo $column_style; ?> lae-zero-margin">

            <article id="post-<?php echo $post_id; ?>" <?php post_class(); ?>>

                <?php if ($thumbnail_exists = has_post_thumbnail()): ?>

                    <div class="lae-project-image">

                        <?php if ($settings['image_linkable'] == 'yes'): ?>

                            <a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('large'); ?> </a>

                        <?php else: ?>

                            <?php the_post_thumbnail('large'); ?>

                        <?php endif; ?>

                        <div class="lae-image-info">

                            <div class="lae-entry-info">

                                <?php the_title('<'. $settings['title_tag']. ' class="lae-post-title"><a href="' . get_permalink() . '" title="' . get_the_title() . '"
                                               rel="bookmark">', '</a></'. $settings['title_tag'] . '>'); ?>

                                <?php echo bddex_get_info_for_taxonomies($taxonomies); ?>

                            </div>

                            <?php if ($settings['enable_lightbox'] == 'yes') : ?>

                                <?php
                                $featured_image_id = get_post_thumbnail_id($post_id);
                                $featured_image_data = wp_get_attachment_image_src($featured_image_id, 'full');
                                ?>
                                <?php if ($featured_image_data) : ?>

                                    <?php $featured_image_src = $featured_image_data[0]; ?>

                                    <a class="lae-lightbox-item"
                                       href="<?php echo $featured_image_src; ?>"
                                       title="<?php echo get_the_title(); ?>"><i
                                                class="lae-icon-full-screen"></i></a>

                                <?php endif; ?>

                            <?php endif; ?>

                        </div>

                        <div class="lae-image-overlay"></div>

                    </div>

                <?php endif; ?>

                <?php if (($settings['display_title'] == 'yes') || ($settings['display_summary'] == 'yes')) : ?>

                    <div
                            class="lae-entry-text-wrap <?php echo($thumbnail_exists ? '' : ' nothumbnail'); ?>">

                        <?php if ($settings['display_title'] == 'yes') : ?>

                            <?php the_title('<'. $settings['entry_title_tag']. ' class="entry-title"><a href="' . get_permalink() . '" title="' . get_the_title() . '"
                                               rel="bookmark">', '</a></'. $settings['entry_title_tag'] . '>'); ?>

                        <?php endif; ?>

                        <?php if (($settings['display_post_date'] == 'yes') || ($settings['display_author'] == 'yes') || ($settings['display_taxonomy'] == 'yes')) : ?>

                            <div class="lae-entry-meta">

                                <?php if ($settings['display_author'] == 'yes'): ?>

                                    <?php echo bddex_entry_author(); ?>

                                <?php endif; ?>

                                <?php if ($settings['display_post_date'] == 'yes'): ?>

                                    <?php echo bddex_entry_published(); ?>

                                <?php endif; ?>

                                <?php if ($settings['display_taxonomy'] == 'yes'): ?>

                                    <?php echo bddex_get_info_for_taxonomies($taxonomies); ?>

                                <?php endif; ?>

                            </div>

                        <?php endif; ?>

                        <?php if ($settings['display_summary'] == 'yes') : ?>

                            <div class="entry-summary">

                                <?php echo bddex_excerpt(10); ?>

                            </div>

                        <?php endif; ?>

                    </div>

                <?php endif; ?>

            </article><!-- .hentry -->

        </div>

    <?php endwhile; ?>

    <?php wp_reset_postdata(); ?>

    <?php

}


/** Isotope filtering support for Portfolio pages **/

function bddex_get_taxonomy_terms_filter($taxonomies, $chosen_terms = array()) {

    $output = '';
    $terms = array();

    if (empty($chosen_terms)) {

        foreach ($taxonomies as $taxonomy) {

            global $wp_version;

            if (version_compare($wp_version, '4.5', '>=')) {
                $taxonomy_terms = get_terms(array('taxonomy' => $taxonomy));
            }
            else {
                $taxonomy_terms = get_terms($taxonomy);
            }
            if (!empty($taxonomy_terms) && !is_wp_error($taxonomy_terms))
                $terms = array_merge($terms, $taxonomy_terms);
        }
    }
    else {
        $terms = $chosen_terms;
    }

    if (!empty($terms)) {

        $output .= '<div class="lae-taxonomy-filter">';

        $output .= '<div class="lae-filter-item segment-0 lae-active"><a data-value="*" href="#">' . esc_html__('All', 'avas-core') . '</a></div>';

        $segment_count = 1;
        foreach ($terms as $term) {

            $output .= '<div class="lae-filter-item segment-' . intval($segment_count) . '"><a href="#" data-value=".term-' . intval($term->term_id) . '" title="' . esc_html__('View all items filed under ', 'avas-core') . esc_attr($term->name) . '">' . esc_html($term->name) . '</a></div>';

            $segment_count++;
        }

        $output .= '</div>';

    }

    return $output;
}
/* ---------------------------------------------------------
   EOF
------------------------------------------------------------ */
