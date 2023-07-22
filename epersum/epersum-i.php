<style>
#index {
	padding: 7px;
	display: flex;
    justify-content: center;
	margin-left:3px;
	margin-right:3px;
}
#index > a {
	margin-left:3px;
	margin-right:3px;
}
#index-0{
	margin-bottom:10px;
}
</style>
<?php
	require '../session.php';
	require '../header.php';
	require '../logo.php';		
?>
<div class="index-0">
	<div id="index">
		<a href="#" id="b1" class="btn btn-info btn-sm">URLOP</a>
		<a href="#" id="a2" class="btn btn-info btn-sm">ROZLICZENIA</a>
		<a href="#" id="a3" class="btn btn-info btn-sm">DOKUMENTY</a>
		<a href="#" id="a4" class="btn btn-info btn-sm">ODBICIE</a>
		<a href="#" id="a5" class="btn btn-warning btn-sm">ADMINISTRACJA</a>
	</div>
	<div id="div1"></div>
	<div id="div3"></div>
</div>
<?php require '../footer.php';?>

<script src="js/epersum.js"></script>


<script>

	var URL		 = window.location.origin+'/all/epersum';   // Returns base URL (https://example.com)
	
	
$(document).on("click", '#b1', function() {
	 var text = $( this ).text();
	 console.log(text);
		$("#div1").load(URL+"/urlop/"+text+".php");
		$("#div3").load(URL+"/urlop/core/pobierz-urlop.php");
		$("#div3").show();
});

 $(document).on("click", '#btnZapisz', function() {
		var tekst = $( '#data1' ).val();
		var tekst1 = $( '#data2' ).val();
		var tekst2 = $( '#data3' ).val();
		var tekst3 = $( '#data4' ).val();
		var tekst3 = $( '#data4' ).val();
		console.log(URL+"/urlop/core/dodaj-urlop.php");
		
		$.ajax({
				url: URL+"/urlop/core/dodaj-urlop.php",
				type: "POST",
				data: {"z1":tekst,
						"z2":tekst1,
						"z3":tekst2,
						"z4":tekst3},
				success: function(msg) {
					$().msgpopup({
						text: ''+msg+'',
						type: 'success'
					});
					$("#div1").load(URL+"/urlop/urlop.php");
					$("#div3").load(URL+"/urlop/core/pobierz-urlop.php");
				}
			});
		
});

$(document).on("click", '#usun', function(event) {
	var t1 = $( this ).val();
	  
	$.ajax({
			url: URL+"/urlop/core/usun-urlop.php",
			type: "POST",
			data: {"z1":t1},
			success: function(msg){
				$().msgpopup({
						text: ''+msg+'',
						type: 'success'
				});
				$("#div1").load(URL+"/urlop/urlop.php");
				$("#div3").load(URL+"/urlop/core/pobierz-urlop.php");
			}
	});
});



// function validate(){
	// var f1 = document.getElementById('data1');
	// var f2 = document.getElementById('data2');
	// var f3 = document.getElementById('data3');
	// var f4 = document.getElementById('data4');
		
	// if(f3.value.length > 5 && f1.value != null){
		// document.getElementById('btnZapisz').disabled=false;
	// } else {
		// document.getElementById('btnZapisz').disabled=true; 
	// }
		
// }


</script>



