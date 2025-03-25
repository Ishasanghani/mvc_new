<?php
class Sale_Model_Order extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClassName = "Sale_Model_Resource_Order";
        $this->_collectionClass = "Sale_Model_Resource_Order_Collection";
    }

    public function getItemCollection()
    {
        return Mage::getModel('sale/order_item')
            ->getCollection()
            ->addFieldToFilter('order_id', $this->getOrderId());
    }

    public function getAddressCollection()
    {
        return Mage::getModel('sale/order_address')
                    ->getCollection()
                    ->addFieldToFilter('order_id', $this->getOrderId());
    }

    public function getBillingAddress()
    {
        return $this->getAddressCollection()->addFieldToFilter('typeofaddress','billing')->getFirstItem();
    }

    public function getShippingAddress()
    {
        return $this->getAddressCollection()->addFieldToFilter('typeofaddress','shipping')->getFirstItem();
                   
    }

}
?>