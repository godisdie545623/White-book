<!DOCTYPE HTML>
<!--
	Phantom by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php
include ("configure.php");
?>

<html>
	<head>
		<!--網站追蹤 (Google Analytics 分析)-->
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-93ZJKJPD9F"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			gtag('config', 'G-93ZJKJPD9F');
		</script>
		<title>White Books</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		
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
							<li><a href="javascript:void(0);">主頁</a></li>
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
							<header>
								<h1>這是一個白白用來管理書籍的網站</h1>
								<div class="row">
									<div class="col-6 col-12-medium">
										<h3>規則只有以下兩條：</h3>
										<ol>
											<li>有借有還，再借不難</li>
											<li>禁止損毀或弄丟，若不慎發生了，請還我一本一模一樣的ouo</li>
										</ol>
									</div>
								</div>
							</header>
							<section class="tiles">
								<!--隨機取四本書做預覽-->
								<?php
									// 建立與MySQL資料庫的連線
									$link = new PDO('mysql:host='.$hostname.';dbname='.$database.';charset=utf8', $username, $password);
									// 用SQL語法呼叫exec()
									$query = "SELECT * FROM `book_list` ORDER BY rand() LIMIT 4";
									$result = $link->query($query);
									//將讀出的資料照著模板格式顯示
									foreach ($result as $row){
										echo "<article class=\"style".rand(1,6)."\">";
										echo "<span class=\"image\">
											<img src=\"images/".$row["bk_pic"]."\"/>
										</span>";
										echo "<a href=\"generic.php?ID=".$row["ID"]."\">
											<h2>" . $row["bk_name"] . $row["bk_vol"] . "</h2>
											<div class=\"content\">
												<p>作者:".$row["bk_author"]."</p>
											</div>
										</a>";
										echo "</article>";
									}
								?>
							</section>
						</div>
					</div>

				<!-- Footer -->
					<footer id="footer">
						<div class="inner">
							<!--模板的版權說明-->
							<ul class="copyright">
								<li>&copy; Untitled. All rights reserved</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
							</ul>
						</div>
					</footer>

			</div>

		<!-- 模板Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
	</body>
</html>