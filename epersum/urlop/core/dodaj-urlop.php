<?php
	require('../../../session.php');
	$z1 = $_POST['z1'];
	$z2 = $_POST['z2'];
	$z3 = $_POST['z3'];
	$z4 = $_POST['z4'];
	
	if(empty($z1) OR empty($z2) OR empty($z3) OR empty($z4)){
		die('Wprowadź wymagane dane');
	}
	
	
	$A1 = $db_PDO->prepare('SELECT
								`urlop`
							FROM
								`users`
							WHERE
								`id`=:id');					
	$A1->execute([':id'=>$_SESSION['id']]);
	$A1_W = $A1->fetch();
	$calyUrlop = $A1_W['urlop'];

	$dateString1 = $z1;
	$dateString2 = $z2;
	$date1 = new DateTime($dateString1);
	$date2 = new DateTime($dateString2);
	$interval = $date1->diff($date2);
	$days = $interval->days;
	$urlop = $calyUrlop - $days;
	$data = date("Y-m-d");
	
	if($urlop < 0){
		die("Masz za mało urlopu");
	}

	$a = $db_PDO->prepare('UPDATE
									`users`
								SET
									`urlop`=:ile
								WHERE
									`id`=:id');
						
	$a->execute([':ile'=>$urlop, ':id'=>$_SESSION['id']]);

	$i = 1;
	$z = $db_PDO->prepare('INSERT INTO `epersum_urlop_k`(
							`user_id`,
							`date1`,
							`date2`,
							`ilosc_dni`,
							`powod`,
							`kod`,
							`accept`,
							`czas_dodania`
						)
						VALUES(
							:user_id,
							:date1,
							:date2,
							:ilosc_dni,
							:powod,
							:kod,
							:accept,
							:data
						)');
						
	$z->execute([ 
					':user_id'=>$_SESSION['id'],
					':date1'=>$z1,
					':date2'=>$z2,
					':ilosc_dni'=>$days,
					':powod'=>$z3,
					':kod'=>$z4,
					':accept'=>$i,
					':data'=>$data 
	]);
	
	die('Urlop dodany');
?>
