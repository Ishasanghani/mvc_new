<?php
class Admin_Block_Product_Index_List extends Admin_Block_Widget_Grid
{
    public $url;
    protected $_collection;
    public function __construct()
    {
    $this->addColumns('product_id', [
      'render' => 'number',
      'filter' => 'Number',
      'data_index' => 'product_id',
      'label' => 'product_id',

    ]);
    $this->addColumns('name', [
      'render' => 'text',
      'filter' => 'Text',
      'data_index' => 'name',
      'label' => 'Name',

    ]);
    $this->addColumns('sku', [
      'render' => 'text',
      'filter' => 'Text',
      'data_index' => 'sku',
      'label' => 'sku',
    ]);
    $this->addColumns('description', [
      'render' => 'text',
      'filter' => 'Text',
      'data_index' => 'description',
      'label' => 'decription',

    ]);
    $this->addColumns('price', [
      'render' => 'number',
      'filter' => 'Number',
      'data_index' => 'price',
      'label' => 'price',
    ]);
    $this->addColumns('stock_quantity', [
        'render' => 'number',
        'filter' => 'Number',
        'data_index' => 'stock_quantity',
        'label' => 'stock_quantity',

      ]);
      $this->addColumns('color', [
        'render' => 'text',
        'filter' => 'Text',
        'data_index' => 'color',
        'label' => 'color',
      ]);
      $this->addColumns('material', [
        'render' => 'text',
        'filter' => 'Text',
        'data_index' => 'material',
        'label' => 'material',
      ]);
      $this->addColumns('size', [
        'render' => 'text',
        'filter' => 'Text',
        'data_index' => 'size',
        'label' => 'size',
      ]);
      $this->addColumns('category_name', [
        'render' => 'text',
        'filter' => 'Text',
        'data_index' => 'category_name',
        'label' => 'category_name',
      ]);
    $this->addColumns('edit', [
      'render'=>'link',
      'action' =>'Edit',
      'url' => $this->getUrl('*/*/new') . '/?edit_id=' ,
      'label' => 'edit',
      'data_index'=>'product_id',
      'class'=>'btn btn-primary'
    ]);
    $this->addColumns('delete', [
      'render'=>'link',
      'action' =>'Delete',
      'url' => $this->getUrl('*/*/delete') . '/?delete_id=' ,
      'label' => 'delete',
      'data_index'=>'product_id',
      'class'=>'btn btn-danger'
    ]);

    $this->setCollection(Mage::getModel('catalog/product')
    ->getCollection() 
    ->leftJoin(["cc" => "catalog_category"], " cc.category_id = main_table.category_id ", ["category_name" => "name"])
    ->addAttributeToSelect(["color", "material", "size"]));
    parent::__construct();

    // $this->setTemplate('admin/category/list.phtml');
    // $toolbar = $this->getLayout()
    //   ->createBlock('admin/grid_toolbar')
    //   ->setTemplate('admin/grid/toolbar.phtml');
    // $this->addChild('toolbar', $toolbar);

    
     
  }

}
