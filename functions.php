<?php

if (locate_template('/se-customizer.php') !== '') {
    require_once locate_template('/se-customizer.php');
}
if (locate_template('/se-widgets.php') !== '') {
    require_once locate_template('/se-widgets.php');
}
if (locate_template('/se-sidebars.php') !== '') {
    require_once locate_template('/se-sidebars.php');
}

if (locate_template('/se-shortcode.php') !== ""){
    require_once locate_template('/se-shortcode.php');
}

// Content width
if ( !isset( $content_width ) ) { $content_width = 720; }

add_theme_support( 'title-tag' );
add_theme_support( 'custom-logo', array(
  'width' => 600,
  'height' => 132,
  'flex-width' => true,
  'flex-height' => true,
) );
add_theme_support( 'menus' );
add_theme_support( 'automatic-feed-links' );

// Thumbnail
add_theme_support( 'post-thumbnails' );
add_image_size( 'facebook-thumb', 384, 200, true );
add_image_size( 'related-thumb', 300, 200, true );

// Clean head
remove_action( 'wp_head', 'wp_generator' ); // Wordpressバージョン情報
// remove_action( 'wp_head', 'feed_links', 2); // Feed URL
remove_action( 'wp_head', 'feed_links_extra', 3 );  // コメント用Feed
// remove_action( 'wp_head', 'rsd_link' ); // 外部投稿ツール用
// remove_action( 'wp_head', 'wlwmanifest_link' ); // Windows Live Writer用のリンク
// remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' ); // rel=”prev”とrel=”next”の表示
// remove_action( 'wp_head', 'rel_canonical' ); // rel=”canonical”タグの表示
// remove_action( 'wp_head', 'wp_shortlink_wp_head' ); // 短縮URL
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );  // 絵文字
// remove_action( 'wp_head', 'rest_output_link_wp_head' ); // REST API用のリンク
// remove_action( 'wp_head', 'wp_oembed_add_discovery_links' ); // Embed(wp-embed)用のリンク
// remove_action( 'wp_head', 'wp_oembed_add_host_js' ); // Embed(wp-dmbed)用のJS
remove_action( 'wp_print_styles', 'print_emoji_styles' ); // 絵文字

if ( ! function_exists( 'sentry_enqueue_script' ) ) {
  function sentry_enqueue_script() {
    wp_enqueue_script( 'sentry', get_template_directory_uri() . '/js/sentry.js' , array('jquery'), null, true);
    wp_enqueue_script( 'fitslider', get_template_directory_uri() . '/js/jquery.fit-sidebar.js', array('jquery'), null, true);
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), null, true);

    wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' );
    wp_enqueue_style( 'bluma', '//cdnjs.cloudflare.com/ajax/libs/bulma/0.1.0/css/bulma.css' );
    wp_enqueue_style( 'sentry', get_template_directory_uri().'/css/sentry.css' );
    wp_enqueue_style( 'yakuhan', '//cdn.rawgit.com/qrac/yakuhanjp/master/dist/css/yakuhanjp.css');
    wp_enqueue_style( 'sentry-custom', get_stylesheet_uri() );

    /* infinitescroll */
    wp_register_script( 'wp_infinite_scroll',  get_template_directory_uri() . '/js/jquery.infinitescroll.min.js', array('jquery'), null, true );
    if( ! is_singular() ) {
      wp_enqueue_script( 'wp_infinite_scroll' );
    }
  }
}
add_action( 'wp_enqueue_scripts', 'sentry_enqueue_script' );

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

if ( ! function_exists( 'sentry_register_post_type_args' ) ) {
  function sentry_register_post_type_args( $args, $post_type ) {
  	if ( 'post' == $post_type ) {
  		$args['rewrite'] = true;
  		$args['has_archive'] = 'posts';
  	}
  	return $args;
  }
}
add_filter( 'register_post_type_args', 'sentry_register_post_type_args', 10, 2 );

if ( ! function_exists( 'sentry_archive_title' ) ) {
  function sentry_archive_title( $title ){
      if ( is_post_type_archive( 'post' ) ) {
          $title = "新着記事";
      } else {
        $title = $title.' <span class="small">の記事一覧</span>';
      }
      return $title;
  }
}
add_filter( 'get_the_archive_title', 'sentry_archive_title', 10 );

// Youtubeレスポンシブ化
if ( ! function_exists( 'media_responsive' ) ) {
  function media_responsive( $html, $url, $attr, $post_ID ) {
      if ( ( strstr( $url,'youtube' ) ) || ( strstr( $url,'vimeo' ) ) ) {
      	$return = '<div class="video-container">'.$html.'</div>';
      } elseif ( strstr( $url,'vine' ) ){
        $return = '<div class="video-container square">'.$html.'</div>';
      }else{
      	$return = $html;
  	}
  	return $return;
  }
}
add_filter( 'embed_oembed_html', 'media_responsive', 10, 4 );

// Profileのカスタマイズ
if ( ! function_exists( 'sentry_user_meta' ) ) {
  function sentry_user_meta($profile_item) {
    $profile_item[ 'twitter' ] = 'Twitter';
    $profile_item[ 'facebook' ] = 'Facebook';
    $profile_item[ 'instagram' ] = 'Instagram';

    return $profile_item;
  }
}
add_filter( 'user_contactmethods', 'sentry_user_meta', 10, 1 );

// タグクラウド　カスタマイズ
if ( ! function_exists( 'sentry_tag_cloud_filter' ) ) {
  function sentry_tag_cloud_filter($args) {
      $myargs = array(
        'smallest' => .8,
      	'largest' => .8,
      	'unit' => 'rem',
        'orderby' => 'count',
        'order' => 'DESC',
        'echo' => false,
      );
      return $myargs;
  }
}
add_filter('widget_tag_cloud_args', 'sentry_tag_cloud_filter', 10, 1);

// コメントしたユーザーのリンクに「target="_blank"」を付与
function sentry_comment_author_link( $author_link ){
 return str_replace( "<a", "<a target=\"_blank\"", $author_link );
}
add_filter( "get_comment_author_link", "sentry_comment_author_link" );

// except
if ( ! function_exists( 'sentry_excerpt_length' ) ) {
  function sentry_excerpt_length($length) {
  	return 100;
  }
}
if ( ! function_exists( 'sentry_excerpt_more' ) ) {
  function sentry_excerpt_more($more) {
  	return '...';
  }
}
add_filter( 'excerpt_more',   'sentry_excerpt_more');
add_filter( 'excerpt_length', 'sentry_excerpt_length');

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

if ( ! function_exists( 'sentry_color' ) ) {
  function sentry_color(){

    $defaultColor = '#F7786B';

    if ( get_theme_mod( 'sentry-color' ) != "" ){
      $primaryColor = esc_attr( get_theme_mod( 'sentry-color' ));
    } else{
      $primaryColor = $defaultColor;
    }
    ?>
    <style type="text/css">
      a,
      article section.entry-content #toc_container a:hover,
      article section.entry-content h4:before,
      article section.entry-content h5:before,
      article section.entry-content h6:before,
      article footer.entry-foot .tags a,
      article#notfound h1 i.fa,
      .profile a:hover
       {
        color: <?php echo $primaryColor; ?>;
      }
      .header,
      nav .sentry-nav .hidden-links,
      article section.entry-content h2,
      .sentry-widget h1,
      article section.entry-content .pochireba .pochi_info .pochi_price,
      article footer.entry-foot .categories a,
      .main-loop li a .post-info .category,
      #nav-below .page-numbers.next,
      .sentry-widget td a,
      .sentry-widget .tagcloud a:hover,
      .sentry-widget #se_popular_posts .tabs li.is-active,
      #comments #comment_submit,
      main.home section.popular-posts ul.wpp-list li a .content .post-text:before,
      .slick-dots li.slick-active button,
      .sentry-widget #wp-calendar td a,
      article .entry-content .short-posts a .tag,
      .wpcf7 .wpcf7-submit{
        background: <?php echo $primaryColor; ?>;
      }
      article section.entry-content h3,
      article footer.entry-foot .tags a,
      .sentry-widget #se_popular_posts .tabs li.is-active {
        border-color: <?php echo $primaryColor; ?>;
      }
    </style>
  <?php
  }
}
add_action( 'wp_head', 'sentry_color' );

if ( ! function_exists( 'sentry_page_ad' ) ) {
  function sentry_page_ad(){
    if ( get_theme_mod( 'head_textarea' ) !=  '' ) {
      echo get_theme_mod( 'head_textarea' );
    }
  }
}
add_action( 'wp_head', 'sentry_page_ad' );

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

// Checkbox用サニタイズ
if ( ! function_exists( 'sanitize_checkbox' ) ) {
  function sanitize_checkbox($input){
  	if($input==true){
  		return true;
  	}else{
  		return false;
  	}
  }
}

/* Infinite Scroll */
if ( ! function_exists( 'wp_infinite_scroll_js_setting' ) ) {
  function wp_infinite_scroll_js_setting() {
    if( ! is_singular() ) : ?>
    <script tyle="text/javascript">
    jQuery(function($){
      $(function(){
        $( 'ul.main-loop' ).infinitescroll({
          loading: {
            img: "<?php echo get_template_directory_uri(); ?>/img/sentry-spinner.svg",
            msgText: "読込中...",
            finishedMsg: "これ以上読み込める記事がありません。",
          },
          nextSelector : "#nav-below a.next",
          navSelector : "#nav-below",
          itemSelector : "ul.main-loop li",
          errorCallback: function() {
            $( '#nav-below' ).hide();
          }
        });

        $(window).unbind('.infscr');

        $('#nav-below a.next').on( "click", function(){
      		$( 'ul.main-loop' ).infinitescroll( 'retrieve' );
          $( '#nav-below' ).show();
      		return false;
      	});
      });
    });
    </script>
    <?php
    endif;
  }
}
add_action( 'wp_footer', 'wp_infinite_scroll_js_setting',100 );

?>
