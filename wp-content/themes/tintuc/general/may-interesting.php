<div class="may-interesting panel panel-default">
<h1> Có thể bạn quan tâm </h1>
<?php $articles = get_most_3_recent_except_category_id(get_the_category()[0]->term_id); ?>
<?php foreach($articles as $article){
	?>
	<a href = "<?php echo get_permalink($article->ID); ?>">
	<center><img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($article->ID, 'thumbnail'))[0];?>" /></center>
	<p><?php echo $article->post_title; ?></p>
	</a>
	<?php
	}?>
</div>