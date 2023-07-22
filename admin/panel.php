<?php 
	require('../session.php');
	require('../header.php');
	require('../logo.php');
	require('../init.php');
	
	
	function nowe_wiadomosci(){
		require('../database/db-connect.php');
		$query = 'SELECT `id` FROM `users` WHERE `id`=:ss';
		$zadanie= $db_PDO->prepare($query);
		$zadanie->execute(array(':ss' => $_SESSION['id']));
		
		$query1 = 'SELECT `id` FROM `wiadomosci` WHERE `msg_odbiorca` =:UU AND `msg_przeczytane`=:YY';
		$zadanie1= $db_PDO->prepare($query1);
		$zadanie1->execute(array(':UU' => $_SESSION['id'], ':YY' => 1));
		$ile = $zadanie1->rowCount();
		
		if($ile > 0){
			return $ile;
		}else{
			return;
		}
		
	}
	$i = $_SESSION['uprawnienia'];
	if($i === 1){
		echo '<div id="menu-glowne">

		<a href="#" id="stat"><div class="ss">Statystyki</div></a>
		<div id="statys" style="display: block;">
				<button class="ssc" id="Stat-Czyszczenie1">CZ-1</button>
				<button class="ssc" id="Stat-Strefa1">ST-1</button>
				<button class="ssc" id="Stat-Strefa2">ST-2</button>
				<button class="ssc" id="Stat-Strefa3">ST-3</button>
				<button class="ssc" id="Stat-Market1">MT-1</button>
				<button class="ssc" id="Stat-Market2">MT-2</button>
				<button class="ssc" id="Stat-Strefa4">Graph</button>				
			</div>
		<a href="#" id="uzytkownicy"><div class="ss">Użytkownicy</div></a>
		
			<div id="uzyt" style="display: block;">
				<button class="ssc" id="dodaj-uzytkownika">Dodaj</button>
				<button class="ssc" id="edytuj-uzytkownika">Edytuj</button>				
						
			</div>
				
			<a href="#" id="wiadomosci-1"><div class="ss">Wiadomośći</div></a>
		
			<div id="wiadomosci-2" style="display: block;">
<button class="ssc" class="odebrane" id="wiadomosci-odbierz">Odbierz<div class="XXX">'.nowe_wiadomosci().'</div></button>
<button class="ssc" id="wiadomosci-wyslij">Wyślij</button>
<button class="ssc" id="wiadomosci-kosz">Kosz</button>				
			</div>';
	}elseif($i === 2){
		echo '<div id="menu-glowne">			
			<a href="#" id="wiadomosci-1"><div class="ss">Wiadomośći</div></a>
			<div id="wiadomosci-2" style="display: block;">
<button class="ssc" class="odebrane" id="wiadomosci-odbierz">Odbierz<div class="XXX">'.nowe_wiadomosci().'</div></button>
<button class="ssc" id="wiadomosci-wyslij">Wyślij</button>
<button class="ssc" id="wiadomosci-kosz">Kosz</button>				
			</div>';
	}else{
		echo 'Brak dostępu';
		exit(0);
	}
?>

	

	
		
		
		<div class="sss"></div>
		<a href="../index.php"><div class="ss">WYJDŹ</div></a>

		</div>
		
			<div class="market-dane"></div>


<?php 
	require('../footer.php');
?>


<script>



$(document).on("click", '#stat', function() {
 $(".market-dane").load('home.php');
 $('#statys').slideToggle('fast');
});

$(document).on("click", '#dodaj-uzytkownika', function() {
 $(".market-dane").load('dodaj-uzytkownika.php');
});

$(document).ready(function(){
$( '#uzytkownicy' ).click(function() {
	$('#uzyt').slideToggle('fast');
});

$( '#wiadomosci-1' ).click(function() {
	$('#wiadomosci-2').slideToggle('fast');
});




$( 'a[name="xccc"]' ).click(function() {
	$('#myDIVVV').slideToggle('fast');
});

$( 'a[name="xa"]' ).click(function() {
	$('#myDA').slideToggle('fast');
});

});

</script>