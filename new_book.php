<!DOCTYPE HTML>
<!--
	Phantom by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Elements - Phantom by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		<script type="text/javascript">
			/*$(document).ready(function(){
				$("#button").click(function(){
					if($("#bk_name").val()==""){
						alert("你尚未填寫姓名");
						eval("document.form1['bk_name'].focus()");       
					}else if($("#bk_vol").val()==""){
						alert("你尚未填寫電話");
						eval("document.form1['bk_vol'].focus()");    
					}else if($("#bk_author").val()==""){
						alert("你尚未填寫地址");
						eval("document.form1['bk_author'].focus()");       
					}else{
						document.form1.submit();
					}
				})
			})*/
		</script>
	</head>
	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper">
				<!-- Header -->
					<header id="header">
						<div class="inner">
							<!-- Logo -->
								<a href="javascript:void();" class="logo">
									<span class="symbol"><img src="images/logo.png" alt="" /></span><span class="title">White Books</span>
								</a>
							<!-- Nav -->
								<nav>
									<ul>
										<li><a href="#menu">Menu</a></li>
									</ul>
								</nav>

						</div>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<h2>Menu</h2>
						<ul>
							<?php
								//登入偵測
								if (isset($_COOKIE["user_name"])){
									echo "<li>您好，" . $_COOKIE["user_name"] . "</li>";
									echo "<li><a href=\"login.php\">登出</a></li>";
								}else {
									echo "<li><a href=\"login.php\">登入</a></li>";
								}
							?>
							<li><a href="index.php">主頁</a></li>
							<li><a href="elements.php">書籍清單</a></li>
							<?php
								//管理者偵測
								if (isset($_COOKIE["user_name"])){
									if ($_COOKIE["user_name"] == "JOJO"){
										echo "<li class=\"current_page_item\"><a href=\"borrow_list.php\">當前出借書籍清單</a></li>";
										echo "<li class=\"current_page_item\"><a href=\"javascript:void(0);\">新增書本</a></li>";
									}
								}
							?>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
						<div class="inner">
							<h1>新增書本</h1>
							<!-- Form -->
							<section>
								<form id="form1" name="form1" method="post" action="add_book.php"  enctype="multipart/form-data">
									<div class="row gtr-uniform">
										<div class="col-6 col-12-xsmall">
											<input type="text" name="bk_name" id="bk_name" value="" placeholder="Name" />
										</div>
										<div class="col-6 col-12-xsmall">
											<input type="text" name="bk_vol" id="bk_vol" value="" placeholder="vol" />
										</div>
										<div class="col-6 col-12-xsmall">
											<input type="text" name="bk_author" id="bk_author" value="" placeholder="author" />
										</div>
										<div class="col-6 col-12-xsmall">
											<input type="text" name="bk_dec" id="bk_dec" value="" placeholder="description" />
										</div>
										<div class="col-12">
											請匯入欲上傳的圖檔(限JPG, GIF或PNG檔)：<input type="file" name="my_file"><br>									
											<br><br>
										</div>
										<!--div class="col-12">
											<select name="demo-category" id="demo-category">
												<option value="">- Category -</option>
												<option value="1">Manufacturing</option>
												<option value="1">Shipping</option>
												<option value="1">Administration</option>
												<option value="1">Human Resources</option>
											</select>
										</div>
										<div class="col-4 col-12-small">
											<input type="radio" id="demo-priority-low" name="demo-priority" checked>
											<label for="demo-priority-low">Low</label>
										</div>
										<div class="col-4 col-12-small">
											<input type="radio" id="demo-priority-normal" name="demo-priority">
											<label for="demo-priority-normal">Normal</label>
										</div>
										<div class="col-4 col-12-small">
											<input type="radio" id="demo-priority-high" name="demo-priority">
											<label for="demo-priority-high">High</label>
										</div>
										<div class="col-6 col-12-small">
											<input type="checkbox" id="demo-copy" name="demo-copy">
											<label for="demo-copy">Email me a copy</label>
										</div>
										<div class="col-6 col-12-small">
											<input type="checkbox" id="demo-human" name="demo-human" checked>
											<label for="demo-human">Not a robot</label>
										</div>
										<div class="col-12">
											<textarea name="demo-message" id="demo-message" placeholder="Enter your message" rows="6"></textarea>
										</div-->
										<div class="col-12">
											<ul class="actions">
												<li><input type="submit" name="button" id="button" value="新增" class="primary large" /></li>
												<li><input type="reset" value="清空" class="large"/></li>
											</ul>
										</div>
									</div>
								</form>
							</section>
						</div>
					</div>

				<!-- Footer -->
					<footer id="footer">
						<div class="inner">
							<ul class="copyright">
								<li>&copy; Untitled. All rights reserved</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
							</ul>
						</div>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>