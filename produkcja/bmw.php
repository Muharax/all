<?php 
	error_reporting(E_ALL);
	define('URL', 'http://'.$_SERVER['SERVER_NAME']. "/al/");


		echo '<div class="box">';
			
		echo '<form action="produkcja-hala-a.php" method="POST">';
			echo '<button type="submit" class="obj" name="ilosc">SK 481 HIGH
				<img class="mico" src="'.URL.'img/logos/sk.png">
				<input type="hidden" value="sk 481 HIGH" name="ver">
				</button></form>';
			
		echo '<form action="produkcja-hala-a.php" method="POST">';
		
			echo '<button type="submit" class="obj" name="ilosc">SK 481 LOW
				<img class="mico" src="'.URL.'img/logos/sk.png">
				<input type="hidden" value="SK 481 LOW" name="ver">
				</button></form>';
				
		echo '<form action="produkcja-hala-a.php" method="POST">';
		
			echo '<button type="submit" class="obj" name="ilosc">SK 482 HIGH
				<img class="mico" src="'.URL.'img/logos/sk.png">
				<input type="hidden" value="SK 482 HIGH" name="ver">
				</button></form>';
				
		echo '<form action="produkcja-hala-a.php" method="POST">';
			echo '<button type="submit" class="obj" name="ilosc">SK 482 LOW
				<img class="mico" src="'.URL.'img/logos/sk.png">
				<input type="hidden" value="SK 482 LOW" name="ver">
				</button></form>';
			
		echo '</div>';
			
?>



