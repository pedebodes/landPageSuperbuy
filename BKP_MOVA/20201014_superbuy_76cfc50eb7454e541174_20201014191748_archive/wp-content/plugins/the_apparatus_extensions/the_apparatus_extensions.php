<?php
/*
Plugin Name: The Apparatus Extensions
Plugin URI: http://fluentthemes.com
Description: Extensions for apparatus Wordpress Theme. Supplied as a separate plugin so that the users do not find empty shortcodes on changing the theme.
Version: 1.0
Author: Fluent-Themes
Author URI: https://themeforest.net/user/fluent-themes
*/

//Load Modules

#-----------------------------------------------------------------
# Theme Shortcodes
#-----------------------------------------------------------------

require_once 'modules/widgets.php';

#-----------------------------------------------------------------
# Theme Shortcodes
#-----------------------------------------------------------------

require_once 'modules/shortcodes.php';

#-----------------------------------------------------------------
# Theme Meta-box
#-----------------------------------------------------------------

require_once 'modules/apparatus-metabox.php';

#-----------------------------------------------------------------
# Blog Contact Form
#-----------------------------------------------------------------
require_once( 'modules/blog-contact-form-functions.php' ); // Load Contact Functions

#-----------------------------------------------------------------
# One Click Demo Import
#-----------------------------------------------------------------
$active_theme = wp_get_theme(); // gets the current theme
if ( 'Apparatus' == $active_theme->name || 'Apparatus' == $active_theme->parent_theme ) { //Check if apparatus theme is active or not 
// Load One Click Demo
class OCDC_Plugin {
	/**
	 * Constructor for this class.
	 */
	public function __construct() {
		/**
		 * Display admin error message if PHP version is older than 5.3.2.
		 * Otherwise execute the main plugin class.
		 */
		if ( version_compare( phpversion(), '5.3.2', '<' ) ) {
			add_action( 'admin_notices', array( $this, 'old_php_admin_error_notice' ) );
		}
		else {
			// Set plugin constants.
			$this->set_plugin_constants();

			// Composer autoloader.
			require_once PT_OCDC_PATH . 'one-click-demo-content/vendor/autoload.php';

			// Instantiate the main plugin class *Singleton*.
			$pt_one_click_demo_import = OCDC\OneClickDemoImport::get_instance();

			// Register WP CLI commands
			if ( defined( 'WP_CLI' ) && WP_CLI ) {
				WP_CLI::add_command( 'ocdc list', array( 'OCDC\WPCLICommands', 'list_predefined' ) );
				WP_CLI::add_command( 'ocdc import', array( 'OCDC\WPCLICommands', 'import' ) );
			}
		}
	}


	/**
	 * Display an admin error notice when PHP is older the version 5.3.2.
	 * Hook it to the 'admin_notices' action.
	 */
	public function old_php_admin_error_notice() {
		$message = sprintf( esc_html__( 'The %2$sOne Click Demo Import%3$s feature requires %2$sPHP 5.3.2+%3$s to run properly. Please contact your hosting company and ask them to update the PHP version of your site to at least PHP 5.3.2.%4$s Your current version of PHP: %2$s%1$s%3$s', 'apparatus'), phpversion(), '<strong>', '</strong>', '<br>' );

		printf( '<div class="notice notice-error"><p>%1$s</p></div>', wp_kses_post( $message ) );
	}


	/**
	 * Set plugin constants.
	 *
	 * Path/URL to root of this plugin, with trailing slash and plugin version.
	 */
	private function set_plugin_constants() {
		// Path/URL to root of this plugin, with trailing slash.
		if ( ! defined( 'PT_OCDC_PATH' ) ) {
			define( 'PT_OCDC_PATH', plugin_dir_path( __FILE__ ) );
		}
		if ( ! defined( 'PT_OCDC_URL' ) ) {
			define( 'PT_OCDC_URL', plugin_dir_url( __FILE__ ) );
		}

		// Action hook to set the plugin version constant.
		add_action( 'admin_init', array( $this, 'set_plugin_version_constant' ) );
	}


	/**
	 * Set plugin version constant -> PT_OCDC_VERSION.
	 */
	public function set_plugin_version_constant() {
		if ( ! defined( 'PT_OCDC_VERSION' ) ) {
			$plugin_data = get_plugin_data( __FILE__ );
			define( 'PT_OCDC_VERSION', $plugin_data['Version'] );
		}
	}
}

// Instantiate the plugin class.
$ocdc_plugin = new OCDC_Plugin();
} //Check if apparatus theme is active or not