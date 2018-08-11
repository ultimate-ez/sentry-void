<section class="grid-header slider" >
<div class="slider-wrapper">
	<?php
	$item_cnt = 15;

	$args = array(
		'posts_per_page' => $item_cnt,
		"no_found_rows"  => true,
	);

	$the_query = new WP_Query($args); ?>
	<?php if ( $the_query -> have_posts() ) : ?>
	<?php $loopcount = 0; ?>
	<ul class="slider-items">
	<?php while ( $the_query -> have_posts() ) : $the_query -> the_post(); ?>
	<?php
	if ( $loopcount > $item_cnt) :
		break;
	else:?>
		<li class="slide-item">
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
				<figure class="thumbnail card">
					<?php
					if ( has_post_thumbnail() ):
						the_post_thumbnail( 'facebook-thumb' );
					else:
						echo '<img src="'.get_default_image_uri().'" alt="no image" title="no image" width="384" height="200" />';
					endif;
					?>
				</figure>
				<div class="post-title">
					<?php //the_title_attribute();?>
					<?php echo wp_trim_words( get_the_title(), 30 , '…' ); ?>
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
</div>
</section>
