<?php

if(isset($_POST['animas'])){
	if((empty($_POST['m9-ilosc']) AND empty($_POST['m9-podwozia'])) OR empty($_POST['pojemnik-core'])){
		require('../session.php');
		$_SESSION['dodano'] = '<div class="orange">WYBIERZ POJEMNIK</div>';
		header('Location: puste-opakowania.php');
		exit();
	}
	$ilosc = $_POST['m9-ilosc'];
	$ilosc_podwozi = $_POST['m9-podwozia'];
	
		if(empty($ilosc)){
		$ilosc = 0;
		}
		if(empty($ilosc_podwozi)){
		$ilosc_podwozi = 0;
		}
		if(!isset($ilosc)){
		$ilosc = 0;
		}
		if(!isset($ilosc_podwozi)){
		$ilosc_podwozi = 0;
		}
	require ('../database/db.php');
	$pojemnik_core = $_POST['pojemnik-core'];
	
	
	
	
	
	$A ='SELECT * FROM `opakowania` WHERE `nazwa_opakowania`="' . $pojemnik_core . '"';
	$zadanie_A = $db_PDO->query($A);
	$wiersz_A = $zadanie_A->rowCount();
	if($wiersz_A > 0){
		require('../session.php');
		$_SESSION['dodano'] = '<div class="orange">TAKI POJEMNIK JUZ ISTNIEJE, EDYTUJ ISTNIEJĄCY
		</div>';
		$_SESSION['EA'] = $pojemnik_core;
		header('Location: puste-opakowania.php');
		exit;
	}






	$as ='SELECT * FROM `strefa_czyszczenia_ilosc-opakowan` WHERE pojemnik="' . $pojemnik_core . '"';
	$zadanie_as = $db_PDO->query($as);
	$wiersz_as = $zadanie_as->fetch();
	$aktualna = $wiersz_as['ilosc'];
	$ass ='SELECT * FROM `pojemniki` WHERE pojemnik="' . $pojemnik_core . '"';
	$zadanie_ass = $db_PDO->query($ass);
	$wiersz_ass = $zadanie_ass->fetch();
	$dzielnik = $wiersz_ass['dzielnik'];
	$asss ='SELECT SUM(ilosc) AS TOTAL FROM `opakowania` WHERE `nazwa_opakowania`="' . $pojemnik_core . '"';
	$az ='SELECT SUM(ilosc_podwozi)AS TOTAL FROM `opakowania` WHERE `nazwa_opakowania`="' . $pojemnik_core . '"';
	$zadanie_asss = $db_PDO->query($asss);
	$zadanie_az = $db_PDO->query($az);
	$wiersz_asss = $zadanie_asss->fetch(PDO::FETCH_NUM);
	$wiersz_az = $zadanie_az->fetch(PDO::FETCH_NUM);
	$total_ilosc = $wiersz_asss[0];
	$total_podwozi = $wiersz_az[0];
	$total_h = $ilosc + ($ilosc_podwozi * $dzielnik);
	$total_g = $total_ilosc + ($total_podwozi * $dzielnik);
	$total_z = $total_h + $total_g;
	if($aktualna < $total_z){
		require('../session.php');
		$_SESSION['dodano'] = '<div class="orange">ZA MAŁO POJEMNIKÓW</div>';
		header('Location: puste-opakowania.php');
		exit();
	}else{
		$total_1 = $ilosc_podwozi * $dzielnik;
		$total = $total_1 + $ilosc;
		
		if($aktualna < $total){
			require('../session.php');
			$_SESSION['dodano'] = '<div class="orange">ZA MAŁO POJEMNIKÓW NA STREFIE</div>';
			header('Location: puste-opakowania.php');
			exit();
		}else{
			if(empty($_POST['priorytet'])){
				$priorytet = "normalny";
			}else{
				$priorytet = $_POST['priorytet'];
			}
			$czas = date("Y-m-d G:i:s");
			require('../session.php');
			$user = $_SESSION['user'];
			$a = "INSERT INTO `opakowania`(
								`nazwa_opakowania`,
								`ilosc`,
								`ilosc_podwozi`,
								`priorytet`,
								`czas`,
								`pracownik`)
					VALUES ('$pojemnik_core',
							'$ilosc',
							'$ilosc_podwozi',
							'$priorytet',
							'$czas',
							'$user')";
			$zadanie = $db_PDO->query($a);
			$_SESSION['dodano'] = '<div class="green">ZLECENIE DODANE ('.$pojemnik_core.')</div>';
			header('Location: puste-opakowania.php');
			// header('Location: puste-opakowania.php');
			exit();
		}
	}
}
/*=================================================================================================
=================================================================================================== */
if(isset($_POST['karaska'])){
$pojemnik = $_POST['pojemnik'];
$ilosc = $_POST['m9-ilosc'];
$ilosc_podwozi = $_POST['m9-podwozia'];
if(($ilosc_podwozi == 0 OR empty($ilosc_podwozi)) AND ($ilosc == 0 OR empty($ilosc)) OR empty($_POST['pojemnik'])){
session_start();
$_SESSION['dodano'] = '<div class="orange">UZUPEŁNIJ DANE</div>';
header('Location: puste-opakowania-przyjecie.php');
exit();
}
else{
session_start();
$pojemnik_core = $_POST['pojemnik'];
require ('../database/db.php');
$czas = date("Y-m-d G:i:s");
$user = $_SESSION['user'];
$b = 'SELECT * FROM `pojemniki` WHERE `pojemnik`="' . $pojemnik_core . '"';
$zadanie = $db_PDO->query($b);
$wiersz = $zadanie->fetch();
$dz = $wiersz['dzielnik'];
$a = "INSERT INTO `opakowania-przyjecia`(`nazwa`,
`ilosc`,
`ilosc_podwozi`,
`czas`,
`pracownik`)
VALUES ('$pojemnik_core',
'$ilosc',
'$ilosc_podwozi',
'$czas',
'$user')";
$zadanie = $db_PDO->query($a);
if($ilosc_podwozi > 0 AND $ilosc > 0){
$ile = $ilosc_podwozi * $dz;
$ile_f = $ile + $ilosc;
}
if($ilosc_podwozi > 0 AND ($ilosc === 0 OR empty($ilosc))){
$ile_f = $ilosc_podwozi * $dz;
}
if($ilosc > 0 AND ($ilosc_podwozi === 0 OR empty($ilosc_podwozi))){
$ile_f = $ilosc;
}
$c = 'SELECT `ilosc` FROM `strefa_czyszczenia_ilosc-opakowan` WHERE pojemnik="' . $pojemnik_core . '"';
$zadanie = $db_PDO->query($c);
$wiersz = $zadanie->fetch();
$ile_pojemnikow = $wiersz['ilosc'];
$new_ile_pojemnikow = $ile_pojemnikow + $ile_f;
$d = "UPDATE
`strefa_czyszczenia_ilosc-opakowan`
SET
`ilosc` = '$new_ile_pojemnikow'
WHERE
`pojemnik` = '$pojemnik_core'";
$zadanie = $db_PDO->query($d);
$_SESSION['dodano'] = '<div class="green">Dodano '.$pojemnik_core.' | '.$ile_f.'</div>';
header('Location: puste-opakowania-przyjecie.php');
exit();
}
}
ob_end_flush();
?>