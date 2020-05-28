<?php
// Loop through all fields submitted, put field name and response on same line, then newline and and repeat
$message = "";
foreach($_POST as $key => $value)
{
  $message .= $key;
	$message .= ": ";
	$message .= $value.PHP_EOL;
}
echo $message;

//$to = 'nickw@lhprod.com'; //
//$subject = 'New Online Request';
//$random_hash = md5(date('r', time()));
//$header = "From: webmaster@lhprod.com\r\n";
//$header .= "Reply-To: webmaster@lhprod.com\r\n";
//$header .= "MIME-Version: 1.0\r\n";
//$header .= "Content-Type: multipart/mixed; boundary=\"".$random_hash."\"\r\n\r\n";
//$header .= "This is a multi-part message in MIME format.\r\n";
//$header .= "--".$random_hash."\r\n";
//$header .= "Content-type:text/plain; charset=iso-8859-1\r\n";
//$header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
//$header .= $message."\r\n\r\n";

//send the email
//$mail_sent = @mail( $to, $subject, $message, $header );
//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed"
//echo $mail_sent ? "Mail sent" : "Mail failed";
?>
