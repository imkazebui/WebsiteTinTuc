<?php
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	<header class="header-comment">
		<h2>BÌNH LUẬN</h2>
		<?php 
			$fields =  array(
			  'author' => '<input name="author" id="author" class="form-control" placeholder="Tên của bạn..." />',
			  'email' => '',
			  'url' => ''
			);
			$comments_args = array(
				'label_submit'=>'Gửi bình luận',
				'title_reply'=>'',
				'comment_notes_before' => '',
				 'class_submit'      => 'form-control',
				'comment_notes_after' => '',
				'comment_field' => '<textarea id="comment" name="comment" class="form-control" placeholder="Ý kiến của bạn..." aria-required="true"></textarea>',
				'fields' => apply_filters( 'comment_form_default_fields', $fields ),
			);
		?>
		<?php if ( have_comments() ) : ?>
		<ul class="comment-list">
			<?php
				wp_list_comments( array(
					'callback' => 'my_theme_comment'
				) );
			?>
		</ul><!-- .comment-list -->
			
		<?php endif; ?>
		<?php comment_form($comments_args); ?>
		<?php //comment_form(); ?>
	</header>

</div><!-- .comments-area -->
