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
    'style' => 'thumbnail',
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
        $outHTML .= '<img src="' . get_template_directory_uri(). '/img/NoImage_300x200.png" alt="no image" title="no image" width="300" height="200" />';
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
    get_template_part( 'se-in-article-ad' );
    return ob_get_clean();
}

add_shortcode( 'marker', 'marker_handler' );
add_shortcode( 'font', 'font_handler' );
add_shortcode( 'post', 'post_handler' );
add_shortcode( 'notification', 'notification_handler');
add_shortcode( 'ad', 'sentry_ad_handler' );
?>
