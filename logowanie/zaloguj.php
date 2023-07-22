<?php
	
	if($_SERVER["REQUEST_METHOD"] === "POST"){
		
		if(empty($_POST['user']) || empty($_POST['pass'])){
			session_start();
			$_SESSION['alert'] = 'UZUPEŁNIJ DANE';
			header('Location: ../index.php');
			exit();
		}else{
			$login = htmlentities($_POST['user']);
			$pass = htmlentities($_POST['pass']);
		
		if(is_numeric($login) || is_numeric($pass)){
			session_start();
			$_SESSION['alert'] = 'Co to ?';
			header('Location: ../logowanie/logowanie.php');
			exit();
		}
	
		if(!empty($login) && !empty($pass) && !empty($_POST['user']) && !empty($_POST['pass'])){
				if(strlen($pass) >= 5 && strlen($pass) <= 20){
					if($login === $pass){
						session_start();
						$_SESSION['alert'] = 'Login i hasło nie mogą być takie same';
						header('Location: ../logowanie/logowanie.php');
						exit;
					}else{
						if(strlen($login) >= 5 && strlen($login) <= 20){
							require_once ('../database/db.php');
										
			$zadanie = $db_PDO->prepare('SELECT * FROM `users` WHERE `user`= :name LIMIT 1');
			$zadanie->execute([ 'name' => htmlentities($login) ]);
			// $zadanie->bindParam(1, htmlentities($login), PDO::PARAM_STR);
			$zadanie->execute();
			
				if(empty($db_PDO)){
					echo 'ERROR DB';
					exit;
				}
			$ilu = $zadanie->rowCount();
					if($ilu > 0){
						$wiersz = $zadanie->fetch();
						if(password_verify(htmlentities($pass), htmlentities($wiersz['pass']))){
							
								session_start();
								
								$_SESSION['zalogowany'] 	= true;
								$_SESSION['ready'] 			= "ready";
								$_SESSION['id'] 			= $wiersz['id'];
								$_SESSION['user'] 			= $wiersz['user'];
								$_SESSION['imie'] 			= $wiersz['imie'];
								$_SESSION['nazwisko'] 		= $wiersz['nazwisko'];
								$_SESSION['uprawnienia'] 	= $wiersz['uprawnienia'];
								$_SESSION['pkt'] 			= $wiersz['pkt'];
								$_SESSION['logo'] 			= $wiersz['logo'];
								// $_SESSION['URL'] 			= defined('URL') or define('URL', 'http://'.$_SERVER['SERVER_NAME']. "/alweb/");
								
								$logowania 					= $wiersz['logowania'];
								$user 						= $wiersz['user'];
								$log 						= $logowania + 1;
								
								$zadanie = $db_PDO->prepare('UPDATE `users` SET `logowania`= :log  WHERE user = :user');
								$zadanie->bindParam(':log', $log, PDO::PARAM_INT);
								$zadanie->bindParam(':user', $user, PDO::PARAM_STR);
								$zadanie->execute();
								
								// $zadanie = $db_PDO->query("UPDATE `users` SET `logowania`='$log' WHERE user='$user'");
								
								
								
							 session_write_close();
							 header('Location: ../index.php');
							 exit;
						}else{
							session_start();
							$_SESSION['alert'] = 'ZŁE HASŁO';
							header('Location: ../logowanie/logowanie.php');
							exit;
						}	
					}else{
						session_start();
						$_SESSION['alert'] = 'Brak użytkownika w bazie';
						header('Location: ../logowanie/logowanie.php');
						exit();
					}
				}else{
					session_start();
					$_SESSION['alert'] = 'Login min 5 max 20 znaków</div>';
					header('Location: ../logowanie/logowanie.php');
					exit;
				}}}else{
					session_start();
					$_SESSION['alert'] = 'Hasło min 5 max 20 znaków';
					// echo "<script>
								// $.alert({
									// title: 'UŻYTKOWNIK DODANY POPRAWNIE',
									// content: 'AA',
								// });</script>";
					header('Location: ../logowanie/logowanie.php');
					exit;
					}}}}else{
						echo 'NO POST REQUEST';
						exit;
					}


?>