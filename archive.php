<?php get_header(); ?>
<div id="content" class="container">
	<div id="inner-content">
	<main class="column">
		<section class="archive">
			<header class="entry-head">
				<h1><?php the_archive_title(); ?></h1>
			</header>
			<section class="entry-content" >
				<?php get_template_part( 'se-loop' ); ?>
			</section><!-- .entry-content -->
		</section>
	</main>
	<div id="sidebar">
		<?php get_sidebar(); ?>
	</div><!-- #sidebar -->
</div><!-- #inner-content -->
</div><!-- #content -->
<?php get_footer(); ?>
