<?php get_header(); ?>
<div id="body-site">
<?php
if ( is_home() ) {
	get_template_part( 'home/section', 'recent' );
	get_template_part( 'home/section', 'hot' );
	get_template_part( 'home/section', 'category' );
}
?>
</div>
<?php get_footer(); ?>
