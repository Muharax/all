<style>
table.abc th{
	background-color:black;
	color:white;
	text-align:center;
}
table.abc{
	font-size:12px;
}
.statystyki-core-y{
	padding:10px;
	background-color:#212529;
	border-radius:20px;
	color:white;
}
</style>
<div class="statystyki-core-y">
<h3>Limit wyświetleń 10</h3>

<?php 
	
		require('../../database/db-connect.php');
		$lim = 10;
		$a = "SELECT * FROM `market_zamowienia_potwierdzone` ORDER BY `id` DESC LIMIT 15";
		$zadanie = $db_PDO->query($a);
		$ile_znalezionych = $zadanie->rowCount();
	
	echo '<table class="tabela-bbbb">';
		echo '<tr>';
		echo '<thead>';
			echo '<th>ILOSC</th>';
			echo '<th>KOD</th>';
			echo '<th>T1</th>';
			echo '<th>T2</th>';
			echo '<th>T3</th>';
			echo '<th>PST</th>';
			echo '<th>OPTIONS</th>';
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
for ($i=0; $i < $ile_znalezionych; $i++)
        {
				$wiersz = $zadanie->fetch();
				$datetime1 = new DateTime($wiersz['data_zamowienia']);
				$datetime2 = new DateTime($wiersz['data_dostarczenia']);
				$czas = $datetime1->diff($datetime2);
				$interval_G = $czas->format('%H');
				$interval_M = $czas->format('%I');
				$interval_S = $czas->format('%S');
				
				echo '<tr>';
				echo '<td>' . $wiersz['ilosc_zamowiona'] . '</td>';
				echo '<td>' . $wiersz['kod'] . '</td>';
				echo '<td>' . $wiersz['data_zamowienia'] . '</td>';
				echo '<td>' . $wiersz['data_pobrania'] . '</td>';
				echo '<td>' . $wiersz['data_dostarczenia'] . '</td>';
				if($interval_M > 30){
					echo '<td style="color:red;">' . $interval_G.':'.$interval_M.':'.$interval_S.'</td>';
					echo '<td><button disabled>POCHWAL</button><button disabled>DODAJ PKT</button></td>';
				}else{
					echo '<td style="color:#35e135">' . $interval_G.':'.$interval_M.':'.$interval_S.'</td>';
					echo '<td><button disabled>POCHWAL</button><button disabled>DODAJ PKT</button></td>';
				}
				echo '</tr>';
				
		}
		echo '</tbody>';
		echo '</table>';		
?>

</div>
