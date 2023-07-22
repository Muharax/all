<div style="background-color:white; padding:20px;border-radius:20px;">
<?php 
	
		require('../../database/db-connect.php');
		$a = "SELECT * FROM `opakowania-zrealizowne`";
		$zadanie = $db_PDO->query($a);
		$ile_znalezionych = $zadanie->rowCount();
	
	echo '<table class="table" id="hhj">
	<thead>
		<tr>
			<th>POJEMNIK</th>
			<th>ILOSC</th>
			<th>PODWOZIA</th>
			<th>PRIORYTET</th>
			<th>SR</th>
			<th>SF</td>
			<th>CZAS REALIZACJI</th>
			<th>ID PRAC.</th>
			<th>INNE</th>
		
		</tr>
	</thead>
	<tbody>';
for ($i=0; $i < $ile_znalezionych; $i++)
        {
				$wiersz = $zadanie->fetch();
				$datetime1 = new DateTime($wiersz['czas_realizacji']);
				$datetime2 = new DateTime($wiersz['czas']);
				$czas = $datetime1->diff($datetime2);
				$interval = $czas->format('%I minutes');
				
				echo '<tr>
			
					<td>' . strtoupper($wiersz['nazwa_opakowania']) . '</td>
					<td>' . $wiersz['ilosc'] . '</td>
					<td>' . $wiersz['ilosc_podwozi'] . '</td>
					<td>' . $wiersz['priorytet'] . '</td>
					<td>' . $wiersz['czas'] . '</td>
					<td>' . $wiersz['czas_realizacji'] . '</td>
					<td>' . $interval . '</td>
					<td>' . $wiersz['pracownik'] . '</td>
					<td><button>POCHWAL</button><button>DODAJ PKT</button></td>
				
				</tr>';
		}
		echo '</tbody>
				</table>';
		
?>

</div>


<script>
 $(document).ready( function () {
      $('#hhj').DataTable();
   });
 
 </script>