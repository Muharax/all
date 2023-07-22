<?php

function name($X){
	try{
		require('../../database/db-connect.php');
		$query = 'SELECT * FROM `users` WHERE `id`=:id LIMIT 1';
		$zadanie= $db_PDO->prepare($query);
		$zadanie->execute(array(':id' => $X));
		$ile = $zadanie->rowCount();
		
		if($ile === 0){
			return '<font color="RED">SYSTEM</font>';
		}else{
			$wiersz = $zadanie->fetch();
			return $wiersz['user'] ?? '<font color="yellow">Brak użytkownika</font>';
		}

	}catch (PDOException $error){
		return $error->getMessage();
		exit('error');
	}
}


function zablokowani_uzytkownicy($id){
	require('../../database/db-connect.php');
	if($id === 25 || $id === 22 || $id === 18 || $id === 83){
		return '<div class="error-info-red br">TEN UŻYTKOWNIK JEST ZABLOKOWANY</div>';
		exit();
	}
}





function DBS($KOD, $ILOSC){
					error_reporting(E_ALL);
				require('../../database/db.php');
				$b = 'SELECT * FROM `detale` WHERE `kod`="'.$KOD.'"';
				$zadanie = $db_PDO->query($b);
				$ile_znalezionych = $zadanie->rowCount();
				if($ile_znalezionych === 0){
					echo $ile_znalezionych;
					echo ' Brak wyników';
				}
				elseif($ile_znalezionych < 0)
				{
					echo 'Nie może być mniejsze od zera';
				}else{
					$wiersz = $zadanie->fetch();
					$dz = $wiersz['ilosc'];
					$finish = $ILOSC / $dz;
					return $ILOSC.' szt/'.floor($finish).' opakowań';
				}
			}
			
			
			
			
 class USUN {
	 
	 public $id;
	 
	 function HC($X){
		require('../database/db-connect.php');
		$a = "DELETE FROM `hala_c_stan_detali` WHERE `id` = '".$X."'";
		$zadanie = $db_PDO->query($a);
	 }
 }
 
 
function dodaj_pkt($ID, $ILE){
	require('../../database/db-connect.php');
	$HHH = "SELECT `pkt` FROM `users` WHERE `id` = '".$ID."'";
		$zadanie_HHH = $db_PDO->query($HHH);
		$WH = $zadanie_HHH->fetch();
		$pkt = $WH['pkt']+$ILE;
		$FFF = "UPDATE
					`users`
				SET
					`pkt` = '".$pkt."'
				WHERE
					`id`='".$_SESSION['id']."'";
												   
		$zadanie_FFF = $db_PDO->query($FFF);
		return;
}



class rc {
		
		function edit($pid){
		require('../../database/db-connect.php');
		require('../../funkcjee.php');
		$a = 'SELECT * FROM `market_zamowienia` WHERE `id`="'.$pid.'"';
		$zadanie_a = $db_PDO->query($a);
		$ile = $zadanie_a->rowCount();
		
		$ww = new ww();
		
		
		if($ile === 1){
			$wiersz = $zadanie_a->fetch();
			
	echo '<table class="table">
			<tr>
			<td>KOD</td>
			<td><input type="text" class="ab1" value="'.$wiersz['kod'].'"></td>
			<td><button class="btn btn-sm">E</button></td>
			</tr>
			
			<tr>
			<td>NAZWA</td>
			<td><input type="text" class="ab1" value="'.$wiersz['nazwa'].'"></td>
			<td><button class="btn btn-sm">E</button></td>
			</tr>
			
			<tr>
			<td>LOKALIZACJA</td>
			<td><input type="text" class="ab1" value="'.$wiersz['loc'].'"></td>
			<td><button class="btn btn-sm">E</button></td>
			</tr>
			
			<tr>
			<td title="STAN DO REALIZACJI">STAN</td>
			<td><input type="text" class="ab1" id="ilm" value="'.$wiersz['ilosc_zamowiona'].' - '.$ww->tt($wiersz['ilosc_zamowiona'], $wiersz['kod']).'"></td>
			<td><button class="btn btn-sm">E</button></td>
			</tr>

			
			</table>
			<input type="hidden" id="pid" value="'.$pid.'">
			';
		}else{
			echo 'BLAD';
			die;
		}
		
		}
	

		
		
		
		function edit_1($pid){
		require('../../database/db-connect.php');
		require('../../funkcjee.php');
		$a = 'SELECT * FROM `market_stan_detali` WHERE `id`="'.$pid.'"';
		$zadanie_a = $db_PDO->query($a);
		$ile = $zadanie_a->rowCount();
		
		$ww = new ww();
		
		
		if($ile === 1){
			$wiersz = $zadanie_a->fetch();
			
	echo '<table class="table">
			<tr>
			<td>KOD</td>
			<td><input type="text" class="ab1" value="'.$wiersz['kod'].'"></td>
			<td><button class="btn btn-sm">E</button></td>
			</tr>
			
			<tr>
			<td>NAZWA</td>
			<td><input type="text" class="ab1" value="'.$wiersz['nazwa'].'"></td>
			<td><button class="btn btn-sm">E</button></td>
			</tr>
			
			<tr>
			<td>LOKALIZACJA</td>
			<td><input type="text" class="ab1" value="'.$wiersz['loc'].'"></td>
			<td><button class="btn btn-sm">E</button></td>
			</tr>
			
			<tr>
			<td title="STAN DO REALIZACJI">STAN</td>
			<td><input type="text" class="ab1" id="ilm" value="'.$wiersz['ilosc'].' - '.$ww->tt($wiersz['ilosc'], $wiersz['kod']).'"></td>
			<td><button class="btn btn-sm">E</button></td>
			</tr>

			
			</table>
			<input type="hidden" id="pid" value="'.$pid.'">
			';
		}else{
			echo 'BLAD';
			die;
		}
		
	
		}

		
		
		function edit_3($kod){
		require('../../database/db-connect.php');
		require('../../funkcjee.php');
		$a = 'SELECT * FROM `hala_c_stan_detali` WHERE `kod`="'.$pid.'"';
		$zadanie_a = $db_PDO->query($a);
		$ile = $zadanie_a->rowCount();
		$w = $zadanie_a->fetch();

		$il = $w['ilosc'];
		
		
		
		
		
		
	
		}

}
	
	function x($x, $y){
		require('database/db-connect.php');
		$b = 'SELECT `ilosc` FROM `detale` WHERE `kod`="'.$y.'"';
		
		$zadanie_b = $db_PDO->query($b);
		$ile = $zadanie_b->rowCount();
	if($ile === 0){
		return "0";
	}else{
		$wiersz_b = $zadanie_b->fetch();
		$tot = $x / $wiersz_b['ilosc'];
		$totres = $x % $wiersz_b['ilosc'];
		$total = floor($tot);
		return $total.'/'.$totres;
	}
	}
		
	
	





function strona($ale){
		
		if($ale == "L"){
			
			$all = "PR";
			echo $all;
		
		}
		
		if($ale == "pr"){
			
			$all = "L";
			echo $all;
		
		}

		
}

function w_drodze($x){
		
		require('../../database/db.php');
		$a = "SELECT `status` FROM `market_stan_detali` WHERE `kod`='".$x."'";
		$zadanie = $db_PDO->query($a);
		$wiersz = $zadanie->fetch();
		
	$b = 'SELECT SUM(ilosc) as TOTAL FROM `market_zamowienia_archiwum` WHERE `kod`="' . $x . '"';
	$zadanieb = $db_PDO->query($b);
	$wierszb = $zadanieb->fetch(PDO::FETCH_NUM);
	$total = $wierszb[0];

		
		if(!empty($wiersz['status'])){
			if($wiersz['status'] == 1){
				 return '<div style="color:green">Zamówiono</div>';
			}
			if($wiersz['status'] == 2){
				 return '<div style="color:#b0760a">Transport ('.$total.')</div>';
			}
			if($wiersz['status'] == 3){
				 return '<div style="color:orange">CO teraz?</div>';
			}
		}
		
		if(empty($wiersz['status'])){
		return "-";
		}
}


function ze($c, $z, $a){
			
			if($c < $z){
				return '<font color="red">'.$c.'</font>';
			}else{
				if($c > $a){
					return '<font color="orange">'.$c.'</font>';
				}else{
					return $c;
					 }
			
			
			}
}

		

?>