<?php 

	function create_map ($ilosc, $nazwa){
		for($i=0;$i<$ilosc;$i++){
				echo '
				<div class="loc-out1">
				<div class="loc-out">
							<div class="lokalizacja-opis">'.$nazwa.str_pad($i, 3, 0, STR_PAD_LEFT).'</div>
							<div class="'.$nazwa.str_pad($i, 3, 0, STR_PAD_LEFT).' AP">-</div>
					</div>
				<div class="infoo infooo'.$nazwa.str_pad($i, 3, 0, STR_PAD_LEFT).'" style="display:none;">-
				</div>
				</div>';
				
		}
	}
?>
<div id="MAPA-C">
	<div class="mapa cwhite">
		<div class="mapa-v">
	
			<div class="S-AA">
				<?php create_map(108, 'AA');?>
			</div>
			<div class="droga-h"></div>
			<div class="S-BB">
				<?php create_map(108, 'BB');?>
			</div>
		</div>
		
	<div class="droga-v"></div>
		<div class="mapa-v">
			<div class="S-CC">
				<?php create_map(108, 'CC');?>
			</div>
			<div class="droga-h2"></div>
		</div>
	</div>
</div>





<?php 
require('../database/db-connect.php');
	$C = "SELECT * FROM `hala_c_stan_detali`";
		$zadanie = $db_PDO->query($C);
		$ile = $zadanie->rowCount();
		if($ile > 0){
			for ($i=0; $i < $ile; $i++){
				$w = $zadanie->fetch();
	echo '<script>
	$(document).ready(function(){
		$( ".'.$w['loc'].'" ).html( "'.$w['kod'].', '.$w['nazwa'].'" );
		$( ".infooo'.$w['loc'].' " ).html("MIN: '.$w['min'].', MAX: '.$w['max'].'");
	})
	</script>';
			}
				
				
		}
		
	
?>
		
<script>

if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
		  dragElement(document.getElementById("MAPA-C"));

		function dragElement(elmnt) {
		  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
		 
			elmnt.ontouchstart = dragMouseDown;


		  function dragMouseDown(e) {
			e = e || window.event;
			// e.preventDefault();
			pos3 = e.touches[0].clientX;
			pos4 = e.touches[0].clientY;
			document.ontouchend = closeDragElement;
			document.ontouchmove  = elementDrag;
		  }

		  function elementDrag(e) {
			e = e || window.event;
			// e.preventDefault();
			pos1 = pos3 - e.touches[0].clientX;
			pos2 = pos4 - e.touches[0].clientY;
			pos3 = e.touches[0].clientX;
			pos4 = e.touches[0].clientY;
			z = parseInt($('#MAPA-C').css('transform').split(',')[4]);
			x = parseInt($('#MAPA-C').css('transform').split(',')[5]);
			y = (x - pos2) + "px";
			x = (z - pos1) + "px";
			
			
			document.getElementById("MAPA-C").style.transform = "translate("+x+","+y+")";
			console.log(x);
			console.log(y);
			
		  }

		  function closeDragElement() {
			document.ontouchstart = null;
			document.ontouchmove = null;
		  }
		}
}else{
			  dragElement(document.getElementById("MAPA-C"));

			function dragElement(elmnt) {
			  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
			 
				elmnt.onmousedown = dragMouseDown;


			  function dragMouseDown(e) {
				e = e || window.event;
				e.preventDefault();
				pos3 = e.clientX;
				pos4 = e.clientY;
				document.onmouseup = closeDragElement;
				document.onmousemove = elementDrag;
			  }

			  function elementDrag(e) {
				e = e || window.event;
				e.preventDefault();
				pos1 = pos3 - e.clientX;
				pos2 = pos4 - e.clientY;
				pos3 = e.clientX;
				pos4 = e.clientY;
				z = parseInt($('#MAPA-C').css('transform').split(',')[4]);
				x = parseInt($('#MAPA-C').css('transform').split(',')[5]);
				y = (x - pos2) + "px";
				x = (z - pos1) + "px";
				
				
				document.getElementById("MAPA-C").style.transform = "translate("+x+","+y+")";
				console.log(x);
				console.log(y);
				
			  }

			  function closeDragElement() {
				document.onmouseup = null;
				document.onmousemove = null;
			  }
			}
}







</script>
