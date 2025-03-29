<?php 
class Admin_Block_Widget_Grid_Columns_View extends Admin_Block_Widget_Grid_Columns_Abstract {
    protected $_data;
    public function __construct(){
        //$this->setTemplate('admin/widget/columns/view.phtml');
    }
    public function rendor(){
        //  print_r($this->getList());
          $url = $this->getData()['callback'];
          $html = "<a href='" . $this->getList()->$url($this->getRow()) . "' class='" . $this->_data['class'] . "'>" . $this->_data['label'] . "</a>";
        return $html;
    } 
}

?>
