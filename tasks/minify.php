<?php
global $abstract_dev;
if ( $abstract_dev === false ) {
	add_action(
		'wp', function () {
		global $minifier, $JSminifier;
		$minifiedPath = get_stylesheet_directory() . '/assets/production.css';
		$JSminifiedPath = get_stylesheet_directory() . '/assets/production.js';
		$JSminifier->minify( $minifiedPath );
		$minifier->minify( $minifiedPath );
/*		var_dump( $minifier );
		die();*/
	}, 2999
	);
	add_action(
		'wp_enqueue_scripts', function () {
		wp_enqueue_style( 'production', get_stylesheet_directory_uri() . '/assets/production.css');
		wp_enqueue_script( 'production', get_stylesheet_directory_uri() . '/assets/production.js');
	}
	);
}

