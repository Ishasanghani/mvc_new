<?php
class Admin_Block_Product_Index_List extends Core_Block_Template
{
    public $url;
    protected $_collection;
    public function __construct()
    {

        $this->setTemplate('admin/product/index/list.phtml');
        $toolbar = $this->getLayout()
            ->createBlock('admin/grid_toolbar')
            ->setTemplate('admin/grid/toolbar.phtml');
        $this->addChild('toolbar', $toolbar);
        $this->init();
    }

    public function getProducts()
    {



        $this->url = Mage::getBaseUrl();

        // echo "<pre>";
        // echo "<pre>";
        //  print_r($data);
        // die();
        return   $this->getCollection()
            ->leftJoin(["cc" => "catalog_category"], " cc.category_id = main_table.category_id ", ["category_name" => "name"])
            ->addAttributeToSelect(["color", "material", "size"])
            ->getData()
        ;
    }

    public function init()
    {
        $this->_collection = Mage::getModel('catalog/product')
            ->getCollection();
        $this->getChild('toolbar')->prepareToolbar();
    }

    public function getCollection()
    {
        return $this->_collection;
    }
}
