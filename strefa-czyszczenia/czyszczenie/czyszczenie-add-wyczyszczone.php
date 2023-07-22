<?php 
		// require('../../session.php');
		$startTime = microtime(true);
		function dzielnik($x){
			
			require_once ('../../database/db-connect.php');
			$zadanie = $db_PDO->prepare('SELECT `dzielnik` FROM `pojemniki` WHERE `pojemnik`=:dz LIMIT 1');
			$zadanie->execute([ ':dz' => htmlentities($x)]);
			$i = $zadanie->rowCount();
			if($i > 1 OR $i === 0){
				return false;
				exit;
			}else{
				$wiersz = $zadanie->fetch();
				return $wiersz['dzielnik'];
			}
			
			
		}
		
		
		$nazwa 	= htmlentities($_POST['z1']);
		$token 	= htmlentities($_POST['token']);
		
		
		if(empty($_POST['z1'])){
			echo 'EMPTY NAZWA';
			exit;
		}
		
		if(empty($_POST['z2'])){
			$poj 	= 0;
		}else{
			$poj 	= htmlentities($_POST['z2']);
		}
		
		if(empty($_POST['z3'])){
			$pod 	= 0;
		}else{
			$pod 	= htmlentities($_POST['z3']);
		}	
		if($poj === 0 AND $pod === 0){
			echo '<div class="error-info-red">To się nie uda, wartośći są zerowe</div><br><br>';
			echo 'UZUPEŁNIJ LICZBĘ';
			exit;
		}
		$F = $pod * dzielnik($nazwa);
		$FF = $F + $poj;
		
		require ('../../database/db-connect.php');
		$zadanie = $db_PDO->prepare('SELECT `pojemnik` FROM `pojemniki` WHERE `pojemnik` =:AB');
		$zadanie->execute([ ':AB' => $nazwa]);
		$ile = $zadanie->rowCount();
		if($ile === 1){
			$true = true;
		}else{
			$true = false;
			echo '<div class="error-info-red">ERROR => ZŁE WYNIKI => '.$ile.'</div>';
			exit;
		}
		if($FF > 0 AND $true === true){
			session_start();
			if($_SESSION['token'] === $_POST['token']){
				
				try{
					$data = date("Y-m-d G:i:s");
					require_once ('../../database/db-connect.php');
					$zadanie = $db_PDO->prepare('INSERT INTO `strefa-czyszczenia-wyczyszczone`(`nazwa`, `ilosc_poj`, `ilosc_pod`, `ilosc`, `data`, `pracownik`) VALUES (:A1,:A2,:A3,:A4,:A5,:A6)');
					$zadanie->execute([ ':A1' => $nazwa, ':A2' => $poj, ':A3' => $pod,':A4' => $FF, ':A5' => $data, ':A6' => $_SESSION['id']]);
					echo '<div class="error1">OK -> DODANO <font color="black">( '.$nazwa.': '.$FF.' )</font></div>';
				
					$final = microtime(true) - $startTime;
					echo $final;
					exit;
				}catch (PDOException $e){
					echo $e->getMessage();
					exit('ERROR, PLEASE CONTACT WITH YOUR ADMINISTRATOR');
				}
			}else{
				echo 'TOKEN SIĘ NIE ZGADZA<br>';
				echo $_SESSION['token'].'<br>';
				echo $_POST['token'].'<br>';
				exit;
			}
			
		}else{
			echo 'ILOŚĆ JEST MNIEJSZA NIŻ 1 ?';
			exit;
		}

		
		


?>
