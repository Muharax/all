<?php 
// ======================================================================================
// STAN DETALI - > ZAMOW
// ZAMOWIENIA -> POTWIERDZ OK STATUS OK
// ======================================================================================

		// ID
		try{
	if(!empty($_POST['z1'])){
			$startTime = microtime(true);
			
		}else{
			echo 'Z1 PUSTE - <br>';
			exit();
		}
		$ID = $_POST['z1'];
		require('../../database/db-connect.php');
		$ww = 'SELECT * FROM `market_stan_detali` WHERE `id`="'.$ID.'"';
		$zadanie = $db_PDO->query($ww);
		$w = $zadanie->fetch();
		$brakuje = $w['max'] - $w['ilosc'];

		
		$a = 'SELECT * FROM `market_zamowienia` WHERE `kod` = "'.$w['kod'].'"';
		$zadanie = $db_PDO->query($a);
		$ile = $zadanie->rowCount();
		
			if($w['max'] <= $w['ilosc']){
				echo '<font color="orange"><b>MARKET JEST PEŁNY</b></font><br>';
				echo '<button>ZAMÓW WIĘCEJ</button>';
				
				die();
			}
			if($ile > 0){
				echo 'Detal już został zamówiony' . $ile;
				exit();
			}
		

	
		$C = 'SELECT * FROM `hala_c_stan_detali` WHERE `kod` = "'.$w['kod'].'"';
		$zadanie_C = $db_PDO->query($C);
		$HC_ile = $zadanie_C->rowCount();
		if($HC_ile <= 0 || empty($HC_ile)){
			echo '<font color="red"><b>Brak zarejestrowanego kodu na Hali C => </b></font>'.$HC_ile;
			die();
		}elseif($HC_ile > 0){
			$wiersz_C = $zadanie_C->fetch();
			$loc_m = $wiersz_C['loc'];
			$U = $brakuje;
		if($U < 0 ){
				echo 'Brak wystarczającej ilośći <br><br>DOSTĘPNE : '.$wiersz_C['ilosc'].'<BR>
					<BUTTON class="ss" value="'.$ID.'" id="btn-pobierz-bwid">
						&#8250;&#8250;&#8250; POBIERZ '.$brakuje.'
					</BUTTON><BR>
					<BUTTON class="ss" id="btn-zglos-bwid">
						&#8250;&#8250;&#8250; POBIERZ INNĄ WARTOŚĆ
					</BUTTON>
					
					<BR><BR>
					';
			die();
		}
		}
		
		
		$status = 1;
		$data = date("Y-m-d G:i:s");
		session_start();
		$B = "INSERT INTO `market_zamowienia`(
												`kod`,
												`nazwa`,
												`loc`,
												`loc_m`,
												`ilosc_zamowiona`,
												`status`,
												`data_zam`,
												`data_pobrania`,
												`wersja`,
												`id_stan_detali`,
												`pracownik`
												
											)
											VALUES('".$w['kod']."',
												   '".$w['nazwa']."',
												   '".$w['loc']."',
												   '".$loc_m."',
												   '".$U."',
												   '".$status."',
												   '".$data."',
												   '".$data."',
												   '".$w['wersja']."',
												   '".$w['id']."',
												   '".$_SESSION['id']."'
												   )";
												   
		$zadanieBB = $db_PDO->query($B);
		
		$d = "UPDATE
					`market_stan_detali`
				SET
					`status` = '".$status."'
				WHERE
					`id`='".$ID."'";
												   
		$zadanie = $db_PDO->query($d);
		$totalTime = microtime(true) - $startTime;
		echo '<font color="green"><b>UDAŁO SIĘ - > </b></font>'. $totalTime;
		exit();	
	
	
	} catch (PDOException $error){
		echo $error->getMessage();
		exit('Database error');
	}
		
		

		
		
		
		
		

		
		
		// die();
		
		
		?>