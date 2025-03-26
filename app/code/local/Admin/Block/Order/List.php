<?php

class Admin_Block_Order_List extends Admin_Block_Widget_Grid
{
   protected $_collection;
   public function __construct()
   {
     $this->addColumns('order_id', [
       'render' => 'number',
       'filter' => 'Number',
       'data_index' => 'order_id',
       'label' => 'order_id',
     
     ]);
     $this->addColumns('customer_id', [
       'render' => 'number',
       'filter' => 'Number',
       'data_index' => 'customer_id',
       'label' => 'customer_id',
       
     ]);
     $this->addColumns('order_status', [
       'render' => 'dropdown',
       'filter' => 'Dropdown',
       'data_index' => 'order_status',
       'label' => 'order_status',
       'option' => ['pending','cancel','shipping','delivered'],
    
     ]);
     $this->addColumns('email', [
      'render' => 'text',
      'filter' => 'Text',
      'data_index' => 'email',
      'label' => 'email',
      
    ]);
     $this->addColumns('total_amount', [
      'render' => 'number',
      'filter' => 'Number',
      'data_index' => 'total_amount',
      'label' => 'total_amount',
      
    ]);
     
     $this->addColumns('View', [
       'render'=>'link',
       'action' =>'view',
       'url' => $this->getUrl('*/*/view') . '/?order_id=' ,
       'label' => 'view',
       'data_index'=>'order_id',
       'class'=>'btn btn-danger'
     ]);
 
     $this->setCollection(Mage::getModel('sale/order')
     ->getCollection());
     parent::__construct();
 
     // $this->setTemplate('admin/category/list.phtml');
     // $toolbar = $this->getLayout()
     //   ->createBlock('admin/grid_toolbar')
     //   ->setTemplate('admin/grid/toolbar.phtml');
     // $this->addChild('toolbar', $toolbar);
 
     
      
   }
}
