<?php 

require('../../session.php');


function usun($id){
		$id = $_POST['z1'];
		$ids = $_SESSION['id'];
		if($id === $ids){
			
			
		
		require_once('../../database/db-connect.php');
		
		
		$a = 'SELECT * FROM `urlop` WHERE `user_id`="' . $id . '"';
		$zadanie_a = $db_PDO->query($a);
		$wiersz_a = $zadanie_a->fetch();
		$ilosc = $wiersz_a['id'];
		echo $ilosc;
}
usun($_SESSION['id']);
echo 'SUKCESS';
exit();


}
