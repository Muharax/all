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

		echo '<div class="FX-0">';
		for($i=0;$i<1;$i++){
			$id = md5(microtime(true).mt_Rand());
			$ah = spr($id);
			echo '<div class="FX-L">
			<input type="text" class="qr-url et form-control" value="'.$ah.'"><br>';
			echo '<div id="qrcode" class="et"></div>';
			echo '<script>
					$("#qrcode").empty();
					$("#qrcode").css({
						"width" : $(".qr-size").val(),
						"height" : $(".qr-size").val()
					})

					$("#qrcode").qrcode({
						width: $(".qr-size").val(),
						height: $(".qr-size").val(),
						text: $(".qr-url").val()});
			</script>
			</div>';
		}
		echo '</div>';

	
?>
