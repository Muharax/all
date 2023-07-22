<div id="sek-prod"> 
	<div id="sek-prod-form">
	WERSJA:
	<form action="core/sekwencja-produkcji-core.php" method="POST" >

		<div class="wersja-sp"><input type="radio" name="wersja" id="vwgolf380higheu" value="VW GOLF 380 HIGH EU"><label for="vwgolf380higheu">VW GOLF 380 HIGH EU</label></div>
		<div class="wersja-sp"><input type="radio" name="wersja" id="vwgolf380loweu" value="VW GOLF 380 LOW EU"><label for="vwgolf380loweu">VW GOLF 380 LOW EU</label></div>
		<div class="wersja-sp"><input type="radio" name="wersja" id="vwgolf380highsae" value="VW GOLF 380 HIGH SAE"><label for="vwgolf380highsae">VW GOLF 380 HIGH SAE</label></div>
		<div class="wersja-sp"><input type="radio" name="wersja" id="vwgolf380lowsae" value="VW GOLF 380 LOW SAE"><label for="vwgolf380lowsae">VW GOLF 380 LOW SAE</label></div>

	</div>

<div id="sek-prod-1" onload="emptyCode();">

<input type="text" name="code" value="" maxlength="8" class="display" readonly="readonly" onfocus="showKeys()"/>
			<table id="keypad" cellpadding="5" cellspacing="3">
				<tr>
					<td onclick="addCode('1');">1</td>
					<td onclick="addCode('2');">2</td>
					<td onclick="addCode('3');">3</td>
				</tr>
				<tr>
					<td onclick="addCode('4');">4</td>
					<td onclick="addCode('5');">5</td>
					<td onclick="addCode('6');">6</td>
				</tr>
				<tr>
					<td onclick="addCode('7');">7</td>
					<td onclick="addCode('8');">8</td>
					<td onclick="addCode('9');">9</td>
				</tr>
				<tr>
					<td onclick="emptyCode('C');">C</td>
					<td onclick="addCode('0');">0</td>
					<td></td>
				</tr>
			</table>

		
	</div>
	
	<div id="button-zapisz">
		<button type="submit" name="button-zapisz">Zapisz</button>
	</div>
	
	</form>
</div>
<script>
function showKeys(){
	document.getElementById("keypad").style.visibility = "visible";
}
function addCode(key){
	var code = document.forms[0].code;
	if(code.value.length < 6){
		code.value = code.value + key;
	}

}

function emptyCode(){
	document.forms[0].code.value = "";
}

</script>