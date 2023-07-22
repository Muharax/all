<div style="background-color:#212529; padding:20px;border-radius:20px;">
<?php
	require ('../../session.php');
	
if(!empty($_POST['z1'])){
	$like = $_POST['z1'];
	$_SESSION['ver'] = $like;
}else{
	$like = $_SESSION['ver'];
}

	require('../../database/db-connect.php');
	require('../../funkcje.php');
		$a = 'SELECT * FROM `market_stan_detali` WHERE `wersja`="'.$like.'" LIMIT 100';
		$zadanie = $db_PDO->query($a);
		$ile_znalezionych = $zadanie->rowCount();
echo '<table id="tabela1" class="tabela-market table table-dark">
		<thead>
		<tr>
			<th>KOD</th>
			<th>NAZWA</th>
			<th>STR</th>
			<th>MIN</th>
			<th>ZAPAS</th>
			<th>PRG</th>
			<th>MAX</th>
			<th>LOC</th>
			<th>Pojemnik</th>
			<th>Status</th>
			<th></th>
		</tr>
	</thead>
	<tbody>';
		
		
for ($i=0; $i < $ile_znalezionych; $i++)
        {
		$wiersz = $zadanie->fetch();
if($wiersz['status'] >= 1){
					
		echo '<tr>
			<td>' . $wiersz['kod'] . '</td>
			<td>' . strtoupper($wiersz['nazwa']) . '</td>
			<td>' . $wiersz['strona'] . '</td>
			<td>' . $wiersz['min'] . '</td>
			<td>' . ze($wiersz['ilosc'], $wiersz['min'], $wiersz['max']) .'</td>
			<td>
	<progress class="progress-bar" value="' . $wiersz['ilosc'] . '" max="' . $wiersz['max'] . '"></progress>
			</td>
			<td>' . $wiersz['max'] .'</td>
			<td>' . $wiersz['loc'] . '</td>
			<td>' . $wiersz['pojemnik'] . '</td>
			<td>' . w_drodze($wiersz['kod']) . '</td>
			<td>
	<button type="button" id="edytuj" class="usun" value="'.$wiersz['id'].'">EDYTUJ</button>
	<button type="button" id="zamow" class="usun no-drop" value="'.$wiersz['id'].'" disabled>ZAMÓW</button>
	<button type="button" id="pob" class="ssc" value="'.$wiersz['id'].'">POBRANIE</button>
							
			</td>
			</tr>';
				
}else{
	echo '<tr>
			<td>' . $wiersz['kod'] . '</td>
			<td>' . strtoupper($wiersz['nazwa']) . '</td>
			<td>' . $wiersz['strona'] . '</td>
			<td>' . $wiersz['min'] . '</td>
			<td>' . ze($wiersz['ilosc'], $wiersz['min'], $wiersz['max']) .'</td>
			<td>
	<progress class="progress-bar" value="' . $wiersz['ilosc'] . '" max="' . $wiersz['max'] . '"></progress>
			</td>
			<td>' . $wiersz['max'] .'</td>
			<td>' . $wiersz['loc'] . '</td>
			<td>' . $wiersz['pojemnik'] . '</td>
			<td>' . w_drodze($wiersz['kod']) . '</td>
			<td>
					
	<button type="button" id="edytuj" class="usun" value="'.$wiersz['id'].'">EDYTUJ</button>
	<button type="button" id="zamow" class="usun" value="'.$wiersz['id'].'">ZAMÓW</button>
	<button type="button" id="pobranie" class="ssc" value="'.$wiersz['id'].'">POBRANIE</button>
							
			</td>
		</tr>';
		}
		}
				
				
echo '</tbody>
	</table>';
?>

</div>
