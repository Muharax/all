<?php require ('../../session.php');?>

<div class="container">
  <div class="row">
    <div class="col form-control">NAZWA UZYTKOWNIKA</div>
    <div class="col form-control">
		<input type="text" id="nazwa">
		<input type="hidden" id="token" value="<?php echo $_SESSION['token'];?>">
	</div>	
	<button id="uzytkownicy_szukaj">SZUKAJ</button>
  </div>
</div>
<button class="btn btn-success btn-sm">Dodaj</button>
<div id="OUTPUT"></div>

<script>

$(document).on("click", '#uzytkownicy_szukaj', function() {
	
	$.ajax({
		type: "POST",
		url: URL+"admin/uzytkownicy/core/wyszukaj-uzytkownika.php",
		dataType:'text',
		success: function(msg){
			$("#OUTPUT").html(msg);
		// $().msgpopup({
				// text: ''+msg+'',
				// type: 'success'
			// });
			
		},
	});	
	// $(".load-c").load('scanner/scan.php');
});

</script>







