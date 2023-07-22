<?php 
try{
	if(!empty($_POST['z1'])){
		$ID = $_POST['z1'];
	}else{
		$ID = FALSE;
		exit;
	}
	
	
	$status = 0;

	require('../../database/db-connect.php');
	require('../../funkcje.php');

	$A = "SELECT * FROM `market_zamowienia_archiwum` WHERE `id` = '".$ID."'";
	$zadanie = $db_PDO->query($A);
	$ile = $zadanie->rowCount();
	$wiersz = $zadanie->fetch();
	$KOD = $wiersz['kod'];
	$MZA = $wiersz['ilosc'];
	
	$B = "SELECT * FROM `market_stan_detali` WHERE `kod`='".$KOD."'";
		$zadanie_B = $db_PDO->query($B);
		$wiersz_B = $zadanie_B->fetch();
		$t1 = $wiersz_B['max'];
		$t2 = $wiersz_B['ilosc'];
		$kk = $t2 + $MZA;
		$brakuje = $t1 - $t2;
		$tot = $t2 + $MZA ;
		
	$C = "SELECT * FROM `hala_c_stan_detali` WHERE `kod`='".$KOD."'";
		$zadanie_C = $db_PDO->query($C);
		$wiersz_C = $zadanie_C->fetch();
		$HALA_C_ILOSC = $wiersz_C['ilosc'];
		$HC_ILOSC_FINAL = $HALA_C_ILOSC - $MZA;

	$D = "UPDATE
					`hala_c_stan_detali`
				SET
					`ilosc` = '".$HC_ILOSC_FINAL."'
				WHERE
					`kod`='".$KOD."'";
		$zadanie_D = $db_PDO->query($D);

		$data = date("Y-m-d G:i:s");
		session_start();
		$pracownik = $_SESSION['id'];
		
		
		$E = "INSERT INTO `market_zamowienia_potwierdzone`(
												`kod`,
												`nazwa`,
												`loc`,
												`ilosc_zamowiona`,
												`data_zamowienia`,
												`data_pobrania`,
												`data_dostarczenia`,
												`wersja`,
												`id_prac`
											)
											VALUES(
												   '".$wiersz['kod']."',
												   '".$wiersz['nazwa']."',
												   '".$wiersz['loc_m']."',
												   '".$MZA."',
												   '".$wiersz['data_zamowienia']."',
												   '".$wiersz['data_pobrania']."',
												   '".$data."',
												   '".$wiersz['wersja']."',
												   '".$wiersz['pracownik']."'
												   
												   
												   )";
	$zadanie_E = $db_PDO->query($E);
						
		
		
		
		$G = "DELETE
				FROM
					`market_zamowienia_archiwum`
				WHERE
					`id` = '".$ID."'";
					
		$zadanie_G = $db_PDO->query($G);
		
		$J = "DELETE
				FROM
					`market_zamowienia`
				WHERE
					`id_stan_detali` = '".$ID."'";
												   
		$zadanie_J = $db_PDO->query($J);
		
		$H = "SELECT * FROM `market_zamowienia_archiwum` WHERE `kod` = '".$KOD."'";
		$zadanie_H = $db_PDO->query($H);
		$ile_H = $zadanie_H->rowCount();
		if($ile_H > 0){
			$status = 2;
		}else{
			$status = 0;
		}
		
		$F = "UPDATE
					`market_stan_detali`
				SET
					`status` = '".$status."',
					`ilosc` = '".$kk."'
				WHERE
					`id`='".$wiersz['id_stan_detali']."'";
												   
		$zadanie_F = $db_PDO->query($F);
		
		dodaj_pkt($_SESSION['id'], 1);

echo 'UDAŁO SIĘ';
exit;
	
	
	} catch (PDOException $error){
		echo $error->getMessage();
		exit('Database error');
	}


?>