<?php 		
	error_reporting(E_ALL);
	require ('../database/db.php');
	$z1 = $_POST['z1'];
	session_start();
	$z = $db_PDO->prepare('SELECT * FROM `users` WHERE `id`= :name LIMIT 1');
	$z->execute([ 'name' => htmlentities($_SESSION['id']) ]);
	$ilu = $z->rowCount();
		if($ilu === 1){
			$w = $z->fetch();
			$z = $db_PDO->prepare('UPDATE
									`users`
								SET
									`EAN` = :name
								WHERE
									id=:id');
									
			$z->execute([ ':name' => $z1, ':id' => $_SESSION['id'] ]);
		}else{
			exit;
		}
		
	
	
	
						
