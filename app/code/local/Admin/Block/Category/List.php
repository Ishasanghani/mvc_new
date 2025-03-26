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
      'action' => ''
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
      'render' => 'link',
      'action' => 'Edit',
      'label' => 'edit',
      'data_index' => 'category_id',
      'class' => 'btn btn-primary'
    ]);
    $this->addColumns('delete', [
      'render' => 'link',
      'action' => 'Delete',
      'label' => 'delete',
      'data_index' => 'category_id',
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
}
