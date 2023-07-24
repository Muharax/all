<?php 
	if(!isset($_POST['dodaj-uzytkownika'])){
		if(!empty($_POST['z1']) && !empty($_POST['z2']) && !empty($_POST['z3']) && !empty($_POST['z4']) && !empty($_POST['z5'])){
	
	
		$login 				= htmlentities($_POST['z1']);
		require_once('../../database/db.php');

		$zadanie = $db_PDO->prepare('SELECT `user` FROM `users` WHERE `user`=:login');
		$zadanie->execute(['login' => htmlentities($login)]);
		$ile = $zadanie->rowCount();
		
		if($ile === 0){

			$pass 			= $_POST['z2'];
			$imie			= $_POST['z4'];
			$nazwisko		= $_POST['z5'];
			$uprawnienia_i 	= $_POST['z3'];
			$ip 			= $_SERVER['REMOTE_ADDR'];
			
			$passhash 		= password_hash($pass, PASSWORD_DEFAULT);
			
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
	
		
		$zero = 0;
		$data_rejestracji = date("Y-m-d G:i:s");
	
// =============================================================================
	try{	
		$zadanie = $db_PDO->prepare('INSERT INTO `users`(
							`user`, 
							`pass`,
							`urlop`,
							`pkt`, 
							`uprawnienia`, 
							`logowania`, 
							`imie`,
							`nazwisko`,
							`data_rejestracji`,
							`ip`) 
						VALUES (:login,
								:passhash,
								:urlop,
								:pkt,
								:uprawnienia,
								:logowania,
								:imie,
								:nazwisko,
								:data_rejestracji,
								:ip)');
		$zadanie->execute(array(
					'login' 			=> $login, 
					'passhash' 			=> $passhash, 
					'urlop' 			=> $zero, 
					'pkt' 				=> $zero, 
					'uprawnienia' 		=> $uprawnienia, 
					'logowania' 		=> $zero, 
					'imie' 				=> $imie, 
					'nazwisko' 			=> $nazwisko, 
					'data_rejestracji' 	=> $data_rejestracji, 
					'ip' 				=> $ip));
					
	require_once ('../../class.php');	
	$msg = new msg();
	$msg->set_odbiorca(18);
	$msg->set_tresc('NOWY UŻYKOWNIK => '.$login);
	$msg->set_temat('NEW USER');
	$msg->send_system_msg();
	
	echo '<div><table>
				<tr>
				<td>LOGIN: </td><td><div class="error-info">'.$login.'</div></td>
				</tr>
				<tr>
				<td>HASŁO: </td><td><div class="error-info">'.$_POST['z2'].'</div></td>
				</tr>
				<tr>
				<td>UPRAWNIENIA: &nbsp;</td><td><div class="error-info">'.$uprawnienia.'</div></td>
				</tr>
				<tr>
				<td>IMIĘ: </td><td><div class="error-info">'.$imie.'</div></td>
				</tr>
				<tr>
				<td>NAZWISKO: </td><td><div class="error-info">'.$nazwisko.'</div></td>
				</tr>
				<tr>
				<td>DATA: </td><td><div class="error-info">'.$data_rejestracji.'</div></td>
				</tr>
				<tr>
				<td>IP: </td><td><div class="error-info">'.$ip.'</div></td>
				</tr>
				</table>
			<div class="error-img"><img src="../img/skynet.png"></div>
		</div>';
		
		
		exit();
	
	
	}catch (PDOExeption $error){
		echo $error->getMessage();
		exit ('Database error');
	}
// =============================================================================
		
		
			}else{
				echo 'UŻYTKOWNIK JUŻ ISTNIEJE';
				exit();
			}
		
		}else{
			echo 'JESTEM TUTAJJJ';
			exit();

		}
		
		
		}else{
			echo 'NOT ISSET';
			exit();

		}

		

?>