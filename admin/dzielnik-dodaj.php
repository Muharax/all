<?php
		ob_start();
		require_once('../session.php');
		require_once('../header.php');
		require_once('../logo.php');
		
	if(isset($_SESSION['dodano'])) echo $_SESSION['dodano'] ; 
	unset($_SESSION['dodano']);
	
?>

<div id="puste-opakowania">

<MARQUEE><font color="orange">W TRAKCIE BUDOWY</font></MARQUEE><br>
<MARQUEE><font color="orange">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;W TRAKCIE BUDOWY</font></MARQUEE><br>
<MARQUEE><font color="orange">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;W TRAKCIE BUDOWY</font></MARQUEE><br>

	
</div>



