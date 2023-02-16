<?php
//借還書的後端程序

include ("configure.php");
$ID = $_GET["ID"];

if ($_COOKIE["user_name"] == "JOJO"){
	//還書
	// 建立與MySQL資料庫的連線
	$link = new PDO('mysql:host='.$hostname.';dbname='.$database.';charset=utf8', $username, $password);
	// 用SQL語法呼叫exec()

	//修改借書旗標
	$query_f = "UPDATE `book_list` SET `borrow_flag`= 0 WHERE `ID`='". $ID ."';";
	$link->exec($query_f);
	
	//新增一筆借閱紀錄
	$query_new_record = "DELETE FROM `records` WHERE `records`.`ID` = " . $ID . "";
	$link->exec($query_new_record);	
	
	//回上一頁
	header("Refresh:1;url=borrow_list.php");
}else {
	//借書
	// 建立與MySQL資料庫的連線
	$link = new PDO('mysql:host='.$hostname.';dbname='.$database.';charset=utf8', $username, $password);
	// 用SQL語法呼叫exec()

	//修改借書旗標
	$query_f = "UPDATE `book_list` SET `borrow_flag`= 1 WHERE `ID`='". $ID ."';";
	$link->exec($query_f);

	//新增一筆借閱紀錄
	$query_new_record = "INSERT INTO `Records` (`ID`,`user_n`,`borrow_date` ) VALUES ('". $ID ."','". $_COOKIE["user_name"] ."', curdate());";
	$link->exec($query_new_record);
	
	//回上一頁
	header("Refresh:1;url=elements.php");
}



?>