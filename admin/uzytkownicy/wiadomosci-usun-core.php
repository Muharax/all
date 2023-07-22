<?php 
require ('../../session.php');

	$ID = htmlentities($_POST['z1']);
	
	require('../../database/db-connect.php');
	$query = 'SELECT
						*
					FROM
						`wiadomosci`
					WHERE
						`id` = :ID';
	$zadanie= $db_PDO->prepare($query);
	$zadanie->execute(array(':ID' => $ID));
	$i = $zadanie->rowCount();
	
	if($i === 1){
		$w = $zadanie->fetch();
		$query = 'INSERT INTO `wiadomosci-kosz`(
												`msg_nadawca`,
												`msg_odbiorca`,
												`msg_tresc`,
												`msg_temat`,
												`msg_data`
											)
											VALUES(
												:msg_nadawca,
												:msg_odbiorca,
												:msg_tresc,
												:msg_temat,
												:msg_data
											)';
		$zadanie= $db_PDO->prepare($query);
		$zadanie->execute(array(':msg_nadawca' => $w['msg_nadawca'], ':msg_odbiorca' => $w['msg_odbiorca'], ':msg_tresc' => $w['msg_tresc'], ':msg_temat' => $w['msg_temat'], ':msg_data' => $w['msg_data']));
		
		// ===================================================================
		
		$queryy = 'DELETE FROM `wiadomosci` WHERE `id`=:IDD';
		$zadaniey= $db_PDO->prepare($queryy);
		$zadaniey->execute([':IDD' => $ID]);
		
		echo 'OK';
		exit;
	}else{
		echo 'ZA DUŻO WYNIKÓW';
		exit;
	}
	
	
	

?>