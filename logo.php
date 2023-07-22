<div class="logo-out">
	<div class="logo">
		 
		<div class="logo-w1">
			<a id="baseindex" href="<?php echo URL;?>index.php">
				<img id="BHH" width="50px" height="40px" src="<?php echo URL;?>/img/skynet.png">
				<!-- <img width="50px" height="40px" src="/al/img/mm.png"> -->
			</a>
		</div>
		
		<div class="logo-w2">
			<!-- SKYNET.BETA -->
		</div>
		
	</div>
	
	
	
	<div id="dane">
		<?php	
		
		
		if(isset($_SESSION['zalogowany'])){
			if($_SESSION['ready'] === "ready" && $_SESSION['zalogowany'] === TRUE){
				echo '<div class="table_center">
					  <div class="drop-down">
						<div id="dropDown" class="drop-down__button">
	<span class="drop-down__name">' . $_SESSION['imie'] . ' ' . $_SESSION['nazwisko'] . '</span>
						</div>
						<div class="drop-down__menu-box">
						  <ul class="drop-down__menu">
							<li data-name="profile" class="drop-down__item">
								<a href="'.URL.'epersum/epersum-i.php">E-PERSUM</a>
							</li>
							
							<li data-name="dashboard" class="drop-down__item">
								<a href="'.URL.'user/profil.php" id="reset">PROFIL</a></li>
							';
							
							if($_SESSION['uprawnienia'] === 1 ){
							echo '<li data-name="dashboard" class="drop-down__item">
								<a href="'.URL.'admin/panel.php">Administracja</a></li>
								
								<li data-name="dashboard" class="drop-down__item">
								<a href="#" id="reset">RESET - MARKET</a></li>
								
								
								<li data-name="dashboard" class="drop-down__item">
								<a href="'.URL.'test/qr.php">QR - GENERATOR</a></li>
								
								<hr>
								<li data-name="dashboard" class="drop-down__item">
								<a href="'.URL.'zadania/zadania.php">Zadania</a></li>
								<hr>
								
								
								';
							}
							
							echo '<li data-name="activity" class="drop-down__item">
								<a href="#" id="lg-out"><button class="custom-btn btn-8"><span>LOGOUT</span></button></a></li>
						  </ul>
						</div>
					  </div>
					</div>';		
		}
		}
		?>
	</div>
	
	
	
	<div id="clear-both"></div>
</div>
