<?php $x='<?xml version="1.0" encoding="utf-8"?>
<root>
  <ShopOrder Version="1.0.0">
    <Header>
      <OrderId><![CDATA[998]]></OrderId>
      <CryptCode><![CDATA[]]></CryptCode>
      <Address>
        <Addressnumber><![CDATA[]]></Addressnumber>
        <Name1><![CDATA[';
$x.=$_POST["Name1"];
$x.=']]></Name1>
        <Firstname><![CDATA[';
$x.=$_POST["Firstname"];
$x.=']]></Firstname>
        <Lastname><![CDATA[';
$x.=$_POST["Lastname"];
$x.=']]></Lastname>
        <Street><![CDATA[';
$x.=$_POST["Street"];
$x.=']]></Street>
        <Line2><![CDATA[';
$x.=$_POST["Line2"];
$x.=']]></Line2>
        <Zip><![CDATA[';
$x.=$_POST["Zip"];
$x.=']]></Zip>
        <City><![CDATA[';
$x.=$_POST["City"];
$x.=']]></City>
        <Email><![CDATA[';
$x.=$_POST["Email"];
$x.=']]></Email>
        <Phone><![CDATA[';
$x.=$_POST["Phone"];
$x.=']]></Phone>
        <IdCountry><![CDATA[0]]></IdCountry>
        <State><![CDATA[';
$x.=$_POST["State"];
$x.=']]></State>
        <CountryCaption><![CDATA[US]]></CountryCaption>
      </Address>
      <ProjectName><![CDATA[';
$x.=$_POST["ProjectName"];
$x.=']]></ProjectName>
      <StartDate><![CDATA[';
$x.=$_POST["StartDate"];
$x.=']]></StartDate>
      <EndDate><![CDATA[';
$x.=$_POST["EndDate"];
$x.=']]></EndDate>
      <Comment><![CDATA[';
$x.=$_POST["Comment"];
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
$x.=$_POST["IdStockType"]; //5203 Event
$x.=']]></IdStockType>
          <Factor><![CDATA[';
$x.=$_POST["Factor"];
$x.=']]></Factor>
          <Price><![CDATA[';
$x.=$_POST["Price"];
$x.=']]></Price>
        </Item>
      </Items>
    </Body>
  </ShopOrder>
</root>';
echo $x; //To be removed in the future
file_put_contents("ejimport.ewsm", $x); //Saves X as EWSM XML File
?>
