<?php
function sentry_customize_register_general( $wp_customize ){

  $wp_customize->add_section( 'sentry_section', array(
    'title' => '[Sentry]サイト設定',
    'priority' => 20,
  ));

  // カラーピッカー
  $wp_customize->add_setting( 'sentry-color', array(
    'type' => 'theme_mod',
    'default' => '#F7786B',
    'sanitize_callback' => 'maybe_hash_hex_color',
  ) );
  $wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'sentry-color_c', array(
    'label' => 'メインカラー',
    'section' => 'sentry_section',
    'settings' =>'sentry-color',
    'priority' => 10
  ) ) );

  // <head>タグに出力するコード
  $wp_customize->add_setting( 'head_textarea', array(
    'type' => 'theme_mod',
  ));
  $wp_customize->add_control( 'head_textarea_c', array(
    'section' => 'sentry_section',
    'settings' => 'head_textarea',
    'label' => '<head>タグに出力するコード',
    'type' => 'textarea',
    'priority' => 20,
  ));

  // ダミー画像のカスタマイズ
  $wp_customize->add_setting( 'dummy_img', array(
    'type' => 'theme_mod',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'dummy_img_c', array(
    'label' => '一覧用デフォルト画像(384x200)',
    'section' => 'sentry_section',
    'settings' =>'dummy_img',
    'description' => 'サムネイル登録がない記事に対して、一覧ページなどで表示するデフォルト画像を設定します。（384×200ピクセル画像）',
    'priority' => 31,
  ) ) );

  $wp_customize->add_setting( 'dummy_img_300', array(
    'type' => 'theme_mod',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'dummy_img_300_c', array(
    'label' => '一覧用デフォルト画像(300x200)',
    'section' => 'sentry_section',
    'settings' =>'dummy_img_300',
    'description' => 'サムネイル登録がない記事に対して、一覧ページなどで表示するデフォルト画像を設定します。（300×200ピクセル画像）',
    'priority' => 32,
  ) ) );

  // Copyright
  $wp_customize->add_setting( 'copyright', array(
    'default' => 2016,
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control( 'copyright_c', array(
    'section' => 'sentry_section',
    'settings' => 'copyright',
    'label' => 'サイト公開年',
    'description' => 'コピーライトの表記に使用します。',
    'type' => 'text',
    'priority' => 50,
  ));

  // Sentryプロモーション
  $wp_customize->add_setting( 'sentry_promotion', array(
    'default' => false,
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_checkbox',
  ));
  $wp_customize->add_control( 'sentry_promotion_c', array(
    'section' => 'sentry_section',
    'settings' => 'sentry_promotion',
    'label' => 'サイドバーの「Sentry」プロモーション用リンクを外す。',
    'type' => 'checkbox',
    'priority' => 90,
  ));

}
add_action( 'customize_register', 'sentry_customize_register_general' );
?>
