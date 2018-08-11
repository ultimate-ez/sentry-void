<?php if ( have_posts() ) : ?>
<ul class="main-loop grid">
<?php while ( have_posts() ) : the_post(); ?>
	<li class="column is-12 is-6-tablet card is-shadow is-big-picture">
		<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
			<figure class="thumbnail">
				<?php
				if ( has_post_thumbnail() ):
					the_post_thumbnail( 'facebook-thumb' );
				else:
					echo '<img src="'.get_default_image_uri().'" alt="no image" title="no image" width="384" height="200" />';
				endif;
				?>
			</figure>
			<div class="footline">
				<div class="headline"><?php the_title_attribute(); ?></div>
				<time class="bottom-footline"><?php the_time( 'Y.m.d' ); ?></time>
				<?php
				$cat = get_the_category();
				$cat = $cat[0];
				 ?>
				<div class="bottom-footline is-inline is-round-button category cat_<?php echo $cat->cat_ID; ?>"><?php echo $cat->name; ?></div>
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
