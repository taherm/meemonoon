<?php

namespace App\Src\Cart;

use Exception;

class ShippingManager {
 
//    public function calculateCost(double $cartWeight, string $country)
    public function calculateCost($cartWeight,$country)
    {
        $cartWeight = $this->roundUp($cartWeight);
        $shippingCost = $this->calculateShippingCost($country,$cartWeight);
        $deliveryCost = $this->calculateDeliveryCost($shippingCost);
        return  $deliveryCost;
    }

    private function roundUp($weight)
    {
        return round(($weight+.5/2)/.5)*.5;
    }
    
    private function calculateShippingCost($country,$weight) {
        $country = strtolower(str_replace(" ","-",$country));
        switch ($country) {
            case 'kuwait':
                return 0;
                break;
            case 'bahrain' :
                return ($weight/0.5 - 1)* 0.8 + 2.7;
            case 'oman' :
                return ($weight/0.5 - 1)* 0.9 + 2.5;
            case 'qatar' :
                return ($weight/0.5 - 1)* 0.9 + 2.6;
            case 'saudi-arabia' :
                return ($weight/0.5 - 1)* 1 + 3;
            case 'uae' :
                return ($weight/0.5 - 1)* 1 + 2.3;
            default :
                throw new \Exception("Shipping to {$country} is not available");
        }

    }

    private function calculateDeliveryCost($shippingCost)
    {
        return $shippingCost + $shippingCost * 16/100 ;
    }

}