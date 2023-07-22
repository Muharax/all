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
    position: absolute;
    top: 57px;
    left: 760px;
	
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
width: 100%;
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

    width: 501px;
    position: absolute;
    left: 390px;
    top: 583px;
	
}



.pd{
	padding-top:130px;
	}
	
.etykieta-0{
	width:100%;
	height:100%:
}

.etykieta-1{
	width:500px;
	height:250px;
	border:solid 1px black;
	background-color:white;
	margin-left: auto;
    margin-right: auto;
    top: 200px;
}
.etykieta-qr{

}
.etykieta-2{
	width: 50%;
    border-right: 1px solid;
    color: black;
    height: 100%;
}
</style>



<div class="etykieta-0">
<div class="etykieta-1">
	<div class="etykieta-2">
	<table class="table" style="font-family:monospace; font-size:12px;">
	<tbody>
	<tr>
	<td>NAZWA: </td><td>RAMKA 2K Voil</td>
	</tr>
	<tr>
	<td>KOD: </td><td>1111 1111 1111 11</td>
	</tr>
	<tr>
	<td>ILOŚĆ: </td><td>8</td>
	</tr>
	<tr>
	<td>DATA PROD. : </td><td>27.01.2021 (22:54)</td>
	</tr>
	<tr>
	<td>ID PRAC. : </td><td>00 PL07679234</td>
	</tr>
	<tr>
	<td>KOLORYSTYKA : </td><td>2KM</td>
	</tr>
	<tr>
	<td>NR.F.RM</td><td>ABZE7 6655-09/22</td>
	</tr>
	<tr>
	<td>No ID:</td><td>NCBBV778-345/234/221/12-ETHLC</td>
	</tr>
	<tr>
	<td>KR-TT</td><td>HALA-C > HALA-B > MARKET > LINIA</td>
	</tr>
	<tr>
	<td>LOC MARKET:</td><td>ABS 102</td>
	</tr>
	</tbody>
	</table>
	
	
	</div>
		<div class="etykieta-qr">
		<textarea type="text" class="qr-url"></textarea>
		
		<div id="qrcode"></div>
			
		</div>
	</div>
</div>


<button class="generate-qr-code">Generate</button>
<input type="number" class="qr-size" value="128" min="20" max="500">

<script>

$('.generate-qr-code').on('click', function(){
$('#qrcode').empty();
$('#qrcode').css({
'width' : $('.qr-size').val(),
'height' : $('.qr-size').val()
})
$('#qrcode').qrcode({width: $('.qr-size').val(),height: $('.qr-size').val(),text: $('.qr-url').val()});
});

</script>



<?php require('../footer.php');?>