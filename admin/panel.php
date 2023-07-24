<style>
	#e-window{
		padding:5px;
	}
</style>

<?php
	require ('../session.php');
?>

	<div id="PANEL">
		<button id="#" class="btn btn-info btn-sm">Użytkownicy</button>
		<button id="uzytkownicy_znajdz" class="btn btn-light btn-sm">Znajdź</button>
		<button id="uzytkownicy" class="btn btn-light btn-sm">Pokaż</button>
	</div>
	
	<div id="e-window"></div>

<?php 
	require('../footer.php');
?>


<script>
$(document).on("click", '#uzytkownicy_znajdz', function() {
	$("#e-window").load(URL+'admin/uzytkownicy/uzytkownicy_znajdz.php');
});
</script>