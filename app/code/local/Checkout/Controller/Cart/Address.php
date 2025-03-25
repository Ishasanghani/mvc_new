<?php
class Checkout_Controller_Cart_Address {
    public function indexAction(){
        $layout = Mage::getBlock('core/layout');
        $list = $layout->createBlock('checkout/cart_address_index')
            ->setTemplate('checkout/cart/address/index.phtml');
        $layout->getChild('content')->addChild('list', $list);
       // $layout->getChild('head')->addJs('page/form.js');
        $layout->toHtml();
    }
    
    public function saveAction()
    {
        $request = Mage::getModel('core/request')->getParams();
        
        $cartId = Mage::getSingleton('checkout/session')->getCart()
                                                        ->setEmail($request['email'])
                                                        ->save()
                                                        ->getCartId();
        $data = array_merge($request['personal'],$request['billing']);
        $data['cart_id'] = $cartId;
        $data['typeofaddress'] = 'billing';
    
        $addressModel = Mage::getModel('checkout/cart_address');
        $addressModel->setData($data)->save();
    
        $data = array_merge($request['personal'],$request['shipping']);
        $data['cart_id'] = $cartId;
        
        $data['typeofaddress'] = 'shipping';
        $addressModel->setData($data)->save();
        header("Location: http://localhost/mvc_new/checkout/shipping/index ");
    }
}

?>