<?php 

$pid = $_POST['pid'];

$z1 = $_POST['z1'];
$z2 = $_POST['z2'];
$z3 = $_POST['z3'];
$z4 = $_POST['z4'];
$z5 = $_POST['z5'];
$z6 = $_POST['z6'];
$z7 = $_POST['z7'];
$z8 = $_POST['z8'];
$z9 = $_POST['z9'];

require('../../database/db-connect.php');

$b = 'UPDATE
			`market_stan_detali`
		SET
					`nazwa` = "'.$z1.'",
					`kod` = "'.$z2.'",
					`loc` = "'.$z3.'",
					`ilosc` = "'.$z4.'",
					`max` = "'.$z5.'",
					`wersja` = "'.$z6.'",
					`min` = "'.$z7.'",
					`pojemnik` = "'.$z8.'",
					`strona` = "'.$z9.'"
		WHERE
					`id` = "'.$pid.'"';
		
		$zadanie = $db_PDO->query($b);

echo $z6;



?>