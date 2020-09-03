<?php
/* Template Name: Home */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

//declare and configure components
$com_side_nav                        = new \Abs\SideNav();
$com_side_nav->root_classes = 'tm_side_menu uk-flex'; //space after each class, like the html class="" attribute.
$com_side_nav->config = [
	'width' => '350px',
	'sideNavMenu' => [
		'top_level_repeater'    => 'side_nav',
		'top_level_link_field'  => 'item',
		'top_level_label_field' => 'item_label'
	]
];

//set component config

?>
<div id="tm_header">

</div>

	<?php $com_side_nav->instance(); ?>

<main id="main" class="site-main" role="main">

	<?php
	while ( have_posts() ) : the_post();

		?>
		<div class="content-wrap">
			<?php //the_content(); ?>

		</div>

	<?php

	endwhile;
	?>

</main>


<?php get_footer(); ?>
