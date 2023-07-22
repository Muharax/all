<?php   require_once('../session.php');
		require_once('../header.php');
		require_once('../logo.php');
?>


<form action="upload.php" method="POST" enctype="multipart/form-data">
         <input type="submit" value="Wyślij pliki"/>
            <input type="file" class="custom-file-input"  name="image[]" multiple="">
</form>



<div class="card-body">
   <h4 class="card-title">Pliki w trakcie wysyłania, nie zamykaj tego okna… <i class="fa fa-upload"></i></h4>
   <div class="progress m-t-20">
      <div class="progress-bar bg-success" style="width: 0%; height:15px;" role="progressbar">0%</div>
   </div>
</div>




// <script>

// $('form').submit(function(e){
     // e.preventDefault();
     // var formData = new FormData($(this)[0]);
// $.ajax({
      // xhr: function() {
         // var xhr = new window.XMLHttpRequest();
         // xhr.upload.addEventListener("progress", function(evt) {
             // if (evt.lengthComputable) {
                 // var percentComplete = evt.loaded / evt.total;
                 // var progressval = Math.round(percentComplete*100)+'%';
// $('.progress-bar').css('width', progressval); /* Animacja paska postępu */
// $('.progress-bar').text(progressval);  /* Zmiana tekstu z procentami */
             // }
        // }, false);
        // return xhr;
// },
     // url:"upload.php",
     // method:"POST",
     // data: formData,
     // contentType:false,
     // processData:false,
     // enctype: 'multipart/form-data',
     // success:function(output){
         // /* Instrukcje wykonywane po poprawnym załadowaniu */    
     // }
 // });
// });
// </script>




// <?php






// class User {
	// private $login;
	// private $pass;
	
	// public function e_login ($login){
		// $login = html_entity_decode($login);
		// return $login;
	// }
	// public function e_pass ($pass){
		// return $pass = htmlentities($pass);
	// }
	
	// public function e_empty ($login, $pass){
		// if(empty($login) || empty($pass)){
			// return '1';
		// }else{
			// return '2';
		// };
	// }
// }
// $login = '';
// $pass = 'A';
// $User = new User();
// echo $User->e_login ($login);
// echo $User->e_pass ($pass);
// echo $User->e_empty ($login, $pass);



// echo '<hr>';
// echo '<hr>';
// echo '<hr>';
// echo '<hr>';
// echo '<hr>';
// echo '<hr>';


















// $arr = array (
// '1' => 'AS', 
// '2' => '2', 
// '3' => '3');
    // print_r($arr);
	
	

// echo '<hr>';
// echo '<hr>';


// $phpEx = substr(strrchr(__FILE__, '.'), 1);

// echo $phpEx;


// echo '<script>alert("Good")</script>';



// $losowyString = substr(md5(microtime()), 0, 5);
// echo $losowyString;



// echo '<hr>';


// $category = "";



// switch($category) {
// case "news":
// echo "<p>What's happening around the world</p>";
// break;
// case "weather":
// echo "<p>Your weekly forecast</p>";
// break;
// case "sports":
// echo "<p>Latest sports highlights</p>";
// break;
// default:
// echo "<p>Welcome to my web site</p>";
// }


// echo '<hr>';


// $value = pow(5,4); // returns 125
// echo $value;

// echo '<hr>';

// printf("Five raised to the third power equals %d.", pow(5,3));

// echo '<hr>';
// echo $_SERVER['HTTP_HOST'];
// echo '<hr>';
// echo '<hr>';

// function CryptPass($Password) {
	// if (PHP_VERSION_ID < 50500) {
		// $Salt = base64_encode(mcrypt_create_iv(22, MCRYPT_DEV_URANDOM));
		// $Salt = str_replace('+', '.', $Salt);
		// $Hash = crypt($Password, '$2y$10$' . $Salt . '$');
	// } else {
		// $Hash = password_hash($Password, PASSWORD_DEFAULT);
	// }
	// return $Hash;
// }

// $PWW = 'ALE';
// echo CryptPass($PWW);
// echo '<hr>';
// echo '<hr>';
// echo '<hr>';


// $PaperSize['A4']['PageHeight'] = 297;
// $PaperSize['A4']['PageWidth'] = 210;

// echo $PaperSize;

// ?> 


<input type="checkbox" name="regulamin" require>