<?php
$url=rawurlencode(get_permalink());
$parse_url = parse_url(get_permalink());
$url_s = rawurlencode( $parse_url['host'].$parse_url['path'] );
$title=rawurlencode(get_the_title());
?>

<div class="sns-share sns-share-small">
	<ul class="columns is-mobile">

		<!--Facebookボタン-->
		<li class="column is-2">
			<?php
			if(function_exists('get_scc_facebook')) {
				echo '<div class="snscount">'.sentry_sns_count_carry( scc_get_share_facebook() ).'</div>';
			}
			?>
			<a class="button is-primary facebook" target="_blank" href="//www.facebook.com/sharer.php?src=bm&u=<?php echo get_permalink();?>">
				<i class="fa fa-facebook"></i>
			</a>
		</li>

		<!--ツイートボタン-->
		<li class="column is-2">
			<?php
			if(function_exists('get_scc_twitter')) {
				echo '<div class="snscount"><a href="https://twitter.com/search?f=tweets&q='.$url.'&src=typd" target="_blank" >'.sentry_sns_count_carry( scc_get_share_twitter() ).'</a></div>';
			}
			?>
			<a class="button is-primary twitter" onclick="window.open('//twitter.com/intent/tweet?url=<?php echo $url; ?>&text=<?php echo $title; ?><?php
				if ( get_theme_mod( 'sentry_account_twitter' ) !=  '' ) {
					echo '&via=';
					echo esc_attr( get_theme_mod( 'sentry_account_twitter' ) );
				} ?>&tw_p=tweetbutton', '', 'width=500,height=450'); return false;">
				<i class="fa fa-twitter"></i>
			</a>
		</li>

		<!--はてブボタン-->
		<li class="column is-2">
			<?php if(function_exists('get_scc_hatebu')) {
				echo '<div class="snscount"><a href="//b.hatena.ne.jp/entry/'.$url.'" target="_blank" >'.sentry_sns_count_carry( scc_get_share_hatebu() ).'</a></div>';
			}
			?>

			<a class="button is-primary hatebu" target="_blank" href="https://b.hatena.ne.jp/add?mode=confirm&url=<?php echo $url ?>&title=<?php echo $title ?>" onclick="window.open(this.href, 'HBwindow', 'width=600, height=400, menubar=no, toolbar=no, scrollbars=yes'); return false;" target="_blank">
				<i class="fa se-hatebu"></i>
			</a>
			<script type="text/javascript" src="//b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
		</li>

		<!--Google+1ボタン-->
		<li class="column is-2">
			<?php
			if(function_exists('get_scc_gplus')) {
				echo '<div class="snscount">'.sentry_sns_count_carry( scc_get_share_gplus() ).'</div>';
			}
			?>
			<a class="button is-primary googleplus" target="_blank" href="https://plus.google.com/share?url=<?php echo get_permalink();?>">
				<i class="fa fa-google-plus"></i>
			</a>
		</li>

		<!--ポケットボタン-->
		<li class="column is-2">
			<?php
			if(function_exists('get_scc_pocket')) {
				echo '<div class="snscount">'.sentry_sns_count_carry( scc_get_share_pocket() ).'</div>';
			}
			?>
			<a class="button is-primary pocket" onclick="window.open('//getpocket.com/edit?url=<?php echo $url;?>&title=<?php echo $title;?>', '', 'width=500,height=350'); return false;">
				<i class="fa fa-get-pocket"></i>
			</a>
		</li>

		<!--LINEボタン-->
		<li class="column">
			<?php
			if (function_exists('scc_get_share_total')) {
				echo '<div class="snscount">-</div>';
			}
			?>
			<a class="button is-primary line" target="_blank" href="//line.me/R/msg/text/?<?php echo get_the_title() . '%0D%0A' . get_permalink();
				if ( get_theme_mod( 'sentry_account_line_sharetext' ) ) {
					echo '%0D%0D';
					echo bloginfo('name') .'の公式LINEアカウント%0Dhttps://line.me/ti/p/@' . stripslashes( get_theme_mod( 'sentry_account_line' ) );
				} ?>">
				<i class="fa se-line" aria-hidden="true"></i>
			</a>
		</li>

	</ul>
</div>
