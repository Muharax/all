<?php
		ob_start();
		require_once('../session.php');
		require_once('../header.php');
		require_once('../logo.php');
		
	if(isset($_SESSION['dodano'])) echo $_SESSION['dodano'] ; 
	unset($_SESSION['dodano']);
	
?>

		
<div id="puste-opakowania">

	<div class="MainMenu pabs">
		<a href="<?php echo URL;?>admin/panel.php">
		<button class="cofnij">BACK</button></a>
	</div>
	

		


<?php 
					require('../database/db-connect.php');
					$a = "SELECT * FROM `pojemniki`";
					$zadanie = $db_PDO->query($a);
					$ile_znalezionych = $zadanie->rowCount();
				
				echo '<table class="tabela-z">';
				echo '<thead>';
					echo '<tr>';
						echo '<th class="tabela-p">POJEMNIK</td>';
						echo '<th class="tabela-p"><div 
													id="info" 
													onmouseover="showTip(event)" onmouseout="hideTip(event)">DZIELNIK</div></td>';
				echo '</thead>';	
				echo '</tr>';
				echo '<tbody>';
					
			for ($i=0; $i < $ile_znalezionych; $i++)
					{
							$wiersz = $zadanie->fetch();
							echo '<form action="core/dzielnik-edytuj-core.php" method="POST">';		
							echo '<tr>';
							echo '<td class="tabela-hh">' . strtoupper($wiersz['pojemnik']) . '</td>';
							echo '<td class="tabela-hh"><input 
											type="number"
											name="new_nr"
											class="long"
											min="0" 
											max="1000"
											step="1"
											value="' . $wiersz['dzielnik'] . '"</td>';
							echo 	'<td class="tabela-nn-button">
							<input type="hidden" name="input-h-id" value="' . $wiersz['id'] . '">
							<input type="hidden" name="input-h-dz" value="' . $wiersz['dzielnik'] . '">
							<input type="hidden" name="input-h-pj" value="' . $wiersz['pojemnik'] . '">
							
							<button type="submit" name="dz-edit" class="ree">EDYTUJ</button></td>';
							
							echo '</tr></form>';
							
					}
				
					echo '</tbody>';
					echo '</table>';

?>

	
</div>
<div id="info1">DZIELNIK - to ilośc pojemników które mieszczą się na podwoziu transportowym<div>

<script type="text/javascript">
            function showTip(oEvent) {
                var oDiv = document.getElementById("info1");
                oDiv.style.visibility = "visible";
                oDiv.style.left = oEvent.clientX + 5;
                oDiv.style.top = oEvent.clientY + 5;
            }

            function hideTip(oEvent) {
                var oDiv = document.getElementById("info1");
                oDiv.style.visibility = "hidden";
            }
</script>

 



<?php ob_end_flush();?>