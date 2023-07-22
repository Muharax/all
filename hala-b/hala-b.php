<?php 
	require('../session.php');
	require('../header.php');
	require('../logo.php');
?>

<script>
$(document).ready(function(){
$( 'a[name="xc"]' ).click(function() {
	$('#msv').slideToggle('fast');
});


});

</script>


	<div id="menu-glowne">

		<a onclick="myFunction()" name="xc" href="#">
		
		<a href="kontrola-dobrej-sztuki/start.php">
						<div class="ssc">Kontrola dobrej sztuki</div>
					</a>
					
		<div class="ss">Magazyn</div></a>
			<div id="msv" style="display: none;">

					<a style="text-decoration:none;" href="magazyn/magazyn-automatyczny.php">
						<div class="ssc">Magazyn Automatyczny</div>
					</a>
					
					

			</div>

				<div class="sss"></div>
				
		<a href="<?php echo URL;?>index.php"><div class="ss">WYJDŹ</div></a>
		
	</div>

	<div id="hala-b-index">

	<?php
		
	?>
	</div>

