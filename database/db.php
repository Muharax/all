<?php

try
   {
      $db_PDO = new PDO('mysql:host=localhost;dbname=all', 'root', '', [
	  PDO::ATTR_EMULATE_PREPARES => false, 
	  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		
	]);
	  
   }
   catch(PDOException $e)
   {
      echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
   }
	

	
?>
