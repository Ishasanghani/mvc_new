<?php
class Checkout_Model_Coupon extends Core_Model_Abstract
{
    protected $_coupon = ["coupon1"=>"5%","coupon2"=>"15"];
    public function getAllCoupon()
    {
        return $this->_coupon;
    }

    public function calculateDiscount($couponCode, $totalAmount){
       $couponValue = $this->_coupon[$couponCode];
       if(substr($couponValue, -1)=="%")
       {
         $totalAmount = ((float)($totalAmount*(float)substr($couponValue,0,-1))/100);
       }
       else{
        $totalAmount = (float)$couponValue;
       }
       return $totalAmount;
    }
}
?>