<div class="sentry-bottom-nav">
  <ul>
  <?php if ( is_single() ) : ?>
    <li id="btn-share" class="circle-button is-float"><a href="#sns" title="このページを共有する"><i class="fa fas fa-share-alt"></i></a></li>
  <?php endif; ?>
    <li id="btn-top" class="circle-button is-float"><a href="#top" title="ページトップヘ"><i class="fa fas fa-arrow-up"></i></a></li>
  </ul>
</div>
<aside class="float-sns-box">
  <div class="container">
    <a id="btn-close" href="#close" ><i class="fas fa-times"></i></a>
    <?php get_template_part( 'parts/se-sns-large' ); ?>
  </div>
</aside>
<footer id="footer" class="global-footer sentry-widget">
  <div class="container">
    <div class="grid">
    <?php $footer_grid_class = "column is-12 is-6-tablet is-4-desktop"; ?>
      <div class="column is-12 is-4-desktop">
        <?php if ( is_active_sidebar( 'se-footer-left' ) ) :
          dynamic_sidebar( 'se-footer-left' );
        endif; ?>
      </div>
      <div class="column is-12 is-6-tablet is-4-desktop">
        <?php if ( is_active_sidebar( 'se-footer-middle' ) ) :
          dynamic_sidebar( 'se-footer-middle' );
        endif; ?>
      </div>
      <div class="column is-12 is-6-tablet is-4-desktop">
        <?php if ( is_active_sidebar( 'se-footer-right' ) ) :
          dynamic_sidebar( 'se-footer-right' );
        endif; ?>
      </div>
    </div>
    <div class="copyright">
      ©
      <?php
      if ( get_theme_mod( 'copyright' ) !=  '' ) {
        echo esc_attr( get_theme_mod( 'copyright' ) ). " - " ;
      }
      echo date('Y ');?>
      <span class="bloginfo <?php if ( !get_theme_mod( 'article_profile' ) ){ echo 'author'; }?>">
      <?php bloginfo('name'); ?>
      </span>
      <?php if ( !get_theme_mod( 'sentry_promotion' ) ) : ?>
			<span class="credit">by <a href="https://ultimate-ez.com/sentry/?utm_source=sentry&utm_medium=widget&utm_campaign=<?php echo get_home_url(); ?>" target="_blank">Sentry</a></span>
	    <?php endif; ?>
    </div>
  </div>
</footer>
<?php get_template_part( 'inc/se-breadcrumb', 'json-ld' ); ?>
<?php wp_footer(); ?>
</body></html>
