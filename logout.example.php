<?php
	mysql_connect("", "", "") or die(mysql_error());
	mysql_select_db("") or die(mysql_error());
	session_start();
	mysql_query("DELETE FROM `user_session` WHERE `user_session`.`hash` = '". $_COOKIE['user_session'] ."'") or die(mysql_error());
	$_SESSION['user'] = "";
	setcookie("user_session", "", time()-3600);
	header("location: index.php");
?>