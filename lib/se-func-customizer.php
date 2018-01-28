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
    'label' => 'サイト公開年',
    'description' => 'コピーライトの表記に使用します。',
    'type' => 'text',
    'priority' => 20,
  ));

  // 記事下コンテンツ
  $wp_customize->add_setting( 'article_bottom', array(
    'default' => 'widget,sns,recommend,profile,comment',
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control( 'article_bottom_c', array(
    'section' => 'sentry_section',
    'settings' => 'article_bottom',
    'label' => '記事下コンテンツ',
    'description' =>'記事下に表示するコンテンツの表示/非表示、並び順を設定します。表示したいコンテンツ名をカンマ区切りで入力してください。設定可能なコンテンツはwidget, sns, recommend, profile, commentです。<br>詳細は<a href="https://ultimate-ez.com/2017/06/15/4723/?utm_source=sentry&utm_medium=customizer&utm_campaign='.get_home_url().'" target="_blank">こちら</a>',
    'type' => 'text',
    'priority' => 19,
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
    'priority' => 5,
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
    'priority' => 6,
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

  // AMPの設定
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

  // PWAの設定
  $wp_customize->add_section( 'sentry_pwa_section', array(
    'title' => 'PWA設定',
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
add_action( 'customize_register', 'mytheme_customize_register' );
?>