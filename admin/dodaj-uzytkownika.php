<div id="PanelAdminA">

<legend class="form-control">Dodaje użytkownika do całego systemu</legend>

<form id="formularz">
	<div class="padding">
	<table class="tabela-dodaj-uzytkownika">
	
		<tr>
			<td>LOGIN:</td>
			<td>
				<input type="text" class="form-control" id="login-rej" name="login-rej" autocomplete="off" value="adehade">
				<small class="form-text"><div id="o1">-</div></small>
			</td>
		</tr>

		<tr>
			<td>HASŁO:</td>
			<td><input type="password" id="password1" name="pass1" class="form-control" min="6" max="20" autocomplete="off" value="zaqwsx">
			<small class="form-text"><div id="o2">-</div></small>
			</td>
			
		</tr>

		<tr>
			<td>HASŁO 2:</div></td>
			<td><input type="password" id="password2" name="pass2" class="form-control" min="6" max="20" autocomplete="off" value="zaqwsx">
			<small class="form-text"><div id="o3">-</div></small>
			</td>
			
		</tr>
		
		<tr>
			<td>Uprawnienia</td>
			<td>
				<select id="uprawnienia-rej" name="uprawnienia" class="form-control">
					
				  <option value="admin">Admin</option>
				  <option value="kierownik">Kierownik</option>
				  <option value="produkcja">Produkcja</option>
				  <option value="utr">Wózkowy</option>
				  <option value="admin">Admin</option>
					
				</select>
				<small class="form-text"><div id="o4">-</div></small>
				
			
			</td>
			
		</tr>
		
		<tr>
			<td>Imię</td>
			<td><input type="text"  class="form-control" id="login-imie" name="login-imie" autocomplete="off"value="Jacek">
			<small class="form-text"><div id="o5">-</div></small>
			</td>
			
		</tr>
		
		<tr>
			<td>Nazwisko</td>
			<td><input type="text"  class="form-control" id="login-nazwisko" autocomplete="off" value="Merali">
			<small class="form-text"><div id="o6">-</div></small></td>
			
		</tr>
		
		<tr>
			<td>E-mail</td>
			<td><input type="email" name="email" class="form-control" id="email" value="test@test.pl">
			<small class="form-text"><div id="o7">-</div></small>
			</td>
			
		</tr>
		
		<tr>
			<td>Phone</td>
			<td><input id="nr-tel" type="tel" class="form-control" value="555 555 555" 
					   onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"
						>
			<small class="form-text"><div id="o8">-</div></small></td>
							
		</tr>
		
	</table>
	</div>
	
	
		<div class="btn-cn">
		<button type="button" class="ssc" id="dodaj-uzytkownika-core" name="dodaj-uzytkownika">Dodaj uzytkownika</button>
		</div>
</form>

</div>
<div id="demo">

</div>
<script type="text/javascript">
$(document).off('click', '#dodaj-uzytkownika-core').on("click", '#dodaj-uzytkownika-core', function() {
	var t1 = $('#login-rej').val();
	var pass1 = $('#password1').val();
	var pass2 = $('#password2').val();
	var upr = $('#uprawnienia-rej').val();
	var imie = $('#login-imie').val();
	var nazwisko = $('#login-nazwisko').val();
	var email = $('#email').val();
	var tel = $('#nr-tel').val();


	if(t1.length < 5){
		$('#o1').html('<div class="NOK-RED">LOGIN MUSI ZAWIERAĆ MINIMUM 5 ZNAKÓW</div>');
		var x1=false;
	}else{
		$('#o1').html('<div class="OK-GREEN">OK</div>');
		var x1=true;
	}
	if(pass1.length >= 5){
		$('#o2').html('<div class="OK-GREEN">OK</div>');
		if(pass2.length >= 5){
			$('#o3').html('<div class="OK-GREEN">OK</div>');
			if(pass1 != pass2){
				$('#o3').html('<div class="NOK-RED">HASŁA MUSZĄ BYĆ TAKIE SAME</div>');
				
			}else{
				$('#o3').html('<div class="OK-GREEN">OK</div>');
				var x2 = true;
				}
		}
		}else{
		$('#o2').html('<div class="NOK-RED">HASŁO MUSI ZAWIERAĆ MINIMUM 5 ZNAKÓW</div>');
		$('#o3').html('<div class="NOK-RED">HASŁO MUSI ZAWIERAĆ MINIMUM 5 ZNAKÓW</div>');
		}

	
	if(upr === 'undefined'){
		$('#o4').html('<div class="NOK-RED">WYBIERZ UPRAWNIENIA DLA UZYTKOWNIKA</div>');
	}else{
		$('#o4').html('<div class="OK-GREEN">OK</div>');
		var x3 = true;
	}
	if(imie.length < 3){
		$('#o5').html('<div class="NOK-RED">Imię minimum 3 znaki</div>');
	}else{
		$('#o5').html('<div class="OK-GREEN">OK</div>');
		var x4 = true;
	}	
	if(nazwisko.length < 3){
		$('#o6').html('<div class="NOK-RED">Imię minimum 3 znaki</div>');
	}else{
		$('#o6').html('<div class="OK-GREEN">OK</div>');
		var x5 = true;
	}
	if(email.length < 3){
			$('#o7').html('<div class="NOK-RED">NOK</div>');
			}else{
			$('#o7').html('<div class="OK-GREEN">OK</div>');
			var x6 = true;
			}		
	if(tel.length < 3){
			$('#o8').html('<div class="NOK-RED">NOK</div>');
			}else{
			$('#o8').html('<div class="OK-GREEN">OK</div>');
			var x7 = true;
			}


	

	
	if(x1 && x2 && x3 && x4 && x5 && x6 && x7){
		
		$.ajax({
		type: "POST",
		url: "uzytkownicy/dodaj-uzytkownika-core.php",
		data: {"z1":t1,"z2":pass1,"z3":upr,"z4":imie,"z5":nazwisko,"z6":email,"z7":tel},
		dataType:'text',
		success: function(data){
			if(data == 'UŻYTKOWNIK JUŻ ISTNIEJE'){
				$('#o1').html('<div class="NOK-RED">UŻYTKOWNIK JUŻ ISTNIEJE</div>');
				$().msgpopup({
					text: ''+data+'',
					type: 'error'
			  });
			}else{
				$.alert({
					title: '<div class="error-title">UŻYTKOWNIK DODANY POPRAWNIE</div>',
					content: ''+data+'',
				});
				// $().msgpopup({
					// text: ''+data+'',
					// type: 'success'
				// });
				
				$(".market-dane").load('dodaj-uzytkownika.php');
			}
			
			
		}
		})
	}else{
		$().msgpopup({
				text: 'UZUPEŁNIJ DANE',
				type: 'info'
			  });
	}

});
 </script>





