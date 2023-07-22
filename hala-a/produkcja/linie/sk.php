<style>
.SK-BOX{
	border:1px solid black;
	display: inline-block;
	background-color:white;
}
.KS1{
	width:100px;
	height:200px;
}
.KS2{
	width:50px;
	height:80px;
	position: relative;
    top: -60px;
}
.KS3{
	width:100px;
	height:200px;
}
.KS4{
	width:200px;
	height:100px;
}
.KS5{
	width:200px;
	height:100px;
}
table.jj tr td > div{
	font-size:11px;
	text-align:center;
}
.pi{
	background-color:white;
	color:black;
	padding:5px;
	border-radius:4px;
}
</style>

<?php 
	require('../../../session.php');
	require('../../../header.php');
	require('../../../logo.php');
	if(isset($_POST['linia-SK'])){
echo '

<div class="pi">Całkowita produkcja: 88 Ukończono: 24 ODRZUT: 7 <button>POKAZ</button></div></br>


<table class="jj">
	<tbody>
		<tr>
			<td>
				<div class="SK-BOX KS1">KORPUS L
					<div>STAN: 28</div>
					<div>MIN: 17</div>
					<div>MAX: 37</div>
				</div>
			</td>
			
			<td><div class="SK-BOX KS1">KORPUS PR
					<div>STAN: 28</div>
					<div>MIN: 17</div>
				</div>
			</td>
			<td><div class="SK-BOX KS2">WIĄZKA T1</div></td>
			<td><div class="SK-BOX KS2">WIĄZKA T2</div></td>
			<td><div class="SK-BOX KS3">ODBŁYŚNIK L</div></td>
			<td><div class="SK-BOX KS3">ODBŁYŚNIK PR</div></td>
			<td><div class="SK-BOX KS4">RAMKA L</div></td>
			<td><div class="SK-BOX KS4">RAMKA PR</div></td>
			<td><div class="SK-BOX KS5">ŚWIATŁOWÓD L</div></td>
			<td><div class="SK-BOX KS5">ŚWIATŁOWÓD PR</div></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
	</tbody>
</table>';
	}
	
	
	
	
?>
<button>WYRÓB GOTOWY +</button>
<button>DO SPRAWDZENIA</button>
<button>ZŁOMOWANIE</button>
