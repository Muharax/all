<?php

				require('../../database/db-connect.php');
				require('../../core/funkcje.php');
					$b = "SELECT * FROM `opakowania` ORDER BY priorytet DESC";
					$zadanie = $db_PDO->query($b);
					$ile_znalezionych = $zadanie->rowCount();
				
				echo '<table class="tabela-a">
						<thead>
						<tr>
							<td class="tabela-nazwy">POJEMNIK</td>
							<td class="tabela-nazwy">ILOSC</td>
							<td class="tabela-nazwy">PODWOZIA</td>
							<td class="tabela-nazwy">PRIORYTET</td>
						</thead>	
						</tr>
						<tbody>';
					
			for ($i=0; $i < $ile_znalezionych; $i++)
					{
							$wiersz = $zadanie->fetch();
							$a = (podwozia($wiersz['nazwa_opakowania'], $wiersz['ilosc'])) + $wiersz['ilosc_podwozi'];
							$_SESSION['ile1'] = $wiersz['ilosc'];
							$_SESSION['ile2'] = $wiersz['ilosc_podwozi'];
							$_SESSION['pojemnik'] = $wiersz['nazwa_opakowania'];
							
							
							echo '<tr>
							<form action="../opakowania-re.php" method="POST">
							
								<input type="hidden" name="input-h-id" value="' . $wiersz['id'] . '">
								
							<td class="tabela-nn">' . strtoupper($wiersz['nazwa_opakowania']) . '</td>
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