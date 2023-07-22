<?php 

<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../../../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();
	$mail->SMTPDebug = 1; 	//Send using SMTP
    $mail->Host       = 'localhost';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = false;                                   //Enable SMTP authentication
    $mail->Username   = 'email1';                     //SMTP username
    $mail->Password   = '12345';                               //SMTP password
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 26;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('email1@localhost.com', 'Mailer');
    $mail->addAddress('adriangajda@o2.pl', 'Joe User');     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'SUKA BLAYT';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}








function __autoload($classname) {
    include strtolower($classname) . '.php';
	
//--------------------------------------------------------------------------------------------------------------------------
 } 
$test = new User('Test');


	function pkt() {
		require ('database/db.php');
		$d ='SELECT `pkt` FROM `users` WHERE id="' . $_SESSION['id'] . '"';
		$zadanie = $db_PDO->query($d);
		$wiersz = $zadanie->fetch();
		$_SESSION['pkt'] = $wiersz['pkt'];
		echo $_SESSION['pkt'];
	}	
	
	//--------------------------------------------------------------------------------------------------------------------------
	//--------------------------------------------------------------------------------------------------------------------------
	//--------------------------------------------------------------------------------------------------------------------------
	
	<?php
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = "John Doe\n";
fwrite($myfile, $txt);
$txt = "Jane Doe\n";
fwrite($myfile, $txt);
fclose($myfile);
?>

// ---------------------      ZAPIS DO PLIKU --------------------

<?php
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = "John Doe\r\n";
fwrite($myfile, $txt);
$txt = "Jane Doe\r\n";
fwrite($myfile, $txt);
$txt = "John Doe\r\n";
fwrite($myfile, $txt);
$txt = "Jane Doe\r\n";
fwrite($myfile, $txt);
$txt = "XXXXDoe'\r\n";
fwrite($myfile, $txt);
$txt = "Jane Doe\r\n";
fwrite($myfile, $txt);
$txt = "John Doe\r\n";
fwrite($myfile, $txt);
$txt = "Jane Doe\r\n";
fwrite($myfile, $txt);
fclose($myfile);
?>
// ---------------------      WYSYŁANIE EMAILA --------------------
<?php

   $header = "From: twoj@email.com \nContent-Type:".
             ' text/plain;charset="UTF-8"'.
             "\nContent-Transfer-Encoding: 8bit";
   $to = "adriangajda@o2.pl";
   $subject = "Wiadomość testowa";
   $message = "Witaj to wiadomość testowa";
   mail($to, $subject, $message, $header)
?>
	
	
	
	
	
	
	
	
	
	
