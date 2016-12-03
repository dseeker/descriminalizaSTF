
<?php


if (isset($_POST['name'])) $name = utf8_decode($_POST['name']);
if (isset($_POST['email'])) $email = $_POST['email'];
if (isset($_POST['letter'])) $letter = nl2br(utf8_decode($_POST['letter']));
if (isset($_POST['lat'])) $lat = utf8_decode($_POST['lat']);
if (isset($_POST['lon'])) $lon = utf8_decode($_POST['lon']);
if (isset($_POST['location'])) $location = utf8_decode($_POST['location']);


if (isset($_GET['name'])) $name = utf8_decode($_GET['name']);
if (isset($_GET['email'])) $email = $_GET['email'];
if (isset($_GET['letter'])) $letter = nl2br(utf8_decode($_GET['letter']));
if (isset($_GET['lat'])) $lat = utf8_decode($_GET['lat']);
if (isset($_GET['lon'])) $lon = utf8_decode($_GET['lon']);
if (isset($_GET['location'])) $location = utf8_decode($_GET['location']);

//echo $lat.$lon;
//return;

file_put_contents('map/'. rand(0, 1000).','.$lat.','.$lon, '');
$userSent = file_exists('cadastros/'.$email);
if ($userSent) {
	echo "Este email ja foi utilizado";
	return;
}

file_put_contents('cadastros/'.$email,($name.','.$location));

$letter .= '<br><br>Atenciosamente,<br>'.$name.'<br><br><i>Enviado do site http://marchadamaconha.org/descriminalizastf</i>';

//echo '<pre>',print_r($letter),'</pre>';

// read the list of emails from the file.
//$email_list = 

//echo $name.' '.$email.' '.$to.'<br />'.$letter;


    //change this to your email.
    //$to =  $name." <".$email.">";
	$to= str_replace("\n","",file_get_contents("emails.txt"));
    $from =  $name." <".$email.">";
    $subject = $name." pede #DescriminalizaSTF";

    //begin of HTML message
	//$qrurl = urlencode('http://kulturstudio.com/clientes/passport/ingressovjuni/ingressos/'.$email.'.html');



   //end of message

    // To send the HTML mail we need to set the Content-type header.
    $headers = "MIME-Version: 1.0\r\n";
//    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers  .= "From: $from\r\n";
    $headers .= "Cc: $from\r\n";
	$headers .= "Bcc: saopaulo@marchadamaconha.org\r\n";

$headers .= "Content-type: text/html; charset=iso-8859-1\n";
//$headers .= "Reply-To: me <me@mysite.com>\n";
//$headers .= "X-Priority: 1\n";
//$headers .= "X-MSMail-Priority: High\n";
$headers .= "X-Mailer: PHP Mail";
	
    //options to send to cc+bcc

    //$headers .= "Bcc: [email]email@maaking.cXom[/email]";
    
    // now lets send the email.
    $m = mail($to, $subject, $letter, $headers);

	if ($m>=0) echo "Mensagem Enviada!";
	else echo "error ".$m;
	
	
?> 


