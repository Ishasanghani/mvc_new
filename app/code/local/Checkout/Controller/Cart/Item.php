<?php
class Checkout_Controller_Cart_Item{
    public function indexAction()
    {
        $layout = Mage::getBlock('core/layout');
        $list = $layout->createBlock('checkout/cart_item_index')
            ->setTemplate('checkout/cart/item/index.phtml');
        $layout->getChild('content')->addChild('list', $list);
        $layout->toHtml();
    }

    public function updateAction()
    {

        $request = Mage::getModel('core/request')->getParams();
        $item_id = $request['item_id'];
        $quantity = $request['quantity'];
        Mage::getSingleton('checkout/session')->getCart()
            ->updateItem($item_id, $quantity)
            ->save();

        header("Location: http://localhost/mvc_new/checkout/cart_item/index ");
    }

    public function removeAction()
    {

        $delete_id = Mage::getModel("core/request")->getQuery('item_id');
        Mage::getSingleton('checkout/session')->getCart()
            ->removeItem($delete_id)
            ->save();
        header("Location: http://localhost/mvc_new/checkout/cart_item/index");
    }

    public function addAction()
    {
        $requestData = Mage::getModel('core/request')
            ->getParam('cart');

        $product_id = $requestData['product_id'];
        $quantity =  $requestData['quantity'];

        //print_r($product_id);
        //print_r($quantity);

        $cart = Mage::getSingleton('checkout/session')->getCart();
        $cart->addProduct($product_id, $quantity)->save();
   

        header("Location: http://localhost/mvc_new/checkout/cart_item/index ");
    }

    

}
?>