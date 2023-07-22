<?php
		require('../../../session.php');
		require('../../../header.php');
		require('../../../logo.php');	
?>
<div id="xnm">
		<br><br>
	<div style="color:white">
		KOD 1
		<input type="text" id="id-1" value="" autofocus>
	</div>
		</br>
	<div style="color:white">
		KOD 2
		<input type="text" id="id-2" value="">
	</div>
</div>

<div class="dane-w"></div>
<div class="show-info"></div>
<div class="code show-info"></div>


<script>
$(document).on('change','#id-1',() => {
  $('#id-2').focus();
  $('.show-info').text('');
});
  
$(document).on('change','#id-2',() => {
  const t1 = $('#id-1').val().trim();
  const t2 = $('#id-2').val().trim();
  
  if(t1 === t2){
    $('.show-info').css({'color':'#06f906'}).text('OK');
    $('.code').css({'color':'white'}).text(t1);
	var audio = new Audio('../../../sound/good-1.wav');
	audio.play();
  }else{
    $('.show-info').css({'color':'red'}).text('NOK');
	$('.code').css({'color':'white'}).text(t1+' - '+t2);
	var audio = new Audio('../../../sound/bad-1.wav');
	audio.play();
  }
  
  $('#id-1').val('');
  $('#id-2').val('');
  $('#id-1').focus();
});


// =================== 2 ROZWIĄZANIE =========================
// $(document).off('change','#id-1').on('change','#id-1',function(){
		// $("#id-2").focus();
		// $(document).off('change','#id-2').on('change','#id-2',function(){
			// var t1 = $('#id-1').val();
			// var t2 = $('#id-2').val();
			// if(t1 === t2){
				// $(".show-info").css({"color":"#06f906"}).text("OK");
				// $('#id-1').val("");
				// $('#id-2').val("");
				// $("#id-1").focus();
			// }else{
				// $(".show-info").css({"color":"red"}).text("NOK");
				// $('#id-1').val("");
				// $('#id-2').val("");
				// $("#id-1").focus();
			// }
		// });

// });








// $('#').change(function(){

// }).trigger('change');


// $(document).off("click", '#scanid12').on("click", '#scanid12', function() {
 // $(".dane-w").text("");
 // $(".dane-w").load('scanner/scan.php');
// });
</script>