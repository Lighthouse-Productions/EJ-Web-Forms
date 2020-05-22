<?php
// What follows is a long string concatenation of predetermined XML that is compliant with EJ, and inserts from POST data. I will comment the friendly name for each variable being included.
$x='<?xml version="1.0" encoding="utf-8"?>
<root>
  <ShopOrder Version="1.0.0">
    <Header>
      <OrderId><![CDATA[998]]></OrderId>
      <CryptCode><![CDATA[]]></CryptCode>
      <Address>
        <Addressnumber><![CDATA[]]></Addressnumber>
        <Name1><![CDATA[';
$x.=$_POST["Name1"]; //Client company name
$x.=']]></Name1>
        <Firstname><![CDATA[';
$x.=$_POST["Firstname"]; //Contact first name
$x.=']]></Firstname>
        <Lastname><![CDATA[';
$x.=$_POST["Lastname"]; //Contact last name
$x.=']]></Lastname>
        <Street><![CDATA[';
$x.=$_POST["Street"]; //Client address line 1
$x.=']]></Street>
        <Line2><![CDATA[';
$x.=$_POST["Line2"]; //Client address line 2
$x.=']]></Line2>
        <Zip><![CDATA[';
$x.=$_POST["Zip"]; //Client Zip code
$x.=']]></Zip>
        <City><![CDATA[';
$x.=$_POST["City"]; //Client city
$x.=']]></City>
        <Email><![CDATA[';
$x.=$_POST["Email"]; //Contact Email
$x.=']]></Email>
        <Phone><![CDATA[';
$x.=$_POST["Phone"]; //Contact Phone
$x.=']]></Phone>
        <IdCountry><![CDATA[0]]></IdCountry>
        <State><![CDATA[';
$x.=$_POST["State"]; //Client State
$x.=']]></State>
        <CountryCaption><![CDATA[US]]></CountryCaption>
      </Address>
      <ProjectName><![CDATA[';
$x.=$_POST["ProjectName"]; //Project Name
$x.=']]></ProjectName>
      <StartDate><![CDATA[';
$x.=$_POST["StartDate"]; //Project Start Date
$x.=']]></StartDate>
      <EndDate><![CDATA[';
$x.=$_POST["EndDate"]; //Project End Date
$x.=']]></EndDate>
      <Comment><![CDATA[';
$x.=$_POST["Comment"]; //Project Notes.  In the future, this may be multiple form fields that get concatenated together to make a more guided experience for the client.
$x.=']]></Comment>
      <Service.Delivery><![CDATA[False]]></Service.Delivery>
      <Service.Setup><![CDATA[False]]></Service.Setup>
      <IdStock><![CDATA[0]]></IdStock>
      <Service_FullService><![CDATA[False]]></Service_FullService>
      <IdUserManager><![CDATA[0]]></IdUserManager>
    </Header>
    <Body>
      <Items>
        <Item>
          <IdStockType><![CDATA[';
$x.=$_POST["IdStockType"]; //A number that represents an item to be added to the first job.  5203 is a fake item created to represent an Event request
$x.=']]></IdStockType>
          <Factor><![CDATA[';
$x.=$_POST["Factor"]; //Charge Days to be applied to the item
$x.=']]></Factor>
          <Price><![CDATA[';
$x.=$_POST["Price"]; // Price to charge for the item
$x.=']]></Price>
        </Item>
      </Items>
    </Body>
  </ShopOrder>
</root>';
//The following line saves the string created above as an EWSM file on the server.
file_put_contents('G:\PleskVhosts\lhprod.com\httpdocs\ejimport.ewsm', $x); //Saves X as EWSM XML File - Absolute path specific to server

$to = 'nickw@lhprod.com'; //
$subject = 'New Online Request';
$random_hash = md5(date('r', time()));
$attachment = chunk_split(base64_encode(file_get_contents('G:\PleskVhosts\lhprod.com\httpdocs\ejimport.ewsm')));
$message = $x;
$header = "From: webmaster@lhprod.com\r\n";
$header .= "Reply-To: webmaster@lhprod.com\r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-Type: multipart/mixed; boundary=\"".$random_hash."\"\r\n\r\n";
$header .= "This is a multi-part message in MIME format.\r\n";
$header .= "--".$random_hash."\r\n";
$header .= "Content-type:text/plain; charset=iso-8859-1\r\n";
$header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
$header .= $message."\r\n\r\n";
$header .= "--".$random_hash."\r\n";
$header .= "Content-Type: application/octet-stream; name=\""'G:\PleskVhosts\lhprod.com\httpdocs\ejimport.ewsm'"\"\r\n"; // use different content types here
$header .= "Content-Transfer-Encoding: base64\r\n";
$header .= "Content-Disposition: attachment; filename=\""'G:\PleskVhosts\lhprod.com\httpdocs\ejimport.ewsm'"\"\r\n\r\n";
$header .= $attachment."\r\n\r\n";
$header .= "--".$random_hash."--";

//send the email
$mail_sent = @mail( $to, $subject, $message, $header );
//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed"
echo $mail_sent ? "Mail sent" : "Mail failed";
?>
