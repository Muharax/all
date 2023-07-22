<div style="background-color:white; padding:20px;border-radius:20px;">
<?php 

		require('../../database/db-connect.php');
		require('../../funkcje.php');
		
		$a = 'SELECT * FROM `market_zamowienia_archiwum`';
		$zadanie = $db_PDO->query($a);
		$ile_znalezionych = $zadanie->rowCount();
		
		echo '<table id="tabelaa" class="tabela-c table">
			<thead>
				<tr>
					<th>KOD</th>
					<th>NAZWA</th>
					<th>LOK.</th>
					<th>ILOŚĆ</th>
					<th>WERSJA</th>
					<th></th>
				</tr>
				</thead>
				<tbody>';
	for ($i=0; $i < $ile_znalezionych; $i++){
		$wiersz = $zadanie->fetch();
			echo '<tr>
					
					<td>' . $wiersz['kod'] . '</td>
					<td>' . $wiersz['nazwa'] . '</td>
					<td>' . $wiersz['loc'] . '</td>
					<td>' . $wiersz['ilosc'].' - '.x($wiersz['ilosc'], $wiersz['kod']).'</td>
					<td>' . $wiersz['wersja'] . '</td>
		<td>
		<button type="button" id="potwierdz-market" class="usun" value="'.$wiersz['id'].'">POTWIERDZ</button>
		<button type="button" id="niezgodnosc-market" class="usun" value="'.$wiersz['id'].'">NIEZGODNOŚĆ</button>
		</td>
					
				</tr>';
				
				
		}
		echo '</tbody>
				</table>';

?>
</div>


<Script>
 $(document).ready( function () {
      $('#tabelaa').DataTable({
        // "scrollY":        "600px",
        // "scrollCollapse": true,
        "paging":         false
    });
	

   });
</script>