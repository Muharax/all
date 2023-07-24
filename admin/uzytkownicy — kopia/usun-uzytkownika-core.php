<?php 	

	require('../../session.php');
	
	if($_SERVER["REQUEST_METHOD"] === "POST"){
	if(!empty($_POST['z1'])){
		
		$zz = $_POST['z1'];
		
		require('../../database/db-connect.php');
		$query = 'SELECT id, user FROM `users` WHERE `id`=:ss';
		$zadanie= $db_PDO->prepare($query);
		$zadanie->execute(array(':ss' => $zz));
		$ile = $zadanie->rowCount();
			
		if($ile === 1){
			$wiersz = $zadanie->fetch();
			$id = $wiersz['id'];
			$name = $wiersz['user'];
			if($id === 25 || $id === 22 || $id === 18 || $id === 83){
				echo '<div class="error-info-red br">TEN UŻYTKOWNIK JEST ZABLOKOWANY</div>';
				exit();
			}else{
				require('../../database/db-connect.php');
				$query = 'DELETE FROM `users` WHERE `id`=:search LIMIT 1';
				$zadanie= $db_PDO->prepare($query);
				$zadanie->execute(array(':search' => $zz));
				echo '<div class="error-title br">UŻYTKOWNIK USUNIĘTY POPRAWNIE</div>';
				
				$zadanie = $db_PDO->prepare('INSERT INTO `wiadomosci`(`msg_nadawca`, `msg_odbiorca`, `msg_tresc`, `msg_temat`, `msg_przeczytane`, `msg_data`) VALUES (:msg_nadawca,:ID,:TRESC,:TEMAT,:msg_przeczytane, :msg_data)');
$zadanie->execute(array(':msg_nadawca' => 'SYSTEM', ':ID' => 18, ':TRESC' => 'DELETE USER => "'.$name.'"', ':TEMAT' => 'DELETE USER', ':msg_przeczytane' => 1, ':msg_data' => date('Y-m-d H:i:s')));
					
					
				exit;
		}
		}else{
				echo '<div class="error-title br">COS POSŻŁO NIE TAK</div>';
				echo '<br>';
				echo $zz;
				echo '<br>';
				echo $token;
			}
		}
		echo $_POST['z1'];
	}	