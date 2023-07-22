<?php 
		require('../../session.php');
		
		require_once ('../../database/db.php');
		$zadanie = $db_PDO->prepare('SELECT * FROM `strefa-czyszczenia-scanbox`');
		$zadanie->execute();
		$ile = $zadanie->rowCount();
		if($ile > 0){
			
			srand((double)microtime()*1000);
			$id = md5(uniqid(rand()));
			echo $id;
			
		}
		
		
?>
