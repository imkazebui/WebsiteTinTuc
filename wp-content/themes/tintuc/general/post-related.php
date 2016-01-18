<div class="post-related">
<h1> Cùng chuyên mục </h1>
<div style="margin-top: 20px;">
<?php 
	if($posts_related = get_post_related(get_the_ID()))
	{
		foreach($posts_related as $post){
		?> 
			<div class="col-lg-4">
				<a href = "<?php echo get_permalink($article->ID); ?>">
				<center><img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($post->ID, 'thumbnail'))[0];?>" /></center>
				<p><?php echo $post->post_title; ?></p>
				</a>
			</div>

		<?php	
		}
	}
?>


</div>
</div>