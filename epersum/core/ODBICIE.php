<?php 

require('../../session.php');


function ile($id){
		require_once('../../database/db-connect.php');
		$czas = date("G:i:s");
		$czas1 = date('G:i:s', strtotime('+485 minutes'));
		$date = date("Y:m:d");


		
		$c = "INSERT INTO `epersum_rozliczenia`(
					`user_id`,
					`wej`,
					`wyj`,
					`date`
				)
				VALUES(
					'$id',
					'$czas',
					'$czas1',
					'$date'
				)";
				
		$zadanie = $db_PDO->query($c);
		$wiersz = $zadanie->fetch();
}
ile($_SESSION['id']);
echo 'SUKCESS';
exit();
