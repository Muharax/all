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
