<?php
class Admin_Block_Order_View_Info extends Core_Block_Template
{
    protected $_orderInfo = null;
    public function __construct()
    {
        $this->setTemplate('admin/order/view/info.phtml');
    }

    // public function getOrderInfoBlock(){
    //     return $this->getParent()->_orderInfo;
    // }

    // public function setOrderInfoBlock($viewBlock){
    //     $this->_orderInfo = $viewBlock;
    //     return $this;
    // }

    public function getInfoData()
    {
        return  $this->getParent()
            ->getOrder();
    }
}
