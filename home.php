<?php get_header(); ?>
<div id="content" class="container grid main-2-column">
	<?php get_template_part ( 'se-hero' ); ?>
	<main class="content grid-content">

		<?php get_template_part( 'se-home' ); ?>

	</main>
	<div id="sidebar" class="grid-sidebar">
		<?php get_sidebar(); ?>
	</div><!-- #sidebar -->
</div><!-- #content -->
<?php get_footer(); ?>
