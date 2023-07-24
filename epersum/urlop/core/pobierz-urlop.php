<style>
	.center{
		text-align:center;
	}
	.tx{
		color:black;
		min-height:29px;
		max-height:100px;
	}
	.tx2{
		min-width:350px;
	}
</style>

<?php
		require('../../../session.php');
		$data = date("Y-m-d");
		$a ='SELECT * FROM `epersum_urlop_k` WHERE user_id="' . $_SESSION['id'] . '" ORDER BY `id` ASC';
		$zadanie = $db_PDO->query($a);
		$ile = $zadanie->rowCount();
?>
<table class="table table-dark">
	<tbody>
		<tr>
			<th scope="col">KOD</th>
			<th scope="col">OD</th>
			<th scope="col">DO</th>
			<th scope="col">POWÓD</th>
			<th scope="col">DATA DODANIA</th>
			<th scope="col">ILOŚĆ DNI</th>
			<th scope="col">PARAM.</th>
		</tr>
<?php
		for ($i=0; $i < $ile; $i++){
				$wiersz = $zadanie->fetch();
		echo '<tr>
				  <td scope="row">'.$wiersz['kod'].'</td>
				  <td scope="row">'.$wiersz['date1'].'</td>
				  <td scope="row">'.$wiersz['date2'].'</td>
				  <td scope="row">'.$wiersz['powod'].'</td>
				  <td scope="row">'.$wiersz['czas_dodania'].'</td>
				  <td scope="row">'.$wiersz['ilosc_dni'].'</td>
				  <td scope="row">';
			  
				 
				 if($wiersz['date1'] > $data){
					 echo '<button type="button" class="btn btn-danger btn-sm" title="USUŃ" id="usun" value="'.$wiersz['id'].'">U</button>';
				 }else{
					 echo '<button type="button" class="btn btn-danger btn-sm" title="USUŃ" id="usun" value="'.$wiersz['id'].'" disabled>U</button>';
					 echo '<button type="button" class="btn btn-danger btn-sm" title="USUŃ" id="usun" value="'.$wiersz['id'].'">U</button>';
				 }
			
			  '</td>
</tr>';
									
				}
				
		echo '</tbody>
			  </table>';
		exit();

?>