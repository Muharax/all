<?php



$z1 = $_POST['z1'];
$z2 = $_POST['z2'];
$z3 = $_POST['z3'];
$z4 = $_POST['z4'];
$data = date("Y-m-d G:i:s");


	require('../../database/db.php');
	require('../../session.php');
	$i = 1;
	
	$z = $db_PDO->prepare('INSERT INTO `epersum_urlop_k`(
							`user_id`,
							`date1`,
							`date2`,
							`powod`,
							`kod`,
							`accept`,
							`czas_dodania`
						)
						VALUES(
							:user_id,
							:date1,
							:date2,
							:powod,
							:kod,
							:accept,
							:data
							"
							
							
						)');
						
	$z->execute([ 
					':user_id'=>$_SESSION['id'],
					':date1'=>$z1,
					':date2'=>$z2,
					':powod'=>$z3,
					':kod'=>$z4,
					':accept'=>$i,
					':data'=>$data 
	]);
	
	exit();
?>
