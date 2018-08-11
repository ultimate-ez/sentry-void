<?php get_header(); ?>
<div class="container grid main-2-column">
	<main class="content grid-content">
		<section class="search">
			<header class="entry-head">
			<h1>
				「<?php echo esc_html( $s ); ?>」の検索結果 <span class="small"><?php echo $wp_query->found_posts; ?>件</span>
			</h1>
			</header>
			<section class="entry-content">
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
