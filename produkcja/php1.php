<?php


$z1 = $_POST['z1'];
$z2 = $_POST['z2'];
$z3 = $_POST['z3'];
$z4 = $_POST['z4'];

	require('../database/db.php');
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

	if($zadanie = $db_PDO->query($b)){
	
	echo 'SUKCES';
	$_SESSION['dodano'] = '<div id="dodano"><div class="orange">ELO</div></div>';
}else{
	echo 'NOOOOOOOOOOOOOOOOOOOOOOOOOOO';
}

?>