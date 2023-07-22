<style>
.A1{
	color:white;
	
}
.A0{
	padding:10px;
	background-color: #212529;
	width:400px;
	border-radius:10px;
}
.radio-size{
	width: 40px;
    height: 40px;
	vertical-align: middle;
}
table.pobranie td {
	vertical-align: middle;
	font-size:14px;
	font-weight:500;
}
.dalej{
	width:100%
}
.in-number{
	width:100%;
	font-size:25px;
}

</style>
<div class="A0">

<div class="A1">
	<table class="pobranie table table-dark">
		<thead>
			<tr>
				<th>RADIO</td>
				<th>NAZWA</td>
				<th>KOD</td>
			</tr>
		</thead>
	<tbody>

	<?php
	$lacznik = $_POST['z1'];

		require_once('../../database/db-connect.php');
		$a = 'SELECT nazwa, kod FROM `bom` WHERE `wersja` = "'.$lacznik.'" ORDER BY `nazwa` ASC';
		$zadanie = $db_PDO->query($a);
		$ile = $zadanie->rowCount();
		
		if($ile === 0){
			echo 'Brak danej wersji';
			exit;
		}
		
		if($ile >= 1 ){
			for($i=0; $i < $ile; $i++){
				$wiersz = $zadanie->fetch();
				
			echo '<tr>
				<td><input type="radio" name="A11" class="radio-size" value="'.$wiersz['kod'].'"</td>
				<td>'.$wiersz['kod'].'</td>
				<td>'.$wiersz['nazwa'].'</td>
				</tr>';
			}
		}
	?>
	<tr>
		<td>ILOŚĆ</td>
		<td colspan="2"><input type="number" id="id-number" class="in-number" value="11"></td>
	</tr>
	<tr>
		<td>STRONA</td>
		<td colspan="2" style="font-size:20px;">
			<input type="radio" name="A12" class="radio-size" value="L" checked> L
			<input type="radio" name="A12" class="radio-size" value="PR"> PR
			<input type="radio" name="A12" class="radio-size" value="KIT"> KIT
		</td>
	</tr>
	<tr>
		<td colspan="3"><button class="dalej" id="D2">DALEJ <b>D2</b></button></td>
	</tr>
	</tbody>
	</table>

</div>
</div>

<script>
$(document).on("click", '#D2', function () {
	var t1 = $("input[name=A11]:checked").val();
	var t2 = $("input[name=A12]:checked").val();
	var t3 = $("input[id=id-number]").val();

	$.ajax({
		type: "POST",
		url: "produkcja/start-D2.php",
		data: {"z1":t1,"z2":t2,"z3":t3},
		dataType: "text",
		success: function(msg){
			// $(".market-dane").html(msg);
			 $().msgpopup({
				text: ''+msg+'',
				type: 'success'
			  });
		},
	});
		
});

</script>