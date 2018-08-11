<?php get_header(); ?>
<div class="container grid main-2-column">
	<main class="content grid-content">
		<section class="archive">
			<header class="entry-head">
				<h1><?php the_archive_title(); ?></h1>
			</header>
			<section class="entry-content" >
				<?php get_template_part( 'se-loop' ); ?>
				<nav id="more-button">
					<?php echo paginate_links( array(
						'next_text' => 'もっと見る'
					)); ?>
				</nav>
			</section><!-- .entry-content -->
		</section>
	</main>
	<div id="sidebar" class="grid-sidebar">
		<?php get_sidebar(); ?>
	</div><!-- #sidebar -->
</div><!-- #content -->
<?php get_footer(); ?>
