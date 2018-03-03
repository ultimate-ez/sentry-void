<?php
  function sentry_add_editor_style() {
    add_editor_style( '//cdnjs.cloudflare.com/ajax/libs/bulma/0.1.0/css/bulma.css' );
    add_editor_style( get_template_directory_uri().'/css/editor-style.css?v=' . wp_theme_version() );
  }
  add_action('admin_init', 'sentry_add_editor_style');

  function sentry_register_button($buttons)
  {
      array_push( $buttons, 'marker_button' );
      array_push( $buttons, 'notification_button' );
      array_push( $buttons, 'insertHtml_button' );

      return $buttons;
  }
  add_filter('mce_buttons_2', 'sentry_register_button');

  function sentry_mce_plugin($plugin_array)
  {
      $plugin_array['custom_button_script'] = get_template_directory_uri() . '/js/editor_plugin.js?v=' . wp_theme_version();
      return $plugin_array;
  }
  add_filter('mce_external_plugins', 'sentry_mce_plugin');

  function sentry_mce_before_init( $initArray ){
    $initArray['block_formats'] = "段落<p>=p;見出し<h2>=h2;見出し<h3>=h3;見出し<h4>=h4;見出し<h5>=h5;見出し<h6>=h6;整形済みテキスト<pre>=pre";

    $initArray['content_style'] = sentry_mce_content_style();
    return $initArray;
  }
  add_filter( 'tiny_mce_before_init', 'sentry_mce_before_init' );

  function sentry_mce_content_style() {

    $defaultColor = '#F7786B';
    $primaryColor = esc_html( get_theme_mod( 'sentry-color', $defaultColor ) );
    $defaultFontSize = '15';
    $fontSize = absint( get_theme_mod( 'article_font_size', '16' ) );
    $fontSizeH2 = absint( $fontSize*1.25);

    $output = '';

    $output .= "body#tinymce a{ color:{$primaryColor};}";
    $output .= "body#tinymce h2{ background:{$primaryColor};}";
    $output .= "body#tinymce h3{ border-color:{$primaryColor};}";

    $output .= "body#tinymce{font-size: {$fontSize}px;}";
    $output .= "body#tinymce h2{font-size: {$fontSizeH2}px;}";

    return str_replace("\r\n", '', $output);
  }
?>
