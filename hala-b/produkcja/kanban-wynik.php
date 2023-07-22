<!DOCTYPE HTML>
<html lang="pl-PL">
        <head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		
		<link rel="icon" href="img/favicon.ico" sizes="16x16">
		
			<link href="../../css/style.css" rel="stylesheet" type="text/css" >

			<title>SKYNET</title>

</head>
<div class="kanban-wynik-out">


<?php 
error_reporting( E_ALL );
session_start();

	$nazwa = $_SESSION['nazwa'];
	$kod = $_SESSION['kod'];
	$versja = $_SESSION['versja'];
	$typ = $_POST['typ'];
	$ilosc = $_POST['input-number'];
	
		require "../../database/db-connect.php";
		
		$a = "SELECT * FROM `wszystkie-detale` WHERE kod='$kod'";
		$zadanie = $db_PDO->query($a);
		$wiersz = $zadanie->fetch();
	
		
		$b = "INSERT INTO `kanban`(`nazwa`, `kod`, `versja`, `typ`, `ilosc`) VALUES ('$nazwa','$kod','$versja','$typ','$ilosc')";
		$zadanie2 = $db_PDO->query($b);
		
		$_SESSION['alert'] ='<div class="alert">DODANO</div>';
		
		header ('Location: kanban.php');

?>


