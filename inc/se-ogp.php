<?php
function se_ogp_image() {
  $image = null;
  if ( has_post_thumbnail() ){
     $image_src = wp_get_attachment_image_src( get_post_thumbnail_id(), "full" );
     $image = $image_src[0];
  } else {
    global $post;
    if (preg_match('/<img[^>]*src\s*=\s*("|\')([^"\']+)("|\')[^>]*>/i', $post->post_content, $matches)) {
      $image = $matches[2];
    } else if ( get_theme_mod( 'sentry_ogp_image') ){
      $image = esc_url( get_theme_mod( 'sentry_ogp_image' ));
    }
  }
  return $image;
}

function se_ogp_author_type( $par ){
  $ogp_author_type = array(
    'article:author',
    'article:publisher',
  );
  return $ogp_author_type[$par];
}

function se_ogp_twitter_card( $par ){
  $ogp_twitter_card = array(
    'summary',
    'summary_large_image',
  );
  return $ogp_twitter_card[$par];
}

?>
<?php // print_r(get_theme_mods());?>
<?php if (get_theme_mod( 'sentry_ogp_settings')) : ?>
<?php if ( is_singular() ): ?>
<?php setup_postdata( $post ); ?>
<meta name="description" content="<?php echo get_the_excerpt(); ?>">
<meta property="og:title" content="<?php the_title(); ?>｜<?php bloginfo('name'); ?>">
<meta property="og:description" content="<?php echo get_the_excerpt(); ?>">
<meta property="og:type" content="article">
<meta property="og:url" content="<?php the_permalink(); ?>">
<?php if ($og_image = se_ogp_image()):?>
<meta property="og:image" content="<?php echo $og_image; ?>" />
<?php endif; ?>
<meta property="og:site_name" content="<?php bloginfo('name'); ?>">
<meta property="article:published_time" content="<?php echo get_post_time('c') ?>" />
<meta property="article:modified_time" content="<?php echo get_the_modified_time('c') ?>" />

<?php elseif ( is_home() ): ?>
<meta name="description" content="<?php bloginfo('description'); ?>">
<meta property="og:title" content="<?php bloginfo('name'); ?>">
<meta property="og:description" content="<?php bloginfo('description'); ?>">
<meta property="og:type" content="website">
<meta property="og:url" content="<?php echo home_url( '/', 'https' ); ?>">
<?php if ($og_image = get_theme_mod( 'sentry_ogp_image') ): ?>
<meta property="og:image" content="<?php echo $og_image; ?>" />
<?php endif;?>
<meta property="og:site_name" content="<?php bloginfo('name'); ?>">

<?php else: ?>

<?php if( $cat_desc = category_description() ): ?>
<meta name="description" content="<?php echo strip_tags($cat_desc); ?>">
<?php else :?>
<meta name="description" content="<?php strip_tags(bloginfo('description')); ?>">
<?Php endif; ?>
<meta property="og:title" content="<?php echo strip_tags(get_the_archive_title()); ?>｜<?php bloginfo('name'); ?>">
<?php if($cat_desc):?>
<meta property="og:description" content="<?php echo strip_tags($cat_desc); ?>">
<?php else:?>
<meta property="og:description" content="<?php bloginfo('description'); ?>">
<?php endif;?>
<meta property="og:type" content="website">

<meta property="og:url" content="<?php echo get_pagenum_link()?>">

<?php if ($og_image = get_theme_mod( 'sentry_ogp_image') ): ?>
<meta property="og:image" content="<?php echo $og_image; ?>" />
<?php endif;?>
<meta property="og:site_name" content="<?php bloginfo('name'); ?>">

<?php endif; ?>

<?php if ( get_theme_mod( 'sentry_ogp_author' ) ): ?>
<meta property="<?php echo se_ogp_author_type(get_theme_mod( 'sentry_ogp_author_type' )); ?>" content="<?php echo get_theme_mod( 'sentry_ogp_author' ); ?>">
<?php endif; ?>
<?php if ( get_theme_mod( 'sentry_ogp_app_id') ):?>
<meta property="fb:app_id" content="<?php echo get_theme_mod( 'sentry_ogp_app_id' ); ?>">
<?php endif; ?>
<meta name="twitter:card" content="<?php echo se_ogp_twitter_card(get_theme_mod( 'sentry_ogp_twitter_card')); ?>">
<?php if ( get_theme_mod('sentry_ogp_twitter_site') ):?>
<meta name="twitter:site" content="@<?php echo get_theme_mod('sentry_ogp_twitter_site');?>">
<meta name="twitter:creator" content="@<?php echo get_theme_mod('sentry_ogp_twitter_site');?>">
<?php endif; ?>
<?php endif; // sentry_ogp_settings  ?>
