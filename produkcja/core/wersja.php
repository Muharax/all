<?php 

	
	require('../../session.php');
	require('../../header.php');
	require('../../logo.php');
	

	if(isset($_POST['sk'])){
		
		
		
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
			
	}
	
	if(isset($_POST['au'])){
		
		
		
		echo '<div class="box">';
			
		echo '<form action="produkcja-hala-a.php" method="POST">';
			echo '<button type="submit" class="obj" name="ilosc">AU 516 T1
				<img class="mico" src="../../../img/logos/audi.png">
				<input type="hidden" value="au 516 T1" name="ver">
				</button></form>';
			
		echo '<form action="produkcja-hala-a.php" method="POST">';
		
			echo '<button type="submit" class="obj" name="ilosc">AU 516 T2
				<img class="mico" src="../../../img/logos/audi.png">
				<input type="hidden" value="AU 516 T2" name="ver">
				</button></form>';
				
		echo '<form action="produkcja-hala-a.php" method="POST">';
		
			echo '<button type="submit" class="obj" name="ilosc">AU 517 T1
				<img class="mico" src="../../../img/logos/audi.png">
				<input type="hidden" value="AU 517 T1" name="ver">
				</button></form>';
				
		echo '<form action="produkcja-hala-a.php" method="POST">';
			echo '<button type="submit" class="obj" name="ilosc">AU 517 T2
				<img class="mico" src="../../../img/logos/audi.png">
				<input type="hidden" value="AU 516 T2" name="ver">
				</button></form>';
			
		echo '</div>';
			
	}
	
	

	
	if(isset($_POST['ilosc'])){
		
		echo '<form action="produkcja-hala-a.php" method="POST">';
		
		
		$a = $_POST['ver'];
		$b = substr ($a,0,2);
		$c = strtolower($b);
		
		echo '<div class="yellow">';
		echo '<button type="submit" name="'.$c.'">'.strtoupper($a).'</button>';
		echo '<br>ILOSC:<br><br>';
		echo 'DX: <input min="0" name="number-dx" type="number">';
		echo 'SX: <input min="0" name="number-sx" type="number">';
		echo '<input type="hidden" name="ver" value="'.$a.'">';
		
	
		
		echo '<br><br><button type="submit" name="save">NEXT</button>';
		echo '</div>';
	}
	
	if(isset($_POST['save'])){
		
		$a = $_POST['ver'];
		$number_dx = $_POST['number-dx'];
		$number_sx = $_POST['number-sx'];
		
		$b = substr ($a,0,2);
		$c = strtolower($b);
		
		echo '<form action="produkcja-hala-a.php" method="POST">';
		
		echo '<button type="submit" name="ilosc">ZMIEŃ ILOŚĆ</button>';
		echo '<button type="submit" name="'.$c.'">ZMIEŃ VERSJE</button>';
		echo '<button type="submit" name="cofnij">WYJDŹ</button>';
		
		echo '<input type="hidden" name="ver" value="'.$a.'">';
		echo '<input type="hidden" name="number-dx" value="'.$number_dx.'">';
		echo '<input type="hidden" name="number-sx" value="'.$number_sx.'">';
		
		
		echo '<br>';
		echo '<div class="yellow">';
		echo 'NAZWA: ' . strtoupper($a);
		echo '<br>';
		echo 'LEWA: ' . $number_dx;
		echo '<br>';
		echo 'PRAWA: ' . $number_sx;
		echo '<br></div>';
		
		echo '<br><br><button type="submit" name="zapisz">ZAPISZ</button>';
		echo '</div>';
	}
	

	if(isset($_POST['cofnij'])){
		
		header('Location: ../rozpocznij.php');
		exit(0);
		
	}
	
	if(isset($_POST['zapisz'])){
		
		
		$a = strtoupper ($_POST['ver']);
		$number_dx = $_POST['number-dx'];
		$number_sx = $_POST['number-sx'];
		$data_start = date("Y-m-d G:i:s");
		
		echo '<div class="yellow">';
		echo strtoupper($a);
		echo '<br>';
		echo 'DX: ' . $number_dx;
		echo '<br>';
		echo 'SX: ' . $number_sx;
		echo '<br>';
		echo '</div>';
		
		require_once('../../../database/db-connect.php');
		
		$T = "INSERT INTO `hala_a_aktywne_produkcje`(
							`nazwa`, 
							`sx`,
							`dx`,
							`linia`,
							`data_start`)
						 VALUES ('$a',
							 '$number_sx',
							 '$number_dx',
							 '$a',
							 '$data_start')";
		$zadanie = $db_PDO->query($T);
		
		
		
		echo '<font color="green"><strong>ZAPISANO</strong></font><br>';
		echo '<a href="../rozpocznij.php"><button>Rozpocznij kolejną</button></a><Br>';
		echo '<a href="../../../index.php"><button>Menu Głowne</button></a><br>';
		
		
	}




		
		unset($_SESSION['dodano1']);
		
	exit(0);
?>



