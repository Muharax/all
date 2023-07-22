<?php
	require_once ('funkcje/porownanie-id.php');

?>
<div id="wiadomosci">
<div id="wiadomosci-index">
<?php

		echo '<form action="core/wiadomosci-core.php" method="POST">';
	echo '<button type="submit" name="wyslij">WYŚLIJ</button>';
	echo '<button type="submit" name="odbierz">ODBIERZ</button>';
		echo '</form>';
	
?>
</div>
<div id="wiadomosci-ind">
<?php 

		require('../database/db-connect.php');
		
		$id = $_SESSION['id'];
	
		$a = 'SELECT * FROM `wiadomosci` WHERE `msg_odbiorca`="' . $id . '"';
		$zadanie = $db_PDO->query($a);
		$ile_wiad = $zadanie->rowCount();
		
		echo '<table>';
		echo '<tr>';
		echo '<th class="tabela-nn">OD KOGO</td>';
		echo '<th class="tabela-nn">Dane</td>';
		echo '<th class="tabela-nn">TEMAT</td>';
		echo '<th class="tabela-nn">TREŚĆ</td>';
		echo '</tr>';
		echo '<body>';
		
		
		
		for($i=0; $i<$ile_wiad; $i++){
			
			$wiersz = $zadanie->fetch();
		
		
		echo '<tr>';
					
				echo '<td class="tabela-nn">' . pid($id) . '</td>';
				echo '<td class="tabela-nn">' . dane($id) . '</td>';
				echo '<td class="tabela-nn">' . $wiersz['msg_temat'] . '</td>';
				echo '<td class="tabela-nn">' . $wiersz['msg_tresc'] . '</td>';
			
					
		echo '</tr>';
		
		}
		echo '</body>';
		echo '</table>';

?>
</div>

</div>