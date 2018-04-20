<?php get_header(); ?>
<div id="content" class="container">
	<?php get_template_part( 'parts/se-breadcrumb' );?>
	<div id="inner-content">
	<main>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
			<?php
			// start the loop
			if (have_posts()) : while (have_posts()) : the_post(); ?>

			<header class="entry-head">

				<div class="entry-date" >
				<ul>
					<li>
						<span class="icon is-small"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
						<time class="published<?php if (get_the_modified_date('Y/n/j') == get_the_time('Y/n/j')) { echo ' updated'; }?>"><?php the_time( 'Y/m/d' ); ?></time>
					</li>
					<?php if (get_the_modified_date('Y/n/j') != get_the_time('Y/n/j')) : ?>
					<li>
						<span class="icon is-small"><i class="fa fa-repeat" aria-hidden="true"></i></span>
						<time class="updated"><?php the_modified_date('Y/m/d') ?></time>
					</li>
					<?php endif; ?>
					<li class="hidden vcard autohr">
						<span class="fn">
						<?php if ( get_theme_mod( 'article_profile' ) ):?>
							<?php echo get_the_author_meta('nickname'); ?>
						<?php else: ?>
							<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>
						<?php endif; ?>
						</span>
					</li>
				</ul>
				</div><!-- .entry-date -->

				<h1 class="title entry-title"><?php the_title_attribute(); //タイトル ?></h1>
				<?php if ( get_theme_mod( 'article_sns_top' ) ) {
					get_template_part( 'parts/se-sns' );
				}?>

			</header><!-- .entry-head -->

			<?php if ( is_active_sidebar( 'se-article-top' ) ) :
				dynamic_sidebar( 'se-article-top	' );
			endif; ?>

			<section class="entry-content content" >

				<?php the_content(); //本文 ?>

			</section><!-- .entry-content -->

			<?php if ( is_active_sidebar( 'se-article-ad' ) ) :?>
				<aside class="article_ad">
					<span class="title">スポンサードリンク</span>
					<div class="is-flex-widescreen">
						<?php dynamic_sidebar( 'se-article-ad' );	?>
					</div>
				</aside>
			<?php endif; ?>
			<footer class="entry-foot">
				<div class="categories">
					<?php
					$categories = get_the_category();
					$output = '';

					if ( $categories ) {
						foreach( $categories as $category ) {
							$output .= '<a class="button" href="' . get_category_link( $category->term_id )
							. '" title="' . $category->name
							. '">' . $category->name . '</a>';
						}
						echo $output;
					}
					?>
				</div>
				<div class="tags">
					<?php
					$tags = get_the_tags();
					$output = '';

					if ( $tags ) {
						foreach ( $tags as $tag ) {
							$output .= '<a class="button" href="' . get_tag_link( $tag->term_id )
							. '" title=' . $tag->name
							. '">#' . $tag->name . '</a>';
						}
						echo $output;
					}
					?>
				</div>
				<?php if ( !get_theme_mod( 'article_bottom' ) ) {
					set_theme_mod( 'article_bottom', 'widget,sns,recommend,profile,comment');
				}
					$article_bottom = get_theme_mod( 'article_bottom');
					$article_bottom = explode(',', $article_bottom);
					$article_bottom = array_filter($article_bottom, "strlen");

					foreach($article_bottom as $value){
						se_get_part($value);
					}
				?>
				<?php wp_link_pages(); ?>
			</footer><!-- entry-foot -->

			<?php endwhile; else: ?>
			<p>記事がありません</p>
			<?php
			// End of the loop
			endif; ?>
		</article>
	</main>
	<div id="sidebar">
		<?php get_sidebar(); ?>
	</div><!-- #sidebar -->
</div><!-- #inner-content -->
</div><!-- #content -->
<?php get_footer(); ?>
