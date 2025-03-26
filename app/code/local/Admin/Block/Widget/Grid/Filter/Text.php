<?php 
class Admin_Block_Widget_Grid_Filter_Text extends Core_Block_Template{
    protected $_data;
    public function __construct(){
        $this->setTemplate('admin/widget/filter/text.phtml');
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