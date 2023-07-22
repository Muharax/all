<?php 		
		function rozl(){
			require('../../session.php');
			require_once('../../database/db-connect.php');
			$a ='SELECT * FROM `epersum_rozliczenia` WHERE user_id="' . $_SESSION['id'] . '"';
			$zadanie = $db_PDO->query($a);
			$ile = $zadanie->rowCount();
			
			for ($i=0; $i < $ile; $i++){
				$wiersz = $zadanie->fetch();

			echo '<tr>
				  <td scope="row">'.$wiersz['user_id'].'</td>
				  <td scope="row">'.$wiersz['date'].'</td>
				  <td scope="row">'.$wiersz['wej'].'</td>
				  <td scope="row">'.$wiersz['wyj'].'</td>
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
   
   </tr>
</thead>
<tbody>
<?php echo rozl();?>
</tbody>
</table>