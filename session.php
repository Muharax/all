<?php
	include('init.php');

	session_start();

	if(!isset($_SESSION['zalogowany']) || $_SESSION['user'] == null){
		header('Location: '.URL.'logowanie/logowanie.php');
		exit;
	}
	
	if(isset($_SESSION['alert'])) echo $_SESSION['alert'];
	unset($_SESSION['alert']);
		
	$_SESSION['token'] = md5(microtime(true).mt_Rand());
	include('database/db.php');
	
		
	
	

?>
