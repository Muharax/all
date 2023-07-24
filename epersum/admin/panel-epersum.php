<?php 		
		function rozl(){
			require('../../session.php');
			require_once('../../database/db-connect.php');
			$a ='SELECT * FROM `epersum_rozliczenia`';
			$zadanie = $db_PDO->query($a);
			$ile = $zadanie->rowCount();
		
			for ($i=0; $i < $ile; $i++){
				$wiersz = $zadanie->fetch();

		echo '<tr>
			  <td scope="row">'.$wiersz['user_id'].'</td>
			  <td scope="row">'.$wiersz['date'].'</td>
			  <td scope="row">'.$wiersz['wej'].'</td>
			  <td scope="row">'.$wiersz['wyj'].'</td>
			  <td scope="row">
				 <button type="button" class="btn btn-danger btn-sm" title="USUŃ" id="w2" value="'.$wiersz['id'].'">U</button>';
				 
				  if($wiersz['accept'] === 0){
					 echo '<button type="button" class="btn btn-success btn-sm" title="AKCEPTUJ" id="w3" value="'.$wiersz['id'].'">A</button>';
				 }else{
					 echo '<button type="button" class="btn btn-success btn-sm" title="AKCEPTUJ" id="w3" value="'.$wiersz['id'].'" disabled>A</button>';
				 }
				 
				 
				 echo '<button type="button" class="btn btn-info btn-sm" title="ZGŁOŚ ZMIANY" id="w4" value="'.$wiersz['id'].'">Z</button>
				 
			  </td>

			  
			  </tr>';
									
				}
		}
		
?>

<table class="tda table table-striped table-dark">
<thead class="thead-dark">
  <tr>
    <th scope="col">ID</th>
	<th scope="col">DATA</th>
    <th scope="col">WEJ.</th>
    <th scope="col">WYJ.</th>
    <th scope="col">PARAM.</th>
   
   </tr>
</thead>
<tbody>
<?php echo rozl();?>
</tbody>
</table>