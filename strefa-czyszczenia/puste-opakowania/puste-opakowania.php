<?php 
		require('../session.php');
		require('../header.php');
		require ('../logo.php');	
?>

<body>

<div id="puste-opakowania">
	<div class="MainMenu">
		<a href="<?php echo URL;?>index.php">
			<button class="cofnij">MAIN MENU</button></a>
	</div>
	<div class="MainMenu">
		<a href="<?php echo URL;?>index.php">
			<button class="cofnij">INVENTARYZACJA</button></a>
	</div>

<div id="puste-opakowania-przyciski">


<div id="puste-opakowania-w">

	
		<div class="pojemnik">
			
				<form action="puste-opakowania.php" method="POST">
					<input type="hidden" name="pojemnik" id="m9" value="m9">
					<button type="submit" class="button-pojemnik">M9</button>
				</form>
			</div>


		<div class="pojemnik">
		
			<form action="puste-opakowania.php" method="POST">
				<input type="hidden" name="pojemnik" id="m9" value="m20">
				<button class="button-pojemnik">M20</button></a></div>
			</form>
	</div>
	
	<div id="puste-opakowania-w">
	
		<div class="pojemnik">
			<form action="puste-opakowania.php" method="POST">
				<input type="hidden" name="pojemnik" id="m9" value="s1 evo">
				<button class="button-pojemnik">S1 EVO</button></a>
			</form>
		</div>


		<div class="pojemnik">
			<form action="puste-opakowania.php" method="POST">
				<input type="hidden" name="pojemnik" id="m9" value="s1 tywek">
				<button class="button-pojemnik">S1 TYWEK</button></a>
			</form>
		</div>


	</div>
	
	<div id="puste-opakowania-w">
	
		<div class="pojemnik">
			<form action="puste-opakowania.php" method="POST">
				<input type="hidden" name="pojemnik" id="m9" value="s2">
				<button class="button-pojemnik">S2</button></a>
			</form>
		</div>

		<div class="pojemnik">
			<form action="puste-opakowania.php" method="POST">
				<input type="hidden" name="pojemnik" id="m9" value="s2+">
				<button class="button-pojemnik">S2+</button></a>
			</form>
		</div>


	</div>
	
	<div id="puste-opakowania-w">
	
		<div class="pojemnik">
			<form action="puste-opakowania.php" method="POST">
				<input type="hidden" name="pojemnik" id="m9" value="s3">
				<button class="button-pojemnik">S3</button></a>
			</form>
		</div>

		<div class="pojemnik">
			<form action="puste-opakowania.php" method="POST">
				<input type="hidden" name="pojemnik" id="m9" value="s4">
				<button class="button-pojemnik">S4</button></a>
			</form>
		</div>


	</div>
	
	<div id="puste-opakowania-w">
	
		<div class="pojemnik">
			<form action="puste-opakowania.php" method="POST">
				<input type="hidden" name="pojemnik" id="m9" value="b1">
				<button class="button-pojemnik">B1</button></a>
			</form>
		</div>

		<div class="pojemnik">
			<form action="puste-opakowania.php" method="POST">
				<input type="hidden" name="pojemnik" id="m9" value="g1">
				<button class="button-pojemnik">G1</button></a>
			</form>
		</div>
		
	</div>
	
	<div id="puste-opakowania-w">
	
		<div class="pojemnik">
			<form action="puste-opakowania.php" method="POST">
				<input type="hidden" name="pojemnik" id="m9" value="g2">
				<button class="button-pojemnik">G2</button></a>
			</form>
		</div>

		<div class="pojemnik">
			<form action="puste-opakowania.php" method="POST">
				<input type="hidden" name="pojemnik" id="m9" value="g3">
				<button class="button-pojemnik">G3</button></a>
			</form>
		</div>
		
	</div>
	
	<div id="puste-opakowania-w">
	
		<div class="pojemnik">
			<form action="puste-opakowania.php" method="POST">
				<input type="hidden" name="pojemnik" id="m9" value="bl 1">
				<button class="button-pojemnik">BL 1</button></a>
			</form>
		</div>
		
		<div class="pojemnik">
			<form action="puste-opakowania.php" method="POST">
				<input type="hidden" name="pojemnik" id="m9" value="bl 2">
				<button class="button-pojemnik">BL 2</button></a>
			</form>
		</div>

	</div>
	
	<div id="puste-opakowania-w">
	
		<div class="pojemnik">
		<form action="puste-opakowania.php" method="POST">
				<input type="hidden" name="pojemnik" id="m9" value="azur+">
				<button class="button-pojemnik">AŻUR+</button></a>
			</form>
		</div>

	</div>
	</div>

	<div id="puste-opakowania-s">
	
	
	<?php 
		if(empty($_POST['pojemnik'])){
			
			
			
		}else{
			
			$pojemnik = $_POST['pojemnik'];

		echo '<table class="tabela-a">';
		echo '<tr>';

			echo '<td class="tabela-nazwy">POJEMNIK</td>';
			echo '<td class="tabela-nazwy">ILOŚC POJEMNIKÓW</td>';
			echo '<td class="tabela-nazwy">ILOŚC PODWOZI</td>';
			echo '<td class="tabela-nazwy">PRIORYTET</td>';
		
		echo '</tr>';
		echo '<tr>';

			echo '<td class="tabela-nn">
					<form action="puste-opakowania-core.php" method="POST">
						<input type="hidden" name="pojemnik-core" id="pojemnik" value="' . $pojemnik . '">' . strtoupper($pojemnik) . '</td>';
			echo '<td class="tabela-nn">
					<input class="puste-opakowania-input-number" type="number" name="m9-ilosc"></td>';
			echo '<td class="tabela-nn">
					<input class="puste-opakowania-input-number" type="number" name="m9-podwozia" value="1">
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
		}
	
?>
	</div>
	
	<div id="puste-opakowania-ss">
	
<?php 
	require('../database/db-connect.php');
		$b = "SELECT * FROM `opakowania` ORDER BY priorytet DESC";
		$zadanie = $db_PDO->query($b);
		$ile_znalezionych = $zadanie->rowCount();
	
	echo '<table class="tabela-b">';
		echo '<tr>';
			echo '<td class="tabela-nazwy">POJEMNIK</td>';
			echo '<td class="tabela-nazwy">ILOSC</td>';
			echo '<td class="tabela-nazwy">PODWOZIA</td>';
			echo '<td class="tabela-nazwy">PRIORYTET</td>';
		echo '</tr>';
for ($i=0; $i < $ile_znalezionych; $i++)
        {
				$wiersz = $zadanie->fetch();
				
				echo '<tr>';
				echo '<form action="opakowania-re.php" method="POST">
				
					<input type="hidden" name="input-h-id" value="' . $wiersz['id'] . '">';
					
				echo '<td class="tabela-nn">' . strtoupper($wiersz['nazwa_opakowania']) . '</td>';
				echo '<td class="tabela-nn">' . $wiersz['ilosc'] . '</td>';
				echo '<td class="tabela-nn">' . $wiersz['ilosc_podwozi'] . '</td>';
				echo '<td class="tabela-nnn">
				
					<button type="submit" name="zmien">' . strtoupper($wiersz['priorytet']) . '</button></td>';
				
				echo '<td class="tabela-nnnn"><div class="margin-l-f-10"></div> ';
				echo '<td class="tabela-nn-button">
				
					<button type="submit" name="usun" class="usun">REALIZUJ</button>
					<button type="submit" name="re" class="re">REALIZUJ CZĘŚCIOWO</button></td></form>';
					
				echo '</tr>';
		}
		
?>

</div>
	
</div>

</body>