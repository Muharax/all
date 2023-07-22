<?php 
			$ped = $_POST['z1'];


			require('../../database/db-connect.php');
			$a = 'SELECT * FROM `market_stan_detali` WHERE `id` = "'.$ped.'"';
			$zadanie = $db_PDO->query($a);
			$wiersz = $zadanie->fetch();
			
			// echo '<form action="market-edytuj.php" method="POST">';
			
			echo '
			<div class="modal-in">
			<table class="table awde">
		
			
				<input type="hidden" id="pid" value="'.$ped.'">
			
		<tbody>
		<tr>
			<td>NAZWA</td>
			<td><input type="text" id="nn1" value="'.$wiersz['nazwa'].'"></td>
		</tr>
		<tr>
			<td>KOD</td>
			<td><input type="text" id="nn2" value="'.$wiersz['kod'].'"></td>
		</tr>
		<tr>
			<td>LOKALIZACJA</td>
			<td><input type="text" id="nn3" value="'.$wiersz['loc'].'"></td>
		</tr>
		<tr>
			<td>ILOSC</td>
			<td><input type="number" id="nn4" value="'.$wiersz['ilosc'].'"></td>
		</tr>
		<tr>
			<td>ILOSC MAX</td>
			<td><input type="number" pattern="[0-9]" id="nn5" value="'.$wiersz['max'].'"></td>
		</tr>
		
		<tr>
			<td>WERSJA</td>
			<td><input type="text" id="nn6" value="'.$wiersz['wersja'].'" readonly></td>
		</tr>
		 
		<tr>
			<td>ILOSC MIN</td>
			<td><input type="number" id="nn7" value="'.$wiersz['min'].'"></td>
		</tr>
		<tr>
			<td>POJEMNIK</td>
			<td><input type="text" id="nn8" value="'.$wiersz['pojemnik'].'"></td>
		</tr>
		<tr>
			<td>STRONA</td>
			<td>
					<select id="nn9">
					  <option value="'.$wiersz['strona'].'">Bez zmian</option>
					  <option value="L">L</option>
					  <option value="PR">PR</option>
					  <option value="Brak">Brak</option>
					</select>
			</td>
		</tr>
		</tbody>
	</table>
	
	
		<button type="button" id="save1">Zapisz</button>
		
	
	
	</div>
	';
			die();

	

?>
