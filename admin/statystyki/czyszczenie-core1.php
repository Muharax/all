<?php 
// =====================================================================
function PP($poj){
	require('../../database/db-connect.php');
	
	$query = 'SELECT SUM(ilosc) as TOTAL FROM `strefa-czyszczenia-wyczyszczone` WHERE `nazwa` = :ss';
	$zadanie= $db_PDO->prepare($query);
	$zadanie->execute(array(':ss' => $poj));
	$wiersz = $zadanie->fetch(PDO::FETCH_NUM);
	$total = $wiersz[0];
	return $total;
}
// =====================================================================
function graph_pie2(){
	echo '[';
		require('../../database/db-connect.php');
		
		$query = 'SELECT `pojemnik` FROM `pojemniki`';
		$zadanie= $db_PDO->prepare($query);
		$zadanie->execute();
		$ile_znalezionych = $zadanie->rowCount();
		for ($i=0; $i < $ile_znalezionych; $i++)
				{
						$wiersz = $zadanie->fetch();
						echo '["'.$wiersz['pojemnik'].'", '.PP($wiersz['pojemnik']).'],';
				}
	echo ']';	
}
// =====================================================================
?>
<div class="statystyki-core-y">
<h3>OSTATNIE 10 POZYCJI</h3>

<!-- =================================== GRAPH DATA======================================= -->
<?php echo graph_pie2()?>
<br>
	<div id="chart3"></div>
<br>

	

<!-- =============================================================================== -->

<?php 

	require('../../database/db-connect.php');
	$zadanie_AA = $db_PDO->prepare('SELECT * FROM `strefa-czyszczenia-wyczyszczone` ORDER BY `data` DESC LIMIT 10');
	$zadanie_AA->execute();
	$ile_znalezionych = $zadanie_AA->rowCount();

	echo '<table class="tabela-czyszczenia">';
		echo '<tr>';
		echo '<thead>';
			echo '<th>NAZWA</th>';
			echo '<th>SUMA, POJ, POD</th>';
			echo '<th>DATA</th>';
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
		
		
	for ($i=0; $i < $ile_znalezionych; $i++){
			$wiersz_AA = $zadanie_AA->fetch();
		echo '<tr>';			
			echo '<td>' . $wiersz_AA['nazwa'] . '</td>';
			echo '<td title="SUMA POJEMNIKÓW (POJEMNIKI W SZT. / PODWODZIA W SZT.)">' . $wiersz_AA['ilosc'].' szt. ('.$wiersz_AA['ilosc_poj'].', '.$wiersz_AA['ilosc_pod'].')</td>';
			echo '<td title="DATA CZYSCZENIA - DATA DODANIA DO SYSTEM">' . $wiersz_AA['data'] . '</td>';
		echo '</tr>';
		}

		echo '</tbody>';
		echo '</table>';
		
// ===========================================================================
// ===========================================================================	
require('../../database/db-connect.php');
$b = "SELECT * FROM `strefa-czyszczenia-wyczyszczone` ORDER BY `data` DESC LIMIT 1";
$zadanieb = $db_PDO->query($b);
$wierszb = $zadanieb->fetch();


$date 				= $wierszb['data'];
$time_original 		= strtotime($date);
$time_add      		= $time_original - (3600*2);
$new_date      		= date("Y-m-d H:i:s", $time_add);

echo $date;
echo '<br>';
echo $new_date;


// ===========================================================================
// ===========================================================================
function graph_line(){
	echo '[';
		require('../../database/db-connect.php');
		$lim = 10;
		$a = "SELECT * FROM `strefa-czyszczenia-wyczyszczone` ORDER BY `data` DESC LIMIT 10";
		
		// $a = "SELECT * FROM `strefa-czyszczenia-wyczyszczone` WHERE `nazwa` = 'M9' ORDER BY `data` ASC LIMIT 10";
		$zadanie = $db_PDO->query($a);
		$ile_znalezionych = $zadanie->rowCount();
		for ($i=0; $i < $ile_znalezionych; $i++)
				{
						$wiersz = $zadanie->fetch();
						echo '["'.$wiersz['data'].'", '.$wiersz['ilosc'].'],';

				}
	echo ']';	
}
// ===========================================================================
// ===========================================================================
function graph_booble(){
	echo '[';
		require('../../database/db-connect.php');
		$lim = 10;
		$a = "SELECT * FROM `strefa-czyszczenia-wyczyszczone` ORDER BY `data` DESC LIMIT 10";
				$zadanie = $db_PDO->query($a);
		$ile_znalezionych = $zadanie->rowCount();
		for ($i=0; $i < $ile_znalezionych; $i++)
				{
						$IL = 20;
						$wiersz = $zadanie->fetch();
						echo '['.$wiersz['ilosc'].', '.$wiersz['ilosc'].', '.$wiersz['ilosc'].', "'.$wiersz['nazwa'].'"],';

				}
	echo ']';	
}
// ===========================================================================
// ===========================================================================
function graph_pie(){
	echo '[';
		require('../../database/db-connect.php');
		$lim = 10;
		$a = "SELECT * FROM `strefa-czyszczenia-wyczyszczone` ORDER BY `data` DESC LIMIT 10";
		$zadanie = $db_PDO->query($a);
		$ile_znalezionych = $zadanie->rowCount();
		for ($i=0; $i < $ile_znalezionych; $i++)
				{
						$IL = 20;
						$wiersz = $zadanie->fetch();
						echo '["'.$wiersz['nazwa'].'", '.$wiersz['ilosc'].'],';
				}
	echo ']';	
}







?>


<div id="chart1"></div>
<div id="chart2"></div>



<script>
// ===========================================================================
// ===========================================================================
$(document).ready(function(){
  var line1=<?php graph_line();?>;
  var plot2 = $.jqplot('chart1', [line1], {
        title:'OSTATNIE 10 CZYSZCZEŃ',
        legend: {
            show: true,
            placement: 'outsideGrid'
        }, 

    axesDefaults: {
        tickRenderer: $.jqplot.CanvasAxisTickRenderer,
        tickOptions: {
            angle: -45,
            fontSize: '10pt',
        }
    },   
      axes:{
        xaxis:{
          renderer:$.jqplot.DateAxisRenderer,
          tickOptions:{formatString:'%Y-%m-%d %H:%M:%S'},
          // min:'<?php echo $new_date?>'
          // tickInterval:'20 minutes'
        }
      },
      series:[{lineWidth:2, markerOptions:{style:'square'}}]
  });
});
// ===========================================================================
// ===========================================================================
$(document).ready(function(){
 
    var arr = <?php graph_booble();?>;
     
    plot2 = $.jqplot('chart2',[arr],{
        title: 'ABRAKDA',
        seriesDefaults:{
            renderer: $.jqplot.BubbleRenderer,
            rendererOptions: {
                bubbleGradients: true
            },
            shadow: true
        }
    });
     
});
// ===========================================================================
// ===========================================================================
$(document).ready(function(){
  var data = <?php graph_pie2();?>;
  var plot1 = jQuery.jqplot ('chart3', [data], 
    { 
      seriesDefaults: {
        // Make this a pie chart.
        renderer: jQuery.jqplot.PieRenderer, 
        rendererOptions: {
          // Put data labels on the pie slices.
          // By default, labels show the percentage of the slice.
          showDataLabels: true
        }
      }, 
      legend: { show:true, location: 'e' }
    }
  );
});




</script>
