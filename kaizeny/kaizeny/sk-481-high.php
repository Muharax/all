<?php 
	require ('../../session.php');
	require ('../../header.php');
	require ('../../logo.php');
?>
<div id="menu-glowne">
<div class="sss"></div>
<a href="../market.php?link=market-stan-detali"><div class="ss">WYJDŹ</div></a>
</div>
<div id="sk-481-high">

		
<?php 
	
	
	$wersja="SK EU HIGH";
	$strona="L";
	
	require('../../database/db-connect.php');
		$a = 'SELECT * FROM `market_stan_detali` WHERE wersja="' . $wersja . '" AND strona="' . $strona . '"';
		$zadanie = $db_PDO->query($a);
		$ile_znalezionych = $zadanie->rowCount();
	
	echo '<table class="tabela-market">';
		echo '<tr>';
			echo '<td class="tabela-nazwy">KOD</td>';
			echo '<td class="tabela-nazwy">NAZWA</td>';
			echo '<td class="tabela-nazwy">STR</td>';
			echo '<td class="tabela-nazwy">WERSJA</td>';
			echo '<td class="tabela-nazwy">ILOSC</td>';
			echo '<td class="tabela-nazwy">PRG</td>';
		echo '</tr>';
for ($i=0; $i < $ile_znalezionych; $i++)
        {
				$wiersz = $zadanie->fetch();
				
				echo '<tr>';
				echo '<form action="opakowania-re.php" method="POST">
				
					<input type="hidden" name="input-h-id" value="' . $wiersz['id'] . '">';
					
				echo '<td class="tabela-nn">' . $wiersz['kod'] . '</td>';
				echo '<td class="tabela-nn">' . strtoupper($wiersz['nazwa']) . '</td>';
				echo '<td class="tabela-nn">' . $wiersz['strona'] . '</td>';
				echo '<td class="tabela-nn">' . $wiersz['wersja'] . '</td>';
				echo '<td class="tabela-nn">' . $wiersz['ilosc'] . '/' . $wiersz['max'] .'</td>';
				echo '<td class="tabela-nn">
					<progress class="progress-bar" value="' . $wiersz['ilosc'] . '" max="' . $wiersz['max'] . '"></progress></td>';
				
				echo '<td class="tabela-nn-button">
				
					<button type="submit" name="edytuj" class="usun">EDYTUJ</button></td></form>';
					echo '<td class="tabela-nn-button">
				
					<button type="submit" name="edytuj" class="usun">ZAMÓW</button></td></form>';
					echo '<td class="tabela-nn-button">
				
				<button type="submit" name="edytuj" class="usun">ZWROT</button></td></form>';
					
				echo '</tr>';
		}
		

		$wersja="SK EU HIGH";
		$strona="PR";
	
		$a = 'SELECT * FROM `market_stan_detali` WHERE wersja="' . $wersja . '" AND strona="' . $strona . '"';
		$zadanie = $db_PDO->query($a);
		$ile_znalezionych = $zadanie->rowCount();
	
	echo '<table class="tabela-market">';
		echo '<tr>';
			echo '<td class="tabela-nazwy">KOD</td>';
			echo '<td class="tabela-nazwy">NAZWA</td>';
			echo '<td class="tabela-nazwy">STR</td>';
			echo '<td class="tabela-nazwy">WERSJA</td>';
			echo '<td class="tabela-nazwy">ILOSC</td>';
			echo '<td class="tabela-nazwy">PRG</td>';
		echo '</tr>';
for ($i=0; $i < $ile_znalezionych; $i++)
        {
				$wiersz = $zadanie->fetch();
				
				echo '<tr>';
				echo '<form action="opakowania-re.php" method="POST">
				
					<input type="hidden" name="input-h-id" value="' . $wiersz['id'] . '">';
					
				echo '<td class="tabela-nn">' . $wiersz['kod'] . '</td>';
				echo '<td class="tabela-nn">' . strtoupper($wiersz['nazwa']) . '</td>';
				echo '<td class="tabela-nn">' . $wiersz['strona'] . '</td>';
				echo '<td class="tabela-nn">' . $wiersz['wersja'] . '</td>';
				echo '<td class="tabela-nn">' . $wiersz['ilosc'] . '/' . $wiersz['max'] .'</td>';
				echo '<td class="tabela-nn">
					<progress class="progress-bar" value="' . $wiersz['ilosc'] . '" max="' . $wiersz['max'] . '"></progress></td>';
				
				echo '<td class="tabela-nn-button">
				
					<button type="submit" name="edytuj" class="usun">EDYTUJ</button></td></form>';
				echo '<td class="tabela-nn-button">
				
				<button type="submit" name="edytuj" class="usun">ZAMÓW</button></td></form>';
				echo '<td class="tabela-nn-button">
				
				<button type="submit" name="edytuj" class="usun">ZWROT</button></td></form>';	
				echo '</tr>';
		}
		
		$wersja="SK EU HIGH";
		$strona="ALL";
	
		$a = 'SELECT * FROM `market_stan_detali` WHERE wersja="' . $wersja . '" AND strona="' . $strona . '"';
		$zadanie = $db_PDO->query($a);
		$ile_znalezionych = $zadanie->rowCount();
	
	echo '<table class="tabela-market">';
		echo '<tr>';
			echo '<td class="tabela-nazwy">KOD</td>';
			echo '<td class="tabela-nazwy">NAZWA</td>';
			echo '<td class="tabela-nazwy">STR</td>';
			echo '<td class="tabela-nazwy">WERSJA</td>';
			echo '<td class="tabela-nazwy">ILOSC</td>';
			echo '<td class="tabela-nazwy">PRG</td>';
		echo '</tr>';
for ($i=0; $i < $ile_znalezionych; $i++)
        {
				$wiersz = $zadanie->fetch();
				
				echo '<tr>';
				echo '<form action="opakowania-re.php" method="POST">
				
					<input type="hidden" name="input-h-id" value="' . $wiersz['id'] . '">';
					
				echo '<td class="tabela-nn">' . $wiersz['kod'] . '</td>';
				echo '<td class="tabela-nn">' . strtoupper($wiersz['nazwa']) . '</td>';
				echo '<td class="tabela-nn">' . $wiersz['strona'] . '</td>';
				echo '<td class="tabela-nn">' . $wiersz['wersja'] . '</td>';
				echo '<td class="tabela-nn">' . $wiersz['ilosc'] . '/' . $wiersz['max'] .'</td>';
				echo '<td class="tabela-nn">
					<progress class="progress-bar" value="' . $wiersz['ilosc'] . '" max="' . $wiersz['max'] . '"></progress></td>';
					
				
				echo '<td class="tabela-nn-button">
				
					<button type="submit" name="edytuj" class="usun">EDYTUJ</button></td></form>';
				echo '<td class="tabela-nn-button">
				
				<button type="submit" name="edytuj" class="usun">ZAMÓW</button></td></form>';
				echo '<td class="tabela-nn-button">
				
				<button type="submit" name="edytuj" class="usun">ZWROT</button></td></form>';
					
				echo '</tr>';
		}
		
		
?>

</div>

