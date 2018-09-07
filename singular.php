<?php get_header(); ?>
<div class="container grid main-2-column">
	<header class="grid-header">
	<?php get_template_part( 'parts/se-breadcrumb' );?>
	</header>
	<main class="content grid-content">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
			<?php
			// start the loop
			if (have_posts()) : while (have_posts()) : the_post(); ?>

			<header class="entry-head">

				<div class="pre-title-info" >
				<ul>
					<li>
						<i class="far fa-clock" aria-hidden="true"></i>
						<time class="published<?php if (get_the_modified_date('Y/n/j') == get_the_time('Y/n/j')) { echo ' updated'; }?>"><?php the_time( 'Y/m/d' ); ?></time>
					</li>
					<?php if (get_the_modified_date('Y/n/j') != get_the_time('Y/n/j')) : ?>
					<li>
						<i class="far fa-edit" aria-hidden="true"></i>
						<time class="updated"><?php the_modified_date('Y/m/d') ?></time>
					</li>
					<?php endif; ?>
					<li class="is-hidden vcard autohr">
						<span class="fn">
							<?php echo get_the_author_meta('nickname'); ?>
						</span>
					</li>
				</ul>
				</div><!-- .pre-title-info -->

				<h1 class="title entry-title"><?php the_title_attribute(); //タイトル ?></h1>
				<?php if ( get_theme_mod( 'article_sns_top' ) ) {
					get_template_part( 'parts/se-sns' );
				}?>

			</header><!-- .entry-head -->

			<?php if ( is_active_sidebar( 'se-article-top' ) ) :
				dynamic_sidebar( 'se-article-top' );
			endif; ?>

			<section class="entry-content content" >

				<?php the_content(); //本文 ?>

			</section><!-- .entry-content -->

			<?php if ( is_active_sidebar( 'se-article-ad' ) ) :?>
				<aside class="ad is-horizon">
					<span class="ad-label">スポンサードリンク</span>
					<div class="column">
						<?php dynamic_sidebar( 'se-article-ad' );	?>
					</div>
				</aside>
			<?php endif; ?>
			<footer class="entry-foot">
				<div class="cat_tag">
					<?php
					$categories = get_the_category();
					$output = '';

					if ( $categories ) {
						$output .='<div class="categories">';
						foreach( $categories as $category ) {
							$output .= '<a class="button" href="' . get_category_link( $category->term_id )
							. '" title="' . $category->name
							. '">' . $category->name . '</a>';
						}
						$output .= '</div>';
					}
					$tags = get_the_tags();
					if ( $tags ) {
						$output .='<div class="tags">';
						foreach ( $tags as $tag ) {
							$output .= '<a class="button" href="' . get_tag_link( $tag->term_id )
							. '" title=' . $tag->name
							. '">#' . $tag->name . '</a>';
						}
						$output .= '</div>';
					}
					
					echo $output;
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
	<div id="sidebar" class="grid-sidebar">
		<?php get_sidebar(); ?>
	</div><!-- #sidebar -->
</div><!-- #content -->
<?php get_footer(); ?>
