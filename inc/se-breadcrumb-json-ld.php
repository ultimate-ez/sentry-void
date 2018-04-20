<script type="application/ld+json">
<?php $n = 1 ?>
// breadcrumb
{
	"@context": "http://schema.org",
	"@type": "BreadcrumbList",
	"itemListElement": [{
		"@type": "ListItem",
		"position": <?php echo $n ?>,
		"item": {
			"@id":"<?php echo home_url(); ?>",
			"name":"トップ"
		}
	},
	<?php $n++; ?>

	<?php if(is_single()): ?>
	<?php
		$postcat = get_the_category();
		$catid = $postcat[0]->cat_ID;
		$allcats = array( $catid );
		?>
		<?php
		while ( !$catid == 0 ) {
			$mycat = get_category( $catid );
			$catid = $mycat->parent;
			array_push( $allcats, $catid );
		}
		array_pop( $allcats );
		$allcats = array_reverse( $allcats );
		?>
		<?php foreach ( $allcats as $catid ): ?>
		{
			"@type": "ListItem",
			"position": <?php echo $n ?>,
			"item":{
				"@id":"<?php echo get_category_link( $catid ); ?>",
				"name":"<?php echo esc_html( get_cat_name( $catid ) ); ?>"
			}
		},
		<?php
		$n++;
		endforeach; ?>
	<?php endif; ?>
	{
		"@type": "ListItem",
		"position": <?php echo $n ?>,
		"item":{
			"@id":"<?php echo esc_url(get_permalink()); ?>",
			"name":"<?php echo the_title_attribute(); ?>"
		}
	}]
}
</script>
