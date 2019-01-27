<?php

require_once ('lib/se-func-init.php');

require_once ('lib/se-func-customizer.php');

require_once ('lib/se-func-custom-css.php');

require_once ('lib/se-func-widgets.php');

require_once ('lib/se-func-sidebars.php');

require_once ('lib/se-func-shortcode.php');

require_once ('lib/se-func-defaultimg.php');

require_once ('lib/se-func-plugin.php');

require_once ('lib/se-parts-for-article.php');

// require_once ('lib/se-func-postmeta.php');

require_once ('lib/se-func-mce-customize.php');

if ( ! function_exists( 'sentry_page_ad' ) ) {
  function sentry_page_ad(){
    if ( get_theme_mod( 'head_textarea' ) !=  '' ) {
      echo get_theme_mod( 'head_textarea' );
    }
  }
}
add_action( 'wp_head', 'sentry_page_ad' );

require 'theme-update-checker.php';
$example_update_checker = new ThemeUpdateChecker(
  'sentry-void-master',
  'https://ultimate-ez.com/update-info.json'
);
?>
