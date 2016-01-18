<?php
add_theme_support( 'post-thumbnails' ); 

if (function_exists('register_nav_menus'))
{
	register_nav_menus(array('primary'=>'Header Navigation'));
}

// Enqueue script and style
function tintuc_scripts()
{
	if (!is_admin())
	{
		wp_deregister_script('jquery'); 
		wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"), false); 
		wp_enqueue_script('jquery'); 
	}
	wp_enqueue_script( 'nice-scroll', get_stylesheet_directory_uri() . '/js/jquery.nicescroll.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'bootstrap-js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ) );
	wp_enqueue_style('bootstrap-css', get_template_directory_uri(). '/css/bootstrap.min.css');
	wp_enqueue_style('main-theme', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'tintuc_scripts');


// Add class img-responsive to image of the-content
function add_responsive_class($content){

        $content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
        $document = new DOMDocument();
        libxml_use_internal_errors(true);
        $document->loadHTML(utf8_decode($content));

        $imgs = $document->getElementsByTagName('img');
        foreach ($imgs as $img) {           
           $img->setAttribute('class','img-responsive');
        }

        $html = $document->saveHTML();
        return $html;   
}

add_filter ('the_content', 'add_responsive_class');

function my_theme_comment($comment, $args, $depth){
	$GLOBALS['comment'] = $comment;
    switch( $comment->comment_type ) :
        default : ?>
            <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
				<p class="meta-comment">
				 <?php echo get_avatar( $comment, 30 ); ?>
				 <span class="author-name"><?php comment_author(); ?></span>
					<time <?php comment_time( 'c' ); ?> class="comment-time">
					<span class="date">
						<?php comment_date(); ?>
					</span>
					<span class="time">
						<?php comment_time(); ?>
					</span>
					</time>
				 
				</p>
				<div class="comment-content">
					<?php comment_text(); ?>
				</div>
				<div class="comment-actions">
					<div class="reply"><?php 
						comment_reply_link( array_merge( $args, array( 
						'reply_text' => 'Reply',
						'after' => '', 
						'depth' => $depth,
						'max_depth' => $args['max_depth'] 
						) ) ); ?>
					</div><!-- .reply -->
				</div>
 
 
            <!-- #comment-<?php comment_ID(); ?> -->
        <?php // End the default styling of comment
        break;
    endswitch;
}



// Remove li class in navbar
add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
function my_css_attributes_filter($var) {
  return is_array($var) ? array() : '';
}
// ----

if ( ! function_exists( 'twentythirteen_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since Twenty Thirteen 1.0
 */
function tintuc_paging_nav() {
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<div class="nav-links">
			<?php if ( get_next_posts_link() ) : ?>
			<center><div class="nav-previous pull-right btn btn-lg btn-primary"><?php next_posts_link( "Tin cũ hơn" ) ; ?></div></center>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<center><div class="nav-next btn pull-left btn-lg btn-primary"><?php previous_posts_link( "Tin mới hơn" ) ; ?></div></center>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

?>