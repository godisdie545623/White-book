<!DOCTYPE HTML>
<!--
	Phantom by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php
include ("configure.php");
$ID = $_GET["ID"];
?>
<html>
	<head>
		<title>Book page</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		
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
							<?php
								// 建立與MySQL資料庫的連線
								$link = new PDO('mysql:host='.$hostname.';dbname='.$database.';charset=utf8', $username, $password);
								// 用SQL語法呼叫exec()
								$query = "SELECT * FROM `book_list` WHERE `ID`=".$ID."";
								$result = $link->query($query);
								$row = $result->fetch();
							?>
							<h1><?php echo $row["bk_name"];?></h1>
							<span class="image left"><img src="images/<?php echo $row["bk_pic"];?>" /></span>
							<p><?php echo $row["bk_dec"];?></p>
						</div>
						<br><br>
						<input type ="button" onclick="history.back()" value="回到上一頁" class="fit"></input>
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