<?php 
		require('../../../../session.php');
?>
<div id="reader"></div>

<script>
var html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", { fps: 10, qrbox: 350 });
        
function onScanSuccess(decodedText, decodedResult) {
	$('#id-1').val(decodedText);
	document.getElementById('id-2').autofocus;
	$('#id-2').val(decodedText);
	var audio = new Audio('../../sound/scanner-beep.mp3');
	audio.play();
    html5QrcodeScanner.clear();
}


html5QrcodeScanner.render(onScanSuccess);
</script>