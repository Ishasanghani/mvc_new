<?php

class Admin_Controller_Category extends Core_Controller_Admin_Action
{

    public function listAction()
    {


        $list = $this->getLayout()->createBlock('admin/category_list');

        $this->getLayout()->getChild('content')->addChild('list', $list);


        $this->getLayout()->getChild('head')->addCss('catalog/category/list.css');
        $this->getLayout()->toHtml();
    }


    public function NewAction()
    {
        $new = $this->getLayout()->createBlock('admin/category_new')
            ->setTemplate('admin/category/new.phtml');
        $this->getLayout()->getChild('content')->addChild('new', $new);
        $this->getLayout()->getChild('head')->addCss('catalog/category/new.css');
        $this->getLayout()->toHtml();
    }
    public function saveAction()
    {

        $category = Mage::getModel('catalog/category');

        $data = Mage::getModel('core/request')->getParam('catalog_category');

        $category->setData($data);
        //  print_r($product);
        $category->save();

        $url = $this->getLayout()->getUrl("*/*/list");

        header("Location: $url");
        exit();
    }

    public function deleteAction()
    {

        $deleteId = Mage::getModel('core/request')->getQuery('delete_id');
        $data = Mage::getModel('catalog/category')->load($deleteId);
        $data->delete();
        $url = $this->getLayout()->getUrl("*/*/list");
        header("Location: $url");
        exit();
    }

    public function exportCsvAction()
    {
        // Load product collection with necessary attributes
        $category = Mage::getModel('catalog/category')->getCollection()->getData();
        Mage::getModel('admin/csv')->getCsv($category);
    }
}
