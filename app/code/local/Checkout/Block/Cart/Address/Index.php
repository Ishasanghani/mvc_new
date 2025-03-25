<?php
class Checkout_Block_Cart_Address_Index extends Core_Block_Template
{

    public function billingInfo()
    {
        $cartModel = Mage::getSingleton('checkout/session')
            ->getCart();
        $addressModel = Mage::getModel('checkout/cart_address')
            ->getCollection()
            ->addFieldToFilter('cart_id', $cartModel->getCartId())
            ->addFieldToFilter('typeofaddress', 'billing')
            ->getFirstItem();  
        return $addressModel;
    }
    public function shippingInfo()
    {
        $cartModel = Mage::getSingleton('checkout/session')
            ->getCart();
        $addressModel = Mage::getModel('checkout/cart_address')
            ->getCollection()
            ->addFieldToFilter('cart_id', $cartModel->getCartId())
            ->addFieldToFilter('typeofaddress', 'shipping')
            ->getFirstItem();

        return $addressModel;
    }
    public function getEmail()
    {
        $cartModel = Mage::getSingleton('checkout/session')
            ->getCart()
            ->getEmail();
        return $cartModel;
    }
}
