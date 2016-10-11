<div id="breadcrumb">
	<ul>
		<li>
			<a href="<?php echo home_url(); ?>">
				<span>Home</span>
			</a>
		</li>
		<?php
		$postcat = get_the_category();
		if ($postcat){
			$catid = $postcat[0]->cat_ID;
			$allcats = array( $catid );

			while ( !$catid == 0 ) {
				$mycat = get_category( $catid );
				$catid = $mycat->parent;
				array_push( $allcats, $catid );
			}
			array_pop( $allcats );
			$allcats = array_reverse( $allcats );

			foreach ( $allcats as $catid ): ?>
			<li><a href="<?php echo get_category_link( $catid ); ?>"><span><?php echo esc_html( get_cat_name( $catid ) ); ?></span></a></li>
			<?php
			endforeach;
		}
		?>

		<li class="active"><span>
			<?php if ( wp_is_mobile() ) : ?>
			This Post
			<?php else: ?>
			<?php the_title(); ?>
			<?php endif; ?>
		</span>
		</li>
	</ul>
</div><!-- #breadcrumb -->
