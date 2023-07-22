<style>
	.G1{
		color: green;
	}
	.wx{
		width:25%;
	}
</style>
<?php
	require('../../session.php');
	$z = $db_PDO->prepare('SELECT urlop, pkt FROM users WHERE id=:id');
	$z->execute(['id'=>htmlentities($_SESSION['id'])]);
	$w = $z->fetch();
	$i = $w['urlop'];
	$p = $w['pkt'];
?>
<div class="small">
	<table class="table table-striped table-dark wx">
		<thead class="thead-dark">
		  <tr>
			<th scope="col"><span class="G1">Dostępne dni:</span> <?php echo $i;?></th>
			<th scope="col"><span class="G1">Punkty:</span> <?php echo $p;?></th>
		  </tr>
		</thead>
	</table>

	<table class="table table-dark" style="margin-bottom:0px;">
		<thead class="thead-dark">
		  <tr>
			<th colspan="5" scope="col">PLANUJ URLOP</td>
		  </tr>
		</thead>
		<tbody>
		 <tr>
			<td scope="col">OD</td>
			<td scope="col">
				<input class="form-control" type="date" id="data1" value="2023-07-08">
			</td>
			<td scope="col">DO</td>
			<td scope="col">
				<input class="form-control" type="date" id="data2" value="2023-07-09">
			</td>
			<td scope="col">
			</td>
			
			
		</tr>
		<tr>
			<td scope="col">POWÓD</td>
			<td scope="col">
				<input class="form-control" type="text" id="data3" value="X">
			</td>
			<td scope="col">KOD</td>
			<td scope="col">
				<select class="form-control" id="data4">
					<option value="198">--Please choose an option--</option>
					<option value="198">Postój</option>
					<option value="245">Spóźnienie</option>
					<option value="344">Urlop</option>
					<option value="455">Opieka</option>
					<option value="566">Przepustka płatna</option>
					<option value="677">Przepustka niepłatna</option>
					<option value="788">Przepustka służbowa</option>
				</select>
			</td>
			<td scope="col">
				<button id="btnZapisz" class="btn btn-warning">ZAPISZ</button>
			</td>
		</tr>
		</tbody>
	</table>

</div>
