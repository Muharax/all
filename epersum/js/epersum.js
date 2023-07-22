//====================================================================
//=============== PRZYCISK USUŃ Z DZIAŁU URLOP =======================
//====================================================================
$(document).on("click", '#w1', function(event) {
  var t1 = $( this ).val();
  
  $.ajax({
		url: "core/core/usun-urlop.php",
		type: "POST",
		data: {"z1":t1},
		success: function(msg) {
			$("#div1").load("core/urlop.php");
			$("#div3").load("core/core/pobierz-urlop.php");
		}
});
});

//====================================================================
//=============== PRZYCISK USUŃ Z DZIAŁU ADMIN=>ROZLICZENIA =======================
//====================================================================
$(document).on("click", '#w2', function(event) {
  var t1 = $( this ).val();
  $( ".logo-w2" ).html( t1 );
  
  $.ajax({
		url: "admin/core-admin/usun-rozliczenia.php",
		type: "POST",
		data: {"z1":t1},
		success: function(msg) {
			$("#div1").load("core/administracja.php");
			$("#div3").load("admin/rozliczenia.php");
		}
});
});
//====================================================================
//============ PRZYCISK == AKCEPTUJ == Z DZIAŁU ROZLICZENIA ==========
//====================================================================
$(document).on("click", '#w3', function(event) {
  var t1 = $( this ).val();
  $( ".logo-w2" ).html( t1 );
  
  $.ajax({
		url: "admin/core-admin/akceptuj-rozliczenia.php",
		type: "POST",
		data: {"z1":t1},
		success: function(msg) {
			$("#div1").load("core/administracja.php");
			$("#div3").load("admin/rozliczenia.php");
		}
});
});
//====================================================================
//=============== ADMINISTACJA=>ROZLICZENIA (WSZYSTKIE) =======================
//====================================================================
$(document).on("click", '#roz', function(event) {
  var t1 = $( this ).val();
  $( ".logo-w2" ).html( t1 );
  $("#div3").load("admin/rozliczenia.php");
  $("#div3").show();
		

});




$(document).on("click", '#a3', function() {
 $("#div1").load("docs.php");
});







// $( '[id^="a"]' ).each( function() {
  // $( this ).click( function() {
    // var text = $( this ).text();
		// $("#div1").load("core/"+text+".php");
		// $("#div3").hide();
  // });
// });
$( '#b1' ).each( function() {
  $( this ).click( function() {
    var text = $( this ).text();
		$("#div1").load("core/"+text+".php");
		$("#div3").load("core/core/pobierz-urlop.php");
		$("#div3").show();
		
  });
});


$(function() {
    $(document).on("click", '#mym1', function() {
		var tekst = $( '#data1' ).val();
		var tekst1 = $( '#data2' ).val();
		var tekst2 = $( '#data3' ).val();
		var tekst3 = $( '#data4' ).val();
		
		$.ajax({
				url: "core/core/dodaj-urlop.php",
				type: "POST",
				data: {"z1":tekst,
						"z2":tekst1,
						"z3":tekst2,
						"z4":tekst3},
				success: function(msg) {
					$("#div3").load("core/core/pobierz-urlop.php");
					$("#div1").load("core/urlop.php");
				}
			});
		
});
});

function validate(){
		 var f1 = document.getElementById('data1');
		 var f2 = document.getElementById('data2');
		 var f3 = document.getElementById('data3');
		 var f4 = document.getElementById('data4');
		
		if(f3.value.length > 5 && f1.value != null){
		document.getElementById('mym1').disabled=false;
	} else {
		document.getElementById('mym1').disabled=true; 
	}
		
	}

