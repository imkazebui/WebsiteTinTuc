<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div id="primary-single" class="container">
		<div class="row">
			<div class="col-lg-8">

					<?php /* The loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>
					<div class="main-content">
					<?php get_template_part( 'content', get_post_format() ); ?>
					</div>
					<?php comments_template(); ?>
					<?php get_template_part( 'general/post', 'related' ); ?>
					<?php endwhile; ?>
				
			</div>
			<div class="col-lg-4" style="border-left:1px solid #eee;">
				<?php get_template_part( 'general/adv','top'); ?>
				<?php get_template_part( 'general/may', 'interesting' ); ?>
			</div>
		</div><!-- #content -->
	</div><!-- #primary -->
	
	
<?php get_footer(); ?>