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
/*require_once get_stylesheet_directory() . '/lib/wp-package-updater/class-wp-package-updater.php';

$abstract_child = new WP_Package_Updater(
	'https://wp.kyser.dev',
	wp_normalize_path( __FILE__ ),
	get_stylesheet_directory()
);*/
/* ================================================================================================ */
//vendor
require_once get_template_directory() . '/vendor/autoload.php';
/* ================================================================================================ */
//globals
use MatthiasMullie\Minify;
$minifier = new Minify\CSS();
$JSminifier = new Minify\JS();
$abstract_child_version = 0.54; //abstract child theme version
$theme_version = null; // set your theme version
$theme_ver = $theme_version . '-'.  mt_rand(); //use this for passing your version number, includes random number to cache bust.
$abstract_dev = true; // env setting, true for dev, false for production
/* ================================================================================================ */
//loader

require_once get_template_directory() . '/inc/loader.php';
$loader = new \Kyser\loader('child');
//conditional resources here:
$loader->conditionalJS  = array();
$loader->conditionalCSS = array();

$loader->autoload();
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

ini_set('xdebug.var_display_max_data', '-1');*/
/* ================================================================================================ */

