<?php


get_header(); ?>
  <style>
    .err_body{
      border: 1px solid #ddd;
      padding: 40px 20px 50px;
      border-radius: 10px;
      text-align: center;
      width: 60%;
      margin-left: 260px;
	  font-size:16px;
    }
    .tittle{
      font-size: 2em;
      line-height: 1.2;
      letter-spacing: -1px;
      color: #0099cc;
      text-transform: uppercase;
      font-weight: bold;
	  padding-bottom: 20px;
    }
  </style>
	<div id="primary" class="content-area">
			<div class="err_body">
        <h1 class="tittle">Không tìm thấy trang bạn cần tìm</h1>
        <p>Rất tiếc trang web bạn cần tìm không tồn tại hoặc có thể đã được chuyển sang địa chỉ khác.</p>    
		<p>Quay về trang chủ click vào <a href="<?php echo home_url( '/' ); ?>">đây.</a></p>
      </div>

	</div><!-- .content-area -->

<?php get_footer(); ?>
