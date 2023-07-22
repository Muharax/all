<?php 
	require('../session.php');
	require('../header.php');
	require('../logo.php');
?>
	<div id="menu-glowne">
	<a name="xc" href="#"><div class="ss"><span style="font-size:40px;">&#9883;</span> MARKET</div></a>
	<div id="mV" style="display: block;">
		<div id="stan-1" class="ssc">STAN DETALI OLD</div>
		<div id="wfw" class="ssc">STAN DETALI</div>
		<div id="wfww" class="ssc">ZAMÓWIENIA</div>
		<div id="ahhh" class="ssc">POTWIERDZENIA</div>
	</div>
	
	<a name="xcc" href="#"><div class="ss"><span style="font-size:40px;">&#9877;</span> PRODUKCJA</div></a>
	<div id="mVc" style="display: block;">
		<div id="start-w1" class="ssc">START</div>
		<div class="vcc"></div>
		<div id="wfww" class="ssc">AKTYWNE</div>
		<div id="ahhh" class="ssc">WPN</div>
	</div>
	<div class="sss"></div>
	<a href="<?php echo URL?>index.php"><div class="ss">WYJDŹ</div></a>

	</div>
			
		<div class="mymodal"></div>
		<div class="mymodal-1"></div>
		
		<div class="market-dane"></div>
		
<?php require('../footer.php');?>

<script>
$(document).on("click", '#stan-1', function() {
 $(".market-dane").load('market/market-stan-detali-1.php');
});
</script>