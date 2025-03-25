<?php
class Admin_Block_Category_List extends Core_Block_Template
{
  protected $_collection;
  public function __construct()
  {
    $this->setTemplate('admin/category/list.phtml');
    $toolbar = $this->getLayout()
      ->createBlock('admin/grid_toolbar')
      ->setTemplate('admin/grid/toolbar.phtml');
    $this->addChild('toolbar', $toolbar);

    $this->init();
  }

  public function getCategories()
  {
    // $category = Mage::getModel('catalog/category')
    // ->getCollection();
    // $data = $category->getData();
    //echo "<pre>";
    //print_r($data);
    return  $this->getCollection()
      ->getData();
  }

  public function init()
  {

    $this->_collection = Mage::getModel('catalog/category')
      ->getCollection();
    $this->getChild('toolbar')
      ->prepareToolbar();
  }

  public function getCollection()
  {
    return $this->_collection;
  }
}
