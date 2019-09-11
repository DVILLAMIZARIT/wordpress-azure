<?php
/*
 * @package     WBC_Importer - Extension for Importing demo content
 * @author      Webcreations907
 * @version     1.0
 */


/************************************************************************
* Importer will auto load, there is no settings required to put in your
* Reduxframework config file.
*
* BUT- If you want to put the demo importer in a different position on 
* the panel, use the below within your config for Redux.
*************************************************************************/
// $this->sections[] = array(
            //     'id' => 'wbc_importer_section',
            //     'title'  => esc_html__( 'Demo Content', 'framework' ),
            //     'desc'   => esc_html__( 'Description Goes Here', 'framework' ),
            //     'icon'   => 'el-icon-website',
            //     'fields' => array(
            //                     array(
            //                         'id'   => 'wbc_demo_importer',
            //                         'type' => 'wbc_importer'
            //                         )
            //                 )
            //     );

/************************************************************************
* Example functions/filters
*************************************************************************/
if ( !function_exists( 'wbc_after_content_import' ) ) {

	/**
	 * Function/action ran after import of content.xml file
	 *
	 * @param (array) $demo_active_import       Example below
	 * [wbc-import-1] => Array
	 *      (
	 *            [directory] => current demo data folder name
	 *            [content_file] => content.xml
	 *            [image] => screen-image.png
	 *            [theme_options] => theme-options.txt
	 *            [widgets] => widgets.json
	 *            [imported] => imported
	 *        )
	 * @param (string) $demo_data_directory_path path to current demo folder being imported.
	 *
	 */

	function wbc_after_content_import( $demo_active_import , $demo_data_directory_path ) {
		//Do something
	}

	// Uncomment the below
	// add_action( 'wbc_importer_after_content_import', 'wbc_after_content_import', 10, 2 );
}

if ( !function_exists( 'wbc_filter_title' ) ) {

	/**
	 * Filter for changing demo title in options panel so it's not folder name.
	 *
	 * @param [string] $title name of demo data folder
	 *
	 * @return [string] return title for demo name.
	 */

	function wbc_filter_title( $title ) {
		return trim( ucfirst( str_replace( "-", " ", $title ) ) );
	}

	// Uncomment the below
	// add_filter( 'wbc_importer_directory_title', 'wbc_filter_title', 10 );
}

if ( !function_exists( 'wbc_importer_description_text' ) ) {

	/**
	 * Filter for changing importer description info in options panel
	 * when not setting in Redux config file.
	 *
	 * @param [string] $title description above demos
	 *
	 * @return [string] return.
	 */

	function wbc_importer_description_text( $description ) {

		$message = '<p style="font-size: 18px;color:#D85245;">'. esc_html__( '&#8594; Important Instruction:', 'avas' ) .'</p>';
		$message .= '<p style="font-size: 15px;">'. esc_html__( '&#9957; Best if used on new WordPress install. Before you begin, make sure all the required plugins are activated according to your need.', 'avas' ) .'</p>';
		
		$message .= '<p style="font-size: 15px;">'. esc_html__( '&#9957; If import process get stuck, please reload the page and click the "Import Demo" button again.', 'avas' ) .'</p>';
		$message .= '<p style="font-size: 15px;">'. esc_html__( '&#9957; By chance demo do not work properly after successfully imported then please reload the page and click the "Re-Import" button again.', 'avas' ) .'</p>';
		$message .= '<p style="font-size:15px">'. esc_html__( '&#9957; Please do not activate Child Theme and WPBakery plugin while import demo.', 'avas' ) .'</p>';
		
		$message .= '<p style="font-size:15px">'. esc_html__( '&#9957; If you plan to import more than one demo then please clear exising demo before import new demo. You can use "WP Reset" plugin to reset everything.', 'avas' ) .'</p>';
		$message .= '<p style="font-size:15px">'. esc_html__( '&#9957; Before start importing plese check your server reserouce with our server minimum requirements.', 'avas' ) .'</p>';
		$message .= '<p style="font-style:italic;font-size:15px;">'. esc_html__( 'Please note: Images are for demo purpose only so you can not use those in your  website due to copyright issue.', 'avas' ) .'</p>';
		
		$message .= '<h3>'. esc_html__('Server Minimum Requirements','avas').'</h3>';
		$message .= '<p>'.esc_html__('&#10003; PHP version 5.6.20 or latest version','avas').'</p>';
		$message .= '<p>'.esc_html__('&#10003; MySQL version 5.6 or greater / MariaDB version 10.0 or greater','avas').'</p>';
		$message .= '<p>'.esc_html__('&#10003; WP Memory limit of 128 MB or greater','avas').'</p>';
		$message .= '<p>'.esc_html__('&#10003; max_execution_time 360 (This needs to be increased if your server is slow and cannot import data.)','avas').'</p>';
		$message .= '<p>'.esc_html__('&#10003; PHP Post Max Size: 128 MB or greater','avas').'</p>';
		$message .= '<p>'.esc_html__('&#10003; Upload File Size: 128 MB','avas').'</p>';
		$message .= '<p>'.esc_html__('&#10003; PHP Time Limit: 360','avas').'</p>';
		$message .= '<p>'.esc_html__('&#10003; Wordpress version 4.7 or greater','avas').'</p>';

		$message .= '<h3>'. esc_html__('Please check video tutorials before start import','avas').'</h3>';
		$message .= '<iframe style="padding-right:30px" width="460" height="340" src="https://www.youtube.com/embed/vkjrky9tpvo" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';

		$message .= '<iframe style="padding-right:30px" width="460" height="340" src="https://www.youtube.com/embed/Mh43ngRzdSM" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';

		$message .= '<iframe width="460" height="340" src="https://www.youtube.com/embed/gFx4xvPA0eM" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';

		$message .= '<p style="border-bottom:1px solid #e6e6e6;margin-top: 30px; margin-bottom: 35px;"></p>';

		return $message;
	}

	// Uncomment the below
	 add_filter( 'wbc_importer_description', 'wbc_importer_description_text', 10 );
}

if ( !function_exists( 'wbc_importer_label_text' ) ) {

	/**
	 * Filter for changing importer label/tab for redux section in options panel
	 * when not setting in Redux config file.
	 *
	 * @param [string] $title label above demos
	 *
	 * @return [string] return no html
	 */

	function wbc_importer_label_text( $label_text ) {

		$label_text = esc_html__( 'Demo Import','avas' );

		return $label_text;
	}

	// Uncomment the below
	 add_filter( 'wbc_importer_label', 'wbc_importer_label_text', 10 );
}

if ( !function_exists( 'wbc_change_demo_directory_path' ) ) {

	/**
	 * Change the path to the directory that contains demo data folders.
	 *
	 * @param [string] $demo_directory_path
	 *
	 * @return [string]
	 */

	function wbc_change_demo_directory_path( $demo_directory_path ) {

		//$demo_directory_path = get_template_directory().'/demo-data/';
		$demo_directory_path = get_template_directory().'/inc/demo-data/';

		return $demo_directory_path;

	}

	// Uncomment the below
	 add_filter('wbc_importer_dir_path', 'wbc_change_demo_directory_path' );
}

if ( !function_exists( 'wbc_importer_before_widget' ) ) {

	/**
	 * Function/action ran before widgets get imported
	 *
	 * @param (array) $demo_active_import       Example below
	 * [wbc-import-1] => Array
	 *      (
	 *            [directory] => current demo data folder name
	 *            [content_file] => content.xml
	 *            [image] => screen-image.png
	 *            [theme_options] => theme-options.txt
	 *            [widgets] => widgets.json
	 *            [imported] => imported
	 *        )
	 * @param (string) $demo_data_directory_path path to current demo folder being imported.
	 *
	 * @return nothing
	 */

	function wbc_importer_before_widget( $demo_active_import , $demo_data_directory_path ) {

		//Do Something

	}

	// Uncomment the below
	// add_action('wbc_importer_before_widget_import', 'wbc_importer_before_widget', 10, 2 );
}

if ( !function_exists( 'wbc_after_theme_options' ) ) {

	/**
	 * Function/action ran after theme options set
	 *
	 * @param (array) $demo_active_import       Example below
	 * [wbc-import-1] => Array
	 *      (
	 *            [directory] => current demo data folder name
	 *            [content_file] => content.xml
	 *            [image] => screen-image.png
	 *            [theme_options] => theme-options.txt
	 *            [widgets] => widgets.json
	 *            [imported] => imported
	 *        )
	 * @param (string) $demo_data_directory_path path to current demo folder being imported.
	 *
	 * @return nothing
	 */

	function wbc_after_theme_options( $demo_active_import , $demo_data_directory_path ) {

		//Do Something

	}

	// Uncomment the below
	// add_action('wbc_importer_after_theme_options_import', 'wbc_after_theme_options', 10, 2 );
}


/************************************************************************
* Extended Example:
* Way to set menu, import revolution slider, and set home page.
*************************************************************************/

if ( !function_exists( 'wbc_extended_example' ) ) {
	function wbc_extended_example( $demo_active_import , $demo_directory_path ) {

		reset( $demo_active_import );
		$current_key = key( $demo_active_import );

		/************************************************************************
		* Import slider(s) for the current demo being imported
		*************************************************************************/

		if ( class_exists( 'RevSliderSlider' ) ) {

			//If it's demo3 or demo5
			$wbc_sliders_array = array(
				'Default' => 'avas-default.zip', //Set slider zip name
				'Agency' => 'avas-agency.zip', //Set slider zip name
				'App' => 'avas-app.zip', //Set slider zip name
				'Creative' => 'avas-creative.zip', //Set slider zip name
				'Business' => 'avas-business.zip', //Set slider zip name
				'Startup' => 'avas-startup.zip', //Set slider zip name
				'Creative Agency' => 'avas-creative-agency.zip', //Set slider zip name
				'News' => 'avas-news.zip', //Set slider zip name
				'Digital Agency' => 'digital-agency.zip', //Set slider zip name
				'Photographer' => 'avas-photograper.zip', //Set slider zip name
				'Corporate' => 'avas-corporate.zip', //Set slider zip name
				'Cleaning Services' => 'avas-cleaning-services.zip', //Set slider zip name
				'Construction' => 'avas-construction.zip', //Set slider zip name
				'Nice and Clean' => array('avas-nice-and-clean-header.zip','avas-nice-and-clean-services.zip','avas-nice-and-clean-projects.zip'), //Set slider zip name
				'Web Solutions' => array('avas-web-solutions.zip','avas-web-solutions-projects.zip'), //Set slider zip name
				'Finance' => 'avas-finance.zip', //Set slider zip name
				'Consultant' => 'avas-consultant.zip', //Set slider zip name
				'Lawyer' => 'avas-lawyer.zip', //Set slider zip name
				'Medical' => 'avas-medical.zip', //Set slider zip name
				'Gym' => 'avas-gym.zip', //Set slider zip name
				'Blog' => 'avas-blog.zip', //Set slider zip name
				'Charity' => 'avas-charity.zip', //Set slider zip name
				'Education' => 'avas-education.zip', //Set slider zip name
				'Shop' => 'avas-shop.zip', //Set slider zip name
				'Website Builder' => array('avas-website-builder.zip','avas-website-builder-discover.zip','avas-website-builder-customizable.zip'), //Set slider zip name
				'SEO' => 'avas-seo.zip', //Set slider zip name
				'Chef' => 'avas-chef.zip', //Set slider zip name
				'Insurance' => 'avas-insurance.zip', //Set slider zip name
				'Architecture' => 'avas-architecture.zip', //Set slider zip name
				'Music Band' => array('avas-music-band.zip','avas-music-band-videos.zip'), //Set slider zip 
				'Spa' => 'avas-spa.zip', //Set slider zip 
				'Barber Shop' => 'avas-barber-shop.zip', //Set slider zip 
				'Fitness' => 'avas-fitness.zip', //Set slider zip 
				'Hosting' => 'avas-hosting.zip', //Set slider zip 
				'Kindergarten' => 'avas-kindergarten.zip', //Set slider zip 
				'Driving School' => 'avas-driving-school.zip', //Set slider zip
				'Education Two' => 'avas-education-two.zip', //Education Two
			);

			if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && array_key_exists( $demo_active_import[$current_key]['directory'], $wbc_sliders_array ) ) {
				$wbc_slider_import = $wbc_sliders_array[$demo_active_import[$current_key]['directory']];

					if(is_array($wbc_sliders_array[$demo_active_import[$current_key]['directory']])) {
						foreach ($wbc_sliders_array[$demo_active_import[$current_key]['directory']] as $key => $value) {
							$wbc_slider_import = $value;
							if ( file_exists( $demo_directory_path.$wbc_slider_import ) ) {
								
									$slider = new RevSliderSliderImport();
								
								
								$slider->import_slider( true, $demo_directory_path.$wbc_slider_import );
							}
						}
					}
					else{
					$wbc_slider_import = $wbc_sliders_array[$demo_active_import[$current_key]['directory']];
						if ( file_exists( $demo_directory_path.$wbc_slider_import ) ) {
						
									$slider = new RevSliderSliderImport();
								
						$slider->import_slider( true, $demo_directory_path.$wbc_slider_import );
						}
					}
			}

		}

		/************************************************************************
		* Setting Menus
		*************************************************************************/

		// If it's demo1 - demo6
		$wbc_menu_array = array( 'Default', 'Agency', 'App', 'Creative', 'Business', 'Startup', 'Creative Agency', 'News', 'Digital Agency', 'Photographer', 'Corporate', 'Cleaning Services','Construction','Nice and Clean','Web Solutions','ICO Cryptocurrency','Finance','Consultant','Lawyer','Resume','Medical','Gym','Magazine','Blog','Pinterest','Charity','Education','Shop','Crypto News','Website Builder','SEO','Chef','Insurance','Architecture','Music Band','Spa','Barber Shop','Fitness','Hosting','Kindergarten','Driving School','News Dark', 'Education Two' );

		if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && in_array( $demo_active_import[$current_key]['directory'], $wbc_menu_array ) ) {
			$top_menu = get_term_by( 'name', 'Top Menu', 'nav_menu' );
			$main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
			$footer_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );

			if ( isset( $main_menu->term_id ) ) {
				set_theme_mod( 'nav_menu_locations', array(
						'top_menu' => $top_menu->term_id,
						'main_menu' => $main_menu->term_id,
						'footer_menu'  => $footer_menu->term_id
					)
				);
			}

		}

		/************************************************************************
		* Set HomePage
		*************************************************************************/

		// array of demos/homepages to check/select from
		$wbc_home_pages = array(
			'Default' => 'Home Default',
			'Agency' => 'Home Agency',
			'App' => 'Home App',
			'Creative' => 'Home Creative',
			'Business' => 'Home Business',
			'Startup' => 'Home Startup',
			'Creative Agency' => 'Home Creative Agency',
			'News' => 'Home News',
			'Digital Agency' => 'Home Digital Agency',
			'Photographer' => 'Home Photographer',
			'Corporate' => 'Home Corporate',
			'Cleaning Services' => 'Home Cleaning Services',
			'Construction' => 'Home Construction',
			'Nice and Clean' => 'Home Nice and Clean',
			'Web Solutions' => 'Home Web Solutions',
			'ICO Cryptocurrency' => 'Home ICO Cryptocurrency',
			'Finance' => 'Home Finance',
			'Consultant' => 'Home Consultant',
			'Lawyer' => 'Home Lawyer',
			'Resume' => 'Home Resume',
			'Medical' => 'Home Medical',
			'Gym' => 'Home Gym',
			'Magazine' => 'Home Magazine',
			'Blog' => 'Home Blog',
			'Pinterest' => 'Home Pinterest',
			'Charity' => 'Home Charity',
			'Education' => 'Home Education',
			'Shop' => 'Home Shop',
			'Crypto News' => 'Home Crypto News',
			'Website Builder' => 'Home Website Builder',
			'SEO' => 'Home SEO',
			'Chef' => 'Home Chef',
			'Insurance' => 'Home Insurance',
			'Architecture' => 'Home Architecture',
			'Music Band' => 'Home Music Band',
			'Spa' => 'Home Spa',
			'Barber Shop' => 'Home Barber Shop',
			'Fitness' => 'Home Fitness',
			'Hosting' => 'Home Hosting',
			'Kindergarten' => 'Home Kindergarten',
			'Driving School' => 'Home Driving School',
			'News Dark'	=> 'Home News Dark',
			'Education Two'	=> 'Home Education Two',

			'Agency 2' => 'Agency 2',
			'App Landing Page' => 'App Landing Page',
			'Bicycle Repair' => 'Bicycle Repair',
			'Business Landing Page' => 'Business Landing Page',
			'Cleaner' => 'Cleaner',
			'Designer' => 'Designer',
			'E-Book' => 'E-Book',
			'Elementor' => 'Elementor',
			'Events' => 'Events',
			'IT' => 'IT',
			'Mechanic' => 'Mechanic',
			'Mobile App' => 'Mobile App',
			'Moving' => 'Moving',
			'Pastry Shop' => 'Pastry Shop',
			'Portfolio' => 'Portfolio',
			'Product Landing Page' => 'Product Landing Page',
			'Restaurant' => 'Restaurant',
			'Tattoo Parlor' => 'Tattoo Parlor',
			'Travel' => 'Travel',
			'Wedding' => 'Wedding',
			'Under Construction' => 'Under Construction',
			'Coming Soon' => 'Coming Soon',
			
		);

		if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && array_key_exists( $demo_active_import[$current_key]['directory'], $wbc_home_pages ) ) {
			$page = get_page_by_title( $wbc_home_pages[$demo_active_import[$current_key]['directory']] );
			if ( isset( $page->ID ) ) {
				update_option( 'page_on_front', $page->ID );
				update_option( 'show_on_front', 'page' );
			}
		}

		// remove hello world post 
		wp_delete_post( 1, true );
		

	}


	// Uncomment the below
	 add_action( 'wbc_importer_after_content_import', 'wbc_extended_example', 10, 2 );
}

?>