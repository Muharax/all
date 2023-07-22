<link rel="stylesheet" href="../js/fancy-file-uploader/fancy_fileupload.css">

<script src="../js/fancy-file-uploader/jquery.ui.widget.js"></script>
<script src="../js/fancy-file-uploader/jquery.fileupload.js"></script>
<script src="../js/fancy-file-uploader/jquery.iframe-transport.js"></script>
<script src="../js/fancy-file-uploader/jquery.fancy-fileupload.js"></script>

<div class="size1">
	<input id="kp_upload" type="file" name="image" accept=".pdf" multiple>
	Nazwa pliku:
	Projekt:
</div>

<button type="kp_submit">Zapisz</button>


<script>
$(document).on("click", '#kp_submit', function() {
	
$.ajax({
    type: "POST",
    url: "kp-upload-skrypt.php",
    data: {"z1":t1},
	dataType:'text',
    success: function(data){
		
		$().msgpopup({
				text: ''+msg+'',
				type: 'success'
			  });
			  
			  
    },
})

});

$('#kp_upload').FancyFileUpload({
  params : {
    action : 'fileuploader'
  },
  maxfilesize : 1000000
});


</script>