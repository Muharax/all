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


