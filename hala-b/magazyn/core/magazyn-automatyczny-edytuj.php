<?php 
	require('../../../session.php');
	require('../../../header.php');
	require('../../../logo.php');
	
	
	


	if(isset($_POST['wysylka'])){
		
		$a = $_POST['kod'];
		require_once "../../../database/db.php";
		$b = 'SELECT
					*
				FROM
					`hala_b_magazyn_automatyczny_stan`
				WHERE
					`kod` = "'.$a.'"';
					
		$zadanie = $db_PDO->query($b);
		$wiersz = $zadanie->fetch();
		
		echo '<form action="magazyn-automatyczny-edytuj.php" method="POST">';
		echo '<input type="text" name="skod" value="'.$wiersz['kod'].'"><br>';
		echo '<input type="text" name="sname" value="'.$wiersz['nazwa'].'"><br>';
		echo '<input type="text" name="silosc" value="'.$wiersz['ilosc'].'"><br>';
		echo '<button type="submit" name="edito">Zapisz</button>';
		echo '</form>';
		
	}
	
	if(isset($_POST['edito'])){
		
		$a = $_POST['skod'];
		$b = $_POST['sname'];
		$c = $_POST['silosc'];
		
		
	}
?>