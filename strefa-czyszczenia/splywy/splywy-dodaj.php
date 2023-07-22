<?php 
$kod = $_POST['z1'];
$ilosc = $_POST['z2'];

require('../../database/db.php');

$sql = 'SELECT * FROM `bom` WHERE `kod`="'.$kod.'"';
		$zadanie1 = $db_PDO->query($sql);
		$wiersz1 = $zadanie1->fetch();
		$lacznik = $wiersz1['lacznik'];
			
	echo '<table class="table table-dark">';
	echo '<thead>';
		echo '<tr>';
			echo '<td class="tabela-nazwy">NAZWA</td>';
			echo '<td class="tabela-nazwy">KOD</td>';
			echo '<td class="tabela-nazwy">POJEMNIK</td>';
			echo '<td class="tabela-nazwy">ILOSC POJEMNIKÓW</td>';
	echo '</tr>';
	echo '</thead>';
	echo '<tbody>';
	
	

		$sql = "SELECT * FROM `detale` WHERE `lacznik` like '%".$lacznik."%'";
		$zadanie = $db_PDO->query($sql);
		$ile = $zadanie->rowCount();
		
		for ($i=0; $i < $ile; $i++)
        {
			$wiersz = $zadanie->fetch();
			$pak = $wiersz['ilosc'];
			$final = $ilosc / $pak;
		echo '<tr>';
				echo '<td>'.$wiersz['nazwa'].'</td>';
				echo '<td>'.$wiersz['kod'].'</td>';
				echo '<td>'.$wiersz['pojemnik'].'</td>';
				echo '<td>'.floor($final).'</td>';
		echo '</tr>';
		}
		
	echo '</tbody>';
	echo '</table>';
	
		
?>
</div>
