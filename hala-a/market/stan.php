<div style="background-color:white; padding:20px;border-radius:20px;">
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
		$a = 'SELECT * FROM `market_stan_detali` WHERE `wersja`="'.$like.'"';
		$zadanie = $db_PDO->query($a);
		$ile_znalezionych = $zadanie->rowCount();
		
		?>
<table id="tabela1" class="tabela-market table">
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
			<th>Poj</th>
			<th>Status</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		
		<?php
for ($i=0; $i < $ile_znalezionych; $i++)
        {
		$wiersz = $zadanie->fetch();
if($wiersz['status'] >= 1){
					
		echo '<tr>
			<td>' . $wiersz['kod'] . '</td>
			<td>' . strtoupper($wiersz['nazwa']) . '</td>
			<td>' . $wiersz['strona'] . '</td>
			<td>' . DBS($wiersz['kod'],$wiersz['max']) . '</td>
			<td>' . ze($wiersz['ilosc'], $wiersz['min'], $wiersz['max']) .'</td>
			<td>
	<progress class="progress-bar" value="' . $wiersz['ilosc'] . '" max="' . $wiersz['max'] . '"></progress>
			</td>
			<td>' . $wiersz['max'] .'</td>
			<td>' . $wiersz['loc'] . '</td>
			<td>' . $wiersz['pojemnik'] . '</td>
			<td>' . w_drodze($wiersz['kod']) . '</td>
			<td>
<button type="button" id="edytuj" title="EDYTUJ"class="usun" value="'.$wiersz['id'].'">E</button>
<button type="button" id="zamow" title="ZAMÓW" class="usun no-drop" value="'.$wiersz['id'].'" disabled>Z</button>
<button type="button" id="pobranie" title="POBRANIE"class="ssc" value="'.$wiersz['id'].'">P</button>
							
			</td>
			</tr>';
				
}else{
	echo '<tr>
			<td>' . $wiersz['kod'] . '</td>
			<td>' . strtoupper($wiersz['nazwa']) . '</td>
			<td>' . $wiersz['strona'] . '</td>
			<td>' . DBS($wiersz['kod'],$wiersz['min']). '</td>
			<td>' . ze($wiersz['ilosc'], $wiersz['min'], $wiersz['max']) .'</td>
			<td>
	<progress class="progress-bar" value="' . $wiersz['ilosc'] . '" max="' . $wiersz['max'] . '"></progress>
			</td>
			<td>' . $wiersz['max'] .'</td>
			<td>' . $wiersz['loc'] . '</td>
			<td>' . $wiersz['pojemnik'] . '</td>
			<td>' . w_drodze($wiersz['kod']) . '</td>
			<td>
					
<button type="button" id="edytuj" title="EDYTUJ" class="usun" value="'.$wiersz['id'].'">E</button>
<button type="button" id="zamow" title="ZAMÓW" class="usun" value="'.$wiersz['id'].'">Z</button>
<button type="button" id="pobranie" title="POBRANIE" class="ssc" value="'.$wiersz['id'].'">P</button>
							
			</td>
		</tr>';
		}
		}
				
				
echo '</tbody>
	</table>';
?>


<script>
 $(document).ready( function () {
      $('#tabela1').DataTable({
        "scrollY":        "600px",
        "scrollCollapse": true,
        // "paging":         false
    });
   });
   

   

   </script>