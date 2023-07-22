<?php 
		require('../session.php');
		require('../header.php');
		require ('../logo.php');
		require('../database/db-connect.php');
		
		$id = $_SESSION['idh'];
		$id = $_POST['input-h-id'];
		$b = 'SELECT * FROM `opakowania` WHERE id="' . $id . '"';
		$zadanie = $db_PDO->query($b);
	
	echo '<table class="tabela">';
		echo '<tr>';
			echo '<td class="tabela-nazwy">POJEMNIK</td>';
			echo '<td class="tabela-nazwy">ILOSC</td>';
			echo '<td class="tabela-nazwy">PODWOZIA</td>';
			echo '<td class="tabela-nazwy">PRIORYTET</td>';
		echo '</tr>';
		$wiersz = $zadanie->fetch();
		echo '<tr>';
		
				echo '<form action="opakowania-re.php" method="POST">';

				echo '<td class="tabela-nn">' . strtoupper($wiersz['nazwa_opakowania']) . '</td>';
				echo '<td class="tabela-nn"><input type="number" value="' . $wiersz['ilosc'] . '"</td>';
				echo '<td class="tabela-nn">' . $wiersz['ilosc_podwozi'] . '</td>';
				echo '<td class="tabela-nnn">
				
					<button type="submit" name="zmien">' . strtoupper($wiersz['priorytet']) . '</button></td>';
				
				echo '<td class="tabela-nnnn"><div class="margin-l-f-10"></div> ';
				echo '<td class="tabela-nn-button">
				
					<button type="submit" name="usun" class="usun">REALIZUJ</button>
					<button type="submit" name="re" class="re">REALIZUJ CZĘŚCIOWO</button></td></form>';
					
				echo '</tr>';
?>



</body>