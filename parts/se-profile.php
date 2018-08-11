<aside id="profile-card" class="card is-profile is-not-scale">
  <div class="inner-content">
    <div class="avator">
      <?php echo get_avatar( get_the_author_meta('ID') , 150 );?>
    </div>
    <div class="content">
      <p class="username author"><?php echo get_the_author_meta('nickname'); ?></p>
      <p class="description"><?php echo get_the_author_meta('description'); ?></p>
      <div class="sns-items">
      <?php if(get_the_author_meta('user_url') != "" ) : ?>
        <a class="item" href="<?php echo the_author_meta( 'user_url' ); ?>" target="_blank"><i class="fas fa-globe"></i></i></a>
      <?php endif; ?>
      <?php if(get_the_author_meta('twitter') != "" ) : ?>
        <a class="item twitter" href="<?php echo the_author_meta( 'twitter' ); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
      <?php endif; ?>
      <?php if(get_the_author_meta('facebook') != "" ) : ?>
        <a class="item facebook" href="<?php echo the_author_meta( 'facebook' ); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
      <?php endif; ?>
      <?php if(get_the_author_meta('instagram') != "" ) : ?>
        <a class="item instagram" href="<?php echo the_author_meta( 'instagram' ); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
      <?php endif; ?>
      <?php if(get_the_author_meta('googleplus') != "" ) : ?>
        <a class="item googleplus" href="<?php echo the_author_meta( 'googleplus' ); ?>" target="_blank"><i class="fab fa-google-plus-g"></i></a>
      <?php endif; ?>
      </div><!-- .sns-items-->
    </div><!-- .content -->
  </div><!-- .inner-content -->
</aside><!-- #profile -->
