<!DOCTYPE HTML>
<html lang="pl-PL">
        <head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		
		<link rel="icon" href="img/favicon.ico" sizes="16x16">
		
			<link href="../../css/style.css" rel="stylesheet" type="text/css" >
			
			<link rel="stylesheet" href="../../core/inc/simpleNotifyStyle.css">
			<script src="../../core/inc/simpleNotify.js"></script>

			<title>SKYNET</title>

</head>

<?php 

error_reporting( E_ALL );
session_start();

	$hidden = $_GET['input-h-id'];
	
		require "../../database/db-connect.php";
		
		$b = 'DELETE FROM `kanban` WHERE id="' . $hidden . '"';
		$zadanie = $db_PDO->query($b);
		
	
		
		header ('Location: kanban.php');

?>


