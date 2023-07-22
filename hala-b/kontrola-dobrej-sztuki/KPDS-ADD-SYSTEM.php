<?php 	
	require ('../../session.php');
	
		$LE = htmlentities($_POST['z1']);
		$PR = htmlentities($_POST['z2']);
		
		if((empty($LE) || $LE === 0) && (empty($PR) || $PR === 0)){
			echo 'UZUPEŁNIJ DANE';
		}else{
			require_once ('../../database/db.php');
			$zadanie = $db_PDO->prepare('INSERT INTO `kontrola_pierwszej_dobrej_sztuki`(`name`, `ilosc_LE`, `ilosc_PR`, `kod`, data) VALUES (:name,:ilosc_LE,:ilosc_PR,:kod,:data)');
			$zadanie->execute([ 
								'name' => 'X', 
								'ilosc_LE' => $LE, 
								'ilosc_PR' => $PR, 
								'kod' => '000 000', 
								'data' => date("Y-m-d G:i:s")]);
			
			echo 'GIT';
			exit;
		}
		
		
	
	
	



?>