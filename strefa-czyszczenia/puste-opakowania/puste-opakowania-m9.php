<div id="puste-opakowania-m9-a">
<?php 
if(isset($_POST['submit'])){
	
	echo "SUKA";
	
}
	echo '<table class="tabela-a">';
		echo '<tr>';

			echo '<td class="tabela-nazwy">POJEMNIK</td>';
			echo '<td class="tabela-nazwy">ILOŚC POJEMNIKÓW</td>';
			echo '<td class="tabela-nazwy">ILOŚC PODWOZI</td>';
			echo '<td class="tabela-nazwy">PRIORYTET</td>';
		
		echo '</tr>';
		
		echo '<br>';
		
		echo '<tr>';

			echo '<td class="tabela-nn">
					<form action="puste-opakowania-core.php" method="GET">
						<input type="hidden" value="m9" name="pojemnik" id="pojemnik">M9</td>';
			echo '<td class="tabela-nn">
					<input class="puste-opakowania-input-number" type="number" name="m9-ilosc"></td>';
			echo '<td class="tabela-nn">
					<input class="puste-opakowania-input-number" type="number" name="m9-podwozia">
				  </td>';
			echo '<td class="tabela-nn">
					<div class="textalighleft">
					<label><input name="priorytet" type="radio" value="normalny">NORMALNY</label>
					<br>
					<label><input name="priorytet" type="radio" value="wysoki">WYSOKI</label>
					</div>
				  </td>';
			echo '<td class="tabela-nn"><button class="dodaj">+</button></form></td>';
		
		echo '</tr>';
		
        
echo '</table>';
?>
	
</div>
