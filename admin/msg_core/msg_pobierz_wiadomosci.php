<?php 

	function pobierz(){
		
		require('../../database/db-connect.php');
		$id = $_SESSION['id'];
		$a ='SELECT * FROM `wiadomosci` WHERE msg_odbiorca="' . $id . '"';
		
	}


?>
