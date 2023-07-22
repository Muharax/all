<?php 
	require('../session.php');
	require('../header.php');
	require('../logo.php');
?>

<body>
<div id="kaizen">
<div id="menu-glowne">

<div class="sss"></div>
<a href="<?php echo URL;?>index.php"><div class="ss">WYJDŹ</div></a>

</div>

<div class="kaizen-dane">
<table class="kaizen-d">
<tr>	
	
	<td>
		<fieldset>
			<legend>Wybierz dział</legend>

			<input type="checkbox" id="kraken" name="monster">
			<label for="kraken">Bezpieczeństwo</label><br/>

			<input type="checkbox" id="sasquatch" name="monster">
			<label for="sasquatch">Logistyka</label><br/>

			<input type="checkbox" id="s" name="monster">
			<label for="s">Jakość</label><br/>
			
			<input type="checkbox" id="d" name="monster">
			<label for="d">QMP</label><br/>
			
			<input type="checkbox" id="t" name="monster">
			<label for="t">WO</label><br/>
			
		</fieldset>
	</td>
	<td>

<tr>
				<td class="kaizen-dd">TEMAT</td><td><input type="text" class="kaizen-input" placeholder="TEMAT"></td>
</tr>
<tr>
				<td class="kaizen-dd">OPIS PROBLEMU</td><td><input type="text" class="kaizen-input" placeholder="OPIS PROBLEMU"></td>
				
</tr>
<tr>
				<td class="kaizen-dd">OPIS SZCZEGÓŁOWY</td><td><textarea id="story" name="story" rows="5" class="txtar" placeholder="SZCZEGÓŁOWY OPIS WYKONANIA"></textarea></td>
				
</tr>

</tr>


</div>