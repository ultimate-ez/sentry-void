<?php
function se_sidebars_init() {

  register_sidebar( array(
    'id' => 'sidebar',
    'name' => 'サイドバー',
    'description' => 'サイドバーに表示されるコンテンツです。',
    'before_widget' => '<section class="sidebar-widget sentry-widget">',
    'after_widget' => '</section>',
    'before_title' => '<h1>',
    'after_title' => '</h1>',
  ) );

  register_sidebar( array(
   'id' => 'se-sidebar-ad',
   'name' => 'サイドバー広告エリア',
   'description' => '各記事（投稿）の下に表示される広告用エリアです。',
   'before_widget' => '<div class="ad">',
   'after_widget' => '</div>',
   'before_title' => '<span class="is-hidden-touch is-hidden-desktop">',
   'after_title' => '</span>',
  ) );

  register_sidebar( array(
   'id' => 'se-footer-left',
   'name' => 'フッター（左）',
   'description' => 'フッターに表示されるコンテンツです。3カラムの一番左に表示されます。',
   'before_widget' => '<aside class="footer_left">',
   'after_widget' => '</aside>',
   'before_title' => '<h1>',
   'after_title' => '</h1>',
  ) );

  register_sidebar( array(
   'id' => 'se-footer-middle',
   'name' => 'フッター（中）',
   'description' => 'フッターに表示されるコンテンツです。3カラムの真ん中に表示されます。',
   'before_widget' => '<aside class="footer_middle">',
   'after_widget' => '</aside>',
   'before_title' => '<h1>',
   'after_title' => '</h1>',
  ) );

  register_sidebar( array(
   'id' => 'se-footer-right',
   'name' => 'フッター（右）',
   'description' => 'フッターに表示されるコンテンツです。3カラムの一番右に表示されます。',
   'before_widget' => '<aside class="footer_right">',
   'after_widget' => '</aside>',
   'before_title' => '<h1>',
   'after_title' => '</h1>',
  ) );

  register_sidebar( array(
   'id' => 'se-social-icon',
   'name' => 'ソーシャルアイコン',
   'description' => 'ヘッダー（PCのみ）、フッターに表示されるソーシャルアイコンエリアです。ウィジェット「[S]ソーシャルアイコン」を利用して、サイトと関連付けたいSNSを設定してください。',
   'before_widget' => '',
   'after_widget' => '',
   'before_title' => '',
   'after_title' => '',
  ) );

  register_sidebar( array(
   'id' => 'se-article-top',
   'name' => '記事タイトル下コンテンツ',
   'description' => '各記事（投稿）のタイトル下に表示されるコンテンツです。広告エリアとしての使用をおすすめ',
   'before_widget' => '<aside class="article_top">',
   'after_widget' => '</aside>',
   'before_title' => '<span class="title">',
   'after_title' => '</span>',
  ) );

  register_sidebar( array(
   'id' => 'se-article-ad',
   'name' => '記事下広告エリア',
   'description' => '各記事（投稿）の下に表示される広告用エリアです。',
   'before_widget' => '<div class="column ad">',
   'after_widget' => '</div>',
   'before_title' => '<span class="is-hidden-touch is-hidden-desktop">',
   'after_title' => '</span>',
  ) );

  register_sidebar( array(
   'id' => 'se-article-bottom',
   'name' => '記事下コンテンツ',
   'description' => '各記事（投稿）の下に表示されるコンテンツです。「Facebookのいいねboxウィジェット」や広告を設置する場合はこのエリアがおすすめです。',
   'before_widget' => '<aside class="article_bottom">',
   'after_widget' => '</aside>',
   'before_title' => '',
   'after_title' => '',
  ) );

  register_sidebar( array(
   'id' => 'se-relatedposts-ad',
   'name' => '関連記事内広告エリア',
   'description' => '関連記事内に表示させる広告コンテンツです。（モバイルのみ表示されます。）',
   'before_widget' => '',
   'after_widget' => '',
   'before_title' => '<div style="display: none;">',
   'after_title' => '</div>',
  ) );

  register_sidebar( array(
   'id' => 'se-in-article-ad',
   'name' => '記事中広告エリア',
   'description' => '記事中任意の位置にショートコードを使って表示可能な広告用エリアです。',
   'before_widget' => '<div class="column ad">',
   'after_widget' => '</div>',
   'before_title' => '<span class="is-hidden-touch is-hidden-desktop">',
   'after_title' => '</span>',
  ) );

}
add_action( 'widgets_init', 'se_sidebars_init' );

?>
