<?php
class Se_Facebook_Widget extends WP_Widget{

  function __construct() {
    parent::__construct(
      'se-facebook-box',
      '[S]Facebook用いいねbox',
      array( 'description' => 'Facebookページのいいねboxを表示します。記事下コンテンツの設置を推奨。' )
    );
  }

  public function form( $instance ){
    $url = $instance['url'];
    $url_name = $this->get_field_name('url');
    $url_id = $this->get_field_id('url');
  ?>
  <p>
    <label for="<?php echo $url_id; ?>">FacebookページのURL:</label>
    <input class="widefat" id="<?php echo $url_id; ?>" name="<?php echo $url_name; ?>" type="text" value="<?php echo esc_attr( $url ); ?>">
  </p>
  <?php
  }

  public function widget( $args, $instance ){
    $url = $instance['url'];
    echo $args['before_widget']; ?>
    <div class="likebox">
  		<div class="image-box">
  			<?php
  		if ( has_post_thumbnail() ) :
  			the_post_thumbnail('facebook-thumb');
      else:
        echo '<img width="384" height="200" src="'.get_default_image_uri().'" >';
      endif;?>
  		</div>
  		<div class="text-box">
  			<p>この記事が気に入ったら<br><i class="fa fa-thumbs-up"></i> いいねしよう！</p>
  			<div class="fb-like" data-href="<?php echo esc_attr($url); ?>" data-layout="button_count" data-action="like" <?php if (wp_is_mobile() ){ echo 'data-size="small"'; }else{echo 'data-size="large"';} ?> data-show-faces="false" data-share="false"></div>
  			<p class="small is-hidden-mobile">最新記事をお届けします。</p>
  		</div>
  	</div>
    <script>(function(d, s, id) {
  	  var js, fjs = d.getElementsByTagName(s)[0];
  	  if (d.getElementById(id)) return;
  	  js = d.createElement(s); js.id = id;
  	  js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.7";
  	  fjs.parentNode.insertBefore(js, fjs);
  	}(document, 'script', 'facebook-jssdk'));</script>
    <?php echo $args['after_widget'];
  }
}

class Se_twitter_Widget extends WP_Widget{

  function __construct() {
    parent::__construct(
      'se-twitter-box',
      '[S]twitter用フォローbox',
      array( 'description' => 'Twitterのフォローを促すボックスを表示します。記事下コンテンツの設置を推奨。' )
    );
  }

  public function form( $instance ){
    $url = $instance['url'];
    $url_name = $this->get_field_name('url');
    $url_id = $this->get_field_id('url');
  ?>
  <p>
    <label for="<?php echo $url_id; ?>">Twitterアカウント:</label>
    <input class="widefat" id="<?php echo $url_id; ?>" name="<?php echo $url_name; ?>" type="text" value="<?php echo esc_attr( $url ); ?>">
    <span>(先頭のアットマーク(@)は不要です。)</span>
  </p>
  <?php
  }

  public function widget( $args, $instance ){
    $url = $instance['url'];
    echo $args['before_widget']; ?>
    <div class="follow-box is-simple twitter">
      <span class="sns-label">Twitterで</span>
  		<a href="https://twitter.com/<?php echo $url ?>" class="twitter-follow-button" data-show-count="true" data-size="large" data-show-screen-name="false">Follow <?php echo $url ?></a>
      <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
  	</div>
    <?php echo $args['after_widget'];
  }
}

class Se_Feedly_Widget extends WP_Widget{

  function __construct() {
    parent::__construct(
      'se-feedly-box',
      '[S]Feedly用フォローbox',
      array( 'description' => 'Feedlyのフォローを促すボックスを表示します。記事下コンテンツの設置を推奨。' )
    );
  }

  public function form( $instance ){
    $url = $instance['url'];
    $url_name = $this->get_field_name('url');
    $url_id = $this->get_field_id('url');
  ?>
  <p>
    <label for="<?php echo $url_id; ?>">RSSフィードのURL:</label>
    <input class="widefat" id="<?php echo $url_id; ?>" name="<?php echo $url_name; ?>" type="text" value="<?php echo esc_attr( $url ); ?>">
  </p>
  <?php
  }

  public function widget( $args, $instance ){
    $url = $instance['url'];
    echo $args['before_widget']; ?>
    <div class="follow-box is-simple feedly">
      <span class="sns-label">Feedlyで</span>
  		<span class="feedly-btn">
        <a href='https://feedly.com/i/subscription/feed/<?php echo esc_attr($url); ?>' target='_blank'>
          <i class="fa se-feedly"></i><span class="btn-label">フォローする</span>
        </a>
  				<span class="count"><?php echo sentry_feedly_subscribers($url); ?>人のフォロワー</span>
      </span>
  	</div>
    <?php echo $args['after_widget'];
  }
}

class Se_Push7_Widget extends WP_Widget{

  function __construct() {
    parent::__construct(
      'se-push7-box',
      '[S]Push7用フォローbox',
      array( 'description' => 'Push7のフォローを促すボックスを表示します。記事下コンテンツの設置を推奨。' )
    );
  }

  public function form( $instance ){
    $p7id = $instance['p7id'];
    $url = $instance['url'];
  ?>
  <p>
    <label for="<?php echo $this->get_field_id('p7id'); ?>">Push7 data-p7id:</label>
    <input class="widefat" id="<?php echo $this->get_field_id('p7id'); ?>" name="<?php echo $this->get_field_name('p7id'); ?>" type="text" value="<?php echo esc_attr( $p7id ); ?>">
  </p>
  <p>
    <label for="<?php echo $this->get_field_id('url'); ?>">アプリケーションURL（例：https://xxxx.app.push7.jp）</label>
    <input class="widefat" id="<?php echo $this->get_field_id('url'); ?>" name="<?php echo $this->get_field_name('url'); ?>" type="text" value="<?php echo esc_attr( $url ); ?>">
  </p>
  <?php
  }

  public function widget( $args, $instance ){
    $p7id = $instance['p7id'];
    $url = $instance['url'];
    echo $args['before_widget']; ?>
    <div class="follow-box is-simple push7">
      <span class="sns-label">Push7で</span>
      <div class="p7-b" data-p7id="<?php echo $p7id; ?>" data-p7c="r" ></div>
      <script src="<?php echo $url; ?>/static/button/p7.js" charset="UTF-8"></script>
    </div>
    <?php echo $args['after_widget'];
  }
}

class Se_Text_for_Mobile extends WP_Widget{

  function __construct() {
    parent::__construct(
      'se-text-for-mobile',
      '[S]テキスト（モバイルのみ）',
      array( 'description' => 'モバイル(携帯電話・スマートフォン・タブレット)のみに表示されるテキストエリアです。' )
    );
  }

  function form( $instance ){
    $title = esc_attr($instance['title']);
    $body = esc_attr($instance['body']);
  ?>
  <p>
    <label for="<?php echo $this->get_field_id('title'); ?>">タイトル（モバイルのみ表示）:</label>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" >
  </p>
  <p>
    <label for="<?php echo $this->get_field_id('body'); ?>">内容（モバイルのみ表示）：</label>
    <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('body'); ?>" name="<?php echo $this->get_field_name('body'); ?>"><?php echo $body; ?></textarea>
  </p>
  <?php
  }

  function widget( $args, $instance ){
    extract( $args );
    $title = apply_filters( 'widget_title', $instance['title'] );
    $body = apply_filters ('widget_body', $instance['body'] );

    if ( wp_is_mobile()):
    echo $args['before_widget'];
    if ( $title )
      echo $before_title .$title .$after_title;
    echo '<p>' . $body . '</p>';
    echo $args['after_widget'];
    endif;
  }

  function update ($new_instance, $old_instance){
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['body'] = trim($new_instance['body']);

    return $instance;
  }
}

class Se_Text_for_PC extends WP_Widget{

  function __construct() {
    parent::__construct(
      'se-text-for-pc',
      '[S]テキスト（PCのみ）',
      array( 'description' => 'PCのみに表示されるテキストエリアです。' )
    );
  }

  function form( $instance ){
    $title = esc_attr($instance['title']);
    $body = esc_attr($instance['body']);
  ?>
  <p>
    <label for="<?php echo $this->get_field_id('title'); ?>">タイトル（PCのみ表示）:</label>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" >
  </p>
  <p>
    <label for="<?php echo $this->get_field_id('body'); ?>">内容（PCのみ表示）：</label>
    <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('body'); ?>" name="<?php echo $this->get_field_name('body'); ?>"><?php echo $body; ?></textarea>
  </p>
  <?php
  }

  function widget( $args, $instance ){
    extract( $args );
    $title = apply_filters( 'widget_title', $instance['title'] );
    $body = apply_filters ('widget_body', $instance['body'] );

    if ( !wp_is_mobile()):
    echo $args['before_widget'];
    if ( $title )
      echo $before_title .$title .$after_title;
    echo '<p>' . $body . '</p>';
    echo $args['after_widget'];
    endif;
  }

  function update ($new_instance, $old_instance){
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['body'] = trim($new_instance['body']);

    return $instance;
  }
}

class Se_New_Posts extends WP_Widget{

  function __construct() {
    parent::__construct(
      'se-new-posts',
      '[S]最新の投稿（画像付き）',
      array( 'description' => '直近の投稿。画像（サムネイル）付きで表示されます。' )
    );
  }

  function form( $instance ){
    $title = esc_attr($instance['title']);
    $count = esc_attr($instance['count']);
  ?>
  <p>
    <label for="<?php echo $this->get_field_id('title'); ?>">タイトル:</label>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" >
  </p>
  <p>
    <label for="<?php echo $this->get_field_id('body'); ?>">表示する投稿数:</label>
    <input class="tiny-text" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="number" step="1" min="1" value="<?php echo $count; ?>" size="3">
  </p>
  <?php
  }

  function widget( $args, $instance ){
    extract( $args );
    $title = apply_filters( 'widget_title', $instance['title'] );
    $count = $instance['count'];

    echo $args['before_widget'];

    if ( $title )
      echo $before_title .$title .$after_title; ?>

      <?php
      $postquery = array(
        'posts_per_page' => $count,
        'ignore_sticky_posts' => 1,
        'no_found_rows' => true,
      );
      $posts = new WP_Query($postquery);
      ?>
      <?php if ( $posts->have_posts() ):?>
      <ul class="list is-thumbnail-list is-indicator">
      <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>

        <li class="thumblist">
          <a href="<?php the_permalink(); ?>">
            <figure class="thumbnail">
              <?php
              if ( has_post_thumbnail() ):
                the_post_thumbnail( 'related-thumb' );
              else:
                echo '<img src="'.get_default_image_uri( 300 ).'" alt="no image" title="no image" width="300" height="200" />';
              endif;
              ?>
            </figure>
            <div class="content">
              <?php the_title_attribute(); ?>
              <span class="footline"><time><?php the_time( 'Y.m.d' ); ?></time></span>
            </div>
          </a>
        </li>

      <?php endwhile; ?>
      </ul>
      <?php else: ?>
      <p>新しい記事はありません</p>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>

    <?php
    echo $args['after_widget'];
  }

  function update ($new_instance, $old_instance){
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['count'] = trim($new_instance['count']);

    return $instance;
  }
}

class Se_Popular_Posts extends WP_Widget{

  function __construct() {
    parent::__construct(
      'se-popular-posts',
      '[S]人気の投稿（タブ表示）',
      array( 'description' => '週間、月間、トータルの人気記事をタブで表示します。プラグイン「Wordpress Popular Posts」必須です。' )
    );
  }

  function form( $instance ){
    $title = esc_attr($instance['title']);
    $count = esc_attr($instance['count']);
  ?>
  <p>
    <label for="<?php echo $this->get_field_id('title'); ?>">タイトル:</label>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" >
  </p>
  <p>
    <label for="<?php echo $this->get_field_id('body'); ?>">表示する投稿数:</label>
    <input class="tiny-text" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="number" step="1" min="1" value="<?php echo $count; ?>" size="3">
  </p>
  <?php
  }

  function widget( $args, $instance ){
    extract( $args );
    $title = apply_filters( 'widget_title', $instance['title'] );
    $count = $instance['count'];

    echo $args['before_widget'];

    if ( $title )
      echo $before_title .$title .$after_title; ?>

  <div class="se_popular_posts">
    <input id="panel-1-ctrl" class="panel-radios" type="radio" name="tab-radios" checked>
    <input id="panel-2-ctrl" class="panel-radios" type="radio" name="tab-radios"> 
    <input id="panel-3-ctrl" class="panel-radios" type="radio" name="tab-radios">
    <ul class="tabs">
      <li class="tab-item li-for-panel-1">
        <label class="panel-label" for="panel-1-ctrl">Weekly</label>
      </li>
      <li class="tab-item li-for-panel-2">
        <label class="panel-label" for="panel-2-ctrl">Monthly</label>
      </li>
      <li class="tab-item li-for-panel-3">
        <label class="panel-label" for="panel-3-ctrl">Total</label>
      </li>
    </ul>
    <div class="panels">
      <div class="wpp_content panel-1">
        <?php
        if (function_exists('wpp_get_mostpopular')) {
          $wpp = array (
            'range' => 'weekly',
            'order_by' => 'views',
            'limit' => $count,
            'post_type' => 'post',
            'stats_comments' => '0',
      			'stats_date' => '1',
            'stats_date_format' => "Y.n.j",
            'thumbnail_width' => '300',
            'thumbnail_height' => '200',
            'wpp_start' => '<ul class="wpp-list list is-thumbnail-list is-indicator">',
            'wpp_end' => '</ul>',
            'post_html' =>'
              <li class="thumblist">
                <a href= "{url}">
                  <figure class="thumbnail">{thumb_img}</figure>
                  <div class="content">
                  <div class="post-text">{text_title}</div>
						      <span class="footline"><time><i class="far fa-clock"></i>{date}</time><span class="views">{views}<small>views</small></span></span>
                  </div>
                </a>
              </li>
            ',
          );
          $wpp = $this->wpp_check_view_isHidden($wpp);
          wpp_get_mostpopular($wpp);
        }?>
      </div>
      <div class="wpp_content panel-2">
        <?php
        if (function_exists('wpp_get_mostpopular')) {
          $wpp = array (
            'range' => 'monthly',
            'order_by' => 'views',
            'limit' => $count,
            'post_type' => 'post',
            'stats_comments' => '0',
      			'stats_date' => '1',
            'stats_date_format' => "Y.n.j",
            'thumbnail_width' => '300',
            'thumbnail_height' => '200',
            'wpp_start' => '<ul class="wpp-list list is-thumbnail-list is-indicator">',
            'wpp_end' => '</ul>',
            'post_html' =>'
              <li class="thumblist">
                <a href= "{url}">
                  <figure class="thumbnail">{thumb_img}</figure>
                  <div class="content">
                  <div class="post-text">{text_title}</div>
						      <span class="footline"><time><i class="far fa-clock"></i>{date}</time><span class="views">{views}<small>views</small></span></span>
                  </div>
                </a>
              </li>
            ',
          );
          $wpp = $this->wpp_check_view_isHidden($wpp);
          wpp_get_mostpopular($wpp);
        }?>
      </div>
      <div class="wpp_content panel-3">
        <?php
        if (function_exists('wpp_get_mostpopular')) {
          $wpp = array (
            'range' => 'all',
            'order_by' => 'views',
            'limit' => $count,
            'post_type' => 'post',
            'stats_comments' => '0',
      			'stats_date' => '1',
            'stats_date_format' => "Y.n.j",
            'thumbnail_width' => '300',
            'thumbnail_height' => '200',
            'wpp_start' => '<ul class="wpp-list list is-thumbnail-list is-indicator">',
            'wpp_end' => '</ul>',
            'post_html' =>'
              <li class="thumblist">
                <a href= "{url}">
                  <figure class="thumbnail">{thumb_img}</figure>
                  <div class="content">
                  <div class="post-text">{text_title}</div>
						      <span class="footline"><time><i class="far fa-clock"></i>{date}</time><span class="views">{views}<small>views</small></span></span>
                  </div>
                </a>
              </li>
            ',
          );
          $wpp = $this->wpp_check_view_isHidden($wpp);
          wpp_get_mostpopular($wpp);
        }?>
      </div>
    </div>
</div>

    <?php
    echo $args['after_widget'];
  }

  function update ($new_instance, $old_instance){
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['count'] = trim($new_instance['count']);

    return $instance;
  }

  function wpp_check_view_isHidden( $wpp ){
    $view_isHidden = absint( get_theme_mod( 'sentry_wpp_is_hidden', false ) );
		if ($view_isHidden){
			$wpp['post_html'] = '
      <li class="thumblist">
        <a href= "{url}">
          <figure class="thumbnail">{thumb_img}</figure>
          <div class="content">
          <div class="post-text">{text_title}</div>
          <span class="footline"><time><i class="far fa-clock"></i>{date}</time></span>
          </div>
        </a>
      </li>
			';
		}
    return $wpp;
  }
}

class Se_Social_Icon extends WP_Widget{

  function __construct() {
    parent::__construct(
      'se-social-icon',
      '[S]ソーシャルアイコン',
      array( 'description' => 'ヘッダー(PCのみ)、フッターに表示するソーシャルアイコンです。サイトと関連付けたいSNSのアイコンとURLを設定します。アイコンはFontAwesome（http://fontawesome.io/icons/）のアイコンが使えます。' )
    );
  }

  function form( $instance ){
    $icon = esc_attr($instance['icon']);
    $url = esc_attr($instance['url']);
  ?>
  <p>
    <label for="<?php echo $this->get_field_id('icon'); ?>">アイコン:</label>
    <input class="widefat" id="<?php echo $this->get_field_id('icon'); ?>" name="<?php echo $this->get_field_name('icon'); ?>" type="text" value="<?php echo $icon; ?>">
    <span>(<a href="http://fontawesome.io/icons/" target="_blank" >FontAwesome</a>のアイコン名を入力してください。（例：Twitterの場合：twitter）</span>
  </p>
  <p>
    <label for="<?php echo $this->get_field_id('url'); ?>">URL:</label>
    <input class="widefat" id="<?php echo $this->get_field_id('url'); ?>" name="<?php echo $this->get_field_name('url'); ?>" type="text" value="<?php echo $url; ?>">
  </p>
  <?php
  }

  function widget( $args, $instance ){
    extract( $args );
    $icon = $instance['icon'];
    $url = $instance['url'];
?>
  <div class="item is-icon">
    <a href="<?php echo $url; ?>" target="_blank">
      <i class="fab fa-<?php echo $icon ?>" aria-hidden="true"></i>
    </a>
  </div>
<?php
  }

  function update ($new_instance, $old_instance){
    $instance = $old_instance;
    $instance['icon'] = trim($new_instance['icon']);
    $instance['url'] = trim($new_instance['url']);

    return $instance;
  }
}

function se_widgets_init() {

  register_widget( 'Se_Facebook_Widget' );
  register_widget( 'Se_Twitter_Widget' );
  register_widget( 'Se_Feedly_Widget' );
  register_widget( 'Se_push7_Widget' );
  register_widget( 'Se_Text_for_Mobile' );
  register_widget( 'Se_Text_for_PC' );
  register_widget( 'Se_New_Posts' );
  register_widget( 'Se_Popular_Posts' );
  register_widget( 'Se_Social_Icon' );

}
add_action( 'widgets_init', 'se_widgets_init' );

?>
