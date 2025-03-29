<?php
class Admin_Block_Widget_Grid extends Core_Block_Template
{
    protected $_collection;
    protected $_columns = [];
    public function __construct()
    {
        $this->setTemplate('admin/widget/grid.phtml');
       
        $toolbar = $this->getLayout()
            ->createBlock('admin/widget_grid_toolbar');
        $this->addChild('toolbar', $toolbar);
        $toolbar->prepareToolbar();
    }

    public function addColumns($name, $data)
    {
        $value = $data['render'];
        $block = Mage::getBlock('admin/widget_grid_columns_' . $value);
        $block->setList($this);
        $block->setData($data);
        $this->_columns[$name] = $block;
    }

    public function setCollection($collection)
    {
        $this->_collection = $collection;
        return $this->_collection;
    }

    public function getCollection()
    {
        return $this->_collection;
    }

 

    public function getColumns()
    {
        return $this->_columns;
    }
}
