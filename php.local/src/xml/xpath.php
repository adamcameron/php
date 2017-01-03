<?php
$soap = <<<SOAP
<?xml version='1.0' ?>
<SOAP-ENV:Envelope xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:ns="urn:xtk:queryDef" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/">
    <SOAP-ENV:Body>
        <ExecuteQueryResponse xmlns="urn:xtk:queryDef" SOAP-ENV:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/">
            <pdomOutput xsi:type="ns:Element" SOAP-ENV:encodingStyle="http://xml.apache.org/xml-soap/literalxml">

                <HSWMetadata-collection>
                    <aaa></aaa>
                </HSWMetadata-collection>
            </pdomOutput>
        </ExecuteQueryResponse>
    </SOAP-ENV:Body>
</SOAP-ENV:Envelope>
SOAP;
/*$soap = <<<SOAP
<?xml version='1.0' ?>
<SOAP-ENV:Envelope xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:ns="urn:xtk:queryDef" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/">
    <SOAP-ENV:Body>
        <ExecuteQueryResponse xmlns="urn:xtk:queryDef" SOAP-ENV:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/">
            <pdomOutput xsi:type="ns:Element" SOAP-ENV:encodingStyle="http://xml.apache.org/xml-soap/literalxml">
                <recipient-collection>
                    <recipient blackList="0" blackListEmail="1" blackListFax="0" blackListMobile="0" blackListPhone="0" blackListPostalMail="0" customerId="23987513" email="test1@example.com" id="23987513" joiningDate="2015-12-02 09:14:13.000Z"/>
                    <recipient blackList="0" blackListEmail="1" blackListFax="0" blackListMobile="0" blackListPhone="0" blackListPostalMail="0" customerId="1630728" email="claire.sullivan@hostelworld.com" id="1630728" joiningDate=""/>
                    <recipient blackList="0" blackListEmail="1" blackListFax="0" blackListMobile="0" blackListPhone="0" blackListPostalMail="0" customerId="23977696" email="maxabbruzzese@gmail.com" id="23977696" joiningDate=""/>
                    <recipient blackList="0" blackListEmail="1" blackListFax="0" blackListMobile="0" blackListPhone="0" blackListPostalMail="0" customerId="23976567" email="bazi-kastriot@web.de" id="23976567" joiningDate="2015-07-31 15:48:00.000Z"/>
                    <recipient blackList="0" blackListEmail="1" blackListFax="0" blackListMobile="0" blackListPhone="0" blackListPostalMail="0" customerId="0" email="sungminahn1992@gmail.com" id="1335340" joiningDate=""/>
                    <recipient blackList="0" blackListEmail="1" blackListFax="0" blackListMobile="0" blackListPhone="0" blackListPostalMail="0" customerId="1630730" email="bryan.carroll@hostelworld.com" id="1630730" joiningDate=""/>
                    <recipient blackList="0" blackListEmail="1" blackListFax="0" blackListMobile="0" blackListPhone="0" blackListPostalMail="0" customerId="0" email="sungminahn1992@gmail.com" id="1335370" joiningDate=""/>
                    <recipient blackList="0" blackListEmail="1" blackListFax="0" blackListMobile="0" blackListPhone="0" blackListPostalMail="0" customerId="1630849" email="heather.thompson@hostelworld.com" id="1630849" joiningDate=""/>
                    <recipient blackList="0" blackListEmail="1" blackListFax="0" blackListMobile="0" blackListPhone="0" blackListPostalMail="0" customerId="1630989" email="heather.thompson@hostelworld.com" id="1630989" joiningDate=""/>
                    <recipient blackList="0" blackListEmail="1" blackListFax="0" blackListMobile="0" blackListPhone="0" blackListPostalMail="0" customerId="1630981" email="heather.thompson@hostelworld.com" id="1630981" joiningDate=""/>
                    <recipient blackList="0" blackListEmail="1" blackListFax="0" blackListMobile="0" blackListPhone="0" blackListPostalMail="0" customerId="23986939" email="mo@mooooooo.com" id="23986939" joiningDate=""/>
                    <recipient blackList="0" blackListEmail="1" blackListFax="0" blackListMobile="0" blackListPhone="0" blackListPostalMail="0" customerId="1630757" email="david.dwyer@hostelworld.com" id="1630757" joiningDate=""/>
                    <recipient blackList="0" blackListEmail="1" blackListFax="0" blackListMobile="0" blackListPhone="0" blackListPostalMail="0" customerId="1630847" email="david.dwyer@hostelworld.com" id="1630847" joiningDate=""/>
                    <recipient blackList="0" blackListEmail="1" blackListFax="0" blackListMobile="0" blackListPhone="0" blackListPostalMail="0" customerId="1630877" email="david.dwyer@hostelworld.com" id="1630877" joiningDate=""/>
                    <recipient blackList="0" blackListEmail="1" blackListFax="0" blackListMobile="0" blackListPhone="0" blackListPostalMail="0" customerId="1630907" email="david.dwyer@hostelworld.com" id="1630907" joiningDate=""/>
                    <recipient blackList="0" blackListEmail="1" blackListFax="0" blackListMobile="0" blackListPhone="0" blackListPostalMail="0" customerId="1630967" email="david.dwyer@hostelworld.com" id="1630967" joiningDate=""/>
                    <recipient blackList="0" blackListEmail="1" blackListFax="0" blackListMobile="0" blackListPhone="0" blackListPostalMail="0" customerId="1630991" email="david.dwyer@hostelworld.com" id="1630991" joiningDate=""/>
                    <recipient blackList="0" blackListEmail="1" blackListFax="0" blackListMobile="0" blackListPhone="0" blackListPostalMail="0" customerId="1630995" email="david.dwyer@hostelworld.com" id="1630995" joiningDate=""/>
                    <recipient blackList="0" blackListEmail="1" blackListFax="0" blackListMobile="0" blackListPhone="0" blackListPostalMail="0" customerId="1630992" email="claire.sullivan@hostelworld.com" id="1630992" joiningDate=""/>
                    <recipient blackList="0" blackListEmail="1" blackListFax="0" blackListMobile="0" blackListPhone="0" blackListPostalMail="0" customerId="1630968" email="claire.sullivan@hostelworld.com" id="1630968" joiningDate=""/>
                    <recipient blackList="0" blackListEmail="1" blackListFax="0" blackListMobile="0" blackListPhone="0" blackListPostalMail="0" customerId="1630984" email="claire.sullivan@hostelworld.com" id="1630984" joiningDate=""/>
                    <recipient blackList="0" blackListEmail="1" blackListFax="0" blackListMobile="0" blackListPhone="0" blackListPostalMail="0" customerId="1630974" email="bryan.carroll@hostelworld.com" id="1630974" joiningDate=""/>
                    <recipient blackList="0" blackListEmail="1" blackListFax="0" blackListMobile="0" blackListPhone="0" blackListPostalMail="0" customerId="1630970" email="bryan.carroll@hostelworld.com" id="1630970" joiningDate=""/>
                    <recipient blackList="0" blackListEmail="1" blackListFax="0" blackListMobile="0" blackListPhone="0" blackListPostalMail="0" customerId="1631001" email="heather.thompson@hostelworld.com" id="1631001" joiningDate=""/>
                    <recipient blackList="0" blackListEmail="1" blackListFax="0" blackListMobile="0" blackListPhone="0" blackListPostalMail="0" customerId="1630997" email="heather.thompson@hostelworld.com" id="1630997" joiningDate=""/>
                    <recipient blackList="0" blackListEmail="1" blackListFax="0" blackListMobile="0" blackListPhone="0" blackListPostalMail="0" customerId="1630879" email="heather.thompson@hostelworld.com" id="1630879" joiningDate=""/>
                    <recipient blackList="0" blackListEmail="1" blackListFax="0" blackListMobile="0" blackListPhone="0" blackListPostalMail="0" customerId="1630759" email="heather.thompson@hostelworld.com" id="1630759" joiningDate=""/>
                    <recipient blackList="0" blackListEmail="1" blackListFax="0" blackListMobile="0" blackListPhone="0" blackListPostalMail="0" customerId="1630789" email="heather.thompson@hostelworld.com" id="1630789" joiningDate=""/>
                    <recipient blackList="0" blackListEmail="1" blackListFax="0" blackListMobile="0" blackListPhone="0" blackListPostalMail="0" customerId="1630909" email="heather.thompson@hostelworld.com" id="1630909" joiningDate=""/>
                    <recipient blackList="0" blackListEmail="1" blackListFax="0" blackListMobile="0" blackListPhone="0" blackListPostalMail="0" customerId="17697564" email="maxime.abollivier@gmail.com" id="17697564" joiningDate="2015-08-01 10:27:48.000Z"/>
                    <recipient blackList="0" blackListEmail="1" blackListFax="0" blackListMobile="0" blackListPhone="0" blackListPostalMail="0" customerId="1630819" email="heather.thompson@hostelworld.com" id="1630819" joiningDate=""/>
                    <recipient blackList="0" blackListEmail="1" blackListFax="0" blackListMobile="0" blackListPhone="0" blackListPostalMail="0" customerId="1630977" email="heather.thompson@hostelworld.com" id="1630977" joiningDate=""/>
                    <recipient blackList="0" blackListEmail="1" blackListFax="0" blackListMobile="0" blackListPhone="0" blackListPostalMail="0" customerId="1630971" email="david.dwyer@hostelworld.com" id="1630971" joiningDate=""/>
                </recipient-collection>
            </pdomOutput>
        </ExecuteQueryResponse>
    </SOAP-ENV:Body>
</SOAP-ENV:Envelope>
SOAP;*/

$xml = new \SimpleXMLElement($soap);
$xml->registerXPathNamespace('e', 'urn:xtk:queryDef');

$resultContainer = $xml->xpath('//e:pdomOutput');
echo "================RESULT CONTAINER=============" . PHP_EOL;
var_dump($resultContainer);
echo "=============================================" . PHP_EOL;

echo "================RESULT ======================" . PHP_EOL;
$result = $resultContainer[0];
var_dump($result);
echo "=============================================" . PHP_EOL;

echo "===============RESULT TYPE===================" . PHP_EOL;
$resultType = $result->children()[0]->getName();
var_dump($resultType);
echo "=============================================" . PHP_EOL;

echo "===============RESULT SIZE===================" . PHP_EOL;
$resultSize = count($result->children()[0]->children());
var_dump($resultSize);
echo "=============================================" . PHP_EOL;

