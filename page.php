<?php
/**
 * The template for displaying all pages
 *
 */

get_header();
?>

	<main id="main" class="site-main" role="main">

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
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile;
		?>

	</main>

<?php
get_sidebar();
get_footer();
