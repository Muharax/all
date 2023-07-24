<style>
#window{
	padding:5px;
	width: 80%;
    background-color: #31373c;
    position: absolute;
    top: 50px;
    right: 42px;
}
</style>

<?php 		

	require ('session.php');
	require ('header.php');
	require ('logo.php');
	
	
	if(isset($_SESSION['uprawnienia'])){
		switch ($_SESSION['uprawnienia']) {
		case 1:
			include('index/upr1.php');
			break;
		case 2:
			include('index/upr2.inc');
			break;
		default:
		   include('index/bupr.inc');
			break;
		}
	}
?>
<div id="window"></div>

<?php require('footer.php'); ?>

