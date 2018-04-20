<?php
function sentry_customize_register_amp( $wp_customize ){

  // AMPの設定
  $wp_customize->add_section( 'sentry_amp_section', array(
    'title' => '[Sentry]AMPページ設定',
    'priority' => 60,
  ));

  $wp_customize->add_setting( 'amp-logo', array(
    'type' => 'theme_mod',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'amp-logo_c', array(
    'label' => 'AMPページ用ロゴ',
    'section' => 'sentry_amp_section',
    'settings' =>'amp-logo',
    'description' => 'AMPページのヘッダーに表示するロゴ画像です。',
  ) ) );

  $wp_customize->add_setting( 'amp-analytics', array(
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control( 'amp-analytics_c', array(
    'section' => 'sentry_amp_section',
    'settings' => 'amp-analytics',
    'label' => 'AMPページ向けトラッキングID（UA-XXXXX-Y）',
    'type' => 'text',
    'priority' => 20,
  ));

  $wp_customize->add_setting( 'amp-client', array(
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_setting( 'amp-slot', array(
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control( 'amp-client_c', array(
    'section' => 'sentry_amp_section',
    'settings' => 'amp-client',
    'label' => 'AMPページ向け広告',
    'description' => 'data-ad-clients',
    'type' => 'text',
    'priority' => 21,
  ));
  $wp_customize->add_control( 'amp-slot_c', array(
    'section' => 'sentry_amp_section',
    'settings' => 'amp-slot',
    'description' => 'data-ad-slot',
    'type' => 'text',
    'priority' => 22,
  ));

  // AMP用カスタムCSS
  $wp_customize->add_setting( 'amp-customcss', array(
    'type' => 'theme_mod',
  ));
  $wp_customize->add_control( 'amp-customcss_c', array(
    'section' => 'sentry_amp_section',
    'settings' => 'amp-customcss',
    'label' => 'AMP用のカスタムCSS',
    'type' => 'textarea',
    'priority' => 30,
  ));

  // AMP向け関連コンテンツユニット
  $wp_customize->add_setting( 'amp-matched-client', array(
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_setting( 'amp-matched-slot', array(
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control( 'amp-matched-client_c', array(
    'section' => 'sentry_amp_section',
    'settings' => 'amp-matched-client',
    'label' => 'AMPページ向け関連コンテンツユニット',
    'description' => 'data-ad-clients',
    'type' => 'text',
    'priority' => 41,
  ));
  $wp_customize->add_control( 'amp-matched-slot_c', array(
    'section' => 'sentry_amp_section',
    'settings' => 'amp-matched-slot',
    'description' => 'data-ad-slot',
    'type' => 'text',
    'priority' => 42,
  ));

}
add_action( 'customize_register', 'sentry_customize_register_amp' );
?>
