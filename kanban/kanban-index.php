<?php 
	require('../session.php');
	require('../header.php');
	require('../logo.php');
?>
<div class="kanban-out">
<div class="kanban-in-l">

	<a href="../../index.php">
		<button class="cofnij">MAIN MENU</button></a>
		
	<a href="kanban.php">
		<button class="cofnij">BACK</button></a>

<br>
<br>
<div id="tabela-kanban">
		<form action="kanban.php" method="GET">
		<table>
		<tr>
			<td><span class="F16">KOD</span></td>	<td><input type="text" name="kod" class="input-kod"></td>
		</tr>
		<tr>
			<td><span class="F16">NAZWA</span></td>	<td><input type="text" name="nazwa" class="input-nazwa"></td>
		</tr>
		<tr>
			<td><span class="F16">Linia</span></td>	
			
			<td>
			<select name="cars" id="cars">
			
				  <optgroup label="PR 0">
					<option value="volvo">Volvo</option>
					<option value="saab">Saab</option>
				  </optgroup>
				  <optgroup label="PR 1">
					<option value="mercedes">Mercedes</option>
					<option value="audi">Audi 373</option>
				  </optgroup>
				  <optgroup label="PR 2">
					<option value="volvo">Volvo</option>
					<option value="saab">Saab</option>
				  </optgroup>
				  <optgroup label="PR 3">
					<option value="mercedes">Mercedes</option>
					<option value="audi">Audi 373</option>
				  </optgroup>
				  <optgroup label="PR 4">
					<option value="volvo">Volvo</option>
					<option value="saab">Saab</option>
				  </optgroup>
				  <optgroup label="PR 5">
					<option value="mercedes">Mercedes</option>
					<option value="audi">Audi 373</option>
				  </optgroup>
				  <optgroup label="PR 6">
					<option value="volvo">Volvo</option>
					<option value="saab">Saab</option>
				  </optgroup>
				  <optgroup label="PR 7">
					<option value="mercedes">Mercedes</option>
					<option value="audi">Audi 373</option>
				  </optgroup>
				  <optgroup label="PR 8">
					<option value="volvo">Volvo</option>
					<option value="saab">Saab</option>
				  </optgroup>
				  <optgroup label="PR 9">
					<option value="mercedes">Mercedes</option>
					<option value="audi">Audi 373</option>
				  </optgroup>
				  <optgroup label="PR 10">
					<option value="volvo">Volvo</option>
					<option value="saab">Saab</option>
				  </optgroup>
				  <optgroup label="PR 11">
					<option value="mercedes">Mercedes</option>
					<option value="audi">Audi 373</option>
				  </optgroup>
				  
				</select>

</td>
		</tr>

		</table>
</div>

	<div id="szukaj">
		<button class="szukaj" type="submit">Szukaj</button>
	</div>
		</form>









</div>

<div class="kanban-d">

<?php 
	require "../database/db-connect.php";
if(empty($_GET['kod'])){
	
	
		
}else{
		
		$kod = $_GET['kod'];
		
		echo "<br>";
		echo "Wyszukiwany detal: ";
	 
		echo "<hr>";
		$a = "SELECT * FROM `wszystkie-detale` WHERE kod='$kod'";
		
		$zadanie = $db_PDO->query($a);
		$ile_znalezionych = $zadanie->rowCount();
		if($ile_znalezionych == 0){
			$_SESSION['nieznaleziono'] = '<div>BRAK DETALU O TYM KODZIE</div>';
		}else{
		
		echo '<table class="tabela">';
		echo '<tr>';

			echo '<td class="tabela-nazwy">NAZWA</td>';
			echo '<td class="tabela-nazwy">KOD</td>';
			echo '<td class="tabela-nazwy">WERSJA</td>';
			echo '<td class="tabela-nazwy">TYP</td>';
			echo '<td class="tabela-nazwy">ILOŚĆ</td>';
			echo '<td class="tabela-nazwy">STAN</td>';
			echo '<td class="tabela-nazwy">DODAJ ZAMÓWIENIE</td>';
		
		echo '</tr>';
		
for ($i=0; $i < $ile_znalezionych; $i++)
        {
				$wiersz = $zadanie->fetch();
			
				echo '<tr>';
				
				echo '<td class="tabela-n">
				
					<form action="kanban-wynik.php" method="POST">' . $_SESSION['nazwa'] = $wiersz['nazwa'];
					
				echo '<td class="tabela-n">' . $_SESSION['kod'] = $wiersz['kod'];
				echo '<td class="tabela-n">' . $_SESSION['versja'] = $wiersz['versja'];
				echo '<td class="tabela-n">
				
					  <select name="typ">
					  <option value="podwozie">PODWOZIE</option>
					  <option value="ilosc">ILOŚĆ</option>
					  <option value="pojemnik">POJEMNIK</option>
					  </select>';

				echo '<td class="tabela-n"><input type="text" name="input-number" id="input-number">';
				echo '<td class="tabela-n"><font color="red">88</font>';
				echo '<td class="tabela-n"><button type="submit" class="dodaj">+</button></form>';
				
				
                echo '</tr>';
        }
echo '</table>';
}
}

echo "<br>";


@$kod = $_GET['kod'];

?>

<div id="">

<?php 
echo "Aktywne zamówienie: ";
echo "<hr>";
		$a = "SELECT * FROM `kanban`";
		
		$zadanie = $db_PDO->query($a);
		$ile_znalezionych = $zadanie->rowCount();
	echo '<table class="tabela">';
		echo '<tr>';

			echo '<td class="tabela-nazwy">NAZWA</td>';
			echo '<td class="tabela-nazwy">KOD</td>';
			echo '<td class="tabela-nazwy">WERSJA</td>';
			echo '<td class="tabela-nazwy">POBRANA ILOŚĆ</td>';
			echo '<td class="tabela-nazwy">TYP</td>';
			echo '<td class="tabela-nazwy">STAN</td>';
			echo '<td class="tabela-nazwy">LOKALIZACJA</td>';
			
		
		echo '</tr>';
for ($i=0; $i < $ile_znalezionych; $i++)
        {
				$wiersz = $zadanie->fetch();
			
				echo '<tr>';
				

				echo '<form action="kanban-re.php" method="GET">
				
					<input type="hidden" name="input-h-id" value="' . $wiersz['id'] . '">';
					
				echo '<td class="tabela-n">' . $wiersz['nazwa'] . '</td>';
				echo '<td class="tabela-n">' . $wiersz['kod'] . '</td>';
				echo '<td class="tabela-n">' . $wiersz['versja'] . '</td>';
				echo '<td class="tabela-n"><input type="text" name="input-number" id="input-number">';
				echo '<td class="tabela-n">
				
					  <select name="typ">
					  <option value="podwozie">PODWOZIE</option>
					  <option value="ilosc">ILOŚĆ</option>
					  <option value="pojemnik">POJEMNIK</option>
					  </select></td>';
					  
				echo '<td class="tabela-n"><font color="red">88</font></td>';
					  
				echo '<td class="tabela-n">
				
					<a href="#">CA102</a></td>';
					
				echo '<td class="tabela-nn"><button type="submit" class="dodaj">-</button></td></form>';
							
				echo '</tr>';
				
				
		}
		
?>



</div>
</div>

<div class="kanban-e">



</div>
</div>






