<?php 
class Admin_Block_Widget_Grid_Columns_Dropdown extends Admin_Block_Widget_Grid_Columns_Abstract {
    protected $_data;
    public function __construct(){
        //$this->setTemplate('admin/widget/columns/dropdown.phtml');
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

    public function getCollection(){
       print_r($this);
    }
}

?>
