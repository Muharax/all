<?php 
require('../../session.php');
require('funkcje.php');
?>
<div class="small">



	<table class="table table-striped table-dark">
		<thead class="thead-dark">
		  <tr>
			<th scope="col">Dostępne dni: <?php echo ile();?></td>
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
				<input class="form-control" type="date" id="data1" onkeyup="validate();" value="">
			</td>
			<td scope="col">DO</td>
			<td scope="col">
				<input class="form-control" type="date" id="data2" onkeyup="validate();" value="">
			</td>
			<td scope="col">
			</td>
			
			
		</tr>
		<tr>
			<td scope="col">POWÓD</td>
			<td scope="col">
				<input class="form-control" type="text" id="data3" onkeyup="validate();">
			</td>
			<td scope="col">KOD</td>
			<td scope="col">
				<select class="form-control" id="data4" onkeyup="validate();">
					<option value="">--Please choose an option--</option>
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
				<button id="mym1" class="btn btn-warning" disabled>ZAPISZ</button>
			</td>
		</tr>
		</tbody>
	</table>

</div>
