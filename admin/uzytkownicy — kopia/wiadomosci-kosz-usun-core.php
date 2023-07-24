<?php 
require ('../../session.php');

	$ID = htmlentities($_POST['z1']);
		
		// ===================================================================
		require('../../database/db-connect.php');
		$queryy = 'DELETE FROM `wiadomosci-kosz` WHERE `id`=:IDD';
		$zadaniey= $db_PDO->prepare($queryy);
		$zadaniey->execute([':IDD' => $ID]);
		
		echo 'OK';
		exit;
	
	
	
	

?>