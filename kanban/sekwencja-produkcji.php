<?php 
	require('../../header.php');
	require('../../session.php');
	require('../../logo.php');
?>
<div id="sekwencja-produkcji-out">

<?php 

if(isset($_SESSION['dodano'])) echo $_SESSION['dodano'] ; 
	unset($_SESSION['dodano']);
?>


<div class="sekwencja-produkcji-I">

WERSJA

	<?php 
	echo '<form action="core/core1.php" method="GET">';
	
	require_once "../../database/db-connect.php";
	$a = 'SELECT * FROM `g1`';
	$zadanie = $db_PDO->query($a);
	$wiersz = $zadanie->fetchAll();
	
	
	echo '<select name="kod">';
	'<input type="hidden" name="input-name" value="' . $wiersz['nazwa'] . '">';
	
		foreach($wiersz as $row){
			
			echo('<option value="'.$row['kod'].'">'.$row['nazwa'].'</option>');
			}
		
	echo '</select>';
	
	
?>

	<br>Wpisz ilość<br>
	<input name="numer" type="number">
	<button name="dodaj" type="submit">Dodaj</button>
	
</form>

</div>

<!--------------------------------------------------------------------------------------------------->

<div class="sekwencja-produkcji-II">



<?php 
require('../../database/db.php');
		$b = "SELECT * FROM `aktywne produkcje`";
		$zadanie = $db_PDO->query($b);
		$ile_znalezionych = $zadanie->rowCount();
	
	echo '<table class="tabela-b">';
		echo '<tr>';
			echo '<td class="tabela-nazwy">NAZWA</td>';
			echo '<td class="tabela-nazwy">ILOSC</td>';
			echo '<td class="tabela-nazwy">LINIA</td>';
			echo '<td class="tabela-nazwy">INNE</td>';
		echo '</tr>';
for ($i=0; $i < $ile_znalezionych; $i++)
        {
				$wiersz = $zadanie->fetch();
				
				
				
				echo '<tr>';
				echo '<form action="..." method="POST">
				
					<input type="hidden" name="input-h-id" value="' . $wiersz['id'] . '">';
					
				echo '<td class="tabela-nn">' . strtoupper($wiersz['nazwa']) . '</td>';
				echo '<td class="tabela-nn">' . $wiersz['ilosc'] . '</td>';
				echo '<td class="tabela-nn">' . $wiersz['linia'] . '</td>';
				
				echo '<td class="tabela-nn-button">
				
					<button type="submit" name="usun" class="usun">AWARIA</button>
					<button type="submit" name="re" class="re">ZAKOŃCZ</button></td></form>';
					
				echo '</tr>';
		}
?>
</div>
</div>









