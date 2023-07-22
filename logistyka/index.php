<?php 
	require('../session.php');
	require('../header.php');
	require('../logo.php');
?>
<div class="znajdz">
	<div class="J1">
	
		<div class="L1">
			<label>Kod</label>
			<label>Nazwa</label>
		</div>
		
		<div class="L1">
			<input type="number" id="znajdz-kod" placeholder="0000-0000-0000-000">
			<input type="text" id="znajdz-nazwe">
		</div>
		
		<div>
			<button id="skp" class="">Szukaj</button>
		</div>
		
	</div>
	<div style="margin-top: 18px;">
		
		<button id="scakp" class="">Scan QR Aparatem</button>
	</div>

		


	</div>

<?php include '../footer.php'?>
