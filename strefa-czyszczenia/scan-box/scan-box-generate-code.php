<?php 
		require('../../session.php');
?>
<div class="btn-generate-code">
	<button id="gg" class="btn btn-primary">WYBIERZ POJEMNIK</button>
	<button id="bpo" class="btn btn-primary">BEZ POJEMNIKA</button>
</div>

<script>
$(document).off("click", '#print-qr-code').on("click", '#print-qr-code', function() {
	window.print();
});
$(document).off("click", '#bpo').on("click", '#bpo', function() {
	$('.qr-code-pad1').load('scan-box-generate-BDO.php');
	$('.qr-code-pad1').css({"visibility":"visible"});
	var r= $('<button id="print-qr-code" class="dss btn btn-info">DRUKUJ</button>');
    $(".dane-w").append(r);
	$('.dss').css({"visibility":"visible"});
});
$(document).off("click", '#gg').on("click", '#gg', function() {
	$('.dane-w').load('choose-box-generate-10.php');
});
$(document).off("click", '#dis').on("click", '#dis', function() {
	$('.dss').css({"visibility":"visible"});
	$('.qr-code-pad1').css({"visibility":"visible"});
	// $('.qr-code-pad1').load('scan-box-generate-10.php');
	var t1 = $('#browser').val();
	$(".qr-code-pad1").load('scan-box-generate-10.php', {"z1":t1});
});

</script>