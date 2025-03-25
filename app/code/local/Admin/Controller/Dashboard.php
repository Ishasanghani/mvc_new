<?php

class Admin_Controller_Dashboard extends Core_Controller_Admin_Action
{

    public function listAction()
    {


        $list = $this->getLayout()->createBlock('admin/dashboard_list')
            ->setTemplate('admin/dashboard/list.phtml');
        $this->getLayout()->getChild('content')->addChild('list', $list);
        $this->getLayout()->getChild('head')->addCss('admin/dashboard/list.css');
        $this->getLayout()->toHtml();
    }

    public function exportCsvAction() {
        // Load product collection with necessary attributes
        $model = Mage::getModel('admin/csv');
        $model->getCsv(Mage::getModel('catalog/category')->getCollection()->getData());
        $model->getCsv(Mage::getModel('catalog/product')->getCollection()->getData());
        $model->getCsv(Mage::getModel('sale/order')->getCollection()->getData());
    }
}
