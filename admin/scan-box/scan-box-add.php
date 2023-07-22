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
<div class="obrys-name2">ZESKANUJ KOD</div>
	<div class="scan-div-input">
		<input type="text" id="scan-box-input" class="form-control" autocomplete="off" value="" readonly>
	</div>
	
	<div class="scan-btn">
		<button id="scan-box-scan" class="w45 btn btn-light">SCAN</button>	
	</div>


</div>
<hr style="background-color: cyan;">
<div class="dane-w"></div>
<div class="load-c"></div>


</div>

<script>
$(document).off("click", '#scan-box-scan').on("click", '#scan-box-scan', function() {
 $(".dane-w").text("");
 $(".load-c").load('scanner/scan.php');
});


$( '#scan-box-input' ).change(function() {
	var t1 = $('#scan-box-input').val();
	$.confirm({
    title: 'CZYSZCZENIE',
    content: 'Dodać pojemnik do wyczyszczonych ?',
    type: 'green',
    typeAnimated: true,
    buttons: {
        tryAgain: {
            text: 'DODAJ',
            btnClass: 'btn-green',
            action: function(){
				$.ajax({
				type: "POST",
				url: "scan-box-ajax-wyczyszczony.php",
				data: {"z1":t1},
				dataType:'text',
				success: function(msg){
					$().msgpopup({
							text: 'GITARRRRA !!!',
							type: 'success'
					});
				}
				});
            }
        },
        close: function () {
        }
    }
});
});


</script>