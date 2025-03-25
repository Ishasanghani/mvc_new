<?php

class Checkout_Controller_Cart
{

    
    public function CouponAction()
    {
        $requestCoupon = Mage::getModel('core/request')->getParams();
        $couponCode = $requestCoupon['coupon'];
        $totalAmount = $requestCoupon['total_amount'];
        $couponModel =Mage::getModel('checkout/coupon');
        if(array_key_exists($couponCode, $couponModel->getAllCoupon())){
             $couponDiscount = $couponModel->calculateDiscount($couponCode,$totalAmount); 
             $totalAmount = $totalAmount - $couponDiscount; 
             Mage::getModel('checkout/session')->getCart()
                                               ->setCouponCode($couponCode)
                                               ->setCouponDiscount($couponDiscount)
                                               ->setTotalAmount($totalAmount)
                                               ->save();
        }
        header("Location: http://localhost/mvc_new/checkout/cart_item/index ");
       
    } 

    

  

    public function testAction() {}
}
