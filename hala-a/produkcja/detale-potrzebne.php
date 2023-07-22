<div style="color:white;">
<?php 

$kod = @$_POST['z1'];
$ile_do_produkcji = @$_POST['z2'];

		require('../../database/db-connect.php');
			
		$a = 'SELECT `lacznik` FROM `bom` WHERE `kod`="'.$kod.'"';
		$zadanie = $db_PDO->query($a);
		$ile = $zadanie->rowCount();
		$wiersz = $zadanie->fetch();
		$lacznik = $wiersz['lacznik'];
		if($ile >= 2){
		 echo 'ZA dużo wyników';
		 exit();
		}
		
		$C = 'SELECT `ilosc` FROM `produkcja-aktywne` WHERE `kod`="'.$kod.'"';
		$zadanie_C = $db_PDO->query($C);
		$wiersz_C = $zadanie_C->fetch();
		
		$ilee = $wiersz_C['ilosc'];
		
		
		
		
		
		
		
		$B = 'SELECT * FROM `detale` WHERE `lacznik` LIKE "%'.$lacznik.'%"';
		$zadanie_B = $db_PDO->query($B);
		$ile_B = $zadanie_B->rowCount();
		
		for ($i=0; $i < $ile_B; $i++){
			$wiersz_B = $zadanie_B->fetch();
			
			echo $wiersz_B['nazwa'].' -> ';
			$final = $ilee * $wiersz_B['ilosc_p'];
			$ff = $final / $wiersz_B['ilosc'];
			$cc = $final % $wiersz_B['ilosc'];
			$ff = floor($ff);
			
			echo 'ZAPOTRZEBOWANIE: '.$final.'szt. / Pojemników -> '.$ff.' i '.$cc.' szt. luzem <br>';
		}
		
		
		

?>
</div>

<buttonm


