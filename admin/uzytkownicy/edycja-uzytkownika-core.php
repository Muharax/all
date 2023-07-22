<?php 

//---------------------------------------------EDYTUJ UŻYTKOWNIKA----------------------------------------------------//

	
		
			if(isset($_POST['edit'])){
				require_once('../../logowanie/core/funkcje.php');
				session_start();
				$ids = uz($_SESSION['id']);
				$id = uz($_POST['input-h-id']);
				
				$login = uz($_POST['edycja-input-name']);
				$pkt = uz($_POST['edycja-input-pkt']);
				$uprawnienia = uz($_POST['edycja-input-upr']);
				$imie = uz($_POST['edycja-input-imie']);
				$nazwisko = uz($_POST['edycja-input-nazwisko']);
				
				
				
					require('../../database/db-connect.php');
					$a ='SELECT user, pkt, uprawnienia, imie, nazwisko FROM `users` WHERE id="' . $id . '"';
					$zadanie = $db_PDO->query($a);
					$wiersz = $zadanie->fetch();
					
					$db_user = $wiersz['user'];
					$db_pkt = $wiersz['pkt'];
					$db_uprawnienia = $wiersz['uprawnienia'];
					$db_imie = $wiersz['imie'];
					$db_nazwisko = $wiersz['nazwisko'];
					
					$db_pobrane = array(
								$db_user,
								$db_pkt,
								$db_uprawnienia,
								$db_imie,
								$db_nazwisko
								);
								
					$pobrane = array(
								$login,
								$pkt,
								$uprawnienia,
								$imie,
								$nazwisko
								);		
				
				if($db_pobrane === $pobrane){
							session_start();
							$_SESSION['dodano'] = '<div class="green">DANE NIE ZOSTAŁY ZMODYFIKOWANE</div>';
							header('Location: ../panel.php?link=edytuj-uzytkownika');
							die();
				}
								
								
					
					
					
						if($db_user !== $login){
								$new_login = $login;
							}else{
								$new_login = $db_user;
							}
					
						if($db_pkt !== $pkt){
								$new_pkt = $pkt;
							}else{
								$new_pkt = $db_pkt;
							}
						if($db_imie !== $imie){
								$new_imie = $imie;
							}else{
								$new_imie = $db_imie;
							}
						if($db_nazwisko !== $nazwisko){
								$new_nazwisko = $nazwisko;
							}else{
								$new_nazwisko = $db_nazwisko;
							}
						if($db_pkt !== $pkt){
								$new_pkt = $pkt;
							}else{
								$new_pkt = $db_pkt;
							}
						if($db_uprawnienia !== $uprawnienia){
								$new_uprawienia = $uprawnienia;
							}else{
								$new_uprawienia = $db_uprawnienia;
							}
							
							
							
						
						
						
						if($id === "25" || $id === "22" || $id === "18"){
							session_start();
							$_SESSION['dodano'] = '<div class="red">NIE MOŻNA EDYTOWAĆ TEGO UŻYTKOWNIKA</div>';
							header('Location: ../panel.php?link=edytuj-uzytkownika');
							die();
						}else{
							
							$c = 'UPDATE
											`users`
										SET
											`user` = "'. $new_login .'",
											`pkt` = "'. $new_pkt .'",
											`uprawnienia` = "'. $new_uprawienia .'",
											`imie` = "'. $new_imie .'",
											`nazwisko` = "'. $new_nazwisko .'"
										WHERE
											 `id` = "'. $id .'"';
											 
						$zadanieC= $db_PDO->query($c);
						session_start();
						$_SESSION['dodano'] = '<div class="green">DANE ZOSTAŁY ZMIENIONE</div>';

						header('Location: ../panel.php?link=edytuj-uzytkownika');
							exit(0);
							die();
						}
							
						
							
								
			}
				
		
		
//---------------------------------------------USUŃ UŻYTKOWNIKA----------------------------------------------------//
		
	
			if(isset($_POST['delete'])){
				
				require('../../logowanie/core/funkcje.php');
				session_start();
				$ids = $_SESSION['id'];
				$id = $_POST['input-h-id'];
			
					if($id === "25" || $id === "22" || $id === "18"){
							session_start();
							$_SESSION['dodano'] = '<div class="red">NIE MOŻNA USUNĄĆ TEGO UŻYTKOWNIKA</div>';
							header('Location: ../panel.php?link=edytuj-uzytkownika');
							exit();
						}else{
							
							$c = 'DELETE
									FROM
										`users`
									WHERE
										id="'. $id .'"';
											 
						$zadanie = $db_PDO->query($c);
						
						$_SESSION['dodano'] = '<div id="dodano">UŻYTKOWNIK ZOSTAŁ <font color="red">USUNIETY</font></div>';
						header('Location: ../panel.php?link=edytuj-uzytkownika');
						exit();
						
						}
							
						
							
								
			}
				
		
	
?>