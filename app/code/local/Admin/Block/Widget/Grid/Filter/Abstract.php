<?php
class Admin_Block_Widget_Grid_Filter_Abstract {
    protected $_data;
    protected $_row;
    public function setData($data)
    {
        $this->_data = $data;
        return $this->_data;
    }
    public function getData()
    {
        return $this->_data;
    }

    public function setRow($row)
    {
        $this->_row = $row;
        return $this;
    }

    public function rendor(){
         
         return "";
    }

    public function getValue()
    {
        return $this->_row[$this->_data['data_index']];
    }
  
}
?>