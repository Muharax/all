<style>
	.B0{
		width:800px;
	}
</style>
<?php 

$kod = @$_POST['z1'];
$strona = @$_POST['z2'];
$ilosc = @$_POST['z3'];

echo $kod.'<br>';
echo $strona.'<br>';
echo $ilosc.'<br>';

// exit;


if(!empty($kod)){
	$T1 = true;
}else{
	echo 'Nie wybrano wersji<br>';
	$T1 = false;
	exit;
}

if(!empty($strona)){
	$T2 = true;
}else{
	echo 'Nie wybrano strony<br>';
	$T2 = false;
	exit;
}

if(!empty($ilosc)){
	$T3 = true;
}else{
	echo 'Uzupełnij ilość<br>';
	$T3 = false;
	exit;
}

require_once('../../database/db-connect.php');

	$D = "SELECT `kod` FROM `produkcja-aktywne` WHERE `kod`='".$kod."'";
	$zadanie_D = $db_PDO->query($D);
	$ile_D = $zadanie_D->rowCount();
	
	if($ile_D >= 1){
		echo 'Taka produkcja już istnieje, przejdź do zakładki AKTYWNE aby dokończyć produkcję';
		exit();
	}else{
		echo 'ELO';
		exit();
	}


		if($T1 == true && $T2 == true && $T3 == true){

			$C = "SELECT `nazwa` FROM `bom` WHERE `kod`='".$kod."'";
			$zadanie_C = $db_PDO->query($C);
			$wiersz_C = $zadanie_C->fetch();
			$nazwa = $wiersz_C['nazwa'];

			session_start();
			
			$czas = date("Y-m-d G:i:s");

			$h = "INSERT INTO `produkcja-aktywne`(
														`nazwa`,
														`kod`,
														`ilosc`,
														`pracownik`,
														`czas`
														
													)
													VALUES(
														   '".$nazwa."',
														   '".$kod."',
														   '".$ilosc."'
														   '".$_SESSION['user']."',
														   '".$czas."'
														   )";
			$zadanie = $db_PDO->query($h);
		}

			// $B = "SELECT * FROM `produkcja-aktywne`";
			// $zadanie_B = $db_PDO->query($B);
			// $ile_B = $zadanie_B->rowCount();
			
			// $wiersz_B = $zadanie_B->fetch();
			// $nazwa = $wiersz_B['kod'];
			// $kod = $wiersz_B['kod'];
			// $ilosc_A = $wiersz_B['ilosc'];

?>
<div class="B0">
	<table class="table table-dark">
		<thead>
			<tr>
				<!-- <th>PRODUKCJA: <span style="font-size:25px"><?php echo $nazwa;?></span></th> -->
				<!-- <th>ILOŚĆ: <span style="font-size:25px"><?php echo $kod;?></span></th> -->
				<!-- <th>Strona: <span style="font-size:25px"><?php echo $ilosc;?></span></th> -->
			</tr>
		</thead>
		<tbody>
			<tr>
				<td colspan="3">WYPRODUKOWANO: 0</td>
			</tr>
			<tr>
				<td colspan="3"><button style="font-size:20px; width:100px;height:40px;">+1</button></td>
			</tr>
		</tbody>
	</table>
</div>