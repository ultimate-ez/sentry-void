<section class="related-posts">
<h2>関連する記事</h2>
<?php if (have_posts()):?>
<ul>
	<?php while (have_posts()) : the_post(); ?>
	<li>
		<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
			<figure class="thumbnail">
				<?php
				if ( has_post_thumbnail() ):
					$image_src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'related-thumb', false);
					echo '<amp-img src="'.$image_src[0].'" width="96" height="64" />';
				else:
					echo '<amp-img src="'.get_default_image_uri().'" alt="no image" title="no image" width="96" height="64" />';
				endif;
				?>
			</figure>
			<div class="content">
				<div class="title"><?php the_title_attribute(); ?></div>
				<time><?php the_time( 'Y.m.d' ); ?></time>
			</div>
		</a>
	</li>
	<?php endwhile; ?>
</ul>
<?php else: ?>
<p>No related posts.</p>
<?php endif; ?>
</section>
