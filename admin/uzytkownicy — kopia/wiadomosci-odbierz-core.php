<?php 
require ('../../session.php');
require ('../../funkcje.php');

	require('../../database/db-connect.php');
	echo $_SESSION['id'];
	
	$query = 'SELECT * FROM `wiadomosci` WHERE `msg_odbiorca`=:ss ORDER BY `msg_przeczytane` DESC LIMIT 50';
	$zadanie= $db_PDO->prepare($query);
	$zadanie->execute(array(':ss' => $_SESSION['id']));
	$ile = $zadanie->rowCount();
	echo '<table class="tabela-wiadomosci table table-dark">
	<thead>
		<tr>
			<th>NADAWCA</th>
			<th>TEMAT</th>
			<th>TREŚĆ</th>
			<th>DATA</th>
			<th>P</th>
			<th></th>
		</tr>
		<tbody>';
	if($ile > 0){
		for ($i=0; $i < $ile; $i++){
			$wiersz = $zadanie->fetch();
			if($wiersz['msg_przeczytane'] === 1){
				echo '<tr>';			
					echo '<td class="tabela-nn">' . name($wiersz['msg_nadawca']) . '</td>';
					echo '<td class="tabela-nn">' . $wiersz['msg_temat'] . '</td>';
					echo '<td class="tabela-nn">' . $wiersz['msg_tresc'] . '</td>';
					echo '<td class="tabela-nn">' . $wiersz['msg_data'] . '</td>';
					echo '<td class="tabela-nn">' . $wiersz['msg_przeczytane'] . '</td>';
					echo '<td class="tabela-nn">
					
					
<button id="wiadomosc-open" class="wiadomosc-open'.$wiersz['id'].' btn-uw" style="background-color:yellow;" value="'.$wiersz['id'].'" data-value="'.$wiersz['msg_przeczytane'].'">OPEN</button>
<button id="wiadomosci-usun" class="btn-uw" value="'.$wiersz['id'].'" disabled>USUŃ</button>
<button id="wiadomosci-odpowiedz" class="btn-uw" value="'.$wiersz['id'].'">ODPOWIEDZ</button>';
		
		
					echo '</td>';
					
				echo '</tr>';
				echo '<tr>';
					echo '<td class="AH hidd'.$wiersz['id'].'" colspan="7">';
					
					
					
					
					
							echo '<div class="wiadomosci-rozwin">';
							
				echo '<div class="wiadomosci-rozwin-nazwa">NADAWCA: </div>'.name($wiersz['msg_nadawca']).'<br>';
				echo '<div class="wiadomosci-rozwin-nazwa">TEMAT: </div>'.$wiersz['msg_temat'].'<br>';
				echo '<div class="wiadomosci-rozwin-nazwa">DATA: </div>'.$wiersz['msg_data'].'<br>';
				echo '<div class="wiadomosci-rozwin-nazwa">TREŚĆ: </div>'.$wiersz['msg_tresc'].'<br>';
							
							echo '</div></td>';
							
							
							
							
							
				echo '</tr>';
			}else{
				echo '<tr>';			
					echo '<td class="tabela-nn">' . name($wiersz['msg_nadawca']) . '</td>';
					echo '<td class="tabela-nn">' . $wiersz['msg_temat'] . '</td>';
					echo '<td class="tabela-nn">' . $wiersz['msg_tresc'] . '</td>';
					echo '<td class="tabela-nn">' . $wiersz['msg_data'] . '</td>';
					echo '<td class="tabela-nn abica'.$wiersz['id'].'">' . $wiersz['msg_przeczytane'] . '</td>';
					echo '<td class="tabela-nn">
					
					
<button id="wiadomosc-open" class="wiadomosc-open'.$wiersz['id'].' btn-uw" value="'.$wiersz['id'].'" data-value="'.$wiersz['msg_przeczytane'].'">OPEN</button>
<button id="wiadomosci-usun" class="btn-uw" value="'.$wiersz['id'].'">USUŃ</button>
<button id="wiadomosci-odpowiedz" class="btn-uw" value="'.$wiersz['id'].'">ODPOWIEDZ</button>';


					echo '</td>';
				echo '</tr>';
				
				echo '<tr>';
					echo '<td class="AH hidd'.$wiersz['id'].'" colspan="7">';
							echo '<div class="wiadomosci-rozwin">';
							
		echo '<div class="wiadomosci-rozwin-nazwa">NADAWCA: </div>'.name($wiersz['msg_nadawca']).'<br>';
		echo '<div class="wiadomosci-rozwin-nazwa">TEMAT: </div>'.$wiersz['msg_temat'].'<br>';
		echo '<div class="wiadomosci-rozwin-nazwa">DATA: </div>'.$wiersz['msg_data'].'<br>';
		echo '<div class="wiadomosci-rozwin-nazwa">TREŚĆ: </div>'.$wiersz['msg_tresc'].'<br>';
							
							echo '</div></td>';
				echo '</tr>';
			}
		
		}
		echo '</tbody>
			</table>';
	}

?>