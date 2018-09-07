<?php
function sentry_custom_css(){

  $defaultColor = '#F7786B';
  $primaryColor = esc_html( get_theme_mod( 'sentry-color', $defaultColor ) );

  $defaultFontSize = '16';
  $fontSize = absint( get_theme_mod( 'article_font_size', $defaultFontSize ) );
  $fontSizeH2 = absint( $fontSize*1.25);
  $fontSizeH3 = absint( $fontSize*1.125);

  $contentHeadlineStyle = "default";
  $sidebarHeadlineStyle = "default";

  $output = '';

  // Elemetns: color
  $output .= "
  a,
  footer.entry-foot .tags a,
  section.new-posts .card .category,
  #toc_container p.toc_title:before,
  footer.entry-foot .categories a:hover,
  .entry-content.content ul li:before,
  .entry-content.content ol li:before
  {
    color:{$primaryColor};
  }";
  
  // Elements: background
  $output .= "
    header.global-header,
    .short-posts a .tag,
    ul.is-ranking-list>li:before,
    footer.entry-foot .categories a,
    section.comment input[name=submit],
    .wpcf7 .wpcf7-submit,
    .tagcloud a:hover,
    footer.entry-foot .tags a:hover,
    .sentry-bottom-nav .circle-button#btn-share,
    header.global-header nav .head-menu-nav-button
    {
      background:{$primaryColor};
    }";

  // Elements: border-color
  $output .= "
    footer.entry-foot .tags a,
    section.new-posts .card .category,
    .sentry-bottom-nav .circle-button#btn-share{
      border-color:{$primaryColor};
    }";

  // Tabs
  $output .= "
  #panel-1-ctrl:checked ~ .tabs .tab-item.li-for-panel-1,
  #panel-2-ctrl:checked ~ .tabs .tab-item.li-for-panel-2,
  #panel-3-ctrl:checked ~ .tabs .tab-item.li-for-panel-3,
  #panel-4-ctrl:checked ~ .tabs .tab-item.li-for-panel-4,
  #panel-5-ctrl:checked ~ .tabs .tab-item.li-for-panel-5
  {
    background:{$primaryColor};
    border-color:{$primaryColor};
  }
  ";

  // Headline Style
  if ( $contentHeadlineStyle == "default" ){
    $output .= "
    .entry-content h2{
      font-size: {$fontSizeH2}px;
      line-height: 1;
      padding: 1rem;
      margin-top: 1.8rem;
      margin-bottom: 1rem;
      color: #fff;
      background: {$primaryColor};
      border-radius: 5px;
    }
    .entry-content h3{
      font-size: {$fontSizeH3}px;
      line-height: 1;
      padding: .6rem 0 .6rem .8rem;
      margin-top: 1.6rem;
      margin-bottom: 0.8rem;
      border-left: 4px solid {$primaryColor};
    }
    .entry-content h4,
    .entry-content h5,{
      line-height: 1;
      padding: .2rem 0;
      margin-top: 1.6rem;
      margin-bottom: 0.8rem;
    }
    .entry-content h4:before,
    .entry-content h5:before{
      font: normal normal normal 14px/1 'Font Awesome 5 Free';
      content: '\\f111';
      font-weight: 900;
      margin-right: .6rem;
      color: {$primaryColor};
    }
    .entry-content h5:before{
      font-weight: 400;
    }
    ";
  }

  // Headline Style at Sidebar
  if ( $sidebarHeadlineStyle == "default" ){
    $output .= "
      .sidebar-main h1{
        font-size: 1rem;
        line-height: 1;
        padding: 1rem;
        margin-top: 1.8rem;
        margin-bottom: 1rem;
        color: #fff;
        background: {$primaryColor};
        border-radius: 5px;
      }
    ";
  }

  // article fonts
  $output .= "
    article section.entry-content,
    section.archive section.entry-content,
    section.search section.entry-content{
      font-size: {$fontSize}px;
    }
  ";

  return $output;
}
?>
