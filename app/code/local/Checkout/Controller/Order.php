<?php
class Checkout_Controller_Order
{
    public function placeorderAction()
    {
       $cart = Mage::getSingleton('checkout/session')->getCart();
       Mage::getModel('checkout/Convert_Order')->convert($cart);
       $cart->setIsActive(0)->save();
       Mage::getModel('core/session')->remove("cart_id");

       $layout = Mage::getBlock('core/layout');
       $url = $layout->getUrl('catalog/product/list');
       header("Location:$url"); 

    }
}
?>