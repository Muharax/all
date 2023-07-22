<?php 

		$p = $_POST['z1'];
		$u = $_POST['z2'];
		
		require('../../database/db-connect.php');
		
			$c = "UPDATE
						`pojemniki`
					SET
						`dzielnik` = '".$u."'
					WHERE
						`pojemnik` = '".$p."'";
			if($zadanie = $db_PDO->query($c)){
				echo 'OK';
			};
			exit();
		
		
		
		
		
		
		

?>