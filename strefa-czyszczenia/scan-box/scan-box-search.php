<?php 
	require('../../session.php');
	if(!isset($_POST['z1'])){
		echo 'Brak info';
		exit;
	}
	$z1 = htmlentities($_POST['z1']);
	
	require_once ('../../database/db.php');
	$zadanie = $db_PDO->prepare('SELECT * FROM `strefa-czyszczenia-scanbox` WHERE `kod`= :kod ORDER BY `data` desc LIMIT 10');
	$zadanie->execute([ 'kod' => $z1 ]);
	$ile = $zadanie->rowCount();
	if($ile > 0){
		echo '

		<button class="btn btn-success" id="btn-wyczyszczony">DODAJ CZYSZCZENIE</button>
		<br>
		OSTATNIE 10
		
		
		<div class="table-scanbox-div">
		<table class="table table-dark table-striped">
			<thead>
			<tr>
				<th>KOD</th>
				<th>NAZWA</th>
				<th>DATA</th>
			</tr>
			</thead>
			<tbody>';
		for ($i=0; $i < $ile; $i++){
			$wiersz = $zadanie->fetch();
			echo '
			<tr>
				<td><div class="code-scroll">'.$wiersz['kod'].'</div></td>
				<td>'.$wiersz['nazwa'].'</td>
				<td>'.$wiersz['data'].'</td>
			</tr>';
		}
		
		echo '</tbody>
				</table>
				</div>';
		exit;
	}else{
		echo 'BRAK WYNIKÓW';
		exit;
	}
	
		
?>
