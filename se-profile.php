<aside class="profile notification">
  <h2>About<span class="small">この記事のライター</span></h2>
  <div class="media">
    <figure class="media-left">
      <p class="image is-96x96">
      <?php echo get_avatar( get_the_author_meta('ID') , 96 );?>
      </p>
    </figure>
    <div class="media-content">
      <div class="content">
        <p class="username author"><?php echo get_the_author_meta('nickname'); ?></p>
        <p class="description"><?php echo get_the_author_meta('description'); ?></p>
      </div>
      <div class="level">
        <div class="level-left">
        <?php if(get_the_author_meta('user_url') != "" ) : ?>
          <a class="level-item" href="<?php echo the_author_meta( 'user_url' ); ?>" target="_blank">
            <span class="icon"><i class="fa fa-globe"></i></span>Page
          </a>
        <?php endif; ?>
        <?php if(get_the_author_meta('twitter') != "" ) : ?>
          <a class="level-item twitter" href="<?php echo the_author_meta( 'twitter' ); ?>" target="_blank">
            <span class="icon"><i class="fa fa-twitter"></i></span>Twitter
          </a>
        <?php endif; ?>
        <?php if(get_the_author_meta('facebook') != "" ) : ?>
          <a class="level-item facebook" href="<?php echo the_author_meta( 'facebook' ); ?>" target="_blank">
            <span class="icon"><i class="fa fa-facebook"></i></span>Facebook
          </a>
        <?php endif; ?>
        <?php if(get_the_author_meta('instagram') != "" ) : ?>
          <a class="level-item instagram" href="<?php echo the_author_meta( 'instagram' ); ?>" target="_blank">
            <span class="icon"><i class="fa fa-instagram"></i></span>Instagram
          </a>
        <?php endif; ?>
        <?php if(get_the_author_meta('googleplus') != "" ) : ?>
          <a class="level-item googleplus" href="<?php echo the_author_meta( 'googleplus' ); ?>" target="_blank">
            <span class="icon"><i class="fa fa-google-plus-official"></i></span>Google+
          </a>
        <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</aside><!-- #profile -->
