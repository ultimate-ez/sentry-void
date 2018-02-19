<section class="popular-posts" >
	<h1>今日の人気記事</h1>
	<?php
	if (function_exists('wpp_get_mostpopular')) {
		$wpp = array (
			'range' => 'daily',
			'order_by' => 'views',
			'limit' => 5,
			'post_type' => 'post',
			'stats_comments' => '0',
			'stats_date' => '1',
			'stats_date_format' => "Y.n.j",
			'thumbnail_width' => '300',
			'thumbnail_height' => '200',
			'post_html' =>'
				<li>
					<a href= "{url}">
						<div class="content">
						<div class="post-text">{text_title}</div>
						<span class="post-stats"><time>{date}</time> | {views}<small>views</small></span>
						</div>
						<figure class="thumbnail">{thumb_img}</figure>
					</a>
				</li>
			',
		);

		$view_isHidden = absint( get_theme_mod( 'sentry_wpp_is_hidden', false ) );
		if ($view_isHidden){
			$wpp['post_html'] = '
				<li>
					<a href= "{url}">
						<div class="content">
						<div class="post-text">{text_title}</div>
						<span class="post-stats"><time>{date}</time></span>
						</div>
						<figure class="thumbnail">{thumb_img}</figure>
					</a>
				</li>
			';
		}

		wpp_get_mostpopular($wpp);
	}?>
</section>
