<?php 

	if(isset($_POST['dodaj-uzytkownika'])){
		if(!empty($_POST['login-rej']) && !empty($_POST['pass-rej']) && !empty($_POST['pass-rej2']) && !empty($_POST['login-imie']) && !empty($_POST['login-nazwisko'])){
				
		
		require_once('../../database/db.php');
		$login 		= $_POST['login-rej'];
		$b = 'SELECT * FROM `users` WHERE `user`="' . $login . '"';
		$zadanie = $db_PDO->query($b);
		$ile = $zadanie->rowCount();
	
			if($ile === 0){
				
				$pass 		= $_POST['pass-rej'];
				$pass2 		= $_POST['pass-rej2'];
				
				if($pass !== $pass2){
								session_start();
								$_SESSION['dodano'] = '<div id="dodano"><font color="#36FF00">HASŁA MUSZĄ BYĆ TAKIE SAME</font></div>';
								header('Location: ../panel.php?link=dodaj-uzytkownika');
								exit();
				}
			
			
			$login 		= $_POST['login-rej'];
			$pass 		= $_POST['pass-rej'];
			$pass2 		= $_POST['pass-rej2'];
			$imie		= $_POST['login-imie'];
			$nazwisko	= $_POST['login-nazwisko'];
			
			$uprawnienia_i = $_POST['uprawnienia'];
			$ip = $_SERVER['REMOTE_ADDR'];
			
			$pass 		= password_hash($_POST['pass-rej'], PASSWORD_DEFAULT);
			
			if($uprawnienia_i === "admin"){
				$uprawnienia = 1;
			}
			if($uprawnienia_i === "kierownik"){
				$uprawnienia = 2;
			}
			if($uprawnienia_i === "produkcja"){
				$uprawnienia = 3;
			}
			if($uprawnienia_i === "utr"){
				$uprawnienia = 4;
			}
		
		
		$pkt = 0;
		$logowania = 0;
		$data_rejestracji = date("Y-m-d G:i:s");
		
		
		require_once('../../database/db-connect.php');
		
		$a = "INSERT INTO `users`(
							`user`, 
							`pass`, 
							`pkt`, 
							`uprawnienia`, 
							`logowania`, 
							`imie`,
							`nazwisko`,
							`data_rejestracji`,
							`ip`) 
						VALUES ('$login',
								 '$pass',
								 '$pkt',
								 '$uprawnienia',
								 '$logowania',
								 '$imie',
								 '$nazwisko',
								 '$data_rejestracji',
								 '$ip')";
					$zadanie = $db_PDO->query($a);
								 
								session_start();
								$_SESSION['dodano'] = '<div id="dodano">UŻYTKOWNIK DODANY <font color="#36FF00">POPRAWNIE</font></div>';
								header('Location: ../panel.php?link=dodaj-uzytkownika');
								exit();
		
			}else{
				 session_start();
				 $_SESSION['dodano'] = '<div id="dodano">UŻYTKOWNIK O PODANYM LOGINIE JUZ <font color="#36FF00">ISTNIEJE</font></div>';
				 header('Location: ../panel.php?link=dodaj-uzytkownika');
				 exit();
				 }
		
		}
		else{
			session_start();
			$_SESSION['dodano'] = '<div id="dodano"><font color="#FFFFFF">UZUPEŁNIJ DANE</font></div>';
			header('Location: ../panel.php?link=dodaj-uzytkownika');
			exit();
		}
		}
		

?>