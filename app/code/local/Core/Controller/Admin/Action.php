<?php
class Core_Controller_Admin_Action extends Core_Controller_Front_Action
{
    protected $_allowedAction = [];
    
    public function __construct()
    {
        $this->_init();
    }
    protected function _init()
    {
        $isLogin = $this->getSession()->get('login');
        $id = $this->getSession()->get('id');
       // print($isLogin);
         //print($isLogin);
         //print($this->getSession()->getId());
        // //echo $isLogin;
        //echo $this->getRequest()->getActionName();
        //echo "123";c
        if (!in_array($this->getRequest()->getActionName(), $this->_allowedAction)) {
            if ($isLogin === $id && !empty($isLogin) ) {
              // $this->redirect("admin/product_index/list");
            } else {
                //die();
                $this->redirect("admin/account/login");
            }
        }
    }

    public function getLayout()
    {
        return Mage::getBlockSingleton('core/admin_layout');
    }
}
