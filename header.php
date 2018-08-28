<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
<?php if ( get_theme_mod ('sentry-google-tagmanager') != ""){
	get_template_part( 'inc/se-gtm-head');
}  ?>
<?php if ( get_theme_mod ('sentry-google-analytics') != ""){
	get_template_part( 'inc/se-ga');
}  ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>" >
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="format-detection" content="telephone=no" >
	<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
	<?php get_template_part( 'inc/se-ogp' ); ?>
	<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?> >
	<?php if (get_theme_mod ('sentry-google-tagmanager') != ""){
		get_template_part( 'inc/se-gtm-body');
	} ?>
		<header class="global-header" role="banner">
			<div class="global-header-content container">
			<div class="logo">
			<?php if ( get_custom_logo() ): ?>
				<?php the_custom_logo(); ?>
			<?php else: ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<span class="title-text">
					<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>
					</span>
				</a>
			<?php endif; ?>

			</div><!-- .logo -->

			<div class="sns-icons optional-nav">
				<?php
				if ( is_active_sidebar( 'se-social-icon' ) ) :
          			dynamic_sidebar( 'se-social-icon' );
                endif;
				?>
			</div>
		</div><!-- .global-header-content -->
		<nav>
			<ul class='head-menu-items'>
				<?php wp_nav_menu( array( 'container' => '', 'items_wrap' => '%3$s', 'depth' => 1) ); ?>
			</ul>
			<?php if ( !wp_is_mobile() ) : ?>
			<div class="head-menu-nav">
				<button class="head-menu-nav-button head-menu-nav-button-left" style="display:none"></button>
				<button class="head-menu-nav-button head-menu-nav-button-right"></button>
			</div>
			<?php endif; ?>
		</nav>
		</header>
