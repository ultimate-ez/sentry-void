<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
	<meta charset="<?php bloginfo( 'charset' ); ?>" >
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="format-detection" content="telephone=no" >
	<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
	<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?> >
		<header class="header" role="banner">
			<div class="container">
			<div class="columns">
			<div class="logo column is-two-thirds-tablet">
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

			<div class="social-icons column is-one-third-tablet is-hidden-touch">
				<?php
				if ( is_active_sidebar( 'se-social-icon' ) ) :
          dynamic_sidebar( 'se-social-icon' );
        endif;
				?>
			</div>
			</div>
		</div>

			<nav>
				<div class="sentry-nav container">
				<button><i class="fa fa-angle-down" aria-hidden="true"></i></button>
				<ul class='visible-links'>
					<?php wp_nav_menu( array( 'container' => '', 'items_wrap' => '%3$s', 'depth' => 1) ); ?>
				</ul>
				<ul class='hidden-links hidden'></ul>
			</div>
			</nav>

		</header>
