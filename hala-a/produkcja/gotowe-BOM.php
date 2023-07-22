<style>
	.B0{
		width:800px;
	}
</style>
<?php 

$wersja = @$_POST['z1'];
$strona = @$_POST['z2'];
$ilosc = @$_POST['z3'];




if(!empty($wersja)){
	echo $wersja.'<br>';
	$T1 = true;
}else{
	echo 'Nie wybrano wersji<br>';
	$T1 = false;
	exit;
}

if(!empty($strona)){
	echo $strona.'<br>';
	$T2 = true;
}else{
	echo 'Nie wybrano strony<br>';
	$T2 = false;
	exit;
}

if(!empty($ilosc)){
	echo $ilosc.'<br>';
	$T3 = true;
}else{
	echo 'Uzupełnij ilość<br>';
	$T3 = false;
	exit;
}





if($T1 === true && $T2 === true && $T3 === true){
		
	require('../../database/db-connect.php');
	
	
	$C = "SELECT `nazwa` FROM `bom` WHERE `kod`='".$wersja."'";
	$zadanie_C = $db_PDO->query($C);
	$wiersz_C = $zadanie_C->fetch();
	$nazwa = $wiersz_C['nazwa'];

		
		
		
	session_start();
	
	$czas = date("Y-m-d G:i:s");
	
	$A = "INSERT INTO `produkcja-aktywne`(
												`nazwa`,
												`kod`,
												`ilosc`,
												`pracownik`,
												`czas`
												
											)
											VALUES(
												   '".$nazwa."',
												   '".$wersja."',
												   '".$ilosc."',
												   '".$_SESSION['user']."',
												   '".$czas."'
												   )";
	$zadanie_A = $db_PDO->query($A);
}


	$B = "SELECT * FROM `produkcja-aktywne`";
	$zadanie = $db_PDO->query($B);
	$ile = $zadanie->rowCount();
	
	$wiersz = $zadanie->fetch();
	$nazwa = $wiersz['kod'];
	$kod = $wiersz['kod'];
	$ilosc_A = $wiersz['ilosc'];
?>
<div class="B0">
	<table class="table table-dark">
		<thead>
			<tr>
				<th>PRODUKCJA: <span style="font-size:25px"><?php echo $nazwa;?></span></th>
				<th>ILOŚĆ: <span style="font-size:25px"><?php echo $kod;?></span></th>
				<th>Strona: <span style="font-size:25px"><?php echo $ilosc_A;?></span></th>
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