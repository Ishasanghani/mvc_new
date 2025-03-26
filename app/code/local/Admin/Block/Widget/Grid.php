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

        $this->_columns[$name] = $data;
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

    public function renderFilter($columnName)
    {
        $data = $this->_columns[$columnName];

        if (!empty($this->_columns[$columnName]['filter'])) {
            $block = Mage::getBlock('admin/widget_grid_filter_' . $this->_columns[$columnName]['filter']);
            $block->setData($data)
                ->toHtml();
        }
    }

    public function renderColumn($columnName,$id)
    {
        $data = $this->_columns[$columnName];
        if(!empty($id)){
            $data['id'] = $id;
        }
        $value = isset($data['action']) ? $data['action'] : '';
        if($value !== ''){
            $block = Mage::getBlock('admin/widget_grid_columns_' . $value);
            $block->setData($data)
                ->toHtml();
        }

    }

    public function getColumns()
    {
        return $this->_columns;
    }
}
