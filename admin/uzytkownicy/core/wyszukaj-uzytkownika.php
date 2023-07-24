<style>
	#white{
		background-color:white;
	}
</style>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
	
			
<?php

	if($_SERVER["REQUEST_METHOD"] === "POST"){
		require('../../../session.php');
		$a = 'SELECT * FROM `users`';
		$zadanie = $db_PDO->query($a);
		$ile = $zadanie->rowCount();
		
			

	
	echo '<div id="white">
	<table id="example" class="table table-light">';
	echo '<thead>';
		echo '<tr>';
			echo '<th class="tabela-nazwy">Nazwa</th>';
			echo '<th class="tabela-nazwy">Pkt</th>';
			echo '<th class="tabela-nazwy">Uprawnienia</th>';
			echo '<th class="tabela-nazwy">Logowania</th>';
			echo '<th class="tabela-nazwy"></th>';
			echo '<th class="tabela-nazwy"></th>';
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
		for ($i=0; $i < $ile; $i++)
			{
				$wiersz = $zadanie->fetch();
				
				echo '<tr>';
				echo '<form action="..." method="POST">
				
					<input type="hidden" name="input-h-id" value="' . $wiersz['id'] . '">';
					
				echo '<td class="tabela-nn">' . strtoupper($wiersz['user']) . '</td>';
				echo '<td class="tabela-nn">' . $wiersz['pkt'] . '</td>';
				echo '<td class="tabela-nn">' . $wiersz['uprawnienia'] . '</td>';
				echo '<td class="tabela-nn">' . $wiersz['logowania'] . '</td>';
				
				
				echo '<td class="tabela-nnnn"><div class="margin-l-f-10"></div>
						<td class="tabela-nn-button">
							<button class="btn btn-warning btn-sm">Edytuj</button>
							<button class="btn btn-danger btn-sm">Usuń</button>
								<form action="">
								  <label for="fruits">Opcje</label>
								  <select id="fruits" name="fruits">
									<option value="apple">Zwolnij</option>
									<option value="banana">Przyjmij</option>
									<option value="orange">Opinia</option>
									<option value="mango">Iteams</option>
								  </select>
								  <input type="submit" value="Zatwierdź">
								</form>';
				echo '</tr>';
			}
			echo '</tbody</table></div>';
		
}
?>
<script>
new DataTable('#example', {
    paging: true,
    scrollCollapse: true,
});
</script>	
