<?php 
class Admin_Block_Widget_Grid_Columns_Abstract 
{   
    protected $_data;
    protected $_row;
    protected $_list;
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
    public function getRow()
    {
        return $this->_row;
    }

    public function rendor(){
         
         return "<span>".$this->getValue()."</span>";
    }

    public function getValue()
    {
        return $this->_row[$this->_data['data_index']];
    }
    public function getFilter()
    {
        if(isset($this->_data['filter'])){
            $value = $this->_data['filter'];
            $block = Mage::getBlock('admin/widget_grid_filter_' . $value);
            $block->setData($this->_data);
            return $block;
        } else{
            return  Mage::getBlock('admin/widget_grid_filter_Abstract');
        }    
    }

    public function getList()
    {
       // print_r($this->_list);
        return $this->_list;
    }

    public function setList($list)
    {
        $this->_list = $list;
        return $this;
    }
}
?>