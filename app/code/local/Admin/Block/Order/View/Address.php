<?php
class Admin_Block_Order_View_Address extends Core_Block_Template
{
    protected $_orderAddress = null;
    public function __construct()
    {
        $this->setTemplate('admin/order/view/address.phtml');
    }

    // public function getOrderAddressBlock(){
    //      return $this->getParent()->_orderAddress;
    // }

    // public function setOrderAddressBlock($viewBlock)
    // {
    //     $this->_orderAddress = $viewBlock;
    //     return $this;
    // }

    public function getOrderAddressData()
    {
        return  $this->getParent()
            ->getOrder()
            ->getAddressCollection()
            ->getData();
    }
}
