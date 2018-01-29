<?php
function sentry_customize_register_sns( $wp_customize ){

  $wp_customize->add_section( 'sentry_sns_section', array(
    'title' => '[Sentry]SNS設定',
    'priority' => 40,
  ));

  // twitter
  $wp_customize->add_setting( 'sentry_account_twitter', array(
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control( 'sentry_account_twitter_c', array(
    'section' => 'sentry_sns_section',
    'settings' => 'sentry_account_twitter',
    'label' => 'Twitterアカウント名（先頭のアットマーク(@)は不要）',
    'type' => 'text',
    'priority' => 1,
  ));
  // LINE@
  $wp_customize->add_setting( 'sentry_account_line', array(
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control( 'sentry_account_line_c', array(
    'section' => 'sentry_sns_section',
    'settings' => 'sentry_account_line',
    'label' => 'LINE@アカウント名',
    'type' => 'text',
    'priority' => 2,
  ));
  $wp_customize->add_setting( 'sentry_account_line_sharetext', array(
    'default' => false,
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_checkbox',
  ));
  $wp_customize->add_control( 'sentry_account_line_sharetext_c', array(
    'section' => 'sentry_sns_section',
    'settings' => 'sentry_account_line_sharetext',
    'label' => '「LINEで送る」ボタンにLINE@のアカウント名を表示する。',
    'type' => 'checkbox',
    'priority' => 3,
  ));

}
add_action( 'customize_register', 'sentry_customize_register_sns' );
?>
