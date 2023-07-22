<?php 
 class Hala_C {
	 
	 public $id;
	 
	 function usun($X){
		require('../database/db-connect.php');
		$a = "DELETE FROM `hala_c_stan_detali` WHERE `id` = '".$X."'";
		$zadanie = $db_PDO->query($a);
	 }
 }

	$ID = $_POST['z1'];
	$Hala_C = new Hala_C;
	$Hala_C->usun($ID);
	echo '<div class="error1">USUNIĘTO POPRAWNIE => '.$ID.'</div>';
	exit;
	
?>