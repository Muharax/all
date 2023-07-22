<div class="ttable" style="background-color:white; 
	padding:20px;
	border-radius:20px;">	
<?php 
	// session_start();
	// if(isset($_SESSION['id'])){
		// echo 'X1';
		// exit;
	// }else{
		// echo 'X2';
		// exit;
	// }
	
	require('../database/db.php');
	
		$b = "SELECT * FROM `hala_c_stan_detali`";
		$zadanie = $db_PDO->query($b);
		$ile_znalezionych = $zadanie->rowCount();
	echo '<table id="npaw" class="tabela-a">
	<thead>
	<tr>
			<th>NR</th>
			<th>LOKALIZACJA</th>
			<th>KOD</th>
			<th>NAZWA</th>
			<th>MIN</th>
			<th>ILOŚĆ</th>
			<th>MAX</th>
			<th>WERSJA</th>
			<th>AdminSys</th>
	</tr>
	</thead>
	<tbody>';
for ($i=0; $i < $ile_znalezionych; $i++)
        {
				$wiersz = $zadanie->fetch();

				echo '<tr>
						<td>' . $i+1 . '</td>
						<td>' . $wiersz['loc'] . '</td>
						<td>' . $wiersz['kod'] . '</td>						
						<td>' . $wiersz['nazwa'] . '</td>
						<td>' . $wiersz['min'] . '</td>
						<td>' . $wiersz['ilosc'] . '</td>
						<td>' . $wiersz['max'] . '</td>
						<td>' . $wiersz['wersja'] . '</td>
						<td>
							<div style="float:left;margin-left:3px;"><img style="width:19px;height:19px;" src="../img/edit1.png"></div>
							<div style="float:left;margin-left:3px;"><img style="width:19px;height:19px;" src="../img/del1.png"></div>
							<div style="float:left;margin-left:3px;"><img style="width:19px;height:19px;" src="../img/add.png"></div>
							<div style="float:left;margin-left:3px;"><img style="width:19px;height:19px;" src="../img/block.png"></div>
						</td>
					</tr>';
		}
		echo '</tbody>
		</table>';
?>
</div>
<script>
$(document).ready( function () {
      $('#npaw').DataTable();
   });

// $('#npaw').DataTable( {
    // buttons: [
        // 'excel'
    // ]
// } );

   </script>