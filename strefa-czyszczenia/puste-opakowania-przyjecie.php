<?php
		require_once('../session.php');
		require_once('../header.php');
		require_once('../logo.php');

		function ile_opak($x){
			
			require ('../database/db.php');
			$a = 'SELECT `ilosc` FROM `strefa_czyszczenia_ilosc-opakowan` WHERE `pojemnik`="' . $x . '"';
			$zadanie = $db_PDO->query($a);
			$wiersz = $zadanie->fetch();
			$ilosc = $wiersz['ilosc'];
			
			$b = 'SELECT `dzielnik` FROM `pojemniki` WHERE `pojemnik`="' . $x . '"';
			$zadanie = $db_PDO->query($b);
			$wiersz = $zadanie->fetch();
			$dzielnik = $wiersz['dzielnik'];
			
			$total = $ilosc / $dzielnik;
			
			$total_f = floor($total) * $dzielnik;
			$total_ff = $ilosc - $total_f;
			
			$total_d = $total_f + $total_ff;
			
			
			echo ''.$total_d."|".floor($total)."|".$total_ff.'';
			}
		if(isset($_SESSION['dodano'])) echo $_SESSION['dodano'] ; 
	unset($_SESSION['dodano']);
?>

<div id="puste-opakowania-o">

	<div id="myDIV">
		<div class="MainMenu">
			<a href="<?php echo URL;?>strefa-czyszczenia/strefa-czyszczenia-index.php">
				<button class="cofnij">BACK</button></a>
	<?php 
	
	if(isset($_SESSION['uprawnienia'])){
		$i = $_SESSION['uprawnienia'];
			
		if($i===1){
			echo '<a href="#" id="btn-eney"><button class="cofnij">DZIELNIK</button></a>';
		}
	
	}
	
	?>				
			
		</div>

			
	</div>

	<div id="eney"></div>


	<div id="puste-opakowania-przyciski">

		<div id="puste-opakowania-d">
			<div id="puste-opakowania-w">

				
							<div class="pojemnik">
											<button class="button-pojemnik" value="M9" id="a1" name="btn-poj">
											<div class="yellow-a"><?php echo ile_opak("M9");?></div>
											<div class="yellow-b">M9</div>
											</button>
											
							</div>


							<div class="pojemnik">
									<button class="button-pojemnik" value="M20" id="a2" name="btn-poj">
									<div class="yellow-a"><?php echo ile_opak("M20");?></div>
									<div class="yellow-b">M20</div></button></a>
							</div>

			</div>
				
			<div id="puste-opakowania-w">
				
							<div class="pojemnik">
									<button class="button-pojemnik" value="S1 EVO" id="a3" name="btn-poj">
									<div class="yellow-a"><?php echo ile_opak("S1 EVO");?></div>
									<div class="yellow-b">S1 EVO</div></button></a>
							</div>


							<div class="pojemnik">
									<button class="button-pojemnik" value="S1 TYWEK" id="a4" name="btn-poj">
									<div class="yellow-a"><?php echo ile_opak("S1 TYWEK");?></div>
									<div class="yellow-b">S1 TYWEK</div></button></a>
							</div>


			</div>
		</div>
		<div id="puste-opakowania-d">	
				<div id="puste-opakowania-w">
				
							<div class="pojemnik">
									<button class="button-pojemnik" value="S2" id="a5" name="btn-poj">
									<div class="yellow-a"><?php echo ile_opak("S2");?></div>
									<div class="yellow-b">S2</div></button>
							</div>

							<div class="pojemnik">

									<button class="button-pojemnik" value="S2+" id="a6" name="btn-poj">
									<div class="yellow-a"><?php echo ile_opak("S2+");?></div>
									<div class="yellow-b">S2+</div></button>

							</div>
				</div>
				
				<div id="puste-opakowania-w">
							<div class="pojemnik">
									<button class="button-pojemnik" value="S3" id="a7" name="btn-poj">
									<div class="yellow-a"><?php echo ile_opak("S3");?></div>
									<div class="yellow-b">S3</div></button>

							</div>
							<div class="pojemnik">
									<button class="button-pojemnik" value="S4" id="a8" name="btn-poj">
									<div class="yellow-a"><?php echo ile_opak("S4");?></div>
									<div class="yellow-b">S4</div></button>



							</div>
				</div>
		</div>
		<div id="puste-opakowania-d">	
				<div id="puste-opakowania-w">
				
							<div class="pojemnik">

									<button class="button-pojemnik" value="B1" id="a9" name="btn-poj">
									<div class="yellow-a"><?php echo ile_opak("B1");?></div>
									<div class="yellow-b">B1</div></button></a>

							</div>

							<div class="pojemnik">

									<button class="button-pojemnik" value="G1" id="a10" name="btn-poj">
									<div class="yellow-a"><?php echo ile_opak("G1");?></div>
									<div class="yellow-b">G1</div></button></a>

							</div>
					
				</div>
				
				<div id="puste-opakowania-w">
				
							<div class="pojemnik">

									<button class="button-pojemnik" value="G2" id="a11" name="btn-poj">
									<div class="yellow-a"><?php echo ile_opak("G2");?></div>
									<div class="yellow-b">G2</div></button></a>

							</div>

							<div class="pojemnik">

									<button class="button-pojemnik" value="G3" id="a12" name="btn-poj">
									<div class="yellow-a"><?php echo ile_opak("G3");?></div>
									<div class="yellow-b">G3</div></button></a>

							</div>
					
				</div>
		</div>
		<div id="puste-opakowania-d">		
				<div id="puste-opakowania-w">
				
						<div class="pojemnik">

								<button class="button-pojemnik" value="BL 1" id="a13" name="btn-poj">
								<div class="yellow-a"><?php echo ile_opak("BL 1");?></div>
								<div class="yellow-b">BL 1</div></button></a>

						</div>
						
						<div class="pojemnik">

									<button class="button-pojemnik" value="BL 2" id="a14" name="btn-poj">
									<div class="yellow-a"><?php echo ile_opak("BL 2");?></div>
									<div class="yellow-b">BL 2</div></button></a>
							
							</div>

						</div>
				
					<div id="puste-opakowania-w">
					
						<div class="pojemnik">

								<button class="button-pojemnik" value="AZUR+" id="a15" name="btn-poj">
								<div class="yellow-a"><?php echo ile_opak("AZUR+");?></div>
								<div class="yellow-b">AŻUR+</div></button></a>
						</div>

					</div>
			</div>
	</div>
























	<div id="puste-opakowania-s">

		<table class="tabela-e table table-dark">
							<thead>
							<tr>
								<th class="tabela-nazwy">POJEMNIK</td>
								<th class="tabela-nazwy">ILOSC POJEMNIKÓW
								
								</td>
								<th class="tabela-nazwy">ILOŚĆ PODWOZI</td>
								<th class="tabela-nazwy"></td>
							</tr>
							</thead>
							<tbody>
							<tr>
								<form action="puste-opakowania-core.php" method="POST">
								<td class="tabela-nn tabela-nn-n">
									<div id="c">Wybierz pojemnik</div>
									<input type="hidden" name="pojemnik" id="y">
								</td>
								
								<td class="tabela-nn">
									
									<button type="button" value="-" id="minus1">-</button>
										<input 
											class="puste-opakowania-input-number" 
											id="count1"
											type="number" 
											name="m9-ilosc"
											onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"
											min="0" 
											max="99"
											step="1"
											value="0">
									<button type="button" value="+" id="plus1">+</button>
									
								</td>
								
								<td class="tabela-nn">
										
										<button type="button" value="-" id="minus">-</button>
											<input
												class="puste-opakowania-input-number"
												id="count"
												type="number" 
												name="m9-podwozia"
												onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"
												min="0" 
												max="99"
												step="1"
												value="1">
										<button type="button" value="+" id="plus">+</button>
									
								</td>
								
						
								<td class="tabela-c">
									<button type="submit" class="dodaj" name="karaska">ADD
									</button>
								</td>
						
							
							</tr>
							
					</form>		
					</tbody>
					</table>
	</div>
</div>	
<div class="pck"></div>
<?php require_once('../footer.php');?>
<!--
<script src="js/buttons.js"></script>
-->

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/plus-minus.js"></script>
<script src="js/przyciski.js"></script>
<script>

</script>

