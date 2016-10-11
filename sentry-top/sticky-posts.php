<section class="sticky-posts" >

	<?php
	$item_cnt = 15;

	$args = array(
		'posts_per_page' => $item_cnt
	);

	$the_query = new WP_Query($args); ?>
	<?php if ( $the_query -> have_posts() ) : ?>
	<?php $loopcount = 0; ?>
	<ul class="sentry-slider" style="display:none;">
	<?php while ( $the_query -> have_posts() ) : $the_query -> the_post(); ?>
	<?php
	if ( $loopcount > $item_cnt) :
		break;
	else:?>
		<li class="slide-item">
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
				<div class="post-title">
					<?php the_title_attribute();?>
				</div>
			</a>
		</li>
		<?php
		$loopcount++;
	endif; ?>
	<?php endwhile; ?>
	</ul>
	<?php else: ?>
	<p>記事がありません</p>
	<?php endif; ?>
	<?php wp_reset_postdata(); ?>
</section>
