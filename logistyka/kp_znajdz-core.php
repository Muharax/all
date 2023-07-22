<?php 
	
	require_once('../database/db.php');
	
		$z = $db_PDO->prepare('SELECT * FROM `detale` WHERE `nazwa` like '%".$L."%'');
		$z->execute([ 'name' => htmlentities($login) ]);
		$i = $z->rowCount();
		
	echo '<table id="npaww" class="table table-dark table-striped">
	<thead>
	<tr>
			<th>KOD</th>
			<th>NAZWA</th>
			<th>POJ</th>
			<th>ILOŚĆ</th>
			<th>AdminSys</th>
	</tr>
	</thead>
	<tbody>';
for ($i=0; $i < $ile_znalezionych; $i++)
        {
				$wiersz = $zadanie->fetch();

				echo '<tr>
						<td>'.$wiersz['kod'].'</td>						
						<td>'.$wiersz['nazwa'].'</td>
						<td>'.$wiersz['pojemnik'].'</td>
						<td>'.$wiersz['ilosc'].'</td>
						<td>
						
<div class="iico">
	<div class="iico" title="MAIN MENU" id="editto2" data-value="'.$wiersz['id'].'">
	<img class="iico-img" src="../img/workbook.png"></div></div>

						';
		}
echo '</tbody>
		</table>';
?>
