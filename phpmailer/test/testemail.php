<?php
/**
* Simple example script using PHPMailer with exceptions enabled
* @package phpmailer
* @version $Id$
*/

require '../class.phpmailer.php';

try {
	$mail = new PHPMailer(true); //New instance, with exceptions enabled

	$body             = file_get_contents('contents.html');
	$body             = preg_replace('/\\\\/','', $body); //Strip backslashes

	$mail->IsSMTP();                           // tell the class to use SMTP
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
//	$mail->Port       = 25;                    // set the SMTP server port
//	$mail->Host       = "mail.yourdomain.com"; // SMTP server
	$mail->Username   = "koreylive@gmail.com";     // SMTP server username
	$mail->Password   = "google0101";            // SMTP server password
	
	$mail->SMTPSecure = "ssl";  
    $mail->Host       = "smtp.gmail.com"; 
    $mail->Port       = 465;

//	$mail->IsSendmail();  // tell the class to use Sendmail

//	$mail->AddReplyTo("daniel_siq@hotmail.com","Daniel");

	$mail->From       = "daniel_siq@hotmail.com";
	$mail->FromName   = "Danny";

	$to = "daniel@debatevisual.com";

	$mail->AddAddress($to);

	$mail->Subject  = "First PHPMailer Message";

	$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
	$mail->WordWrap   = 80; // set word wrap

	$mail->MsgHTML($body);

	$mail->IsHTML(true); // send as HTML

	$mail->Send();
	echo 'Message has been sent.';
} catch (phpmailerException $e) {
	echo $e->errorMessage();
}
?>