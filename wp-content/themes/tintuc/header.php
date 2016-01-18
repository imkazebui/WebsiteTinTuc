<!DOCTYPE html>
<html>
<head>
	<title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<?php wp_head(); ?>
	<script type="text/javascript" src="http://arrow.scrolltotop.com/arrow64.js"></script>
	<noscript>Not seeing a <a href="http://www.scrolltotop.com/">Scroll to Top Button</a>? Go to our FAQ page for more info.</noscript>
	<script type="text/javascript">
		$(document).ready(function() {    
			$("#recent-c2").niceScroll();
		});
		
	</script>
	

</head>
<body>
<div class="wrapper">
	<!-- Header -->
	<!-- nav search,logo,banner -->
	<div class="only-dekstop">
		<nav class="nav-topmost">
			<div class="container">
				<div class="clearfix">

					<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
					<div class="pull-left">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php echo get_stylesheet_directory_uri()."/img/logo.png"; ?>" />
					</a>
					</div>
					<div class="pull-right search-button">
						<input type="submit" value="Tìm kiếm" class="form-control" style="background:#FCAA11;"/>
					</div>
					<div class="pull-right search-box">
					
						<input type="search" value="<?php echo get_search_query() ?>" name="s" placeholder="Nhập nội dung cần tìm" class="form-control" />
					
					</div>
					</form>
				</div>
			</div>
		</nav>
		<div class="container">
			<div class="banner-top"><img src="<?php echo get_stylesheet_directory_uri()."/img/top.jpg"; ?>"></div>
		</div>
	</div>
	<!--navigation-->
	<div class="container">
		<header>
		<div id="header-site">
			<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigationbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					
				</div>
				<div class="collapse navbar-collapse" id="navigationbar">
					<ul class="nav navbar-nav">
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><i class="glyphicon glyphicon-home"></i></a></li>
						<?php 
							$defaults = array(
								'container'=> false,
								'menu_class'=> false,
								'items_wrap' => '%3$s',
							);
							wp_nav_menu($defaults);
						?>
						
					</ul>
				</div>
			</nav><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
		</header>
	</div>
	<!-- End Header -->