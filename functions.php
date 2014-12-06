<?php
/**
 * Defining constants
 *
 * @since 0.0.1
 */
$perlovs_theme_data = wp_get_theme();
define( 'PERLOVS_THEME_URL', get_template_directory_uri() );
define( 'PERLOVS_THEME_TEMPLATE', get_stylesheet_directory() );
define( 'PERLOVS_THEME_NAME', $perlovs_theme_data->Name );

/**
 * Includes
 *
 * @since 0.0.1
 */
require( PERLOVS_THEME_TEMPLATE . '/lib/theme-options.php' ); // Functions for theme options page

add_action( 'after_setup_theme', 'perlovs_setup' );
if ( ! function_exists( 'perlovs_setup' ) ) :
/**
 * Initial setup
 *
 * This function is attached to the 'after_setup_theme' action hook.
 *
 * @uses	load_theme_textdomain()
 *
 * @since 0.0.1
 */
function perlovs_setup() {
	load_theme_textdomain( 'perlovs', PERLOVS_THEME_TEMPLATE . '/languages' );
}
endif; // perlovs_setup

add_action( 'wp_enqueue_scripts', 'perlovs_add_js' );
if ( ! function_exists( 'perlovs_add_js' ) ) :
/**
 * Load all JavaScript to header
 *
 * This function is attached to the 'wp_enqueue_scripts' action hook.
 *
 *
 * @since 0.0.1
 */
function perlovs_add_js() {
	//wp_enqueue_script( 'perlovs_js', PERLOVS_THEME_URL .'/js/theme.js', array( 'theme_js' ), '', true );
}
endif; // perlovs_add_js

/**
 * Create the required attributes for the #primary container
 *
 * @since 0.0.1
 */
function perlovs_primary_attr() {
	bavotasan_primary_attr();
}