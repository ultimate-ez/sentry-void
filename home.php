<?php get_header(); ?>
<div id="content" class="container">
	<?php get_template_part ( 'se-hero' ); ?>
	<div id="inner-content">
	<main class="home">

		<?php get_template_part( 'se-home' ); ?>

	</main>
	<div id="sidebar">
		<?php get_sidebar(); ?>
	</div><!-- #sidebar -->
</div><!-- #inner-content -->
</div><!-- #content -->
<?php get_footer(); ?>
