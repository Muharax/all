<div style="background-color:white; padding:20px;border-radius:20px;">

<?php
		require('../../funkcje.php');		
		require('../../database/db-connect.php');
		
		// $startTime = microtime(true);
		
		$zadanie = $db_PDO->prepare('SELECT * FROM `market_zamowienia` ORDER BY `loc` ASC');
		$zadanie->execute();
		$ile_znalezionych = $zadanie->rowCount();
		
		// $totalTime = microtime(true) - $startTime;
		// echo '<font color="green"><b>CZAS - > </b></font>'. $totalTime;
		// exit;
		
		
		
		if($ile_znalezionych === 0){
		 echo 'BRAK ZAMÓWIEŃ';
		 exit();
		}
	echo '<table id="tabelaaa" class="tabela-b table">
			<thead>
				<tr>
					<th class="awt">KOD</th>
					<th class="awt">NAZWA</th>
					<th class="awt">LOK.</th>
					<th class="awt">ILOSC</th>
					<th class="awt">WERSJA</th>
					<th class="awt"></th>

				</tr>
			</thead>
		<tbody>';
				
	for ($i=0; $i < $ile_znalezionych; $i++){
			$wiersz = $zadanie->fetch();
			// if($wiersz['status'] === 3){
echo '<tr>
<td>' . $wiersz['kod'] . '</td>
<td>' . $wiersz['nazwa'] . '</td>
<td>' . $wiersz['loc_m'] . '</td>
<td>' . $wiersz['ilosc_zamowiona'].'('.x($wiersz['ilosc_zamowiona'], $wiersz['kod']).')</td>
<td>' . $wiersz['wersja'] . '</td>
<td>
<button type="button" id="potwierdz" class="usun no-drop" value="'.$wiersz['id'].'" data-value="'.$wiersz['nazwa'].'" data-ilosc="'.$wiersz['ilosc_zamowiona'].'">POTWIERDZ</button>
<button type="button" id="rc-market" class="usun no-drop" value="'.$wiersz['id'].'">RC</button>
</td>

</tr>';
				
				
			}
			echo '</tbody>';
			echo '</table>';
			
			// elseif($wiersz['status'] === 2){
				
				// echo '<tr">
				
					// <input type="hidden" id="idh" name="input-h-id" value="' . $wiersz['id'] . '">';
					
				// echo '<td style="background-color:green;" class="ggn tabela-nn">' . $wiersz['kod'] . '</td>';
				// echo '<td style="background-color:green;" class="ggn tabela-nn">' . $wiersz['nazwa'] . '</td>';
				// echo '<td style="background-color:green;" class="ggn tabela-nn">' . $wiersz['loc_m'] . '</td>';
				// echo '<td style="background-color:green;" class="ggn tabela-nn">' . $wiersz['ilosc_zamowiona'] .' - '. x($wiersz['ilosc_zamowiona'], $wiersz['kod']) .'</td>';
				// echo '<td style="background-color:green;"class="ggn tabela-nn">' . $wiersz['wersja'] . '</td>';

				
				// echo '<td style="background-color:green;" class="tabela-nn-button">
				
					// <button type="button" id="potwierdz" class="usun no-drop" value="'.$wiersz['id'].'" disabled>POTWIERDZ</button>
					
					// <button type="button" id="rc-market" class="usun no-drop" value="'.$wiersz['id'].'" disabled>RC</button>
					
					// </td>';
					
				// echo '</tr>';
			// }elseif($wiersz['status'] === 1){
				
					// echo '<tr">
				
					// <input type="hidden" id="idh" name="input-h-id" value="' . $wiersz['id'] . '">';
					
				// echo '<td class="tabela-nn">' . $wiersz['kod'] . '</td>';
				// echo '<td class="tabela-nn">' . $wiersz['nazwa'] . '</td>';
				// echo '<td class="tabela-nn">' . $wiersz['loc_m'] . '</td>';
				// echo '<td class="tabela-nn">' . $wiersz['ilosc_zamowiona'] .' - '. x($wiersz['ilosc_zamowiona'], $wiersz['kod']) .'</td>';
				// echo '<td class="ggn tabela-nn">' . $wiersz['wersja'] . '</td>';

				
				// echo '<td class="tabela-nn-button">
				
					// <button type="button" id="potwierdz" class="usun no-drop" value="'.$wiersz['id'].'" >POTWIERDZ</button>
					
					// <button type="button" id="rc-market" class="usun no-drop" value="'.$wiersz['id'].'" >RC</button>
					
					// </td>';
					
				// echo '</tr>';
			// }
				
				
				
		// }
		// echo '</tbody>';
		// echo '</table>';
		
		// }








?>
</div>
<script>
 $(document).ready( function () {
      $('#tabelaaa').DataTable({
        // "scrollY":        "600px",
        // "scrollCollapse": true,
    });

	  
	  
   });
   
   // $(document).ready(function() {
    // $('#tabelaaa').DataTable( {
        // "language": {
            // "lengthMenu": "Wyświetl _MENU_",
            // "zeroRecords": "Nothing found - sorry",
            // "info": "Showing page _PAGE_ of _PAGES_",
            // "infoEmpty": "BRAK DANYCH W TABELI",
            // "infoFiltered": "(filtered from _MAX_ total records)"
        // }
    // } );
// });
</script>