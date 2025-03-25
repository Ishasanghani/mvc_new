<?php 
class Checkout_Controller_Shipping {
    public function indexAction()
    {
        $layout = Mage::getBlock('core/layout');
        $list = $layout->createBlock('checkout/cart_shipping')
            ->setTemplate('checkout/cart/shipping.phtml');
        $layout->getChild('content')->addChild('list', $list);
        $layout->toHtml();
       
    }

    public function saveAction()
    {
        $request = Mage::getModel('core/request')->getParams();
       // print_r($request);
        $shipping = $request['shipping_type'];
        $payment = $request['payment_method'];
        $cart = Mage::getModel('checkout/session')->getCart();
         $totalAmount = $cart->getTotalAmount();
        //print_r($shipping['type']);
      
        $shippingModel =Mage::getModel('checkout/shipping');
        if(array_key_exists($shipping, $shippingModel->getAllShipping())){
             $shippingCharge = $shippingModel->CalculateShippingAmount($shipping); 
             // print_r($shippingCharge);
             $totalAmount = $totalAmount+$shippingCharge;
             $cart->setShippingMethod($shipping)
                  ->setShippingAmount($shippingCharge)
                  ->setPaymentMethod($payment)
                  ->save();
        }
        
        header("Location: http://localhost/mvc_new/checkout/order/placeorder ");
       
        
    }
  
  
}
?>