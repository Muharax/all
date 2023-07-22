<?php 

	//------------------------ DODAJ -------------------------
	if(isset($_POST['zmien'])){
		require('../database/db-connect.php');
		$id = $_POST['input-h-id'];
	
		$b = 'SELECT id, priorytet FROM `opakowania` WHERE id="' . $id . '"';
		$zadanie = $db_PDO->query($b);
		$wiersz = $zadanie->fetch();
		$priorytet = $wiersz['priorytet'];
		
		if($priorytet=="wysoki"){
				$b ='UPDATE `opakowania` SET `priorytet`="normalny" WHERE id="' . $id . '"';
				$zadanie = $db_PDO->query($b);
		}else{
		if($priorytet=="normalny"){
				$b ='UPDATE `opakowania` SET `priorytet`="wysoki" WHERE id="' . $id . '"';
				$zadanie = $db_PDO->query($b);
		}
		}
	
	header('Location: puste-opakowania.php');
	exit();
	}
	//------------------------ REALIZUJ -------------------------
	if(isset($_POST['usun'])){
		
		require('../database/db-connect.php');
		$id = $_POST['input-h-id'];
		
		
		$a ='SELECT * FROM `opakowania` WHERE id="' . $id . '"';
		$zadanie = $db_PDO->query($a);
		$wiersz = $zadanie->fetch();
		
		$nazwa_opakowania = $wiersz['nazwa_opakowania'];
		$ilosc = $wiersz['ilosc'];
		$ilosc_podwozi = $wiersz['ilosc_podwozi'];
		$priorytet = $wiersz['priorytet'];
		$czas = $wiersz['czas'];
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
		
		
	
	header('Location: puste-opakowania.php');
	exit();
	}
	//------------------------ RE -------------------------
	if(isset($_POST['re'])){
		require('../session.php');
		require('../header.php');
		require ('../logo.php');
		require('../database/db-connect.php');
		$id = $_POST['input-h-id'];
		
		
		$a ='SELECT * FROM `opakowania` WHERE id="' . $id . '"';
		$zadanie = $db_PDO->query($a);
		$wiersz = $zadanie->fetch();

		$nazwa_opakowania = $wiersz['nazwa_opakowania'];
		$ilosc = $wiersz['ilosc'];
		$ilosc_podwozi = $wiersz['ilosc_podwozi'];
		
		echo '<table class="tabela-a">';
		echo '<tr>';
							echo '<a href="puste-opakowania.php"><button class="usun">POWRÓT</button></a>';
		echo '</tr>';
		echo '<tr>';
			
			echo '<td class="tabela-nazwy">POJEMNIK</td>';
			echo '<td class="tabela-nazwy">ILOŚC POJEMNIKÓW</td>';
			echo '<td class="tabela-nazwy">ILOŚC PODWOZI</td>';
		
		echo '</tr>';
		echo '<tr>';
			echo '<form action="opakowania-re.php" method="POST">
				
					<input type="hidden" name="input-h-id" value="' . $wiersz['id'] . '">';
					
			echo '<td class="tabela-nazwy">' . strtoupper($nazwa_opakowania) . '</td>';
			echo '<td class="tabela-nazwy">
					<input type="number" name="in-i" class="puste-opakowania-input-number" value="' . $ilosc . '"></td>';
			echo '<td class="tabela-nazwy">
					<input type="number" name="in-p" class="puste-opakowania-input-number" value="' . $ilosc_podwozi . '"></td>';
			echo '<td class="tabela-nnnn"><div class="margin-l-f-10"></div> ';
			echo '<td class="tabela-nn-button">
				   <button type="submit" name="edycja" class="usun">ZMIEN</button>';

			echo '</tr>';
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
		$ilosc = $wiersz['ilosc'];
		$ilosc_podwozi = $wiersz['ilosc_podwozi'];
		$priorytet = $wiersz['priorytet'];
		$czas = $wiersz['czas'];
		$pracownik = $wiersz['pracownik'];
		$czas_realizacji = date("Y-m-d G:i:s");
		
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
		/* 						  
		if($ilosc_podwozi < $ilosc_podwozi_n){
			
			$ile_np = $ilosc_podwozi_n;
			
					   $a = "UPDATE `opakowania` SET `ilosc_podwozi`='$ile_np', `edycja`='$czas_realizacji' WHERE `id`='$id'";
						$zadanie = $db_PDO->query($a);
						header('Location: puste-opakowania.php');
						exit();
				}
				
				
				
				if($ilosc_podwozi > $ilosc_podwozi_n){
			
			$ile_np = $ilosc_podwozi_n;
			
					   $a = "UPDATE `opakowania` SET `ilosc_podwozi`='$ile_np' WHERE `id`='$id'";
						$zadanie = $db_PDO->query($a);
						header('Location: puste-opakowania.php');
						exit();
				}
				
				if($ilosc < $ilosc_n){
			
			$ile_np = $ilosc_n;
			
					   $a = "UPDATE `opakowania` SET `ilosc`='$ile_np' WHERE `id`='$id'";
						$zadanie = $db_PDO->query($a);
						header('Location: puste-opakowania.php');
						exit();
				}
				
				if($ilosc > $ilosc_n){
			
			$ile_np = $ilosc_n;
			
					   $a = "UPDATE `opakowania` SET `ilosc`='$ile_np' WHERE `id`='$id'";
						$zadanie = $db_PDO->query($a);
						header('Location: puste-opakowania.php');
						exit();
				}
				 */
				
	}
?>
