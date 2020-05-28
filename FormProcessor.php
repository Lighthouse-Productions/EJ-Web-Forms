<?php
// Loop through all fields submitted, put field name and response on same line, then newline and and repeat
$x = "";
foreach($_POST as $key => $value)
{
	$x .= $key . ": " . $value . "\r\n";
}

$to = 'shop@lhprod.com';
$subject = 'New Online '.$_POST["ServiceType"].' Request';
$mail_sent = @mail( $to, $subject, $x );
//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed"
echo $mail_sent ? "Mail sent" : "Mail failed";
?>
