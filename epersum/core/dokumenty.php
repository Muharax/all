<?php

if(isset($_POST['z1']) && isset($_POST['z2']) && isset($_POST['z3']) && isset($_POST['z4'])){
	
$z1 = $_POST['z1'];
$z2 = $_POST['z2'];
$z3 = $_POST['z3'];
$z4 = $_POST['z4'];

	require_once('../database/db-connect.php');
	$b = 'INSERT INTO `produkcja`(
					`nazwa`,
					`kierunek`,
					`ilosc`,
					`cos`
				)
				VALUES(
					"'.$z1.'",
					"'.$z2.'",
					"'.$z3.'",
					"'.$z4.'"
				)';
	$zadanie = $db_PDO->query($b);
	
	echo 'SUKCES';
	exit();
}else{
	echo 'NOOOOOOOOOOOOOOOOOOOOOOOOOOO';
	exit();
}

?>