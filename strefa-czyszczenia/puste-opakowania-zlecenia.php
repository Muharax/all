<!-- <meta http-equiv="refresh" content="3"> -->

<?php
		require('../session.php');
		require('../header.php');
		require ('../logo.php');
		
		if(isset($_SESSION['dodano'])) echo $_SESSION['dodano'] ; 
	unset($_SESSION['dodano']);
?>
<div id="poz">
<div id="MM-OUT">
<div class="MainMenu">
		
			<a href="<?php echo URL;?>strefa-czyszczenia/strefa-czyszczenia-index.php">
				<button class="cofnij">BACK</button></a>
		</div>
		</div>
		
<?php
		
	echo '<div id="zlecenia">';	
	require('../database/db-connect.php');
	require('../core/funkcje.php');
	
	$zadanie = $db_PDO->prepare('SELECT * FROM `opakowania` ORDER BY priorytet DESC');
	$zadanie->execute();
		$ile_znalezionych = $zadanie->rowCount();
	echo '<div id="odswiez"><a href="puste-opakowania-zlecenia.php">ODŚWIEŻ</a></div>';
	echo '<table class="tabela-a table table-dark">';
	echo '<thead>';
		echo '<tr>';
			echo '<td class="tabela-nazwy">POJEMNIK</td>';
			echo '<td class="tabela-nazwy">ILOSC</td>';
			echo '<td class="tabela-nazwy">PODWOZIA</td>';
			echo '<td class="tabela-nazwy">PRIORYTET</td>';
			echo '<td class="tabela-nazwy"></td>';
			echo '<td class="tabela-nazwy"></td>';
	echo '</tr>';
	echo '</thead>';
	echo '<tbody>';
for ($i=0; $i < $ile_znalezionych; $i++)
        {
				$wiersz = $zadanie->fetch();
				$elo = podwozia($wiersz['nazwa_opakowania'], $wiersz['ilosc']) + $wiersz['ilosc_podwozi'];

				echo '<tr>
<form action="opakowania-re2.php" method="POST">
	<input type="hidden" name="input-h-id" value="' . $wiersz['id'] . '">
		
		<td class="tabela-nn color-1">' . strtoupper($wiersz['nazwa_opakowania']) . '</td>
		<td class="tabela-nn">' . podwozia_r($wiersz['nazwa_opakowania'], $wiersz['ilosc']) . '</td>
		<td class="tabela-nn">' . $elo . '</td>';
					
			if($wiersz['priorytet'] == "normalny"){
				echo '<td class="tabela-nn">' . strtoupper($wiersz['priorytet']) . '</td>';
			}else{
				echo '<td class="tabela-nn"><font color="red">' . strtoupper($wiersz['priorytet']) . '</font></td>';
			}
				
		echo '<td class="tabela-nnnn"><div class="margin-l-f-10"></div>
			<td class="tabela-nn-button">
				<button type="submit" name="usun" class="usun">REALIZUJ</button>
				<button type="submit" name="re" class="re">REALIZUJ CZĘŚCIOWO</button>
				<button type="button" class="brak-opak">BRAK OPAKOWAŃ</button>
				
			</td>
					
</form>';
					
				echo '</tr>';
		}
		echo '<tbody>';
		echo '<table>';
		echo '</div>';

?>
</div>

