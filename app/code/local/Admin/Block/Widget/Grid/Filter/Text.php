<?php 
class Admin_Block_Widget_Grid_Filter_Text extends Admin_Block_Widget_Grid_Filter_Abstract {
    protected $_data;
    public function __construct(){
       // $this->setTemplate('admin/widget/filter/text.phtml');
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
        $filterType = $this->_data["filter"] ?? "text"; 
        $label = $this->_data["label"] ?? "Value"; 
        $html = "";
        
        $html .= "<input type=\"$filterType\" name=\"{$label}\" min=\"1\" placeholder=\"Enter $label\">";
        
        return $html;
    }
}

?>