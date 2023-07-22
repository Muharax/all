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
	padding:20px;
	background-color:white;
	border-radius:20px;
	color:black;
}
</style>
<div class="statystyki-core-y">
Limit wyświetleń 10

<?php 
	
		require('../../database/db-connect.php');
		$lim = 10;
		$a = "SELECT * FROM `market_zamowienia_potwierdzone` ORDER BY `id` DESC LIMIT 15";
		$zadanie = $db_PDO->query($a);
		$ile_znalezionych = $zadanie->rowCount();
	
	echo '<table id="kwip">
	<thead>
		<tr>
			<th>ILOSC</th>
			<th>KOD</th>
			<th>T1</th>
			<th>T2</th>
			<th>T3</th>
			<th>PST</th>
			<th>OPTIONS</th>
		</tr>
	</thead>
	<tbody>';
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
				if($interval_M > 30 || $interval_G > 0){
					echo '<td style="color:red;">' . $interval_G.':'.$interval_M.':'.$interval_S.'</td>';
					echo '<td><button>POCHWAL</button><button disabled>DODAJ PKT</button></td>';
				}else{
					echo '<td style="color:green">' . $interval_G.':'.$interval_M.':'.$interval_S.'</td>';
					echo '<td><button>POCHWAL</button><button disabled>DODAJ PKT</button></td>';
				}
				
				echo '</tr>';
		}
		echo '</body>
				</table>';
?>

</div>

<script>
 $(document).ready( function () {
      $('#kwip').DataTable();
   });
 
 </script>
 
 