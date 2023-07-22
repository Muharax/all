<div style="background-color:white; padding:20px;border-radius:20px;">

<?php	
		require('../../database/db-connect.php');
			
		$a = 'SELECT * FROM `produkcja-aktywne`';
		$zadanie = $db_PDO->query($a);
		$ile = $zadanie->rowCount();
		
		if($ile === 0){
		 echo 'BRAK ZAMÓWIEŃ';
		 exit();
		}
	echo '<table id="C1" class="tabela-b table">
			<thead>
				<tr>
					<th class="awt">NAZWA</th>
					<th class="awt">KOD</th>
					<th class="awt">ILOSC</th>
					<th class="awt">SyS</th>
				</tr>
			</thead>
		<tbody>';
				
	for ($i=0; $i < $ile; $i++){
			$wiersz = $zadanie->fetch();
echo '<tr>
		<td>' . $wiersz['nazwa'] . '</td>
		<td>' . $wiersz['kod'] . '</td>
		<td><input type="number" id="ile-do-produkcji" value="'.$wiersz['ilosc'].'" readonly></td>
		<td>
			<button id="enter" value="'.$wiersz['kod'].'">DETALE POTRZEBNE</button>
		</td>
		
	</tr>';
}?>
</tbody>
</table>
</div>
<script>
 $(document).ready( function () {
      $('#C1').DataTable({
        "paging":         false
    });
   });

</script>