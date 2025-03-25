<?php
class Admin_Block_Order_View_Item extends Core_Block_Template
{
   // protected $_orderItem = null;
   public function __construct()
   {
      $this->setTemplate('admin/order/view/item.phtml');
   }

   //     public function getOrderItemBlock(){
   //        // print_r($this);
   //         return $this->getParent();
   //    }

   //    public function setOrderItemBlock($viewBlock)
   //    {
   //        $this->_orderItem = $viewBlock;
   //        return $this;
   //    }

   public function getItemData()
   {
      return $this->getParent()
         ->getOrder()
         ->getItemCollection()
         ->getData();
   }
}
