-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 資料庫: `My_library`
--
CREATE DATABASE `My_library` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `My_library`;

-- --------------------------------------------------------

--
-- 資料表格式： `user`,
--
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` VARCHAR(128) NOT NULL unique,	
  `user_p` VARCHAR(128) NOT NULL,	
  `user_n` VARCHAR(128) NOT NULL,
  PRIMARY KEY (`user_n`)
);

--
-- 列出以下資料庫的數據： `user`
--
INSERT INTO `user` (`user_id`,`user_p`,`user_n` ) VALUES ('ABC123','ABC123','JOJO');
INSERT INTO `user` (`user_id`,`user_p`,`user_n` ) VALUES ('666','666','bits');

--
-- 資料表格式： `book_list`,
--
CREATE TABLE IF NOT EXISTS `book_list` (
  `ID` int NOT NULL unique AUTO_INCREMENT,
  `bk_name` VARCHAR(128) NOT NULL,
  `bk_vol` VARCHAR(128) NOT NULL,
  `bk_author` VARCHAR(128) NOT NULL,	
  `bk_pic` VARCHAR(128) NOT NULL,	
  `bk_dec` VARCHAR(1024) NOT NULL,
  `borrow_flag` int default '0',
  PRIMARY KEY (`ID`)
);

--
-- 列出以下資料庫的數據： `book_list`
--
INSERT INTO `book_list` (`bk_name`,`bk_vol`,`bk_author`,`bk_pic`,`bk_dec` ) VALUES ('安達與島村','1','入間人間','00001.jpg','高一女學生安達與島村是好朋友，她們總是膩在一起聊天，偶爾打桌球，培育著名為友情的情感。然而某天夜晚，安達夢見自己和島村接吻，因此意識到了一份不一樣的情感!?過著日常生活的女高中生──安達與島村。這一天，彼此的關係稍微起了改變。');
INSERT INTO `book_list` (`bk_name`,`bk_vol`,`bk_author`,`bk_pic`,`bk_dec` ) VALUES ('安達與島村','2','入間人間','00002.jpg','安達至今都對聖誕禮物沒有興趣。但今年不一樣。安達第一次希望得到的聖誕禮物，是跟島村一起度過聖誕節。島村過去每一年的聖誕節都是渾渾噩噩地度過。她也不是非常關心聖誕節這個節日。但今年不一樣。島村總覺得必須要稍微花點心思，去挑選要送給安達的聖誕禮物才行。過著一成不變的日常生活的女高中生──安達與島村。兩人的關係稍稍產生變化。');
INSERT INTO `book_list` (`bk_name`,`bk_vol`,`bk_author`,`bk_pic`,`bk_dec` ) VALUES ('安達與島村','3','入間人間','00003.jpg','二月四日，情人節的十天前。放學後和安達一起去購物中心。而在甜甜圈店前，她開口問：「十四日……島村有要……做什麼嗎？」「是沒有。」「沒有的話，我想說那天要不要一起去玩……」她不只是鼻頭，連手背都變得一片通紅。對安達的決心和覺悟心感佩服的我如此回答：「好啊，今年就來過情人節吧。」二月十四日來臨前的十個日子。令安達心驚膽跳的這十天，為島村的日常生活增添了些許色彩。這就是描述她們兩人的故事。');
INSERT INTO `book_list` (`bk_name`,`bk_vol`,`bk_author`,`bk_pic`,`bk_dec` ) VALUES ('安達與島村','4','入間人間','00004.jpg','時間來到櫻花綻放的季節，我也順利和島村同班了。
不過，島村現在會和坐附近的女同學一起吃午餐……
我不太喜歡這樣。我該怎麼辦才好呢？

某天午休，我座位附近的女生小團體跑來跟我搭話。
我下意識地看向安達，她卻在和我對上眼的時候把頭撇向一旁。
我在加入小團體後又看了一下安達，發現她已經獨自離開教室了。
明明我也是要去買麵包，可以一起走的啊。
算了，能在路上找到她就好了。

要和島村重修舊好的話……對了，就去她家住吧！');
INSERT INTO `book_list` (`bk_name`,`bk_vol`,`bk_author`,`bk_pic`,`bk_dec` ) VALUES ('安達與島村','5','入間人間','00005.jpg','暑假就不能見到島村了……我有太多想和她一起做的事了。
像是去祭典、去游泳池游泳、一起吃冰等等……
對了，來做一張想做的事情清單吧！
我寫我寫我寫我寫……

暑假是個很棒的東西。
要說哪裡棒，就是早上不用逼自己起床。
可是這個時期沒有事做，感覺時間過得很慢。
不知道安達在做什麼呢？在打工嗎？
喔，有電話。煙火大會？是可以去啦——

安達與島村的暑假——
和去年有些不同的高二暑假即將開始。');

--
-- 資料表格式： `Records`,
--
CREATE TABLE IF NOT EXISTS `Records` (
  `ID` int NOT NULL unique,
  `user_n` VARCHAR(128) NOT NULL,
  `borrow_date` date,
  FOREIGN KEY(`ID`) REFERENCES book_list(`ID`),
  FOREIGN KEY(`user_n`) REFERENCES user(`user_n`)
);

--
-- 列出以下資料庫的數據： `Records`
-- INSERT INTO `Records` (`ID`,`user_n`,`borrow_date` ) VALUES ('1','JOJO', curdate());
--