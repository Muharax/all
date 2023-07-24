<?php 

require ('../../session.php');

if(empty($_POST['z1'])){
	require('../../database/db-connect.php');
	$query = 'SELECT * FROM `users`';
	$zadanie= $db_PDO->prepare($query);
	$zadanie->execute();
}else{
	require('../../database/db-connect.php');
	$zz = $_POST['z1'];
	$query = 'SELECT * FROM `users` WHERE `user` LIKE :search';
	$zadanie= $db_PDO->prepare($query);
	$zadanie->execute(array(':search' => '%'.$zz.'%'));
}
?>
<table class="tabela-wyszukaj-uzytkownika table table-dark">
<thead>
<tr>
	<th>ID</th>
	<th>NAZWA</th>
	<th>HASŁO</th>
	<th>PKT</th>
	<th>UPRAWNIENIA</th>
	<th>LOGOWANIA</th>
	<th>Data Rejestracji</th>
	<th></th>
	<th></th>
</tr>
<tbody>
<?php
$ile = $zadanie->rowCount();
if($ile > 0){
	for ($i=0; $i < $ile; $i++){
			$wiersz = $zadanie->fetch();
			$id = $wiersz['id'];
			if($id === 25 || $id === 22 || $id === 18 || $id === 83){
				
				echo '<tr>';			
				echo '<td class="tabela-nn">' . $wiersz['id'] . '</td>';
				echo '<td class="tabela-nn">' . $wiersz['user'] . '</td>';
				echo '<td class="tabela-nn"><button id="user-reset-pass" value="'.$wiersz['id'].'" data-value="'.$wiersz['user'].'">RESET</button></td>';
				echo '<td class="tabela-nn">' . $wiersz['pkt'] . '</td>';
				echo '<td class="tabela-nn">' . $wiersz['uprawnienia'] . '</td>';
				echo '<td class="tabela-nn">' . $wiersz['logowania'] . '</td>';
				echo '<td class="tabela-nn">' . $wiersz['data_rejestracji'] . '</td>';
				
				echo '<td class="tabela-nnnn"><div class="margin-l-f-10"></div></td>';
				echo '<td class="tabela-nn-button"><button id="user-delete" value="'.$wiersz['id'].'" data-value="'.$wiersz['user'].'" disabled>USUŃ</button></td>';
				echo '</tr>';
				
		}else{
					echo '<tr>';			
					echo '<td class="tabela-nn">' . $wiersz['id'] . '</td>';
					echo '<td class="tabela-nn">' . $wiersz['user'] . '</td>';
					echo '<td class="tabela-nn"><button id="user-reset-pass" value="'.$wiersz['id'].'" data-value="'.$wiersz['user'].'">RESET</button></td>';
					echo '<td class="tabela-nn">' . $wiersz['pkt'] . '</td>';
					echo '<td class="tabela-nn">' . $wiersz['uprawnienia'] . '</td>';
					echo '<td class="tabela-nn">' . $wiersz['logowania'] . '</td>';
					echo '<td class="tabela-nn">' . $wiersz['data_rejestracji'] . '</td>';
					
					echo '<td class="tabela-nnnn"><div class="margin-l-f-10"></div></td>';
					echo '<td class="tabela-nn-button"><button id="user-delete" value="'.$wiersz['id'].'" data-value="'.$wiersz['user'].'">USUŃ</button></td>';
					echo '</tr>';
		}
}
}else{
	echo '<font color="white">BRAK WYNIKÓW '.$ile.'</font>';
}
	
?>
</tbody>
</table>

<script>
// ====================================================================================================
// ====================================================================================================
// ====================================================================================================
$(document).off('click', '#user-reset-pass').on("click", '#user-reset-pass', function() {
	var t1 = $(this).val();
	var name = $(this).attr("data-value");
	console.log(t1);
	
	$.confirm({
		escapeKey: 'cancelAction',
		title: '<div class="error-info-red br">RESTART HASŁA</div>',
		content: 'HASŁO ZOSTANIE ZRESTARTOWANE <div class="error2">UŻYTKOWNIK: '+name+'</div>',
		buttons: {
			confirm: {
				btnClass: 'btn-red',
				text: '<font color="black">RESET</font>',
				action: function(){
					
				
				
		$.ajax({
		url: "uzytkownicy/reset-hasla-uzytkownika-core.php",
		type: "POST",
		data: {"z1":t1},
		dataType:'text',
		success: function(msg) {
			$.alert(msg);		
		}
});	}},
			cancelAction: {
				btnClass: 'btn-green',
				text: 'ANULUJ',
			},
			
		}
	});
});


// ====================================================================================================
// ====================================================================================================
// ====================================================================================================
$(document).off('click', '#user-delete').on("click", '#user-delete', function() {
	var t1 = $(this).val();
	var name = $(this).attr("data-value");
	
	$.confirm({
		escapeKey: 'cancelAction',
		title: '<div class="error-info-red br">USUWANIE UŻYTKOWNIKA</div>',
		content: 'UŻYTKOWNIK ZOSTANIE USUNIĘTY BEZPOWROTNIE <div class="error2">UŻYTKOWNIK: '+name+'</div>',
		buttons: {
			confirm: {
				btnClass: 'btn-red',
				text: '<font color="black">USUŃ UŻYTKOWNIKA</font>',
				action: function(){

					$.ajax({
						url: "uzytkownicy/usun-uzytkownika-core.php",
						type: "POST",
						data: {"z1":t1},
						dataType:'text',
						success: function(msg) {
							$.alert(msg);
							$(".market-dane").load('edytuj-uzytkownika.php');		
						}
					});
					
				}
			},
			cancelAction: {
				btnClass: 'btn-green',
				text: 'ANULUJ',
			}
		}
	});
});
</script>