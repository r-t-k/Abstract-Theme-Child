<?php
/*
Template Name: Example Form Template
Template Post Type: form
*/

?>
<?php acf_form_head(); ?>
<?php get_header(); ?>

<div id="primary" class="content-area">
    <div id="content" class="site-content" role="main">
        <?php while ( have_posts() ) : the_post(); ?>
			<?php //acf_form('new-event'); ?>
        <?php endwhile; ?>
    </div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>
