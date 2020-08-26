<?php

function cond_load_by_template() {
	$temp_slug    = get_page_template_slug();
	$template_ext = str_replace( 'templates/', '', $temp_slug );
	$template     = str_replace( '.php', '', $template_ext );
	$css_dir      = get_stylesheet_directory() . '/conditional/' . $template . '/css/';
	$js_dir       = get_stylesheet_directory() . '/conditional/' . $template . '/js/';
	$template_dir = get_stylesheet_directory() . '/conditional/' . $template;
	$data         = [
		'template' => $template,
		'css_dir'  => $css_dir,
		'js_dir'   => $js_dir,
		'template_dir' => $template_dir
	];

	return $data;
}

add_action( 'wp', 'cond_load_by_template' );
add_action(
	'wp_enqueue_scripts',
	function () {
		$data   = cond_load_by_template();
		$dirCSS = new \DirectoryIterator( get_stylesheet_directory() . '/conditional/' . $data['template'] . '/css/' );
		$dirJS  = new \DirectoryIterator( get_stylesheet_directory() . '/conditional/' . $data['template'] . '/js/' );
		clearstatcache();
		//css
		if ( is_dir( $data['css_dir'] ) ) {
			foreach ( $dirCSS as $style ) {
				if ( pathinfo( $style, PATHINFO_EXTENSION ) === 'css' ) {
					$name         = basename( $style, '.css' );
					$name_and_ext = basename( $style );
					$style_uri = get_stylesheet_directory_uri() . '/conditional/' . $data['template'] . '/css/' . $name_and_ext;
					wp_enqueue_style( $name, $style_uri );
				}
			}
		}
		//js
		if ( is_dir( $data['js_dir'] ) ) {
			foreach ( $dirJS as $script ) {
				if ( pathinfo( $script, PATHINFO_EXTENSION ) === 'js' ) {
					$name         = basename( $script, '.js' );
					$name_and_ext = basename( $script );
					$script_uri = get_stylesheet_directory_uri() . '/conditional/' . $data['template'] . '/js/' . $name_and_ext;
					wp_enqueue_script( $name, $script_uri );
				}
			}
		}
	},
	'2000' // make last loaded
);
