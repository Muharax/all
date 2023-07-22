<style>
div{
	color:white;
}
#scan{
	width:200px;
	height:200px;
	background-color:white;
	border-radius:10px;
	position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -100%);
	visibility: hidden;
	display: flex;
    flex-wrap: nowrap;
    align-content: center;
    justify-content: center;
    align-items: center;
    flex-direction: row;
}
#msg-card{
	color:black;
	font-size: 20px;
    text-align: center;
}
.n{
	color:black;
	font-size: 20px;
}
</style>
<?php 		
	
	require ('../session.php');
	require ('../header.php');
	require ('../logo.php');
	require ('../database/db.php');
	require ('../alert.php');

	$z = $db_PDO->prepare('SELECT * FROM `users` WHERE `id`= :name LIMIT 1');
	$z->execute([ 'name' => htmlentities($_SESSION['id']) ]);
	$ilu = $z->rowCount();
					if($ilu === 1){
						$w = $z->fetch();
					}else{
						
					}
	?>
	
	<div id="profil-out">
		<div class="dane-1">
			<div class="profil-dane">IMIĘ:</div>
			<div class="profil-dane">NAZWISKO:</div>
			<div class="profil-dane">PKT:</div>
			<div class="profil-dane">LOGOWANIA:</div>
			<div class="profil-dane"><button id="add-card">DODAJ KARTĘ</button></div>
		</div>
		<div class="dane-2">
			<div class="profil-dane"><?php echo $w['imie'];?></div>
			<div class="profil-dane"><?php echo $w['nazwisko'];?></div>
			<div class="profil-dane"><?php echo $w['pkt'];?></div>
			<div class="profil-dane"><?php echo $w['logowania'];?></div>
		</div>
	</div>
	<div class="n"></div>
	<div class="green"></div>
	<div id="scan">
		<div id="msg-card">Przyłóź kartę do urządzenia</div>
		
	</div>
<?php 
	require('../footer.php');


?>
<script>
$(document).on("click", '#add-card', function() {
	$("#scan").css('visibility', 'visible');
	
	if ("NDEFReader" in window){
	const ndef = new NDEFReader();
	ndef.scan().then(() => {
			
			$("#msg-card").text("SCAN");
		ndef.onreadingerror = (event) => {
			$("#msg-card").text("ERROR");
		};
			
		ndef.addEventListener("reading", ({ message, serialNumber }) => {
			$("#msg-card").text("Serial Number:"+serialNumber);
			  
			$.ajax({
				type: "POST",
				url: "add-card-core.php",
				data: {"z1":serialNumber},
				success: function(msg){
					
					$("#msg-card").text("OK");
					function x () {
						$("#scan").css('visibility', 'hidden');
					}
					setTimeout(x, 1000);
					
					function y () {
						$(".green").text("Karta dodana pomyślnie");
					}
					setTimeout(y, 1000);
					}
				
			});
		});
		
	}).catch((error) => {
		$("#msg-card").text(error);
	});
}else{
	
	$("#msg-card").text("BRAK RFID");
	simpleNotify.notify({message: 'Hey! This is a warning notification.', level: ‘warning’});
}




});



</script>
