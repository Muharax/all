<?php 

error_reporting (E_ALL);
$startTime = microtime(true);


	
	if(empty($_POST['z1']) OR !isset($_POST['z1'])){
		echo 'HENDENHOH';
		$totalTime = microtime(true) - $startTime;
		echo '<font color="red">NIE</font> UDAŁO SIĘ PT - > '. $totalTime;
		exit(0);
	}
	
	require('../../database/db-connect.php');

	$ID = htmlentities($_POST['z1']);
	$zadanie = $db_PDO->prepare('SELECT * FROM `market_zamowienia` WHERE `id`= :ID');
	$zadanie->bindParam(':ID', $ID, PDO::PARAM_INT);
	$zadanie->execute();
	$E = $zadanie->fetch();
	
	session_start();
	$data = date("Y-m-d G:i:s");
// $zadanie2 = $db_PDO->prepare("INSERT INTO `market_zamowienia_archiwum`(
													// `kod`,
													// `nazwa`,
													// `wersja`,
													// `loc`,
													// `loc_m`,
													// `ilosc`,
													// `data_zamowienia`,
													// `data_pobrania`,
													// `pracownik`,
													// `id_stan_detali`
												// )
												// VALUES(
													// ':kod',
													// ':nazwa',
													// ':wersja',
													// ':loc',
													// ':loc_m',
													// ':IZ',
													// ':data_zam',
													// ':date',
													// ':pracownik',
													// ':stan'
													// )");
// $zadanie2->bindParam(':kod', $E['kod']);
// $zadanie2->bindParam(':nazwa', $E['nazwa']);
// $zadanie2->bindParam(':wersja', $E['wersja']);
// $zadanie2->bindParam(':loc', $E['loc']);
// $zadanie2->bindParam(':loc_m', $E['loc_m']);
// $zadanie2->bindParam(':IZ', $E['ilosc_zamowiona']);
// $zadanie2->bindParam(':data_zam', $E['data_zam']);
// $zadanie2->bindParam(':date', $date);
// $zadanie2->bindParam(':pracownik', $E['pracownik'].'/'.$_SESSION['id']);
// $zadanie2->bindParam(':stan', $E['id_stan_detali']);

// $zadanie2->execute(array(
   // ":kod" 		=> $E['kod'],
   // ":nazwa" 	=> $E['nazwa'],
   // ":wersja" 	=> $E['wersja'],
   // ":loc" 		=> $E['loc'],
   // ":loc_m" 	=> $E['loc_m'],
   // ":IZ" 		=> $E['ilosc_zamowiona'],
   // ":data_zam" 	=> $E['data_zam'],
   // ":date" 		=> date("Y-m-d G:i:s"),
   // ":pracownik" => $E['pracownik'].'/'.$_SESSION['id'],
   // ":stan" 		=> $E['id_stan_detali']
   // ));


// $zadanie2->execute();
	
	$AZ2 = "INSERT INTO `market_zamowienia_archiwum`(
													`kod`,
													`nazwa`,
													`wersja`,
													`loc`,
													`loc_m`,
													`ilosc`,
													`data_zamowienia`,
													`data_pobrania`,
													`pracownik`,
													`id_stan_detali`
												)
												VALUES(
													'".$E['kod']."',
													'".$E['nazwa']."',
													'".$E['wersja']."',
													'".$E['loc']."',
													'".$E['loc_m']."',
													'".$E['ilosc_zamowiona']."',
													'".$E['data_zam']."',
													'".$data."',
													'".$E['pracownik'].'/'.$_SESSION['id']."',
													'".$E['id_stan_detali']."'
													)";
	$zadanie_AZ2 = $db_PDO->query($AZ2);
	$status = 2;
	$block = 3;
		
	$AZ3 = "UPDATE
					`market_stan_detali`
				SET
					`status` = '".$status."'
				WHERE
					`id` = '".$E['id_stan_detali']."'";
					
	$zadanie_AZ3 = $db_PDO->query($AZ3);
	
	$AZ4 = "DELETE
						FROM
							`market_zamowienia`
						WHERE
							`id` = '".$ID."'";
	$zadanie_AZ4 = $db_PDO->query($AZ4);
					

	$totalTime = microtime(true) - $startTime;
	echo 'UDAŁO SIĘ PT - > '. $totalTime;

	

// }else{
		// require('../../database/db-connect.php');
		// $pid = $_POST['z1'];
				
		
		// $a = 'SELECT * FROM `market_zamowienia` WHERE `id`="'.$pid.'"';
		// $zadanie_a = $db_PDO->query($a);
		// $wiersz = $zadanie_a->fetch();
		// $st = $wiersz['status'];
		// $kod = $wiersz['kod'];
		// $nazwa = $wiersz['nazwa'];
		// $loc = $wiersz['loc'];
		// $iz = $wiersz['ilosc_zamowiona'];
		// $wersja = $wiersz['wersja'];
		// $dm = $wiersz['data_zam'];
	
		
			
		// require('../../database/db-connect.php');
		// $w7 = 'SELECT * FROM `hala_c_stan_detali` WHERE `kod`="'.$kod.'"';
		// $zadanie_w7 = $db_PDO->query($w7);
		// $wiersz_w7 = $zadanie_w7->fetch();
		// $loc_m = $wiersz_w7['loc'];
		// $data = date("Y-m-d G:i:s");
		
		
		// $status = 2;
		
		
		// session_start();
		// $pracownik = $_SESSION['id'];
		// $bcc = "INSERT INTO `market_zamowienia_archiwum`(
													// `kod`,
													// `nazwa`,
													// `wersja`,
													// `loc`,
													// `loc_m`,
													// `ilosc`,
													// `data_zamowienia`,
													// `data_pobrania`,
													// `pracownik`
												// )
												// VALUES(
													// '".$kod."',
													// '".$nazwa."',
													// '".$wersja."',
													// '".$loc."',
													// '".$loc_m."',
													// '".$iz."',
													// '".$dm."',
													// '".$data."',
													// '".$pracownik."'
													// )";
	
		// $b = "INSERT INTO `market_zamowienia_archiwum`(
									// `kod`,
									// `nazwa`,
									// `loc`,
									// `loc_m`,
									// `ilosc`,
									// `data_pobrania`,
									// `data_dostarczenia`,
									// `wersja`
								// )
								// VALUES(
									// '".$kod."',
									// '".$nazwa."',
									// '".$loc."',
									// '".$loc_m."',
									// '".$iz."',
									// '".$dm."',
									// '".$data."',
									// '".$wersja."'
								// )";
		
		// $zadanie_bcc = $db_PDO->query($bcc);
		
		// $zero = 2;
		
		// $d = "UPDATE
					// `market_stan_detali`
				// SET
					// `status` = '".$zero."'
				// WHERE
					// `kod` = '".$kod."'";
					
		// $zadanie_d = $db_PDO->query($d);
		
		// $d = "UPDATE
					// `market_zamowienia`
				// SET
					// `status` = '".$zero."'
				// WHERE
					// `id` = '".$pid."'";
					
		// $zadanie_d = $db_PDO->query($d);
		
		
		

		 
		// echo 'OK - POTWIERDZENIE POBRANIA' . ' - IDENT - ' . $loc;
		// die(); 

// }
	
// ?>