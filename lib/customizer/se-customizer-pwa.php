<?php
function sentry_customize_register_pwa( $wp_customize ){

  // PWAの設定
  $wp_customize->add_section( 'sentry_pwa_section', array(
    'title' => '[Sentry]PWA設定',
    'priority' => 70,
  ));

  $wp_customize->add_setting( 'pwa_manifest', array(
    'default' => false,
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_checkbox',
  ));
  $wp_customize->add_control( 'pwa_manifest_c', array(
    'section' => 'sentry_pwa_section',
    'settings' => 'pwa_manifest',
    'label' => 'PWA用のHTMLを出力する',
    'description' =>'PWA用のHTMLを出力します。<br>manifest.jsonはサイトのルートに設置してください。<br>PWS設定方法の詳細は<a href="https://ultimate-ez.com/2017/08/12/4846/?utm_source=sentry&utm_medium=customizer&utm_campaign='.get_home_url().'" target="_blank">こちら</a>。',
    'type' => 'checkbox',
    'priority' => 10,
  ));

}
add_action( 'customize_register', 'sentry_customize_register_pwa' );
?>
