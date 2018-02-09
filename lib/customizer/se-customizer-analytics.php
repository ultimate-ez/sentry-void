<?php
function sentry_customize_register_analytics( $wp_customize ){

  // アナリティクスの設定
  $wp_customize->add_section( 'sentry_analytics_section', array(
    'title' => '[Sentry]アナリティクス設定',
    'priority' => 30,
  ));

  // Google Analytics
  $wp_customize->add_setting( 'sentry-google-analytics', array(
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control( 'sentry-google-analytics_c', array(
    'section' => 'sentry_analytics_section',
    'settings' => 'sentry-google-analytics',
    'label' => 'Google AnalyticsトラッキングID（UA-XXXXX-Y）',
    'type' => 'text',
    'priority' => 20,
  ));

  // Google Tag Manager
  $wp_customize->add_setting( 'sentry-google-tagmanager', array(
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control( 'sentry-google-tagmanager_c', array(
    'section' => 'sentry_analytics_section',
    'settings' => 'sentry-google-tagmanager',
    'label' => 'Google Tag ManagerコンテナID（GTM-XXXXX）',
    'type' => 'text',
    'priority' => 10,
  ));

}
add_action( 'customize_register', 'sentry_customize_register_analytics' );
?>
