<section class="categories" >
	<h1>カテゴリー一覧</h1>
	<?php
	  $categories = get_terms( 'category', array(
	    'orderby' => 'count',
	    'order' => 'DESC',
	    'hide_empty' => true,
	  ));
?>
	<ul class="columns is-multiline is-mobile">
	  <?php foreach ($categories as $key => $value): ?>
	    <?php $posts = get_posts( 'numberposts=1&cat='.$value->term_id ); ?>
	    <?php foreach($posts as $post): ?>
				<li class="column is-half-mobile is-one-third-tablet">
					<a href="<?php echo get_category_link($value->term_id); ?>" title="<?php echo $value->name; ?>">
			      <figure class="thumbnail">
							<?php
							if ( has_post_thumbnail() ):
								the_post_thumbnail( 'facebook-thumb' );
							else:
								echo '<img src="'.get_template_directory_uri().'/img/NoImage_384x200.png" alt="no image" title="no image" width="384" height="200" />';
							endif;
							?>
						</figure>
						<div class="cat_title"><?php echo $value->name; ?><br/></div>
						<div class="cat_count"><span><?php echo get_category($value->term_id)->count; ?></span>件</div>
					</a>
				</li>
	    <?php endforeach; ?>
	<?php endforeach; ?>
	</ul>
</section>
