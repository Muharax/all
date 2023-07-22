<?php 
		require('../../session.php');
		require('../../header.php');
		require('../../logo.php');


	if(isset($_POST['wyslij'])){
		
		echo '<form action="..." method="POST">';
		echo 'DO KOGO';
		echo '<input type="text" name="do-kogo"><br>';
		echo 'TEMAT';
		echo '<input type="text" name="temat"><br>';
		echo 'TREŚĆ';
		echo '<textarea name="tresc"></textarea>';
		
		echo '<button type="submit" name="wyslano">Wyślij</button>';
		
		echo '</form>';
		
		// header('Location: ../panel.php?link=wiadomosci');
		// exit();
	}
	
	if(isset($_POST['odbierz'])){
		
		header('Location: ../panel.php?link=wiadomosci');
		exit();
	}
	
	
	if(isset($_POST['wyslano'])){
		
		$a = $_POST['do-kogo'];
		$b = $_POST['temat'];
		$c = $_POST['tresc'];
	}
		

?>