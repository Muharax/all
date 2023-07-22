<?php 
		require('../../../session.php');
?>
<div id="reader"></div>

<script>
var html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", { fps: 10, qrbox: 350 });
        
function onScanSuccess(decodedText, decodedResult) {
	$('#scan-box-input').val(decodedText);
	$("#scan-box-input").trigger("change");
	var audio = new Audio('../../sound/scanner-beep.mp3');
	audio.play();
    html5QrcodeScanner.clear();
}
html5QrcodeScanner.render(onScanSuccess);
</script>