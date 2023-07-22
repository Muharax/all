<?php
		require_once('../session.php');
		require_once('../header.php');
		require_once('../logo.php');
		
		// function sql ($X){
			// require ('../database/db.php');
			// $Z = $db_PDO->query($X);
			// $result = $Z->rowCount();
			// return $result;
		// }
		// $X = 'SELECT * FROM `users`';
		// echo sql($X);
		
		
		
		
	
		function ile_opak($x){
			
			require ('../database/db.php');
			
			$a = 'SELECT `ilosc` FROM `strefa_czyszczenia_ilosc-opakowan` WHERE `pojemnik`="' . $x . '"';
			$zadanie_a = $db_PDO->query($a);
			$wiersz_a = $zadanie_a->fetch();
			$ilosc = $wiersz_a['ilosc'];
			
			$b = 'SELECT `dzielnik` FROM `pojemniki` WHERE `pojemnik`="' . $x . '"';
			$zadanie_b = $db_PDO->query($b);
			$wiersz_b = $zadanie_b->fetch();
			$dzielnik = $wiersz_b['dzielnik'];
			
			$total = $ilosc / $dzielnik;
			$total_ff = $ilosc % $dzielnik;
			$total_f = floor($total) * $dzielnik + $total_ff;
			
			
			
			echo ''.$total_f."|".floor($total)."|".$total_ff.'';
			}
			
			
			
	if(isset($_SESSION['dodano']))
	{
		echo $_SESSION['dodano'];
		// echo '<script>$( ".AAA" ).find( text('.$_SESSION['EA'].') ).css( "color", "red" );</script>';
		// echo '<script>$( "div:contains('.$_SESSION['EA'].')" ).css( "color", "red" );</script>';
	}
	unset($_SESSION['dodano']);
?>

	<div id="puste-opakowania">

		<div id="myDIV">
			<div class="MainMenu">
				<a href="<?php echo URL;?>strefa-czyszczenia/strefa-czyszczenia-index.php">
				<button class="cofnij">BACK</button></a>
			</div>

		</div>
			
			

		<div id="puste-opakowania-przyciski">

			<div id="puste-opakowania-d">
				<div id="puste-opakowania-w">
					<div class="pojemnik">
						<button class="button-pojemnik" value="M9" id="a1">
							<div class="yellow-a"><?php echo ile_opak("M9");?></div>
							<div class="yellow-b">M9</div>
						</button>
					</div>


					<div class="pojemnik">
							<button class="button-pojemnik" value="M20" id="a2">
							<div class="yellow-a"><?php echo ile_opak("M20");?></div>
							<div class="yellow-b">M20</div></button></a>
					</div>
				</div>
					
				<div id="puste-opakowania-w">
					
					<div class="pojemnik">
							<button class="button-pojemnik" value="S1 EVO" id="a3">
							<div class="yellow-a"><?php echo ile_opak("S1 EVO");?></div>
							<div class="yellow-b">S1 EVO</div></button></a>
					</div>


					<div class="pojemnik">
							<button class="button-pojemnik" value="S1 TYWEK" id="a4">
							<div class="yellow-a"><?php echo ile_opak("S1 TYWEK");?></div>
							<div class="yellow-b">S1 TYWEK</div></button></a>
					</div>
				</div>
			</div>
			<div id="puste-opakowania-d">	
					<div id="puste-opakowania-w">
					
					<div class="pojemnik">
							<button class="button-pojemnik" value="S2" id="a5">
							<div class="yellow-a"><?php echo ile_opak("S2");?></div>
							<div class="yellow-b">S2</div></button>
					</div>

					<div class="pojemnik">

							<button class="button-pojemnik" value="S2+" id="a6">
							<div class="yellow-a"><?php echo ile_opak("S2+");?></div>
							<div class="yellow-b">S2+</div></button>

					</div>
					</div>
					
					<div id="puste-opakowania-w">
								<div class="pojemnik">
										<button class="button-pojemnik" value="S3" id="a7">
										<div class="yellow-a"><?php echo ile_opak("S3");?></div>
										<div class="yellow-b">S3</div></button>

								</div>
								<div class="pojemnik">
										<button class="button-pojemnik" value="S4" id="a8">
										<div class="yellow-a"><?php echo ile_opak("S4");?></div>
										<div class="yellow-b">S4</div></button>



								</div>
					</div>
			</div>
			<div id="puste-opakowania-d">	
					<div id="puste-opakowania-w">
					
								<div class="pojemnik">
									<button class="button-pojemnik" value="B1" id="a9">
									<div class="yellow-a"><?php echo ile_opak("B1");?></div>
									<div class="yellow-b">B1</div></button></a>

								</div>

								<div class="pojemnik">

										<button class="button-pojemnik" value="G1" id="a10">
										<div class="yellow-a"><?php echo ile_opak("G1");?></div>
										<div class="yellow-b">G1</div></button></a>

								</div>
						
					</div>
					
					<div id="puste-opakowania-w">
					
								<div class="pojemnik">

										<button class="button-pojemnik" value="G2" id="a11">
										<div class="yellow-a"><?php echo ile_opak("G2");?></div>
										<div class="yellow-b">G2</div></button></a>

								</div>

								<div class="pojemnik">

										<button class="button-pojemnik" value="G3" id="a12">
										<div class="yellow-a"><?php echo ile_opak("G3");?></div>
										<div class="yellow-b">G3</div></button></a>

								</div>
						
					</div>
			</div>
			<div id="puste-opakowania-d">		
				<div id="puste-opakowania-w">
				
					<div class="pojemnik">

						<button class="button-pojemnik" value="BL 1" id="a13">
						<div class="yellow-a"><?php echo ile_opak("BL 1");?></div>
						<div class="yellow-b">BL 1</div></button></a>

					</div>
						
					<div class="pojemnik">

							<button class="button-pojemnik" value="BL 2" id="a14">
							<div class="yellow-a"><?php echo ile_opak("BL 2");?></div>
							<div class="yellow-b">BL 2</div></button></a>
							
					</div>

				</div>
				
				<div id="puste-opakowania-w">
					
					<div class="pojemnik">
						<button class="button-pojemnik" value="AZUR+" id="a15">
						<div class="yellow-a"><?php echo ile_opak("AZUR+");?></div>
						<div class="yellow-b">AŻUR+</div></button></a>
				</div>

				</div>
			</div>
		</div>
		
		<div id="puste-opakowania-s">
			
			<table class="tabela-a table table-dark">
				<thead>
				<tr>

					<td class="tabela-nazwy">POJEMNIK</td>
					<td class="tabela-nazwy">ILOŚĆ POJEMNIKÓW</td>
					<td class="tabela-nazwy">ILOŚĆ PODWOZI</td>
					<td class="tabela-nazwy">PRIORYTET</td>
					<td class="tabela-nazwy"></td>
				
				</tr>
				</thead>
				<tbody>
				<tr>

					<td class="tabela-nn">
						<form action="puste-opakowania-core.php" method="POST">
							<div id="c">Wybierz pojemnik</div>
							<input type="hidden" name="pojemnik-core" id="y">
					</td>
					
					<td class="tabela-nn">
						<div class="flex">
							<input type="button" value="-" id="minus1">
								<input 
									class="puste-opakowania-input-number" 
									id="count1"
									type="number" 
									name="m9-ilosc"
									onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"
									min="0" 
									max="1000"
									step="1"
									value="0">
							<input type="button" value="+" id="plus1">
							</div>
					</td>
					
					<td class="tabela-nn">
					<div class="flex">
						<input type="button" value="-" id="minus">
							
							<input
								class="puste-opakowania-input-number"
								id="count"
								type="number" 
								name="m9-podwozia"
								onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"
								min="0" 
								max="1000"
								step="1"
								value="1">
						<input type="button" value="+" id="plus">
						</div>
					</td>
					
					<td class="tabela-nn padding-left65">
					<div class="abcde">
							<label class="label-normalny">
								<input name="priorytet" type="radio" value="normalny"> NORMALNY
							</label>
							<label class="label-wysoki">
								<input name="priorytet" type="radio" value="wysoki"> WYSOKI
							</label>
						</div>
					
					</td>
					</div>
					
					<td class="tabela-c">
						<button class="dodaj" name="animas">ADD</button>
					</td>
					
								
				</tr>
				</form>
				</body>
			</table>
					

		</div>
</div>
		<div id="puste-opakowania-ss">
				
		<?php

				require('../database/db-connect.php');
				require('../core/funkcje.php');
					$b = "SELECT * FROM `opakowania` ORDER BY priorytet DESC";
					$zadanie = $db_PDO->query($b);
					$ile_znalezionych = $zadanie->rowCount();
				
				echo '<table class="tabela-a table table-dark">
						<thead>
						<tr>
							<td class="tabela-nazwy">POJEMNIK</td>
							<td class="tabela-nazwy">ILOSC</td>
							<td class="tabela-nazwy">PODWOZIA</td>
							<td class="tabela-nazwy">PRIORYTET</td>
							<td class="tabela-nazwy"></td>
							<td class="tabela-nazwy"></td>
						</thead>	
						</tr>
						<tbody>';
					
			for ($i=0; $i < $ile_znalezionych; $i++){
				
	$wiersz = $zadanie->fetch();
	$a = (podwozia($wiersz['nazwa_opakowania'], $wiersz['ilosc'])) + $wiersz['ilosc_podwozi'];
	$_SESSION['ile1'] = $wiersz['ilosc'];
	$_SESSION['ile2'] = $wiersz['ilosc_podwozi'];
	$_SESSION['pojemnik'] = $wiersz['nazwa_opakowania'];
							
							
	echo '<tr>
	<form action="opakowania-re.php" method="POST">
	
		<input type="hidden" name="input-h-id" value="' . $wiersz['id'] . '">
		
	<td class="tabela-nn AAA"><div>' . strtoupper($wiersz['nazwa_opakowania']) . '</div></td>
	<td class="tabela-nn">' . podwozia_r($wiersz['nazwa_opakowania'], $wiersz['ilosc']) . '</td>
	<td class="tabela-nn">' . $a . '</td>
	<td class="tabela-nnn">
	
		<button type="submit" name="zmien" class="zmien">' . strtoupper($wiersz['priorytet']) . '</button></td>
	
	<td class="tabela-nnnn"><div class="margin-l-f-10"></div>
	<td class="tabela-nn-button">
	
		<button 
			type="submit" 
			name="usun" 
			class="usun"
			>USUŃ</button>
		<button type="submit" name="re" class="re">EDYTUJ</button></td></form>
		
	</tr>';
					}
					echo '</tbody>
						</table>';
		?>

		</div>	
	
<?php require_once('../footer.php');?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="js/plus-minus.js"></script>
<script src="js/przyciski.js"></script>