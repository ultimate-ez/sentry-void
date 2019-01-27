<?php
function sentry_customize_register_plugins( $wp_customize ){

  // プラグインの設定
  $wp_customize->add_section( 'sentry_plugins_section', array(
    'title' => '[Sentry]プラグイン設定',
    'priority' => 50,
  ));

  // wppのview数の非表示
  $wp_customize->add_setting( 'sentry_wpp_is_hidden', array(
    'default' => false,
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_checkbox',
  ));
  $wp_customize->add_control( 'sentry_wpp_is_hidden_c', array(
    'section' => 'sentry_plugins_section',
    'settings' => 'sentry_wpp_is_hidden',
    'label' => 'Wordpress Popular Postsのview数を表示しない。',
    'type' => 'checkbox',
    'priority' => 10,
  ));

  // AmazonJS用カスタムCSS
  $wp_customize->add_setting( 'sentry_amazonjs_custom_css', array(
    'default' => false,
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_checkbox',
  ));
  $wp_customize->add_control( 'sentry_amazonjs_custom_css_c', array(
    'section' => 'sentry_plugins_section',
    'settings' => 'sentry_amazonjs_custom_css',
    'label' => 'AmazonJSのカスタムCSSを適用する。',
    'type' => 'checkbox',
    'priority' => 21,
  ));

  // Rinker用カスタムCSS
  $wp_customize->add_setting( 'sentry_rinker_custom_css', array(
    'default' => false,
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_checkbox',
  ));
  $wp_customize->add_control( 'sentry_rinker_custom_css_c', array(
    'section' => 'sentry_plugins_section',
    'settings' => 'sentry_rinker_custom_css',
    'label' => 'RinkerのカスタムCSSを適用する。',
    'type' => 'checkbox',
    'priority' => 22,
  ));

}
add_action( 'customize_register', 'sentry_customize_register_plugins' );
?>
