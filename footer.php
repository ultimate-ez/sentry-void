<div class="sentry-bottom-nav">
  <ul>
  <?php if ( is_single() && get_theme_mod( 'article_sns_bottom' ) ) : ?>
    <li id="btn-share"><a href="#sns" title="このページを共有する"><i class="fa  fa-share-alt"></i></a></li>
  <?php endif; ?>
    <li id="btn-top"><a href="#top" title="ページトップヘ"><i class="fa fa-long-arrow-up"></i></a></li>
  </ul>
</div>
<footer id="footer" class="sentry-widget">
  <div class="container">
    <div class="columns">
      <div class="column is-one-third">
        <?php if ( is_active_sidebar( 'se-footer-left' ) ) :
          dynamic_sidebar( 'se-footer-left' );
        endif; ?>
      </div>
      <div class="column is-one-third">
        <?php if ( is_active_sidebar( 'se-footer-middle' ) ) :
          dynamic_sidebar( 'se-footer-middle' );
        endif; ?>
      </div>
      <div class="column is-one-third">
        <?php if ( is_active_sidebar( 'se-footer-right' ) ) :
          dynamic_sidebar( 'se-footer-right' );
        endif; ?>
      </div>
    </div>
    <div class="columns">
      <div class="column is-half">
        <div class="social-icons">
        <?php
				if ( is_active_sidebar( 'se-social-icon' ) ) :
          dynamic_sidebar( 'se-social-icon' );
        endif;
				?>
        </div>
      </div>
      <div id="copyright" class="column is-half">
        ©
        <?php
        if ( get_theme_mod( 'copyright' ) !=  '' ) {
          echo esc_attr( get_theme_mod( 'copyright' ) ). " - " ;
        }
        echo date('Y ');?>
        <span class="bloginfo <?php if ( !get_theme_mod( 'article_profile' ) ){ echo 'author'; }?>">
        <?php bloginfo('name'); ?>
        </span>
      </div>
    </div>
  </div>
</footer>
<?php get_template_part( 'se-breadcrumb', 'json' ); ?>
<?php wp_footer(); ?>
</body></html>
