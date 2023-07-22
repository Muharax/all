<?php 

class ww {
	
	function tt($x, $y){
		require('database/db-connect.php');
		$b = 'SELECT * FROM `detale` WHERE `kod`="'.$y.'"';
		$zadanie_b = $db_PDO->query($b);
		$wiersz_b = $zadanie_b->fetch();
		$dz = $wiersz_b['ilosc'];
		$tot = $x / $dz;
		$total = floor($tot);
		$t1 = $x % $dz;
		return $total.'/'.$t1;
		
	}
	
}	
?>