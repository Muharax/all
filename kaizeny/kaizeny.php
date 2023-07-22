<?php 
	require('../session.php');
	require('../header.php');
	require('../logo.php');
?>

<body>
<div id="market">
<div id="menu-glowne">

<div class="sss"></div>
<a href="dodaj-kaizena.php"><div class="ss">DODAJ KAIZENA</div></a>
<a href="<?php echo URL;?>index.php"><div class="ss">WYJDŹ</div></a>

</div>

<div class="market-dane">
<?php
					if(!isset($_GET['link'])){
					include 'kaizeny-home.php';
					}
					
					if(array_key_exists('link',$_GET)){
					$module = $_GET ['link'];
					
					
					$moduleDIR = $module . '.php';
				
					
					
					
		switch($module){
		case "kaizeny-home":
			include($moduleDIR);
		break;
		case "market-stan-detali":
			include($moduleDIR);
		break;
		case "market-zwroty":
			include($moduleDIR);
		break;
		
				}
				}
?>
</div>
</body>