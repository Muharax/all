<?php 

require('../../session.php');


function usun($id){
		require_once('../../database/db-connect.php');
		$czas = date("G:i:s");
		$czas1 = date('G:i:s', strtotime('+485 minutes'));


		
		$c = "INSERT INTO `urlop`(
					`user_id`,
					`wej`,
					`wyj`
				)
				VALUES(
					'$id',
					'$czas',
					'$czas1'
				)";
				
		$zadanie = $db_PDO->query($c);
		$wiersz = $zadanie->fetch();
}
ile($_SESSION['id']);
echo 'SUKCESS';
exit();
