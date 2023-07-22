<?php 
require ('../../session.php');


function name($X){
	try{
		require('../../database/db-connect.php');
		$query = 'SELECT * FROM `users` WHERE `id`=:id LIMIT 1';
		$zadanie= $db_PDO->prepare($query);
		$zadanie->execute(array(':id' => $X));
		$ile = $zadanie->rowCount();
		
		if($ile === 0){
			return '<font color="RED">SYSTEM</font>';
		}else{
			$wiersz = $zadanie->fetch();
			return $wiersz['user'] ?? '<font color="yellow">Brak użytkownika</font>';
		}

	}catch (PDOException $error){
		return $error->getMessage();
		exit('error');
	}
}
	
	
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
			<th>ODBIORCA</th>
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
					echo '<td class="tabela-nn">' . name($wiersz['msg_odbiorca']) . '</td>';
					echo '<td class="tabela-nn">' . $wiersz['msg_temat'] . '</td>';
					echo '<td class="tabela-nn">' . $wiersz['msg_tresc'] . '</td>';
					echo '<td class="tabela-nn">' . $wiersz['msg_data'] . '</td>';
					echo '<td class="tabela-nn">' . $wiersz['msg_przeczytane'] . '</td>';
					echo '<td class="tabela-nn">
		<button id="wiadomosc-open" class="wiadomosc-open'.$wiersz['id'].'" style="background-color:yellow;" value="'.$wiersz['id'].'" data-value="'.$wiersz['msg_przeczytane'].'">OPEN</button>
		<button class="wiadomosc-open-usun'.$wiersz['id'].'" disabled>USUŃ</button>';
					echo '</td>';
					
				echo '</tr>';
				echo '<tr>';
					echo '<td class="AH hidd'.$wiersz['id'].'" colspan="7">';
					
					
					
					
					
							echo '<div class="wiadomosci-rozwin">';
							
				echo '<div class="wiadomosci-rozwin-nazwa ffa">NADAWCA: </div>'.name($wiersz['msg_nadawca']);
				echo '<div class="wiadomosci-rozwin-nazwa ffa">TEMAT: </div>'.$wiersz['msg_temat'];
				echo '<div class="wiadomosci-rozwin-nazwa ffa">DATA: </div>'.$wiersz['msg_data'];
				echo '<div class="wiadomosci-rozwin-nazwa ffa">TREŚĆ: </div>'.$wiersz['msg_tresc'];
							
							echo '</div></td>';
							
							
							
							
							
				echo '</tr>';
			}else{
				echo '<tr>';			
					echo '<td class="tabela-nn">' . name($wiersz['msg_nadawca']) . '</td>';
					echo '<td class="tabela-nn">' . name($wiersz['msg_odbiorca']) . '</td>';
					echo '<td class="tabela-nn">' . $wiersz['msg_temat'] . '</td>';
					echo '<td class="tabela-nn">' . $wiersz['msg_tresc'] . '</td>';
					echo '<td class="tabela-nn">' . $wiersz['msg_data'] . '</td>';
					echo '<td class="tabela-nn abica'.$wiersz['id'].'">' . $wiersz['msg_przeczytane'] . '</td>';
					echo '<td class="tabela-nn">
<button id="wiadomosc-open" class="wiadomosc-open'.$wiersz['id'].'" value="'.$wiersz['id'].'" data-value="'.$wiersz['msg_przeczytane'].'">OPEN</button>

<button class="wiadomosc-open-usun'.$wiersz['id'].'">USUŃ</button>';
					echo '</td>';
				echo '</tr>';
		// ====================================================================================		
				echo '<tr>';
					echo '<td class="AH hidd'.$wiersz['id'].'" colspan="7">';
							echo '<div class="wiadomosci-rozwin">';
							
		echo '<div class="wiadomosci-rozwin-nazwa ffa">NADAWCA: </div>'.name($wiersz['msg_nadawca']);
		echo '<div class="wiadomosci-rozwin-nazwa ffa">TEMAT: </div>'.$wiersz['msg_temat'];
		echo '<div class="wiadomosci-rozwin-nazwa ffa">DATA: </div>'.$wiersz['msg_data'];
		echo '<div class="wiadomosci-rozwin-nazwa ffa">TREŚĆ: </div>'.$wiersz['msg_tresc'];
							
							echo '</div></td>';
				echo '</tr>';
			}
		
		}
		echo '</tbody>
			</table>';
	}

?>