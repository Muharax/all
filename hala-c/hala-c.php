<?php 
	require('../session.php');
	require('../header.php');
	require('../logo.php');
?>

	<div id="menu-glowne">
	
	<a href="#" id="stan-det"><div class="ss">STAN</div></a>
	<a href="#" id="mapa-det"><div class="ss">MAPA</div></a>
	<div class="sss"></div>
	<a href="../index.php"><div class="ss">WYJDŹ</div></a>

	</div>

		<div class="mymodal"></div>
		<div class="mymodal-1"></div>
		
		<div class="market-dane"></div>
	
<?php require('../footer.php');?>

<script>
   
$(document).on("click", '#uzaz', function() {

var tabb = new Array();
						
$("input[name='check-hala-c']:checked").each(function(){
	tabb.push($(this).val());
	console.log(tabb.length);
});
if(tabb.length === 0){
	$().msgpopup({
		text: 'ZAZNACZ CO JEST DO USUNIĘCIA',
		type: 'error'
	});
	return
}

						
						
$.confirm({
		title: 'USUŃ',
		content: 'CZY JESTEŚ TEGO PEWNY ?',
		escapeKey: 'cancelAction',
		buttons: {
			confirm: {
				btnClass: 'btn-red',
				text: 'USUŃ ZAZNACZONE',
				action: function(){

						$.ajax({
							type: "POST",
							url: origin+'/alweb/hala-c/usun-core-all.php',
							dataType:'text',
							data:{ "z1":tabb},
							success: function(data){
								$(".market-dane").load('stan-detali.php');
								$().msgpopup({
									text: ''+data+'',
									type: 'success'
								});
								// simpleNotify.notify({message: ''+data+'', level: 'danger'});
								// $.alert('USUNIĘTO POPRAWNIE');
								// window.location.href = origin+'/alweb/index.php'
								// window.location.href('index.php');
							},
						})
					
					
				}
			},
			cancelAction: {
				btnClass: 'btn-green',
				text: 'ANULUJ',
				// action: function(){
					// $.alert('ANULOWANO');
				// }
			}
		}
	});
});
// ============================================================
$(document).on("click", '#editto', function() {	
	var t1 = $(this).data("value");
          
   $(".mymodal-1").load("modal-edytuj.php", {"z1":t1});
   $(".mymodal").toggle();
   $(".mymodal-1").toggle(500,"swing");
   
   // $(".mymodal-1").toggle("slide", {direction: "left" }, 4000); 
   // $(".mymodal-1").toggle(300,"linear"); 
   // $(".mymodal-1").toggle("'slide', {direction: 'left' }, 3000"); 
});
// ============================================================
$(document).on("click", '#delete1', function() {
	var t1 = $(this).data("value");
	$.confirm({
		title: 'USUŃ',
		content: 'USUNĄĆ DANĄ POZYCJĘ ?',
		escapeKey: 'cancelAction',
		buttons: {
			confirm: {
				btnClass: 'btn-red',
				text: 'USUŃ',
				action: function(){
					$.ajax({
						type: "POST",
						url: "usun-core.php",
						data: {"z1":t1},
						dataType:'text',
						success: function(data){
							$(".market-dane").load('stan-detali.php');
							$().msgpopup({
									text: ''+data+'',
									type: 'success'
								});
						},
					})
					
				}
			},
			cancelAction: {
				btnClass: 'btn-green',
				text: 'ANULUJ',
				}
		}
	});

});

// ============================================================
$(document).on("click", '#stan-det', function() {	
 $(".market-dane").load('stan-detali.php');		
});


$(document).on("click", '#mapa-det', function() {	
 $(".market-dane").load('mapa-detali.php');
 // $( "#menu-glowne" ).css( "display", "none" );
});
</script>
