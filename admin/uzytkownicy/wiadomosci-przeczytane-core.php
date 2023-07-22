<?php 
require ('../../session.php');

	$A = htmlentities($_POST['z1']);
	echo $A;
	
	require('../../database/db-connect.php');
	$query = 'UPDATE
					`wiadomosci`
				SET
					`msg_przeczytane` = :ZX
				WHERE
					`id`= :ZC';
	$zadanie= $db_PDO->prepare($query);
	$zadanie->execute(array(':ZX' => 0, ':ZC' => $A,));
	
	
	

?>