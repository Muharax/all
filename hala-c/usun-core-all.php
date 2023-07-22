<?php 
require_once '../funkcje.php';
$USUN = new USUN;
	
	
if(isset($_POST['z1'])){
	$z1 = $_POST['z1'];
	
	foreach ($z1 as $row) {
		$USUN->HC($row);
	}
	print_r($_POST['z1']);
	echo '
	
	<div class="error1">Usunięto poprawnie</div>
	
	
	';
	exit;
}else{
	echo 'NOT ISSET';
	exit;
}


// $z1 = json_encode($_POST['z1'], TRUE);
// $z1 = explode(",", $_POST['z1']);

// foreach ($z1 as $key => $value) {
    // $arr[3] will be updated with each value from $arr...
    // echo $key => $value;
    // print_r($z1);
    // echo $z1;
// }
// $z1 = explode(",", $_POST['z1']);

	// $z1 = json_encode($_POST['z1'], TRUE);
	
	// $z1 = json_decode(stripslashes($_POST['z1']));

  // foreach($z1 as $d){
     // echo $d;
  // }

	
	
    // print_r($z1);
	
	
	echo 'Usunięto poprawnie';
	exit;
	
?>