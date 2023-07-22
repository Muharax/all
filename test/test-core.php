<?php 
		require('../session.php');
		require('../database/db.php');
		
		$z1 = $_POST['z1'];
		$zadanie = $db_PDO->prepare('SELECT * FROM `users` WHERE `EAN`= :name');
		$zadanie->execute([ ':name' => $z1 ]);
		$wiersz = $zadanie->fetch();
		echo $wiersz['user'];

?>
