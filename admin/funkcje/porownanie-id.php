<?php 
	function pid($msg_odbiorca){
		
		require('../database/db.php');
		
		
		$id = $_SESSION['id'];
	
		$a = 'SELECT `user` FROM `users` INNER JOIN `wiadomosci` ON `users`.`id`= `wiadomosci`.`msg_odbiorca` WHERE `msg_odbiorca`="'. $id .'"';
		$zadanie = $db_PDO->query($a);
		$wiersz = $zadanie->fetch();
		
		return $wiersz['user'];
	}
	
	function dane($x){
		
		require('../database/db.php');
		
		
		$id = $_SESSION['id'];
	
		$a = 'SELECT imie, nazwisko FROM `users` WHERE `id` = "'. $id .'"';
		$zadanie = $db_PDO->query($a);
		$wiersz = $zadanie->fetch();
		$dane = $wiersz['imie'] . " " . $wiersz['nazwisko'];
		return $dane;
	}



?>