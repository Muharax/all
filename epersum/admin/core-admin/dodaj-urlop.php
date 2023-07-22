<?php
	
$z1 = $_POST['z1'];
$z2 = $_POST['z2'];
$z3 = $_POST['z3'];
$z4 = $_POST['z4'];

	require_once('../../../database/db-connect.php');
	require_once('../../../session.php');
	$i = 1;
	$b ='INSERT INTO `epersum_urlop_k`(
							`user_id`,
							`date1`,
							`date2`,
							`powod`,
							`kod`,
							`accept`
						)
						VALUES(
							"'.$_SESSION['id'].'",
							"'.$z1.'",
							"'.$z2.'",
							"'.$z3.'",
							"'.$z4.'",
							"'.$i.'"
							
							
						)';
	$zadanie = $db_PDO->query($b);
	exit();
?>
