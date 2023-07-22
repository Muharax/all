<?php
function dodaj(){
		
	if(isset($_POST['z1']) && isset($_POST['z2']) && isset($_POST['z3'])){
		$data1 = $_POST['z1'];
		$data2 = $_POST['z2'];
		$data3 = $_POST['z3'];
		require('../../database/db.php');
		
		$i = 1;
		$a ='INSERT INTO `epersum_urlop_k`(
							`user_id`,
							`date1`,
							`date2`,
							`accept`
						)
						VALUES(
							'.$_SESSION['id'].',
							'.$data1.',
							'.$data2.',
							'.$i.'
							
							
						)';
		$zadanie = $db_PDO->query($a);
		
		echo 'SUKCESS-1';
		exit();
		}else{
			echo 'NOT RESPONDING';
		}
}
		
// ================================================================================	
// ================================================================================	
// ================================================================================	

	function ile(){
		require_once('../../database/db-connect.php');
		$c = 'SELECT `urlop` FROM users WHERE id="' . $_SESSION['id'] . '"';
		$zadanie = $db_PDO->query($c);
		$wiersz = $zadanie->fetch();
		$ile = $wiersz['urlop'];
		return $ile;
}
// ================================================================================	
// ================================================================================	
// ================================================================================	

		
		function aktur(){
		require('../../database/db.php');
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
				 echo '<button type="button" class="btn btn-primary btn-sm" title="EDYTUJ" id="e1" value="'.$wiersz['id'].'">E</button>';
				}else{
					echo '<button type="button" class="btn btn-primary btn-sm" title="EDYTUJ" id="e1" value="'.$wiersz['id'].'" disabled>E</button>';
				}
				 
				 if($wiersz['date1'] > $da){
					 echo '<button type="button" class="btn btn-danger btn-sm" title="USUŃ" id="w1" value="'.$wiersz['id'].'">U</button>';
				 }else{
					 echo '<button type="button" class="btn btn-danger btn-sm" title="USUŃ" id="w1" value="'.$wiersz['id'].'" disabled>U</button>';
				 }
				 
				 if($wiersz['accept'] === 1){
					 
					echo '<button type="button" class="btn btn-success btn-sm" title="AKCEPTUJ" id="w1" value="'.$wiersz['id'].'">A</button>';
				 }else{
					 echo '<button type="button" class="btn btn-success btn-sm" title="AKCEPTUJ" id="w1" value="'.$wiersz['id'].'" disabled>A</button>';
				 }
				 
			  '</td>

			  
			  </tr>';
									
				}
				
		echo '</tbody>
			  </table>';
		exit();
		}
// ================================================================================	
// ================================================================================	
// ================================================================================	

		




?>