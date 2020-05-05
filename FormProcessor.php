<?php echo
"<?xml version=\"1.0\" encoding=\"utf-8\"?>
<root>
  <ShopOrder Version=\"1.0.0\">
    <Header>
      <OrderId><![CDATA[998]]></OrderId>
      <CryptCode><![CDATA[]]></CryptCode>
      <Address>
        <Addressnumber><![CDATA[]]></Addressnumber>
        <Name1><![CDATA["?><?php echo $_POST["Name1"]; ?><?php echo"]]></Name1>
        <Firstname><![CDATA["?><?php echo $_POST["Firstname"]; ?><?php echo"]]></Firstname>
        <Lastname><![CDATA["?><?php echo $_POST["Lastname"]; ?><?php echo"]]></Lastname>
        <Street><![CDATA["?><?php echo $_POST["Street"]; ?><?php echo"]]></Street>
        <Line2><![CDATA["?><?php echo $_POST["Line2"]; ?><?php echo"]]></Line2>
        <Zip><![CDATA["?><?php echo $_POST["Zip"]; ?><?php echo"]]></Zip>
        <City><![CDATA["?><?php echo $_POST["City"]; ?><?php echo"]]></City>
        <Email><![CDATA["?><?php echo $_POST["Email"]; ?><?php echo"]]></Email>
        <Phone><![CDATA["?><?php echo $_POST["Phone"]; ?><?php echo"]]></Phone>
        <IdCountry><![CDATA[0]]></IdCountry>
        <State><![CDATA["?><?php echo $_POST["State"]; ?><?php echo"]]></State>
        <CountryCaption><![CDATA[US]]></CountryCaption>
      </Address>
      <ProjectName><![CDATA["?><?php echo $_POST["ProjectName"]; ?><?php echo"]]></ProjectName>
      <StartDate><![CDATA["?><?php echo $_POST["StartDate"]; ?><?php echo"]]></StartDate>
      <EndDate><![CDATA["?><?php echo $_POST["EndDate"]; ?><?php echo"]]></EndDate>
      <Comment><![CDATA["?><?php echo $_POST["Comment"]; ?><?php echo"]]></Comment>
      <Service.Delivery><![CDATA[False]]></Service.Delivery>
      <Service.Setup><![CDATA[False]]></Service.Setup>
      <IdStock><![CDATA[0]]></IdStock>
      <Service_FullService><![CDATA[False]]></Service_FullService>
      <IdUserManager><![CDATA[0]]></IdUserManager>
    </Header>
    <Body>
      <Items>
        <Item>
          <IdStockType><![CDATA["?><?php echo $_POST["IdStockType"]; ?><?php echo"]]></IdStockType>
          <Factor><![CDATA["?><?php echo $_POST["Factor"]; ?><?php echo"]]></Factor>
          <Price><![CDATA["?><?php echo $_POST["Price"]; ?><?php echo"]]></Price>
        </Item>
      </Items>
    </Body>
  </ShopOrder>
</root>"?>
