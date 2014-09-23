<!DOCTYPE html>
<?php
	session_start();
	$host = "http://". $_SERVER['HTTP_HOST'] ."/clockhourz";
	/*require_once "$host/assets/connection.php";*/
	mysql_connect("", "", "") or die(mysql_error());
	mysql_select_db("") or die(mysql_error());
	if (strtolower($_SERVER['REQUEST_URI']) != "/clockhourz/index.php" && empty($_SESSION['user'])) {
		header("location: index.php");
	}
	elseif (strtolower($_SERVER['REQUEST_URI']) == "/clockhourz/index.php" && !empty($_SESSION['user'])) {
		header("location: home.php");
	}
 ?>
<html>
	<head>
		<title>ClockHourz</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<meta name="HandheldFriendly" content="true" />
	    
	    <link rel="stylesheet" href="<?php echo $host ?>/assets/css/bootstrap.css" media="screen">	
	    <link rel="stylesheet" href="<?php echo $host ?>/assets/css/bootswatch.min.css">
	    <link rel="stylesheet" href="<?php echo $host ?>/assets/css/style.css">

	    <link rel="apple-touch-icon-precomposed" href="<?php echo $host ?>/assets/img/clock.png"/>
	    <link rel="icon" type="image/png" href="<?php echo $host ?>/assets/img/clock.png" />
	    <meta name="mobile-web-app-capable" content="yes">

	    <meta property="og:title" 		content="ClockHourz"/>
 		<meta property="og:type" 		content="website"/>
 		<meta property="og:url" 		content="http://stefankoolen.nl/clockhourz/index.php"/>
 		<meta property="og:image" 		content="<?php echo $host ?>/assets/img/clock.png"/>
 		<meta property="og:site_name" 	content="ClockHourz"/>
 		<meta property="og:description" content='<?php echo "Met deze mobiele applicatie beheer als werknemer gemakkelijk je gewerkte uren.\nOntwikkeld voor Stefan Koolen."; ?>'/>

    	<script src="<?php echo $host ?>/assets/js/script.js"></script>

	</head>
	<body>