<?php 
	require('../../session.php');
	require('../../header.php');
	require('../../logo.php');
?>

 <script type="text/javascript">
            function show1(){
			
			if(document.getElementById('menu1').style.display == 'block'){
				
                document.getElementById('menu1').style.display = 'none';
				
			}else{
				
				document.getElementById('menu1').style.display = 'block';
				
			}
                
           
			}
        </script>
   <div id="index">
  <div class="MainMenu">
		
			<a href="../hala-b.php#">
				<button class="ma-btn">BACK</button></a>
				
				<a href="<?php echo URL;?>strefa-czyszczenia/strefa-czyszczenia-index.php">
				<button class="ma-btn">INVENT</button></a>
	</div>
		
<div id="container-ma">

	<center>ZASILANIE</center>
	<div class="tablica">XXXXXX
	rgh
	dfgh
	dfghghdf
	gc_collect_cyclesdfg
	dfghghdfdfg
	dfghdf
	gdf
	X</div>
	<table class="mag-auto">
		<tr>
			<td class="mag-auto-td">
					<table class="mag-auto-w">
						<tr>
							<td class="ma-td">DOK 1</td>
						</tr>
							<form action="core/magazyn-automatyczny-edytuj.php" method="POST">
							<input type="hidden" value="0000 2000 5000 504" name="kod">
						<tr>
							
							<td class="ma-td"><button name="wysylka">Wysyłka</button></td>
							<td class="ma-td"><button>Edycja</button></td>
							
						</tr>
						<tr>
							<td class="ma-td">KOD:</td>
							<td class="ma-td">0000 2000 5000 504</td>
						
						</tr>
						<tr>
							<td class="ma-td">STAN:</td>
							<td class="ma-td">5/47 poj</td>
							
						</tr>
						<tr>
							<td class="ma-td">ILOŚĆ:</td>
							<td class="ma-td">179/1254 KPL</td>
							
						</tr>
						<tr>
							<td colspan="2" class="ma-td"><progress value="179" max="1257"></progress></td>
							
						</tr>
						</form>
				</table>
	
			</td>
			<td class="mag-auto-td">
						<table class="mag-auto-w">
									<tr>
										<td class="ma-td">DOK 2</td>
									</tr>
									<tr>
										<td class="ma-td"><button>Wysyłka</button></td>
										<td class="ma-td"><button>Edycja</button></td>
										<td class="ma-td"><div id="menu"/><a href="#" onclick="show1()">Menu</a></div></td>
									</tr>
									<tr>
										<td class="ma-td">KOD:</td>
										<td class="ma-td">0000 2000 5000 504</td>
									</tr>
									<tr>
										<td class="ma-td">STAN:</td>
										<td class="ma-td">5 poj</td>
									</tr>
									<tr>
										<td class="ma-td">ILOŚĆ:</td>
										<td class="ma-td">179 KPL</td>
									</tr>
							</table>
			</td>
			<td class="mag-auto-td">
			<table class="mag-auto-w">
						<tr>
							<td class="ma-td">DOK 3</td>
						</tr>
						<tr>
							<td class="ma-td"><button>Wysyłka</button></td>
							<td class="ma-td"><button>Edycja</button></td>
							<td class="ma-td"><button>DODAJ</button></td>
						</tr>
						<tr>
							<td class="ma-td">KOD:</td>
							<td class="ma-td">0000 2000 5000 504</td>
						</tr>
						<tr>
							<td class="ma-td">STAN:</td>
							<td class="ma-td">5 poj</td>
						</tr>
						<tr>
							<td class="ma-td">ILOŚĆ:</td>
							<td class="ma-td">179 KPL</td>
						</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td class="mag-auto-td">
			<table class="mag-auto-w">
						<tr>
							<td class="ma-td">DOK 4</td>
						</tr>
						<tr>
							<td class="ma-td"><button>Wysyłka</button></td>
							<td class="ma-td"><button>Edycja</button></td>
							<td class="ma-td"><button>DODAJ</button></td>
						</tr>
						<tr>
							<td class="ma-td">KOD:</td>
							<td class="ma-td">0000 2000 5000 504</td>
						</tr>
						<tr>
							<td class="ma-td">STAN:</td>
							<td class="ma-td">5 poj</td>
						</tr>
						<tr>
							<td class="ma-td">ILOŚĆ:</td>
							<td class="ma-td">179 KPL</td>
						</tr>
				</table>
			</td>
			<td class="mag-auto-td">
			<table class="mag-auto-w">
						<tr>
							<td class="ma-td">DOK 5</td>
						</tr>
						<tr>
							<td class="ma-td"><button>Wysyłka</button></td>
							<td class="ma-td"><button>Edycja</button></td>
							<td class="ma-td"><button>DODAJ</button></td>
						</tr>
						<tr>
							<td class="ma-td">KOD:</td>
							<td class="ma-td">0000 2000 5000 504</td>
						</tr>
						<tr>
							<td class="ma-td">STAN:</td>
							<td class="ma-td">5 poj</td>
						</tr>
						<tr>
							<td class="ma-td">ILOŚĆ:</td>
							<td class="ma-td">179 KPL</td>
						</tr>
				</table>
			</td>
			<td class="mag-auto-td">
			<table class="mag-auto-w">
						<tr>
							<td class="ma-td">DOK 6</td>
						</tr>
						<tr>
							<td class="ma-td"><button>Wysyłka</button></td>
							<td class="ma-td"><button>Edycja</button></td>
							<td class="ma-td"><button>DODAJ</button></td>
						</tr>
						<tr>
							<td class="ma-td">KOD:</td>
							<td class="ma-td">0000 2000 5000 504</td>
						</tr>
						<tr>
							<td class="ma-td">STAN:</td>
							<td class="ma-td">5 poj</td>
						</tr>
						<tr>
							<td class="ma-td">ILOŚĆ:</td>
							<td class="ma-td">179 KPL</td>
						</tr>
				</table></td>
		</tr>
	</table>

			
			<div id="menu1" style="display:none;">
			<a href="?opc=ale">WYSYŁKA</a>
			<hr>
			<a href="#">EDYCJA</a>
			<hr>
			
			<a href="#">ZAPYTANIE</a>
			<hr>
			<hr>
			<a href="#">ZMIANA LOKALIZACJI</a>
			<hr>
			</div>
			</div>
			
</div>
</div>























<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
  </script>
  
  
  
  
  
	<div id="tabs">
  <ul>
    <li><a href="#tabs-1">1</a></li>
    <li><a href="#tabs-2">2</a></li>
    <li><a href="#tabs-3">3</a></li>
	<li><a href="#tabs-4">4</a></li>
	<li><a href="#tabs-5">5</a></li>
	<li><a href="#tabs-6">6</a></li>
  </ul>
  <div id="tabs-1">
  
   <table class="mag-auto">
		<tr>
			<td class="mag-auto-td">
					<table class="mag-auto-w">
						<tr>
							<td class="ma-td">DOK 1</td>
						</tr>
							<form action="core/magazyn-automatyczny-edytuj.php" method="POST">
							<input type="hidden" value="0000 2000 5000 504" name="kod">
						<tr>
							
							<td class="ma-td"><button name="wysylka">Wysyłka</button></td>
							<td class="ma-td"><button>Edycja</button></td>
							
						</tr>
						<tr>
							<td class="ma-td">KOD:</td>
							<td class="ma-td">0000 2000 5000 504</td>
						
						</tr>
						<tr>
							<td class="ma-td">STAN:</td>
							<td class="ma-td">5/47 poj</td>
							
						</tr>
						<tr>
							<td class="ma-td">ILOŚĆ:</td>
							<td class="ma-td">179/1254 KPL</td>
							
						</tr>
						<tr>
							<td colspan="2" class="ma-td"><progress value="179" max="1257"></progress></td>
							
						</tr>
						</form>
				</table>
				
  </div>
  <div id="tabs-2">
  
   <table class="mag-auto">
		<tr>
			<td class="mag-auto-td">
					<table class="mag-auto-w">
						<tr>
							<td class="ma-td">DOK 1</td>
						</tr>
							<form action="core/magazyn-automatyczny-edytuj.php" method="POST">
							<input type="hidden" value="0000 2000 5000 504" name="kod">
						<tr>
							
							<td class="ma-td"><button name="wysylka">Wysyłka</button></td>
							<td class="ma-td"><button>Edycja</button></td>
							
						</tr>
						<tr>
							<td class="ma-td">KOD:</td>
							<td class="ma-td">0000 2000 5000 504</td>
						
						</tr>
						<tr>
							<td class="ma-td">STAN:</td>
							<td class="ma-td">5/47 poj</td>
							
						</tr>
						<tr>
							<td class="ma-td">ILOŚĆ:</td>
							<td class="ma-td">179/1254 KPL</td>
							
						</tr>
						<tr>
							<td colspan="2" class="ma-td"><progress value="179" max="1257"></progress></td>
							
						</tr>
						</form>
				</table>
  </div>
  
  <div id="tabs-3">
    <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
    <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
  </div>
   <div id="tabs-4">
    <p>4</p>
   </div>
    <div id="tabs-5">
    <p>5</p>
   </div>
    <div id="tabs-6">
    <p>6</p>
   </div>
</div>
 