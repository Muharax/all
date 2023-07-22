<?php 
$w1 = "SK";
$w2 = "AU";
$w3 = "BMW";
$w4 = "LANCIA";
$w5 = "PEUGEOT";
$w6 = "CITROEN";
$w7 = "VW";
$w8 = "FIAT";

?>
	<div class="box">
		
		<button class="obj" value="<?php echo $w1;?>">
			<div class="opn">
				<div class="name-a"><?php echo $w1;?></div>
				<div class="img-a">
					<img class="mico" src="../img/logos/sk.png">
				</div>
			</div>
			
		</button>
		
		
		<button class="obj" value="<?php echo $w2;?>">
			<div class="opn">
			<div class="name-a"><?php echo $w2;?></div>
			<div class="img-a">
			
			<img class="mico" src="../img/logos/audi.png"></div>
			</div>
			
			</button>
			
			
		<button class="obj" value="<?php echo $w3;?>">
			<div class="opn">
			<div class="name-a"><?php echo $w3;?></div>
			<div class="img-a">
			
			<img class="mico" src="../img/logos/bmw.png"></div>
			</div>
			
			</button>
			
		<button class="obj" value="<?php echo $w4;?>">
			<div class="opn">
			<div class="name-a"><?php echo $w4;?></div>
			<div class="img-a">
			
			<img class="mico" src="../img/logos/lancia.png"></div>
			</div>
			
			</button>
		
	</div>
		<div class="box">
			
			<button class="obj" value="<?php echo $w5;?>">
				<div class="opn">
				<div class="name-a"><?php echo $w5;?></div>
				<div class="img-a">
				
				<img class="mico" src="../img/logos/peugeot.png"></div>
				</div>
				
				</button>
				
			<button class="obj" value="<?php echo $w6;?>">
				<div class="opn">
				<div class="name-a"><?php echo $w6;?></div>
				<div class="img-a">
				
				<img class="mico" src="../img/logos/citroen.png"></div>
				</div>
				
				</button>
			
			<button class="obj" value="<?php echo $w7;?>">
				<div class="opn">
				<div class="name-a"><?php echo $w7;?></div>
				<div class="img-a">
				
				<img class="mico" src="../img/logos/vw.png"></div>
				</div>
				
				</button>
				
			<button class="obj" value="<?php echo $w8;?>">
				<div class="opn">
				<div class="name-a"><?php echo $w8;?></div>
				<div class="img-a">
				
				<img class="mico" src="../img/logos/fiat.png"></div>
				</div>
				
				</button>
			
		</div>
	
	
<hr>


<table class="table table-success table-striped">
<tr>
<td>KOD QR</td>
<td><input type="text" style="width:350px;" value=""></td>
<td><button>SKANUJ</button></td>
</tr>


</table>


<script>
$(document).on("click", '.obj', function() {
	var t1 = $(this).val();
		
		$.ajax({
		type: "POST",
		url: "produkcja/start-pobranie-wersji.php",
		data: {"z1":t1},
		dataType:'text',
		success: function(data){
			
			$(".market-dane").html(data);
		},
	});
});

</script>