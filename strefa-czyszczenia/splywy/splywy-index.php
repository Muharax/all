<style>
.white{
	color:white;
}
#browser{
	width:500px;
}
</style>

<div class="white">
<?php
error_reporting (E_ALL);






echo 'Produkcja 1

<br>
<br>


<label for="browser">Choose production</label>
<img id="del1" src="../img/del1.png">

<br>
<input list="browsers" name="browser" id="browser">


<datalist id="browsers">';

require('../../database/db.php');
		$sql = "SELECT * FROM `bom`";
		$zadanie = $db_PDO->query($sql);
		$ile = $zadanie->rowCount();

	for ($i=0; $i < $ile; $i++)
        {
			$wiersz = $zadanie->fetch();
			echo '<option value="'.$wiersz['kod'].'">';
		}

echo '</datalist>
<br>
<label for="ile">Ile</label>
<br>
<input type="number" id="ile_s" value="276">
<button id="splywy-dodaj">Add</button>

';

	
?>
</div>

<div class="market-dane2"></div>


<script>
$(document).on("click", '#del1', function() {
	$("#browser").val("");
});
	
$(document).on("click", '#splywy-dodaj', function() {
	var t1 = $("#browser").val();
	var t2 = $("#ile_s").val();
	 $.ajax({
		type: "POST",
		url: "splywy/splywy-dodaj.php",
		dataType:'text',
		data: {"z1":t1, "z2":t2},
		success: function(msg) {
			$(".market-dane2").html(msg);
			 // $().msgpopup({
				// text: ''+msg+'',
				// type: 'success'
			  // });
			// simpleNotify.notify({message: ''+msg+'', level: 'danger'});
			
		}
});
});
</script>