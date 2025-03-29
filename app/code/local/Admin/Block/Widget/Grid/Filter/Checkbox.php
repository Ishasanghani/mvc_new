<?php 
class Admin_Block_Widget_Grid_Filter_Checkbox extends Admin_Block_Widget_Grid_Filter_Abstract {
    protected $_data;
    public function __construct(){
        //$this->setTemplate('admin/widget/filter/checkbox.phtml');
    }
    public function setData($data)
    {
        $this->_data = $data;
        return $this;
    }

    public function getData(){
        return $this->_data;
    }
}

?>