<?php
/**
Hiển thị tin gần đây
**/
?>
<div class="container">
	<div id="section_recent" class="row" style="padding-bottom:15px;border-bottom:1px solid #eee;">
		<div class="col-lg-6" style="border-right:1px solid #eee;">
			<div style="">
				<!-- most recent -->
		<?php
			$query_args = array(
				"posts_per_page" => "12"
			);
			$listPosts = new WP_Query($query_args);
			$count=0;
			// the loop
			if ( $listPosts->have_posts() ) {
				while ( $listPosts->have_posts() ) {
					$listPosts->the_post();
					if ( (int) $listPosts->current_post === 0 ) {
		?>
					<div class="recent-hot row">
						<div class="col-lg-12" style="max-height:280px;overflow:hidden;">
							<div style="background:#eee;width:100%;height:100%;">
								<a href="<?php the_permalink(); ?>">
								<?php 
								if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
									the_post_thumbnail('post-thumbnail',array('class'=>'img-responsive'));
								} 
								?>
								</a>
							</div>
						</div>
						<div class="col-lg-12 info-article">
							<p class="title-article"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></p>
							<p class="description-article">
								<?php $content = strip_tags(get_the_content()); echo mb_strimwidth($content, 0, 220, '...');?>
								<a href="<?php the_permalink() ?>">Read more </a>
							</p>
						</div>
						
					</div>
					<!-- Tin gan day (3 item)-->
					<div class="recent-news row">
		<?php
				} else if ((int) $listPosts->current_post >=1 && (int) $listPosts->current_post <= 3){
		?>
						<div class="col-lg-4" style="margin-top:10px;">
							<div style="width:100%;background:#eee;">
								<?php 
								if ( has_post_thumbnail() ) {
									the_post_thumbnail(array(165, 100), array('class'=>'img-responsive')); 
								}
								?>
							</div>
							<a href="<?php the_permalink();?>"><?php the_title();?> </a>
						</div>
						
		<?php
					if($listPosts->current_post === $listPosts->post_count-1 || $listPosts->current_post === 3)
					{
						?>
								</div>
								<!-- het tin gan day -->
							</div>
						</div>
						<!-- het cot thu nhat -->
						<?php
					}
				}else if ((int) $listPosts->current_post === 4)
				{
					?>
					<!-- cot thu 2 - tiep tuc tin gan day -->
					<div class="col-lg-2 recent-col-2">
						<div id="recent-c2" style="overflow-y: scroll; max-height:570px;">
							<div style="background:#eee;width:100%;">
								<?php 
									if ( has_post_thumbnail() ) {
										the_post_thumbnail(array(165, 100), array('class'=>'img-responsive')); 
									}
								?>
							</div>
							<div class="title-article-small" style="border-bottom:1px solid #eee;margin-bottom:5px;">
								<a href="<?php the_permalink();?>"><?php the_title();?></a>
							</div>
					<?php
				}else if ((int) $listPosts->current_post >= 5 && (int) $listPosts->current_post <= 12)
				{
					?>
						<div class="title-article-small">
							<a href="<?php the_permalink();?>"><?php the_title();?></a>
						</div>
					<?php
				}
			} 
		}
		?>
			</div>
		</div>
		<div class="col-lg-4" style="border-left:1px solid #eee;">
			<?php get_template_part( 'general/adv','top'); ?>
		</div>
	</div>
</div>