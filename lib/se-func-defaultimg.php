<?php
function get_default_image_uri( $width = 384 ) {
  if ( $width == 300){
    if ( get_theme_mod ( 'dummy_img_300') ){
      return esc_url( get_theme_mod( 'dummy_img_300') );
    } else {
      return get_template_directory_uri().'/img/NoImage_300x200.png';
    }
  } else{
    if ( get_theme_mod( 'dummy_img' ) ){
      return esc_url( get_theme_mod( 'dummy_img') );
    } else {
      return get_template_directory_uri().'/img/NoImage_384x200.png';
    }
  }
}
?>
