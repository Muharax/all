<?php 
	$ped = $_POST['z1'];

		function DBT(){
				require_once('../database/db.php');
				$b = 'SELECT * FROM `pojemniki`';
				$zadanie = $db_PDO->query($b);
				$ile_znalezionych = $zadanie->rowCount();
				if($ile_znalezionych === 0){
					echo 'Brak wyników';
				}else{
					echo '<select name="pojemniki" id="pojemnik">
						<option value="">--Wybierz nowy pojemnik--</option>';
					
					for ($i=0; $i < $ile_znalezionych; $i++){
						$wiersz = $zadanie->fetch();
						echo '<option value="'.$wiersz['pojemnik'].'">'.$wiersz['pojemnik'].'</option>';
					}
				echo '</select>';
			}
			$db_PDO = null;
		}
// ================================================================================
// ================================================================================
		
		
		
		
		
		
		
		

function karta_pakowania($ID){
	error_reporting(E_ALL);
	require('../database/db.php');
	$b = 'SELECT karta_pakowania FROM `detale` WHERE `id`="'.$ID.'"';
	$zadanie = $db_PDO->query($b);
	$ile_znalezionych = $zadanie->rowCount();
	if($ile_znalezionych === 0){
		echo 'Brak kodu w dziale - detale';
	}else{
		$wiersz = $zadanie->fetch();
		if(empty($wiersz['karta_pakowania'])){
			echo 'Brak głownej karty pakowania';
		}else{
			$ac = '../logistyka/karty_pakowania/'.$wiersz['karta_pakowania'];
			if(!file_exists($ac)){
				echo 'FILE NOT EXIST';
			}else{
				echo '<a target="_blank" href="../logistyka/karty_pakowania/'.$wiersz['karta_pakowania'].'">OPEN</a>';
			}}}}

function karta_pakowania_1($ID){
	error_reporting(E_ALL);
	require('../database/db.php');
	$b = 'SELECT karta_pakowania_1 FROM `detale` WHERE `id`="'.$ID.'"';
	$zadanie = $db_PDO->query($b);
	$ile_znalezionych = $zadanie->rowCount();
	if($ile_znalezionych === 0){
		echo 'Brak kodu w dziale - detale';
	}else{
		$wiersz = $zadanie->fetch();
		if(empty($wiersz['karta_pakowania_1'])){
			echo 'Brak 1';
		}else{
			echo '<a target="_blank" href="../logistyka/karty_pakowania/'.$wiersz['karta_pakowania_1'].'">OPEN</a>';
}}}

function karta_pakowania_2($ID){
	error_reporting(E_ALL);
	require('../database/db.php');
	$b = 'SELECT karta_pakowania_2 FROM `detale` WHERE `id`="'.$ID.'"';
	$zadanie = $db_PDO->query($b);
	$ile_znalezionych = $zadanie->rowCount();
	if($ile_znalezionych === 0){
		echo 'Brak kodu w dziale - detale';
	}else{
		$wiersz = $zadanie->fetch();
		if(empty($wiersz['karta_pakowania_2'])){
			echo 'Brak 2';
		}else{
			echo '<a target="_blank" href="../logistyka/karty_pakowania/'.$wiersz['karta_pakowania_2'].'">OPEN</a>';
}}}
		
		
		
		
		
		
		
		
		
		
			
			
			

			require_once('../database/db-connect.php');
			$a = 'SELECT * FROM `detale` WHERE `id` = "'.$ped.'"';
			$zadanie = $db_PDO->query($a);
			$i = $zadanie->rowCount();
			if($i === 1){
				$wiersz = $zadanie->fetch();

			echo '
			<div class="modal-in">
			<table class="table awde">
		
			
		<input type="hidden" id="pid" value="'.$ped.'">
		<input type="hidden" id="akt-poj" value="'.$wiersz['pojemnik'].'">
		<tbody>
		<tr>
			<td colspan="2" class="td-karty">
			<hr>EDYCJA DANYCH<hr>
			</td>
		</tr>
		<tr>
			<td>NAZWA</td>
			<td><input type="text" id="nn11" value="'.$wiersz['nazwa'].'"></td>
		</tr>
		<tr>
			<td>KOD</td>
			<td><input type="text" id="nn22" value="'.$wiersz['kod'].'"></td>
		</tr>
		<tr>
			<td>AKT POJ</td>
			<td>'.$wiersz['pojemnik'].'</td>
		</tr>
		<tr>
			<td>ZMIEN POJ</td>
			<td>',DBT(),'</td>
		</tr>
		<tr>
			<td>ILOŚĆ</td>
			<td><input type="number" id="nn44" value="'.$wiersz['ilosc'].'"></td>
		</tr>
		<tr>
			<td><button type="button" id="save4">Zapisz</button></td>
			<td></td>
		</tr>
		<tr>
			<td colspan="2" class="td-karty">
			<hr>KARTY PAKOWANIA<hr>
			</td>
		</tr>
		<tr>
			<td>GŁOWNA KARTA</td>
			<td>',karta_pakowania($wiersz['id']),'</td>
		</tr>
		<tr>
			<td>KARTA ALTERNATYWNA 1</td>
			<td>',karta_pakowania_1($wiersz['id']),'</td>
		</tr>
		<tr>
			<td>KARTA ALTERNATYWNA 2</td>
			<td>',karta_pakowania_2($wiersz['id']),'</td>
		</tr>
		
   
   
  
		
		</tbody>
	</table>
	
	
	</div>';
	die();

	
}else{
	echo 'Jest więcej niż 1 wynik';
	exit;
}
			

?>
<script>







$("#file").change(function () {
    var formData = new FormData();
    var totalFiles = document.getElementById("file").files.length;
    for (var i = 0; i < totalFiles; i++) {
        var file = document.getElementById("file").files[i];

        formData.append("file", file);
    }
    $.ajax({
        type: "POST",
        url: '/Admin/PreviewUpload',
        data: formData,
        dataType: 'json',
        contentType: false,
        processData: false,
        success: function (response) {
            alert('succes!!');
        },
        error: function (error) {
            alert("errror");
        }
    });
});
</script>




<!--
		<tr> 
			<td><input type="file" id="file" name="kp_file"></td>
			<td><input type="submit" value="Wyślij plik"/></td>
		</tr>
		
		
-->