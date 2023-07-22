<?php 
	require('../session.php');
	require('../header.php');
	require('../logo.php');
?>

<style>

.qr-code-generator {
width: 500px;
margin: 0 auto;
}

.qr-code-generator * {
-webkit-box-sizing: border-box;
-moz-box-sizing: border-box;
box-sizing: border-box;
}

#qrcode {
width: 200px;
height: 200px;
margin: 0 auto;
text-align: center;
}

#qrcode a {
font-size: 0.8em;
}

.qr-url, .qr-size {
padding: 0.5em;
border: 1px solid #ddd;
border-radius: 2px;
-webkit-box-sizing: border-box;
-moz-box-sizing: border-box;
box-sizing: border-box;
}

.qr-url {
width: 79%;
}

.qr-size {
width: 20%;
}

.generate-qr-code {
display: block;
width: 100%;
margin: 0.5em 0 0;
padding: 0.25em;
font-size: 1.2em;
border: none;
cursor: pointer;
background-color: #e5554e;
color: #fff;
}

body{
	background-color:white!important;
}
.pd{
	padding-top:130px;
	}
</style>





<div class="pd">
<div class="qr-code-generator">

<input type="text" class="qr-url" value="123">
<input type="number" class="qr-size" value="128" min="20" max="500">

<button class="generate-qr-code">Generate</button>

<br>

<div id="qrcode"></div>

</div>
</div>





<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/130527/qrcode.js"></script>
<script>
$('.generate-qr-code').on('click', function(){

// Clear Previous QR Code
$('#qrcode').empty();

// Set Size to Match User Input
$('#qrcode').css({
'width' : $('.qr-size').val(),
'height' : $('.qr-size').val()
})

// Generate and Output QR Code
$('#qrcode').qrcode({width: $('.qr-size').val(),height: $('.qr-size').val(),text: $('.qr-url').val()});

});
</script>