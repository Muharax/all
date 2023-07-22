<?php 
	require('../session.php');
	require('../header.php');
	require('../logo.php');
?>
	<div id="menu-glowne">
	<a name="xc" href="#">
	<div class="ss ww">
	<span style="font-size:20px;">&#9883;</span> MARKET</div></a>
	
	<div id="mV" style="display:block;">
		<!-- <div id="stan-1" class="ssc">STAN DETALI OLD</div> -->
		<div id="wfw" class="ssc">STAN DETALI</div>
		<div id="market-zamowieniaG" class="ssc">ZAMÓWIENIA</div>
		<div id="market-potwierdzeniaG" class="ssc">POTWIERDZENIA</div>
	</div>
	<div style="clear:both;"></div>
	<a name="xcc" href="#">
		<div class="ss ww">
		<span style="font-size:20px;">&#9877;</span> PRODUKCJA</div>
	</a>
	
	<div id="mVc">
		<div id="start-w1" class="ssc">START</div>
		<div class="vcc"></div>
		<div id="wfww" class="ssc">AKTYWNE</div>
			<form action="produkcja/linie/sk.php" method="POST">
				<button type="submit" name="linia-SK">
			</form>
	</div>
	<div class="sss" style="clear:both;" ></div>


	</div>
			
		<div class="mymodal"></div>
		<div class="mymodal-1"></div>
		
		<div class="market-dane"></div>
		
<?php require('../footer.php');?>
