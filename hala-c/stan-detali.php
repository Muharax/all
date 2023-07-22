<div class="ttable">
<div class="table-menu">
	<div class="ico-wlini" >
		<img class="iico-img ico-hover"
			 src="../img/del.png"
			 alt="USUŃ ZAZNACZONE"
			 title="USUŃ ZAZNACZONE"
			 id="uzaz">
	</div>
	<div class="ico-wlini">
		<img class="iico-img ico-hover"
		 src="../img/add.png"
		 alt="DODAJ"
		 title="DODAJ">
	</div>
	<div class="ico-wlini">
		<img 
			id="scan-qr"
		 class="iico-img ico-hover"
		 src="../img/qr-code.png"
		 alt="SCAN"
		 title="SCAN">
	</div>
</div>
<div class="load-c"></div>
<?php 
	
	require('../database/db.php');
	
		$b = "SELECT * FROM `hala_c_stan_detali`";
		$zadanie = $db_PDO->query($b);
		$ile_znalezionych = $zadanie->rowCount();
	echo '<table id="npaw" class="tabela-aha1">
	<thead>
	<tr>
			<th>NR</th>
			<th>LOC.</th>
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
				$ii = $i + 1;
				echo '<tr>
						<td><input type="checkbox" class="czekbox" name="check-hala-c" value="'.$wiersz['id'].'">'.$ii.'</td>
						<td>' . $wiersz['loc'] . '</td>
						<td>' . $wiersz['kod'] . '</td>						
						<td>' . $wiersz['nazwa'] . '</td>
						<td>' . $wiersz['min'] . '</td>
						<td>' . $wiersz['ilosc'] . '</td>
						<td>' . $wiersz['max'] . '</td>
						<td>' . $wiersz['wersja'] . '</td>
						<td>	<div class="iico" title="EDYTUJ" id="editto" data-value="'.$wiersz['id'].'">
	<img class="iico-img" src="../img/edit1.png"></div></div>
<div class="iico" title="USUŃ">
	<div class="iico" title="USUŃ" id="delete1" data-value="'.$wiersz['id'].'">
	<img class="iico-img" src="../img/del1.png"></div></div>
<div class="iico">
	<div class="iico" title="KARTA PAKOWANIA" id="kpa" data-value="'.$wiersz['karta_pakowania'].'">
	<img class="iico-img" src="../img/workbook.png"></div></div>
						</td>
					</tr>';
		}
		echo '</tbody>
		</table>';
?>
</div>
<script>



$(document).off('click', '#kpa').on("click", '#kpa', function() {
	var t1 = $(this).data("value");
	var URL = '../logistyka/karty_pakowania/'+t1;
	// $('<a href="'+ URL +'" target="_blank">External Link</a>')[0].click();
		
	$.ajax({
    type: "POST",
    url: "pobieranie-karty-pakowania.php",
	data: {"z1":t1},
	dataType:'text',
    success: function(msg){
		if(msg == '1'){
			$('<a href="'+ URL +'" target="_blank">External Link</a>')[0].click();
		}else{
			$().msgpopup({
				text: ''+msg+'',
				type: 'success'
			});
		}
			
		
    },
});	
});
$(document).ready( function () {
      $('#npaw').DataTable();
});








   </script>