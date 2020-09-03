<?php
global $abstract_dev;
function cond_load_by_template() {
	$temp_slug    = get_page_template_slug();
	$template_ext = str_replace( 'templates/', '', $temp_slug );
	$template     = str_replace( '.php', '', $template_ext );
	$css_dir      = get_stylesheet_directory() . '/conditional/' . $template . '/css/';
	$js_dir       = get_stylesheet_directory() . '/conditional/' . $template . '/js/';
	$template_dir = get_stylesheet_directory() . '/conditional/' . $template;
	$data         = [
		'template'     => $template,
		'css_dir'      => $css_dir,
		'js_dir'       => $js_dir,
		'template_dir' => $template_dir
	];

	return $data;
}

add_action( 'wp', 'cond_load_by_template' );
function load_conditional_assets() {
	global $abstract_dev;
	global $minifier;
	global $JSminifier;
	$data = cond_load_by_template();
	if ( $data['template'] != '' ) {
		$dirCSS = new \DirectoryIterator( get_stylesheet_directory() . '/conditional/' . $data['template'] . '/css/' );
		$dirJS  = new \DirectoryIterator( get_stylesheet_directory() . '/conditional/' . $data['template'] . '/js/' );
		clearstatcache();

		//css
		if ( is_dir( $data['css_dir'] ) ) {
			foreach ( $dirCSS as $style ) {
				if ( pathinfo( $style, PATHINFO_EXTENSION ) === 'css' ) {
					$name         = basename( $style, '.css' );
					$name_and_ext = basename( $style );
					$style_uri    = get_stylesheet_directory_uri() . '/conditional/' . $data['template'] . '/css/' . $name_and_ext;
					$style_dir    = get_stylesheet_directory() . '/conditional/' . $data['template'] . '/css/' . $name_and_ext;
					$minifier->add( $style_dir );
					if ( $abstract_dev === true ) {
						wp_enqueue_style( $name, $style_uri );
					}

				}
			}
		}
		//js
		if ( is_dir( $data['js_dir'] ) ) {
			foreach ( $dirJS as $script ) {
				if ( pathinfo( $script, PATHINFO_EXTENSION ) === 'js' ) {
					$name         = basename( $script, '.js' );
					$name_and_ext = basename( $script );
					$script_uri   = get_stylesheet_directory_uri() . '/conditional/' . $data['template'] . '/js/' . $name_and_ext;
					$script_dir   = get_stylesheet_directory_uri() . '/conditional/' . $data['template'] . '/js/' . $name_and_ext;
					$JSminifier->add( $script_dir );
					if ( $abstract_dev === true ) {
						wp_enqueue_script( $name, $script_uri );
					}

				}
			}
		}
	}

}

if ( $abstract_dev === false ) {
	add_action( 'wp', 'load_conditional_assets', 2000 );
}
if ( $abstract_dev === true ) {
	add_action( 'wp_enqueue_scripts', 'load_conditional_assets', 2000 );
}
// make last loaded);
