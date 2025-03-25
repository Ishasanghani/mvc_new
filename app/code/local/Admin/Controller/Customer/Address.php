<?php
class Admin_Controller_Customer_Address extends Core_Controller_Admin_Action
{

    public function newAction()
    {

        $new =  $this->getLayout()
            ->createBlock('Admin/Customer_Address_New')
            ->setTemplate('Admin/customer/address/new.phtml');
        $this->getLayout()
            ->getChild('content')
            ->addChild('new', $new);
        $this->getLayout()
            ->toHtml();
    }

    public function listAction()
    {

        $list =  $this->getLayout()
            ->createBlock('Admin/customer_address_list')
            ->setTemplate('Admin/customer/address/list.phtml');
        $this->getLayout()
            ->getChild('content')
            ->addChild('list', $list);
        $this->getLayout()
            ->toHtml();
    }
    public function saveAction()
    {

        $save = $this->getLayout()
            ->createBlock('Admin/customer_address_save')
            ->setTemplate('Admin/customer/address/save.phtml');
        $this->getLayout()
            ->getChild('content')
            ->addChild('save', $save);
        $this->getLayout()
            ->toHtml();
    }
    public function deleteAction()
    {

        $delete =  $this->getLayout()
            ->createBlock('Admin/customer_address_delete')
            ->setTemplate('Admin/customer/address/delete.phtml');
        $this->getLayout()
            ->getChild('content')
            ->addChild('delete', $delete);
        $this->getLayout()
            ->toHtml();
    }
}
