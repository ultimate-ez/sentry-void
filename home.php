<?php get_header(); ?>
<div id="content" class="container">
	<?php get_template_part ( 'se-hero' ); ?>
	<div id="inner-content" class="columns is-desktop">
	<main class="column home">

		<?php get_template_part( 'se-home' ); ?>

	</main>
	<div id="sidebar" class="column">
		<?php get_sidebar(); ?>
	</div><!-- #sidebar -->
</div><!-- #inner-content -->
</div><!-- #content -->
<?php get_footer(); ?>
