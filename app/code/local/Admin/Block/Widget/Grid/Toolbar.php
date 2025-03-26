<?php
class Admin_Block_Widget_Grid_Toolbar extends Core_Block_Template
{
    protected $_limit = 5;
    protected $_page = 1;
    protected $_collection;
    public function __construct()
    {
        $this->setTemplate('admin/widget/grid/toolbar.phtml');
    }
    public function prepareToolbar()
    {
        $page = $this->getRequest()->getQuery('page');
        $limit = $this->getRequest()->getQuery('limit');

        if (is_numeric($page)) {
            $this->_page = $page;
        }

        if (is_numeric($limit)) {
            $this->_limit = intval($limit);
        }

        $this->_collection = clone $this->getParent()
            ->getCollection();

        $this->getParent()
            ->getCollection()
            ->limit($this->_limit, ($this->_page - 1) * ($this->_limit))
            ->getData();
    }

    public function getTotalRecord()
    {
        return count($this->_collection->getData());
    }
}
