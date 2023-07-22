<?php 
	if($_SERVER["REQUEST_METHOD"] === "POST"){
		
		$name = $_POST['nazwa'];
		
		require('../../database/db-connect.php');
	
		$a = 'SELECT * FROM `users` WHERE `user` LIKE "%'.$name.'%"';
		$zadanie = $db_PDO->query($a);
		$ile = $zadanie->rowCount();
	
	echo '<table class="tabela-uzytkownikow>';
		echo '<tr>';
			echo '<td class="tabela-nazwy">Nazwa</td>';
			echo '<td class="tabela-nazwy">Pkt</td>';
			echo '<td class="tabela-nazwy">Uprawnienia</td>';
			echo '<td class="tabela-nazwy">Logowania</td>';
		echo '</tr>';
	
		for ($i=0; $i < $ile; $i++)
			{
				$wiersz = $zadanie->fetch();
				
				echo '<tr>';
				echo '<form action="..." method="POST">
				
					<input type="hidden" name="input-h-id" value="' . $wiersz['id'] . '">';
					
				echo '<td class="tabela-nn">' . strtoupper($wiersz['user']) . '</td>';
				echo '<td class="tabela-nn">' . $wiersz['pkt'] . '</td>';
				echo '<td class="tabela-nn">' . $wiersz['uprawnienia'] . '</td>';
				echo '<td class="tabela-nn">' . $wiersz['logowania'] . '</td>';
				
				
				echo '<td class="tabela-nnnn"><div class="margin-l-f-10"></div> ';
				echo '<td class="tabela-nn-button">
				
					<button type="submit" name="usun" class="usun">REALIZUJ</button>
					<button type="submit" name="re" class="re">REALIZUJ CZĘŚCIOWO</button></td></form>';
					
				echo '</tr>';
			}
		
}
?>