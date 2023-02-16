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
	$user_id = isset($_POST["user_id"]) ? $_POST["user_id"]:"";
	$user_p = isset($_POST["user_p"]) ? $_POST["user_p"]:"";
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
						<h1>登入</h1>
						<!-- Form -->
						<section>
							<form method="post" action="">
								<div class="row gtr-uniform">
									<div class="col-12">
										<input type="text" name="user_id" value="" placeholder="帳號" />
									</div>
									<div class="col-12">
										<input type="password" name="user_p" value="" placeholder="密碼" />
									</div>
									<div class="col-4 col-12-xsmall">
										<ul class="actions">
											<li><input type="submit" value="登入" class="primary fit" /></li>
										</ul>
									</div>
									<div class="col-4 col-12-xsmall">
										<ul class="actions">
											<li><input type="reset" value="清除" class="fit" /></li>
										</ul>
									</div>
									<div class="col-4 col-12-xsmall">
										<ul class="actions">
											<li><button type="button" class="fit" onclick="location.href='register.php'">註冊</button></li>
										</ul>
									</div>
								</div>
							</form>
						</section>
						<?php
							if (($user_id != NULL)&&($user_p != NULL)){
								// 建立與MySQL資料庫的連線
								$link = new PDO('mysql:host='.$hostname.';dbname='.$database.';charset=utf8', $username, $password);
								// 用SQL語法呼叫exec()
								$query = "SELECT * FROM `user` WHERE `user_id`='". $user_id ."' and `user_p`='". $user_p ."'";
								$result = $link->query($query);
								$row=$result->fetch();
								if ($row){
									if ($user_id==$row["user_id"] && $user_p==$row["user_p"]){
										echo "<div align=\"center\">";
										echo "<h2>"."登 入 成 功"."</h2>";
										echo "</div>";
										//製造餅乾
										Setcookie("user_name", $row["user_n"], time()+3600);
										//三秒後重新載入用戶頁面
										header("Refresh:2;url=index.php");
									}else {
										echo "<div align=\"center\">";
										echo "<h2>"."大 小 寫 錯 誤"."</h2>";
										echo "</div>";
										//三秒後重新載入此頁面
										echo "
										<script>
											setTimeout(
												function(){
													window.location.href='login.php';
												},2000);
										</script>";
									}
								}else{
									echo "<div align=\"center\">";
									echo "<h2>"."無 此 帳 密"."</h2>";
									echo "</div>";
									//三秒後重新載入此頁面
									echo "
									<script>
										setTimeout(
											function(){
												window.location.href='login.php';
											},2000);
									</script>";
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