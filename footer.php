<div class="footer-out">
	
	<div class="footer-w2">
	<img width="250px" height="20px" src="<?php echo URL;?>/img/skynet-division.jpg"><br>
	
	</div>
	
</div>

</body>
</html>

<?php 
				function DBQ($ID){
				require('../database/db.php');
				$b = 'SELECT * FROM `market_zamowienia` WHERE `id`="'.$ID.'"';
				$zadanie = $db_PDO->query($b);
				$ile_znalezionych = $zadanie->rowCount();
				if($ile_znalezionych === 0){
					echo $ile_znalezionych. '- Brak wyników';
				}else{
					$wiersz = $zadanie->fetch();
					echo $wiersz['nazwa'];
				}
			}

		?>

<script>
// ============================== OVERLAY ================================
// =======================================================================
// $(document).on({
    // ajaxStart: function() { $("#overlay").fadeIn(100) },
     // ajaxStop: function() {  $("#overlay").fadeOut(100); }    
// });

// $(document).on({
    // ajaxStart: function() { $('#overlay').removeClass('hidden') },
     // ajaxStop: function() { $('#overlay').addClass('hidden') }    
// });
// =====================================================================
$(document).on("click", '#potwierdz-market', function() {
	var t1 = $(this).val();
	$.confirm({
		escapeKey: 'cancelAction',
		title: 'POTWIERDZENIE',
		content: 'CZY NA PEWNO ?',
		buttons: {
			confirm: {
				btnClass: 'btn-green',
				text: 'POTWIERDZAM',
				action: function(){
					
				
				
		$.ajax({
		type: "POST",
		url: "market/potwierdz.php",
		data: {"z1":t1},
		success: function(msg){
			$(".market-dane").load("market/market-potwierdzenia.php");
			 $().msgpopup({
							text: ''+msg+'',
							type: 'success'
						  });
		},
	});
					
				}
			},
			cancelAction: {
				btnClass: 'btn-red',
				text: 'EXIT',
				// action: function(){
					// $.alert('ANULOWANO');
				// }
			}
		}
	});
	
	
	
});
// =====================================================================
// ================================================================================
// ===========================  WIADOMOŚĆI  =======================================
// ================================================================================
$(document).on("click", '#scan-qr', function() {
 $(".load-c").load('scanner/scan.php');
});


$(document).on("click", '#wiadomosci-odbierz', function() {
 $(".market-dane").load('uzytkownicy/wiadomosci-odbierz-core.php');
});
// ================================================================================
$(document).on("click", '#wiadomosci-kosz', function() {
 $(".market-dane").load('uzytkownicy/wiadomosci-kosz-core.php');
});
// ================================================================================
$(document).on("click", '#wiadomosc-open', function() {	
	var t1 = $(this).val();
	var t2 = $(this).attr("data-value");
	console.log(t2);

	if(t2 === '1'){
			$.ajax({
				type: "POST",
				url: "uzytkownicy/wiadomosci-przeczytane-core.php",
				data: {"z1":t1},
				dataType:'text',
				success: function(msg){
					
					$('.wiadomosc-open-usun'+t1).attr("disabled", false);
					$('.wiadomosc-open'+t1).css('background-color', 'white');
					$('.hidd'+t1).toggle();
					$('.XXX').text('');
					// $().msgpopup({
							// text: ''+msg+'',
							// type: 'success'
						// });
					
				},
			});	
	}else{
		$('.hidd'+t1).toggle();
		
	}
});
// ================================================================================
$(document).on("click", '#wiadomosci-usun', function() {	
	var t1 = $(this).val();
	// var t2 = $(this).attr("data-value");
	console.log(t1);


			$.ajax({
				type: "POST",
				url: "uzytkownicy/wiadomosci-usun-core.php",
				data: {"z1":t1},
				dataType:'text',
				success: function(msg){
					$(".market-dane").load('uzytkownicy/wiadomosci-odbierz-core.php');
					$().msgpopup({
							text: ''+msg+'',
							type: 'success'
						});
					
				},
			});
	
});
// ================================================================================//
$(document).on("click", '#usun-del', function() {	
	var t1 = $(this).val();
	// var t2 = $(this).attr("data-value");
	console.log(t1);


			$.ajax({
				type: "POST",
				url: "uzytkownicy/wiadomosci-kosz-usun-core.php",
				data: {"z1":t1},
				dataType:'text',
				success: function(msg){
					$(".market-dane").load('uzytkownicy/wiadomosci-kosz-core.php');
					$().msgpopup({
							text: ''+msg+'',
							type: 'success'
						});
					
				},
			});	
	
});
// ================================================================================//
// ============================== MAPA HALA C =====================================//
$(document).on("click", '.loc-out1', function(event) {
	$( this ).children('.infoo').slideToggle('fast').css( "display", "block" );	
});

// ======================================== LOGO ==============================================
// ============================================================================================
$(document).on("click", '#lg-out', function() {
$.confirm({
		title: 'WYLOGOWAĆ ?',
		content: 'CZY JESTEŚ TEGO PEWNY ?',
		escapeKey: 'cancelAction',
		buttons: {
			confirm: {
				btnClass: 'btn-red',
				text: 'WYLOGUJ',
				action: function(){
					$.ajax({
						type: "POST",
						url: origin+'/all/logout.php',
						dataType:'text',
						success: function(){
								window.location.href = origin+'/all/index.php'
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
// ============================================================================================

$(document).ready(function(){
	 $('#dropDown').click(function(event){
		$('.drop-down').toggleClass('drop-down--active');
		event.stopPropagation();
	  });
	  $(document).click(function(event) {
			if (!$(event.target).hasClass('drop-down--active')) {
				$(".drop-down").removeClass("drop-down--active");
			}
		});
});


$(document).ready(function(){
$( 'a[name="xc"]' ).click(function() {
	$('#mV').slideToggle('fast');
});
$( 'a[name="xcc"]' ).click(function() {
	$('#mVc').slideToggle('fast');
});
});


$(document).on("click", '#stan-1', function() {
 $(".market-dane").load('market/market-stan-detali-1.php');
});



// =======================================================================
// $(document).on("click", '#sub', function() {
	// var login = $('#first').val();
	// var pass = $('#second').val();
	
	// $.ajax({
    // type: "POST",
    // url: "zaloguj.php",
    // data: {"t1":login, "t2":pass},
	// dataType:'text',
    // success: function(msg){
		// console.log(msg);
		
		// if(msg == 'success'){
			// window.location.href='../index.php';
		// }
	
	
		// $().msgpopup({
				// text: ''+msg+'',
				// type: 'success'
			// });
    // },
// })
// });

$(document).on("click", '#do-zamowienia', function() {	
	var t1 = $(this).val();
	var t2 = $("#ile-do-produkcji").val();
	
	$.ajax({
    type: "POST",
    url: "produkcja/detale-potrzebne.php",
	data: {"z1":t1,"z2":t2,},
	dataType:'text',
    success: function(msg){
		
		$(".market-dane").html(msg);
		// $().msgpopup({
				// text: ''+msg+'',
				// type: 'success'
			// });
    },

});	

});
// =======================================================================
$(document).on("click", '#kpa2', function() {
	var t1 = $(this).data("value");
	var URL = '../logistyka/karty_pakowania/'+t1;
	// $('<a href="'+ URL +'" target="_blank">External Link</a>')[0].click();
		
		
	$.ajax({
    type: "POST",
    url: "pobieranie-karty-pakowania.php",
	data: {"z1":t1},
	dataType:'text',
    success: function(msg){
		if(msg == "1"){
			$('<a href="'+ URL +'" target="_blank">External Link</a>')[0].click();
			
		}else{
			$().msgpopup({
				text: ''+msg+'',
				type: 'success'
			});
		}
			
		
    },
});	
});
// =======================================================================
$(document).on("click", '#editto2', function() {	
	var t1 = $(this).data("value");
          
   $(".mymodal-1").load("modal-edytuj.php", {"z1":t1});
   $(".mymodal").toggle();
   $(".mymodal-1").toggle();	 
});
// =======================================================================
$(document).on("click", '#save4', function() {
	var t1 = $('#nn11').val();
	var t2 = $('#nn22').val();
	var t3 = $('#pojemnik').val();
	var t4 = $('#nn44').val();
	var pid = $('#pid').val();
	var t5 = $('#akt-poj').val();


  $.ajax({
		url: "zapisz-zmiany.php",
		type: "POST",
		data: {"z1":t1, "z2":t2, "z3":t3, "z4":t4, "pid":pid, "z5":t5},
		success: function(msg) {
			
			$(".mymodal").toggle();
			$(".mymodal-1").toggle();
			
			$(".market-dane2").load('kp-szukaj.php');
			
			$( "div:contains(''+msg+'')" ).css( "text-decoration", "underline" );
			 $().msgpopup({
				text: ''+msg+'',
				type: 'success'
			  });
			
			// simpleNotify.notify({message: ''+msg+'', level: 'danger'});
		}
});
});

// =======================================================================




$(document).on("click", '.button-pojemnik-1', function(event) {
	var t1 = $(this).val();
	
	$.ajax({
    type: "POST",
    url: "market/stan-1.php",
    data: {"z1":t1},
	dataType:'text',
    success: function(data){
		
		$(".market-dane").html(data);
    },
})
});


$(document).on("click", '#sk', function() {
 $(".market-dane").load('produkcja/start-model.php');
});
$( "#edytuj-uzytkownika" ).click(function() {
  $(".market-dane").load('edytuj-uzytkownika.php');
});
// =====================================================
$(document).on("click", '.footer-w2', function() {
 $(".footer-out").toggle();
});
$(document).on("click", '#Stat-Czyszczenie1', function() {
 $(".market-dane").load('statystyki/czyszczenie-core1.php');
});
$(document).on("click", '#Stat-Strefa1', function() {
 $(".market-dane").load('statystyki/strefa-core1.php');
});
$(document).on("click", '#Stat-Strefa2', function() {
 $(".market-dane").load('statystyki/strefa-core2.php');
});
$(document).on("click", '#Stat-Strefa3', function() {
 $(".market-dane").load('statystyki/strefa-core3.php');
});
$(document).on("click", '#Stat-Strefa4', function() {
 $(".market-dane").load('statystyki/graph.php');
});
$(document).on("click", '#Stat-Market1', function() {
 $(".market-dane").load('statystyki/market-core1.php');
});

$(document).on("click", '#Stat-Market2', function() {
 $(".market-dane").load('statystyki/market-core2.php');
});
$(document).on("click", '#wfw', function() {
 $(".market-dane").load('market/market-stan-detali.php');
});
$(document).on("click", '#HCA', function() {
 $(".market-dane").load('hala-a/hala-a.php');
});
$(document).on("click", '#wfww', function() {	
 $(".market-dane").load('produkcja/produkcja-aktywne.php');
});
$(document).on("click", '#market-zamowieniaG', function() {	
 $(".market-dane").load('market/market-zamowienia.php');
});
$(document).on("click", '#market-potwierdzeniaG', function() {	
 $(".market-dane").load('market/market-potwierdzenia.php');
});
$(document).on("click", '#reset', function() {
	$.ajax({
    type: "POST",
    url: origin+"/alweb/test/dodaj.php",
	dataType:'text',
    success: function(data){		
		$(".market-dane").html(data);	
    },
});
});
// =====================================================================
// =====================================================================
$(document).on("click", '.mymodal', function() {
  $(".mymodal").toggle();
  $(".mymodal-1").toggle();
});
// =====================================================================
// =====================================================================

$(document).on("click", '#btn-pobierz-bwid', function() {
	var t1 = $(this).val();

  $(".mymodal-1").load("market/modal-zamow.php", {"z1":t1});
  $(".mymodal").toggle();
  $(".mymodal-1").toggle();
  // simpleNotify.notify({message: ''+t1+'', level: 'good'});
});


$(document).on("click", '#pobranie', function(event) {
	var t1 = $(this).val();
  $(".mymodal-1").load("market/modal-pobranie.php", {"z1":t1});
  $(".mymodal").toggle();
  $(".mymodal-1").toggle();
  // simpleNotify.notify({message: ''+t1+'', level: 'good'});
});
// =====================================================================
// =====================================================================
$(document).on("click", '#start-w1', function() {
		$(".market-dane").load("produkcja/start.php");
});
// =====================================================================
// =====================================================================

// =====================================================================
// =====================================================================
$(document).on("click", '.button-pojemnik', function(event) {
	var t1 = $(this).val();
	
	$.ajax({
    type: "POST",
    url: "market/stan.php",
    data: {"z1":t1},
	dataType:'text',
    success: function(data){
		
		$(".market-dane").html(data);
    },
});
});
// =====================================================================
// =====================================================================
$(document).on("click", '#edytuj', function() {
	var t1 = $(this).val();


  $(".mymodal-1").load("market/market-edytuj.php", {"z1":t1});
  $(".mymodal").toggle();
  $(".mymodal-1").toggle();
});
// =====================================================================
// =====================================================================
$(document).on("click", '#zamow', function() {
	var t1 = $(this).val();
	 $.ajax({
		type: "POST",
		url: "market/zamow.php",
		dataType:'text',
		data: {"z1":t1},
		success: function(msg) {
			$(".market-dane").load("market/stan.php");
			 $().msgpopup({
				text: ''+msg+'',
				type: 'success'
			  });
			// simpleNotify.notify({message: ''+msg+'', level: 'danger'});
			
		}
});
});
// =====================================================================
// =====================================================================

$(document).on("click", '#niezgodnosc-market', function() {
	var t1 = $(this).val();

  $(".mymodal-1").load("market/modal/niezgodnosc.php", {"z1":t1});
  $(".mymodal").toggle();
  $(".mymodal-1").toggle();
});


$(document).on("click", '#potwierdz', function() {
	
	var t1 = $(this).val();
	var tt = $(this).attr("data-value");
	var tt1 = $(this).attr("data-ilosc");

	$.confirm({
		escapeKey: 'cancelAction',
		title: '<div class="okno-pobranie-detalu"><I>POBRANIE DETALU</I></div>',
		content: '<b>NAZWA:</b> '+tt+'<br> <b>ILOŚĆ: </b>'+tt1,
		buttons: {
			confirm: {
				btnClass: 'btn-green',
				text: 'POBIERAM',
				action: function(){
					
				
				$.ajax({
				url: "market/pt.php",
				type: "POST",
				data: {"z1":t1},
				
					success: function(data){
						$(".market-dane").load("market/market-zamowienia.php", {"z1":t1});
						 $().msgpopup({
							text: ''+data+'',
							type: 'success'
						  });
						// simpleNotify.notify({message: ''+data+'', level: 'danger'});
					},
				});	
					
				}
			},
			cancelAction: {
				btnClass: 'btn-red',
				text: 'EXIT',
				// action: function(){
					// $.alert('ANULOWANO');
				// }
			}
		}
	});
	
	
	
	
	

});
// =====================================================================
// =====================================================================
$(document).on("click", '#rc-market', function() {
	var t1 = $(this).val();
  $(".mymodal-1").load("market/rc.php", {"z1":t1});
  $(".mymodal").toggle();
  $(".mymodal-1").toggle();
});
// =====================================================================

// =====================================================================
$(document).on("click", '#save3', function() {
	var t1 = $(this).val();
	var t2 = $('#pobranie-c1').val();
	var t3 = $('#pobranie-c2').val();
	 $.ajax({
		url: "market/pobranie.php",
		type: "POST",
		data: {"z1":t1, "z2":t2, "z3":t3},
		success: function(msg) {
		
			simpleNotify.notify({message: ''+msg+'', level: 'good'});
			$(".mymodal").toggle();
			$(".mymodal-1").toggle();
		}
});
});
// =====================================================================
// =====================================================================

// =====================================================================
$(document).on("click", '#save2', function() {
  var t1 = $( "#c1" ).val();
  var t2 = $( "#c2" ).val();
  var t3 = $( "#pid" ).val();
  
  $.ajax({
		url: "market/rc-core.php",
		type: "POST",
		data: {"z1":t1, "z2":t2, "z3":t3},
		success: function(msg) {
			$(".market-dane").load('market/market-zamowienia.php');
			 $().msgpopup({
				text: ''+msg+'',
				type: 'success'
			  });
			$(".mymodal").toggle();
			$(".mymodal-1").toggle();
			// simpleNotify.notify({message: ''+msg+'', level: 'danger'});
		}
});
});
// =====================================================================
// =====================================================================
$(document).on("click", '#save1', function() {
	var t1 = $('#nn1').val();
	var t2 = $('#nn2').val();
	var t3 = $('#nn3').val();
	var t4 = $('#nn4').val();
	var t5 = $('#nn5').val();
	var t6 = $('#nn6').val();
	var t7 = $('#nn7').val();
	var t8 = $('#nn8').val();
	var t9 = $('#nn9').val();
	var t10 = $('#pid').val();

  $.ajax({
				url: "market/zapisz-zmiany.php",
				type: "POST",
				data: {"z1":t1,
						"z2":t2,
						"z3":t3,
						"z4":t4,
						"z5":t5,
						"z6":t6,
						"z7":t7,
						"z8":t8,
						"z9":t9,
						"pid":t10},
				success: function(msg) {
					$(".mymodal").toggle();
					$(".mymodal-1").toggle();
					$(".market-dane").load("market/stan.php", {"z1":''+msg+''});
					$().msgpopup({
						text: 'UDAŁO SIE',
						type: 'success'
					  });
				}
			});	
});


	var pathname = window.location.pathname; // Returns path only (/path/example.html)
	var url      = window.location.href;     // Returns full URL (https://example.com/path/example.html)
	var origin   = window.location.origin;   // Returns base URL (https://example.com)
	var URL		 = window.location.origin+'/all/';   // Returns base URL (https://example.com)
	
	
	
	
	




</script>
