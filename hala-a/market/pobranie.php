<?php 

if(empty($_POST['z1'])) {
		echo 'UZUPEŁNIJ DANE<br>
				BEEEEEEEEEEEEEE  2';
		die;
	}
	$pid = $_POST['z1'];
	$podwozia = $_POST['z2'];
	$pojemniki = $_POST['z3'];
	
	require('../../database/db-connect.php');
	$a = 'SELECT * FROM `market_stan_detali` WHERE `id`="'.$pid.'"';
		$zadanie = $db_PDO->query($a);
		$wiersz = $zadanie->fetch();
		$ilosc = $wiersz['ilosc'];
		
	$a2 = 'SELECT * FROM `detale` WHERE `kod`="'.$wiersz['kod'].'"';
		$zadanie_a2 = $db_PDO->query($a2);
		$wiersz_a2 = $zadanie_a2->fetch();
		$dz = $wiersz_a2['ilosc'];
		
	$a3 = 'SELECT * FROM `pojemniki` WHERE `pojemnik`="'.$wiersz_a2['pojemnik'].'"';
		$zadanie_a3 = $db_PDO->query($a3);
		$wiersz_a3 = $zadanie_a3->fetch();
		$dzielnik = $wiersz_a3['dzielnik'];
		
		$poj_1 = $pojemniki * $dz;
		$pod_1 = ($podwozia * $dzielnik) * $dz;
		$tt = $poj_1 + $pod_1;
		$total = $ilosc - $tt;
		


	// $data = date("Y-m-d G:i:s");
	// $vc = "INSERT INTO `market_pobranie`(
									// `kod`,
									// `nazwa`,
									// `loc`,
									// `ilosc`,
									// `data_pobrania`,
									// `wersja`
								// )
								// VALUES(
									// '".$wiersz['kod']."',
									// '".$wiersz['nazwa']."',
									// '".$wiersz['loc']."',
									// '".$tt."',
									// '".$data."',
									// '".$wiersz['wersja']."'
								// )";
// $vc = $db_PDO->query($vc);

	$aa3 = "UPDATE
					`market_stan_detali`
				SET
					`ilosc` = '".$total."'
				WHERE
					`id`='".$pid."'";
												   
$zadanie_aa3 = $db_PDO->query($aa3);
	
echo 'ID-' . $pid .'/'. $ilosc.'/'. $tt;		




?>