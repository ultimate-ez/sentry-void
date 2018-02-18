<?php

require_once ('lib/se-func-init.php');

require_once ('lib/se-func-customizer.php');

require_once ('lib/se-func-custom-css.php');

require_once ('lib/se-func-widgets.php');

require_once ('lib/se-func-sidebars.php');

require_once ('lib/se-func-shortcode.php');

require_once ('lib/se-func-defaultimg.php');

require_once ('lib/se-func-plugin.php');

require_once ('lib/se-func-mce-customize.php');

if ( ! function_exists( 'sentry_page_ad' ) ) {
  function sentry_page_ad(){
    if ( get_theme_mod( 'head_textarea' ) !=  '' ) {
      echo get_theme_mod( 'head_textarea' );
    }
  }
}
add_action( 'wp_head', 'sentry_page_ad' );

function se_get_part( $input){
  switch ($input){
    case "widget":
      if ( is_active_sidebar( 'se-article-bottom' ) ){
        dynamic_sidebar( 'se-article-bottom' );
      }
      break;
    case "sns":
        get_template_part( 'se-sns-large' );
      break;
    case "recommend":
      if(function_exists('related_posts')) {
        related_posts();
      }
      break;
    case "profile":
        get_template_part( 'se-profile' );
      break;
    case "comment":
      if ( comments_open() || get_comments_number() ){
        comments_template();
		  }
      break;
    default:
      echo "Error:". $input ." is not defined";
  }
}

require 'theme-update-checker.php';
$example_update_checker = new ThemeUpdateChecker(
  'sentry-void-master',
  'https://ultimate-ez.com/update-info.json'
);
?>
