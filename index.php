<?php 		

	require ('session.php');
	require ('header.php');
	require ('logo.php');
	
	
	if(isset($_SESSION['uprawnienia'])){
		
		$i = $_SESSION['uprawnienia'];
			
		switch ($i) {
		case 1:
			include('index/upr1.inc');
			break;
		case 2:
			include('index/upr2.inc');
			break;
		default:
		   include('index/bupr.inc');
			break;
}

}

	require('footer.php');

?>

