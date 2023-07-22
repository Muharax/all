<?php
	// error_reporting(E_ALL);
include('init.php');
session_start();

	if(!isset($_SESSION['zalogowany']) || $_SESSION['user'] == null){
		header('Location: '.URL.'logowanie/logowanie.php');
		exit;
	}else{
		$_SESSION['token'] = md5(microtime(true).mt_Rand());
		include('database/db.php');
	}
	
	
	

?>
