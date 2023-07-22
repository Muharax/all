<?php 

defined('URL') or define('URL', 'https://'.$_SERVER['SERVER_NAME']. "/all/");

	session_start();
	if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] === true){
		header('Location: '.URL.'index.php');
	}
	require('../header.php');
	require('../logo.php');
	
	if(isset($_SESSION['alert'])) echo '<div class="orange">'.$_SESSION['alert'].'</div>'; 
		unset($_SESSION['alert']);
	
?>
<div class="orange"></div>
<div id="formularz-logowania">
	<form action="zaloguj.php" method="POST">
		<div id="logowanie-s">
			<div id="name">
			<i class="material-icons prefix cwhite">apps</i>
				<input type="text" id="first" autocomplete="off" autofocus="On" name="user" placeholder="Login" value="ADMIN11" required>
			</div>
					
			<div id="pass">
			<i class="material-icons prefix cwhite">lock</i>
				<input type="password" id="second" autocomplete="off" name="pass" placeholder="Hasło" value="admin" required>
			</div>
			
			<div id="btn-log-in">
				<button type="submit" class="log-in" id="sub">Sign In</button>
			</div>
		</div>
	</form>
</div>
	
<?php require('../footer.php');?>

<script>



if ("NDEFReader" in window) { 
	const ndef = new NDEFReader();
	ndef.scan().then(() => {
			$(".n").text("1");
		ndef.onreadingerror = (event) => {
			$(".n").text("2");
		};
			
		ndef.addEventListener("reading", ({ message, serialNumber }) => {
			$(".n").text("Serial Number:"+serialNumber);
			$(".nn").text("Serial Number:"+message);
			  
			$.ajax({
				type: "POST",
				url: "test-core.php",
				data: {"z1":serialNumber},
				success: function(msg){
					// $(".orange").text(msg);
					// function res () {
					  // var audio = new Audio(URL+'sound/bad-1.wav');
					  // audio.play();
					// }
					$('#first').val(msg);
					// setTimeout(res, 2000);

					window.location=origin+"/all/index.php";
					
					
					
				},
			});
		});
		
	}).catch((error) => {
		$(".n").text(error);
	});
}else{
	$(".m").text("NIE");
}
</script>