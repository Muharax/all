<?php 
		require('../session.php');
		require('../header.php');
		require ('../logo.php');
?>

	<div id="strefa-czyszczenia">

	<?php 

	if(isset($_SESSION['uprawnienia']) && $_SESSION['zalogowany'] === TRUE){
		$i = $_SESSION['uprawnienia'];
			
	if($i===1){
	echo '<div id="menu-glowne">
			<a href="czyszczenie/czyszczenie-index.php"><div class="ss" >CZYSZCZENIE</div></a>
			
			<a href="puste-opakowania-przyjecie.php"><div class="ss" title="Przyjęcie pojemników na strefe czyszczenia - Pojemniki które spływają na strefe">PRZYJĘCIE</div></a>
			
			<a href="puste-opakowania.php"><div class="ss">ZAMÓWIENIA</div></a>
			<a href="puste-opakowania-zlecenia.php"><div class="ss">ZLECENIA</div></a>
			<a href="scan-box/scan-box-index.php"><div class="ss">SCAN BOX</div></a>
			
			<a href="scan-box/scan-box-add.php"><div class="ss">SCAN BOX ADD</div></a>
			<a href="scan-box/checker/index.php"><div class="ss">Checker</div></a>
			<div class="sss"></div>
			
			
			<a href="#"><div class="ss apck">SPŁYW POJEMNIKÓW</div></a>
			
			<div class="sss"></div>
			
			<a href="strefa-czyszczenia-zgloszenia.php"><div class="ss" style="color:orange;">ZGŁOSZENIA</div></a>
			<a href="../index.php"><div class="ss">WYJDŹ</div></a>
		</div>';
					 }
	if($i===2){
		echo '<div id="menu-glowne">';
		echo '<a href="czyszczenie/czyszczenie-index.php"><div class="ss" >CZYSZCZENIE</div></a>';
		echo '<a href="puste-opakowania-przyjecie.php"><div class="ss" title="Przyjęcie pojemników na strefe czyszczenia - Pojemniki które spływają na strefe">PRZYJĘCIE</div></a>';
		echo '<a href="puste-opakowania-zlecenia.php"><div class="ss">ZLECENIA</div></a>';
		echo '<a href="scan-box/scan-box-add.php"><div class="ss">SCAN BOX ADD</div></a>';
		
		echo '<div class="sss"></div>';
		echo '<a href="../index.php"><div class="ss">WYJDŹ</div></a>';
		echo '</div>';
			 } 
		}
		?>

	
	</div>
	
	<div class="market-dane"></div>
<?php require ('../footer.php');?>
<script>
$(document).on("click", '.apck', function() {
		$(".market-dane").load("splywy/splywy-index.php");
});
</script>