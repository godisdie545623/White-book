<!DOCTYPE HTML>
<!--
	Phantom by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php
	//清除cookie
	Setcookie("user_name", "", time()-86400);
	
	include ("configure.php");
	$in_user_id = isset($_POST["in_user_id"]) ? $_POST["in_user_id"]:"";
	$in_user_p = isset($_POST["in_user_p"]) ? $_POST["in_user_p"]:"";
	$in_user_p_2 = isset($_POST["in_user_p_2"]) ? $_POST["in_user_p_2"]:"";
	$in_user_n = isset($_POST["in_user_n"]) ? $_POST["in_user_n"]:"";
?>
<html>
	<head>
		<title>Login</title>
		<meta charset="utf-8" />
		
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		
		<script type="text/javascript">
			
		</script>
		
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
									echo "<li class=\"current_page_item\"><a href=\"new_book.php\">新增書本</a></li>";
								}
							}
						?>
					</ul>
				</nav>
				<!-- Main -->
				<div id="main">
					<div class="inner">
						<h1>註冊</h1>
						<!-- Form -->
						<section>
							<form method="post" action="">
								<div class="row gtr-uniform">
									<div class="col-12">
										<input type="text" name="in_user_id" placeholder="帳號" />
									</div>
									<div class="col-12">
										<input type="password" name="in_user_p" placeholder="密碼" />
									</div>
									<div class="col-12">
										<input type="password" name="in_user_p_2" placeholder="再次輸入密碼" />
									</div>
									<div class="col-12">
										<input type="text" name="in_user_n" placeholder="暱稱" />
									</div>
									<div class="col-4 col-12-xsmall">
										<ul class="actions">
											<li><input type="submit" value="註冊" class="primary fit" /></li>
										</ul>
									</div>
									<div class="col-4 col-12-xsmall">
										<ul class="actions">
											<li><input type="reset" value="清除" class="fit" /></li>
										</ul>
									</div>
									<div class="col-4 col-12-xsmall">
										<ul class="actions">
											<li><input type ="button" onclick="history.back()" value="回上頁" class="fit"></input></li>
										</ul>
									</div>
								</div>
							</form>
						</section>
						<?php
							if ($in_user_id != NULL && $in_user_p != NULL && $in_user_n != NULL){
								// 建立與MySQL資料庫的連線
								$link = new PDO('mysql:host='.$hostname.';dbname='.$database.';charset=utf8', $username, $password);
								// 用SQL語法呼叫exec()
								$query = "INSERT INTO `user` (`user_id`,`user_p`,`user_n` ) VALUES ('". $in_user_id ."','". $in_user_p ."','". $in_user_n ."');";
								if ($in_user_p === $in_user_p_2){
									$reslut=$link->exec($query);
									if (!$reslut){
										echo "<div align=\"center\">";
										echo "<h2>"."錯   誤"."</h2><br>";
										echo "<h2>"."已 註 冊 過 之 帳 號 或 暱 稱"."</h2>";
										echo "</div>";
										header("Refresh:2;url=register.php");
									}else {
										echo "<div align=\"center\">";
										echo "<h2>"."註 冊 成 功"."</h2>";
										echo "</div>";
										header("Refresh:2;url=login.php");
									}
								}else {
									echo "<div align=\"center\">";
									echo "<h2>"."密 碼 錯 誤"."</h2>";
									echo "</div>";
									header("Refresh:2;url=register.php");
								}								
							}
						?>
					</div>
				</div>

				<br><hr>
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