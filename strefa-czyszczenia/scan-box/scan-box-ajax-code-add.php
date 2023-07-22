<?php 
		error_reporting(E_ALL);
		require('../../session.php');
		
		$z1 = htmlentities($_POST['z1']);
		
		require_once ('../../database/db.php');
		$zadanie = $db_PDO->prepare('SELECT * FROM `strefa-czyszczenia-scanbox` WHERE `kod`= :kod LIMIT 1');
		$zadanie->execute([ 'kod' => $z1 ]);
		$ile = $zadanie->rowCount();
		if($ile === 0){
			
		}else{
			session_start();
			$wiersz = $zadanie->fetch();
			$zadanie = $db_PDO->prepare('INSERT INTO `strefa-czyszczenia-scanbox`(`nazwa`, `kod`, `data`, `prac`)
										VALUES(:nazwa,:kod,:data,:prac)');
			$zadanie->execute(array(
					':nazwa' => $wiersz['nazwa'], 
					':kod' => $z1, 
					':data' => date("Y-m-d G:i:s"), 
					':prac' => $_SESSION['user']));
		

		}


?>
