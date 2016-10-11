<header class="header">
	<a class="logo" href="<?php echo esc_url( $this->get( 'home_url' ) ); ?>">
		<?php if ( get_theme_mod( 'amp-logo' )) :?>
			<amp-img src="<?php echo get_theme_mod( 'amp-logo' ); ?>" width="96" height="96" ></amp-img>
		<?php else: ?>
			<amp-img src="<?php echo get_template_directory_uri(); ?>/img/sentry-logo_600x600.png" width="96" height="96" ></amp-img>
			<div><?php echo esc_attr( get_bloginfo( 'name' ) ); ?></div>
		<?php endif; ?>
	</a>
</header>
