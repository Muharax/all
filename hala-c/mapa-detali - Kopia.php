<?php 
function mapa_AA($KOD){
	require('../database/db-connect.php');
	$C = "SELECT * FROM `hala_c_stan_detali` WHERE `kod`='".$KOD."'";
		$zadanie_C = $db_PDO->query($C);
		$wiersz_C = $zadanie_C->fetch();
		$HALA_C_ILOSC = $wiersz_C['ilosc'];

	$sql_1 = 'SELECT * FROM `detale` WHERE `kod`="'.$KOD.'"';
		$zadanie_1 = $db_PDO->query($sql_1);
		$wiersz_1 = $zadanie_1->fetch();
		$pakowanie = $wiersz_1['ilosc'];

	$sql_2 = 'SELECT * FROM `pojemniki` WHERE `pojemnik`="'.$wiersz_1['pojemnik'].'"';
		$zadanie_2 = $db_PDO->query($sql_2);
		$wiersz_2 = $zadanie_2->fetch();
		$podwozia = $wiersz_2['dzielnik'];
		
			$bbb1 = ($HALA_C_ILOSC / $pakowanie) / $podwozia;
			$bbb = round($bbb1, 0);
			$end1 = 10 - $bbb;
			$end = $end1;
			
			if($end <= 10 && $end > 0){
				for($i=0;$i<$end;$i++){
			
					echo '<div title="PUSTE" style="display:inline-block;border:1px solid black;width:15px;height:15px;margin-left:2px;"></div>';
				}

				for($i=0;$i<=$bbb;$i++){
					echo '<div title="DANE:'.$wiersz_C['nazwa'].$wiersz_C['kod'].'" style="display:inline-block;border:1px solid black;width:15px;height:15px;margin-left:2px;background-color:green;"></div>';
				}
				
			}
			if($end > 10){
				for($i=0;$i<$end;$i++){
			
				echo '<SMALL>xxxxxxxxxxx</SMALL>';
				}
				
			}
	

}

function mapa_BB($KOD){
	require('../database/db-connect.php');
	$C = "SELECT * FROM `hala_c_stan_detali` WHERE `kod`='".$KOD."'";
		$zadanie_C = $db_PDO->query($C);
		$wiersz_C = $zadanie_C->fetch();
		$HALA_C_ILOSC = $wiersz_C['ilosc'];

	$sql_1 = 'SELECT * FROM `detale` WHERE `kod`="'.$KOD.'"';
		$zadanie_1 = $db_PDO->query($sql_1);
		$wiersz_1 = $zadanie_1->fetch();
		$pakowanie = $wiersz_1['ilosc'];

	$sql_2 = 'SELECT * FROM `pojemniki` WHERE `pojemnik`="'.$wiersz_1['pojemnik'].'"';
		$zadanie_2 = $db_PDO->query($sql_2);
		$wiersz_2 = $zadanie_2->fetch();
		$podwozia = $wiersz_2['dzielnik'];

		$bbb1 = ($HALA_C_ILOSC / $pakowanie) / $podwozia;
		$bbb = round($bbb1, 0);
		$end1 = 10 - $bbb;
		$end = round($end1, 0);
		$color = rand(111111,999999);
		
		for($i=0;$i<=$bbb;$i++){
			echo '<div title="DANE:'.$wiersz_C['nazwa'].'" style="display:inline-block;border:1px solid black;width:15px;height:15px;margin-left:2px;background-color:#'.$color.';"></div>';
		}
		for($i=0;$i<$end;$i++){
			echo '<div title="PUSTE" style="display:inline-block;border:1px solid black;width:15px;height:15px;margin-left:2px;"></div>';
		}

}

echo '<div style="width: 280px;float:left;background-color:white;padding:10px;border-radius:3px;">';

require('../database/db-connect.php');
$C = "SELECT * FROM `hala_c_stan_detali` ORDER BY `loc` ASC";
		$zadanie_C = $db_PDO->query($C);
			$ile = $zadanie_C->rowCount();
			
	for ($i=0; $i < $ile; $i++){
		$wiersz_C = $zadanie_C->fetch();
		echo '<tr>
				<td>'.mapa_AA($wiersz_C['kod']).$wiersz_C['loc'].'<br></td>	
			</tr>';
			}
	echo '</div>';
	
echo '<div style="width:120px;height:1400px;border:1px solid black;float:left;background-color:grey;"></div>';
		
	echo '<div style="width: 280px;float:left;background-color:white;padding:10px;border-radius:3px;">';
	$C = "SELECT * FROM `hala_c_stan_detali` ORDER BY `loc` ASC";
		$zadanie_C = $db_PDO->query($C);
	for ($i=0; $i < $ile; $i++){
			$wiersz_C = $zadanie_C->fetch();
		echo '<tr>
				<td>'.$wiersz_C['loc'].mapa_BB($wiersz_C['kod']).'<br></td>	
			</tr>';
			}
			
	echo '</div>';
	

		
// require('../database/db-connect.php');
// $C = "SELECT * FROM `hala_c_stan_detali`";
		// $zadanie_C = $db_PDO->query($C);
	
			
	// echo '</div>';
	
// echo '<br>';
// echo '<br>';
	// $ii = 0;
	// while($ii < 10){
		// echo $ii++;
	// }
// echo '<br>';
// echo '<br>';

// echo '<br>';echo '<br>';


// $array = array(
	// "foo" => "bra"
// );
// var_dump($array);
// echo '<br>';
// $array = [
// "ale"=>"leeee"
// ];
// var_dump($array);

?>