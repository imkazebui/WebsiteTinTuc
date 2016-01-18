<?php
get_header(); 
?>

	<div id="body-site">
		<div class="container">
		<?php if ( have_posts() ) : ?>
		<header class="category-title">
			<?php echo single_cat_title( '', false ); ?>
			
		</header>
		<?php endif;?>
		<div class="row">
			<div class="col-lg-8">
				<?php while( have_posts() ) : the_post(); ?>
				<div class="article-category row">
					<div class="col-lg-8 col-sm-12">
						<a href="<?php the_permalink(); ?>">
						<div class="article-category-image">
							<?php the_post_thumbnail('post-thumbnail', array('class'=>'img-responsive')); ?>
							
						</div>
						</a>
					</div>
					<div class="col-lg-4 col-sm-12">
						<a href="<?php the_permalink(); ?>">
						<div class="title-article">
								<?php the_title(); ?>
						</div>
						</a>
						<div class="article-category-description">
							<?php $content = strip_tags(get_the_content()); echo mb_strimwidth($content, 0, 150, '...');?>
							<a href="<?php the_permalink() ?>">Read more </a>
						</div>
					</div>
				</div>
				<?php endwhile; ?>
				
				<?php tintuc_paging_nav(); ?>
			</div>
			<div class="col-lg-4" style="border-left:1px solid #eee;">
				<?php get_template_part( 'general/adv','top'); ?>
				<?php get_template_part( 'general/most', 'view'); ?>
			</div>
		</div>
		</div>
	</div>

<?php
get_footer();
?>
