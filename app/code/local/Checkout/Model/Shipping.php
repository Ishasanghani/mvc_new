<?php
class Checkout_Model_Shipping extends Core_Model_Abstract
{
    protected $_shipping = [
        "express"=>"300",
        "standard"=>'200',
        "pickup"=>'0'

    ];
    public function getAllShipping(){
        return $this->_shipping;

    }
    public function CalculateShippingAmount($shippingType){
      
            return $this->_shipping[$shippingType];
        }
        // print('in calculate discount');
        // print_r($value);
        // die();
 
}
?>