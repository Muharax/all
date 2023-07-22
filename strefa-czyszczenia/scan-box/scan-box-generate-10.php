<?php 
	require('../../session.php');
	
	
		function spr($id){
			require ('../../database/db.php');
			$zadanie = $db_PDO->prepare('SELECT * FROM `strefa-czyszczenia-scanbox` WHERE `kod` =:kod');
			$zadanie->execute([':kod' => $id]);
			$ile = $zadanie->rowCount();
			if($ile === 0){
				return $id;
			}else{
				return '<font color="red">KOD JUŻ ISTNIEJE W BAZIE</font>';
			}
		}
		
		
		echo '<input type="hidden" class="qr-size" value="160" min="20" max="500">';
		echo '<div class="FX-0">';
		for($i=0;$i<4;$i++){
			$id = md5(microtime(true).mt_Rand());
			$ah = spr($id);
			
			require ('../../database/db.php');
			$nazwa = $_POST['z1'];
			$zadanie = $db_PDO->prepare('INSERT INTO `strefa-czyszczenia-scanbox`(`nazwa`, `kod`, `data`)
										VALUES(:nazwa,:kod,:data)');
			$zadanie->execute([ ':nazwa' => $nazwa, ':kod' => $ah, ':data' => date("0000-00-00 00:00:00")]);
			
			
			echo '<div class="FX-L">
			<input type="text" class="qr-url'.$i.' et form-control" value="'.$ah.'">';
			echo '
				<div class="S1">'.$nazwa.'</div>
				<div id="qrcode'.$i.'" class="et"></div><br>';
			echo '<script>
					$("#qrcode'.$i.'").empty();
					$("#qrcode").css({
						"width" : $(".qr-size").val(),
						"height" : $(".qr-size").val()
					})

					$("#qrcode'.$i.'").qrcode({
						width: $(".qr-size").val(),
						height: $(".qr-size").val(),
						text: $(".qr-url'.$i.'").val()});
			</script>
			</div>';
		}
		echo '</div>';
		
		echo '<div class="FX-0">';
		for($i=4;$i<8;$i++){
			$id = md5(microtime(true).mt_Rand());
			$ah = spr($id);
			
			require ('../../database/db.php');
			$nazwa = $_POST['z1'];
			$zadanie = $db_PDO->prepare('INSERT INTO `strefa-czyszczenia-scanbox`(`nazwa`, `kod`, `data`)
										VALUES(:nazwa,:kod,:data)');
			$zadanie->execute([ ':nazwa' => $nazwa, ':kod' => $ah, ':data' => date("0000-00-00 00:00:00")]);
			
			echo '<div class="FX-L">
			<input type="text" class="qr-url'.$i.' et form-control" value="'.$ah.'">';
			echo '
				<div class="S1">'.$nazwa.'</div>
				<div id="qrcode'.$i.'" class="et"></div><br>';
			echo '<script>
					$("#qrcode'.$i.'").empty();
					$("#qrcode").css({
						"width" : $(".qr-size").val(),
						"height" : $(".qr-size").val()
					})

					$("#qrcode'.$i.'").qrcode({
						width: $(".qr-size").val(),
						height: $(".qr-size").val(),
						text: $(".qr-url'.$i.'").val()});
			</script>
			</div>';
		}
		echo '</div>';
	
?>
