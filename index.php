<?php get_header(); ?>
<div class="container grid main-2-column">
	<main class="content grid-content">
		<section>
			<section class="entry-content" >
				<?php get_template_part( 'se-loop' ); ?>
				<nav id="nav-below">
					<?php echo paginate_links( array(
						'next_text' => '次の'.get_option('posts_per_page').'件を読み込む',
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
