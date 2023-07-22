<?php 
$startTime = microtime(true);

	error_reporting(E_ALL);
	$pod = $_POST['z1'];
	$poj = $_POST['z2'];
	$pid = $_POST['z3'];
	
	if(empty($_POST['z1']) && empty($_POST['z2'])){
		echo 'HENDENHOH';
		exit(0);
	}
	
	if(!empty($_POST['z1'])){
		// echo 'PODWOZIA - NIE PUSTE - ' . $_POST['z1'] . '<br>';
		$ile_podwozi = $_POST['z1'];
	}else{
		// echo 'PODWOZIA - TAK PUSTE - ' . $_POST['z1'] . '<br>';
		$ile_podwozi = 0;
	}
	
	if(!empty($_POST['z2'])){
		// echo 'POJEMNIK - NIE PUSTE - ' . $_POST['z2'] . '<br>';
		$ile_pojemnikow = $_POST['z2'];
	}else{
		// echo 'POJEMNIK - TAK PUSTE - ' . $_POST['z2'] . '<br>';
		$ile_pojemnikow = 0;
	}
	
	if(!empty($_POST['z3'])){
		// echo 'ID - NIE - ' . $_POST['z3'] . '<br>';
		$ID_zamowienia = $_POST['z3'];
	}
	
	
		require('../../database/db.php');

		
		
		$sql = 'SELECT * FROM `market_zamowienia` WHERE `id` ="'.$ID_zamowienia.'"';
		$zadanie = $db_PDO->query($sql);
		$ile = $zadanie->rowCount();
		$wiersz = $zadanie->fetch();
		$ilosc_zamowiona = $wiersz['ilosc_zamowiona'];
		$IDs = $wiersz['id_stan_detali'];
		
		
		$sql_0 = 'SELECT * FROM `market_stan_detali` WHERE `id` ="'.$IDs.'"';
		$zadanie_0 = $db_PDO->query($sql_0);
		$wiersz_0 = $zadanie_0->fetch();
		$il = $wiersz_0['max'] - $wiersz_0['ilosc'];
		
		$sql_1 = 'SELECT * FROM `detale` WHERE `kod`="'.$wiersz['kod'].'"';
		$zadanie_1 = $db_PDO->query($sql_1);
		$wiersz_1 = $zadanie_1->fetch();
		$ile_1 = $zadanie_1->rowCount();
		$pakowanie = $wiersz_1['ilosc'];
		
		$sql_2 = 'SELECT * FROM `pojemniki` WHERE `pojemnik`="'.$wiersz_1['pojemnik'].'"';
		$zadanie_2 = $db_PDO->query($sql_2);
		$wiersz_2 = $zadanie_2->fetch();
		$dzielnik = $wiersz_2['dzielnik'];
		
		$poj_1 = $ile_pojemnikow * $pakowanie;
		$pod_1 = ($ile_podwozi * $dzielnik) * $pakowanie;
		$ile_realizuje = $poj_1 + $pod_1;
		
		// if($ile_realizuje > $il){
			
		// }
		$status = 2;
		// $final = $ilosc_zamowiona - $ile_realizuje;
		
		if($ilosc_zamowiona < $ile_realizuje){
			echo '<font color="red">TO SIĘ NIE UDA, NIE MOŻESZ ZREALIZOWAĆ WIĘCEJ NIŻ W ZAMÓWIENIU</font>';
			exit(0);
		}elseif($ilosc_zamowiona === $ile_realizuje){

			require('../../database/db.php');
			$data = date("Y-m-d G:i:s");
			session_start();
			$pracownik = $_SESSION['id'];
			$VC = "INSERT INTO `market_zamowienia_archiwum`(
									`kod`,
									`nazwa`,
									`loc`,
									`loc_m`,
									`ilosc`,
									`data_zamowienia`,
									`data_pobrania`,
									`wersja`,
									`pracownik`, 
									`id_stan_detali`
									
									
								)
								VALUES(
									'".$wiersz['kod']."',
									'".$wiersz['nazwa']."',
									'".$wiersz['loc']."',
									'".$wiersz['loc_m']."',
									'".$ile_realizuje."',
									'".$wiersz['data_zam']."',
									'".$data."',
									'".$wiersz['wersja']."',
									'".$_SESSION['id']."',
									'".$wiersz['id_stan_detali']."'
								)";
			$VX = $db_PDO->query($VC);
			$AZ5 = "DELETE
						FROM
							`market_zamowienia`
						WHERE
							`id_stan_detali` = '".$IDs."'";
														   
			$ZAD = $db_PDO->query($AZ5);
			
			$status = 2;
			
			$jj = "UPDATE
						`market_stan_detali`
					SET
						`status` = '".$status."'
					WHERE
						`kod`='".$wiersz['kod']."'";
			$jjj = $db_PDO->query($jj);
			$T = '$final == 0';
			echo '<font color="green">UDAŁO SIĘ => Realizacja całośći</font>';
			exit(0);
			
			
		}elseif($il > $ile_realizuje){
			require('../../database/db-connect.php');
			$data = date("Y-m-d G:i:s");
			session_start();
			$pracownik = $_SESSION['id'];
			
					$VC = "INSERT INTO `market_zamowienia_archiwum`(
											`kod`,
											`nazwa`,
											`loc`,
											`loc_m`,
											`ilosc`,
											`data_zamowienia`,
											`data_pobrania`,
											`wersja`,
											`pracownik`,
											`id_stan_detali`
										)
										VALUES(
											'".$wiersz['kod']."',
											'".$wiersz['nazwa']."',
											'".$wiersz['loc']."',
											'".$wiersz['loc_m']."',
											'".$ile_realizuje."',
											'".$wiersz['data_zam']."',
											'".$data."',
											'".$wiersz['wersja']."',
											'".$pracownik."',
											'".$IDs."'
										)";
							$VX = $db_PDO->query($VC);
							
					$YY = $wiersz['ilosc_zamowiona'] - $ile_realizuje;	
					$AF = $wiersz_0['ilosc'] + $ile_realizuje;	
					$status = 3;
					$status3 = 2;
					
					$AVG = "UPDATE
								`market_zamowienia`
							SET
								`status` = '".$status."',
								`ilosc_zamowiona` = '".$YY."'
							WHERE
								`id`='".$ID_zamowienia."'";
					$AVGX = $db_PDO->query($AVG);
					
					$jj = "UPDATE
								`market_stan_detali`
							SET
								`status` = '".$status3."'
							WHERE
								`id`='".$IDs."'";
					$jjj = $db_PDO->query($jj);
					$T = '$final > 0';
					
					$totalTime = microtime(true) - $startTime;	
	echo '<br> - TIME -> ' . $totalTime;
	echo '<br><font color="green">UDAŁO SIĘ => Realizacja OK</font>';
	exit(0);
			}


		
		


 
 ?>