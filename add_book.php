<?php
	include ("configure.php");
	$bk_name = isset($_POST["bk_name"]) ? $_POST["bk_name"]:"";
	$bk_vol = isset($_POST["bk_vol"]) ? $_POST["bk_vol"]:"";
	$bk_author = isset($_POST["bk_author"]) ? $_POST["bk_author"]:"";
	$bk_dec = isset($_POST["bk_dec"]) ? $_POST["bk_dec"]:"";
	
	//檢查檔案室否上傳成功
	if (isset($_FILES["my_file"]["name"]) && ($_FILES["my_file"]["type"] == "image/jpg" || $_FILES["my_file"]["type"] == "image/gif" || $_FILES["my_file"]["type"] == "image/png" || $_FILES["my_file"]["type"] == "image/jpeg")){
		$file = $_FILES['my_file']['tmp_name'];
		$dest = "images/" . $_FILES['my_file']['name'];
		
		move_uploaded_file($file, $dest);
		$bk_pic = $_FILES["my_file"]["name"];
	}
	
	// 建立與MySQL資料庫的連線
	$link = new PDO('mysql:host='.$hostname.';dbname='.$database.';charset=utf8', $username, $password);
	// 用SQL語法呼叫exec()
	
	//新增書本
	$query_add = "INSERT INTO `book_list` (`bk_name`,`bk_vol`,`bk_author`,`bk_pic`,`bk_dec` ) VALUES ('" . $bk_name . "','" . $bk_vol . "','" . $bk_author . "','" . $bk_pic . "','" . $bk_dec . "');";
	$link->exec($query_add);
	
	//回上一頁
	header("Refresh:1;url=elements.php");
?>