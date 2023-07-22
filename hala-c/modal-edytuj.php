<?php 
	$z1 = $_POST['z1'];
	echo $z1;
	// exit;

	$ped = $_POST['z1'];


			require_once('../database/db-connect.php');
			$a = 'SELECT * FROM `hala_c_stan_detali` WHERE `id` = "'.$ped.'"';
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
			<td><input type="number" id="nn5" value="'.$wiersz['max'].'"></td>
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
		<tr>
			<td>Karta Pakowania</td><td>'.$wiersz['karta_pakowania'].'
		</td>
		</tr>
		<tr> 
			<td>
			
			<input type="file" id="file" name="kp_file"></td>
			
			<td><input type="submit" value="Wyślij plik"/></td>
		</tr>
   
   
  
		
		</tbody>
	</table>
	
	
		<button type="button" id="save1">Zapisz</button>
		
	
	
	</div>
	';
			die();

	

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