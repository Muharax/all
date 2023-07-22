<?php 
		require('../../session.php');
		
		

		$z1 = $_POST['z1'];
		
		
		require_once ('../../database/db.php');
		
		$zadanie = $db_PDO->prepare('INSERT INTO `strefa-czyszczenia-scanbox`(`nazwa`, `kod`, `data`, `prac`)
										VALUES(
											:nazwa,
											:kod,
											:data,
											:prac
											
										)');
		$zadanie->execute([ ':nazwa' => 'S1', ':kod' => htmlentities($z1), ':data' => date("Y-m-d G:i:s"),':prac' => $_SESSION['user']]);
		

?>
