<?php
// **********************************************************************// 
// ! Rss feeds, Custom Background and Other theme supports
// **********************************************************************// 
function apparatus_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Twenty Nineteen, use a find and replace
		 * to change 'apparatus' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'apparatus', esc_url( get_template_directory_uri() ).'/languages' );

		$locale = get_locale();
		$locale_file = APPARATUS_LANGUAGE_PATH . "$locale.php";
		if ( is_readable( $locale_file ) )
			require_once( $locale_file );

		// **********************************************************************// 
		// ! This theme uses wp_nav_menu() for Main Menu
		// **********************************************************************// 
		register_nav_menus( array(
			'apparatus_primary_menu'=> esc_html__('Main Menu', 'apparatus'),
			'apparatus_footer_menu'=> esc_html__('Footer Menu', 'apparatus'),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);
		
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'post-formats', array( 'video' ) );
		add_theme_support( 'title-tag' );
		add_theme_support( 'custom-logo', array(
		   'height'      => 60,
		   'width'       => 60,
		   'flex-width' => true,
		) );
		add_theme_support('custom-background', array(
				'default-color' => '#F7F8FC',
			));
		add_theme_support( 'custom-header', array(
				'default-text-color'     => '#414B61'
			) );
}
add_action( 'after_setup_theme', 'apparatus_theme_setup' );


require_once( APPARATUS_INCLUDE_PATH . 'theme-functions.php' ); // Load Theme Functions
if ( function_exists( 'the_gutenberg_project' ) || function_exists( 'wp_common_block_scripts_and_styles' ) ) {
require_once( APPARATUS_GUTENBERG_PATH . 'gutenberg-functions.php' ); /*Gutenberg Only*/
}
require_once( APPARATUS_INCLUDE_PATH . 'enqueue.php' ); // Enqueue JavaScripts & CSS
require_once( APPARATUS_INCLUDE_PATH . 'customcss.php' ); // Load Custom CSS
require_once( APPARATUS_INCLUDE_PATH . 'widgets.php' ); // Widgets file

if ( class_exists( 'woocommerce' ) ) {
require_once( APPARATUS_INCLUDE_PATH . 'custom-woocommerce-functions.php' ); // Load WooCommerce Functions
}

if(class_exists('WPBakeryVisualComposerAbstract')) {
	include_once( APPARATUS_INCLUDE_PATH . 'vc-shortcodes.php' ); // Load Visual Composer Customizations
}

if ( is_admin() ) {
	if(class_exists('OCDC_Plugin')) {
		if ( class_exists( 'woocommerce' ) ) {
		require_once( APPARATUS_INIT_PATH . 'demo-content/demo-content-woocommerce.php' );
		} else {
		require_once( APPARATUS_INIT_PATH . 'demo-content/demo-content.php' );
		}
	}
	require_once( APPARATUS_INIT_PATH . 'plugins.php' );
}

/************************************* 
// Load Theme Option Functions
*************************************/
if ( !class_exists( 'ReduxFramework' ) && file_exists( APPARATUS_ADMIN_PATH . '/ReduxCore/framework.php' ) ) {
    require_once(APPARATUS_ADMIN_PATH . '/ReduxCore/framework.php' );
}
if ( !isset( $theme_option_data ) && file_exists(APPARATUS_ADMIN_PATH . '/config/config.php' ) ) {
    require_once(APPARATUS_ADMIN_PATH . '/config/config.php' );
}