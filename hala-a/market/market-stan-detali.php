<?php 

error_reporting(E_ALL);

//------------------------------------- FUNKCJA SUMA ILOSC --------------------------------------------------\\
	function is_suma($i_wersja){
	
	require ('../../database/db.php');
    $a = 'SELECT SUM(ilosc) as TOTAL FROM market_stan_detali WHERE `wersja`="' . $i_wersja . '"';
	$zadanie = $db_PDO->query($a);
	$wiersz = $zadanie->fetch(PDO::FETCH_NUM);
	$total = $wiersz[0];
	echo $total;
	}
	
//------------------------------------ FUNKCJA SUMA MAX -------------------------------------------------\\
	function is_max($max_wersja){
	
	require ('../../database/db.php');
    $a = 'SELECT SUM(max) as TOTAL FROM market_stan_detali WHERE `wersja`="' . $max_wersja . '"';
	$zadanie = $db_PDO->query($a);
	$wiersz = $zadanie->fetch(PDO::FETCH_NUM);
	$total = $wiersz[0];
	echo $total;
	}
//----------------------------------------------------------------------------------------------------------\\

	$S1 = "OP-481-HIGH";
	// is_suma($SK_481_HIGH_EU);
	// is_max($SK_481_HIGH_EU);
	$S2 = "OP-482-HIGH";
	// is_suma($S2);
	// is_max($S2);
	$S3 = "OP-481-LOW";
	// is_suma($S2);
	// is_max($S2);
	$S4 = "OP-482-LOW";
	$S5 = "DS-34-T1";
	$S6 = "DS-34-T2";
//----------------------------------------------------------------------------------------------------------\\



//----------------------------------------------------------------------------------------------------------\\
?>


<div id="market-stan-detali">
	<div class="stan-detali-w">
		<table>
			<tr>
								<td>
									<div class="stan-detali-z">
										
										<form action="stan-detali/stan.php" method="POST">
											<input type="hidden" name="etc" id="m9" value="<?php echo $S1;?>">
											<button type="button" class="button-pojemnik" value="<?php echo $S1;?>">SK 481 HIGH
												<progress class="progress-stan-detali" 
													  value="<?php is_suma($S1);?>" 
													  max="<?php is_max($S1);?>">
												</progress>
											</button></form>
											
										
									</div>
								</td>
								
								
								<td>
									<div class="stan-detali-z">
										
										<form action="stan-detali/stan.php" method="POST">
											<input type="hidden" name="etc" id="m9" value="<?php echo $S2;?>">
											<button type="button" class="button-pojemnik" value="<?php echo $S2;?>">SK 482 HIGH
													<progress class="progress-stan-detali" 
													  id="file" 
													  value="<?php is_suma($S2);?>" 
													  max="<?php is_max($S2);?>">
													</progress>
											</button></form>
											
										
									</div>
								</td>
							
								<td>
									<div class="stan-detali-z">
										
										<form action="stan-detali/stan.php" method="POST">
											<input type="hidden" name="etc" id="m9" value="<?php echo $S3;?>">
											<button type="button" class="button-pojemnik" value="<?php echo $S3;?>">SK 481 LOW
													<progress 
																class="progress-stan-detali" 
																id="file" 
																value="<?php is_suma($S3);?>" 
																max="<?php is_max($S3);?>">
													</progress>
											</button></form>
											
									</div>
								</td>
							
								
								<td>
									<div class="stan-detali-z">
										
										<form action="stan-detali/stan.php" method="POST">
											<input type="hidden" name="etc" id="m9" value="<?php echo $S4;?>">
											<button type="button" class="button-pojemnik" value="<?php echo $S4;?>">SK 482 LOW
													<progress 
																class="progress-stan-detali" 
																id="file" 
																value="<?php is_suma($S4);?>" 
																max="<?php is_max($S4);?>">
													</progress>
											</button></form>
											
									</div>
								</td>
								
			</tr>
		</table>
</div>

	
</div>

