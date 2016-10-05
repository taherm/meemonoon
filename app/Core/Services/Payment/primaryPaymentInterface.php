<?php
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 7/21/16
 * Time: 6:29 PM
 */

namespace App\Core\Services\Payment;


interface primaryPaymentInterface
{
    public function createXMLPaymentDetails();

    public function proccedPayment();

    public function createProductsList();
}