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
    'description' => '投稿ページで「Twitter」のシェアした際に、投稿内にTwitterのアカウント名が表示されます。',
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
    'description' => '投稿ページで「LINE」のシェアをした際に、投稿内にLINE@のアカウント名が表示されます。',
    'type' => 'text',
    'priority' => 2,
  ));

  $wp_customize->add_setting( 'sentry_ogp_settings', array(
    'default' => false,
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_checkbox',
  ));
  $wp_customize->add_control( 'sentry_ogp_settings_c', array(
    'section' => 'sentry_sns_section',
    'settings' => 'sentry_ogp_settings',
    'label' => 'OGPタグを出力する',
    'description' => '※OGPタグ設定方法の詳細は<a href="https://ultimate-ez.com/2018/04/11/5017/?utm_source=sentry&utm_medium=customizer&utm_campaign='.get_home_url().'" target="_blank">こちら</a>。',
    'type' => 'checkbox',
    'priority' => 11,
  ));
  $wp_customize->add_setting( 'sentry_ogp_image', array(
    'type' => 'theme_mod',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'sentry_ogp_image_c', array(
    'label' => 'og:image（画像）',
    'section' => 'sentry_sns_section',
    'settings' =>'sentry_ogp_image',
    'description' => 'サムネイル登録がない記事に対して、デフォルトで表示する画像を設定します。（推奨：1200×630px）',
    'priority' => 12,
  ) ) );

  $wp_customize->add_setting( 'sentry_ogp_app_id', array(
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control( 'sentry_ogp_app_id_c', array(
    'section' => 'sentry_sns_section',
    'settings' => 'sentry_ogp_app_id',
    'label' => 'fb:app_id（FacebookのアプリID）',
    'description' => '※FacebookアプリIDの取得方法は<a href="https://ultimate-ez.com/2018/04/11/5017/?utm_source=sentry&utm_medium=customizer&utm_campaign='.get_home_url().'" target="_blank">こちら</a>。',
    'type' => 'text',
    'priority' => 21,
  ));
  $wp_customize->add_setting( 'sentry_ogp_author_type', array(
    'type' => 'theme_mod',
    'default' => '0',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control( 'sentry_ogp_author_type_c', array(
    'section' => 'sentry_sns_section',
    'settings' => 'sentry_ogp_author_type',
    'label' => 'article:author/publisher',
    'description' => '投稿者のタイプを選択します。個人アカウントの場合は「article:author」を、企業アカウントの場合は「article:publisher」を設定します。',
    'type' => 'select',
    'choices' => array(
      '0' => 'article:author',
      '1' => 'article:publisher',
    ),
    'priority' => 22,
  ));
  $wp_customize->add_setting( 'sentry_ogp_author', array(
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control( 'sentry_ogp_author_c', array(
    'section' => 'sentry_sns_section',
    'settings' => 'sentry_ogp_author',
    // 'label' => 'twitter:site（Twitterのアカウント名）',
    'description' => 'article:author/publisherに指定するFacebookページのURLを設定します。',
    'type' => 'text',
    'priority' => 23,
  ));

  $wp_customize->add_setting( 'sentry_ogp_twitter_site', array(
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control( 'sentry_ogp_twitter_site_c', array(
    'section' => 'sentry_sns_section',
    'settings' => 'sentry_ogp_twitter_site',
    'label' => 'twitter:site（Twitterのアカウント名）',
    'description' => '※先頭のアットマーク(@)は不要',
    'type' => 'text',
    'priority' => 31,
  ));
  $wp_customize->add_setting( 'sentry_ogp_twitter_card', array(
    'type' => 'theme_mod',
    'default' => '0',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control( 'sentry_ogp_twitter_card_c', array(
    'section' => 'sentry_sns_section',
    'settings' => 'sentry_ogp_twitter_card',
    'label' => 'twitter:card（カードタイプ）',
    'type' => 'select',
    'choices' => array(
      '0' => 'Summary Card',
      '1' => 'Summary Card with Large Image',
    ),
    'priority' => 32,
  ));
}
add_action( 'customize_register', 'sentry_customize_register_sns' );
?>
