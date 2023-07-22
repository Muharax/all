<?php
		// ========================================================================
		// ========================================================================
		// 
		// ========================================================================
		// ========================================================================

	$pid = $_POST['z1'];
	require('../../funkcje.php');

?>



<div class="dv1">
<div class="dv2">POBRANIE
</div>
<hr>
<?php
$rc = new rc();
$rc->edit_1($pid);
?>


<div>
<div>
<div class="clinia">PODWOZIE</div>
</div>
<div>
		<div id="minus" class="btn btn-warning">-</div>
											<div class="inputt"><input
												class="puste-opakowania-input-number"
												id="pobranie-c1"
												type="number" 
												name="m9-podwozia"
												onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"
												min="0" 
												max="99"
												step="1"
												value="0"></div>
<div id="plus" class="btn btn-success">+</div>
</div>
</div>
<div class="clinia">POJEMNIK</div>
<div id="minus1" class="btn btn-warning">-</div>


					<div class="inputt"><input
												class="puste-opakowania-input-number"
												id="pobranie-c2"
												type="number" 
												name="m9-podwozia"
												onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"
												min="0" 
												max="99"
												step="1"
												value="0"></div>
								
												
<div id="plus1" class="btn btn-success">+</div>
</div>

<hr>
<button type="button" id="save3" value="<?php echo $pid;?>">POBIERAM</button>



</div>


<script>
var total;
$('#pobranie-c1').change(function(){
}).trigger('change');

$('#plus').click(function() {
  var target = $('#pobranie-c1', this.parentNode)[0];
  target.value = +target.value + 1;
});

$('#minus').click(function() {
  var target = $('#pobranie-c1', this.parentNode)[0];
  if (target.value > 0) {
    target.value = +target.value - 1;
  }
});

var total1;
$('#pobranie-c2').change(function(){
}).trigger('change');

$('#plus1').click(function() {
  var target = $('#pobranie-c2', this.parentNode)[0];
  target.value = +target.value + 1;
});

$('#minus1').click(function() {
  var target = $('#pobranie-c2', this.parentNode)[0];
  if (target.value > 0) {
    target.value = +target.value - 1;
  }
});
</script>