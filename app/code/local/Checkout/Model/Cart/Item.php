<?php
class Checkout_Model_Cart_Item extends Core_Model_Abstract
{

    public function init()
    {
        $this->_resourceClassName = "Checkout_Model_Resource_Cart_Item";
        $this->_collectionClass = "Checkout_Model_Resource_Cart_Item_Collection";
    }

    protected function _beforeSave()
    {
        $product = $this->getProduct();
       // print_r($product);
     
        $product_price = (float) $product->getPrice();
       //  print_r($product_price);
        $quantity = (int) $this->getProductQuantity();
        // print_r($quantity);
        $subTotal = ($product_price * $quantity);
        // print_r($subTotal);
        $this->setPrice($product_price)
            ->setSubTotal($subTotal);
        // print_r($this);
    }

    public function getProduct()
    {
        return Mage::getModel('catalog/product')->load($this->getProductId());
    }
}
