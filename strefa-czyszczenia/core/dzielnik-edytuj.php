<div id="puste-opakowania">

<?php 
					require('../../database/db-connect.php');
					$a = "SELECT * FROM `pojemniki`";
					$zadanie = $db_PDO->query($a);
					$ile_znalezionych = $zadanie->rowCount();
				
				echo '<table class="tabela-z">';
				echo '<thead class="y">';
					echo '<tr>';
						echo '<th class="tabela-p">POJEMNIK</td>';
						echo '<th class="tabela-p"><div id="info">DZIELNIK</div></td>';
						echo '<th class="tabela-p"><button type="button" id="uis" class="btn-close btn-close-white btn-sm" aria-label="Close"></button></td>';
				echo '</thead>';	
				echo '</tr>';
				echo '<tbody>';
					
			for ($i=0; $i < $ile_znalezionych; $i++)
					{
					$wiersz = $zadanie->fetch();	
					echo '<tr>';
					echo '<td class="tabela-hh y">' . strtoupper($wiersz['pojemnik']) . '</td>';
					echo '<div id="ghj"><td class="tabela-hh y"><input 
									id="uyu'.$i.'"
									type="number"
									name="new_nr"
									class="long"
									min="0" 
									max="1000"
									step="1"
									value="'.$wiersz['dzielnik'].'"
									</div></td>
						<td class="tabela-nn-button y">
					
						<button 
							type="submit" 
							id="mym'.$i.'"
							name="dz-edit" 
							class="btn btn-info btn-sm" 
							title="EDYTUJ"
							value="'.$wiersz['pojemnik'].'">E
						</button>
					</td>
					
					</tr>';
							
					}
				
					echo '</tbody>';
					echo '</table>';

?>

	
</div>
