<?php
$url=rawurlencode(get_permalink());
$parse_url = parse_url(get_permalink());
$url_s = rawurlencode( $parse_url['host'].$parse_url['path'] );
$title=rawurlencode(get_the_title());
?>

<div class="sns-share sns-share-large">
	<h2>Share<span class="small">この記事をシェアしよう！</span></h2>
	<ul class="columns grid is-multiline is-mobile">
	<?php $sns_button_class = "button is-large is-fill"; ?>
		<!--Facebookボタン-->
		<li class="column is-6">
			<a class="<?php echo $sns_button_class; ?> facebook" target="_blank" href="//www.facebook.com/sharer.php?src=bm&u=<?php echo get_permalink();?>">
				<i class="fab fa-facebook-f"></i>
				<span class="sharetext">いいね</span>
				<?php
				if(function_exists('get_scc_facebook')) {
					echo '<span class="snscount">'.sentry_sns_count_carry( scc_get_share_facebook() ).'</span>';
				}
				?>
				</span>
			</a>
		</li>

		<!--ツイートボタン-->
		<li class="column is-6">
			<a class="<?php echo $sns_button_class; ?>  twitter" onclick="window.open('//twitter.com/intent/tweet?url=<?php echo $url; ?>&text=<?php echo $title; ?><?php
				if ( get_theme_mod( 'sentry_account_twitter' ) !=  '' ) {
					echo '&via=';
					echo esc_attr( get_theme_mod( 'sentry_account_twitter' ) );
				} ?>
				&tw_p=tweetbutton', '', 'width=500,height=450'); return false;">
				<i class="fab fa-twitter"></i>
				<span class="sharetext">ツイート</span>
				<?php
				if(function_exists('get_scc_twitter')) {
					echo '<span class="snscount">'.sentry_sns_count_carry( scc_get_share_twitter() ).'</span>';
				}
				?>
			</a>
		</li>

		<!--はてブボタン-->
		<li class="column is-4">
			<a class="<?php echo $sns_button_class; ?> hatebu" target="_blank" href="https://b.hatena.ne.jp/add?mode=confirm&url=<?php echo $url ?>&title=<?php echo $title ?>" onclick="window.open(this.href, 'HBwindow', 'width=600, height=400, menubar=no, toolbar=no, scrollbars=yes'); return false;" target="_blank">
				<i class="fa se-hatebu"></i>
				<span class="sharetext is-mobile-hidden">はてブ</span>
				<?php if(function_exists('get_scc_hatebu')) {
					echo '<span class="snscount">'.sentry_sns_count_carry( scc_get_share_hatebu() ).'</span>';
				}
				?>
			</a>
			<script type="text/javascript" src="//b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
		</li>
		<!--ポケットボタン-->
		<li class="column is-4">
			<a class="<?php echo $sns_button_class; ?> pocket" onclick="window.open('//getpocket.com/edit?url=<?php echo $url;?>&title=<?php echo $title;?>', '', 'width=500,height=350'); return false;">
				<i class="fab fa-get-pocket"></i>
				<span class="sharetext is-mobile-hidden">Pocket</span>
				<?php
				if(function_exists('get_scc_pocket')) {
					echo '<span class="snscount">'.sentry_sns_count_carry( scc_get_share_pocket() ).'</span>';
				}
				?>
			</a>
		</li>

		<!--LINEボタン-->
		<li class="column is-4">
			<a class="<?php echo $sns_button_class; ?> line" target="_blank" href="//line.me/R/msg/text/?<?php echo get_the_title() . '%0D%0A' . get_permalink();
			if ( get_theme_mod( 'sentry_account_line' ) !=  '' ) {
				echo '%0D%0D';
				echo bloginfo('name') .'の公式LINEアカウント%0Dhttps://line.me/ti/p/@' . stripslashes( get_theme_mod( 'sentry_account_line' ) );
			} ?>">
				<i class="fa se-line" aria-hidden="true"></i><span class="sharetext">送る</span>
			</a>
		</li>

	</ul>
</div>
