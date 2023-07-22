<?php 

	if(isset($_POST['dz-edit'])){
		
		$a = $_POST['new_nr'];
		$b = $_POST['input-h-id'];
		$z = $_POST['input-h-dz'];
		$p = $_POST['input-h-pj'];

		if($a == $z){
			session_start();
			$_SESSION['dodano'] = '<div class="orange">NIE ZMIENIONO WARTOŚCI</div>';
			header('Location: ../dzielnik-edytuj.php');
			exit();
			
		}else{
		require('../../database/db-connect.php');
		
			$c = "UPDATE
						`pojemniki`
					SET
						`dzielnik` = '".$a."'
					WHERE
						`id` = '".$b."'";
			$zadanie = $db_PDO->query($c);

			session_start();
			$_SESSION['dodano'] = '<div class="green">DZIELNIK EDYTOWANY <font color="white">'.$p.' Zmieniono z '.$z.' na '.$a.'</font></div>';
			header('Location: ../dzielnik-edytuj.php');
			exit();
		}
		
		
		
		}
		

?>