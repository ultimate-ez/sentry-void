<?php if ( ( get_theme_mod ('amp-matched-client') != "") && ( get_theme_mod ('amp-matched-slot') != "" ) ) : ?>
<section class="related-posts">
<h2>おすすめ記事</h2>
<amp-ad
	layout="fixed-height"
	height=1221
	type="adsense"
	data-ad-client="<?php echo esc_attr( get_theme_mod( 'amp-matched-client' ) ); ?>"
	data-ad-slot="<?php echo esc_attr( get_theme_mod( 'amp-matched-slot' ) ); ?>" >
</amp-ad>
</section>
<?php endif; ?>
