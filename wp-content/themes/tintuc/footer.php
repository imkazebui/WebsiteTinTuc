 <!-- quang cao ngang -->
 <!-- footer -->
	<div class="container">
		<div id="section_banner" class="row" style="margin-top:20px;">
			<div class="col-lg-12">
				<div>
					<img src="<?php echo get_stylesheet_directory_uri()."/img/bottom.jpg"; ?>">
				</div>
			</div>
		</div>
		<!-- footer -->
		<div id="section_footer" class="row" style="margin-top:40px;">
			<div id="footer">
				<div class="container" <div="">
						<div style="margin-bottom: 20px;" class="col-sm-12 text-center">
							<ul class="list-inline">
								<?php 
									$defaults = array(
										'container'=> false,
										'menu_class'=> false,
										'items_wrap' => '%3$s'
									);
									wp_nav_menu($defaults);
								?>
							</ul>
							<p>Thông tin địa chỉ trang web, bản quyền</p>
						</div>
					</div>
				</div>
		</div>
	</div>
</div>
 <!-- END OF THEME -->

 <?php wp_footer(); ?>
</body>
</html>