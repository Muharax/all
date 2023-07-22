<div class="table-data">
<?php 
	
	require_once('../database/db.php');
	
		$b = "SELECT * FROM `detale`";
		$zadanie = $db_PDO->query($b);
		$ile_znalezionych = $zadanie->rowCount();
		
	echo '<table id="npaww" class="table">
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


$(document).ready( function () {
      $('#npaww').DataTable();
   });
</script>

<!-- <div class="iico">
	<div class="iico" title="KARTA PAKOWANIA" id="kpa2" data-value="'.$wiersz['karta_pakowania'].'">
	<img class="iico-img" src="../img/workbook.png"></div></div> 
	
	
	

<div class="iico">
	<div class="iico" title="KARTA PAKOWANIA" id="kp_modal" data-value="'.$wiersz['id'].'">
	<img class="iico-img" src="../img/workbook.png"></div></div>
	
	
	

<div class="iico">
	<div class="iico" id="" data-value="'.$wiersz['id'].'">
	<img class="iico-img" src="../img/del.png"></div></div>
	</td>
	
-->