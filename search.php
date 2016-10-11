<?php get_header(); ?>
<div id="content" class="container">
	<div id="inner-content" class="columns is-desktop">
	<main class="column">
		<section class="search">
			<header class="entry-head">
			<h1>
				「<?php echo esc_html( $s ); ?>」の検索結果 <span class="small"><?php echo $wp_query->found_posts; ?>件</span>
			</h1>
			</header>
			<section class="entry-content">
				<?php get_template_part( 'se-loop' ); ?>
			</section><!-- .entry-content -->
		</section>
	</main>
	<div id="sidebar" class="column">
		<?php get_sidebar(); ?>
	</div><!-- #sidebar -->
</div><!-- #inner-content -->
</div><!-- #content -->
<?php get_footer(); ?>
