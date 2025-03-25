<?php

class Admin_Block_Order_View extends Core_Block_Template
{
    protected $_orderdata = null;
    public function __construct()
    {
        $this->setTemplate('admin/order/view.phtml');
    }

    public function setOrder($orderModel)
    {
        $this->_orderdata = $orderModel;
        return $this;
    }

    public function getOrder()
    {
        return $this->_orderdata;
    }
    // public function orderView()
    // {
    //     $orderId = Mage::getModel('core/request')->getQuery('order_id');
    //     return Mage::getModel('sale/order')
    //             ->getCollection()
    //             ->addFieldToFilter('order_id',$orderId)
    //             ->getData();
    // }

    // public function orderItemDetails(){
    //     $orderId = Mage::getModel('core/request')->getQuery('order_id');
    //     return Mage::getModel('sale/order_item')
    //                 ->getCollection()
    //                 ->addFieldToFilter('order_id',$orderId)
    //                 ->getData();
    // } 
}
