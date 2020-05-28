<?php
// Loop through all fields submitted, put field name and response on same line, then newline and and repeat
$message = "";
foreach($_POST as $key => $value)
{
    $message .= $key . ": " . $value.PHP_EOL;
}
echo $message;

//define the receiver of the email
$to = 'nickw@lhprod.com';
//define the subject of the email
$subject = 'New Online Request';
//create a boundary string. It must be unique
//so we use the MD5 algorithm to generate a random hash
$random_hash = md5(date('r', time()));
//define the headers we want passed. Note that they are separated with \r\n
$headers = "From: webmaster@lhprod.com\r\nReply-To: webmaster@lhprod.com";
//add boundary string and mime type specification
$headers .= "\r\nContent-Type: multipart/mixed; boundary=\"PHP-mixed-".$random_hash."\"";
//read the atachment file contents into a string,
//encode it with MIME base64,
//and split it into smaller chunks
$attachment = chunk_split(base64_encode(file_get_contents("G:\PleskVhosts\lhprod.com\httpdocs\ejimport.ewsm")));
//define the body of the message.
ob_start(); //Turn on output buffering

//copy current buffer contents into $message variable and delete current output buffer
//send the email
$mail_sent = @mail( $to, $subject, $message, $headers );
//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed"
echo $mail_sent ? "Mail sent" : "Mail failed";
?>
