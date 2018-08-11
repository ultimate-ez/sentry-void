<!doctype html>
<html amp>
<head>
	<meta charset="utf-8">
	<script async custom-element="amp-social-share" src="https://cdn.ampproject.org/v0/amp-social-share-0.1.js"></script>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
	<?php do_action( 'amp_post_template_head', $this ); ?>
	<?php if ( ( get_theme_mod ('amp-client') != "") && ( get_theme_mod ('amp-slot') != "" ) ) : ?>
		<script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script>
	<?php endif; ?>
	<style amp-custom>
	<?php $this->load_parts( array( 'style' ) ); ?>
	<?php do_action( 'amp_post_template_css', $this ); ?>
	</style>
</head>
<body>
<?php $this->load_parts( array( 'header-bar' ) ); ?>
	<article id="content">
		<header class="entry-head">
			<div class="amp-toggle">
				<ul>
				<li class="amp">amp</li>
				<li class="web"><a href="<?php echo esc_url(get_permalink()); ?>">web</a></li>
				</ul>
			</div>
			<div class="entry-date" >
				<time><?php the_time( 'Y/m/d' ); ?></time>
			</div>
			<h1 class="amp-wp-title"><?php echo wp_kses_data( $this->get( 'post_title' ) ); ?></h1>
			<div class="entry-meta" >
				<ul>
					<li>
					<?php
					$categories = get_the_category();
					$output = '';

					if ( $categories ) {
						foreach( $categories as $category ) {
							$output .= '<a href="' . get_category_link( $category->term_id )
							. '" title="' . $category->name
							. '">' . $category->name . '</a>';
						}
						echo $output;
					}
					?>
					</li>
				</ul>
			</div><!-- .entry-meta -->
			<?php $this->load_parts( array( 'amp-sns' ) ); ?>
			<?php $this->load_parts( array( 'amp-ad-head' ) ); ?>
		</header>
		<section class="post">
		<?php echo $this->get( 'post_amp_content' ); // amphtml content; no kses ?>
		</section>
		<footer>
			<?php $this->load_parts( array( 'amp-ad' ) ); ?>
			<?php $this->load_parts( array( 'amp-sns' ) ); ?>
			<?php $this->load_parts( array( 'amp-ad-matched' ) ); ?>
			<?php if(function_exists('related_posts')) {
				related_posts(array('template' => 'amp/amp-yarpp.php'));
			}?>
		</footer>
	</article>
	<footer id="footer">
		<div id="copyright" class="column is-half">
			©
			<?php
			if ( get_theme_mod( 'copyright' ) !=  '' ) {
				echo esc_attr( get_theme_mod( 'copyright' ) ). " - " ;
			}
			echo date('Y ');?>
			<a class="logo" href="<?php echo esc_url( $this->get( 'home_url' ) ); ?>">
				<?php bloginfo('name'); ?>
			</a>
		</div>
	</footer>
<?php do_action( 'amp_post_template_footer', $this ); ?>
</body>
</html>
