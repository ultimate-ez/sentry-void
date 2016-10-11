<?php if ( have_posts() ) : ?>
<ul class="main-loop columns is-multiline is-mobile">
<?php while ( have_posts() ) : the_post(); ?>
	<li class="column is-half">
		<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
			<figure class="thumbnail">
				<?php
				if ( has_post_thumbnail() ):
					the_post_thumbnail( 'facebook-thumb' );
				else:
					echo '<img src="'.get_template_directory_uri().'/img/NoImage_384x200.png" alt="no image" title="no image" width="384" height="200" />';
				endif;
				?>
			</figure>
			<div class="post-info">
				<div class="title"><?php the_title_attribute(); ?></div>
				<time><?php the_time( 'Y.m.d' ); ?></time>
				<?php
				$cat = get_the_category();
				$cat = $cat[0];
				 ?>
				<div class="category cat_<?php echo $cat->cat_ID; ?>"><?php echo $cat->name; ?></div>
				<?php if ( !wp_is_mobile()): ?>
				<div class="excerpt"><?php echo get_the_excerpt(); ?></div>
				<?php endif; ?>
			</div>
		</a>
	</li>
<?php endwhile; ?>
</ul>
<?php else: ?>
<p>記事がありません</p>
<?php endif; ?>
<nav id="nav-below">
	<?php echo paginate_links( array(
		'next_text' => '次の'.get_option('posts_per_page').'件を読み込む',
	)); ?>
</nav>
