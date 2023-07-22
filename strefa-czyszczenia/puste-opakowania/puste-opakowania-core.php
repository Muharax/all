<?php 
	require ('../database/db-connect.php');
	session_start();
	$pojemnik_core = $_POST['pojemnik-core'];
	$ilosc = $_POST['m9-ilosc'];
	$ilosc_podwozi = $_POST['m9-podwozia'];
	$priorytet = $_POST['priorytet'];
	if(empty($priorytet)){
		$priorytet = "normalny";
	}
	$czas = date("Y-m-d G:i:s");
	$user = $_SESSION['user'];
	
	
		$a = "INSERT INTO `opakowania`(`nazwa_opakowania`, `ilosc`, `ilosc_podwozi`, `priorytet`, `czas`, `pracownik`) 
				VALUES ('$pojemnik_core','$ilosc','$ilosc_podwozi','$priorytet','$czas','$user')";
		$zadanie = $db_PDO->query($a);
		
	header('Location: puste-opakowania.php?link=puste-opakowania-m9');

?>