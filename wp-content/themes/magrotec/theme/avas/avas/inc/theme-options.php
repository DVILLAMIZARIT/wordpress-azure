<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */
    if ( ! class_exists( 'Redux' ) ) {
        return;
    }
    // This is your option name where all the Redux data is stored.
    $opt_name = "bddex";
    $theme = wp_get_theme(); // For use with some settings. Not necessary.
    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => false,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Theme Options', 'avas' ),
        'page_title'           => esc_html__( 'Theme Options', 'avas' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 40,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
        // OPTIONAL -> Give you extra features
        'page_priority'        => 61,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            =>  THEME_DIR.'/assets/img/icon.png',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.
        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.
        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );
    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => esc_url('https://x-theme.com/avas/'),
        'title' => esc_html__('Visit our website', 'avas'),
        'icon'  => 'el el-globe-alt'
    );
    $args['share_icons'][] = array(
        'url'   => esc_url('https://www.facebook.com/avas.wordpress.theme/'),
        'title' => esc_html__('Like us on Facebook', 'avas'),
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => esc_url('https://twitter.com/AvasTheme'),
        'title' => esc_html__('Follow us on Twitter', 'avas'),
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => esc_url('https://plus.google.com/u/3/113877388986624710450'),
        'title' => esc_html__('Foolow us on Google Plus', 'avas'),
        'icon'  => 'el el-googleplus'
    );
    $args['share_icons'][] = array(
        'url'   => esc_url('https://www.youtube.com/channel/UC1hlWYgndZw7PEHWeTbYvfA'),
        'title' => esc_html__('Watch Video Tutorials on Youtube', 'avas'),
        'icon'  => 'el el-youtube'
    );
    Redux::setArgs( $opt_name, $args );
    /*
     * ---> END ARGUMENTS
     */
    /*
     *
     * ---> START SECTIONS
     *
     */
    /*
        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for
     */
    // Header options
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header', 'avas' ),
        'id'               => 'header',
        'customizer_width' => '400px',
        'icon'             => 'el el-website',
        'fields'           =>  array(
                array(
                'id'        => 'header_on_off',
                'type'      => 'switch',
                'default'   => 1,
                'on'        => 'Enable',
                'off'       => 'Disable',
                ),
                array(
                    'id'        => 'preloader',
                    'type'      => 'switch',
                    'title'     => esc_html__('Preloader', 'avas'),
                    'default'   => 0,
                    'on'        => 'On',
                    'off'       => 'Off',
                    'required'  => array( 'header_on_off', '=', '1' ),
                ),
                array(
                    'id'        => 'sticky_header',
                    'type'      => 'switch',
                    'title'     => esc_html__('Sticky Header', 'avas'),
                    'default'   => 0,
                    'on'        => 'On',
                    'off'       => 'Off',
                    'required'  => array( 'header_on_off', '=', '1' ),
                ),
                array(
                    'id'       => 'page-layout',
                    'type'     => 'image_select',
                    'title' => esc_html__('Body Layout', 'avas'),
                    'options'  => array(
                        'width' => array('title' => 'Full', 'img' => THEME_DIR .'/assets/img/body-full.png'),
                        'boxed' => array('title' => 'Boxed', 'img' => THEME_DIR .'/assets/img/body-boxed.png'),
                    ),
                    'default'  => 'width',
                    'required'  => array( 'header_on_off', '=', '1' ),
                ),
                array(
                    'id'    => 'body-background',
                    'title' => esc_html__( 'Body Background', 'avas' ),
                    'type'  => 'background',
                    'output'   => array('background' => 'body'),
                    'default'  => array(
                    'background-color' => '',
                    ),
                    'required'  => array( 'header_on_off', '=', '1' ),
                ),
                array(
                    'id'    => 'wrapper-background',
                    'title' => esc_html__( 'Wrapper Background', 'avas' ),
                    'type'  => 'background',
                    'output'   => array('background'=>'.bx-wrapper'),
                    'default'  => array(
                    'background-color' => '',
                    ),
                    'required'  => array( 'header_on_off', '=', '1' ),
                ),
                array(
                    'id'             => 'wrapper_margin',
                    'type'           => 'spacing',
                    'output'         => array('.bx-wrapper'),
                    'mode'           => 'margin',
                    'units'          => array('px', 'em'),
                    'required'  => array( 'header_on_off', '=', '1' ),
                    'units_extended' => 'false',
                    'title'          => esc_html__('Wrapper Margin', 'avas'),
                    'desc'          => esc_html__('Plase enter Top and Bottom value only. Do not enter Left or Right value otherwise it will break layout. ', 'avas'),
                    'default'            => array(
                    'margin-top'     => '0', 
                    'margin-right'   => '', 
                    'margin-bottom'  => '0', 
                    'margin-left'    => '',
                    'units'          => 'px', 
                    )
                ),
                array(
                    'id'             => 'wrapper_padding',
                    'type'           => 'spacing',
                    'output'         => array('.space-content,.space-single'),
                    'mode'           => 'padding',
                    'units'          => array('px', 'em'),
                    'required'  => array( 'header_on_off', '=', '1' ),
                    'units_extended' => 'false',
                    'title'          => esc_html__('Wrapper Padding', 'avas'),
                    'default'            => array(
                    'padding-top'     => '', 
                    'padding-right'   => '', 
                    'padding-bottom'  => '', 
                    'padding-left'    => '',
                    'units'          => 'px', 
                    )
                ),
                array(
                    'id'       => 'wrapper-border-top',
                    'type'     => 'border',
                    'title'    => esc_html__('Wrapper Top Border', 'avas'),
                    'desc'     => esc_html__( 'Enter border width ex: 1, 2, 3 etc to enable border. 0 to disable.', 'avas' ),
                    'output'   => array('.bx-wrapper'),
                    'color'    => true,
                    'left'     => false,
                    'right'    => false,
                    'bottom'   => false,
                    'default'  => array(
                        'border-color'  => '#686868', 
                        'border-style'  => 'solid', 
                        'border-top'    => '0',
                    ),
                    'required'  => array( 'header_on_off', '=', '1' ),
                ),
                array(
                    'id'        => 'header_layout',
                    'title'     => esc_html__('Header Layout', 'avas'),
                    'required'  => array( 'header_on_off', '=', '1' ),
                    'type'      => 'image_select',
                    'options'   => array (
                        ''      => array('title' => 'Full', 'img' => THEME_DIR .'/assets/img/header-wide.png'),
                        'boxed' => array('title' => 'Boxed', 'img' => THEME_DIR .'/assets/img/header-boxed.png'),
                    ),
                ),
                array(
                    'id'       => 'header_select',
                    'type'     => 'select',
                    'title' => esc_html__('Header Style', 'avas'),
                    'placeholder' => esc_html__('Please select a header', 'avas'),
                    'required'  => array( 'header_on_off', '=', '1' ),
                    'options'  => array(
                        '1' => 'Default',
                        '2' => 'Business',
                        '3' => 'News',
                        '4' => 'Center',
                        '5' => 'Center Menu Top',
                    ),
                    'default'  => '1',
                ),
                array(
                    'id'       => 'header_position',
                    'type'     => 'select',
                    'title' => esc_html__('Header Position', 'avas'),
                    'placeholder' => esc_html__('Please select header position', 'avas'),
                    'required'  => array( 'header_on_off', '=', '1' ),
                    'options'  => array(
                        'absolute' => 'Absolute',
                        'inherit' => 'Inherit',
                    ),
                    'default'  => 'absolute',
                ),
                array(
                'id'            => 'main_head_top_space',
                'type'          => 'slider',
                'title'         => esc_html__( 'Header top space', 'avas' ),
                'required'  => array( 'header_on_off', '=', '1' ),
                'default'       => 0,
                'min'           => 0,
                'step'          => 1,
                'max'           => 300,
                'display_value' => 'text'
                ),
                array(
                    'id'             => 'business_space',
                    'type'           => 'spacing',
                    'output'         => array('.info-box'),
                    'mode'           => 'margin',
                    'units'          => array('px', 'em'),
                    'required'  => array( 'header_select', '=', '2' ),
                    'units_extended' => 'false',
                    'title'          => esc_html__('Space', 'avas'),
                    'default'            => array(
                    'margin-top'     => '27px', 
                    'margin-right'   => '0', 
                    'margin-bottom'  => '27px', 
                    'margin-left'    => '0',
                    'units'          => 'px', 
                    )
                ),
                
                array(
                    'id'       => 'email_time',
                    'type'     => 'select',
                    'title' => esc_html__('Select Email or Time', 'avas'),
                    'required'  => array( 'header_select', '=', '2' ),
                    'placeholder' => esc_html__('Email', 'avas'),
                    'options'  => array(
                        '1' => 'Email',
                        '2' => 'Time',
                    ),
                    'default'  => '1',
                ),
                array(
                    'id'       => 'send_email',
                    'title'    =>  esc_html__('Email', 'avas'),
                    'type'     => 'textarea',
                    'default'  => '<strong>Send Us Email</strong>info@domain.com',
                    'required'  => array( 'email_time', '=', '1' ),
                ),
                array(
                    'id'       => 'working_time',
                    'title'    =>  esc_html__('Time', 'avas'),
                    'type'     => 'textarea',
                    'default'  => '<strong>Working Time</strong>Mon-Sat: 8:00-18:00',
                    'required'  => array( 'email_time', '=', '2' ),
                ),
                array(
                    'id'       => 'call_us',
                    'title'    =>  esc_html__('Phone', 'avas'),
                    'type'     => 'textarea',
                    'default'  => '<strong>Call Us Now</strong> 1-425-443-4337',
                    'required'  => array( 'header_select', '=', '2' ),
                ),
                array(
                    'id'       => 'address',
                    'title'    =>  esc_html__('Address', 'avas'),
                    'type'     => 'textarea',
                    'default'  => '<strong>24 Garfield Road</strong> Virginia, 5470',
                    'required'  => array( 'header_select', '=', '2' ),
                ),
                array(
                    'id'             => 'h-style5-space',
                    'type'           => 'spacing',
                    'output'         => array('#h-style-5'),
                    'mode'           => 'padding',
                    'units'          => array('px', 'em'),
                    'required'  => array( 'header_select', '=', '5' ),
                    'units_extended' => 'false',
                    'title'          => esc_html__('Space', 'avas'),
                    'default'            => array(
                    'padding-top'     => '0px', 
                    'padding-right'   => '0', 
                    'padding-bottom'  => '0px', 
                    'padding-left'    => '0',
                    'units'          => 'px', 
                    )
                ),
                array(
                    'id'    => 'h-style-5-bg',
                    'title' => esc_html__( 'Background', 'avas' ),
                    'type'  => 'background',
                    'output'   => array('background'=>'#h-style-5'),
                    'required'  => array( 'header_select', '=', '5' ),
                    'default'  => array(
                    'background-color' => '',
                    )
                ),
                array(
                    'title'    => esc_html__('Favicon', 'avas'),
                    'id'       => 'bddex-favicon',
                    'required'  => array( 'header_on_off', '=', '1' ),
                    'type'     => 'media',
                    'complier' => true,
                    'url'      => true,
                    'desc'     => esc_html__( 'You can upload png, jpg, gif and ico file for favicon.', 'avas' ),
                    'default'  => array(
                    'url'      => THEME_DIR.'/assets/img/icon.png'
                )),
                array(
                    'title'    => esc_html__('Logo', 'avas'),
                    'id'       => 'bddex_logo',
                    'required'  => array( 'header_on_off', '=', '1' ),
                    'type'     => 'media',
                    'complier' => true,
                    'url'      => true,
                    'desc'     => esc_html__( 'You can upload png, jpg, gif image.', 'avas' ),
                    'default'  => array(
                      'url'=> THEME_DIR.'/assets/img/logo.png'
                )),
                array(
                    'id'       => 'logo_width',
                    'type'     => 'dimensions',
                    'units'    => array('em','px','%'),
                    'title'    => esc_html__('Logo Dimensions', 'avas'),
                    'desc'    => esc_html__('Please set width value only', 'avas'),
                    'output'   => array('.bddex_logo'),
                    'required'  => array( 'header_on_off', '=', '1' ),
                    'width'    => true,
                    'height'   => true,
                ),
                array(
                    'id'             => 'logo_space',
                    'type'           => 'spacing',
                    'output'         => array('#main_head .bddex_logo'),
                    'mode'           => 'padding',
                    'units'          => array('px', 'em'),
                    'required'  => array( 'header_on_off', '=', '1' ),
                    'units_extended' => 'false',
                    'title'          => esc_html__('Logo Space', 'avas'),
                    'default'            => array(
                    'padding-top'     => '23px', 
                    'padding-right'   => '0', 
                    'padding-bottom'  => '23px', 
                    'padding-left'    => '0',
                    'units'          => 'px', 
                    )
                ),
                array(
                    'title'    => esc_html__('Sticky Logo', 'avas'),
                    'id'       => 'bddex_sticky_logo',
                    'required'  => array( 'header_on_off', '=', '1' ),
                    'type'     => 'media',
                    'complier' => true,
                    'url'      => true,
                    'desc'     => esc_html__( 'You can upload png, jpg, gif image.', 'avas' ),
                    'default'  => array(
                      'url'=> THEME_DIR.'/assets/img/sticky-logo.png'
                )),
                array(
                    'id'       => 'sticky_logo_width',
                    'type'     => 'dimensions',
                    'units'    => array('em','px','%'),
                    'title'    => esc_html__('Sticky Logo Dimensions', 'avas'),
                    'desc'    => esc_html__('Please set width value only', 'avas'),
                    'output'   => array('.bddex_sticky_logo'),
                    'required'  => array( 'header_on_off', '=', '1' ),
                    'width'    => true,
                    'height'   => true,
                ),
                array(
                    'id'             => 'sticky_logo_space',
                    'type'           => 'spacing',
                    'output'         => array('#main_head .bddex_sticky_logo'),
                    'mode'           => 'padding',
                    'units'          => array('px', 'em'),
                    'required'  => array( 'header_on_off', '=', '1' ),
                    'units_extended' => 'false',
                    'title'          => esc_html__('Sticky Logo Space', 'avas'),
                    'default'            => array(
                    'padding-top'     => '23px', 
                    'padding-right'   => '0', 
                    'padding-bottom'  => '23px', 
                    'padding-left'    => '0',
                    'units'          => 'px', 
                    )
                ),
                array(
                'id'            => 'mobile-logo-height',
                'type'          => 'slider',
                'title'         => esc_html__( 'Mobile Logo Height', 'avas' ),
                'desc'         => esc_html__( 'You can resize logo in responsive view.', 'avas' ),
                'required'  => array( 'header_on_off', '=', '1' ),
                'default'       => 30,
                'min'           => 0,
                'step'          => 1,
                'max'           => 100,
                'display_value' => 'text'
                ),
                
      
        ) 
        ) ); 
// Top header options
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Top Header', 'avas'),
        'id'               => 'top-header',
        'subsection'       => 'true',
        'customizer_width' => '400px',
        'fields'           => array(
                array(
                'id'        => 'top_head',
                'type'      => 'switch',
                'default'   => 1,
                'on'        => esc_html__('Enable', 'avas'),
                'off'       => esc_html__('Disable', 'avas'),
                ),
                array(
                'id'            => 'top_head_top_space',
                'type'          => 'slider',
                'title'         => esc_html__( 'Top space', 'avas' ),
                'default'       => 0,
                'min'           => 0,
                'step'          => 1,
                'max'           => 300,
                'required'  => array( 'top_head', '=', '1' ),
                'display_value' => 'text'
                ),
                array(
                    'id'             => 'top_head_space',
                    'type'           => 'spacing',
                    'output'         => array('#top_head'),
                    'mode'           => 'padding',
                    'units'          => array('px', 'em'),
                    'units_extended' => 'false',
                    'title'          => esc_html__('Padding', 'avas'),
                    'default'            => array(
                    'padding-top'     => '0px', 
                    'padding-right'   => '0px', 
                    'padding-bottom'  => '0px', 
                    'padding-left'    => '0px',
                    'units'          => 'px', 
                    ),
                    'required'  => array( 'top_head', '=', '1' )
            ),
                array(
                'id'        => 'wel_msg',
                'title'     => esc_html__( 'Welcome Message', 'avas' ),
                'type'      => 'switch',
                'default'   => 0,
                'on'        => esc_html__('On', 'avas'),
                'off'       => esc_html__('Off', 'avas'),
                'required'  => array( 'top_head', '=', '1' )
                ),
                array(
                    'id'       => 'welcome_msg',
                    'type'     => 'textarea',
                    'default'  => esc_html__('Welcome to Avas Business Solution.','avas'),
                    'required'  => array( 'wel_msg', '=', '1' ),
                ),
                array(
                'id'        => 'bddex-date',
                'title'     => esc_html__( 'Date', 'avas' ),
                'type'      => 'switch',
                'default'   => 0,
                'on'        => esc_html__('On', 'avas'),
                'off'       => esc_html__('Off', 'avas'),
                'required'  => array( 'top_head', '=', '1' )
                ),
                array(
                'id'        => 'phone_email',
                'title'     => esc_html__( 'Phone & Email', 'avas' ),
                'type'      => 'switch',
                'default'   => 0,
                'on'        => esc_html__('On', 'avas'),
                'off'       => esc_html__('Off', 'avas'),
                'required'  => array( 'top_head', '=', '1' )
                ),
                array( 
                'title'     => esc_html__( 'Phone', 'avas' ),
                'id'        => 'phone',
                'default'   => esc_html__('+1 229-226-7070', 'avas'),
                'type'      => 'text',
                'required'  => array( 'phone_email', '=', '1' ),
                ),
                array( 
                'title'     => esc_html__( 'Email', 'avas' ),
                'id'        => 'email',
                'default'   => esc_html__('info@domain.com', 'avas'),
                'type'      => 'text',
                'required'  => array( 'phone_email', '=', '1' ),
                ),
                array(
                'id'        => 'top_menu',
                'title'     => esc_html__( 'Top Menu', 'avas' ),
                'type'      => 'switch',
                'default'   => 0,
                'on'        => esc_html__('On', 'avas'),
                'off'       => esc_html__('Off', 'avas'),
                'required'  => array( 'top_head', '=', '1' )
                ),
                array(
                'id'        => 'login_register',
                'title'     => esc_html__( 'Login / Register', 'avas' ),
                'type'      => 'switch',
                'default'   => 0,
                'on'        => esc_html__('On', 'avas'),
                'off'       => esc_html__('Off', 'avas'),
                'required'  => array( 'top_head', '=', '1' )
                ),
                array(
                'id'       => 'login-register',
                'type'     => 'text',
                'title'    => esc_html__('Enter text for Login / Register','avas'),
                'default'  => 'Login / Register',
                'required' => array( 'login_register', '=', '1' ),
                ),
                array(
                'id'       => 'signup-text',
                'type'     => 'text',
                'title'    => esc_html__('Enter register page name','avas'),
                'default'  => 'my-account',
                'desc'     => esc_html__('Example: If you use woocommerce you can enter "my-account" or if you use Learnpress then enter "profile" etc.','avas'),
                'required' => array( 'login_register', '=', '1' ),
                ),
                array(
                'id'        => 'top_socials',
                'title'     => esc_html__( 'Social Icons', 'avas' ),
                'type'      => 'switch',
                'default'   => 0,
                'on'        => esc_html__('On', 'avas'),
                'off'       => esc_html__('Off', 'avas'),
                'required'  => array( 'top_head', '=', '1' )
                ),
            )));    
    // Sub header options
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Sub Header', 'avas'),
        'id'               => 'sub-header',
        'subsection'       => 'true',
        'desc'             => esc_html__( 'Sub header options','avas'),
        'customizer_width' => '400px',
        'fields'           => array(
                array(
                'title'    => esc_html__( 'Enable / Disable','avas'),
                'id'       => 'sub-header-switch',
                'type'     => 'switch',
                'on'       => esc_html__('Enable', 'avas'),
                'off'      => esc_html__('Disable', 'avas'),
                'default'  => 1,
                    ),
               
                array(
                'title'    => esc_html__( 'Title','avas'),
                'id'       => 'sub_h_title',
                'type'     => 'switch',
                'on'       => esc_html__('On', 'avas'),
                'off'      => esc_html__('Off', 'avas'),
                'required' => array('sub-header-switch', '=', '1' ),
                'default'  => 1,
                ),
                array(
                'id'       => 'sub_h_post_title',
                'type'     => 'checkbox',
                'required' => array('sub_h_title', '=', '1' ),
                'options'  => array(
                    'page' => 'Page',
                    'post' => 'Post',
                    'portfolio' =>'Portfolio',
                    'service' =>'Services',
                    'team' =>'Team',
                ),
                'default' => array(
                    'page' => '1', 
                    'post' => '1', 
                    'portfolio' => '1', 
                    'service' => '1', 
                    'team' => '1', 
                )
                ),
                array(
                'title'    => esc_html__( 'Breadcrumbs','avas'),
                'id'       => 'breadcrumbs',
                'type'     => 'switch',
                'on'       => esc_html__('On', 'avas'),
                'off'      => esc_html__('Off', 'avas'),
                'required' => array('sub-header-switch', '=', '1' ),
                'default'  => 1,
                ),
                array(
                'id'       => 'sub_h_post_breadcrumbs',
                'type'     => 'checkbox',
                'required' => array('breadcrumbs', '=', '1' ),
                'options'  => array(
                    'page' => 'Page',
                    'post' => 'Post',
                    'portfolio' =>'Portfolio',
                    'service' =>'Services',
                    'team' =>'Team',
                ),
                'default' => array(
                    'page' => '1', 
                    'post' => '1', 
                    'portfolio' => '1', 
                    'service' => '1', 
                    'team' => '1', 
                )
                ),
                array(
                'title' => esc_html__( 'Title color', 'avas' ),
                'id'    => 'sub-header-title-color',
                'type'  => 'color',
                'output'   => array('.sub-header-title'),
                'required' => array('sub-header-switch', '=', '1' ),
                'default'  => '#fff',
                'transparent' => false,
                ),
                array(
                'title' => esc_html__( 'Link color', 'avas' ),
                'id'    => 'sub-header-link-color',
                'type'  => 'color',
                'output'   => array('.breadcrumbs span a'),
                'required' => array('sub-header-switch', '=', '1' ),
                'default'  => '#fff',
                'transparent' => false,
                ),
                array(
                'title' => esc_html__( 'Link hover color', 'avas' ),
                'id'    => 'sub-header-link-hover-color',
                'type'  => 'color',
                'output'   => array('.breadcrumbs span a:hover'),
                'required' => array('sub-header-switch', '=', '1' ),
                'default'  => '#5a5a5a',
                'transparent' => false,
                ),
                array(
                'title' => esc_html__( 'Separate color', 'avas' ),
                'id'    => 'sub-header-separate-color',
                'type'  => 'color',
                'output'   => array('.breadcrumbs__separator'),
                'required' => array('sub-header-switch', '=', '1' ),
                'default'  => '#888',
                'transparent' => false,
                ),
                array(
                'title' => esc_html__( 'Active link color', 'avas' ),
                'id'    => 'sub-header-active-link-color',
                'type'  => 'color',
                'output'   => array('.breadcrumbs__current'),
                'required' => array('sub-header-switch', '=', '1' ),
                'default'  => '#5a5a5a',
                'transparent' => false,
                ),
                array(
                    'title' => esc_html__( 'Background', 'avas' ),
                    'id'    => 'sub-header-bg',
                    'type'  => 'background',
                    'output'   => array('background'=>'.sub-header'),
                    'required' => array('sub-header-switch', '=', '1' ),
                    'default'  => array(
                    'background-color' => '#999',
                    )
                ),
                array(
                    'id'             => 'sub_h_space',
                    'type'           => 'spacing',
                    'output'         => array('.sub-header, .sub-header-blog, .sub-header-service, .sub-header-project, .sub-header-engineer, .sub-header-shop'),
                    'mode'           => 'padding',
                    'units'          => array('px', 'em'),
                    'required'  => array( 'sub-header-switch', '=', '1' ),
                    'units_extended' => 'false',
                    'title'          => esc_html__('Space', 'avas'),
                    'default'            => array(
                    'padding-top'     => '75px', 
                    'padding-right'   => '0px', 
                    'padding-bottom'  => '25px', 
                    'padding-left'    => '0px',
                    'units'          => 'px', 
                )
            ),
            )
        ));
    // Menu options
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Menu', 'avas'),
        'id'               => 'menu_opt',
        'subsection'       => 'true',
        'customizer_width' => '400px',
        'fields'           => array(
                array(
                    'id'             => 'menu_alignment',
                    'type'           => 'spacing',
                    'output'         => array('.menu-alignment'),
                    'mode'           => 'padding',
                    'units'          => array('px', 'em'),
                    'units_extended' => 'false',
                    'title'          => esc_html__('Menu Bar Space', 'avas'),
                    'default'            => array(
                    'padding-top'     => '0px', 
                    'padding-right'   => '0px', 
                    'padding-bottom'  => '0px', 
                    'padding-left'    => '0px',
                    'units'          => 'px', 
                )
                ),
                array(
                    'id'             => 'menu_padding',
                    'type'           => 'spacing',
                    'output'         => array('.bddex-menu-list > ul'),
                    'mode'           => 'padding',
                    'units'          => array('px', 'em'),
                    'units_extended' => 'false',
                    'title'          => esc_html__('Menu Padding', 'avas'),
                    'default'            => array(
                    'padding-top'     => '0px', 
                    'padding-right'   => '0px', 
                    'padding-bottom'  => '0px', 
                    'padding-left'    => '0px',
                    'units'          => 'px', 
                )
                ),
                array(
                    'id'             => 'menu_space',
                    'type'           => 'spacing',
                    'output'         => array('.bddex-menu-list > ul > li > a'),
                    'mode'           => 'padding',
                    'units'          => array('px', 'em'),
                    'units_extended' => 'false',
                    'title'          => esc_html__('Menu Item Space', 'avas'),
                    'default'            => array(
                    'padding-top'     => '32px', 
                    'padding-right'   => '10px', 
                    'padding-bottom'  => '32px', 
                    'padding-left'    => '10px',
                    'units'          => 'px', 
                )
                ),
                array(
                    'id'       => 'menu-border',
                    'type'     => 'border',
                    'title'    => esc_html__('Menu Border', 'avas'),
                    'subtitle'    => esc_html__('Will not be visible on default header style.', 'avas'),
                    'desc'     => esc_html__( 'Enter border width ex: 1, 2, 3 etc to enable border. 0 to disable.', 'avas' ),
                    'output'   => array('.menu-bar'),
                    'color'    => true,
                    'left'     => false,
                    'right'    => false,
                    'default'  => array(
                        'border-color'  => '#dfdfdf', 
                        'border-style'  => 'solid', 
                        'border-top' => '0px',
                        'border-bottom' => '0px',
                    )
                ),
                array(
                    'id'       => 'menu-item-seprator-border',
                    'type'     => 'border',
                    'title'    => esc_html__('Menu item separator', 'avas'),
                    'desc'     => esc_html__( 'Enter border width ex: 1, 2, 3 etc to enable border. 0 to disable.', 'avas' ),
                    'output'   => array('.bddex-menu-list > ul > li'),
                    'color'    => true,
                    'left'     => false,
                    'top'      => false,
                    'bottom'   => false,
                    'default'  => array(
                        'border-color'  => '#dfdfdf', 
                        'border-style'  => 'solid', 
                        'border-right' => '0px',
                        'border-top' => '0px',
                        'border-bottom' => '0px',
                        
                    )
                ),
                array(
                    'id'        => 'menu_item_border',
                    'type'      => 'switch',
                    'title'     => esc_html__('Menu item top border on hover', 'avas'),
                    'default'   => 0,
                    'on'        => 'Yes',
                    'off'       => 'No',
                ),

                // menu button options
                array(
                    'id'        => 'menu_btn_switch',
                    'type'      => 'switch',
                    'title'     => esc_html__('Menu Button', 'avas'),
                    'default'   => true,
                    'on'        => 'On',
                    'off'       => 'Off',
                ),
                array( 
                    'title'     => esc_html__( 'Button Text', 'avas' ),
                    'id'        => 'menu_btn_txt',
                    'default'   => esc_html__('Buy Now', 'avas'),
                    'type'      => 'text',
                    'required'  => array( 'menu_btn_switch', '=', '1' ),
                ),
                array( 
                    'title'     => esc_html__( 'Button URL', 'avas' ),
                    'id'        => 'menu_btn_url',
                    'default'   => esc_html__('https://1.envato.market/zqOO', 'avas'),
                    'type'      => 'text',
                    'required'  => array( 'menu_btn_switch', '=', '1' ),
                ),
                array(
                    'id'       => 'menu_btn_link_new_window',
                    'type'     => 'checkbox',
                    'title'    => esc_html__('Open link in new window', 'avas'), 
                    'default'  => '0',
                    'required'  => array( 'menu_btn_switch', '=', '1' ),
                ),
                array(
                    'id'             => 'menu_btn_padding',
                    'type'           => 'spacing',
                    'output'         => array('.bddex-menu-btn-wrap .bddex-menu-btn'),
                    'mode'           => 'padding',
                    'units'          => array('px', 'em'),
                    'units_extended' => 'false',
                    'title'          => esc_html__('Menu Button Padding', 'avas'),
                    'default'         => array(
                    'padding-top'     => '8px', 
                    'padding-right'   => '22px', 
                    'padding-bottom'  => '8px', 
                    'padding-left'    => '22px',
                    'units'           => 'px',
                    ),
                    'required'  => array( 'menu_btn_switch', '=', '1' ),
                ),
                array(
                    'id'             => 'menu_btn_margin',
                    'type'           => 'spacing',
                    'output'         => array('.bddex-menu-btn-wrap'),
                    'mode'           => 'margin',
                    'units'          => array('px', 'em'),
                    'units_extended' => 'false',
                    'title'          => esc_html__('Menu Button Margin', 'avas'),
                    'default'         => array(
                    'margin-top'     => '29px', 
                    'margin-right'   => '0px', 
                    'margin-bottom'  => '29px', 
                    'margin-left'    => '0px',
                    'units'           => 'px',
                    ),
                    'required'  => array( 'menu_btn_switch', '=', '1' ),
                ),
                // cart icon
                array(
                'id'      => 'woo_cart',
                'title'   => 'Cart Icon',
                'type'    => 'switch',
                'desc'    => esc_html__('Required WooCommerce plugin activation', 'avas'),
                'on'      => esc_html__('On','avas'),
                'off'     => esc_html__('Off','avas'),
                'default' => 0,
                ),
                array(
                    'id'             => 'woo_cart_margin',
                    'type'           => 'spacing',
                    'output'         => array('.woo_cart'),
                    'mode'           => 'margin',
                    'units'          => array('px', 'em'),
                    'units_extended' => 'false',
                    'title'          => esc_html__('Cart Icon Margin', 'avas'),
                    'default'         => array(
                    'margin-top'     => '29px', 
                    'margin-right'   => '0px', 
                    'margin-bottom'  => '29px', 
                    'margin-left'    => '0px',
                    'units'           => 'px',
                    ),
                    'required'  => array( 'woo_cart', '=', '1' ),
                ),
                array(
                    'id'             => 'woo_cart_padding',
                    'type'           => 'spacing',
                    'output'         => array('.woo_cart'),
                    'mode'           => 'padding',
                    'units'          => array('px', 'em'),
                    'units_extended' => 'false',
                    'title'          => esc_html__('Cart Icon Padding', 'avas'),
                    'default'         => array(
                    'padding-top'     => '0px', 
                    'padding-right'   => '0px', 
                    'padding-bottom'  => '0px', 
                    'padding-left'    => '25px',
                    'units'           => 'px',
                    ),
                    'required'  => array( 'woo_cart', '=', '1' ),
                ),
                //Search Icon
                array(
                    'id'        => 'search',
                    'type'      => 'switch',
                    'title'     => esc_html__('Search Icon', 'avas'),
                    'default'   => 1,
                    'on'        => 'On',
                    'off'       => 'Off',
                ),
                array(
                    'id'             => 'search_margin',
                    'type'           => 'spacing',
                    'output'         => array('.search-icon,.business .search-icon,.news .search-icon'),
                    'mode'           => 'margin',
                    'units'          => array('px', 'em'),
                    'units_extended' => 'false',
                    'title'          => esc_html__('Search Icon Margin', 'avas'),
                    'default'         => array(
                    'margin-top'     => '29px', 
                    'margin-right'   => '0px', 
                    'margin-bottom'  => '29px', 
                    'margin-left'    => '0px',
                    'units'           => 'px',
                    ),
                    'required'  => array( 'search', '=', '1' ),
                ),
                array(
                    'id'             => 'search_padding',
                    'type'           => 'spacing',
                    'output'         => array('.search-icon'),
                    'mode'           => 'padding',
                    'units'          => array('px', 'em'),
                    'units_extended' => 'false',
                    'title'          => esc_html__('Search Icon Padding', 'avas'),
                    'default'         => array(
                    'padding-top'     => '0px', 
                    'padding-right'   => '0px', 
                    'padding-bottom'  => '0px', 
                    'padding-left'    => '25px',
                    'units'           => 'px',
                    ),
                    'required'  => array( 'search', '=', '1' ),
                ),
                //side menu
                array(
                    'id'        => 'side_menu',
                    'type'      => 'switch',
                    'title'     => esc_html__('Side Menu', 'avas'),
                    'default'   => 1,
                    'on'        => 'On',
                    'off'       => 'Off',
                ),
                array(
                    'id'             => 'side_menu_margin',
                    'type'           => 'spacing',
                    'output'         => array('#side-menu-icon,.business #side-menu-icon,.news #side-menu-icon'),
                    'mode'           => 'margin',
                    'units'          => array('px', 'em'),
                    'units_extended' => 'false',
                    'title'          => esc_html__('Side Menu Margin', 'avas'),
                    'default'         => array(
                    'margin-top'     => '29px', 
                    'margin-right'   => '0px', 
                    'margin-bottom'  => '29px', 
                    'margin-left'    => '0px',
                    'units'           => 'px',
                    ),
                    'required'  => array( 'side_menu', '=', '1' ),
                ),
                array(
                    'id'             => 'side_menu_padding',
                    'type'           => 'spacing',
                    'output'         => array('#side-menu-icon'),
                    'mode'           => 'padding',
                    'units'          => array('px', 'em'),
                    'units_extended' => 'false',
                    'title'          => esc_html__('Side Menu Padding', 'avas'),
                    'default'         => array(
                    'padding-top'     => '0px', 
                    'padding-right'   => '0px', 
                    'padding-bottom'  => '0px', 
                    'padding-left'    => '20px',
                    'units'           => 'px',
                    ),
                    'required'  => array( 'side_menu', '=', '1' ),
                ),
            )));

    // Service options
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Services', 'avas' ),
        'id'         => 'service-option',
        'icon'       => 'el el-wrench',
        'fields'     => array(
             array(
                'id'      => 'service_post_type',
                'title'    => esc_html__('Service Post Type','avas'),
                'desc'    => esc_html__('After Save Changes please refresh the page.','avas'),
                'type'    => 'switch',
                'on'      => esc_html__('Enable','avas'),
                'off'     => esc_html__('Disable','avas'),
                'default' => 1,
                ),
            array(
                'id'            => 'service-per-page',
                'type'          => 'slider',
                'title'         => esc_html__( 'Services display', 'avas' ),
                'desc'          => esc_html__( 'Per page', 'avas' ),
                'default'       => 9,
                'min'           => 1,
                'step'          => 1,
                'max'           => 99,
                'display_value' => 'text',
                'required'  => array( 'service_post_type', '=', '1' ),
            ),
            array(
                    'id'        => 'service-single-info',
                    'type'      => 'info',
                    'title'     => esc_html__('Service single page sidebar settings', 'avas'),
                    'style'     => 'success', //success warning
                    'required'  => array( 'service_post_type', '=', '1' ),
                ),
           
            array(
                'id'      => 'service_sidebar',
                'title'   => esc_html__('Sidebar','avas'),
                'type'    => 'switch',
                'on'      => esc_html__('Enable','avas'),
                'off'     => esc_html__('Disable','avas'),
                'default' => 1,
                'required'  => array( 'service_post_type', '=', '1' ),
                ),
            array(
                    'id'        => 'service-brochure-title',
                    'type'      => 'text',
                    'title'     => esc_html__('Brochure Title', 'avas' ),
                    'default'   => esc_html__('Our Brochure', 'avas' ),
                    'required'  => array( 'service_sidebar', '=', '1' ),
                ),
            array(
                    'id'        => 'service-brochure-desc',
                    'type'      => 'text',
                    'title'     => esc_html__('Brochure description', 'avas' ),
                    'default'   => esc_html__('Luctus dignissim risus magna conubia consequat pulvinar turpis, commodo sollicitudin.', 'avas' ),
                    'required'  => array( 'service_sidebar', '=', '1' ),
                ),
            array(
                'id'      => 'service_sidebar_img_form',
                'title'   => esc_html__('Image / Form','avas'),
                'type'    => 'switch',
                'on'      => esc_html__('Image','avas'),
                'off'     => esc_html__('Form','avas'),
                'default' => 1,
                'required'  => array( 
                                array('service_post_type', '=', '1' ),
                                array('service_sidebar', '=', '1' ),
                            ),
                ),
            array(
                'title'    => 'Brochure Image',
                'id'       => 'service-brochure-img',
                'type'     => 'media',
                'complier' => true,
                'url'      => true,
                'desc'     => esc_html__( 'You can upload png, jpg, gif file for brochure image.', 'avas' ),
                'default'  => array(
                'url'      => THEME_DIR.'/assets/img/brochure.jpg'
                    ),
                'required'  => array( 'service_sidebar_img_form', '=', '1' ),
            ),
            array(
                    'id'        => 'service-contact-form',
                    'type'      => 'text',
                    'title'     => esc_html__('Contact Form 7 Shortcode', 'avas'),
                    'desc'      => esc_html__('Plesae create contact form via Contact Form 7 plugin then enter the shortcode here.', 'avas'),
                    'required'  => array( 'service_sidebar_img_form', '=', '0' ),
                ),
            array(
                'id'      => 'service_sidebar_pdf_btn',
                'title'   => esc_html__('Download PDF Button','avas'),
                'type'    => 'switch',
                'on'      => esc_html__('On','avas'),
                'off'     => esc_html__('Off','avas'),
                'default' => 1,
                'required'  => array( 'service_sidebar', '=', '1' ),
                ),
            array(
                'id'      => 'service_sidebar_testimonial',
                'title'   => esc_html__('Testimonial','avas'),
                'type'    => 'switch',
                'on'      => esc_html__('On','avas'),
                'off'     => esc_html__('Off','avas'),
                'default' => 1,
                'required'  => array( 'service_sidebar', '=', '1' ),
                ),
            array(
                'id'        => 'pagination-services',
                'type'      => 'switch',
                'title'     => esc_html__('Next / Prev Pagination', 'avas'),
                'default'   => 1,
                'on'        => esc_html__('On','avas'),
                'off'       => esc_html__('Off','avas'),
                'required'  => array('service_post_type', '=', '1' ),
                ),
            array(
                    'id'        => 'service-button-text',
                    'type'      => 'text',
                    'title'     => esc_html__('Service button text', 'avas'),
                    'default'   => esc_html__('Service Details', 'avas'),
                    'required'  => array( 'service_post_type', '=', '1' ),
                ),
            array(
                    'id'        => 'service-slug-info',
                    'type'      => 'info',
                    'title'     => esc_html__('Service button and slug text settings', 'avas'),
                    'style'     => 'success', //success warning
                    'required'  => array( 'service_post_type', '=', '1' ),
                ),

            array(
                    'id'        => 'service-button-text',
                    'type'      => 'text',
                    'title'     => esc_html__('Service button text', 'avas'),
                    'default'   => esc_html__('Service Details', 'avas'),
                    'required'  => array( 'service_post_type', '=', '1' ),
                    ),
            array(
                    'id'        => 'services_title',
                    'type'      => 'text',
                    'title'     => esc_html__('Name', 'avas'),
                    'description' => esc_html__('Sevices menu and archive page title', 'avas'),
                    'default'   => 'Services',
                    'required'  => array( 'service_post_type', '=', '1' ),
                    ),
            array(
                    'id'        => 'service-slug',
                    'type'      => 'text',
                    'title'     => esc_html__('Service slug / Permalink', 'avas'),
                    'description' => esc_html__('After change go to Settings > Permalinks and click Save changes.', 'avas'),
                    'default'   => 'service',
                    'required'  => array( 'service_post_type', '=', '1' ),
                    ),
            array(
                    'id'        => 'service-cat-slug',
                    'type'      => 'text',
                    'title'     => esc_html__('Service category slug / Permalink', 'avas'),
                    'description' => esc_html__('After change go to Settings > Permalinks and click Save changes.', 'avas'),
                    'default'   => 'service-category',
                    'required'  => array( 'service_post_type', '=', '1' ),
                ),

            )));

    // Portfolio options
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Portfolio', 'avas' ),
        'id'         => 'portfolio-option',
        'desc'       => esc_html__( 'Portfolio options', 'avas' ),
        'icon'       => 'el el-briefcase',
        'fields'     => array(
            array(
                'id'      => 'portfolio_post_type',
                'title'    => esc_html__('Portfolio Post Type','avas'),
                'desc'    => esc_html__('After Save Changes please refresh the page.','avas'),
                'type'    => 'switch',
                'on'      => esc_html__('Enable','avas'),
                'off'     => esc_html__('Disable','avas'),
                'default' => 1,
                ),
            array(
                'id'            => 'portfolio-per-page',
                'type'          => 'slider',
                'title'         => esc_html__( 'Portfolios', 'avas' ),
                'desc'          => esc_html__( 'Set how many portfolio will be displayed on portfolio page.', 'avas' ),
                'default'       => 12,
                'min'           => 1,
                'step'          => 1,
                'max'           => 99,
                'display_value' => 'text',
                'required'  => array( 'portfolio_post_type', '=', '1' ),
            ),
            array(
                'id'            => 'portfolio-gallery',
                'type'          => 'switch',
                'title'         => esc_html__( 'Gallery / Slider', 'avas' ),
                'desc'          => esc_html__( 'If you have single image then you can disable it.','avas'),
                'on'            => esc_html__('Enable', 'avas'),
                'off'           => esc_html__('Disable', 'avas'),
                'default'       => 1,
                'required'  => array( 'portfolio_post_type', '=', '1' ),
            ),
            array(
                    'id'        => 'portfolio-meta-info',
                    'type'      => 'info',
                    'title'     => esc_html__('Portfolio meta settings', 'avas'),
                    'style'     => 'success', //success warning
                    'required'  => array( 'portfolio_post_type', '=', '1' ),
                    ),
            array(
                    'id'        => 'portfolio-meta-switch',
                    'type'      => 'switch',
                    'title'     => esc_html__( 'Meta', 'avas' ),
                    'default'   => 1,
                    'on'        => esc_html__( 'Enable', 'avas' ),
                    'off'        => esc_html__( 'Disable', 'avas' ),
                    'required'  => array( 'portfolio_post_type', '=', '1' ),
                    ),
            array(
                    'id'        => 'portfolio-time',
                    'type'      => 'switch',
                    'title'     => esc_html__('Time', 'avas'),
                    'default'   => 1,
                    'on'        => 'Show',
                    'off'       => 'Hide',
                    'required'  => array( 'portfolio-meta-switch', '=', '1' ),
                    ),
            array(
                    'id'        => 'portfolio-author',
                    'type'      => 'switch',
                    'title'     => esc_html__('Author', 'avas'),
                    'default'   => 1,
                    'on'        => 'Show',
                    'off'       => 'Hide',
                    'required'  => array( 'portfolio-meta-switch', '=', '1' ),
                    ),
            array(
                    'id'        => 'portfolio-slug-info',
                    'type'      => 'info',
                    'title'     => esc_html__('Slug text settings', 'avas'),
                    'style'     => 'success', //success warning
                    'required'  => array( 'portfolio_post_type', '=', '1' ),
                    ),
            array(
                    'id'        => 'portfolio-button-text',
                    'type'      => 'text',
                    'title'     => esc_html__('Portfolio button text', 'avas'),
                    'description' => esc_html__('Portfolio overlay button text change here.', 'avas'),
                    'default'   => 'View Project',
                    'required'  => array( 'portfolio_post_type', '=', '1' ),
                    ),
            array(
                    'id'        => 'portfolio_title',
                    'type'      => 'text',
                    'title'     => esc_html__('Name', 'avas'),
                    'description' => esc_html__('Portfolio menu and archive page title', 'avas'),
                    'default'   => 'Portfolio',
                    'required'  => array( 'portfolio_post_type', '=', '1' ),
                    ),
            array(
                    'id'        => 'portfolio-slug',
                    'type'      => 'text',
                    'title'     => esc_html__('Portfolio slug / Permalink', 'avas'),
                    'description' => esc_html__('After change go to Settings > Permalinks and click Save changes.', 'avas'),
                    'default'   => 'portfolio-item',
                    'required'  => array( 'portfolio_post_type', '=', '1' ),
                    ),
            array(
                    'id'        => 'portfolio-cat-slug',
                    'type'      => 'text',
                    'title'     => esc_html__('Portfolio category slug / Permalink', 'avas'),
                    'description' => esc_html__('After change go to Settings > Permalinks and click Save changes.', 'avas'),
                    'default'   => 'portfolio-category',
                    'required'  => array( 'portfolio_post_type', '=', '1' ),
                    ),
            )));
    // Team options
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Team', 'avas' ),
        'id'         => 'team',
        //'desc'       => esc_html__( 'Team options', 'avas' ),
        'icon'       => 'el el-user',
        'fields'     => array(
            array(
                'id'      => 'team_post_type',
                'title'    => esc_html__('Team Post Type','avas'),
                'desc'    => esc_html__('After Save Changes please refresh the page.','avas'),
                'type'    => 'switch',
                'on'      => esc_html__('Enable','avas'),
                'off'     => esc_html__('Disable','avas'),
                'default' => 1,
                ),
            array(
                'id'            => 'team-per-page',
                'type'          => 'slider',
                'title'         => esc_html__( 'Team per page', 'avas' ),
                'default'       => 12,
                'min'           => 1,
                'step'          => 1,
                'max'           => 99,
                'display_value' => 'text',
                'required'  => array( 'team_post_type', '=', '1' ),
            ),
            array(
                'id'      => 'team_skill',
                'title'   => esc_html__('Skills','avas'),
                'type'    => 'switch',
                'on'      => esc_html__('On','avas'),
                'off'     => esc_html__('Off','avas'),
                'default' => 1,
                'required'  => array( 'team_post_type', '=', '1' ),
                ),
            array(
                'id'      => 'project_experience',
                'title'   => esc_html__('Project Experience','avas'),
                'type'    => 'switch',
                'on'      => esc_html__('On','avas'),
                'off'     => esc_html__('Off','avas'),
                'default' => 1,
                'required'  => array( 'team_post_type', '=', '1' ),
                ),
            array(
                'id'      => 'team_social_profile',
                'title'   => esc_html__('Social Profile','avas'),
                'type'    => 'switch',
                'on'      => esc_html__('On','avas'),
                'off'     => esc_html__('Off','avas'),
                'default' => 1,
                'required'  => array( 'team_post_type', '=', '1' ),
                ),
            array(
                'id'      => 'pagination-team',
                'title'   => esc_html__('Next / Prev Pagination','avas'),
                'type'    => 'switch',
                'on'      => esc_html__('On','avas'),
                'off'     => esc_html__('Off','avas'),
                'default' => 1,
                'required'  => array( 'team_post_type', '=', '1' ),
                ),
            array(
               'id'       => 'team-profile-pic-border',
                'type'     => 'border',
                'title'    => esc_html__('Profile Picture Border', 'avas'),
                'desc'     => esc_html__( 'Enter border width, example 1, 2, 3 etc to enable border', 'avas' ),
                'output'   => array('.team-single-left img'),
                'color' => true,
                'default'  => array(
                    'border-color'  => '#dfdfdf', 
                    'border-style'  => 'solid', 
                    'border-top' => '0px',
                    'border-bottom' => '0px',
                    'border-left' => '0px',
                    'border-right' => '0px',
                ),
                'required'  => array( 'team_post_type', '=', '1' ),
                ),
            array(
               'id'       => 'team-hire-border',
                'type'     => 'border',
                'title'    => esc_html__('Button Border', 'avas'),
                'desc'     => esc_html__( 'Enter border width, example 1, 2, 3 etc to enable border', 'avas' ),
                'output'   => array('.single-team .hire_me'),
                'color' => true,
                'default'  => array(
                    'border-color'  => '#fff', 
                    'border-style'  => 'solid', 
                    'border-top' => '0px',
                    'border-bottom' => '0px',
                    'border-left' => '0px',
                    'border-right' => '0px',
                ),
                'required'  => array( 'team_post_type', '=', '1' ),
                ),
            array(
                    'id'        => 'team_btn',
                    'type'      => 'text',
                    'title'     => esc_html__('Button Text', 'avas'),
                    'desc'      => esc_html__('This button text will show Doctor Template at team single page','avas'),
                    'default'   => esc_html__('Appointment','avas'),
                    'required'  => array( 'team_post_type', '=', '1' ),
                ),
            array(
                    'id'        => 'team_title',
                    'type'      => 'text',
                    'title'     => esc_html__('Name', 'avas'),
                    'description' => esc_html__('Team menu and archive page title', 'avas'),
                    'default'   => 'Team',
                    'required'  => array( 'team_post_type', '=', '1' ),
                    ),
            array(
                    'id'        => 'team-slug',
                    'type'      => 'text',
                    'title'     => esc_html__('Team slug / Permalink', 'avas'),
                    'description' => esc_html__('After change go to Settings > Permalinks and click Save changes.', 'avas'),
                    'default'   => 'team',
                    'required'  => array( 'team_post_type', '=', '1' ),
                ),
            array(
                    'id'        => 'team-cat-slug',
                    'type'      => 'text',
                    'title'     => esc_html__('Team category slug / Permalink', 'avas'),
                    'description' => esc_html__('After change go to Settings > Permalinks and click Save changes.', 'avas'),
                    'default'   => 'team-category',
                    'required'  => array( 'team_post_type', '=', '1' ),
                ),

             )));
    
	// -> START Woocommerce options
    Redux::setSection( $opt_name, array(
        'title'     => esc_html__( 'WooCommerce','avas' ),
        'id'        => 'woocommerce',
        'icon'      => 'el el-shopping-cart',
        'fields'    => array(
            array(
                'id'            => 'woo-product-per-row',
                'type'          => 'slider',
                'title'         => esc_html__( 'Product per row', 'avas' ),
                'default'       => 3,
                'min'           => 1,
                'step'          => 1,
                'max'           => 6,
                'display_value' => 'text'
            ),
            array(
                'id'            => 'woo-product-per-page',
                'type'          => 'slider',
                'title'         => esc_html__( 'Product per page', 'avas' ),
                'default'       => 12,
                'min'           => 1,
                'step'          => 1,
                'max'           => 99,
                'display_value' => 'text'
            ),
            array(
                'id'       => 'woo-sidebar-select',
                'type'     => 'select',
                'title'    => esc_html__('Select Sidebar', 'avas'), 
                'options'  => array(
                    'woo-sidebar-right' => 'Sidebar Right',
                    'woo-sidebar-left' => 'Sidebar Left',
                ),
                'default'  => 'woo-sidebar-right',
            ),
            )
        ));
    // Blog options
        Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Blog', 'avas' ),
        'id'         => 'blog-option',
        'desc'       => esc_html__('Posts options','avas'),
        'icon'       => 'el el-pencil',
        'fields'     => array(
            array(
                'id'            => 'blog-posts-per-page',
                'type'          => 'slider',
                'title'         => esc_html__( 'Pagination', 'avas' ),
                'title'         => esc_html__( 'Number of posts per page', 'avas' ),
                'default'       => 8,
                'min'           => 1,
                'step'          => 1,
                'max'           => 99,
                'display_value' => 'text'
                ),
            array(
                'id'            => 'cat_limit',
                'type'          => 'slider',
                'title'         => esc_html__( 'Category Widget', 'avas' ),
                'desc'         => esc_html__( 'Category Limit', 'avas' ),
                'default'       => 8,
                'min'           => 1,
                'step'          => 1,
                'max'           => 99,
                'display_value' => 'text'
                ),
            array(
                'id'            => 'tag_limit',
                'type'          => 'slider',
                'title'         => esc_html__( 'Tag Cloud Widget', 'avas' ),
                'desc'         => esc_html__( 'Tag Limit', 'avas' ),
                'default'       => 15,
                'min'           => 1,
                'step'          => 1,
                'max'           => 99,
                'display_value' => 'text'
                ),
            array(
                'id'       => 'sidebar-select',
                'type'     => 'select',
                'title'    => esc_html__('Select Sidebar', 'avas'), 
                'options'  => array(
                    'sidebar-right' => 'Sidebar Right',
                    'sidebar-left' => 'Sidebar Left',
                    'no-sidebar' => 'No Sidebar',
                ),
                'default'  => 'no-sidebar',
            ),
            array(
                        'id'        => 'post-meta-info',
                        'type'      => 'info',
                        'title'     => esc_html__('Single Posts Settings', 'avas'),
                        'style'     => 'success', //success warning
                    ),
            array(
                        'id'        => 'featured-img',
                        'type'      => 'switch',
                        'title'     => esc_html__('Featured Image', 'avas'),
                        'default'   => 1,
                        'on'        => esc_html__('Show','avas'),
                        'off'       => esc_html__('Hide','avas'),
                    ),
            array(
                        'id'        => 'post-time',
                        'type'      => 'switch',
                        'title'     => esc_html__('Time', 'avas'),
                        'default'   => 1,
                        'on'        => esc_html__('Show','avas'),
                        'off'       => esc_html__('Hide','avas'),
                    ),
            array(
                        'id'        => 'post-author',
                        'type'      => 'switch',
                        'title'     => esc_html__('Author', 'avas'),
                        'default'   => 1,
                        'on'        => esc_html__('Show','avas'),
                        'off'       => esc_html__('Hide','avas'),
                    ),
            array(
                        'id'        => 'post-comment',
                        'type'      => 'switch',
                        'title'     => esc_html__('Comments', 'avas'),
                        'default'   => 1,
                        'on'        => esc_html__('Show','avas'),
                        'off'       => esc_html__('Hide','avas'),
                    ),
            array(
                'id'        => 'post-views',
                'type'      => 'switch',
                'title'     => esc_html__('Views', 'avas'),
                'default'   => 1,
                'on'        => esc_html__('Show','avas'),
                'off'       => esc_html__('Hide','avas'),
                ),
            array(
                'id'        => 'social-share-header',
                'type'      => 'switch',
                'title'     => esc_html__('Social Share on Header', 'avas'),
                'default'   => 1,
                'on'        => esc_html__('Show','avas'),
                'off'       => esc_html__('Hide','avas'),
                ),
            array(
                'id'        => 'social-share-footer',
                'type'      => 'switch',
                'title'     => esc_html__('Social Share on Footer', 'avas'),
                'default'   => 0,
                'on'        => esc_html__('Show','avas'),
                'off'       => esc_html__('Hide','avas'),
                ),
            array(
                        'id'        => 'post-category',
                        'type'      => 'switch',
                        'title'     => esc_html__('Categories', 'avas'),
                        'default'   => 1,
                        'on'        => esc_html__('Show','avas'),
                        'off'       => esc_html__('Hide','avas'),
                    ),
            array(
                        'id'        => 'post-tag',
                        'type'      => 'switch',
                        'title'     => esc_html__('Tags', 'avas'),
                        'default'   => 1,
                        'on'        => esc_html__('Show','avas'),
                        'off'       => esc_html__('Hide','avas'),
                    ),
            array(
                        'id'        => 'related-posts',
                        'type'      => 'switch',
                        'title'     => esc_html__('Related posts', 'avas'),
                        'default'   => 0,
                        'on'        => esc_html__('Show','avas'),
                        'off'       => esc_html__('Hide','avas'),
                    ),
            array(
                        'id'        => 'author-bio',
                        'type'      => 'switch',
                        'title'     => esc_html__('Author Bio', 'avas'),
                        'default'   => 0,
                        'on'        => esc_html__('Show','avas'),
                        'off'       => esc_html__('Hide','avas'),
                    ),
            array(
                        'id'        => 'comments-posts',
                        'type'      => 'switch',
                        'title'     => esc_html__('Comments Form', 'avas'),
                        'default'   => 1,
                        'on'        => esc_html__('Show','avas'),
                        'off'       => esc_html__('Hide','avas'),
                    ),
            array(
                        'id'        => 'pagination-posts',
                        'type'      => 'switch',
                        'title'     => esc_html__('Next / Prev Pagination', 'avas'),
                        'default'   => 1,
                        'on'        => esc_html__('Show','avas'),
                        'off'       => esc_html__('Hide','avas'),
                    ),
            )));

        // Ads options
        Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Ads', 'avas' ),
        'id'         => 'ads-option',
        'icon'       => 'el el-bullhorn',
        'fields'     => array(
                array(
                    'id'        => 'news_header_ads',
                    'type'      => 'switch',
                    'title'     => esc_html__('Header Ads', 'avas'),
                    'default'   => 0,
                    'on'        => esc_html__('Enable','avas'),
                    'off'       => esc_html__('Disable','avas'),
                ),
                array(
                    'id'        => 'h_ads_switch',
                    'type'      => 'switch',
                    'title'     => esc_html__('For News style header only', 'avas'),
                    'default'   => 1,
                    'on'        => 'Banner',
                    'off'       => 'Adsense',
                    'required'  => array( 'news_header_ads', '=', '1' ),
                ),
                
                array(
                    'title'    => esc_html__('Ad Banner', 'avas'),
                    'id'       => 'head_ad_banner',
                    'subtitle' => esc_html__('Size 728x90','avas'),
                    'required'  => array( 'h_ads_switch', '=', '1' ),
                    'type'     => 'media',
                    'complier' => true,
                    'url'      => true,
                    'desc'     => esc_html__( 'You can upload png, jpg, gif image.', 'avas' ),
                    'default'  => array(
                      'url'=> THEME_DIR.'/assets/img/728x90.jpg'
                    ),
                    'required'  => array(
                                   array( 'h_ads_switch', '=', '1' ),
                                   array( 'news_header_ads', '=', '1' ),
                                ),
                ),
                array(
                    'id'       => 'head_ad_banner_link',
                    'type'     => 'text',
                    'title'    => esc_html__('Banner link', 'avas'),
                    'default'  => 'https://1.envato.market/zqOO',
                    'required'  => array(
                                   array( 'h_ads_switch', '=', '1' ),
                                   array( 'news_header_ads', '=', '1' ),
                                ),
                ),
                array(
                    'id'       => 'head_ad_banner_link_new_window',
                    'type'     => 'checkbox',
                    'title'    => esc_html__('Open link in new window', 'avas'), 
                    'default'  => '1',
                    'required'  => array( 'h_ads_switch', '=', '1' ),
                ),
                array(
                'id'       => 'head_ad_js',
                'title'    => esc_html__( 'Adsense codes here.', 'avas' ),
                'subtitle' => esc_html__('Size 728x90','avas'),
                'type'     => 'ace_editor',
                'mode'     => 'html',
                'theme'    => 'chrome',
                'desc'      => esc_html__('Example: Google Adsense etc', 'avas'),
                'required'  => array(
                                   array( 'h_ads_switch', '=', '0' ),
                                   array( 'news_header_ads', '=', '1' ),
                                ),
            ),
                array(
                    'id'             => 'head_ads_space',
                    'type'           => 'spacing',
                    'output'         => array('.head_ads'),
                    'mode'           => 'margin',
                    'units'          => array('px', 'em'),
                    'units_extended' => 'false',
                    'title'          => esc_html__('Ad Space', 'avas'),
                    'default'            => array(
                    'margin-top'     => '10px', 
                    'margin-right'   => '0px', 
                    'margin-bottom'  => '10', 
                    'margin-left'    => '0px',
                    'units'          => 'px', 
                    ),
                    'required'  => array( 'news_header_ads', '=', '1' ),
            ),
            // content post ads option from here         
                array(
                    'id'        => 'post-ads-info',
                    'type'      => 'info',
                    'title'     => esc_html__('Post Ads', 'avas'),
                    'style'     => 'success', //success warning
                    ),
                 array(
                    'id'        => 'post_ads',
                    'type'      => 'switch',
                    'title'     => esc_html__('Post Ads', 'avas'),
                    'default'   => 0,
                    'on'        => 'Enable',
                    'off'       => 'Disable',
                ),
                array(
                    'id'        => 's_ads_switch',
                    'type'      => 'switch',
                    'title'     => esc_html__('Content ad', 'avas'),
                    'subtitle' => esc_html__('Size 300x250','avas'),
                    'default'   => 1,
                    'on'        => 'Banner',
                    'off'       => 'Adsense',
                    'required' => array( 
                                  array('post_ads','=','1'), 
                    ),
                    
                ),
                array(
                    'id'        => 's_ads_after_p',
                    'type'      => 'slider',
                    'title'     => esc_html__('After paragraph', 'avas'),
                    "default"   => 1,
                    "min"       => 1,
                    "step"      => 1,
                    "max"       => 15,
                    'display_value' => 'select',
                    'required' => array( 'post_ads','=','1'),
                ),
                array(
                    'title'    => esc_html__('Ad Banner', 'avas'),
                    'id'       => 's_ad_banner',
                    'required'  => array( 's_ads_switch', '=', '1' ),
                    'type'     => 'media',
                    'complier' => true,
                    'url'      => true,
                    'desc'     => esc_html__( 'You can upload png, jpg, gif image.', 'avas' ),
                    'default'  => array(
                      'url'=> THEME_DIR.'/assets/img/300x250.jpg'
                    ),
                    'required' => array( 
                                  array('post_ads','=','1'), 
                                  array('s_ads_switch','=','1'),
                    ),
                ),
                array(
                    'id'       => 's_ad_banner_link',
                    'type'     => 'text',
                    'title'    => esc_html__('Banner link', 'avas'),
                    'default'  => 'https://1.envato.market/zqOO',
                    'required' => array( 
                                  array('post_ads','=','1'), 
                                  array('s_ads_switch','=','1'),
                    ),
                ),
                array(
                'id'       => 's_ad_js',
                'title'    => esc_html__( 'Adsense codes here.', 'avas' ),
                'type'     => 'ace_editor',
                'mode'     => 'html',
                'theme'    => 'chrome',
                'desc'      => esc_html__('Example: Google Adsense etc', 'avas'),
                'required'  => array( 's_ads_switch', '=', '0' ),
                 ),

        )));

     // -> START Testimonial options
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Testimonial', 'avas' ),
        'id'         => 'testimonial',
        'icon'       => 'el el-quotes',
        'fields'     => array(
            array(
                'id' => 'testimonial-switch', 
                'type'=> 'switch',
                'title'=> esc_html__('Testimonial Options', 'avas'),
                'on' => esc_html__('Enable','avas' ),
                'off' => esc_html__('Disable','avas' ),
                'default' => 0,
                ),
            array(
                'id'          => 'testimonial-slides',
                'type'        => 'slides',
                'title'       => esc_html__( 'Add testimonial', 'avas' ),
                'subtitle'    => esc_html__( 'Add testimonial with drag and drop sortings.', 'avas' ),
                'desc'        => esc_html__( 'Click the Add button to add unlimited testimonials', 'avas' ),
                'required'    => array('testimonial-switch', '=', '1'),
                'placeholder' => array(
                    'title'       => esc_html__( 'Client name', 'avas' ),
                    'description' => esc_html__( 'Client feedback', 'avas' ),
                    'url'         => esc_html__( 'URL', 'avas' ),
                ),
            ),
        )
    ) );

    // Social Media  / social share         
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Social Media', 'avas' ),
        'id'               => 'social_media',
        'desc'             => esc_html__('To use shortcode add [avas-social-media]', 'avas'),
        'customizer_width' => '400px',
        'icon'             => 'el el-twitter',
        'fields'           =>  array(            
                array(
                'id'        => 'social',
                'type'      => 'switch',
                'default'   => 1,
                'on'        => esc_html__('Enable', 'avas'),
                'off'       => esc_html__('Disable', 'avas'),
                ),
                array(
                'id'       => 'facebook',
                'type'     => 'text',
                'title'    => esc_html__('Facebook','avas'),
                'default'  => 'https://www.facebook.com/avas.wordpress.theme/',
                'required' => array( 'social', '=', '1' ),
                ),
            array(
                'id'       => 'twitter',
                'type'     => 'text',
                'title'    => esc_html__('Twitter','avas'),
                'default'  => 'https://twitter.com/AvasTheme',
                'required' => array( 'social', '=', '1' ),
                ),
             array(
                'id'       => 'google-plus',
                'type'     => 'text',
                'title'    => esc_html__('Google Plus','avas'),
                'default'  => 'https://plus.google.com/u/3/113877388986624710450',
                'required' => array( 'social', '=', '1' ),
                ),
            array(
                'id'       => 'linkedin',
                'type'     => 'text',
                'title'    => esc_html__('LinkedIn','avas'),
                'default'  => '#',
                'required' => array( 'social', '=', '1' ),
                ),
            array(
                'id'       => 'youtube',
                'type'     => 'text',
                'title'    => esc_html__('Youtube','avas'),
                'default'  => 'https://www.youtube.com/channel/UC1hlWYgndZw7PEHWeTbYvfA',
                'required' => array( 'social', '=', '1' ),
                ),
            array(
                'id'       => 'instagram',
                'type'     => 'text',
                'title'    => esc_html__('Instagram','avas'),
                'default'  => '',
                'required' => array( 'social', '=', '1' ),
                ),
            array(
                'id'       => 'pinterest',
                'type'     => 'text',
                'title'    => esc_html__('Pinterest','avas'),
                'default'  => '',
                'required' => array( 'social', '=', '1' ),
                ),
            array(
                'id'        => 'social-share',
                'type'      => 'switch',
                'default'   => 1,
                'title'     => esc_html__( 'Social Share','avas'),
                'on'        => esc_html__('Enable', 'avas'),
                'off'       => esc_html__('Disable', 'avas'),
                ),
            array(
                'id'       => 'social_share_post',
                'type'     => 'checkbox',
                'required' => array('social-share', '=', '1' ),
                'options'  => array(
                   // 'post' => 'Post',
                    'portfolio' =>'Portfolio',
                    // 'page' => 'Page',
                     'service' =>'Services',
                    // 'team' =>'Team',
                ),
                'default' => array(
                   // 'post' => '1', 
                    'portfolio' => '1', 
                    // 'page' => '1', 
                     'service' => '1', 
                    // 'team' => '1', 
                )
                ),
    ) 
    ) );
    // -> START Footer options
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Footer', 'avas' ),
        'id'               => 'footer',
        'desc'             => esc_html__('Footer Options.', 'avas'),
        'customizer_width' => '400px',
        'icon'             => 'el el-photo',
        'fields'           =>  array(
                array(
                'id'        => 'footer_top',
                'title'     => esc_html__( 'Footer Top', 'avas' ),
                'type'      => 'switch',
                'default'   => 1,
                'on'        => esc_html__('Enable', 'avas'),
                'off'       => esc_html__('Disable', 'avas'),
                ),
                array(
                'title'    => esc_html__('Footer Background', 'avas'),
                'id'       => 'footer_bg',
                'type'     => 'background',
                'output'   => array('background'=>'#footer-top'),
                'required' => array('footer_top', '=', '1' ),
                'default'  => array(
                'background-color' => '#333',
                )),
                array(
                    'id' => 'footer_layout',
                    'title' => esc_html__('Footer Layout', 'avas'),
                    'required'  => array( 'footer_top', '=', '1' ),
                    'type' => 'image_select',
                    'options' => array (
                        '' => array('title' => 'Boxed', 'img' => THEME_DIR.'/assets/img/footer-boxed.png'),
                        'wide' => array('title' => 'Wide', 'img' => THEME_DIR.'/assets/img/footer-wide.png'),
                    ),
                ),
                array(
                    'id'       => 'footer_cols',
                    'type'     => 'select',
                    'title'    => esc_html__( 'Footer Columns', 'avas' ),
                    'required' => array('footer_top', '=', '1' ),
                    'options'  => array(
                        '12'   => 'Footer Column 1',
                         '6'   => 'Footer Column 2',
                         '4'   => 'Footer Column 3',
                         '3'   => 'Footer Column 4',
                        ),
                    'default'  => '3',
                    ),
                array(
                'id'        => 'footer-menu',
                'title'     => esc_html__( 'Footer Menu', 'avas' ),
                'type'      => 'switch',
                'default'   => 0,
                'on'        => esc_html__('On', 'avas'),
                'off'       => esc_html__('Off', 'avas'),
                ),
                array(
                'id'        => 'back_top',
                'title'     => esc_html__( 'Back to Top', 'avas' ),
                'type'      => 'switch',
                'default'   => 1,
                'on'        => esc_html__('On', 'avas'),
                'off'       => esc_html__('Off', 'avas'),
                ),
                array(
                'id'       => 'copyright',
                'title'    =>  esc_html__('Copyright', 'avas'),
                'type'     => 'textarea',
                'default'  => 'Copryright &copy; 2019, By <a href="https://themeforest.net/user/theme-x">theme-x</a> | All rights reserved.' ,
                ),
    ),
    ));        
// -> START Color options
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Colors', 'avas' ),
        'id'    => 'color',
        'icon'  => 'el el-brush'
    ) );
// Body color options
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'General', 'avas' ),
        'id'         => 'body-Color',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'preloader-bg-color',
                'type'     => 'color',
                'output'   => array('background' => '.pre-loader'),
                'title'    => esc_html__( 'Prealoader Background Color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'preloader-color',
                'type'     => 'color',
                'output'   => array('background' => '.sk-fading-circle .sk-circle:before'),
                'title'    => esc_html__( 'Prealoader Color', 'avas' ),
                'default'  => '#fff',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'selection-bg-color',
                'type'     => 'color',
                'output'   => array('background' => '::selection'),
                'title'    => esc_html__( 'Selection Background Color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'selection-text-color',
                'type'     => 'color',
                'output'   => array('color' => '::selection'),
                'title'    => esc_html__( 'Selection Text Color', 'avas' ),
                'default'  => '#fff',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'body-bg',
                'type'     => 'color',
                'output'   => array('background-color' => 'body'),
                'title'    => esc_html__( 'Body background color', 'avas' ),
                'default'  => '',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'body',
                'type'     => 'color',
                'output'   => array('body'),
                'title'    => esc_html__( 'Body text color', 'avas' ),
                'default'  => '#5a5a5a',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'link-color',
                'type'     => 'color',
                'output'   => array('a'),
                'title'    => esc_html__( 'Link color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'link-hover-color',
                'type'     => 'color',
                'output'   => array('a:hover'),
                'title'    => esc_html__( 'Link hover color', 'avas' ),
                'default'  => '#222',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'h1-color',
                'type'     => 'color',
                'output'   => array('h1'),
                'title'    => esc_html__( 'H1 color', 'avas' ),
                'default'  => '#222',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'h2-color',
                'type'     => 'color',
                'output'   => array('h2'),
                'title'    => esc_html__( 'H2 color', 'avas' ),
                'default'  => '#222',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'h3-color',
                'type'     => 'color',
                'output'   => array('h3'),
                'title'    => esc_html__( 'H3 color', 'avas' ),
                'default'  => '#222',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'h4-color',
                'type'     => 'color',
                'output'   => array('h4'),
                'title'    => esc_html__( 'H4 color', 'avas' ),
                'default'  => '#222',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'h5-color',
                'type'     => 'color',
                'output'   => array('h5'),
                'title'    => esc_html__( 'H5 color', 'avas' ),
                'default'  => '#222',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'h6-color',
                'type'     => 'color',
                'output'   => array('h6'),
                'title'    => esc_html__( 'H6 color', 'avas' ),
                'default'  => '#222',
                'validate' => 'color',
                'transparent' => false,
            ),
        )));     
// header color options
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Header', 'avas' ),
        'id'         => 'header-Color',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'top_head_color',
                'type'     => 'color_rgba',
                'output'   => array( 
                'background-color' => '#top_head',
                 ),
                'title'    => esc_html__( 'Top header background color', 'avas' ),
                ),
            array(
                'id'       => 'top_head_cont_bg',
                'type'     => 'color_rgba',
                'output'   => array( 
                'background-color' => '#top_head .container' ),
                'title'    => esc_html__( 'Top header container background color', 'avas' ),  
            ),
            array( 
                'id'       => 'top_head_border',
                'type'     => 'border',
                'title'    => esc_html__('Top Header Bottom Border', 'avas'),
                'desc'     => esc_html__( 'Enter border width, example 1, 2, 3 etc to enable border', 'avas' ),
                'output'   => array('#top_head'),
                'top' => false,
                'right' => false,
                'left' => false,
                'color' => false,
                'default'  => array(
                //   'border-color'  => '#000', 
                    'border-style'  => 'solid', 
                    'border-top' => '0px',
                    'border-bottom' => '0px',
                    'border-left' => '0px',
                    'border-right' => '0px',
                )
                ),
            array(
                'id'       => 'top_head_border_color',
                'type'     => 'color_rgba',
                'output'   => array( 
                'border-color' => '#top_head',
                 ),
                'title'    => esc_html__( 'Top Header Border color', 'avas' ),
            ),
            array(
                'id'       => 'main_head',
                'type'     => 'color_rgba',
                'output'   => array( 
                'background-color' => '#main_head' ),
                'title'    => esc_html__( 'Main header background color', 'avas' ),  
            ),
            array(
                'id'       => 'main_head_cont_bg',
                'type'     => 'color_rgba',
                'output'   => array( 
                'background-color' => '#main_head .container' ),
                'title'    => esc_html__( 'Main header container background color', 'avas' ),  
            ),
            array( 
                'id'       => 'main_head_border',
                'type'     => 'border',
                'title'    => esc_html__('Main Header Bottom Border', 'avas'),
                'desc'     => esc_html__( 'Enter border width, example 1, 2, 3 etc to enable border', 'avas' ),
                'output'   => array('#main_head'),
                'top' => false,
                'right' => false,
                'left' => false,
                'color' => false,
                'default'  => array(
                //   'border-color'  => '#000', 
                    'border-style'  => 'solid', 
                    'border-top' => '0px',
                    'border-bottom' => '0px',
                    'border-left' => '0px',
                    'border-right' => '0px',
                )
                ),
            array(
                'id'       => 'main_head_border_color',
                'type'     => 'color_rgba',
                'output'   => array( 
                'border-color' => '#main_head',
                 ),
                'title'    => esc_html__( 'Main Header Border color', 'avas' ),
            ),
            array(
                'id'       => 'fixed-top',
                'type'     => 'color_rgba',
                'output'   => array( 
                'background-color' => '.fixed-top #main_head' ),
                'title'    => esc_html__( 'Sticky header background color', 'avas' ),    
            ),
            array(
                'id'       => 'sticky-head-cont-bg',
                'type'     => 'color_rgba',
                'output'   => array( 
                'background-color' => '.fixed-top #main_head .container' ),
                'title'    => esc_html__( 'Sticky header container background color', 'avas' ),    
            ),
           
    ) ));

    //menu color options
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Menu', 'avas' ),
        'id'         => 'menu-color',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'top-menu-link-color',
                'type'     => 'color',
                'output'   => array( '.top_menu > li > a' ), 
                'title'    => esc_html__( 'Top Menu link color', 'avas' ),
                'default'  => '#fff',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'top-menu-link-hover-color',
                'type'     => 'color',
                'output'   => array( '.top_menu > li > a:hover, .top_menu > li > a:focus' ),
                'title'    => esc_html__( 'Top Menu link hover color', 'avas' ),
                'default'  => '#222',
                'validate' => 'color',
                'transparent' => false,
            ),
// main menu colors
            array(
                'id'    => 'main_menu_colors',
                'type'  => 'info',
                'style' => 'success',
                'desc'  => esc_html__('Main Menu Colors', 'avas')
            ),
            array(
                'id'       => 'menu-link-color',
                'type'     => 'color',
                'output'   => array( '.bddex-menu-list > ul > li > a' ), 
                'title'    => esc_html__( 'Main Menu link color', 'avas' ),
                'default'  => '#222',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'menu-link-hover-color',
                'type'     => 'color',
                'output'   => array( '.bddex-menu-list > ul > li > a:hover, .bddex-menu-list > ul > li > a:focus' ),
                'title'    => esc_html__( 'Main Menu link hover color', 'avas' ),
                'default'  => '#00e2ff',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'menu-link-bg-hover-color',
                'type'     => 'color',
                'output'   => array('background' => '.bddex-menu-list > ul > li > a:hover, .bddex-menu-list > ul > li > a:focus' ),
                'title'    => esc_html__( 'Main Menu link background hover color', 'avas' ),
                'default'  => '',
                'validate' => 'color',
                'transparent' => true,
            ),
            array(
                'id'       => 'menu-active-link-color',
                'type'     => 'color',
                'output'   => array( '.bddex-menu-list > ul > li.current-menu-item > a,.navbar-default .navbar-nav > li.current-menu-item > a, .navbar-default .navbar-nav > li.current-page-ancestor > a, .navbar-default .navbar-nav>.active>a:hover' ),
                'title'    => esc_html__( 'Main Menu link active color', 'avas' ),
                'default'  => '#00e2ff',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'menu-active-link-bg-color',
                'type'     => 'color',
                'output'   => array( 'background' => '.bddex-menu-list > ul > li.current-menu-item > a,.navbar-default .navbar-nav > li.current-menu-item > a, .navbar-default .navbar-nav > li.current-page-ancestor > a, .navbar-default .navbar-nav>.active>a:hover' ),
                'title'    => esc_html__( 'Main Menu link active background color', 'avas' ),
                'default'  => '',
                'validate' => 'color',
                'transparent' => true,
            ),
            array(
                'id'       => 'menu-bar-color',
                'type'     => 'color',
                'output'   => array( 'background-color'=>'.menu-bar' ),
                'title'    => esc_html__( 'Menu Bar color', 'avas' ),
                'default'  => '#05B69F',
                'validate' => 'color',
                'transparent' => true,
            ),
            array(
                'id'       => 'menu_bar_cont_bg',
                'type'     => 'color_rgba',
                'output'   => array( 
                'background-color' => '#main_head .menu-bar .container' ),
                'title'    => esc_html__( 'Menu Bar container background color', 'avas' ),  
            ),
            array(
                'id'       => 'sub-menu-bg-color',
                'type'     => 'color',
                'output'   => array( 'background' =>'.bddex-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul,.bddex-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul,.bddex-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul,.dx1,.dx2,.dx3,.dx4' ), 
                'title'    => esc_html__( 'Sub Menu background color', 'avas' ),
                'default'  => '#252525 ',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'sub-menu-border-color',
                'type'     => 'color',
                'output'   => array( 'border-color' =>'.bddex-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > a,.bddex-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul > li > a,.bddex-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul > li > ul > li > a,.bddex-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul > li > ul > li > ul > li > a,.dropdown-menu > li > a' ), 
                'title'    => esc_html__( 'Sub Menu bottom border color', 'avas' ),
                'default'  => '#3C3C3C ',
                'validate' => 'color',
                'transparent' => true,
            ),
            array(
                'id'       => 'sub-menu-separator-color',
                'type'     => 'color',
                'output'   => array( 'border-color' =>'.bddex-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns2 > li, .bddex-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns3 > li, .bddex-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns4 > li' ), 
                'title'    => esc_html__( 'Mega Menu Separator color', 'avas' ),
                'default'  => '#3C3C3C ',
                'validate' => 'color',
                'transparent' => true,
            ),
            array(
                'id'       => 'mega-menu-title-color',
                'type'     => 'color',
                'output'   => array( 'color' =>'.bddex-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns1 > li > a, .bddex-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns2 > li > a, .bddex-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns3 > li > a, .bddex-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns4 > li > a,.nomega-menu-item .widget-title' ), 
                'title'    => esc_html__( 'Mega Menu Sub Menu title color', 'avas' ),
                'default'  => '#b5b5b5 ',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'mega-menu-link-color',
                'type'     => 'color',
                'output'   => array( 'color' =>'.bddex-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns2 > li > ul > li > a, .bddex-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns3 > li > ul > li > a, .bddex-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns4 > li > ul > li > a,.bddex-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul > li .widget.widget_products .product_list_widget > li > a .product-title,.nomega-menu-item .rpt a,.bddex-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > a,.bddex-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul > li .widget.widget_products .product_list_widget > li .amount,.bddex-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul > li > a,.bddex-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul > li > ul > li > a,.bddex-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul > li > ul > li > ul > li > a,.dropdown-menu > li > a' ), 
                'title'    => esc_html__( 'Sub Menu link color', 'avas' ),
                'default'  => '#b5b5b5 ',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'mega-menu-link-hover-color',
                'type'     => 'color',
                'output'   => array( 'color' =>'.bddex-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns2 > li > ul > li:hover > a, .bddex-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns2 > li > ul > li.current-menu-item > a, .bddex-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns2 > li > ul > li.current-menu-ancestor > a, .bddex-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns3 > li > ul > li:hover > a, .bddex-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns3 > li > ul > li.current-menu-item > a, .bddex-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns3 > li > ul > li.current-menu-ancestor > a, .bddex-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns4 > li > ul > li:hover > a, .bddex-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns4 > li > ul > li.current-menu-item > a, .bddex-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns4 > li > ul > li.current-menu-ancestor > a,.bddex-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li:hover > a,.bddex-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul > li:hover > a,.bddex-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul > li > ul > li:hover > a,.bddex-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul > li > ul > li > ul > li:hover > a, .bddex-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul > li.current-menu-ancestor > a, .dropdown-menu>li>a:hover' ), 
                'title'    => esc_html__( 'Sub Menu link hover color', 'avas' ),
                'default'  => '#0AB0C5 ',
                'validate' => 'color',
                'transparent' => false,
            ),
            // sticky menu colors
            array(
                'id'       => 'sticky-menu-link-color',
                'type'     => 'color',
                'output'   => array( '.fixed-top .bddex-menu-list > ul > li > a' ), 
                'title'    => esc_html__( 'Sticky Menu link color', 'avas' ),
                'default'  => '#222',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'sticky-menu-link-hover-color',
                'type'     => 'color',
                'output'   => array( '.fixed-top .bddex-menu-list > ul > li > a:hover, .fixed-top .bddex-menu-list > ul > li > a:focus' ),
                'title'    => esc_html__( 'Sticky Menu link hover color', 'avas' ),
                'default'  => '#00e2ff',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'sticky-menu-link-bg-hover-color',
                'type'     => 'color',
                'output'   => array( 
                'background' => '.fixed-top .bddex-menu-list > ul > li > a:hover, .fixed-top .bddex-menu-list > ul > li > a:focus' ),
                'title'    => esc_html__( 'Sticky Menu link hover background color', 'avas' ),
                'default'  => '',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'sticky-menu-active-link-color',
                'type'     => 'color',
                'output'   => array( '.fixed-top .bddex-menu-list > ul > li.current-menu-item > a, .fixed-top .bddex-menu-list > ul > li.current-page-ancestor > a, .fixed-top .bddex-menu-list > ul > li.current-menu-ancestor > a, .fixed-top .bddex-menu-list > ul > li.current-menu-parent > a, .fixed-top .bddex-menu-list > ul > li.current_page_ancestor > a, .fixed-top .bddex-menu-list > ul >.active>a:hover' ),
                'title'    => esc_html__( 'Sticky Menu link active color', 'avas' ),
                'default'  => '#fff',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'sticky-menu-active-link-bg-color',
                'type'     => 'color',
                'output'   => array( 
                'background' => '.fixed-top .bddex-menu-list > ul > li.current-menu-item > a, .fixed-top .bddex-menu-list > ul > li.current-page-ancestor > a, .fixed-top .bddex-menu-list > ul > li.current-menu-ancestor > a, .fixed-top .bddex-menu-list > ul > li.current-menu-parent > a, .fixed-top .bddex-menu-list > ul > li.current_page_ancestor > a, .fixed-top .bddex-menu-list > ul >.active>a:hover' ),
                'title'    => esc_html__( 'Sticky Menu link active background color', 'avas' ),
                'default'  => '',
                'validate' => 'color',
                'transparent' => false,
            ),
// Menu button colors
            array(
                'id'    => 'Menu_btn_colors',
                'type'  => 'info',
                'style' => 'success',
                'desc'  => esc_html__('Menu Button Colors', 'avas')
            ),
            array(
                'id'       => 'menu-btn-bg-color',
                'type'     => 'color',
                'output'   => array( 'background' => '.bddex-menu-btn-wrap .bddex-menu-btn' ), 
                'title'    => esc_html__( 'Menu Button Background Color', 'avas' ),
                'default'  => '#444',
                'validate' => 'color',
                'transparent' => true,
            ),
            array(
                'id'       => 'menu-btn-bg-hov-color',
                'type'     => 'color',
                'output'   => array( 'background' => '.bddex-menu-btn-wrap .bddex-menu-btn:hover' ), 
                'title'    => esc_html__( 'Menu Button Background Hover Color', 'avas' ),
                'default'  => '#00B1CD',
                'validate' => 'color',
                'transparent' => true,
            ),
            array(
                'id'       => 'menu-btn-color',
                'type'     => 'color',
                'output'   => array( '.bddex-menu-btn-wrap .bddex-menu-btn' ), 
                'title'    => esc_html__( 'Menu Button Text Color', 'avas' ),
                'default'  => '#fff',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'menu-btn-hov-color',
                'type'     => 'color',
                'output'   => array( '.bddex-menu-btn-wrap .bddex-menu-btn:hover' ), 
                'title'    => esc_html__( 'Menu Button Text Hover Color', 'avas' ),
                'default'  => '#fff',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
               'id'       => 'menu-btn-border',
                'type'     => 'border',
                'title'    => esc_html__('Menu Button Border', 'avas'),
                'desc'     => esc_html__( 'Enter border width, example 1, 2, 3 etc to enable border', 'avas' ),
                'output'   => array('.bddex-menu-btn-wrap .bddex-menu-btn'),
                'color' => false,
                'default'  => array(
                    'border-color'  => '#E9003F', 
                    'border-style'  => 'solid', 
                    'border-top' => '0px',
                    'border-bottom' => '0px',
                    'border-left' => '0px',
                    'border-right' => '0px',
                )
                ),
            array(
                'id'       => 'menu-btn-bord-color',
                'type'     => 'color',
                'output'   => array( 'border-color' => '.bddex-menu-btn-wrap .bddex-menu-btn' ), 
                'title'    => esc_html__( 'Menu Button Border Color', 'avas' ),
                'default'  => '#444',
                'validate' => 'color',
                'transparent' => true,
            ),
            array(
                'id'       => 'menu-btn-bord-hov-color',
                'type'     => 'color',
                'output'   => array( 'border-color' => '.bddex-menu-btn-wrap .bddex-menu-btn:hover' ), 
                'title'    => esc_html__( 'Menu Button Border Hover Color', 'avas' ),
                'default'  => '#00B1CD',
                'validate' => 'color',
                'transparent' => true,
            ),
// sticky menu button colors
            array(
                'id'       => 'sticky-menu-btn-bg-color',
                'type'     => 'color',
                'output'   => array( 'background' => '.fixed-top .bddex-menu-btn-wrap .bddex-menu-btn' ), 
                'title'    => esc_html__( 'Sticky Menu Button Background Color', 'avas' ),
                'default'  => '#444',
                'validate' => 'color',
                'transparent' => true,
            ),   
            array(
                'id'       => 'sticky-menu-btn-bg-hov-color',
                'type'     => 'color',
                'output'   => array( 'background' => '.fixed-top .bddex-menu-btn-wrap .bddex-menu-btn:hover' ), 
                'title'    => esc_html__( 'Sticky Menu Button Background Hover Color', 'avas' ),
                'default'  => '#00B1CD',
                'validate' => 'color',
                'transparent' => true,
            ),
            array(
                'id'       => 'sticky-menu-btn-color',
                'type'     => 'color',
                'output'   => array( '.fixed-top .bddex-menu-btn-wrap .bddex-menu-btn' ), 
                'title'    => esc_html__( 'Sticky Menu Button Text Color', 'avas' ),
                'default'  => '#fff',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'sticky-menu-btn-hov-color',
                'type'     => 'color',
                'output'   => array( '.fixed-top .bddex-menu-btn-wrap .bddex-menu-btn:hover' ), 
                'title'    => esc_html__( 'Sticky Menu Button Text Hover Color', 'avas' ),
                'default'  => '#fff',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
               'id'       => 'sticky-menu-btn-border',
                'type'     => 'border',
                'title'    => esc_html__('Sticky Menu Button Border', 'avas'),
                'desc'     => esc_html__( 'Enter border width, example 1, 2, 3 etc to enable border', 'avas' ),
                'output'   => array('.fixed-top .bddex-menu-btn-wrap .bddex-menu-btn'),
                'color' => false,
                'default'  => array(
                    'border-color'  => '#E9003F', 
                    'border-style'  => 'solid', 
                    'border-top' => '0px',
                    'border-bottom' => '0px',
                    'border-left' => '0px',
                    'border-right' => '0px',
                )
                ),
            array(
                'id'       => 'sticky-menu-btn-bord-color',
                'type'     => 'color',
                'output'   => array( 'border-color' => '.fixed-top .bddex-menu-btn-wrap .bddex-menu-btn' ), 
                'title'    => esc_html__( 'Sticky Menu Button Border Color', 'avas' ),
                'default'  => '#444',
                'validate' => 'color',
                'transparent' => true,
            ),
            array(
                'id'       => 'sticky-menu-btn-bord-hov-color',
                'type'     => 'color',
                'output'   => array( 'border-color' => '.fixed-top .bddex-menu-btn-wrap .bddex-menu-btn:hover' ), 
                'title'    => esc_html__( 'Sticky Menu Button Border Hover Color', 'avas' ),
                'default'  => '#00B1CD',
                'validate' => 'color',
                'transparent' => true,
            ),         
// side menu colors
            array(
                'id'    => 'side_menu_colors',
                'type'  => 'info',
                'style' => 'success',
                'desc'  => esc_html__('Side Menu Colors', 'avas')
            ),
            array(
                'id'       => 'side-menu-icon-color',
                'type'     => 'color',
                'output'   => array( '.side_menu_icon' ), 
                'title'    => esc_html__( 'Side Menu Icon Color', 'avas' ),
                'default'  => '#222',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'side-menu-icon-color-hover',
                'type'     => 'color',
                'output'   => array( '.side_menu_icon:hover' ), 
                'title'    => esc_html__( 'Side Menu Icon Hover Color', 'avas' ),
                'default'  => '#0AB0C5',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'side-menu-icon-close-color',
                'type'     => 'color',
                'output'   => array( '.side-menu .s-menu-icon-close' ), 
                'title'    => esc_html__( 'Side Menu Icon Close Color', 'avas' ),
                'default'  => '#bcbcbc',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'side-menu-icon-close-color-hover',
                'type'     => 'color',
                'output'   => array( '.side-menu .s-menu-icon-close:hover' ), 
                'title'    => esc_html__( 'Side Menu Icon Close Hover Color', 'avas' ),
                'default'  => '#fff',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'side-menu-bg-color',
                'type'     => 'color',
                'output'   => array('background' => '#side-menu-wrapper' ), 
                'title'    => esc_html__( 'Side Menu Background Color', 'avas' ),
                'default'  => '#232323',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'side-menu-text-color',
                'type'     => 'color',
                'output'   => array('#side-menu-wrapper' ), 
                'title'    => esc_html__( 'Side Menu Text Color', 'avas' ),
                'default'  => '#D8D8D8',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'side-menu-link-color',
                'type'     => 'color',
                'output'   => array('.side-menu a' ), 
                'title'    => esc_html__( 'Side Menu Link Color', 'avas' ),
                'default'  => '#E5E5E5',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'side-menu-link-hover-color',
                'type'     => 'color',
                'output'   => array('.side-menu a:hover' ), 
                'title'    => esc_html__( 'Side Menu Link Hover Color', 'avas' ),
                'default'  => '#fff',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'side-menu-widget-title-color',
                'type'     => 'color',
                'output'   => array('#side-menu-wrapper .widget-title' ), 
                'title'    => esc_html__( 'Side Menu Widget Title Color', 'avas' ),
                'default'  => '#f2f2f2',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'sticky-side-menu-icon-color',
                'type'     => 'color',
                'output'   => array( '.fixed-top .side_menu_icon' ), 
                'title'    => esc_html__( 'Sticky Side Menu Icon Color', 'avas' ),
                'default'  => '#222',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'sticky-side-menu-icon-color-hover',
                'type'     => 'color',
                'output'   => array( '.fixed-top .side_menu_icon:hover' ), 
                'title'    => esc_html__( 'Sticky Side Menu Icon Hover Color', 'avas' ),
                'default'  => '#0AB0C5',
                'validate' => 'color',
                'transparent' => false,
            ),

// mobile menu colors
            array(
                'id'    => 'mob_menu_colors',
                'type'  => 'info',
                'style' => 'success',
                'desc'  => esc_html__('Mobile Menu Colors', 'avas')
            ),
            array(
                'id'          => 'mobile-menu-icon-color',
                'type'        => 'color',
                'output'      => array('background' => '.bddex-hamburger::before, .bddex-hamburger::after, .bddex-hamburger span'),
                'title'       => esc_html__( 'Mobile menu icon color', 'avas' ),
                'default'     => '#333',
                'transparent' => false,
                'validate'    => 'color',
                ),

            array(
                'id'          => 'mobile-menu-icon-sticky-color',
                'type'        => 'color',
                'output'      => array('background' => '.fixed-top .bddex-hamburger::before,.fixed-top .bddex-hamburger::after,.fixed-top .bddex-hamburger span'),
                'title'       => esc_html__( 'Mobile menu sticky icon color', 'avas' ),
                'default'     => '#333',
                'transparent' => false,
                'validate'    => 'color',
                ),
            array(
                'id'          => 'mobile-menu-bg-color',
                'type'        => 'color',
                'output'      => array('background' => '.active-menu-mb,.bddex-menu-list.active-menu-mb > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul'),
                'title'       => esc_html__( 'Mobile menu background color', 'avas' ),
                'default'     => '#000',
                'transparent' => false,
                'validate'    => 'color',
                ),
             array(
                'id'          => 'mobile-menu-link-color',
                'type'        => 'color',
                'output'      => array('color' => '.bddex-menu-list.active-menu-mb > ul > li > a,.bddex-menu-list.active-menu-mb > ul > li.menu-item-has-children .mb-dropdown-icon:before'),
                'title'       => esc_html__( 'Mobile menu link color', 'avas' ),
                'default'     => '#fff',
                'transparent' => false,
                'validate'    => 'color',
                ),
             array(
                'id'          => 'mobile-menu-sub-link-color',
                'type'        => 'color',
                'output'      => array('color' => '.bddex-menu-list.active-menu-mb > ul > li.menu-item-has-children.nomega-menu-item > ul > li > a,.bddex-menu-list.active-menu-mb > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul > li > a,.bddex-menu-list.active-menu-mb > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul > li > ul > li > a,.bddex-menu-list.active-menu-mb > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul > li > ul > li > ul > li > a,.bddex-menu-list.active-menu-mb > ul > li.menu-item-has-children.mega-menu-item > ul.columns4 > li > ul > li > a,.bddex-menu-list.active-menu-mb > ul > li.menu-item-has-children.mega-menu-item > ul.columns1 > li > a, .bddex-menu-list.active-menu-mb > ul > li.menu-item-has-children.mega-menu-item > ul.columns2 > li > a, .bddex-menu-list.active-menu-mb > ul > li.menu-item-has-children.mega-menu-item > ul.columns3 > li > a, .bddex-menu-list.active-menu-mb > ul > li.menu-item-has-children.mega-menu-item > ul.columns4 > li > a, .nomega-menu-item .widget-title,.bddex-menu-list.active-menu-mb > ul > li.menu-item-has-children > ul > li.menu-item-has-children .mb-dropdown-icon:before'),
                'title'       => esc_html__( 'Mobile menu sub link color', 'avas' ),
                'default'     => '#fff',
                'transparent' => false,
                'validate'    => 'color',
                ),
             
            array(
                'id'          => 'mobile-menu-brd-color',
                'type'        => 'color',
                'output'      => array('border-color' => '.active-menu-mb .nav > li, .bddex-menu-list.active-menu-mb > ul > li.menu-item-has-children > ul > li a,.bddex-menu-list.active-menu-mb > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul > li > a,.bddex-menu-list.active-menu-mb > ul > li.menu-item-has-children > ul > li.menu-item-has-children > ul > li a'),
                'title'       => esc_html__( 'Mobile menu border color', 'avas' ),
                'default'     => '#232323',
                'transparent' => false,
                'validate'    => 'color',
                ),
// footer menu colors
            array(
                'id'    => 'footer_menu_colors',
                'type'  => 'info',
                'style' => 'success',
                'desc'  => esc_html__('Footer Menu Colors', 'avas')
            ),
            array(
                'id'          => 'footer-menu-color',
                'type'        => 'color',
                'output'      => array('color' => '.footer-menu li a'),
                'title'       => esc_html__( 'Footer menu color', 'avas' ),
                'default'     => '#bfbfbf',
                'transparent' => false,
                'validate'    => 'color',
                ),
            array(
                'id'          => 'footer-menu-hover-color',
                'type'        => 'color',
                'output'      => array('color' => '.footer-menu li a:hover'),
                'title'       => esc_html__( 'Footer menu hover color', 'avas' ),
                'default'     => '#00BCD4',
                'transparent' => false,
                'validate'    => 'color',
                ),
            array(
                'id'          => 'footer-menu-separator-color',
                'type'        => 'color',
                'output'      => array('color' => '.footer-menu li:after'),
                'title'       => esc_html__( 'Footer menu seperator color', 'avas' ),
                'default'     => '#777272',
                'transparent' => false,
                'validate'    => 'color',
                ),
            
    )));

    // Login color / Register color options
     Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Login', 'avas' ),
        'id'         => 'login-color',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'login_register_link',
                'type'     => 'color',
                'output'   => array( '.login_button' ),
                'title'    => esc_html__( 'Link color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'login_register_hover',
                'type'     => 'color',
                'output'   => array( '.login_button:hover' ),
                'title'    => esc_html__( 'Hover color', 'avas' ),
                'default'  => '#fff',
                'validate' => 'color',
                'transparent' => false,
            ),
        )));
     // Welcome Message color options
     Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Welcome Message', 'avas' ),
        'id'         => 'welcome_message_color',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'welcome_msg_color',
                'type'     => 'color',
                'output'   => array( '.welcome_msg' ),
                'title'    => esc_html__( 'Color', 'avas' ),
                'default'  => '#fff',
                'validate' => 'color',
                'transparent' => false,
            ),
        )));
     // Date color options
     Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Date', 'avas' ),
        'id'         => 'date_color',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'date-color',
                'type'     => 'color',
                'output'   => array( '.bddex-date, .bddex-date .fa-clock-o' ),
                'title'    => esc_html__( 'Color', 'avas' ),
                'default'  => '#fff',
                'validate' => 'color',
                'transparent' => false,
            ),
        )));
     // Phone & Email color options
     Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Phone & Email', 'avas' ),
        'id'         => 'phone_email_color',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'fon-email-color',
                'type'     => 'color',
                'output'   => array( '.head_contact li a' ),
                'title'    => esc_html__( 'Text Color', 'avas' ),
                'default'  => '',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'fon-email-hover-color',
                'type'     => 'color',
                'output'   => array( '.head_contact li a:hover' ),
                'title'    => esc_html__( 'Text Hover Color', 'avas' ),
                'default'  => '',
                'validate' => 'color',
                'transparent' => false,
            ),
        )));

     // Services color options
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Services', 'avas' ),
        'id'         => 'service-color',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'service-title-color',
                'type'     => 'color',
                'output'   => array( 'color' =>'.service h3 a' ),
                'title'    => esc_html__( 'Services title color', 'avas' ),
                'default'  => '#222',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'service-title-hover-color',
                'type'     => 'color',
                'output'   => array( 'color' =>'.service h3 a:hover,.service .item:hover .details h3 a' ),
                'title'    => esc_html__( 'Services title hover color', 'avas' ),
                'default'  => '#00bcd4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'service-details-button-color',
                'type'     => 'color',
                'output'   => array( 'color' =>'.service .item .button,.project-items figcaption .button' ),
                'title'    => esc_html__( 'Services button color', 'avas' ),
                'default'  => '#f5f5f5',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'service-details-button-hover-color',
                'type'     => 'color',
                'output'   => array( 'color' =>'.service .item .button:hover,.services.button.details:hover' ),
                'title'    => esc_html__( 'Services button hover color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'service-details-button-border-color',
                'type'     => 'color',
                'output'   => array( 'border-color' =>'.service .item .button,.project-items figcaption .button' ),
                'title'    => esc_html__( 'Services button border color', 'avas' ),
                'default'  => '#f5f5f5',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'service-details-button-border-hover-color',
                'type'     => 'color',
                'output'   => array( 'border-color' =>'.service .item .button:hover,.services.button.details:hover' ),
                'title'    => esc_html__( 'Services button border hover color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'service-brochure-title-color',
                'type'     => 'color',
                'output'   => array( 'color' =>'.service-brochure h4,.client-title' ),
                'title'    => esc_html__( 'Services sidebar title color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'service-brochure-border-color',
                'type'     => 'color',
                'output'   => array( 'background' =>'.service-brochure h4:after,.client-title:after' ),
                'title'    => esc_html__( 'Services sidebar border color', 'avas' ),
                'default'  => '#00bcd4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'service-sidebar-button-bg-color',
                'type'     => 'color',
                'output'   => array( 'background' =>'.btn-brochure' ),
                'title'    => esc_html__( 'Services sidebar button background color', 'avas' ),
                'default'  => '#8CC63F',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'service-sidebar-button-border-color',
                'type'     => 'color',
                'output'   => array( 'border-color' =>'.btn-brochure' ),
                'title'    => esc_html__( 'Services sidebar button border color', 'avas' ),
                'default'  => '#8CC63F',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'service-sidebar-button-color',
                'type'     => 'color',
                'output'   => array( 'color' =>'.btn-brochure' ),
                'title'    => esc_html__( 'Services sidebar button color', 'avas' ),
                'default'  => '#fff',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'service-sidebar-button-hover-color',
                'type'     => 'color',
                'output'   => array( 'color' =>'.btn-brochure:hover' ),
                'title'    => esc_html__( 'Services sidebar button hover color', 'avas' ),
                'default'  => '#8CC63F',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'service-sidebar-button-border-hover-color',
                'type'     => 'color',
                'output'   => array( 'border-color' =>'.btn-brochure:hover' ),
                'title'    => esc_html__( 'Services sidebar button border hover color', 'avas' ),
                'default'  => '#8CC63F',
                'validate' => 'color',
                'transparent' => false,
            ),
            
        )));

    // Team color options
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Team', 'avas' ),
        'id'         => 'team-color',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'team_skills',
                'type'     => 'color',
                'output'   => array( 'background' =>'.single-team .progress-bar' ),
                'title'    => esc_html__( 'Team Skills Progress Bar Background color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'team_profile',
                'type'     => 'color',
                'output'   => array( 'background' =>'.team_profile' ),
                'title'    => esc_html__( 'Team Profile Image Social Background color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'team_img_overlay',
                'type'     => 'color',
                'output'   => array( 'background' =>'.team figcaption' ),
                'title'    => esc_html__( 'Team image overlay color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'project_exp_img_overlay',
                'type'     => 'color',
                'output'   => array( 'background' =>'.project-carousel figcaption' ),
                'title'    => esc_html__( 'Project Experience image overlay color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'project-carousel-figcaption-h4-a',
                'type'     => 'color',
                'output'   => array( '.project-carousel figcaption h4 a' ),
                'title'    => esc_html__( 'Project Experience title color', 'avas' ),
                'default'  => '#fff',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'project-carousel-figcaption-h4-a-hover',
                'type'     => 'color',
                'output'   => array( '.project-carousel figcaption h4 a:hover' ),
                'title'    => esc_html__( 'Project Experience title hover color', 'avas' ),
                'default'  => '#333',
                'validate' => 'color',
                'transparent' => false,
            ),

        )));
    // Portfolio color options    
        Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Portfolio', 'avas' ),
        'id'         => 'portfolio-color',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'da-thumbs-li-a-div-span',
                'type'     => 'color',
                'output'   => array( '.da-thumbs li a div span' ),
                'title'    => esc_html__( 'Portfolio title color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'portfolio-content-p',
                'type'     => 'color',
                'output'   => array( '.portfolio-content p' ),
                'title'    => esc_html__( 'Portfolio content text color', 'avas' ),
                'default'  => '#F7F7F7',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'portfolio-title',
                'type'     => 'color',
                'output'   => array( '.portfolio-title' ),
                'title'    => esc_html__( 'Single portfolio page title color', 'avas' ),
                'default'  => '#444444',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'portfolio-content-right-p',
                'type'     => 'color',
                'output'   => array( '.portfolio-content-right p' ),
                'title'    => esc_html__( 'Single portfolio page content text color', 'avas' ),
                'default'  => '#555555',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'portfolio-button-color',
                'type'     => 'color',
                'output'   => array( '.portfolio-items figcaption .button' ),
                'title'    => esc_html__( 'Overlay button color', 'avas' ),
                'default'  => '#e5e5e5',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'portfolio-button-hover-color',
                'type'     => 'color',
                'output'   => array( 'a.button.details:hover' ),
                'title'    => esc_html__( 'Overlay button hover color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'portfolio-progressbar-bg-color',
                'type'     => 'color',
                'output'   => array( 'background'=>'.single-portfolio-item .progress-bar' ),
                'title'    => esc_html__( 'Single Portfolio Progress Bar Background Color', 'avas' ),
                'default'  => '#FFCC00',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'portfolio-progressbar-color',
                'type'     => 'color',
                'output'   => array( '.single-portfolio-item .progress-bar' ),
                'title'    => esc_html__( 'Single Portfolio Progress-bar Text Color', 'avas' ),
                'default'  => '#1b1b1b',
                'validate' => 'color',
                'transparent' => false,
            ),



    ))); 
    // Sidebar color options
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Sidebar', 'avas' ),
        'id'         => 'sidebar-color',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'sidebar-bg-color',
                'type'     => 'color',
                'output'   => array( 'background' => '#secondary .widget, #secondary_2 .widget' ),
                'title'    => esc_html__( 'Sidebar background color', 'avas' ),
                'default'  => '#f7f8fa',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'sidebar-title-color',
                'type'     => 'color',
                'output'   => array( '.elementor h2.widgettitle, .elementor h3.widgettitle, #secondary h2.widgettitle, #secondary h3.widget-title, #secondary_2 h3.widget-title,.elementor h2.widgettitle, .elementor h3.widget-title, .elementor h3.widget-title' ),
                'title'    => esc_html__( 'Sidebar title color', 'avas' ),
                'default'  => '#222',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'sidebar-title-border-color',
                'type'     => 'color',
                'output'   => array( 'border-color' => '.elementor h2.widgettitle,.elementor h3.widgettitle,#secondary h2.widgettitle, #secondary h3.widget-title, #secondary_2 h3.widget-title,.elementor h2.widgettitle, .elementor h3.widget-title, .elementor h3.widget-title' ),
                'title'    => esc_html__( 'Sidebar title border color', 'avas' ),
                'default'  => '#dadada',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'sidebar-title-border-after-color',
                'type'     => 'color',
                'output'   => array( 'background-color' => '.elementor h2.widgettitle:after,.elementor h3.widgettitle:after,#secondary h2.widgettitle:after, #secondary h3.widget-title:after, #secondary_2 h3.widget-title:after,.elementor h2.widgettitle:after, .elementor h3.widget-title:after, .elementor h3.widget-title:after' ),
                'title'    => esc_html__( 'Sidebar title border after color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'sidebar-search-icon-color',
                'type'     => 'color',
                'output'   => array( 'color' => '.search-form i' ),
                'title'    => esc_html__( 'Sidebar search icon color', 'avas' ),
                'default'  => '#5a5a5a',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'sidebar-search-icon-hover-color',
                'type'     => 'color',
                'output'   => array( 'color' => '.search-form i:hover' ),
                'title'    => esc_html__( 'Sidebar search icon hover color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'sidebar-category-color',
                'type'     => 'color',
                'output'   => array( 'color' => '#secondary li.cat-item a,elementor-widget-container li.cat-item a' ),
                'title'    => esc_html__( 'Sidebar category color', 'avas' ),
                'default'  => '#2d2d2d',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'sidebar-category-hover-color',
                'type'     => 'color',
                'output'   => array( 'color' => '#secondary li.cat-item a:hover,.elementor-widget-container li.cat-item a:hover' ),
                'title'    => esc_html__( 'Sidebar category hover color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'sidebar-recent-post-color',
                'type'     => 'color',
                'output'   => array( 'color' => '.rpt a' ),
                'title'    => esc_html__( 'Sidebar recent post color', 'avas' ),
                'default'  => '#222',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'sidebar-recent-post-hover-color',
                'type'     => 'color',
                'output'   => array( 'color' => '.rpt a:hover' ),
                'title'    => esc_html__( 'Sidebar recent post hover color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'sidebar-comment-color',
                'type'     => 'color',
                'output'   => array( 'color' => '.recentcomments' ),
                'title'    => esc_html__( 'Sidebar comments color', 'avas' ),
                'default'  => '',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'sidebar-comment-link-color',
                'type'     => 'color',
                'output'   => array( 'color' => '.recentcomments a' ),
                'title'    => esc_html__( 'Sidebar comments link color', 'avas' ),
                'default'  => '',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'sidebar-comment-link-hover-color',
                'type'     => 'color',
                'output'   => array( 'color' => '.recentcomments a:hover' ),
                'title'    => esc_html__( 'Sidebar comments link hover color', 'avas' ),
                'default'  => '',
                'validate' => 'color',
                'transparent' => false,
            ),
    )));        
// Blog color options    
Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Blog', 'avas' ),
        'desc'      => 'Elementor Widget Posts Carousel 2 color options',
        'id'         => 'blog-color',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'post_title_color',
                'type'     => 'color',
                'output'   => array( 'color' => '.details-box .post-title a' ),
                'title'    => esc_html__( 'Post title color', 'avas' ),
                'default'  => '#111',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'post_title_hover_color',
                'type'     => 'color',
                'output'   => array( 'color' => '.blog-cols:hover .details-box .post-title a' ),
                'title'    => esc_html__( 'Post title hover color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'post_bottom_border_hover_color',
                'type'     => 'color',
                'output'   => array( 'border-color' => '.blog-cols:hover .details-box' ),
                'title'    => esc_html__( 'Post bottom border hover color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'post_time_color',
                'type'     => 'color',
                'output'   => array( 'background' => '.details-box .post-time' ),
                'title'    => esc_html__( 'Post date background color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'post_date_color',
                'type'     => 'color',
                'output'   => array( 'background' => '.blog-cols:hover .details-box .post-time' ),
                'title'    => esc_html__( 'Post date background color hover', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'post_readmore_color',
                'type'     => 'color',
                'output'   => array( 'color' => '.read-more' ),
                'title'    => esc_html__( 'Post read more color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'post_readmore_hover_color',
                'type'     => 'color',
                'output'   => array( 'color' => '.read-more:hover' ),
                'title'    => esc_html__( 'Post read more hover color', 'avas' ),
                'default'  => '#3CE6FF',
                'validate' => 'color',
                'transparent' => false,
            ),
             array(
                        'id'        => 'Single-Posts-Color-Settings',
                        'type'      => 'info',
                        'title'     => esc_html__('Single Posts and archives Color Settings', 'avas'),
                        'style'     => 'success', //success warning
                    ),
            array(
                'id'       => 'posts-title-color',
                'type'     => 'color',
                'output'   => array( 'h1.entry-title a' ),
                'title'    => esc_html__( 'Posts title color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'post-title-hover-color',
                'type'     => 'color',
                'output'   => array( 'h1.entry-title a:hover,.page-template-blog article:hover .entry-title a' ),
                'title'    => esc_html__( 'Post title hover color', 'avas' ),
                'default'  => '#222',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'post_meta_icon_color',
                'type'     => 'color',
                'output'   => array( 'color' => '.entry-meta i, .entry-footer i' ),
                'title'    => esc_html__( 'Post meta icon color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'post_comment_form_btn_bg_color',
                'type'     => 'color',
                'output'   => array( 'background-color' => '.form-submit input[type="submit"]' ),
                'title'    => esc_html__( 'Post comment form button background color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'post_comment_form_btn_br_color',
                'type'     => 'color',
                'output'   => array( 'border-color' => '.form-submit input[type="submit"]' ),
                'title'    => esc_html__( 'Post comment form button border color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'post_comment_form_btn_color',
                'type'     => 'color',
                'output'   => array( 'border-color' => '.form-submit input[type="submit"]' ),
                'title'    => esc_html__( 'Post comment form button font color', 'avas' ),
                'default'  => '#fff',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'post_comment_form_btn_font_hover_color',
                'type'     => 'color',
                'output'   => array( 'color' => '.form-submit input[type="submit"]:hover' ),
                'title'    => esc_html__( 'Post comment form button font hover color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'post_comment_form_btn_br_hover_color',
                'type'     => 'color',
                'output'   => array( 'border-color' => '.form-submit input[type="submit"]:hover' ),
                'title'    => esc_html__( 'Post comment form button border hover color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'form-control-focus',
                'type'     => 'color',
                'output'   => array( 'border-color' => '.form-control:focus' ),
                'title'    => esc_html__( 'Post comment form border focus color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
    )));   
// WooCommerce color options    
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'WooCommerce', 'avas' ),
        'id'         => 'woocommerce-color',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'cart-icon-color',
                'type'     => 'color',
                'output'   => array( '#header_cart i, #header_cart span' ),
                'title'    => esc_html__( 'Header Cart icon color', 'avas' ),
                'default'  => '#222',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'cart-icon-hover-color',
                'type'     => 'color',
                'output'   => array( '#header_cart:hover i, #header_cart:hover span' ),
                'title'    => esc_html__( 'Cart icon hover color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'sticky_cart-icon-color',
                'type'     => 'color',
                'output'   => array( '.fixed-top #header_cart i, .fixed-top #header_cart span' ),
                'title'    => esc_html__( 'Sticky Cart icon color', 'avas' ),
                'default'  => '#222',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'sticky_cart-icon-hover-color',
                'type'     => 'color',
                'output'   => array( '.fixed-top #header_cart:hover i, .fixed-top #header_cart:hover span' ),
                'title'    => esc_html__( 'Sticky Cart icon hover color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'woo_product_title_color',
                'type'     => 'color',
                'output'   => array( 'color' => 'li.product .woocommerce-loop-product__title' ),
                'title'    => esc_html__( 'Product Title Color', 'avas' ),
                'default'  => '#1D3261',
                'validate' => 'color',
                'transparent' => false,
            ),
             array(
                'id'       => 'woo_product_title_hover_color',
                'type'     => 'color',
                'output'   => array( 'color' => 'li.product:hover .woocommerce-loop-product__title' ),
                'title'    => esc_html__( 'Product Title Hover Color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),

            array(
                'id'       => 'woo_btns_overlay_hover_color',
                'type'     => 'color',
                'output'   => array( 'color' => 'li.product .button:hover' ),
                'title'    => esc_html__( 'Product Overlay Button Hover Color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'woo_btns_overlay_hover_border_color',
                'type'     => 'color',
                'output'   => array( 'border-color' => 'li.product .button:hover' ),
                'title'    => esc_html__( 'Product Overlay Button Border Hover Color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'woo_btns_bg',
                'type'     => 'color',
                'output'   => array( 'background-color' => '.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt' ),
                'title'    => esc_html__( 'Product Page Button Background Color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'woo_btns_bd',
                'type'     => 'color',
                'output'   => array( 'border-color' => '.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt' ),
                'title'    => esc_html__( 'Product Page Button border Color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'woo_btns_cr',
                'type'     => 'color',
                'output'   => array( 'color' => '.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.woo-cars li.product> .product_type_external, .woocom li.product> .product_type_external, .woo-cars li.product> .product_type_grouped, .woocom li.product> .product_type_grouped, .woo-cars li.product> .add_to_cart_button, .woocom li.product> .add_to_cart_button' ),
                'title'    => esc_html__( 'Product Page Button Color', 'avas' ),
                'default'  => '#fff',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'woo_btns_cr_hov',
                'type'     => 'color',
                'output'   => array( 'color' => '.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce ul.products li.product .button:hover,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woo-cars li.product> .product_type_external:hover,
.woocom li.product> .product_type_external:hover,
.woo-cars li.product> .product_type_grouped:hover,
.woocom li.product> .product_type_grouped:hover,
.woo-cars li.product .add_to_cart_button:hover,
.woocom li.product .add_to_cart_button:hover' ),
                'title'    => esc_html__( 'Product Page Button Hover Color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'woo_btns_bd_hov',
                'type'     => 'color',
                'output'   => array( 'border-color' => '.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce ul.products li.product .button:hover' ),
                'title'    => esc_html__( 'Product Page Button Border Hover Color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'woo_prod_sale_bg',
                'type'     => 'color',
                'output'   => array( 'background' => '.woocommerce span.onsale,.woo-cars .onsale, .woocom .onsale' ),
                'title'    => esc_html__( 'Product Sale Badge Background Color', 'avas' ),
                'default'  => '#222',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'woo_prod_sale_clr',
                'type'     => 'color',
                'output'   => array( 'color' => '.woocommerce span.onsale,.woo-cars .onsale, .woocom .onsale' ),
                'title'    => esc_html__( 'Product Sale Badge Text Color', 'avas' ),
                'default'  => '#fff',
                'validate' => 'color',
                'transparent' => false,
            ),           
            array(
                'id'       => 'woo_single_product_title_color',
                'type'     => 'color',
                'output'   => array( 'color' => '.woocommerce div.product .product_title' ),
                'title'    => esc_html__( 'Single Product Title Color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'woo_single_product_sku_color',
                'type'     => 'color',
                'output'   => array( 'color' => '.sku' ),
                'title'    => esc_html__( 'Single Product SKU Color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'woo_single_product_cat_color',
                'type'     => 'color',
                'output'   => array( 'color' => '.posted_in a' ),
                'title'    => esc_html__( 'Single Product Category Color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'woo_single_product_cat_hov_color',
                'type'     => 'color',
                'output'   => array( 'color' => '.posted_in a:hover' ),
                'title'    => esc_html__( 'Single Product Category Hover Color', 'avas' ),
                'default'  => '#000',
                'validate' => 'color',
                'transparent' => false,
            ),
    )));
    // social media icon color options
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Social Media', 'avas' ),
        'id'         => 'social-color',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'social-media-icon-header-color',
                'type'     => 'color',
                'output'   => array( 'color' => '.header .social li a' ),
                'title'    => esc_html__( 'Social profile icon color on header', 'avas' ),
                'default'  => '#fff',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'social-media-icon-header-color-hover',
                'type'     => 'color',
                'output'   => array( 'color' => '.header .social li a:hover' ),
                'title'    => esc_html__( 'Social profile icon color hover on header', 'avas' ),
                'default'  => '#000',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'social-media-icon-footer-color',
                'type'     => 'color',
                'output'   => array( 'color' => '#footer .social .fa' ),
                'title'    => esc_html__( 'Social profile icon color on footer', 'avas' ),
                'default'  => '#fff',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'social-media-icon-shortcode-color',
                'type'     => 'color',
                'output'   => array( 'color' => '.social li a, #footer-top .social li a' ),
                'title'    => esc_html__( 'Social profile icon color on shortcode', 'avas' ),
                'default'  => '#fff',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'social-media-border-color',
                'type'     => 'color',
                'output'   => array( 'border-color' => '#footer-top .social li a' ),
                'title'    => esc_html__( 'Social profile border color', 'avas' ),
                'default'  => '#fff',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'social_share_bg_clr',
                'type'     => 'color',
                'output'   => array( 'background' => '.social-share' ),
                'title'    => esc_html__( 'Share on Background Color', 'avas' ),
                'default'  => '#fff',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'social_share_brdr_clr',
                'type'     => 'color',
                'output'   => array( 'border-color' => '.social-share' ),
                'title'    => esc_html__( 'Share on Border Color', 'avas' ),
                'default'  => '#E5E5E5',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'social-share-title-color',
                'type'     => 'color',
                'output'   => array( 'color' => '.social-share h5' ),
                'title'    => esc_html__( 'Share on text color', 'avas' ),
                'default'  => '#222',
                'validate' => 'color',
                'transparent' => false,
            ),
            
            
    )));
// icon color options
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Icons', 'avas' ),
        'id'         => 'icons-color',
        'subsection' => true,
        'fields'     => array(
            
            array(
                'id'       => 'search-icon-color',
                'type'     => 'color',
                'output'   => array( '.search-icon a' ),
                'title'    => esc_html__( 'Header Search icon color', 'avas' ),
                'default'  => '#222',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'search-icon-hover-color',
                'type'     => 'color',
                'output'   => array( '.search-icon a:hover' ),
                'title'    => esc_html__( 'Search icon hover color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'sticky_earch-icon-color',
                'type'     => 'color',
                'output'   => array( '.fixed-top .search-icon a' ),
                'title'    => esc_html__( 'Sticky Search icon color', 'avas' ),
                'default'  => '#222',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'sticky_search-icon-hover-color',
                'type'     => 'color',
                'output'   => array( '.fixed-top .search-icon a:hover' ),
                'title'    => esc_html__( 'Sticky Search icon hover color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'search-icon-close-color',
                'type'     => 'color',
                'output'   => array( '.search-box > .search-close' ),
                'title'    => esc_html__( 'Search close icon color', 'avas' ),
                'default'  => '#111',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'search-icon-close-hover-color',
                'type'     => 'color',
                'output'   => array( '.search-box > .search-close:hover,.search-close:hover i' ),
                'title'    => esc_html__( 'Search close icon hover color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'phone_email_icon_color',
                'type'     => 'color',
                'output'   => array( '.head_contact i' ),
                'title'    => esc_html__( 'Phone & Email icon color', 'avas' ),
                'default'  => '#eee',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'back_top_bg',
                'type'     => 'color',
                'output'   => array( 'background-color' => '#back_top' ),
                'title'    => esc_html__( 'Back to top bg color', 'avas' ),
                'default'  => '#fff',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'back_top_border',
                'type'     => 'color',
                'output'   => array( 'border-color' => '#back_top' ),
                'title'    => esc_html__( 'Back to top border color', 'avas' ),
                'default'  => '#1C1C1C',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'back_top_icon',
                'type'     => 'color',
                'output'   => array( 'color' => '#back_top i' ),
                'title'    => esc_html__( 'Back to top icon color', 'avas' ),
                'default'  => '#1C1C1C',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'back_top_icon_hover',
                'type'     => 'color',
                'output'   => array( 'color' => '#back_top i:hover,#back_top i:focus, #back_top:hover i' ),
                'title'    => esc_html__( 'Back to top icon hover color', 'avas' ),
                'default'  => '#FFFFFF',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'back_top_bg_hover',
                'type'     => 'color',
                'output'   => array( 'background-color' => '#back_top:hover,#back_top:focus' ),
                'title'    => esc_html__( 'Back to top bg hover color', 'avas' ),
                'default'  => '#1C1C1C',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'back_top_border_hover',
                'type'     => 'color',
                'output'   => array( 'border-color' => '#back_top:hover,#back_top:focus' ),
                'title'    => esc_html__( 'Back to top border hover color', 'avas' ),
                'default'  => '#1C1C1C',
                'validate' => 'color',
                'transparent' => false,
            ),
        )));

    // Contact form, login form newsletter mailchimp color options
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Forms', 'avas' ),
        'id'         => 'contact_newsletter_color',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'contact_form_button_bg_color',
                'type'     => 'color',
                'output'   => array( 'background-color' => 'input.wpcf7-form-control.wpcf7-submit' ),
                'title'    => esc_html__( 'Contact Form Button Background', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'contact_form_button_border_color',
                'type'     => 'color',
                'output'   => array( 'border-color' => 'input.wpcf7-form-control.wpcf7-submit' ),
                'title'    => esc_html__( 'Contact Form Button Border', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'contact_form_button_color',
                'type'     => 'color',
                'output'   => array( 'color' => 'input.wpcf7-form-control.wpcf7-submit,.footer input.wpcf7-form-control.wpcf7-submit' ),
                'title'    => esc_html__( 'Contact Form Button Color', 'avas' ),
                'default'  => '#fff',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'contact_form_button_hover_color',
                'type'     => 'color',
                'output'   => array( 'color' => 'input.wpcf7-form-control.wpcf7-submit:hover' ),
                'title'    => esc_html__( 'Contact Form Button Hover Color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'contact_form_button_border_color_hover',
                'type'     => 'color',
                'output'   => array( 'border-color' => 'input.wpcf7-form-control.wpcf7-submit:hover' ),
                'title'    => esc_html__( 'Contact Form Button Border Hover Color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'contact_form_fields_border_color',
                'type'     => 'color',
                'output'   => array( 'border-color' => '.footer input.wpcf7-form-control.wpcf7-text,.footer textarea.wpcf7-form-control.wpcf7-textarea' ),
                'title'    => esc_html__( 'Contact Form Footer Fields Border Color', 'avas' ),
                'default'  => '#615f5f',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'login_form_button_bg_color',
                'type'     => 'color',
                'output'   => array( 'background' => '.bddex_login_register input.submit_button' ),
                'title'    => esc_html__( 'Login Form Button Background', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'login_form_button_border_color',
                'type'     => 'color',
                'output'   => array( 'border-color' => '.bddex_login_register input.submit_button' ),
                'title'    => esc_html__( 'Login Form Button Border', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'login_form_button_color',
                'type'     => 'color',
                'output'   => array( 'color' => '.bddex_login_register input.submit_button' ),
                'title'    => esc_html__( 'Login Form Button Color', 'avas' ),
                'default'  => '#fff',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'login_form_button_hover_color',
                'type'     => 'color',
                'output'   => array( 'color' => '.bddex_login_register input.submit_button:hover' ),
                'title'    => esc_html__( 'Login Form Button Hover Color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'login_form_button_border_color_hover',
                'type'     => 'color',
                'output'   => array( 'border-color' => '.bddex_login_register input.submit_button:hover' ),
                'title'    => esc_html__( 'login Form Button Border Hover Color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            // mailchimp
            array(
                'id'       => 'mailchimp-input-color',
                'type'     => 'color',
                'output'   => array( '.mc4wp-form input[type=text],.mc4wp-form input[type=email],.footer .mc4wp-form input[type=text],.footer .mc4wp-form input[type=email]' ),
                'title'    => esc_html__( 'Mailchimp Input Field Text Color', 'avas' ),
                'default'  => '#f1f1f1',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'mailchimp-input-bg',
                'type'     => 'color',
                'output'   => array( 'background' => '.mc4wp-form input[type=text],.mc4wp-form input[type=email],.footer .mc4wp-form input[type=text],.footer .mc4wp-form input[type=email]' ),
                'title'    => esc_html__( 'Mailchimp Input Field Background Color', 'avas' ),
                'default'  => '#fff',
                'validate' => 'color',
                'transparent' => true,
            ),
            array(
                'id'       => 'mailchimp-input-border',
                'type'     => 'border',
                'title'    => esc_html__('Mailchimp Input Field Border', 'avas'),
                'desc'     => esc_html__( 'Enter border width ex: 1, 2, 3 etc to enable border. 0 to disable.', 'avas' ),
                'output'   => array('.mc4wp-form input[type=text],.mc4wp-form input[type=email],.footer .mc4wp-form input[type=text],.footer .mc4wp-form input[type=email]'),
                'color' => true,
                'default'  => array(
                        'border-color'  => '#dfdfdf', 
                        'border-style'  => 'solid', 
                        'border-top' => '1px',
                        'border-bottom' => '1px',
                        'border-left' => '1px',
                        'border-right' => '1px',
                    )
            ),
            array(
                    'id'             => 'mailchimp-input-space',
                    'type'           => 'spacing',
                    'output'         => array('.mc4wp-form input[type=text],.mc4wp-form input[type=email],.footer .mc4wp-form input[type=text],.footer .mc4wp-form input[type=email]'),
                    'mode'           => 'padding',
                    'units'          => array('px', 'em'),
                    'units_extended' => 'false',
                    'title'          => esc_html__('Input Field Padding', 'avas'),
                    'default'            => array(
                    'padding-top'     => '5px', 
                    'padding-right'   => '10px', 
                    'padding-bottom'  => '5px', 
                    'padding-left'    => '10px',
                    'units'          => 'px', 
                )
            ),
            array(
                'id'       => 'mailchimp-submit-border',
                'type'     => 'border',
                'title'    => esc_html__('Mailchimp Button Border', 'avas'),
                'desc'     => esc_html__( 'Enter border width ex: 1, 2, 3 etc to enable border. 0 to disable.', 'avas' ),
                'output'   => array('.mc4wp-form input[type=submit],.footer .mc4wp-form input[type=submit]'),
                'color' => true,
                'default'  => array(
                        'border-color'  => '#dfdfdf', 
                        'border-style'  => 'solid', 
                        'border-top' => '0px',
                        'border-bottom' => '0px',
                        'border-left' => '0px',
                        'border-right' => '0px',
                    )
            ),
            array(
                'id'       => 'mailchimp-submit-hover-border',
                'type'     => 'border',
                'title'    => esc_html__('Mailchimp Button Border Hover', 'avas'),
                'desc'     => esc_html__( 'Enter border width ex: 1, 2, 3 etc to enable border. 0 to disable.', 'avas' ),
                'output'   => array('.mc4wp-form input[type=submit]:hover,.footer .mc4wp-form input[type=submit]:hover'),
                'color' => true,
                'default'  => array(
                        'border-color'  => '#dfdfdf', 
                        'border-style'  => 'solid', 
                        'border-top' => '0px',
                        'border-bottom' => '0px',
                        'border-left' => '0px',
                        'border-right' => '0px',
                    )
            ),
            array(
                'id'       => 'mailchimp_btn_bg_color',
                'type'     => 'color',
                'output'   => array( 'background-color' => '.mc4wp-form input[type=submit],.footer .mc4wp-form input[type=submit]' ),
                'title'    => esc_html__( 'Mailchimp Button Background Color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => true,
            ),
            array(
                'id'       => 'mailchimp_btn_color',
                'type'     => 'color',
                'output'   => array( 'color' => '.mc4wp-form input[type=submit],.footer .mc4wp-form input[type=submit]' ),
                'title'    => esc_html__( 'Mailchimp Button Color', 'avas' ),
                'default'  => '#fff',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'mailchimp_btn_bg_hover_color',
                'type'     => 'color',
                'output'   => array( 'background-color' => '.mc4wp-form input[type=submit]:hover,.footer .mc4wp-form input[type=submit]:hover' ),
                'title'    => esc_html__( 'Mailchimp Button Background Hover Color', 'avas' ),
                'default'  => '#9e9e9e',
                'validate' => 'color',
                'transparent' => true,
            ),
            array(
                'id'       => 'mailchimp_btn_hover_color',
                'type'     => 'color',
                'output'   => array( 'color' => '.mc4wp-form input[type=submit]:hover,.footer .mc4wp-form input[type=submit]:hover' ),
                'title'    => esc_html__( 'Mailchimp Button Hover Color', 'avas' ),
                'default'  => '#fff',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                    'id'             => 'mailchimp-submit-space',
                    'type'           => 'spacing',
                    'output'         => array('.mc4wp-form input[type=submit],.footer .mc4wp-form input[type=submit]'),
                    'mode'           => 'padding',
                    'units'          => array('px', 'em'),
                    'units_extended' => 'false',
                    'title'          => esc_html__('Mailchimp Button Padding', 'avas'),
                    'default'            => array(
                    'padding-top'     => '6px', 
                    'padding-right'   => '20px', 
                    'padding-bottom'  => '6px', 
                    'padding-left'    => '20px',
                    'units'          => 'px', 
                )
            ),
            array(
                    'id'             => 'mailchimp-submit-margin',
                    'type'           => 'spacing',
                    'output'         => array('.mc4wp-form input[type=submit],.footer .mc4wp-form input[type=submit]'),
                    'mode'           => 'margin',
                    'units'          => array('px', 'em'),
                    'units_extended' => 'false',
                    'title'          => esc_html__('Mailchimp Button Margin', 'avas'),
                    'default'            => array(
                    'margin-top'     => '10px', 
                    'margin-right'   => '0px', 
                    'margin-bottom'  => '0px', 
                    'margin-left'    => '0px',
                    'units'          => 'px', 
                )
            ),
    )));
    // pagination color options / navigation color options
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Pagination / Navigation', 'avas' ),
        'id'         => 'pagination-color',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'pagination_bg_color',
                'type'     => 'color',
                'output'   => array( 'background-color' => '.bddex-pagination a,.woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span' ),
                'title'    => esc_html__( 'Pagination Background color', 'avas' ),
                'default'  => '#00BCD4',
                'validate' => 'color',
                'transparent' => false,
            ),
            
            array(
                'id'       => 'pagination_bg_hover_color',
                'type'     => 'color',
                'output'   => array( 'background-color' => '.bddex-pagination a:hover' ),
                'title'    => esc_html__( 'Pagination Background hover color', 'avas' ),
                'default'  => '#333',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'pagination_color',
                'type'     => 'color',
                'output'   => array( '.bddex-pagination a' ),
                'title'    => esc_html__( 'Pagination Number color', 'avas' ),
                'default'  => '#fff',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'pagination_hover_color',
                'type'     => 'color',
                'output'   => array( '.bddex-pagination a:hover' ),
                'title'    => esc_html__( 'Pagination Number hover color', 'avas' ),
                'default'  => '#fff',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'pagination_active_bg_color',
                'type'     => 'color',
                'output'   => array( 'background-color' => '.bddex-pagination span,.woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current' ),
                'title'    => esc_html__( 'Pagination Current background color', 'avas' ),
                'default'  => '#333',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'pagination_active_color',
                'type'     => 'color',
                'output'   => array( '.bddex-pagination span' ),
                'title'    => esc_html__( 'Pagination Current number color', 'avas' ),
                'default'  => '#fff',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                    'id'        => 'pagination-color-info',
                    'type'      => 'info',
                    'title'     => esc_html__('Navigation Colors', 'avas'),
                    'style'     => 'success', //success warning
                ),
            array(
                'id'       => 'navigation_bg_color',
                'type'     => 'color',
                'output'   => array( 'background-color' => '.pager li>a, .pager li>span' ),
                'title'    => esc_html__( 'Navigation Background color', 'avas' ),
                'default'  => '#fff',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'navigation_bg_hov_color',
                'type'     => 'color',
                'output'   => array( 'background-color' => '.pager li>a:hover, .pager li>a:focus' ),
                'title'    => esc_html__( 'Navigation Background hover color', 'avas' ),
                'default'  => '#eee',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'navigation_txt_color',
                'type'     => 'color',
                'output'   => array( '.pager li>a, .pager li>span' ),
                'title'    => esc_html__( 'Navigation Text color', 'avas' ),
                'default'  => '#9b9b9b',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'navigation_txt_hov_color',
                'type'     => 'color',
                'output'   => array( 'color' => '.pager li>a:hover, .pager li>a:focus' ),
                'title'    => esc_html__( 'Navigation Text hover color', 'avas' ),
                'default'  => '',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'navigation_border_color',
                'type'     => 'color',
                'output'   => array( 'border-color' => '.pager li>a, .pager li>span' ),
                'title'    => esc_html__( 'Navigation Border color', 'avas' ),
                'default'  => '#ddd',
                'validate' => 'color',
                'transparent' => false,
            ),
            array(
                'id'       => 'navigation_border_hov_color',
                'type'     => 'color',
                'output'   => array( 'border-color' => '.pager li>a:hover, .pager li>a:focus' ),
                'title'    => esc_html__( 'Navigation Border hover color', 'avas' ),
                'default'  => '',
                'validate' => 'color',
                'transparent' => false,
            ),
    )));
//footer color options
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Footer', 'avas' ),
        'id'         => 'footer-color',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'footer-bg-color',
                'type'     => 'color',
                'output'    => array('background-color' => '#footer-top'),
                'title'    => esc_html__( 'Footer top background color', 'avas' ),
                'default'  => '#2E2F31',
                'transparent' => false,
                'validate'  => 'color',
                ),
            array(
                'id'       => 'footer-text-color',
                'type'     => 'color',
                'output'    => array('#footer-top'),
                'title'    => esc_html__( 'Footer text color', 'avas' ),
                'default'  => '#acacac',
                'transparent' => false,
                'validate'  => 'color',
                ),
            array(
                'id'       => 'footer-link-color',
                'type'     => 'color',
                'output'    => array('#footer-top a'),
                'title'    => esc_html__( 'Footer link color', 'avas' ),
                'default'  => '#00BCD4',
                'transparent' => false,
                'validate'  => 'color',
                ),
            array(
                'id'       => 'footer-link-hover-color',
                'type'     => 'color',
                'output'    => array('#footer-top a:hover'),
                'title'    => esc_html__( 'Footer link hover color', 'avas' ),
                'default'  => '#D1D1D1',
                'transparent' => false,
                'validate'  => 'color',
                ),
            array(
                'id'          => 'footer-widget-title-color',
                'type'        => 'color',
                'output'      => array('#footer-top .widget-title'),
                'title'       => esc_html__( 'Footer widget title color', 'avas' ),
                'default'     => '#F2F2F2',
                'transparent' => false,
                'validate'    => 'color',
                ),
            array(
                'id'          => 'footer-bottom-bg-color',
                'type'        => 'color',
                'output'      => array('background-color' => '#footer'),
                'title'       => esc_html__( 'Footer bottom background color', 'avas' ),
                'default'     => '#1a1a1a',
                'transparent' => false,
                'validate'    => 'color',
                ),
             array(
                'id'          => 'footer-border-color',
                'type'        => 'color',
                'output'      => array('border-color' => '#footer'),
                'title'       => esc_html__( 'Footer border color', 'avas' ),
                'default'     => '#454545',
                'transparent' => false,
                'validate'    => 'color',
                ),
            array(
                'id'          => 'footer-copyright-text-color',
                'type'        => 'color',
                'output'      => array('color' => '.copyright'),
                'title'       => esc_html__( 'Footer copyright text color', 'avas' ),
                'default'     => '#636363',
                'transparent' => false,
                'validate'    => 'color',
                ),
            array(
                'id'          => 'footer-copyright-link-color',
                'type'        => 'color',
                'output'      => array('color' => '.copyright a'),
                'title'       => esc_html__( 'Footer copyright link color', 'avas' ),
                'default'     => '#636363',
                'transparent' => false,
                'validate'    => 'color',
                ),
            array(
                'id'          => 'footer-copyright-link-hover-color',
                'type'        => 'color',
                'output'      => array('color' => '.copyright a:hover'),
                'title'       => esc_html__( 'Footer copyright link hover color', 'avas' ),
                'default'     => '#fff',
                'transparent' => false,
                'validate'    => 'color',
                ),

            ),
    ));    
    // -> START Fonts options Typography
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Fonts', 'avas' ),
        'id'     => 'typography',
        'icon'   => 'el el-fontsize',
        ));
    // body fonts
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'General', 'avas' ),
        'id'         => 'body-fonts',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'typography-body',
                'type'     => 'typography',
                'title'    => esc_html__( 'Body', 'avas' ),
                'google'   => true,
                'font-backup' => false,
                'output'      => array('body'),
                'units'       =>'px',
                'font-style'  => true,
                'all_styles'  => false,
                'color'         => false,
                'text-align'    => false,
                'text-transform'=> true,
                'subsets'       => true, 
                'default'  => array(
                    'font-family' => 'Poppins',
                    'font-weight' => 'Normal',
                    'font-size'   => '14px',
                    'line-height' => '24px',
                ),
            ),
            array(
                'id'       => 'typography-h1',
                'type'     => 'typography',
                'title'    => esc_html__( 'H1', 'avas' ),
                'subtitle' => esc_html__( 'Specify the H1 font properties.', 'avas' ),
                'google'   => true,
                'font-backup' => false,
                'output'      => array('h1'),
                'units'       =>'px',
                'font-style'  => true,
                'all_styles'  => true,
                'word-spacing'  => true,
                'letter-spacing'=> true,
                'text-transform'=> true,
                'color'         => false,
                'text-align'    => false,
                'subsets'       => true, 
                'default'  => array(
                    'font-family' => 'Poppins',
                    'font-size'   => '30px',
                    'line-height' => '38px'  
                ),
            ),
            array(
                'id'       => 'typography-h2',
                'type'     => 'typography',
                'title'    => esc_html__( 'H2', 'avas' ),
                'subtitle' => esc_html__( 'Specify the H2 font properties.', 'avas' ),
                'google'   => true,
                'font-backup' => false,
                'output'      => array('h2'),
                'units'       =>'px',
                'font-style'  => true,
                'all_styles'  => true,
                'word-spacing'  => true,
                'letter-spacing'=> true,
                'text-transform'=> true,
                'color'         => false,
                'text-align'    => false,
                'subsets'       => true, 
                'default'  => array(
                    'font-family' => 'Poppins',
                    'font-size'   => '25px',
                    'line-heigt'  => '32px'
                ),
            ),
            array(
                'id'       => 'typography-h3',
                'type'     => 'typography',
                'title'    => esc_html__( 'H3', 'avas' ),
                'subtitle' => esc_html__( 'Specify the H3 font properties.', 'avas' ),
                'google'   => true,
                'font-backup' => false,
                'output'      => array('h3'),
                'units'       =>'px',
                'font-style'  => true,
                'all_styles'  => true,
                'word-spacing'  => true,
                'letter-spacing'=> true,
                'text-transform'=> true,
                'color'         => false,
                'text-align'    => false,
                'subsets'       => true, 
                'default'  => array(
                    'font-family' => 'Poppins',
                    'font-size'   => '20px',
                    'line-height' => '26px'
                ),
            ),
            array(
                'id'       => 'typography-h4',
                'type'     => 'typography',
                'title'    => esc_html__( 'H4', 'avas' ),
                'subtitle' => esc_html__( 'Specify the H4 font properties.', 'avas' ),
                'google'   => true,
                'font-backup' => false,
                'output'      => array('h4'),
                'units'       =>'px',
                'font-style'  => true,
                'all_styles'  => true,
                'word-spacing'  => true,
                'letter-spacing'=> true,
                'text-transform'=> true,
                'color'         => false,
                'text-align'    => false,
                'subsets'       => true, 
                'default'  => array(
                    'font-family' => 'Poppins',
                    'font-size'   => '18px',
                    'line-height' => '24px'
                ),
            ),
            array(
                'id'       => 'typography-h5',
                'type'     => 'typography',
                'title'    => esc_html__( 'H5', 'avas' ),
                'subtitle' => esc_html__( 'Specify the H5 font properties.', 'avas' ),
                'google'   => true,
                'font-backup' => false,
                'output'      => array('h5'),
                'units'       =>'px',
                'font-style'  => true,
                'all_styles'  => true,
                'word-spacing'  => true,
                'letter-spacing'=> true,
                'text-transform'=> true,
                'color'         => false,
                'text-align'    => false,
                'subsets'       => true, 
                'default'  => array(
                    'font-family' => 'Poppins',
                    'font-size'   => '16px',
                    'line-height' => '22px'
                ),
            ),
            array(
                'id'       => 'typography-h6',
                'type'     => 'typography',
                'title'    => esc_html__( 'H6', 'avas' ),
                'subtitle' => esc_html__( 'Specify the H6 font properties.', 'avas' ),
                'google'   => true,
                'font-backup' => false,
                'output'      => array('h6'),
                'units'       =>'px',
                'font-style'  => true,
                'all_styles'  => true,
                'word-spacing'  => true,
                'letter-spacing'=> true,
                'color'         => false,
                'text-align'    => false,
                'text-transform'=> true,
                'subsets'       => true, 
                'default'  => array(
                    'font-family' => 'Roboto',
                    'font-size'   => '14px',
                    'line-height' => '20px'
                ),
            ),
    )));
    // Header fonts
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Header', 'avas' ),
        'id'         => 'fonts-header',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'typography-top-header',
                'type'     => 'typography',
                'title'    => esc_html__( 'Top header', 'avas' ),
                'google'   => true,
                'font-backup' => false,
                'output'      => array('#top_head'),
                'units'       =>'px',
                'font-style'  => true,
                'all_styles'  => true,
                'line-height' => true,
                'word-spacing'  => true,
                'text-transform'=> true,
                'letter-spacing'=> true,
                'color'         => false,
                'subsets'       => false, 
                'default'  => array(
                    'font-size'   => '13px',
                    'font-family' => 'inherit',
                    'line-height' => '13px',
                ),
            ),
            array(
                'id'       => 'typography-sub-header',
                'type'     => 'typography',
                'title'    => esc_html__( 'Sub header', 'avas' ),
                'google'   => true,
                'font-backup' => false,
                'output'      => array('.sub-header-title'),
                'units'       =>'px',
                'font-style'  => true,
                'all_styles'  => true,
                'word-spacing'  => true,
                'letter-spacing'=> true,
                'text-transform' => true,
                'color'         => false,
                'subsets'       => true, 
                'default'  => array(
                    'font-size'   => '30px',
                    'font-family' => 'Poppins',
                    'font-weight' => '700'
                ),
            ),
            array(
                'id'       => 'typography-breadcrumbs',
                'type'     => 'typography',
                'title'    => esc_html__( 'Breadcrumbs', 'avas' ),
                'google'   => true,
                'font-backup' => false,
                'output'      => array('.breadcrumbs'),
                'units'       =>'px',
                'font-style'  => true,
                'all_styles'  => true,
                'word-spacing'  => true,
                'letter-spacing'=> true,
                'text-transform' => true,
                'color'         => false,
                'subsets'       => true, 
                'default'  => array(
                    'font-size'   => '14px',
                    'line-height'   => '30px',
                    'text-align'    => 'center'
                ),
            ),
            array(
                'id'       => 'typography-welcome-msg',
                'type'     => 'typography',
                'title'    => esc_html__( 'Welcome Message', 'avas' ),
                'google'   => true,
                'font-backup' => false,
                'output'      => array('.welcome_msg'),
                'units'       =>'px',
                'font-style'  => true,
                'all_styles'  => true,
                'word-spacing'  => true,
                'letter-spacing'=> true,
                'line-height'   => true,
                'text-transform'=> true,
                'color'         => false,
                'subsets'       => true, 
                'default'  => array(
                    'font-size'   => '14px',
                    'font-family' => 'Poppins',
                ),
            ),
        )));
    // Menu fonts options
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Menu', 'avas' ),
        'id'         => 'menu-font',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'menu-font',
                'type'     => 'typography',
                'title'    => esc_html__( 'Menu', 'avas' ),
                'google'   => true,
                'font-backup' => false,
                'output'      => array('.bddex-menu-list > ul > li > a'),
                'units'       =>'px',
                 'font-style'  => true,
                'all_styles'  => true,
                'word-spacing'  => true,
                'letter-spacing'=> true,
                'color'         => false,
                'subsets'       => true, 
                'text-transform' => true,
                'default'  => array(
                    'font-size'   => '13px',
                    'font-family' => 'Poppins',
                    'line-height' => '16px',
                    'font-weight' => '500',
                    'text-transform' => 'uppercase'
                ),
            ),
            // Sub Menu fonts options
            array(
                'id'       => 'sub-menu-font',
                'type'     => 'typography',
                'title'    => esc_html__( 'Sub Menu', 'avas' ),
                'google'   => true,
                'font-backup' => false,
                'output'      => array('.bddex-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns2 > li > ul > li > a, .bddex-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns3 > li > ul > li > a, .bddex-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns4 > li > ul > li > a, .bddex-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul > li .widget.widget_products .product_list_widget > li > a .product-title, .nomega-menu-item .rpt a, .bddex-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > a, .bddex-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul > li .widget.widget_products .product_list_widget > li .amount, .bddex-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul > li > a'),
                'units'       =>'px',
                'font-style'  => true,
                'all_styles'  => true,
                'word-spacing'  => true,
                'letter-spacing'=> true,
                'color'         => false,
                'subsets'       => true, 
                'text-transform' => true,
                'default'  => array(
                    'font-size'   => '13px',
                    'font-family' => 'Poppins',
                    'line-height' => '20px',
                    'font-weight' => '400',
                    'text-transform'  => 'capitalize'
                ),
            ),
            // menu button fonts options
            array(
                'id'       => 'menu-btn-font',
                'type'     => 'typography',
                'title'    => esc_html__( 'Menu Button', 'avas' ),
                'google'   => true,
                'font-backup' => false,
                'output'      => array('.bddex-menu-btn-wrap .bddex-menu-btn'),
                'units'       =>'px',
                'font-style'  => true,
                'all_styles'  => true,
                'word-spacing'  => true,
                'letter-spacing'=> true,
                'color'         => false,
                'subsets'       => true, 
                'text-transform' => true,
                'default'  => array(
                    'font-size'   => '14px',
                    'font-family' => 'Roboto',
                    'line-height' => '14px',
                    'font-weight' => '400',
                   // 'text-transform'  => 'capitalize'
                ),
            ),
            // side menu fonts options
            array(
                'id'       => 'side-menu-icon-font',
                'type'     => 'typography',
                'title'    => esc_html__( 'Side Menu Icon', 'avas' ),
                'google'   => false,
                'font-backup' => false,
                'output'      => array('#side-menu-icon'),
                'units'       =>'px',
                'font-style'  => false,
                'all_styles'  => false,
                'word-spacing'  => false,
                'letter-spacing'=> false,
                'color'         => false,
                'text-transform' => false,
                'text-align'    => false,
                'subsets'       => false, 
                'default'  => array(
                    'font-size'   => '16px',
                    'line-height' => '24px',
                ),
            ),
            array(
                'id'       => 'side-menu-font',
                'type'     => 'typography',
                'title'    => esc_html__( 'Side Menu', 'avas' ),
                'google'   => true,
                'font-backup' => false,
                'output'      => array('.side-menus'),
                'units'       =>'px',
                'font-style'  => true,
                'all_styles'  => true,
                'word-spacing'  => true,
                'letter-spacing'=> true,
                'color'         => false,
                'subsets'       => true, 
                'text-transform' => true,
                'default'  => array(
                    'font-size'   => '14px',
                    'font-family' => 'Poppins',
                    'line-height' => '24px',
                    'font-weight' => '400',
                    'text-transform'  => 'capitalize'
                ),
            ),
            array(
                'id'       => 'side-menu-text-font',
                'type'     => 'typography',
                'title'    => esc_html__( 'Side Menu Widget text', 'avas' ),
                'google'   => true,
                'font-backup' => false,
                'output'      => array('.side-menu'),
                'units'       =>'px',
                'font-style'  => true,
                'all_styles'  => true,
                'word-spacing'  => true,
                'letter-spacing'=> true,
                'color'         => false,
                'subsets'       => true, 
                'text-transform' => true,
                'default'  => array(
                    'font-size'   => '14px',
                    'font-family' => 'Poppins',
                    'line-height' => '24px',
                    'font-weight' => '400',
                ),
            ),
            array(
                'id'       => 'side-menu-widget-title-font',
                'type'     => 'typography',
                'title'    => esc_html__( 'Side Menu Widget Title', 'avas' ),
                'google'   => true,
                'font-backup' => false,
                'output'      => array('#side-menu-wrapper .widget-title'),
                'units'       =>'px',
                'font-style'  => true,
                'all_styles'  => true,
                'word-spacing'  => true,
                'letter-spacing'=> true,
                'color'         => false,
                'subsets'       => true, 
                'text-transform' => true,
                'default'  => array(
                    'font-size'   => '17px',
                    'font-family' => 'Roboto',
                    'line-height' => '26px',
                    'font-weight' => '500',
                    'text-transform'  => 'capitalize'
                ),
            ),

        )));    
      
    // Sidebar font options
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Sidebar', 'avas' ),
        'id'         => 'sidebar-font',
        'subsection' => true,
        'fields'     => array(        
            array(
                'id'       => 'sidebar-title-font',
                'type'     => 'typography',
                'title'    => esc_html__( 'Sidebar Title', 'avas' ),
                'google'   => true,
                'font-backup' => false,
                'output'      => array('#secondary h2.widgettitle, #secondary h3.widget-title, #secondary_2 h3.widget-title'),
                'units'       =>'px',
                'font-style'  => true,
                'all_styles'  => true,
                'word-spacing'  => true,
                'letter-spacing'=> true,
                'text-transform'=> true,
                'color'         => false,
                'subsets'       => true, 
                'default'  => array(
                    'font-size'   => '15px',
                    'font-family' => 'Montserrat',
                    'line-height' => '24px',
                    'font-weight' => '600',
                    'text-transform' => 'uppercase'
                ),
            ),
        )));
    // Posts font options
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Posts', 'avas' ),
        'id'         => 'posts-font',
        'subsection' => true,
        'fields'     => array(        
            array(
                'id'       => 'posts-title-font',
                'type'     => 'typography',
                'title'    => esc_html__( 'Posts Title', 'avas' ),
                'google'   => true,
                'font-backup' => false,
                'output'      => array('h1.entry-title, h1.entry-title a'),
                'units'       =>'px',
                'font-style'  => true,
                'all_styles'  => true,
                'word-spacing'  => true,
                'letter-spacing'=> true,
                'text-transform'=> true,
                'color'         => false,
                'subsets'       => true, 
                'default'  => array(
                    'font-size'   => '22px',
                    'font-family' => 'Poppins',
                    'line-height' => '30px',
                    'font-weight' => '500',
                    
                ),
            ),
        )));  
    // Form fonts
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Forms', 'avas' ),
        'id'         => 'form-font',
        'subsection' => true,
        'fields'     => array(        
            array(
                'id'       => 'mailchimp-btn-font',
                'type'     => 'typography',
                'title'    => esc_html__( 'Mailchimp Button Text', 'avas' ),
                'google'   => true,
                'font-backup' => false,
                'output'      => array('.mc4wp-form input[type=submit], .footer .mc4wp-form input[type=submit]'),
                'units'       =>'px',
                'font-style'  => true,
                'all_styles'  => true,
                'word-spacing'  => true,
                'letter-spacing'=> true,
                'text-transform'=> true,
                'color'         => false,
                'subsets'       => true, 
            ),
        ))); 
    // Footer fonts
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Footer', 'avas' ),
        'id'         => 'footer-font',
        'subsection' => true,
        'fields'     => array(        
            array(
                'id'       => 'footer-widget',
                'type'     => 'typography',
                'title'    => esc_html__( 'Footer widget title', 'avas' ),
                'google'   => true,
                'font-backup' => false,
                'output'      => array('.widget-title'),
                'units'       =>'px',
                'font-style'  => true,
                'all_styles'  => true,
                'word-spacing'  => true,
                'letter-spacing'=> true,
                'text-transform'=> true,
                'color'         => false,
                'subsets'       => true, 
                'default'  => array(
                    'font-size'   => '18px',
                    'font-family' => 'Roboto',
                    'line-height' => '40px',
                    'font-weight' => '500'
                ),
            ),
            array(
                'id'       => 'footer-copyright',
                'type'     => 'typography',
                'title'    => esc_html__( 'Copyright text', 'avas' ),
                'subtitle' => esc_html__( 'Specify the copyright text font properties.', 'avas' ),
                'google'   => true,
                'font-backup' => false,
                'output'      => array('.copyright-text'),
                'units'       =>'px',
                'font-style'  => true,
                'all_styles'  => true,
                'word-spacing'  => true,
                'letter-spacing'=> true,
                'text-transform'=> true,
                'color'         => false,
                'subsets'       => true, 
                'default'  => array(
                    'font-size'   => '14px',
                    'font-family' => 'Roboto',
                    'text-align'  => 'center',
                ),
            ),
            array(
                'id'       => 'footer-menu-font',
                'type'     => 'typography',
                'title'    => esc_html__( 'Footer menu font', 'avas' ),
                'google'   => true,
                'font-backup' => false,
                'output'      => array('.footer-menu li a'),
                'units'       =>'px',
                'font-style'  => true,
                'all_styles'  => true,
                'text-transform'=> true,
                'word-spacing'  => true,
                'letter-spacing'=> true,
                'color'         => false,
                'subsets'       => true, 
                'default'  => array(
                    'font-size'   => '14px',
                    'font-family' => 'Roboto',
                    // 'text-align'  => 'center',
                ),
            ),
    )));
    // -> START custom css & custom javascript
 Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'CSS & JS', 'avas' ),
        'desc'      => esc_html__( 'Custom CSS and JavaScript Codes.', 'avas' ),
        'id'         => 'css-code',
        'icon'  => 'el el-edit',
        'fields'     => array(
            array(
                'id'       => 'custom_css',
                'type'     => 'ace_editor',
                'title'    => esc_html__( 'CSS', 'avas' ),
                'mode'     => 'css',
                'theme'    => 'monokai',
                'desc'     => 'After add the css code please use <b>!important</b> to make the code working properly.',
                
            ),
            array(
                'id'       => 'custom_js_head',
                'title'    => esc_html__( 'JavaScript Head', 'avas' ),
                'type'     => 'ace_editor',
                'mode'     => 'javascript',
                'theme'    => 'monokai',
                'desc'	   => esc_html__( 'Script will be placed in after <head> tag', 'avas' ),
            ),
            array(
                'id'       => 'custom_js',
                'title'    => esc_html__( 'JavaScript Body', 'avas' ),
                'type'     => 'ace_editor',
                'mode'     => 'javascript',
                'theme'    => 'monokai',
                'desc'     => esc_html__( 'Script will be placed in after <body> tag', 'avas' ),
            ),
        ),
    ) );   
   
    if ( file_exists( THEME_PATH . '/README.md' ) ) {
        $section = array(
            'icon'   => 'el el-list-alt',
            'title'  => esc_html__( 'Documentation', 'avas' ),
            'fields' => array(
                array(
                    'id'       => '17',
                    'type'     => 'raw',
                    'markdown' => true,
                    'content_path' => THEME_PATH . '/README.md', // FULL PATH, not relative please
                    //'content' => 'Raw content here',
                ),
            ),
        );
        Redux::setSection( $opt_name, $section );
    }

    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
        }
    }
    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;
            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }
            $return['value'] = $value;
            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }
            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }
            return $return;
        }
    }
    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }
    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => esc_html__( 'Section via hook', 'avas' ),
                'desc'   => esc_html__( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'avas' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );
            return $sections;
        }
    }
    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;
            return $args;
        }
    }
    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';
            return $defaults;
        }
    }
    
    /* ---------------------------------------------------------
     Remove Redux Notice
    ------------------------------------------------------------ */
    if ( ! class_exists( 'reduxNewsflash' ) ):
        class reduxNewsflash {
            public function __construct( $parent, $params ) {}
        }
    endif;
    /* ---------------------------------------------------------
     Remove Redux Ads
    ------------------------------------------------------------ */
    add_filter( 'redux/bddex/aURL_filter', '__return_empty_string' );
    /* ---------------------------------------------------------
    Remove Redux from Tools
    ------------------------------------------------------------ */
    add_action('admin_menu', 'bddex_remove_redux_menu', 12);
    function bddex_remove_redux_menu() {
        remove_submenu_page('tools.php', 'redux-about');
    }
/* ==============================================================================
          EOF
================================================================================ */