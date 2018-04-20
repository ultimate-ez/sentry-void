<?php if ( is_active_sidebar( 'se-article-ad' ) ) :?>
  <aside class="article_ad">
    <span class="title">スポンサードリンク</span>
    <div class="is-flex-widescreen">
      <?php dynamic_sidebar( 'se-in-article-ad' );	?>
    </div>
  </aside>
<?php endif; ?>
