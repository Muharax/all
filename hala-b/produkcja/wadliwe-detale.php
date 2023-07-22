<!DOCTYPE HTML>
<html lang="pl-PL">
        <head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		
		<link rel="icon" href="img/favicon.ico" sizes="16x16">
		
			<link href="../../css/style.css" rel="stylesheet" type="text/css" >
			
			<link rel="stylesheet" href="../../core/inc/simpleNotifyStyle.css">
			<script src="../../core/inc/simpleNotify.js"></script>

			<title>SKYNET</title>

</head>

<?php 

$info = "ZłOMOWANIE - Proces złomowania, przekazanie informacji dla Karolina Błońska ble ble ble";


?>

<div class="okno">

<form action="#">

Jaki detal<br>
	<select name="nazwa">
		<option>0000 8200 1000 100 - RAMKA PR</option>
		<option>0000 8200 2000 100 - RAMKA L</option>
		<option>0000 8200 3000 100 - KORPUS PR</option>
		<option>0000 8200 4000 100 - KORPUS L</option>
		
	</select>
	
<br>
	Wpisz ilość
	<br>
	<input name="numer" type="number">
	<br>
	
	<input type="checkbox" name="food">Kontrola Jakości<br>
	<input type="checkbox" name="food">Złomowanie
	<a href="#" onclick="simpleNotify.notify({message: '<?php echo $info;?>', level: 'good'})">  ???</a>
	<br>
	<input type="checkbox" name="food">Inne<br>
	
	<br>
	Opisz co dalej z detalem
	<br>
	<textarea id="w3review" name="w3review" rows="4" cols="50">
At w3schools.com you will learn how to make a website. They offer free tutorials in all web development technologies.
</textarea>
	<br>
	<button name ="dodaj "type="submit">Dodaj</button>
	
</form>

</div>









