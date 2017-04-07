<?php if (is_user_logged_in()) : ?>
	<aside class="notification for-edit">
		<?php if (function_exists('wpp_get_views')) {
			echo "<ul>";
			echo "<li>Daily: ".wpp_get_views(get_the_ID(), "daily", true)."</li>";
			echo "<li>Weekly: ".wpp_get_views(get_the_ID(), "weekly", true)."</li>";
			echo "<li>Monthly: ".wpp_get_views(get_the_ID(), "monthly", true)."</li>";
			echo "<li>All: ".wpp_get_views(get_the_ID(), "all", true)."</li>";
			echo "</ul>";
		} ?>
		<?php if (is_singular()) {
			edit_post_link('この記事を編集する', '<div>', '</div>');
		} ?>
	</aside>
<?php endif; ?>

<?php if ( is_active_sidebar( 'se-sidebar-ad' ) ) : ?>
	<aside class="sidebar-ad">
		<span class="title">スポンサードリンク</span>
	<?php dynamic_sidebar( 'se-sidebar-ad' ); ?>
	</aside>
<?php endif; ?>
<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
	<div class="sidebar-main <?php if ( !is_home() && !is_front_page() ){ echo "sticky"; } ?>">
	<?php dynamic_sidebar( 'sidebar' ); ?>
	<?php if ( !get_theme_mod( 'sentry_promotion' ) ) : ?>
		<section class="sidebar-widget sentry-promotion">
			<div class="notification">
				<img src="<?php echo get_template_directory_uri(); ?>/img/sentry-banner-min.png" />
			　<span class="caption">このサイトでも使用中の「"最強"のWordpressテーマ：Sentry」！</span>
				<a class="button is-primary is-outlined" href="https://ultimate-ez.com/sentry/" target="_blank">詳しく見る</a>
			</div>
		</section>
	<?php endif; ?>
	</div>
<?php endif; ?>
