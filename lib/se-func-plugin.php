<?php

/* プラグインの不要スクリプトの書き出し停止　*/
function yarpp_script_unload(){
  wp_dequeue_style('yarppWidgetCss');
  wp_dequeue_style('yarpp-thumbnails-yarpp-thumbnail');
}
add_action('wp_print_styles','yarpp_script_unload');

function yarpp_script_unload_foot(){
  wp_dequeue_style('yarppRelatedCss');
  wp_dequeue_style('yarpp-thumbnails-yarpp-thumbnail');
}
add_action('get_footer','yarpp_script_unload_foot');

// AMP用トラッキングIDの設定
if ( ! function_exists( 'se_amp_add_custom_analytics' ) ) {
  function se_amp_add_custom_analytics( $analytics ) {
    if ( get_theme_mod ('amp-analytics') != "") {
      if ( ! is_array( $analytics ) ) {
          $analytics = array();
      }
      $analytics_id = esc_attr( get_theme_mod( 'amp-analytics' ) );

      $analytics['xyz-googleanalytics'] = array(
          'type' => 'googleanalytics',
          'attributes' => array(),
          'config_data' => array(
              'vars' => array(
                  'account' => $analytics_id
              ),
              'triggers' => array(
                  'trackPageview' => array(
                      'on' => 'visible',
                      'request' => 'pageview',
                  ),
              ),
          ),
      );
    }
    return $analytics;
  }
}
add_filter( 'amp_post_template_analytics', 'se_amp_add_custom_analytics' );

if ( ! function_exists( 'sentry_pwa_manifest') ) {
  function sentry_pwa_manifest(){
    if ( get_theme_mod('pwa_manifest')){
    ?>
      <link rel="manifest" href="/manifest.json">
      <script>
      window.addEventListener('load', function() {
        if ('serviceWorker' in navigator) {
          navigator.serviceWorker.register("/serviceWorker.js" )
            .then(function(registration) {
              console.log("serviceWorker registed.");
            }).catch(function(error) {
              console.warn("serviceWorker error.", error);
            });
        }
      });
      </script>
    <?php
    }
  }
}
add_action( 'wp_head', 'sentry_pwa_manifest' );

// SNS Count 桁数の調整
if ( ! function_exists( 'sentry_sns_count_carry' ) ) {
  function sentry_sns_count_carry($count) {
    if ($count > 1000000){
      $count = round( $count / 1000000 , 1, PHP_ROUND_HALF_DOWN) . 'M';
    } elseif ($count > 1000){
  		$count = round( $count / 1000 , 1, PHP_ROUND_HALF_DOWN) . 'K';
    }
    return $count;
  }
}

function sentry_feedly_subscribers($url) {

  if ( false === ( $subscribers = get_transient( 'sentry_feedly_subscribers' ) ) ) :

    $feed_url = rawurlencode( $url );

    $subscribers = wp_remote_get( "http://cloud.feedly.com/v3/feeds/feed%2F$feed_url" );
    $subscribers = json_decode( $subscribers['body'] );
    $subscribers = $subscribers->subscribers;

    set_transient( 'sentry_feedly_subscribers', $subscribers, 60 * 60 * 6 );
  endif;

  return  sentry_sns_count_carry($subscribers);
}

?>
