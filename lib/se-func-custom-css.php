<?php
function sentry_custom_css(){

  $defaultColor = '#F7786B';
  $primaryColor = esc_html( get_theme_mod( 'sentry-color', $defaultColor ) );

  $defaultFontSize = '15';
  $fontSize = absint( get_theme_mod( 'article_font_size', '16' ) );
  $fontSizeH2 = absint( $fontSize*1.25);

  $output = '';

  // PrimaryColor
  $output .= "a,
    article section.entry-content a:not(.button):visited,
    article section.entry-content #toc_container a:hover,
    article section.entry-content h4:before,
    article section.entry-content h5:before,
    article section.entry-content h6:before,
    article footer.entry-foot .tags a,
    article#notfound h1 i.fa,
    .profile a:hover
    {
      color:{$primaryColor};
    }
    ";

  $output .="
    .header,
    nav .sentry-nav .hidden-links,
    article section.entry-content h2,
    .sentry-widget h1,
    article section.entry-content .pochireba .pochi_info .pochi_price,
    article footer.entry-foot .categories a,
    .main-loop li a .post-info .category,
    #nav-below .page-numbers.next,
    .sentry-widget td a,
    .sentry-widget .tagcloud a:hover,
    .sentry-widget #se_popular_posts .tabs li.is-active,
    #comments #comment_submit,
    main.home section.popular-posts ul.wpp-list li a .content .post-text:before,
    .slick-dots li.slick-active button,
    .sentry-widget #wp-calendar td a,
    article .entry-content .short-posts a .tag,
    .wpcf7 .wpcf7-submit{
      background:{$primaryColor};
    }
    article section.entry-content h3,
    article footer.entry-foot .tags a,
    .sentry-widget #se_popular_posts .tabs li.is-active {
      border-color:{$primaryColor};
    }";

  // article fonts
  $output .= "
    article section.entry-content,
    section.archive section.entry-content,
    section.search section.entry-content{
      font-size: {$fontSize}px;
    }
    article section.entry-content h2,
    section.archive section.entry-content h2,
    section.search section.entry-content h2{
      font-size: {$fontSizeH2}px;
    }
  ";

  return $output;
}
?>
