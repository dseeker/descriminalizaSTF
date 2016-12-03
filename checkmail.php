
<?php



	$to= 'saopaulo@marchadamaconha.org';
    $from =  "Teste <test@marchadamaconha.org>";
    $subject = "Teste pede #DescriminalizaSTF";

    $headers = "MIME-Version: 1.0\r\n";
    $headers  .= "From: $from\r\n";
    $headers .= "Cc: $from\r\n";
	$headers .= "Bcc: test@marchadamaconha.org\r\n";

$headers .= "Content-type: text/html; charset=iso-8859-1\n";
$headers .= "X-Mailer: PHP Mail";
    $m = mail($to, $subject, $letter, $headers);

	if ($m>=0) echo "Mensagem Enviada! ".$m;
	else echo "error ".$m;
	
	
?> 


