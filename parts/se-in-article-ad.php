<?php if ( is_active_sidebar( 'se-in-article-ad' ) ) :?>
  <aside class="ad is-horizon">
    <span class="ad-label">スポンサードリンク</span>
    <div class="column">
      <?php dynamic_sidebar( 'se-in-article-ad' );	?>
    </div>
  </aside>
<?php endif; ?>
