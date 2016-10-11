<?php get_header(); ?>
<div id="content" class="container">
	<div id="inner-content" class="columns is-desktop">
		<main class="column">
			<article id="notfound">
				<h1 class="title"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>SORRY...<br/>404 NOT FOUND</h1>
				<p>お探しのページは存在しません！<br/><a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップページ</a>からご利用ください！</p>
			</article>
		</main>
		<div id="sidebar" class="column">
			<?php get_sidebar(); ?>
		</div><!-- #sidebar -->
	</div><!-- #inner-content -->
</div><!--/#content -->
<?php get_footer(); ?>
