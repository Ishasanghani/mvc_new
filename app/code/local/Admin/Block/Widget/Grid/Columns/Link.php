<?php 
class Admin_Block_Widget_Grid_Columns_Link extends Admin_Block_Widget_Grid_Columns_Abstract {
    protected $_data;
    public function __construct(){
      //  $this->setTemplate('admin/widget/columns/link.phtml');
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