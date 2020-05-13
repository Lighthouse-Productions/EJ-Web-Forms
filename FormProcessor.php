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
file_put_contents("G:\PleskVhosts\lhprod.com\httpdocs\ejimport.ewsm", $x); //Saves X as EWSM XML File - Absolute path specific to server
echo $x; //To be removed in the future or pushed forward to a crash/confirm landing page.
?>

<?php
//define the receiver of the email
$to = 'nickw@lhprod.com';
//define the subject of the email
$subject = 'Test email with attachment';
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
$attachment = chunk_split(base64_encode(file_get_contents('ejimport.ewsm')));
//define the body of the message.
ob_start(); //Turn on output buffering
?>
--PHP-mixed-<?php echo $random_hash; ?>
Content-Type: multipart/alternative; boundary="PHP-alt-<?php echo $random_hash; ?>"

--PHP-alt-<?php echo $random_hash; ?>
Content-Type: text/plain; charset="iso-8859-1"
Content-Transfer-Encoding: 7bit

Hello World!!!
This is simple text email message.

--PHP-alt-<?php echo $random_hash; ?>
Content-Type: text/html; charset="iso-8859-1"
Content-Transfer-Encoding: 7bit

<h2>Hello World!</h2>
<p>This is something with <b>HTML</b> formatting.</p>

--PHP-alt-<?php echo $random_hash; ?>--

--PHP-mixed-<?php echo $random_hash; ?>
Content-Type: application/zip; name="attachment.zip"
Content-Transfer-Encoding: base64
Content-Disposition: attachment

<?php echo $attachment; ?>
--PHP-mixed-<?php echo $random_hash; ?>--

<?php
//copy current buffer contents into $message variable and delete current output buffer
$message = ob_get_clean();
//send the email
$mail_sent = @mail( $to, $subject, $message, $headers );
//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed"
echo $mail_sent ? "Mail sent" : "Mail failed";
?>
