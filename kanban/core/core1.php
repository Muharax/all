<?php 

require('../../../session.php');

if(!empty($_GET['kod'])){
	if(!empty($_GET['numer'])){
		$kod = $_GET['kod'];
		$ilosc = $_GET['numer'];
		$nazwa = $_GET['input-name'];
		require_once "../../../database/db-connect.php";
		$a = "INSERT INTO `aktywne produkcje`(
							`kod`, 
							`ilosc`,
							`nazwa`) 
						VALUES ('$kod',
								 '$ilosc',
								 '$nazwa')";
		$zadanie = $db_PDO->query($a);
		
		$_SESSION['dodano'] = '<div id="dodano">SEKWENCJA ZOSTAŁA <font color="#02ff00">DODANA</font></div>';
		header('Location: ../sekwencja-produkcji.php');
		
	}else{
	$_SESSION['dodano'] = '<div id="dodano">NIE WPROWADZONO <font color="yellow">ILOSCI</font></div>';
	header('Location: ../sekwencja-produkcji.php');
	}}else{
	$_SESSION['dodano'] = '<div id="dodano">NIEWYBRANO WERSJI</div>';
	header('Location: ../sekwencja-produkcji.php');
	}
	






?>