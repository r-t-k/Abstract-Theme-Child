<?php
/* Template Name: Home */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();


?>
<main id="main" class="site-main" role="main">

	<div class="page-content">

		<?php
		while ( have_posts() ) : the_post();

			?>
			<article id="post-<?php the_ID(); ?>" class="entry">
				<header class="entry-header">
					<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				</header>

				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</article>

		<?php

		endwhile;
		?>
	</div>
</main>


<?php get_footer(); ?>
