<?php

	$db_host = "localhost";
	$db_user = "root";
	$db_password = "";
	$db_name = "al";

		$db_mysqli = new mysqli("$db_host","$db_user","$db_password","$db_name");
		
		if ($db_mysqli -> connect_errno) {
			echo "Błąd połączenia z bazą danych " . $mysqli -> connect_error;
			exit();
}
	
?>