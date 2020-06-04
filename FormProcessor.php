<?php
$y = "";
foreach($_POST as $key => $value)
{
  $y .= $key . ": " . $value . "\r\n";
}
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
$x.=$y; //Full text of the submitted form

//EVERYTHING BELOW THIS NEEDS A BIG FIX
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
          <IdStockType><![CDATA[';// EVERYTHING ABOVE THIS NEEDS A BIG FIX
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

// Loop through all fields submitted, put field name and response on same line, then newline and and repeat
$to = 'nickw@lhprod.com, '.$_POST["Email"];
$subject = $_POST["ProjectName"].' Project Request Recieved by LHP';
$mail_sent = @mail( $to, $subject, "The following information has been recieved by Lighthouse Productions.  We will get back to you shortly:\r\n\r\n".$y );
//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed"
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-152577184-2">
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-152577184-2');
</script>
<!-- Start of HubSpot Embed Code -->
  <script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/7217183.js"></script>
<!-- End of HubSpot Embed Code -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="rollover.js" type="text/javascript"></script>
<script type="text/javascript" src="fadeslideshow.js">


/***********************************************
* Ultimate Fade In Slideshow v2.0- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more
***********************************************/

</script>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<script type="text/javascript">

var mygallery=new fadeSlideShow({
	wrapperid: "fadeshow1", //ID of blank DIV on page to house Slideshow
	dimensions: [1024, 300], //width/height of gallery in pixels. Should reflect dimensions of largest image
	imagearray: [
		["slideshow/slider1.png", "", "", ""],//First Quotes contain image path. Second quotes contain link, Third quotes contain _new. Fourth quotes contain text bottom of image
		["slideshow/audioslider2.png", "", "", ""],
		["slideshow/audioslider3.png", "", "", ""],
		["slideshow/audioslider4.png", "", "", ""],
		["slideshow/audioslider5.png", "", "", ""],
		["slideshow/audioslider6.png", "", "", ""] //<--no trailing comma after very last image element!
		],
	displaymode: {type:'auto', pause:4000, cycles:0, wraparound:false},
	persist: false, //remember last viewed slide and recall within same session?
	fadeduration: 750, //transition duration (milliseconds)
	descreveal: "ondemand",
	togglerid: ""
})

</script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Lighthouse Productions Green Bay WI</title>
<link rel="stylesheet" type="text/css" href="_css/style.css"/>

<style type="text/css">
<!--
h1 {
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size: 16px;
	color: #03F;
}

-->
    .cse .gsc-control-cse,
    .gsc-control-cse {
      background-color:transparent !important;
    }

</style>


<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="wrapper">

<div id="header-cont">
<div id="header">
<div id="left_header"><img src="_images/header.png" width="1024" height="110" alt="header image" /></div><!--left header div ending-->
<div id="right_header">
<script>
  (function() {
    var cx = '017425393430892945240:i-zf-ps4tks';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:search></gcse:search>
    </div> <!--right header div ending-->
    </div> <!-- header div end -->

<div id="navigation">
  <ul id="MenuBar1" class="MenuBarHorizontal">
    <li class="MenuBarHorizontal"><a href="index.html">Home</a></li>
    <li><a class="MenuBarItemSubmenu" href="audiosystems.html">Audio</a>
      <ul>
        <li><a href="pasystems.html">PA Systems</a></li>
        <li><a href="audioconsoles.html">Consoles</a></li>
        <li><a href="wireless.html">Wireless</a></li>
      </ul>
    </li>
    <li><a class="MenuBarItemSubmenu" href="lightingsystems.html">Lighting</a>
      <ul>
        <li><a href="lightingconsoles.html">Consoles</a></li>
        <li><a href="movinglights.html">Intelligent Lighting</a></li>
        <li><a href="conventionallighting.html">Conventional Lighting</a></li>
        <li><a href="spotlights.html">Spot Lights</a></li>
        <li><a href="specialfx.html">Special FX</a></li>
        <li><a href="etctraining.html">Console Training</a></li>
      </ul>
  </li>
        <li><a href="video.html">Video</a></li>
        <li><a class="MenuBarItemSubmenu" href="roofsystems.html">Roof Systems</a>
      <ul>
        <li><a href="_images/Tomcat_Roof.pdf">Tomcat Roof</a></li>
        <li><a href="_images/Applied_Roof.pdf">Applied Roof</a></li>
        <li><a href="_images/Blue_Stage.pdf">Blue Stage</a></li>
      </ul>
    </li>
        <li><a class="MenuBarItemSubmenu" href="installs.html">Installations</a>
    </li>
        <li><a href="service.html">Service</a></li>
        <li><a href="gallery.html">Gallery</a></li>
        <li><a href="contact.html">Contact Us</a></li>
  </ul>
</div> <!-- navigation div end -->
</div>  <!-- header-cont div end -->

<div id="fadeshow1"></div> <!-- fadeshow1 div end -->
<div id="content2">
<div id="full_content" align="center">
<? echo $mail_sent ? "Mail sent" : "Mail failed";//PHP Pass Fail ?>
</div></div></div>
  </body>
</html>
