<?php
function marker_handler( $atts, $content = null ){
  extract ( shortcode_atts( array(
    'color' => 'yellow',
    'style' => 'thin',
  ), $atts ));
  return '<span class="marker ' . esc_attr($color) . ' ' . esc_attr($style) . '">' . $content . '</span>';
}

function font_handler ( $atts, $content = null ){
  extract ( shortcode_atts( array(
    'color' => '',
    'style' => 'bold',
  ), $atts ));
  return '<span class="' . esc_attr($style) . ' ' . esc_attr($color) . '">' . $content . '</span>';
}

function post_handler( $atts, $content = null ){
  extract( shortcode_atts( array(
    'id' => 0,
    'style' => 'related',
  ) ,$atts ));

  $outHTML ="";

  if( $id && get_post($id) ){
    $outHTML = '<div class="short-posts">';
    $outHTML .= '<a href="' . get_permalink($id) . '" rel="bookmark" title="' . get_the_title($id) . '">';
    if ( $style == "thumbnail" ){
      $outHTML .= '<figure class="thumbnail">';
      if ( has_post_thumbnail($id) ){
        $outHTML .= get_the_post_thumbnail( $id, 'related-thumb' );
      }else{
        $outHTML .= '<img src="' . get_default_image_uri(300). '" alt="no image" title="no image" width="300" height="200" />';
      }
      $outHTML .= '</figure>';
      $outHTML .= '<div class="post-title">' . get_the_title($id) . '</div>';
      $outHTML .= '<div class="post-date fix"><time>' . get_the_date( 'Y.m.d', $id ) . '</time></div>';
    } elseif ( $style == "pickup" ){
      $outHTML .= '<span class="tag is-danger">Pick Up</span>';
      $outHTML .= '<span class="post-title inline">' . get_the_title($id) . '</span>';
      $outHTML .= '<span class="post-date">（<time>' . get_the_date( 'Y.m.d', $id ) . '</time>）</span>';
    } else {
      $outHTML .= '<span class="tag">関連記事</span>';
      $outHTML .= '<span class="post-title inline">' . get_the_title($id) . '</span>';
      $outHTML .= '<span class="post-date">（<time>' . get_the_date( 'Y.m.d', $id ) . '</time>）</span>';
    }
    $outHTML .= '</a>';
    $outHTML .= '</div>';
  }
  return $outHTML;
}

function notification_handler ( $atts, $content = null ){
  extract ( shortcode_atts( array(
    'color' => '',
  ), $atts ));

  if ( $color == 'turquoise' ) { $style = "is-primary"; }
  elseif ( $color == 'blue' ) { $style = "is-info"; }
  elseif ( $color == 'green' ) { $style = "is-success"; }
  elseif ( $color == 'yellow' ) { $style = "is-warning"; }
  elseif ( $color == 'red') { $style = "is-danger"; }
  else{ $style = ""; }

  return '<div class="notification ' . esc_attr($style) . '">' . $content . '</div>';
}

function sentry_ad_handler ( $atts ){
    ob_start();
    get_template_part( 'parts/se-in-article-ad' );
    return ob_get_clean();
}
function sentry_bubble_handler( $atts, $content = null ){
  extract ( shortcode_atts( array(
    'name' => get_the_author(),
    'img' => '',
    'type' => 'left',
    'style' => 'normal',
  ), $atts ));
  if ( $img =='' ){
    $author = get_the_author_meta('ID');
    $author_img_url = get_avatar($author);
  } else {
    $author_img_url ='<img src="' . esc_attr($img) . '">';
  }
  // return '<span class="marker ' . esc_attr($color) . ' ' . esc_attr($style) . '">' . $content . '</span>';
  if ( $type == 'right' ){
    return '<div class="balloon right"><div class="balloon-text">'. $content .'</div><div class="balloon-image '. esc_attr($style) .'">' . $author_img_url . '<div class="balloon-image-description">' . esc_attr($name) . '</div></div></div>';
  } else {
    return '<div class="balloon left"><div class="balloon-image '. esc_attr($style) .'">' . $author_img_url . '<div class="balloon-image-description">' . esc_attr($name) . '</div></div><div class="balloon-text">'. $content .'</div></div>';
  }
}

function sentry_link_handler ( $atts ){
  extract( shortcode_atts( array(
    'url' => '',
  ) ,$atts ) );

  $url = strip_tags($url);

  // TODO: 自サイトのURLならIDで取得

  if ( !$url ) return;

  $ogp = get_transient( 'outlink-'.$url );

  if ( $ogp === false ){

    require_once('ogp/Parser.php');
    $content = file_get_contents($url);
    $ogp = \ogp\Parser::parse($content);
    
    if ( !empty($ogp) ){
      set_transient( 'outlink-'.$url, $ogp, DAY_IN_SECONDS  );
    }
  }

  $faviconUrl =  "http://www.google.com/s2/favicons?domain=". $url;
  $parse_url = parse_url( $url );

  if ( empty($ogp) ){
    return "<div class='outlink is-simple'><a href='" . $url . "' target='_blank' />" . $url . "</a></div>";
  } else {
    $outHTML ="";
  
    $outHTML = '<div class="outlink is-blogcard">';
    $outHTML .= '<a href="' . $ogp['og']['og:url'] . '" rel="bookmark" title="' . $ogp['og']['og:title'] . '">';
    $outHTML .= '<div class="blogcard-content">';
    $outHTML .= '<figure class="thumbnail">';
    if ( $ogp['og']['og:image'] !== "" ){
      $outHTML .= '<img src="' . $ogp['og']['og:image'] . '"/>';
    }else{
      $outHTML .= '<img src="' . get_default_image_uri(300). '" alt="no image" title="no image" width="300" height="300" />';
    }
    $outHTML .= '</figure>';
    $outHTML .= '<div class="blogcard-body">';
    $outHTML .= '<div class="blogcard-title">' . $ogp['og']['og:title'] . '</div>';
    $outHTML .= '<div class="blogcard-description">' . mb_strimwidth( $ogp['og']['og:description'], 0, 160) . '...</div>';
    $outHTML .= '</div>'; // .blogcard-body
    $outHTML .= '</div>'; // .blogcard-content
    $outHTML .= '<div class="blogcard-sitename">';
    $outHTML .= '<img src="'. $faviconUrl .'" />';
    if ( $ogp['og']['og:site_name'] ){
      $outHTML .= $ogp['og']['og:site_name'];
    } else {
      $parse_url['scheme'] . '://' . $parse_url['host'];
    }
    $outHTML .= '</div>'; // .blogcard-sitename
    $outHTML .= '</a>';
    $outHTML .= '</div>';

    return $outHTML;
  }
}

add_shortcode( 'marker', 'marker_handler' );
add_shortcode( 'font', 'font_handler' );
add_shortcode( 'post', 'post_handler' );
add_shortcode( 'notification', 'notification_handler');
add_shortcode( 'ad', 'sentry_ad_handler' );
add_shortcode( 'bubble', 'sentry_bubble_handler');
add_shortcode( 'link', 'sentry_link_handler');
?>
