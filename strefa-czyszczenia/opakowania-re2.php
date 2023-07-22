<?php
	class punkty {	
		
		function dodaj($i) {
			if($_SESSION['id'] === false OR $_SESSION['id'] === ''){
				return false;
			}else{
				require('../database/db-connect.php');
				$d ='SELECT `pkt` FROM `users` WHERE id="' . $_SESSION['id'] . '"';
				$zadanie_d = $db_PDO->query($d);
				$wiersz_d = $zadanie_d->fetch();
				$ile = $wiersz_d['pkt'];
				$ile_n = $ile + $i;
				$e = 'UPDATE `users` SET `pkt`="' . $ile_n . '" WHERE id="' . $_SESSION['id'] . '"';
				$zadanie_e = $db_PDO->query($e);
			}	
		}
	}
	$punkty = new punkty();
	



	ob_start();
	//------------------------ REALIZUJ -------------------------
	
	if(isset($_POST['usun'])){
	
		require('../database/db-connect.php');
		$id = $_POST['input-h-id'];
		$a ='SELECT * FROM `opakowania` WHERE id="' . $id . '"';
		$zadanie_a = $db_PDO->query($a);
		$wiersz_a = $zadanie_a->fetch();
		$nazwa_opakowania = $wiersz_a['nazwa_opakowania'];
		$ilosc = $wiersz_a['ilosc'];
		$ilosc_podwozi = $wiersz_a['ilosc_podwozi'];
		$priorytet = $wiersz_a['priorytet'];
		$czas = $wiersz_a['czas'];
		session_start();
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
		
		$zadanie_b = $db_PDO->query($b);
	
		$c = 'DELETE FROM `opakowania` WHERE id="' . $id . '"';
		$zadanie_c = $db_PDO->query($c);
		
		$punkty->dodaj(1); // Dodanie punktu za realizację zadania 
		
		
		$f = 'SELECT * FROM `strefa_czyszczenia_ilosc-opakowan` WHERE `pojemnik`="' . $nazwa_opakowania . '"';
		$zadanie_f = $db_PDO->query($f);
		$wiersz_f = $zadanie_f->fetch();
		$ile_poj = $wiersz_f['ilosc'];
		
		$g = 'SELECT * FROM `pojemniki` WHERE `pojemnik`="' . $nazwa_opakowania . '"';
		$zadanie_g = $db_PDO->query($g);
		$wiersz_g = $zadanie_g->fetch();
		$dzielnik = $wiersz_g['dzielnik'];
		
		$total = $ile_poj - (($ilosc_podwozi * $dzielnik) + $ilosc);

		
		$h = "UPDATE `strefa_czyszczenia_ilosc-opakowan` SET `ilosc`='$total' WHERE `pojemnik`='$nazwa_opakowania'";
		$zadanie_h = $db_PDO->query($h);
		
	session_start();
	$_SESSION['dodano'] = '<div class="green">ZREALIZOWANO POPRAWNIE: '.$nazwa_opakowania.' ILOŚĆ: '.$total.'</div>';
	header('Location: puste-opakowania-zlecenia.php');
	exit();
	
	}
//========================= REALIZUJ CZĘŚCIOWO =============================
//==========================================================================
	if(isset($_POST['re'])){
		require('../session.php');
		require('../header.php');
		require ('../logo.php');
		require_once('../database/db-connect.php');
		require_once('../core/funkcje.php');
		$id = $_POST['input-h-id'];
		
		
		$a ='SELECT * FROM `opakowania` WHERE id="' . $id . '"';
		$zadanie = $db_PDO->query($a);
		$wiersz = $zadanie->fetch();

		$nazwa_opakowania = $wiersz['nazwa_opakowania'];
		$ilosc = $wiersz['ilosc'];
		$ilosc_podwozi = $wiersz['ilosc_podwozi'];
		$a = (podwozia($nazwa_opakowania, $ilosc)) + $ilosc_podwozi;
	
		
		echo '
			<a href="puste-opakowania-zlecenia.php">
				<button class="cofnij">COFNIJ</button></a>
			<table class="tabela-f table table-dark">';
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
			echo '<form action="opakowania-re2.php" method="POST">
				
					<input type="hidden" name="input-h-id" value="' . $wiersz['id'] . '">';
					
			echo '<td class="tabela-nazwy">' . strtoupper($nazwa_opakowania) . '</td>';
			echo '<td class="tabela-nazwy">'.podwozia_r($nazwa_opakowania, $ilosc).'
			<div class="number1">
						<input type="button" value="-" id="minus1">
						<input 
						id="count1"
						type="number" 
						name="wwa" 
						class="puste-opakowania-input-number"
						onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"
						min="0" 
						max="1000"
						step="1"
						value="0">
						<input type="button" value="+" id="plus1"></div></td>';
						
						
			echo '<td class="tabela-nazwy">
					'.$a.'
					<div class="number1">
						<input type="button" value="-" id="minus">
						<input
						id="count"
						type="number" 
						name="wws" 
						class="puste-opakowania-input-number"
						onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"
						min="0" 
						max="1000"
						value="0"
						step="1"
						value="0">
						
						<input type="button" value="+" id="plus"></div></td>';
						
			echo '<td class="tabela-nnnn"><div class="margin-l-f-10"></div> ';
			echo '<td class="tabela-nn-button">
				   <button type="submit" name="edycja" class="usun">REALIZUJ</button></form>';

			echo '</tr>';
			echo '</tbody>';
			echo '</table>';
			}
		?>
		<script>
		var total;
				// if user changes value in field
				$('#count').change(function(){
				  // maybe update the total here?
				}).trigger('change');

				$('#plus').click(function() {
				  var target = $('#count', this.parentNode)[0];
				  target.value = +target.value + 1;
				});

				$('#minus').click(function() {
				  var target = $('#count', this.parentNode)[0];
				  if (target.value > 0) {
					target.value = +target.value - 1;
				  }
				});
				
				var total1;
				// if user changes value in field
				$('#count1').change(function(){
				  // maybe update the total here?
				}).trigger('change');

				$('#plus1').click(function() {
				  var target = $('#count1', this.parentNode)[0];
				  target.value = +target.value + 1;
				});

				$('#minus1').click(function() {
				  var target = $('#count1', this.parentNode)[0];
				  if (target.value > 0) {
					target.value = +target.value - 1;
				  }
				});
		</script>

	<?php
// ========================REALIZUJ CZĘŚCIOWO -> REALIZUJ=========================
//===============================================================================	
	if(isset($_POST['edycja'])){
		require_once('../core/funkcje.php');
		require('../database/db-connect.php');
		$id = $_POST['input-h-id'];		
		$ilosc_podwozi_nn = $_POST['wws'];
		$ilosc_nn = $_POST['wwa'];
		
			if(($ilosc_nn == 0) AND ($ilosc_podwozi_nn == 0)){
				session_start();
				$_SESSION['dodano'] = '<div class="orange">WARTOŚĆI SĄ ZEROWE</div>';
				header('Location: puste-opakowania-zlecenia.php');
				exit();
		}else{

		
		$a ='SELECT * FROM `opakowania` WHERE id="' . $id . '"';
		$zadanie = $db_PDO->query($a);
		$wiersz = $zadanie->fetch();
		
		$nazwa_opakowania = $wiersz['nazwa_opakowania'];
		$ilosc = $wiersz['ilosc'];
		$ilosc_podwozi = $wiersz['ilosc_podwozi'];
		$priorytet = $wiersz['priorytet'];
		$czas = $wiersz['czas'];
		$pracownik = $wiersz['pracownik'];
		$czas_realizacji = date("Y-m-d G:i:s");
		
		$u = $ilosc_podwozi_nn * dzielnik($nazwa_opakowania) + $ilosc_nn;
		$i = $ilosc_podwozi * dzielnik($nazwa_opakowania) + $ilosc;
		
		$a ='SELECT * FROM `strefa_czyszczenia_ilosc-opakowan` WHERE pojemnik="' . $nazwa_opakowania . '"';
		$zadanie_a = $db_PDO->query($a);
		$wiersz_a = $zadanie_a->fetch();
		$aktualna = $wiersz_a['ilosc'];
			
			if($u == $i){
				$c = 'DELETE FROM `opakowania` WHERE id="' . $id . '"';
				$zadanie = $db_PDO->query($c);
				header('Location: puste-opakowania-zlecenia.php');
				exit;
			}
			
			if($u < $i){
				
				
				$r = $ilosc_podwozi - $ilosc_podwozi_nn;
				$t = $ilosc - $ilosc_nn;
				$total = $aktualna - $u;
				
				
				$d = "UPDATE
						`opakowania`
					SET
						`ilosc` = '$t',
						`ilosc_podwozi` = '$r'
					WHERE
						`id`='$id'";
				$zadanie = $db_PDO->query($d);
				

				
				
				$b = "UPDATE
							`strefa_czyszczenia_ilosc-opakowan`
						SET
							`ilosc` = '$total'
						WHERE
							`pojemnik` = '$nazwa_opakowania'";
			$zadanie_b = $db_PDO->query($b);
			session_start();
			$_SESSION['dodano'] = '<div class="green">ZREALIZOWANO: '.$nazwa_opakowania.' ILOŚĆ: '.$u.'</div>';
			header('Location: puste-opakowania-zlecenia.php');
			exit();
				
			}
			
			if($u > $i){
				
				session_start();
				$_SESSION['dodano'] = '<div class="orange">NIE MOŻESZ ZREALIZOWAĆ WIĘCEJ NIŻ W ZAMÓWIENIU</div>';
				header('Location: puste-opakowania-zlecenia.php');
				exit();
				
				 
			}
			
		
	}
	}

	ob_end_flush();
?>
