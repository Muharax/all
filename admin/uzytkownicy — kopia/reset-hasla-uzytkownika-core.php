<?php 
error_reporting(0);

require ('../../session.php');
$ID = htmlentities($_POST['z1']);
$IDs = (int) "$ID";

$new_pass 			= substr(sha1(mt_rand() . microtime()), mt_rand(0,35), 5);
$new_passhash 		= password_hash($new_pass, PASSWORD_DEFAULT);

		require('../../database/db-connect.php');
		$query = 'SELECT `id` FROM `users` WHERE `id`=:ss';
		$zadanie= $db_PDO->prepare($query);
		$zadanie->execute(array(':ss' => $IDs));
		$ile = $zadanie->rowCount();
		$w = $zadanie->fetch();
		if($ile === 1 && $IDs === $w['id']){
			if($IDs === 25 || $IDs === 22 || $IDs === 18){
				echo '<div class="error-info-red br">TEN UŻYTKOWNIK JEST ZABLOKOWANY</div>';
				exit();
			}else{
				try{
					// UPDATE UŻYTKOWNIKA
					require('../../database/db-connect.php');
					$zadanie = $db_PDO->prepare('UPDATE `users` SET `pass` = :new WHERE `id` = :IDD');
					$zadanie->execute(array(':new' => $new_passhash, ':IDD' => $IDs));
					// WIADOMOSC DO UZYTKOWNIKA O NOWYM HAŚLE
					try{
						require_once ('../../class.php');	
						$msg = new msg();
						$msg->set_odbiorca($IDs);
						$msg->set_temat('RESET HASŁA');
						$msg->set_tresc('NOWE HASŁO => '.$new_pass);
						$msg->send_system_msg();
					}catch (PDOException $error){
						echo $error->getMessage();
						exit('error');
					}
					
					echo 'NOWE HASŁO: <b style="font-size:20px;">'.$new_pass.'</b><br><br>';
					echo '<button onclick="window.print()">DRUKUJ</button>';
					exit;
				}catch (PDOException $error){
					echo $error->getMessage();
					exit('error');
				}
			}

		}

?>