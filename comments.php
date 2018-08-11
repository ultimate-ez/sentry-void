<?php if ( is_single() || is_page() ) : ?>
 <?php if ( comments_open() ) : ?>
  <section class="comment" >
    <h2>Comments<span class="small">この記事についたコメント</span></h2>
    <?php if ( have_comments() ) : ?>
     <div><i class="fa fa-comment" aria-hidden="true"></i> <?php comments_number(); ?></div>

     <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
      <nav class="pagination">
       <?php previous_comments_link(); ?>
       <?php next_comments_link(); ?>
      </nav>
     <?php endif;?>

     <ul class="commentlist">
        <?php wp_list_comments( array(
       'avatar_size'=> 96,
       'callback'=>'custom_comment_list'
      )); ?>
    </ul>
    <?php endif; // have_comments() ?>

    <?php
    $fields = array(
      'author' =>
        '<label for="author" class="label">' . __( 'Name', 'domainreference' ) .
        '<span class="required">*</span></label>'.
        '<p class="control">' .
        '<input class="input" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
        '" size="30" /></p>',
      'email' =>
        '<label for="email" class="label">' . __( 'Email', 'domainreference' ) .
        '<span class="required">*</span></label>'.
        '<p class="control">' .
        '<input class="input" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
        '" size="30" /></p>',

      'url' =>
        '<label for="url" class="label">' . __( 'Website', 'domainreference' ) .
        '</label>' .
        '<p class="control">' .
        '<input class="input" id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
        '" size="30" /></p>',
    );
    $comment_args = array(
      'fields' => apply_filters( 'comment_form_default_fields', $fields ),
      'comment_field' =>
        '<label for="comment" class="label">' . __( 'Comment', 'domainreference' ) . '</label>'.
        '<p class="control">'.
        '<textarea class="textarea" id="comment" name="comment"placeholder="コメントを入力してください。"></textarea></p>',
      'id_submit' => 'comment_submit',
    );
    ?>
    <?php comment_form( $comment_args ); ?>

  </section><!-- #comments -->
 <?php endif; ?>
<?php endif; ?>

<?php
function custom_comment_list($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>
    
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <div class="balloon left">
          <div class="balloon-image is-circle">
            <?php echo get_avatar($comment); ?>
            <div class="balloon-image-description">
              <?php echo get_comment_author(); ?>
            </div>
          </div>
          <div class="balloon-text has-foot-line">
            <?php comment_text() ?>
            <div class="foot-line">
              <?php echo get_comment_date() ?> <?php echo get_comment_time() ?>
            </div>
          </div>
        </div>
    </li>
    <?php 
}
?>