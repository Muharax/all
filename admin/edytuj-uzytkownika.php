<?php require ('../session.php');?>

<div class="container">
  <div class="row">
    <div class="col form-control">NAZWA UZYTKOWNIKA</div>
    <div class="col form-control">
		<input type="text" id="nazwa">
		<input type="hidden" id="token" value="<?php echo $_SESSION['token'];?>">
	</div>	
	<button id="edit-user-szukaj">SZUKAJ</button>
  </div>
</div>

<div class="user-dane"></div>

<script>
$(document).off('click', '#edit-user-szukaj').on("click", '#edit-user-szukaj', function() {
	var t1 = $('#nazwa').val();
	var token = $('#token').val();
	$(".user-dane").load('uzytkownicy/wyszukaj-uzytkownika-core.php', {"z1":t1, "token":token});
});


</script>







