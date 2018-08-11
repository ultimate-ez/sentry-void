<?php get_header(); ?>
<div class="container grid main-2-column">
	<main class="content grid-content">
		<article id="notfound">
			<h1 class="title"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>SORRY...<br/>404 NOT FOUND</h1>
			<p>お探しのページは存在しません！<br/><a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップページ</a>からご利用ください！</p>
		</article>
	</main>
	<div id="sidebar" class="grid-sidebar">
		<?php get_sidebar(); ?>
	</div><!-- #sidebar -->
</div><!--/#content -->
<?php get_footer(); ?>
