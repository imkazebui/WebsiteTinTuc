<?php
/**
Hiển thị tin gần đây
**/
global $post;
$args_category = array(
	'type'                     => 'post',
	'taxonomy'                 => 'category',
	'order'                    => 'ASC',
	'orderby'				   => 'id'
); 

$categories = get_categories( $args_category );
// echo "<pre>";
// var_dump($categories);
// echo "</pre>";
?>

<div class="container">
	<div id="section_category" class="row" style="margin-top:20px;">
		<!-- tin theo chuyen muc -->
		<div class="col-lg-8">
		<?php foreach($categories as $category){ 
			if($category->slug=="anh-video")
				continue;
		?>
			<div style="width:100%;border-bottom:1px solid #eee;padding-bottom:15px;margin-bottom:20px;">
				<!-- title tin theo chuyen muc -->
				<div class="title-category">
					<a href="#"><?php echo $category->name;?></a>
				</div>
				<div class="content-category row">
					<?php
						//Lấy tất cả post từ category
						$posts_from_category = get_posts(array('posts_per_page'   => 5,'category'   => $category->cat_ID));
						$flag=false;
						foreach ( $posts_from_category as $post ) {
							setup_postdata( $post ); 
					?>
							
								<!-- bai viet chuyen muc gan day (co hinh anh) -->
								<?php if (!$flag) { $flag=true;?>
								<div class="col-lg-8 col-sm-12" style="border-right: 1px solid #eee;margin-top: 10px;">
									<!-- tieu de bai viet -->
									<div style="">
										<a href="<?php the_permalink();?>">
											<?php the_title(); ?>
										</a>
									</div>
									<!-- mot tam hinh 150x150 -->
									<div class="col-lg-4 col-sm-12" style="background:#eee;margin:0 auto;margin-top:10px;padding:0;">
										<?php the_post_thumbnail(array(150,150), array('class'=>'img-responsive')); ?>
									</div>
									<!-- mieu ta ngan -->
									<div class="col-lg-8 col-sm-12" style="margin-top:10px;">
										<div class="description-article-category">
										<?php $content = strip_tags(get_the_content()); echo mb_strimwidth($content, 0, 220, '...');?>
										<a href="<?php the_permalink() ?>">Read more </a>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-sm-12">
								<?php }else{ ?>
								<!-- bai viet chuyen muc gan day (ko hinh anh) -->
								
									<div style="width:100%;margin-top:10px;">
										<a href="<?php the_permalink();?>"><?php the_title();?></a>
									</div>							
						<?php }
						wp_reset_postdata(); 
						}
					?>
								</div>
				</div>
			</div>
		<?php } ?>
		</div>
		<!-- gi cung duoc -->
		<div class="col-lg-4">
			<div>
				<?php get_template_part('general/most', 'view');?>
			</div>
		</div>
	</div>
</div>