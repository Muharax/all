<?php

		require('../../../database/db.php');
		require('../../../session.php');
		$da = date("Y-m-d");

		$a ='SELECT * FROM `epersum_urlop_k` WHERE user_id="' . $_SESSION['id'] . '"';
		$zadanie = $db_PDO->query($a);
		$ile = $zadanie->rowCount();
		echo '<table class="table table-dark">
				<thead class="thead-dark">
				  <tr>
					<th colspan="6" scope="col">WYKORZYSTANY</td>
				  </tr>
				</thead>
				<tbody>
				 <tr>
					<td scope="col">ID</td>
					<td scope="col">KOD</td>
					<td scope="col">OD</td>
					<td scope="col">DO</td>
					<td scope="col">POWÓD</td>
					<td scope="col">PARAM.</td>
				  </tr>
				';
		for ($i=0; $i < $ile; $i++){
				$wiersz = $zadanie->fetch();
				
		echo '<tr>
			  <td scope="row">'.$wiersz['user_id'].'</td>
			  <td scope="row">'.$wiersz['kod'].'</td>
			  <td scope="row">'.$wiersz['date1'].'</td>
			  <td scope="row">'.$wiersz['date2'].'</td>
			  <td scope="row">'.$wiersz['powod'].'</td>
			  <td scope="row">';
			  
				 
				 if($wiersz['date2'] > $da){
					 echo '<button type="button" class="btn btn-danger btn-sm" title="USUŃ" id="w1" value="'.$wiersz['id'].'">U</button>';
				 }else{
					 echo '<button type="button" class="btn btn-danger btn-sm" title="USUŃ" id="w1" value="'.$wiersz['id'].'" disabled>U</button>';
					 echo '<button type="button" class="btn btn-danger btn-sm" title="USUŃ" id="w1" value="'.$wiersz['id'].'">U</button>';
				 }
			
			  '</td>

			  
			  </tr>';
									
				}
				
		echo '</tbody>
			  </table>';
		exit();

?>