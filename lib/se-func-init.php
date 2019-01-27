<?php

// Content width
if ( !isset( $content_width ) ) { $content_width = 720; }

function wp_theme_version() {
  $theme = wp_get_theme(get_template());
  return $theme->Version;
}

// Theme Support
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
    wp_enqueue_script( 'sentry', get_template_directory_uri() . '/js/sentry.js' , array('jquery', 'slick'), wp_theme_version(), true);
    wp_enqueue_style( 'font-awesome', '//use.fontawesome.com/releases/v5.0.13/css/all.css' );
    wp_enqueue_style( 'raleway', 'https://fonts.googleapis.com/css?family=Raleway');
    wp_enqueue_style( 'sentry', get_template_directory_uri().'/css/sentry.css', array(), wp_theme_version(), false );
    // wp_enqueue_style( 'yakuhan', '//cdn.jsdelivr.net/npm/yakuhanjp@3.0.0/dist/css/yakuhanjp.min.css');

    wp_add_inline_style( 'sentry', sentry_custom_css() );

    wp_enqueue_style( 'sentry-custom', get_stylesheet_uri(), 'sentry', wp_theme_version(), false  );

    /* infinitescroll */
    wp_register_script( 'wp_infinite_scroll',  get_template_directory_uri() . '/js/jquery.infinitescroll.min.js', array('jquery'), null, true );
    if( ! is_singular() ) {
      wp_enqueue_script( 'wp_infinite_scroll' );
    }

    // slick
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.min.js' , array('jquery'), null, true);

    /* Custom Style for Plugins */
    // AmazonJS
    if ( absint( get_theme_mod( 'sentry_amazonjs_custom_css', false ) ) ){
      wp_enqueue_style( 'amazonJS_custom', get_template_directory_uri().'/css/plugins/amazonjs_custom_style.css', array('amazonjs'), wp_theme_version(), false );
    }
    // Rinker
    if ( absint( get_theme_mod( 'sentry_rinker_custom_css', false ) ) ){
      wp_enqueue_style( 'rinker', get_template_directory_uri().'/css/plugins/rinker_custom_style.css', array(), wp_theme_version(), false );
    }
  }
}
add_action( 'wp_enqueue_scripts', 'sentry_enqueue_script' );

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
      if ( ( strstr( $url,'youtube' ) ) || ( strstr( $url,'youtu.be' ) ) || ( strstr( $url,'vimeo' ) ) ) {
      	$return = '<div class="video-container">'.$html.'</div>';
      } elseif ( strstr( $url,'vine' ) ){
        $return = '<div class="video-container is-square">'.$html.'</div>';
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
            img: "<?php echo get_template_directory_uri(); ?>/img/loading.gif",
            msgText: "読込中...",
            finishedMsg: "これ以上読み込める記事がありません。",
          },
          animate : true,
          extraScrollPx: 50,
          nextSelector : "#more-button a.next",
          navSelector : "#more-button",
          itemSelector : "ul.main-loop li",
          errorCallback: function() {
            $( '#more-button' ).hide();
          }
        });

        $(window).unbind('.infscr');

        $('#more-button a.next').on( "click", function(){
      		$( 'ul.main-loop' ).infinitescroll( 'retrieve' );
          $( '#more-button' ).show();
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
