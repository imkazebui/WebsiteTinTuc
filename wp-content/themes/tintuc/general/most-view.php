
<div class="most-view panel panel-default">
<h1> Đọc nhiều nhất </h1>
<?php //nếu là trang chủ thì lấy đọc nhiều nhất tất cả chuyên mục ?>
<?php if (is_home()) :?>
<?php if($most_views = get_most_viewed()){
	$count = 1;
	foreach($most_views as $post){
?>
		<a href="<?php echo esc_url($post->guid); ?>"><p class="most-view-item"><?php echo $post->post_title." (".$post->views." lượt xem) "; ?><span class="badge" style="font-size:25px; border-radius:25px;"><?php echo $count++; ?></span></p></a>
<?php
	}
} 
?>
<?php // nếu là trang category thì lấy đọc nhiều nhất ở riêng 1 chuyên mục ?>
<?php elseif(is_category()) : ?>
<?php if($most_views = get_most_viewed()){
	$count = 1;
	foreach($most_views as $post){
?>
		<a href="<?php echo esc_url($post->guid); ?>"><p class="most-view-item"><?php echo $post->post_title." (".$post->views." lượt xem) "; ?><span class="badge" style="font-size:25px; border-radius:25px;"><?php echo $count++; ?></span></p></a>
<?php
	}
} 
?>
<?php endif; ?>
</div>

