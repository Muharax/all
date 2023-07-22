<?php
	require ('../../session.php');
	require ('../../header.php');
	require ('../../logo.php');
	
	function pobierz(){
		require_once ('../../database/db.php');
		$zadanie = $db_PDO->prepare('SELECT * FROM `kontrola_pierwszej_dobrej_sztuki` ORDER BY `id` DESC LIMIT 8');
		$zadanie->execute();
		$ile = $zadanie->rowCount();
		if($ile>0){
			for ($i=0; $i < $ile; $i++){
				$F = $zadanie->fetch();
				echo '<tr>';
				echo '<td><input class="input-KPDS" type="number" value="'.$F['ilosc_LE'].'" disabled></td>';
				echo '<td><input class="input-KPDS" type="number" value="'.$F['ilosc_PR'].'" disabled></td>';
				echo '<td><input class="input-KPDS-date" type="text" value="'.$F['data'].'" disabled></td>';
				echo '</tr>';
			}
		}
	}
		
?>
	<div class="mymodal"></div>
	
	<div class="white">KONTROLA PIERWSZEJ DOBREJ SZTUKI</div>
	<div class="L1">
	<table class="table-KPDS">
		<thead>
		<tr>
			<th>LE</th>
			<th>PR</th>
			<th>CZAS</th>
		</tr>
		</thead>
		<tbody>
		<?php pobierz();?>
		</tbody>	
	</table>
	</div>
	
	<div class="L2">
		<button>ZAKOŃCZ</button>
		<button>NOWA PRODUKCJA</button>
	</div>

<div class="modal-C"></div>

<div class="btns">
	<button id="btn-add-KPDS">DODAJ KOLEJNĄ</button>
	<button id="drukuj" onclick="window.print()">DRUKUJ</button>
</div>






<script>

// function sound(){
	// var audio = new Audio('../sound/app-5.mp3');
	// audio.play();
// }
// setInterval(sound, 5000);


// function tick() {
  // var mins = new Date().getMinutes();
  // if (mins == "23") {
    // var audio = new Audio(URL+'sound/app-5.mp3');
	// audio.play();
  // }
  // console.log('Tick ' + mins);
// }
// setInterval(tick, 1000);

$(document).on("click", '#btn-add-KPDS', function() {
 $(".modal-C").load('modal.php');
 $(".modal-C").show();
 $(".mymodal").toggle();
});
$(document).on("click", '.mymodal', function() {
 $(".modal-C").hide();
 $(".mymodal").toggle();
});

$(document).on("click", '#KPDS-ADD-SYSTEM', function() {
	var t1 = $('#vv1').val();
	var t2 = $('#vv2').val();
	
	console.log(t1+','+t2);
	
	$.ajax({
				type: "POST",
				url: "KPDS-ADD-SYSTEM.php",
				data: {"z1":t1, "z2":t2},
				dataType:'text',
				success: function(msg){
					if(msg==='GIT'){
						$(".modal-C").hide();
						$(".mymodal").toggle();
						
						$.confirm({
								title: 'DODANO POPRAWNIE',
								content: 'LE: '+t1+'<br>PR: '+t2,
								type: 'green',
								typeAnimated: true,
								buttons: {
									tryAgain: {
										text: 'POTWIERDŹ',
										btnClass: 'btn-green',
										action: function(){
										window.location.href = origin+'/alweb/hala-b/kontrola-dobrej-sztuki/start.php';
										}
									},
									close: function () {
									}
								}
							});
							
					}else{
						$().msgpopup({
							text: ''+msg+'',
							type: 'success'
						});
					}
					
				},
			});
});
</script>