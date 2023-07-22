<?php 

$pid = $_POST['pid']; //ID

$z1 = $_POST['z1']; //NAZWA
$z2 = $_POST['z2']; //KOD
$z3 = $_POST['z3']; //POJEMNIK
$z4 = $_POST['z4']; //ILOŚĆ
$z5 = $_POST['z5']; //AKTYWNY POJEMNIK

		if(empty($z3)){
			$z3 = $z5;
		}else{
			$z3 = $_POST['z3'];
		}

	require_once('../database/db-connect.php');

$b = 'UPDATE
			`detale`
		SET
					`nazwa` = "'.$z1.'",
					`kod` = "'.$z2.'",
					`ilosc` = "'.$z4.'",
					`pojemnik` = "'.$z3.'"
		WHERE
					`id` = "'.$pid.'"';
		
		$zadanie = $db_PDO->query($b);

echo $z2;
exit;


?>