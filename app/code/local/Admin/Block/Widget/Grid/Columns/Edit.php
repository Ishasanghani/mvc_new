<?php
class Admin_Block_Widget_Grid_Columns_Edit extends Core_Block_Template
{
    protected $_data;

    public function __construct()
    {
        $this->setTemplate('admin/widget/columns/edit.phtml');
    }

    public function setData($data)
    {
        $this->_data = $data;
        return $this;
    }

    public function getData()
    {
        return $this->_data;
    }
}
?>
