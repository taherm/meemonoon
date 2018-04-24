<?php
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 3/30/16
 * Time: 11:13 AM
 */

namespace App\Core\Services\Payment;


class PrimaryPayment implements primaryPaymentInterface
{
    public $products;
    public $orderDetails;
    public $user;

    //LIVE VARS For Ideas Account
    const url = 'https://www.myfatoorah.com/pg/PayGatewayService.asmx';
    const userEmail = 'api@meemonoon.com';
    const userPass = 'h6v95713807';
    const MerchantCode = '68891013807';
//    const userEmail = 'info@meemonoon.com';
//    const userPass = '123456';
//    const MerchantCode = '68891013807';
    public $MerchantReferenceID = '12345678910';
    const successURL = 'http://meemonoon.com/success';
    const errorURL = 'http://meemonoon.com/error';
    const MerchantName = 'MeemOnoon';

    //TEST VARS
//    public $MerchantReferenceID = '291454542102';
//    const url = 'https://test.myfatoorah.com/pg/PayGatewayService.asmx';
//    const MerchantCode = '999999';
//    const userEmail = 'testapi@myfatoorah.com';
//    const userPass = 'E55D0';
//    const MerchantName = 'MeemOnoon';
//    const successURL = 'http://meemonoon.com/success';
//    const errorURL = 'http://meemonoon.com/error';



    public function __construct($products, $orderDetails, $user)
    {
        $this->products = $products;
        $this->orderDetails = $orderDetails;
        $this->user = $user;
    }


    public function createXMLPaymentDetails()
    {

        return $this->postString = '<?xml version="1.0" encoding="windows-1256"?>
<soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
<soap12:Body>
    <PaymentRequest xmlns="http://tempuri.org/">
    <req>
    <CustomerDC>
    <Name>'.$this->user->firstname.' '.$this->user->lastname.'</Name>
    <Email>'.$this->user->email.'</Email>
    <Mobile>'.$this->user->mobile.'</Mobile>
    </CustomerDC>
    <MerchantDC>
        <merchant_code>' . self::MerchantCode . '</merchant_code>
        <merchant_username>' . self::userEmail . '</merchant_username>
        <merchant_password>' . self::userPass . '</merchant_password>
        <merchant_ReferenceID>' . $this->MerchantReferenceID . '</merchant_ReferenceID>
        <ReturnURL>' . self::successURL . '</ReturnURL>
        <merchant_error_url>' . self::errorURL . '</merchant_error_url>
    </MerchantDC>
    <lstProductDC>
        ' . $this->createProductsList() . '
    </lstProductDC>
    </req>
    </PaymentRequest>
</soap12:Body>
</soap12:Envelope>';

    }

    public function createProductsList()
    {
        $products = '';
        foreach ($this->products->items as $product) {
            $price = ($product->sale_price) ? $product->sale_price : $product->price;
            $products .= <<<PRODUCTS
        <ProductDC>
            <product_name>{$product->name}</product_name>
            <unitPrice>{$price}</unitPrice>
            <qty>{$product->quantity}</qty>
        </ProductDC>'
PRODUCTS;
        }

        if (($this->orderDetails['shippingCost'] > 0)) {
            $products .= <<<PRODUCTS
        <ProductDC>
            <product_name>{$this->orderDetails['shippingCountry']}</product_name>
            <unitPrice>{$this->orderDetails['shippingCost']}</unitPrice>
            <qty>{$this->orderDetails['shippingQty']}</qty>
        </ProductDC>
PRODUCTS;
        }

        if (($this->orderDetails['couponValue'] > 0)) {
            $products .= <<<PRODUCTS
        <ProductDC>
            <product_name>Coupon</product_name>
            <unitPrice>{$this->orderDetails['couponValue']}</unitPrice>
            <qty>{$this->orderDetails['couponQty']}</qty>
        </ProductDC>
PRODUCTS;
        }
        return $products;
    }


    /**
     *
     */
    public function proccedPayment()
    {
        $postString = $this->createXMLPaymentDetails();

        $soap_do = curl_init();

        curl_setopt($soap_do, CURLOPT_URL, self::url);

        curl_setopt($soap_do, CURLOPT_CONNECTTIMEOUT, 10);

        curl_setopt ($soap_do, CURLOPT_PORT , 81);

        curl_setopt($soap_do, CURLOPT_TIMEOUT, 10);

        curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($soap_do, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($soap_do, CURLOPT_SSL_VERIFYHOST, false);

        curl_setopt($soap_do, CURLOPT_POST, true);

        curl_setopt($soap_do, CURLOPT_POSTFIELDS, $postString);

        curl_setopt($soap_do, CURLOPT_HTTPHEADER, array('Content-Type: text/xml; charset=utf-8', 'Content-Length: ' . strlen($postString)));

        curl_setopt($soap_do, CURLOPT_USERPWD, self::userEmail . ":" . self::userPass);

// User Name, Password To be provided by Myfatoorah

        curl_setopt($soap_do, CURLOPT_HTTPHEADER, array(
            'Content-type: text/xml'
        ));

        $result = curl_exec($soap_do);
        

        $err = curl_error($soap_do);

        dd($err);

        curl_close($soap_do);

        $soap_do = curl_init();

        curl_setopt($soap_do, CURLOPT_URL, self::url);

        curl_setopt($soap_do, CURLOPT_CONNECTTIMEOUT, 10);

        curl_setopt($soap_do, CURLOPT_TIMEOUT, 10);

        curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($soap_do, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($soap_do, CURLOPT_SSL_VERIFYHOST, false);

        curl_setopt($soap_do, CURLOPT_POST, true);

        curl_setopt($soap_do, CURLOPT_POSTFIELDS, $postString);

        curl_setopt($soap_do, CURLOPT_HTTPHEADER, array('Content-Type: text/xml; charset=utf-8', 'Content-Length: ' . strlen($postString)));

        curl_setopt($soap_do, CURLOPT_USERPWD, self::userEmail . ":" . self::userPass);

        $result = curl_exec($soap_do);

        $err = curl_error($soap_do);

        $file_contents = htmlspecialchars(curl_exec($soap_do));

        dd($file_contents);

        curl_close($soap_do);

        $doc = new \DOMDocument();

        $doc->loadXML(html_entity_decode($file_contents));

        $ResponseCode = $doc->getElementsByTagName("ResponseCode");

        dd($ResponseCode->item(0));

        $ResponseCode = $ResponseCode->item(0)->nodeValue;

        $ResponseMessage = $doc->getElementsByTagName("ResponseMessage");

        $ResponseMessage = $ResponseMessage->item(0)->nodeValue;

        if ($ResponseCode == 0) {

            $referenceId = $doc->getElementsByTagName("referenceID")->item(0)->nodeValue;

            $responseMessage = $doc->getElementsByTagName("ResponseMessage")->item(0)->nodeValue;

            $paymentURL = $doc->getElementsByTagName("paymentURL")->item(0)->nodeValue;

            $paymentDetails = (object)[
                'paymentURL' => $paymentURL,
                'responseMessage' => ($responseMessage == 'SUCCESS') ? true : false,
                'referenceId' => $referenceId
            ];

            return $paymentDetails;

        }

        return false;
    }
}


