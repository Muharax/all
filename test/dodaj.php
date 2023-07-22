<?php 	


try{
	require('../database/db-connect.php');
		$a = 'DELETE FROM `hala_c_stan_detali` WHERE `id` > 1';
		$zadanie = $db_PDO->query($a);

		$a = 'DELETE FROM `market_zamowienia` WHERE `id` > 1';
		$zadanie = $db_PDO->query($a);
		
		$a = 'DELETE FROM `detale` WHERE `id` > 1';
		$zadanie = $db_PDO->query($a);
		
		$a = 'DELETE FROM `market_stan_detali` WHERE `id` > 1';
		$zadanie = $db_PDO->query($a);
		
		$a = 'DELETE FROM `market_zamowienia_archiwum` WHERE `id` > 1';
		$zadanie = $db_PDO->query($a);
		
		$a = 'UPDATE
					`market_stan_detali`
				SET
					`status` = 0
				WHERE
					`id` > 1';
		
		$zadanie = $db_PDO->query($a);
		
		

		
		
		
		$strona = "L";
		$status = 0;
		$wersja = "OP-481-HIGH";
		$pojemnik = "G3";
		$ill = 10;

	for($i=0; $i < 13; $i++)
{		
		$nazwa = "RAMKA 2K YHN LTB.NHD 0".$i;
		$loc = "AA10".$i;
		$loc_m = "OP 10".$i;
		$rand_1 = rand(1000,2000);
		$rand_2 = rand(2000,2500);
		$rand_3 = rand(6000,5000);
		$rand_4 = rand(11,99);
		$rand_5 = rand(2200, 2500);
		$rand_6 = rand(10, 1990);
		$rand_7 = rand(100, 150);
		$min = $rand_4;
		$max = $rand_5;
		$kod = $rand_1.' '.$rand_2.' '.$rand_3.' '.$rand_4;
		$ilosc = $rand_6;


$ab = "INSERT INTO `detale`(
							`nazwa`,
							`kod`,
							`pojemnik`,
							`ilosc`,
							`ilosc_p`,
							`stopien`,
							`lacznik`,
							`karta_pakowania`,
							`karta_pakowania_1`,
							`karta_pakowania_2`

						)
						VALUES(
							
							'".$nazwa."',
							'".$kod."',
							'".$pojemnik."',
							'".$ill."',
							0,
							0,
							'0',
							'0',
							'0',
							'0'
						
						)";
	$zadanie = $db_PDO->query($ab);
	
	$abb = "INSERT INTO `hala_c_stan_detali`(
										`nazwa`,
										`kod`,
										`loc`,
										`strona`,
										`min`,
										`ilosc`,
										`max`,
										`wersja`,
										`karta_pakowania`
									)
									VALUES(
										'".$nazwa."',
										'".$kod."',
										'".$loc."',
										'".$strona."',
										'".$min."',
										'".$ilosc."',
										'".$max."',
										'".$wersja."',
										'empty'
									)";
	$zadanie = $db_PDO->query($abb);
	
	$abbb = "INSERT INTO `market_stan_detali`(
										`wersja`,
										`ilosc`,
										`id_detalu`,
										`min`,
										`nazwa`,
										`kod`,
										`max`,
										`strona`,
										`loc`,
										`pojemnik`,
										`status`
									)
									VALUES(
										'".$wersja."',
										'".$ilosc."',
										0,
										'".$min."',
										'".$nazwa."',
										'".$kod."',
										'".$max."',
										'".$strona."',
										'".$loc."',
										'".$pojemnik."',
										'".$status."'
									)";
	$zadanie = $db_PDO->query($abbb);

}


$strona = "L";
		$status = 0;
		$wersja = "OP-481-LOW";
		$pojemnik = "B1";
		$ill = 10;

	for($i=0; $i < 13; $i++)
{		
		$nazwa = "kfgthjgfh ddfhgghdf ".$i;
		$loc = "BB00".$i;
		$loc_m = "HJ 00".$i;
		$rand_1 = rand(1000,2000);
		$rand_2 = rand(2000,2500);
		$rand_3 = rand(6000,5000);
		$rand_4 = rand(11,99);
		$rand_5 = rand(150, 200);
		$rand_6 = rand(100, 150);
		$rand_7 = rand(100, 150);
		$min = $rand_4;
		$max = $rand_5;
		$kod = $rand_1.' '.$rand_2.' '.$rand_3.' '.$rand_4;
		$ilosc = $rand_6;

$ab = "INSERT INTO `detale`(
							`nazwa`,
							`kod`,
							`pojemnik`,
							`ilosc`,
							`ilosc_p`,
							`stopien`,
							`lacznik`,
							`karta_pakowania`,
							`karta_pakowania_1`,
							`karta_pakowania_2`

						)
						VALUES(
							
							'".$nazwa."',
							'".$kod."',
							'".$pojemnik."',
							'".$ill."',
							0,
							0,
							'0',
							'0',
							'0',
							'0'
						
						)";
	$zadanie = $db_PDO->query($ab);
	
	$abb = "INSERT INTO `hala_c_stan_detali`(
										`nazwa`,
										`kod`,
										`loc`,
										`strona`,
										`min`,
										`ilosc`,
										`max`,
										`wersja`,
										`karta_pakowania`
									)
									VALUES(
										'".$nazwa."',
										'".$kod."',
										'".$loc."',
										'".$strona."',
										'".$min."',
										'".$ilosc."',
										'".$max."',
										'".$wersja."',
										'empty'
									)";
	$zadanie = $db_PDO->query($abb);
	
	$abbb = "INSERT INTO `market_stan_detali`(
										`wersja`,
										`ilosc`,
										`id_detalu`,
										`min`,
										`nazwa`,
										`kod`,
										`max`,
										`strona`,
										`loc`,
										`pojemnik`,
										`status`
									)
									VALUES(
										'".$wersja."',
										'".$ilosc."',
										0,
										'".$min."',
										'".$nazwa."',
										'".$kod."',
										'".$max."',
										'".$strona."',
										'".$loc."',
										'".$pojemnik."',
										'".$status."'
									)";
	$zadanie = $db_PDO->query($abbb);

}

$strona = "L";
		$status = 0;
		$wersja = "OP-482-HIGH";
		$pojemnik = "B1";
		$ill = 10;

	for($i=0; $i < 13; $i++)
{		
		$nazwa = "ER 0".$i;
		$loc = "CC00".$i;
		$loc_m = "DF 00".$i;
		$rand_1 = rand(1000,2000);
		$rand_2 = rand(2000,2500);
		$rand_3 = rand(6000,5000);
		$rand_4 = rand(11,99);
		$rand_5 = rand(150, 200);
		$rand_6 = rand(100, 150);
		$rand_7 = rand(100, 150);
		$min = $rand_4;
		$max = $rand_5;
		$kod = $rand_1.' '.$rand_2.' '.$rand_3.' '.$rand_4;
		$ilosc = $rand_6;
		

$ab = "INSERT INTO `detale`(
							`nazwa`,
							`kod`,
							`pojemnik`,
							`ilosc`,
							`ilosc_p`,
							`stopien`,
							`lacznik`,
							`karta_pakowania`,
							`karta_pakowania_1`,
							`karta_pakowania_2`

						)
						VALUES(
							
							'".$nazwa."',
							'".$kod."',
							'".$pojemnik."',
							'".$ill."',
							0,
							0,
							'0',
							'0',
							'0',
							'0'
						
						)";
	$zadanie = $db_PDO->query($ab);
	
	$abb = "INSERT INTO `hala_c_stan_detali`(
										`nazwa`,
										`kod`,
										`loc`,
										`strona`,
										`min`,
										`ilosc`,
										`max`,
										`wersja`,
										`karta_pakowania`
									)
									VALUES(
										'".$nazwa."',
										'".$kod."',
										'".$loc."',
										'".$strona."',
										'".$min."',
										'".$ilosc."',
										'".$max."',
										'".$wersja."',
										'empty'
									)";
	$zadanie = $db_PDO->query($abb);
	
	$abbb = "INSERT INTO `market_stan_detali`(
										`wersja`,
										`ilosc`,
										`id_detalu`,
										`min`,
										`nazwa`,
										`kod`,
										`max`,
										`strona`,
										`loc`,
										`pojemnik`,
										`status`
									)
									VALUES(
										'".$wersja."',
										'".$ilosc."',
										0,
										'".$min."',
										'".$nazwa."',
										'".$kod."',
										'".$max."',
										'".$strona."',
										'".$loc."',
										'".$pojemnik."',
										'".$status."'
									)";
	$zadanie = $db_PDO->query($abbb);

}

$strona = "L";
		$status = 0;
		$wersja = "OP-482-LOW";
		$pojemnik = "B1";
		$ill = 10;

	for($i=0; $i < 3; $i++)
{		
		$nazwa = "Kotwica zapadkowa".$i;
		$loc = "DD 00".$i;
		$loc_m = "AW 00".$i;
		$rand_1 = rand(1000,2000);
		$rand_2 = rand(2000,2500);
		$rand_3 = rand(6000,5000);
		$rand_4 = rand(11,99);
		$rand_5 = rand(150, 200);
		$rand_6 = rand(100, 150);
		$rand_7 = rand(100, 150);
		$min = $rand_4;
		$max = $rand_5;
		$kod = $rand_1.' '.$rand_2.' '.$rand_3.' '.$rand_4;
		$ilosc = $rand_6;


$ab = "INSERT INTO `detale`(
							`nazwa`,
							`kod`,
							`pojemnik`,
							`ilosc`,
							`ilosc_p`,
							`stopien`,
							`lacznik`,
							`karta_pakowania`,
							`karta_pakowania_1`,
							`karta_pakowania_2`

						)
						VALUES(
							
							'".$nazwa."',
							'".$kod."',
							'".$pojemnik."',
							'".$ill."',
							0,
							0,
							'0',
							'0',
							'0',
							'0'
						
						)";
	$zadanie = $db_PDO->query($ab);
	
	$abb = "INSERT INTO `hala_c_stan_detali`(
										`nazwa`,
										`kod`,
										`loc`,
										`strona`,
										`min`,
										`ilosc`,
										`max`,
										`wersja`,
										`karta_pakowania`
									)
									VALUES(
										'".$nazwa."',
										'".$kod."',
										'".$loc."',
										'".$strona."',
										'".$min."',
										'".$ilosc."',
										'".$max."',
										'".$wersja."',
										'empty'
									)";
	$zadanie = $db_PDO->query($abb);
	
	$abbb = "INSERT INTO `market_stan_detali`(
										`wersja`,
										`ilosc`,
										`id_detalu`,
										`min`,
										`nazwa`,
										`kod`,
										`max`,
										`strona`,
										`loc`,
										`pojemnik`,
										`status`
									)
									VALUES(
										'".$wersja."',
										'".$ilosc."',
										0,
										'".$min."',
										'".$nazwa."',
										'".$kod."',
										'".$max."',
										'".$strona."',
										'".$loc."',
										'".$pojemnik."',
										'".$status."'
									)";
	$zadanie = $db_PDO->query($abbb);

}





		echo 'GIT';
		
	
	} catch (PDOException $error){
		echo $error->getMessage();
		exit('Database error');
	}
	
	
		
