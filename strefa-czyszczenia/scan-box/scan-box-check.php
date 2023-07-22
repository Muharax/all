<?php 
		require('../../session.php');
		
		$z1 = htmlentities($_POST['z1']);
		require_once ('../../database/db.php');
		
		$zadanie = $db_PDO->prepare('SELECT `kod` FROM `strefa-czyszczenia-scanbox` WHERE `kod`= :kod ORDER BY `data` desc LIMIT 10');
		$zadanie->execute([ 'kod' => $z1 ]);
		$ile = $zadanie->rowCount();
		if($ile === 0){
			return;
		}
		
?>
