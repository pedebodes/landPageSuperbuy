<?php
function apparatus_get_global_themedata() {
    global $apparatus_theme_data;
    return $apparatus_theme_data;
}
$apparatus_themes_data = apparatus_get_global_themedata();
$apparatus_themes_data = wp_get_theme( get_stylesheet_directory() . '/style.css' );

/* -----------------------------------------------------------------------------
 * Definations
 * -------------------------------------------------------------------------- */
if( !defined('APPARATUS_ADMIN_PATH') )
	define( 'APPARATUS_ADMIN_PATH', get_template_directory() . '/framework/admin/' );
if( !defined('APPARATUS_INIT_PATH') )
	define( 'APPARATUS_INIT_PATH', get_template_directory() . '/framework/' );
if( !defined('APPARATUS_GUTENBERG_PATH') )
	define( 'APPARATUS_GUTENBERG_PATH', get_template_directory() . '/gutenberg/' );
if( !defined('APPARATUS_INCLUDE_PATH') )
	define( 'APPARATUS_INCLUDE_PATH', get_template_directory() . '/inc/' );
if( !defined('APPARATUS_LANGUAGE_PATH') )
	define( 'APPARATUS_LANGUAGE_PATH', get_template_directory() . '/languages/' );

require_once( APPARATUS_INIT_PATH . 'init.php' );