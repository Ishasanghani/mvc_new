<?php
class Admin_Controller_Customer_Index extends Core_Controller_Admin_Action
{

    public function newAction()
    {
        $new =  $this->getLayout()
            ->createBlock('Admin/Customer_index_New')
            ->setTemplate('Admin/customer/index/new.phtml');
        $this->getLayout()
            ->getChild('content')
            ->addChild('new', $new);
        $this->getLayout()
            ->toHtml();
    }

    public function listAction()
    {

        $list =  $this->getLayout()
            ->createBlock('Admin/customer_index_list')
            ->setTemplate('Admin/customer/index/list.phtml');
        $this->getLayout()
            ->getChild('content')
            ->addChild('list', $list);
        $this->getLayout()
            ->toHtml();
    }
    public function saveAction()
    {
        $save =  $this->getLayout()
            ->createBlock('Admin/customer_index_save')
            ->setTemplate('Admin/customer/index/save.phtml');
        $this->getLayout()
            ->getChild('content')
            ->addChild('save', $save);
        $this->getLayout()
            ->toHtml();
    }
    public function deleteAction()
    {
        $delete =  $this->getLayout()
            ->createBlock('Admin/customer_index_delete')
            ->setTemplate('Admin/customer/index/delete.phtml');
        $this->getLayout()
            ->getChild('content')
            ->addChild('delete', $delete);
        $this->getLayout()
            ->toHtml();
    }
}
