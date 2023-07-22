<?php

$config = require 'db-config.php';

try{
	
	$db_PDO = new PDO("mysql:host={$config['db_host']};dbname={$config['db_name']};charset=utf8", $config['db_user'], $config['db_password'], [
		
		PDO::ATTR_EMULATE_PREPARES => false, 
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		
		]);
	
	} catch (PDOException $error){
		echo $error->getMessage();
		exit('Database error');
	}
	
	
?>