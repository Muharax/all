<div class="table-data">
<?php 
	
	require_once('../database/db.php');
	
		// $zadanie = $db_PDO->prepare('SELECT * FROM `users` WHERE `user`= :name LIMIT 1');
			// $zadanie->execute([ 'name' => htmlentities($login) ]);
			// $zadanie->bindParam(1, htmlentities($login), PDO::PARAM_STR);
			// $zadanie->execute();
			
			
		$b = "SELECT * FROM `detale`";
		$zadanie = $db_PDO->query($b);
		$ile_znalezionych = $zadanie->rowCount();
		
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
</div>


<script>


// $(document).ready( function () {
      // $('#npaww').DataTable();
   // });
</script>
