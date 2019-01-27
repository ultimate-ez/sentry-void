<?php
function se_get_part( $input){
  switch ($input){
    case "widget":
      if ( is_active_sidebar( 'se-article-bottom' ) ){
        dynamic_sidebar( 'se-article-bottom' );
      }
      break;
    case "sns":
        get_template_part( 'parts/se-sns-large' );
      break;
    case "recommend":
      include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
      // YARPPが有効な場合
      if(is_plugin_active( 'yet-another-related-posts-plugin/yarpp.php' )){
        if(function_exists('related_posts')) {
          related_posts();
        }
      }
      // Wordpress Related Postsが有効な場合
      if(is_plugin_active( 'wordpress-23-related-posts-plugin/wp_related_posts.php' )){
        if(function_exists('wp_related_posts')) {
        ?>
        <section class="related-posts">
          <?php wp_related_posts(); ?>
        </section>
        <?php
        }
      }
      break;
    case "profile":
        get_template_part( 'parts/se-profile' );
      break;
    case "comment":
      if ( comments_open() || get_comments_number() ){
        comments_template();
		  }
      break;
    case "matched_unit":
        get_template_part( 'parts/se-matched-unit' );
      break;
    default:
      echo "Error:". $input ." is not defined";
  }
}

?>