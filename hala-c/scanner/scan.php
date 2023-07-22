<?php 
		require('../../session.php');
?>

<div id="reader"></div>

<script>
let html5QrcodeScanner = new Html5QrcodeScanner(
  "reader",
  { fps: 10, qrbox: {width: 350, height: 250} });
        
function onScanSuccess(decodedText, decodedResult) {
    html5QrcodeScanner.clear();
	$('input[type="search"]').val(decodedText);
}

html5QrcodeScanner.render(onScanSuccess);

</script>