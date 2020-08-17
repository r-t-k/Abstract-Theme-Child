<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

ini_set('xdebug.var_display_max_data', '-1');*/
/* ================================================================================================ */
/*                                  WP Plugin Update Server                                         */
/* ================================================================================================ */

/**
 * Selectively uncomment the sections below to enable updates with WP Plugin Update Server.
 *
 * WARNING - READ FIRST:
 * Before deploying the plugin or theme, make sure to change the following value
 * - https://your-update-server.com  => The URL of the server where WP Plugin Update Server is installed
 * - Public API Authentication Key   => The Public API Authentication Key in the "Licenses" tab of WP Plugin Update Server
 * - $prefix_updater                 => Replace "prefix" in this variable's name with a unique theme prefix
 *
 * @see https://github.com/froger-me/wp-package-updater
 **/

/*require_once get_stylesheet_directory() . '/lib/wp-package-updater/class-wp-package-updater.php';*/

/** Enable theme updates with license check **/
/*$kyserwpchild = new WP_Package_Updater(
	'https://update.kyser.io',
	wp_normalize_path( __FILE__ ),
	get_stylesheet_directory()
);*/

/** Enable theme updates without license check **/
// $prefix_updater = new WP_Package_Updater(
// 	'https://your-update-server.com',
// 	wp_normalize_path( __FILE__ ),
// 	get_stylesheet_directory()
// );

/* ================================================================================================ */

/* ================================================================================================ */
//loader

require_once get_template_directory() . '/inc/loader.php';
$loader = new \Kyser\loader('child');
//conditional resources here:
$loader->conditionalJS  = array();
$loader->conditionalCSS = array();

$loader->autoload();


/* ================================================================================================ */

