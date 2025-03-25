<?php

class Admin_Block_Order_List extends Core_Block_Template
{
   public function orderList()
   {
      return Mage::getModel('sale/order')
         ->getCollection()
         ->getData();
   }
}
