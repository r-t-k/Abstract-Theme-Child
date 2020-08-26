<?php

namespace Abs;


class SideNav extends component {
	public $config = [
		'sideNavMenu' => [
			'top_level_repeater' => '',
			'top_level_link_field' => '',
			'top_level_label_field' => ''
		],
		'width' => '300px' // default
	];
	function template() {
		//declare child elements
		$side_nav_menu = new SideNavMenu();
		$side_nav_menu->data = $this->config['sideNavMenu'];
		?>
			<?php $side_nav_menu->instance(); ?>
		<?php
	}

	function script() {
		?>
		<script>

		</script>
		<?php
	}

	function style() {
		?>
		<style>
			/*Scoped styles can be done with the $this->id(); method which echos the root elements css id*/
			<?php $this->id(); ?>{
				height: 100vh;
				width: <?= $this->config['width'] ?>;
			}
		</style>
		<?php
	}
}

