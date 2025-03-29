<?php
class Admin_Block_Category_List extends Admin_Block_Widget_Grid
{
  protected $_collection;
  public function __construct()
  {
    $this->addColumns('category_id', [
      'render' => 'number',
      'filter' => 'Number',
      'data_index' => 'category_id',
      'label' => 'category_id',
    ]);
    $this->addColumns('name', [
      'render' => 'text',
      'filter' => 'Text',
      'data_index' => 'name',
      'label' => 'Name',

    ]);
    $this->addColumns('description', [
      'render' => 'text',
      'filter' => 'Text',
      'data_index' => 'description',
      'label' => 'decription',

    ]);
    $this->addColumns('parent_id', [
      'render' => 'number',
      'filter' => 'Number',
      'data_index' => 'parent_id',
      'label' => 'parent_id',

    ]);
    $this->addColumns('edit', [
      'render' => 'edit',
      'action' => 'Edit',
      'label' => 'edit',
      'callback' => 'getEditUrl',
      'class' => 'btn btn-primary'
    ]);
    $this->addColumns('delete', [
      'render' => 'delete',
      'action' => 'Delete',
      'label' => 'delete',
      'callback' => 'getDeleteUrl',
      'class' => 'btn btn-danger'
    ]);

    $this->setCollection(Mage::getModel('catalog/category')
      ->getCollection());
    parent::__construct();

    // $this->setTemplate('admin/category/list.phtml');
    // $toolbar = $this->getLayout()
    //   ->createBlock('admin/grid_toolbar')
    //   ->setTemplate('admin/grid/toolbar.phtml');
    // $this->addChild('toolbar', $toolbar);



  }

  public function getEditUrl($data)
  {
      return $this->getUrl("*/*/new")."/?edit_id=".$data['category_id'];
  }

  public function getDeleteUrl($data)
  {
     return $this->getUrl("*/*/delete")."/?delete_id=".$data['category_id'];
  }
}
