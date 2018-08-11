<?php
  function sentry_add_editor_style() {
    add_editor_style( get_template_directory_uri().'/css/editor-style.css?v=' . wp_theme_version() );
  }
  add_action('admin_init', 'sentry_add_editor_style');

  function sentry_register_button($buttons)
  {
      array_push( $buttons, 'marker_button' );
      array_push( $buttons, 'notification_button' );
      array_push( $buttons, 'insertHtml_button' );
      array_push( $buttons, 'balloon_left');
      array_push( $buttons, 'balloon_right');

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

    $defaultFontSize = '16';
    $fontSize = absint( get_theme_mod( 'article_font_size', $defaultFontSize ) );
    $fontSizeH2 = absint( $fontSize*1.25);

    $contentHeadlineStyle = "default";

    $output = '';

    $output .= "body#tinymce a{ color: {$primaryColor};}";

    $output .= "body#tinymce{font-size: {$fontSize}px;}";

    if ( $contentHeadlineStyle == "default" ){
      $output .= "body#tinymce h2{font-size: {$fontSizeH2}px;line-height: 1;padding: 1rem;margin-top: 1.8rem;margin-bottom: 1rem;color: #fff;background: {$primaryColor};border-radius: 5px;}";
    }

    return str_replace("\r\n", '', $output);
  }
?>
