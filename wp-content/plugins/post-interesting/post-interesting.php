<?php /*
Plugin Name: Post Interesting
Description: Post duoc quan tam nhat
Version: 1.0
Author: Thieu Quang Vinh
Text Domain: post-interesting
*/

if ( ! defined( 'ABSPATH' ) )
	exit;
add_action( 'wp_head', 'process_post_interesting' );
function process_post_interesting() {
	global $user_ID, $post;
	if( is_int( $post ) ) {
		$post = get_post( $post );
		
	}
	if( !wp_is_post_revision( $post ) ) {
		if(is_single()){
			$id = intval( $post->ID );
			if (! $post_views = get_post_meta( $id, 'pi_views', true ) ){
				$post_views = 0;
			}
			//echo "Lượt xem: ".($post_views +1);
			update_post_meta( $id, 'pi_views', ($post_views+1) );
			update_post_meta( $id, 'pi_month', intval(date('m')));
			update_post_meta( $id, 'pi_year', intval(date('Y')));
		}
	}
}

### Function: Display Most Viewed Page/Post
if(!function_exists('get_most_viewed')) {
	function get_most_viewed($limit = 10) {
		global $wpdb;
		$most_viewed = $wpdb->get_results("SELECT DISTINCT $wpdb->posts.*, (meta_value+0) AS views FROM $wpdb->posts LEFT JOIN $wpdb->postmeta ON $wpdb->postmeta.post_id = $wpdb->posts.ID WHERE post_status = 'publish' AND meta_key = 'pi_views' ORDER BY views DESC LIMIT $limit;");
		//var_dump($most_viewed);
		if($most_viewed){
			return $most_viewed;
		}
		return false;
	}
}

### Function: Display Most Viewed Page/Post By Category ID
if(!function_exists('get_most_recent_by_category_id')) {
	function get_post_by_category_id( $category_id, $limit = 1 ) {
		$args = array(
			'posts_per_page'   => $limit,
			'category'         => $category_id,
			'orderby'          => 'date',
			'order'            => 'DESC'
		);
		return get_posts($args);
	}
}
### Function: Display Post Related By Category ID
if(!function_exists('get_post_related')) {
	function get_post_related($post_id, $limit = 3){
		$category_id = get_the_category($post_id)[0]->term_id;
		
		$args = array(
			'posts_per_page'   => ($limit+1),
			'category'         => $category_id,
			'orderby'          => 'date',
			'order'            => 'DESC'
		);
		
		$posts = get_posts($args);
		$count = 0;
		$output = array();
		foreach($posts as $post){
			if($post->ID != $post_id)
			{
				$output[] = $post;
				$count++;
				if($count == $limit)
					return $output;
			}
		}
		return false;
	}
}
	
### Function: Display 3 Post Most Recent Excepted Category ID
if(!function_exists('get_most_3_recent_except_category_id')) {
	function get_most_3_recent_except_category_id($category_id) {
		$array_n = array();
		$terms = get_terms('category' );
		while(1){
			$n = rand(0, count($terms)-1);
			if($terms[$n]->term_id == $category_id)
			{
				continue;
			}else{
				$flag = false;
				for($i = 0; $i < count($array_n); $i++){
					if($terms[$n]->term_id == $array_n[$i]){
						$flag = true;
						break;
					}
				}
				if(!$flag)
				{
					$array_n[] = intval($terms[$n]->term_id);
					if(count($array_n) == 3)
						break;
				}
			}
		}
		$articles = array();
		$articles[] = get_post_by_category_id($array_n[0])[0];
		$articles[] = get_post_by_category_id($array_n[1])[0];
		$articles[] = get_post_by_category_id($array_n[2])[0];
		
		return $articles;
	}
}
	
?>
