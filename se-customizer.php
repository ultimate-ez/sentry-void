<?php
function mytheme_customize_register( $wp_customize ){

  $wp_customize->add_section( 'sentry_section', array(
    'title' => '[Sentry]カスタマイズ',
    'priority' => 30,
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
    'priority' => 2
  ) ) );

  // 記事上のSNSボタン
  $wp_customize->add_setting( 'article_sns_top', array(
    'default' => false,
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_checkbox',
  ));
  $wp_customize->add_control( 'article_sns_top_c', array(
    'section' => 'sentry_section',
    'settings' => 'article_sns_top',
    'label' => '記事上（タイトル下）のSNSボタンを表示する。',
    'type' => 'checkbox',
    'priority' => 11,
  ));

  // 記事下のSNSボタン
  $wp_customize->add_setting( 'article_sns_bottom', array(
    'default' => false,
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_checkbox',
  ));
  $wp_customize->add_control( 'article_sns_bottom_c', array(
    'section' => 'sentry_section',
    'settings' => 'article_sns_bottom',
    'label' => '記事下のSNSボタンを表示する。',
    'type' => 'checkbox',
    'priority' => 12,
  ));

  // 記事下プロフィール
  $wp_customize->add_setting( 'article_profile', array(
    'default' => false,
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_checkbox',
  ));
  $wp_customize->add_control( 'article_profile_c', array(
    'section' => 'sentry_section',
    'settings' => 'article_profile',
    'label' => '記事下にライターのプロフィールを表示する。',
    'type' => 'checkbox',
    'priority' => 15,
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
    'priority' => 10,
  ));

  // Copyright
  $wp_customize->add_setting( 'copyright', array(
    'default' => 2016,
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control( 'copyright_c', array(
    'section' => 'sentry_section',
    'settings' => 'copyright',
    'label' => 'サイト公開年（コピーライトの表記に使用します。）',
    'type' => 'text',
    'priority' => 20,
  ));

  // <head>タグに出力するコード
  $wp_customize->add_setting( 'head_textarea', array(
    'type' => 'theme_mod',
  ));
  $wp_customize->add_control( 'head_textarea_c', array(
    'section' => 'sentry_section',
    'settings' => 'head_textarea',
    'label' => '<head>タグに出力するコード',
    'type' => 'textarea',
    'priority' => 30,
  ));

  $wp_customize->add_section( 'sentry_sns_section', array(
    'title' => 'SNSアカウント設定',
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

  $wp_customize->add_section( 'sentry_amp_section', array(
    'title' => 'AMPページ設定',
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
    'label' => 'AMPページ向け広告(data-ad-clients)',
    'type' => 'text',
    'priority' => 21,
  ));
  $wp_customize->add_control( 'amp-slot_c', array(
    'section' => 'sentry_amp_section',
    'settings' => 'amp-slot',
    'label' => 'AMPページ向け広告(data-ad-slot)',
    'type' => 'text',
    'priority' => 22,
  ));

}
add_action( 'customize_register', 'mytheme_customize_register' );
?>
