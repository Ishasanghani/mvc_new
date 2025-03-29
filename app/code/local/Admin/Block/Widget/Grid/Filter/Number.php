<?php
class Admin_Block_Widget_Grid_Filter_Number extends Admin_Block_Widget_Grid_Filter_Abstract
{
    protected $_data;
    public function __construct()
    {
        // $this->setTemplate('admin/widget/filter/number.phtml');
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

    public function rendor()
    {
        $filterType = $this->_data["filter"] ?? "text"; // Default to text if missing
        $label = $this->_data["label"] ?? "Value"; // Default label if missing
        $html = "";
        
        $html .= "<input type=\"$filterType\" name=\"{$label}_min\" min=\"1\" placeholder=\"Enter minimum $label\">";
        
        $html .= "<input type=\"$filterType\" name=\"{$label}_max\" min=\"1\" placeholder=\"Enter maximum $label\">";
        
        return $html;
    }
}
