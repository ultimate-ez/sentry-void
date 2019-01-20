<?php
function sentry_customize_register_top( $wp_customize ){

  $wp_customize->add_section( 'sentry_top_section', array(
    'title' => '[Sentry]トップページ設定',
    'priority' => 30,
  ));

  // カルーセルの自動スクロール
  $wp_customize->add_setting( 'top_auto-scroll', array(
    'default' => false,
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_checkbox',
  ));
  $wp_customize->add_control( 'top_auto-scroll_c', array(
    'section' => 'sentry_top_section',
    'settings' => 'top_auto-scroll',
    'label' => 'トップページのカルーセルを自動でスクロールさせる',
    'type' => 'checkbox',
    'priority' => 10,
  ));

}
add_action( 'customize_register', 'sentry_customize_register_top' );
?>
