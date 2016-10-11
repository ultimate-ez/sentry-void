<?php
/*
YARPP Template: Sentry
Author: Masashi Ezaki @UltimateEz
Description: YARPP Template for Sentry.
*/
?>
<section class="related-posts">
<h2>Recommend<span class="small">おすすめ記事</span></h2>
<?php if (have_posts()):?>
<?php $loopcount = 0; ?>
<ul class="related-list columns is-mobile is-multiline">
	<?php while (have_posts()) : the_post(); ?>
	<li class="column is-half-mobile is-one-third-tablet is-one-quarter-desktop">

		<?php if ( ( wp_is_mobile() ) && ( ( $loopcount%8 == 3) || ( $loopcount % 8 == 6 ) ) && ( is_active_sidebar( 'se-relatedposts-ad' ) ) ): ?>
			<?php dynamic_sidebar( 'se-relatedposts-ad' ); ?>
		<?php else : ?>
		<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
			<figure class="thumbnail">
				<?php
				if ( has_post_thumbnail() ):
					the_post_thumbnail( 'related-thumb' );
				else:
					echo '<img src="'.get_template_directory_uri().'/img/NoImage_300x200.png" alt="no image" title="no image" width="300" height="200" />';
				endif;
				?>
			</figure>
			<time><?php the_time( 'Y.m.d' ); ?></time>
			<h3><?php the_title_attribute(); ?></h3>
		</a>
		<?php endif; ?>

	</li>

	<?php $loopcount++; ?>
		<?php endwhile; ?>
</ul>
<?php else: ?>
<p>No related posts.</p>
<?php endif; ?>
</section>
