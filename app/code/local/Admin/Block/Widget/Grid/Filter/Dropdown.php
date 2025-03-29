<?php 
class Admin_Block_Widget_Grid_Filter_Dropdown extends Admin_Block_Widget_Grid_Filter_Abstract {
    protected $_data;
    public function __construct(){
       // $this->setTemplate('admin/widget/filter/dropdown.phtml');
    }
    public function setData($data)
    {
        $this->_data = $data;
        return $this;
    }

    public function getData(){
        return $this->_data;
    }

    public function rendor(){
        $label = $this->_data['label'] ?? 'dropdown'; 
        $options = $this->_data['option'] ?? []; 

        $html = "<select name=".$label." id=".$label.">";
        foreach ($options as $option) {
            $html .= "<option value=".$option.">".$option."</option>";
        }
        $html .= "</select>";
        
        return $html;
    }
}

?>