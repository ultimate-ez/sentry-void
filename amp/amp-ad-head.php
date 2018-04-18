<?php if ( ( get_theme_mod ('amp-client') != "") && ( get_theme_mod ('amp-slot') != "" ) ) : ?>
<div class="ad">
<div>スポンサードリンク</div>
<amp-ad
	layout="fixed-height"
	height=100
	type="adsense"
	data-ad-client="<?php echo esc_attr( get_theme_mod( 'amp-client' ) ); ?>"
	data-ad-slot="<?php echo esc_attr( get_theme_mod( 'amp-slot' ) ); ?>" >
</amp-ad>
</div>
<?php endif; ?>
