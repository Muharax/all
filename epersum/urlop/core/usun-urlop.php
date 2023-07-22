<?php
	require('../../../session.php');
	
	$id = htmlentities($_POST['z1']);
	// ====================================================
	$A1 = $db_PDO->prepare('SELECT ilosc_dni FROM
									`epersum_urlop_k`
								WHERE
									`id`=:id');
						
	$A1->execute([':id'=>$id]);
	$A1_W = $A1->fetch();
	// ====================================================
	$A2 = $db_PDO->prepare('SELECT urlop FROM
									`users`
								WHERE
									`id`=:ids');				
	$A2->execute([':ids'=>$_SESSION['id']]);
	$A2_W = $A2->fetch();
	// ====================================================
	$urlop = $A2_W['urlop'];
	$ilosc_dni = $A1_W['ilosc_dni'];
	$nowyUrlop = $urlop + $ilosc_dni;
	// ====================================================
	$A3 = $db_PDO->prepare('UPDATE
								`users`
							SET
								`urlop`=:nowyUrlop
							WHERE
								`id`=:ids');				
	$A3->execute([':nowyUrlop'=>$nowyUrlop, ':ids'=>$_SESSION['id']]);
	// ====================================================
	$A4 = $db_PDO->prepare('DELETE
								FROM
									`epersum_urlop_k`
								WHERE
									id=:z1');				
	$A4->execute([':z1'=>$id]);
	die("Urlop usunięto pomyślnie");
	
	
	

?>
