<?php
function sentry_customize_register_article( $wp_customize ){

  $wp_customize->add_section( 'sentry_article_section', array(
    'title' => '[Sentry]投稿ページ設定',
    'priority' => 40,
  ));

  // 投稿ページのフォントサイズ
  $wp_customize->add_setting( 'article_font_size' , array(
    'default'     => 15,
    'type' => 'theme_mod'
  ) );

  $wp_customize->add_control(
    new WP_Customize_Range(
      $wp_customize,
      'ctrl_site_font_size',
      array(
        'label'	=> '記事ページのフォントサイズを設定',
        'min' => 12,
        'max' => 24,
        'step' => 1,
        'section' => 'sentry_article_section',
        'settings'   => 'article_font_size',
      )
    )
  );

  // 記事上のSNSボタン
  $wp_customize->add_setting( 'article_sns_top', array(
    'default' => false,
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_checkbox',
  ));
  $wp_customize->add_control( 'article_sns_top_c', array(
    'section' => 'sentry_article_section',
    'settings' => 'article_sns_top',
    'label' => '記事上（タイトル下）のSNSボタンを表示する。',
    'type' => 'checkbox',
    'priority' => 40,
  ));

  // 記事下コンテンツ
  $wp_customize->add_setting( 'article_bottom', array(
    'default' => 'widget,sns,recommend,profile,comment',
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control( 'article_bottom_c', array(
    'section' => 'sentry_article_section',
    'settings' => 'article_bottom',
    'label' => '記事下コンテンツ',
    'description' =>'記事下に表示するコンテンツの表示/非表示、並び順を設定します。表示したいコンテンツ名をカンマ区切りで入力してください。設定可能なコンテンツはwidget, sns, recommend, profile, comment, matched_unitです。<br>詳細は<a href="https://ultimate-ez.com/2017/06/15/4723/?utm_source=sentry&utm_medium=customizer&utm_campaign='.get_home_url().'" target="_blank">こちら</a>',
    'type' => 'text',
    'priority' => 50,
  ));

  // 関連コンテンツユニット
  $wp_customize->add_setting( 'article_matched_unit', array(
    'type' => 'theme_mod',
  ));
  $wp_customize->add_control( 'article_matched_unit_c', array(
    'section' => 'sentry_article_section',
    'settings' => 'article_matched_unit',
    'label' => '関連コンテンツユニット',
    'description' => '記事下コンテンツに"matched_unit"で設定するGoogleAdSenseの「関連コンテンツユニット」のための設定。広告のコードをここにコピペしてください。',
    'type' => 'textarea',
    'priority' => 51,
  ));
}
add_action( 'customize_register', 'sentry_customize_register_article' );
?>
