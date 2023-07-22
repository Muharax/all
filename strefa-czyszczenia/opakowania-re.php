<?php
	ob_start();
	error_reporting(E_ALL);
	//------------------------ DODAJ -------------------------
	if(isset($_POST['zmien'])){
		require_once('../database/db-connect.php');
		$id = $_POST['input-h-id'];
		$c = 'SELECT id, priorytet, nazwa_opakowania FROM `opakowania` WHERE id="' . $id . '"';
		$zadanie = $db_PDO->query($c);
		$wiersz = $zadanie->fetch();
		$priorytet = $wiersz['priorytet'];
		if($priorytet=="wysoki"){
			$a ='UPDATE `opakowania` SET `priorytet`="normalny" WHERE id="' . $id . '"';
			$zadanie = $db_PDO->query($a);
		}else{
		if($priorytet=="normalny"){
				$b ='UPDATE `opakowania` SET `priorytet`="wysoki" WHERE id="' . $id . '"';
				$zadanie = $db_PDO->query($b);
		}
		}
		
	session_start();
	$_SESSION['dodano'] = '<div class="green">Zmieniono Priorytet dla '.$wiersz['nazwa_opakowania'].'</div>';
	header('Location: puste-opakowania.php');
	exit();
	}
	
	//------------------------ RE -------------------------
	if(isset($_POST['re'])){
		require('../session.php');
		require('../header.php');
		require ('../logo.php');
		require ('../core/funkcje.php');
		require('../database/db-connect.php');
		$id = $_POST['input-h-id'];
		
		
		$a ='SELECT * FROM `opakowania` WHERE id="' . $id . '"';
		$zadanie = $db_PDO->query($a);
		$wiersz = $zadanie->fetch();

		$nazwa_opakowania = $wiersz['nazwa_opakowania'];
		$ilosc = $wiersz['ilosc'];
		$ilosc_podwozi = $wiersz['ilosc_podwozi'];
		$a = (podwozia($nazwa_opakowania, $ilosc)) + $ilosc_podwozi;

		echo '<a href="puste-opakowania.php"><button class="usun">POWRÓT</button></a>';
		echo '<table class="tabela-f table table-dark">';
		echo '<thead>';
		echo '<tr>';
			
			echo '<th class="tabela-nazwy">POJEMNIK</td>';
			echo '<th class="tabela-nazwy">ILOŚC POJEMNIKÓW</td>';
			echo '<th class="tabela-nazwy">ILOŚC PODWOZI</td>';
			echo '<th class="tabela-nazwy"></td>';
			echo '<th class="tabela-nazwy"></td>';
		
		echo '</tr>';
		echo '</thead>';
		echo '</tbody>';
		
		echo '<tr>';
			echo '<form action="opakowania-re.php" method="POST">
				
					<input type="hidden" name="input-h-id" value="' . $wiersz['id'] . '">';
					
			echo '<td class="tabela-nazwy">' . strtoupper($nazwa_opakowania) . '</td>';
			echo '<td class="tabela-nazwy">
					<input 
						type="number" 
						name="in-i" 
						class="puste-opakowania-input-number"
						onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"
						min="0" 
						max="1000"
						step="1"
						value="' . podwozia_r($nazwa_opakowania, $ilosc) . '"></td>';
			echo '<td class="tabela-nazwy">
					<input 
						type="number" 
						name="in-p" 
						class="puste-opakowania-input-number"
						onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"
						min="0" 
						max="1000"
						step="1"
						value="' . $a . '"></td>';
			echo '<td class="tabela-nnnn"><div class="margin-l-f-10"></div> ';
			echo '<td class="tabela-nn-button">
				   <button type="submit" name="edycja" class="usun">ZMIEN</button>';

			echo '</tr>';
			echo '</tbody>';
			echo '</table>';
	
	}
			
				//------------------------ ZMIEN -------------------------
				
	if(isset($_POST['edycja'])){
		
		require('../database/db-connect.php');
		$id = $_POST['input-h-id'];
		$ilosc_podwozi_n = $_POST['in-p'];
		$ilosc_n = $_POST['in-i'];	
		$a ='SELECT * FROM `opakowania` WHERE id="' . $id . '"';
		$zadanie = $db_PDO->query($a);
		$wiersz = $zadanie->fetch();
		
		$nazwa_opakowania = $wiersz['nazwa_opakowania'];
		$pojemnik_core = $wiersz['nazwa_opakowania'];
		$ilosc = $wiersz['ilosc'];
		$ilosc_podwozi = $wiersz['ilosc_podwozi'];
		$priorytet = $wiersz['priorytet'];
		$czas = $wiersz['czas'];
		$pracownik = $wiersz['pracownik'];
		$czas_realizacji = date("Y-m-d G:i:s");
		
		
		$as ='SELECT * FROM `strefa_czyszczenia_ilosc-opakowan` WHERE pojemnik="' . $pojemnik_core . '"';
		$zadanie_as = $db_PDO->query($as);
		$wiersz_as = $zadanie_as->fetch();
		$aktualna = $wiersz_as['ilosc'];
		
		$ass ='SELECT * FROM `pojemniki` WHERE pojemnik="' . $pojemnik_core . '"';
		$zadanie_ass = $db_PDO->query($ass);
		$wiersz_ass = $zadanie_ass->fetch();
		$dzielnik = $wiersz_ass['dzielnik'];
		
		$total_1 = $ilosc_podwozi_n * $dzielnik;
		$total = $total_1 + $ilosc_n;
		
		if($aktualna < $total){
			session_start();
			$_SESSION['dodano'] = '<div id="dodano"><font color="ORANGE">ZA MAŁO POJEMNIKÓW NA STREFIE</font></div>';
			header('Location: puste-opakowania.php');
			exit();
		}else{
		
		if($ilosc_podwozi_n == $ilosc_podwozi){
			if($ilosc_n == $ilosc){
				header('Location: puste-opakowania.php');
				exit();
		}
	}
	
	
	if(($ilosc_podwozi_n <=> $ilosc_podwozi) || ($ilosc_n <=> $ilosc)){
			
			$ile_np = $ilosc_podwozi_n;
			$ile_ni = $ilosc_n;
			
					   $a = "UPDATE `opakowania` SET `ilosc_podwozi`='$ile_np', `ilosc`='$ile_ni', `edycja`='$czas_realizacji' WHERE `id`='$id'";
						$zadanie = $db_PDO->query($a);
						header('Location: puste-opakowania.php');
						exit();
				}

				
	}
	}
	//------------------------ REALIZUJ -------------------------
	if(isset($_POST['usun'])){
		require_once('../database/db-connect.php');
		$id = $_POST['input-h-id'];
		$a ='SELECT * FROM `opakowania` WHERE id="' . $id . '"';
		$zadanie = $db_PDO->query($a);
		$wiersz = $zadanie->fetch();
		session_start();
		$nazwa_opakowania = $wiersz['nazwa_opakowania'];
		$ilosc = $wiersz['ilosc'];
		$ilosc_podwozi = $wiersz['ilosc_podwozi'];
		$priorytet = $wiersz['priorytet'];
		$czas = $wiersz['czas'];
		$pracownik = $_SESSION['user'];
		$czas_realizacji = date("Y-m-d G:i:s");
		$b = "INSERT INTO `opakowania-zrealizowne`(
							`nazwa_opakowania`, 
							`ilosc`, 
							`ilosc_podwozi`, 
							`priorytet`, 
							`czas`, 
							`pracownik`,
							`czas_realizacji`) 
						VALUES ('$nazwa_opakowania',
								 '$ilosc',
								 '$ilosc_podwozi',
								 '$priorytet',
								 '$czas',
								 '$pracownik',
								 '$czas_realizacji')";
		$zadanie = $db_PDO->query($b);
		$c = 'DELETE FROM `opakowania` WHERE id="' . $id . '"';
		$zadanie = $db_PDO->query($c);
		$d ='SELECT `pkt` FROM `users` WHERE id="' . $_SESSION['id'] . '"';
		$zadanie = $db_PDO->query($d);
		$wiersz = $zadanie->fetch();
		$ile = $wiersz['pkt'];
		$ile_n = $ile + 1;
		$e = 'UPDATE `users` SET `pkt`="' . $ile_n . '" WHERE id="' . $_SESSION['id'] . '"';
		$zadanie = $db_PDO->query($e);
		
		$g = "INSERT INTO `opakowania-usuniete`(
												`nazwa_opakowania`,
												`ilosc`,
												`ilosc_podwozi`,
												`priorytet`,
												`data_dodania`,
												`pracownik`,
												`data_usuniecia`
											)
											VALUES(
												'$nazwa_opakowania',
												'$ilosc',
												'$ilosc_podwozi',
												'$priorytet',
												'$czas',
												'$pracownik',
												'$czas_realizacji'
											)";
		$zadanie = $db_PDO->query($g);
		$_SESSION['dodano'] = '<div class="green">USUNIĘTO POPRAWNIE '.$nazwa_opakowania.'</div>';
		echo '<script>window.location.href = "puste-opakowania.php"</script>';
		// header('Location: puste-opakowania.php');
		exit();
		}
		ob_end_flush();
?>