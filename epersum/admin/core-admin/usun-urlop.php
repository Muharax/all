<?php
	
$z1 = $_POST['z1'];

	require_once('../../../database/db-connect.php');
	require_once('../../../session.php');
	$b ='DELETE
				FROM
					`epersum_urlop_k`
				WHERE
					id="'.$z1.'"';
	$zadanie = $db_PDO->query($b);
	exit();
?>
