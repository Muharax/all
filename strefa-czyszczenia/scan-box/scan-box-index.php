<?php 
		require('../../session.php');
		require('../../header.php');
		require ('../../logo.php');	
?>

<div class="full">
	<div class="MainMenu">
		<a href="<?php echo URL;?>strefa-czyszczenia/strefa-czyszczenia-index.php">
		<button class="cofnij">BACK</button></a>	
	</div>
	
<div class="obrys">
<div class="obrys-name">WPROWADŹ NUMER LUB SKANUJ</div>
	<div class="scan-div-input">
		<input type="text" id="scan-box-input" class="form-control" autocomplete="off" value="">
	</div>
	
	<div class="scan-btn">
		<button id="scan-box-scan" class="w45 btn btn-light">SCAN</button>
		<button id="scan-box-search" class="w45 scan-box-search btn btn-info">SEARCH</button>
		
	</div>
	<div class="scan-btn">
	<button id="scan-box-reset" class="w45 scan-box-search btn btn-warning">RESET</button>
	<button id="scan-box-generate-code" class="w45 scan-box-search btn btn-secondary">GENERATE CODE</button>
	</div>

</div>
<hr style="background-color: cyan;">
<div class="dane-w"></div>
<div class="load-c"></div>
<div class="qr-code-pad1" id="qr-code-pad1-to-print"></div>

</div>

<?php require ('../../footer.php');?>
<script>

$(document).off("click", '#scan-box-generate-code').on("click", '#scan-box-generate-code', function() {
 $(".dane-w").load("scan-box-generate-code.php");
});

$(document).off("click", '#btn-wyczyszczony').on("click", '#btn-wyczyszczony', function() {
	var t1 = $('#scan-box-input').val();
	$.ajax({
				type: "POST",
				url: "scan-box-ajax-wyczyszczony.php",
				data: {"z1":t1},
				dataType:'text',
				success: function(msg){
					
					$.confirm({
						title: 'CZYSZCZENIE',
						content: 'POJEMNIK WYCZYSZCZONY?',
						type: 'green',
						typeAnimated: true,
						buttons: {
							tryAgain: {
								text: 'POTWIERDZAM',
								btnClass: 'btn-green',
								action: function(){
									$.confirm({
											title: 'UDAŁO SIĘ',
											content: 'POTWIERDZENIE',
											type: 'green',
											typeAnimated: true,
											buttons: {
												tryAgain: {
													text: 'ZAMKNIJ',
													btnClass: 'btn-green',
													action: function(){
													}
												},
											}
										});
									$( '#scan-box-input' ).val('');
									$(".dane-w").text("");
								}
							},
							close: function () {
							}
						}
					});
					
				},
	});
	

});

$(document).off("click", '#scan-box-search').on("click", '#scan-box-search', function() {
	
	var t1 = $('#scan-box-input').val();
	if(t1==''){
		$(".dane-w").text('UZUPEŁNIJ DANE');
	}else{
		$.ajax({
				type: "POST",
				url: "scan-box-ajax.php",
				data: {"z1":t1},
				dataType:'text',
				success: function(msg){
					$(".dane-w").load(msg);
					
				},
		});
	}
	
	

});


$(document).off("click", '#scan-box-scan').on("click", '#scan-box-scan', function() {
 $(".dane-w").text("");
 // $( '#scan-box-input' ).val('');
 $(".load-c").load('scanner/scan.php');
});

$(document).off("click", '#scan-box-reset').on("click", '#scan-box-reset', function() {
	window.location.href = "scan-box-index.php";
});






$( '#scan-box-input' ).change(function() {
	var t1 = $('#scan-box-input').val();
	$.ajax({
				type: "POST",
				url: "scan-box-ajax.php",
				data: {"z1":t1},
				dataType:'text',
				success: function(msg){
					$(".dane-w").html(msg);
					var audio = new Audio('../../sound/scanner-beep.mp3');
					audio.play();
				},
	});
});


</script>