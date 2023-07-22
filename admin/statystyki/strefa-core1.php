<style>
.statystyki-core-y{
	padding:10px;
	background-color:#212529;
	border-radius:20px;
	color: white;
}
</style>
<div class="statystyki-core-y">
<h3>Limit wyświetleń 10</h3>

<?php 
	
		require('../../database/db-connect.php');
		$lim = 10;
		$a = "SELECT * FROM `opakowania-zrealizowne` ORDER BY `czas_realizacji` DESC LIMIT $lim";
		$zadanie = $db_PDO->query($a);
		$ile_znalezionych = $zadanie->rowCount();
	
	echo '<table class="tabela-bbb">';
	echo '<thead>';
		echo '<tr>';
			echo '<th>POJEMNIK</th>';
			echo '<th>ILOSC</th>';
			echo '<th>PODWOZIA</th>';
			echo '<th>PRIORYTET</th>';
			echo '<th>SR</th>';
			echo '<th>SF</th>';
			echo '<th>CZAS REALIZACJI</th>';
			echo '<th>ID PRAC.</th>';
		echo '</tr>';
	echo '</thead>';
	echo '<tbody>';
for ($i=0; $i < $ile_znalezionych; $i++)
        {
				$wiersz = $zadanie->fetch();
				$datetime1 = new DateTime($wiersz['czas_realizacji']);
				$datetime2 = new DateTime($wiersz['czas']);
				$czas = $datetime1->diff($datetime2);
				$interval = $czas->format('%D D %Hh %Im');
				
				echo '<tr>';
				echo '<form action="opakowania-re.php" method="POST">
				
					<input type="hidden" name="input-h-id" value="' . $wiersz['id'] . '">';
					
				echo '<td>' . strtoupper($wiersz['nazwa_opakowania']) . '</td>';
				echo '<td>' . $wiersz['ilosc'] . '</td>';
				echo '<td>' . $wiersz['ilosc_podwozi'] . '</td>';
				echo '<td>' . $wiersz['priorytet'] . '</td>';
				echo '<td>' . $wiersz['czas'] . '</td>';
				echo '<td>' . $wiersz['czas_realizacji'] . '</td>';
				echo '<td>' . $interval . '</td>';
				echo '<td>' . $wiersz['pracownik'] . '</td>';
				echo '<td><button>POCHWAL</button><button>DODAJ PKT</button></td>';
				
				
					
				echo '</tr>';
		}
		echo '<tbody>';
		echo '<table>';		
?>

</div>


