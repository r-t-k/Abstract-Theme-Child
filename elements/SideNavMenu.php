<?php

namespace Abs;


class SideNavMenu extends element {
	function template() {
		?>
				<ul class="uk-nav uk-nav-default">
					<?php
					if ( have_rows( $this->data['top_level_repeater'], 'option' ) ):
						while ( have_rows( $this->data['top_level_repeater'], 'option' ) ) : the_row();
							?>
							<li>
								<a href="<?php the_sub_field( $this->data['top_level_link_field'] ); ?>"><?php the_sub_field( $this->data['top_level_label_field'] ); ?></a>
							</li>
						<?php
						endwhile;
					else :
					endif;
					?>
				</ul>

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
		<?php $this->id(); ?>{
		height: 100%;
		}
		<?php $this->id(); ?> ul{
			height: 100%;
		}
		</style>
		<?php
	}
}

