<?php 
		require('../../session.php');
		require('../../header.php');
		require ('../../logo.php');
		
		function ile_wyczyszczonych($x){
				
			require ('../database/db.php');
			$zadanie = $db_PDO->prepare('SELECT * FROM `strefa-czyszczenia-wyczyszczone` WHERE `pojemnik`= :AA)');
			$zadanie->execute([ ':AA' => htmlentities($x)]);
		}
		
?>
<div id="myDIV">
		<div class="MainMenu">
			<a href="<?php echo URL;?>strefa-czyszczenia/strefa-czyszczenia-index.php">
				<button class="cofnij">BACK</button></a>	
		</div>		
	</div>
	
	
	
<input type="hidden" id="token" value="<?php echo $_SESSION['token'];?>">
<div id="czyszczenie-index">
	<div id="puste-opakowania-przyciski">

			<div id="puste-opakowania-d">
				<div id="puste-opakowania-w">
					<div class="pojemnik">
						<button class="btn-pojemnik" value="M9" id="a1">
							<div class="yellow-a">X</div>
							<div class="yellow-b">M9</div>
						</button>
					</div>


					<div class="pojemnik">
							<button class="btn-pojemnik" value="M20" id="a2">
							<div class="yellow-a">X</div>
							<div class="yellow-b">M20</div></button></a>
					</div>
				</div>
					
				<div id="puste-opakowania-w">
					
					<div class="pojemnik">
							<button class="btn-pojemnik" value="S1 EVO" id="a3">
							<div class="yellow-a">X</div>
							<div class="yellow-b">S1 EVO</div></button></a>
					</div>


					<div class="pojemnik">
							<button class="btn-pojemnik" value="S1 TYWEK" id="a4">
							<div class="yellow-a">X</div>
							<div class="yellow-b">S1 TYWEK</div></button></a>
					</div>
				</div>
			</div>
			<div id="puste-opakowania-d">	
					<div id="puste-opakowania-w">
					
					<div class="pojemnik">
							<button class="btn-pojemnik" value="S2" id="a5">
							<div class="yellow-a">X</div>
							<div class="yellow-b">S2</div></button>
					</div>

					<div class="pojemnik">

							<button class="btn-pojemnik" value="S2+" id="a6">
							<div class="yellow-a">X</div>
							<div class="yellow-b">S2+</div></button>

					</div>
					</div>
					
					<div id="puste-opakowania-w">
								<div class="pojemnik">
										<button class="btn-pojemnik" value="S3" id="a7">
										<div class="yellow-a">X</div>
										<div class="yellow-b">S3</div></button>

								</div>
								<div class="pojemnik">
										<button class="btn-pojemnik" value="S4" id="a8">
										<div class="yellow-a">X</div>
										<div class="yellow-b">S4</div></button>



								</div>
					</div>
			</div>
			<div id="puste-opakowania-d">	
					<div id="puste-opakowania-w">
					
								<div class="pojemnik">
									<button class="btn-pojemnik" value="B1" id="a9">
									<div class="yellow-a">X</div>
									<div class="yellow-b">B1</div></button></a>

								</div>

								<div class="pojemnik">

										<button class="btn-pojemnik" value="G1" id="a10">
										<div class="yellow-a">X</div>
										<div class="yellow-b">G1</div></button></a>

								</div>
						
					</div>
					
					<div id="puste-opakowania-w">
					
								<div class="pojemnik">

										<button class="btn-pojemnik" value="G2" id="a11">
										<div class="yellow-a">X</div>
										<div class="yellow-b">G2</div></button></a>

								</div>

								<div class="pojemnik">

										<button class="btn-pojemnik" value="G3" id="a12">
										<div class="yellow-a">X</div>
										<div class="yellow-b">G3</div></button></a>

								</div>
						
					</div>
			</div>
			<div id="puste-opakowania-d">		
				<div id="puste-opakowania-w">
				
					<div class="pojemnik">

						<button class="btn-pojemnik" value="BL 1" id="a13">
						<div class="yellow-a">X</div>
						<div class="yellow-b">BL 1</div></button></a>

					</div>
						
					<div class="pojemnik">

							<button class="btn-pojemnik" value="BL 2" id="a14">
							<div class="yellow-a">X</div>
							<div class="yellow-b">BL 2</div></button></a>
							
					</div>

				</div>
				
				<div id="puste-opakowania-w">
					
					<div class="pojemnik">
						<button class="btn-pojemnik" value="AZUR+" id="a15">
						<div class="yellow-a">X</div>
						<div class="yellow-b">AŻUR+</div></button></a>
				</div>
				
				<div class="pojemnik">
						<button class="btn-pojemnik" value="S1" id="a16">
						<div class="yellow-a">X</div>
						<div class="yellow-b">S1</div></button></a>
				</div>

				</div>
			</div>
		</div>
		
		<table class="tabela-aa table table-dark">
				<thead>
				<tr>

					<td class="tabela-nazwy">POJEMNIK</td>
					<td class="tabela-nazwy">ILOŚĆ POJEMNIKÓW</td>
					<td class="tabela-nazwy">ILOŚĆ PODWOZI</td>
					<td class="tabela-nazwy"></td>
				
				</tr>
				</thead>
				<tbody>
				<tr>

					<td class="tabela-nn able">
							<div id="cC">Wybierz pojemnik</div>
							<input type="hidden" name="pojemnik-core" id="y">
					</td>
					
					<td class="tabela-nn">
							<div class="flex">
							<input type="button" value="-" id="minus1">
								<input 
									class="puste-opakowania-input-number" 
									id="count1"
									type="number" 
									name="cz-pod"
									onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"
									min="0" 
									max="1000"
									step="1"
									value="0">
							<input type="button" value="+" id="plus1">
							</div>
					</td>
					
					<td class="tabela-nn">
					<div class="flex">
						<input type="button" value="-" id="minus">
							
							<input
								class="puste-opakowania-input-number"
								id="count"
								type="number" 
								name="cz-poj"
								onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"
								min="0" 
								max="1000"
								step="1"
								value="1">
						<input type="button" value="+" id="plus">
						</div>
					</td>
					
					<td class="tabela-c">
						<button class="dodaj2" id="add-wyczyszczone" name="dodaj2" disabled>DODAJ</button>
					</td>
					
								
				</tr>
				</body>
			</table>
					
</div>
<?php require ('../../footer.php');?>
<script>
$(document).on("click", '.btn-pojemnik', function() {
	var t1 = $(this).val();
	
	$( "#cC" ).text( t1 );
    $( ".able" ).css({"background-color": "green"});
    $( ".btn-pojemnik" ).css({"background-color": "white"});
    $( this ).css({"background-color": "#39d739"});
    // $( ".tabela-nn-n" ).css({"background-color": "green"});
	$("#add-wyczyszczone").attr("disabled", false);
	
	
});


$(document).on("click", '#add-wyczyszczone', function() {
	t1 = $("#cC").text();
	poj = $("#count1").val();
	pod = $("#count").val();
	token = $("#token").val();
	
$.confirm({
		title: 'CZYSZCZENIE POJEMNIKÓW',
		content: 'WYCZYSZCZONE ?',
		escapeKey: 'cancelAction',
		buttons: {
			confirm: {
				btnClass: 'btn-red',
				text: 'TAK',
				action: function(){
						$.ajax({
							type: "POST",
							url: "czyszczenie-add-wyczyszczone.php",
							data: {"z1":t1, "z2":poj, "z3":pod, "token":token},
							dataType:'text',
							success: function(msg){
								$().msgpopup({
									text: ''+msg+'',
									type: 'success'
								});
							
								var audio = new Audio('app-5.mp3');
								audio.play();
								$( "#cC" ).text( "WYBIERZ POJEMNIK" );
								$( ".btn-pojemnik" ).css({"background-color": "white"});
								$( ".able" ).css({"background-color": "#212529"});
								$("#add-wyczyszczone").attr("disabled", true);
								$( "#count" ).val(1);
								$( "#count1" ).val(0);
								
								
									
							
							},
						});	
					
					
					
					
				}
			},
			cancelAction: {
				btnClass: 'btn-green',
				text: 'ANULUJ',
			}
		}
	});
});

var total1;
// if user changes value in field
$('#count1').change(function(){
  // maybe update the total here?
}).trigger('change');

$('#plus1').click(function() {
  var target = $('#count1', this.parentNode)[0];
  target.value = +target.value + 1;
});

$('#minus1').click(function() {
  var target = $('#count1', this.parentNode)[0];
  if (target.value > 0) {
    target.value = +target.value - 1;
  }
});

var total;
// if user changes value in field
$('#count').change(function(){
  // maybe update the total here?
}).trigger('change');

$('#plus').click(function() {
  var target = $('#count', this.parentNode)[0];
  target.value = +target.value + 1;
});

$('#minus').click(function() {
  var target = $('#count', this.parentNode)[0];
  if (target.value > 0) {
    target.value = +target.value - 1;
  }
});
</script>