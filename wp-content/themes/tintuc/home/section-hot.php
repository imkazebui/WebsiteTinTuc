<?php
/**
Hiển thị tin ảnh
**/
global $post;
$args_posts = array(
	'category' 				   => 8,
	'order'                    => 'DESC',
	'orderby'				   => 'date',
	'posts_per_page'   => 4
); 
$posts = get_posts( $args_posts );
 //echo "<pre>";
 //var_dump($posts);
 //echo "</pre>";
?>
<div class="container" style="margin-top:10px;">
	<div id="section_hot" class="row">
		<div class="title-anh-video">
			<a href="<?php echo esc_url(get_category_link(8));?>">Tin ảnh</a>
		</div>
		<?php foreach ( $posts as $post ) {
			
			setup_postdata( $post ); 
		?>
		<div class="col-lg-3">
			<a class="title-item-anh-video" href="<?php the_permalink(); ?>">
			<center>
			<div style="width:220px;height:150px;">
				<?php the_post_thumbnail('post_thumbnail', array('class'=> 'img-responsive')); ?>
			</div>
			</center>
			<div>
				<i class="glyphicon glyphicon-camera"></i><?php the_title(); ?>
			</div>
			</a>
		</div>
		<?php 
		}
		?>

	</div>
</div>