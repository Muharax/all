<?php

$file = $_POST['z1'];
$filename = '../logistyka/karty_pakowania/'.$file;


if (file_exists($filename)) {
    echo '1';
	exit;
} else {
    echo 'Nie ma takiej karty pakowania na Hali C, lub nie została jeszcze dodana<BR><BR>
	
	<button>Dodaj kartę</button>';
	exit;
}

?>