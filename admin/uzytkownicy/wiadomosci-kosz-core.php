<?php 
require ('../../session.php');
require ('../../funkcje.php');

	$USER_ID = $_SESSION['id'];
	
	require('../../database/db-connect.php');
	$query = 'SELECT
						*
					FROM
						`wiadomosci-kosz`
					WHERE
						`msg_odbiorca` = :ID';
	
	$zadanie= $db_PDO->prepare($query);
	$zadanie->execute(array(':ID' => $USER_ID));
	$ile = $zadanie->rowCount();
	
	echo '<table class="tabela-wiadomosci table table-dark">
	<thead>
		<tr>
			<th>NADAWCA</th>
			<th>TEMAT</th>
			<th>TREŚĆ</th>
			<th>DATA</th>
			<th></th>
		</tr>
		<tbody>';
	if($ile > 0){
		for ($i=0; $i < $ile; $i++){
			$wiersz = $zadanie->fetch();
				echo '<tr>';			
echo '<td class="tabela-nn">' . name($wiersz['msg_nadawca']) . '</td>';
echo '<td class="tabela-nn">' . $wiersz['msg_temat'] . '</td>';
echo '<td class="tabela-nn">' . $wiersz['msg_tresc'] . '</td>';
echo '<td class="tabela-nn">' . $wiersz['msg_data'] . '</td>';
echo '<td class="tabela-nn"><button id="usun-del" value="'.$wiersz['id'].'">USUŃ</button></td>';
				echo '</tr>';
	
	}
	
	echo '</tbody>';
	echo '</table>';
	
	
	
	
	}else{
		
		echo 'ZERIO';
		
	}
	?>