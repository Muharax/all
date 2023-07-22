<?php

try{
		require_once('../../session.php');
		require_once ('../../database/db.php');
		$zadanie = $db_PDO->prepare('SELECT `pojemnik` FROM `pojemniki`');
		$zadanie->execute();
		$ile = $zadanie->rowCount();
		if($ile > 0){
		echo '
		  <input list="browsers" name="browser" placeholder="Wybierz pojemnik" id="browser" class="text-center form-control">
		  <datalist id="browsers">';
		
					for ($i=0;$i<$ile;$i++){
						$w = $zadanie->fetch();
						echo '<option value="'.$w['pojemnik'].'"></option>';
					}
		echo '</datalist>
		<div class="space10"></div>
		<button class="btn btn-primary" id="dis" disabled>GENRUJ KODY QR</button>
		<button id="print-qr-code" class="dss btn btn-info">DRUKUJ</button>';
		exit;
		}
	}
   catch(Exception $e)
   {
     echo 'Wystąpił wyjątek nr '.$e->getCode().', jego komunikat to:'.$e->getMessage();
   }




?>
<script>
$( '#browser' ).change(function() {
	if($('#browser').val()===''){
		$('#dis').attr('disabled','disabled');
		$('.qr-code-pad1').css({"visibility":"hidden"});
		$('.dss').css({"visibility":"hidden"});
	}else{
		$('#dis').removeAttr('disabled');
	}
});
</script>


