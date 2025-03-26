<?php

class Admin_Controller_Order extends Core_Controller_Admin_Action
{
    public function listAction()
    {

        $list =  $this->getLayout()->createBlock('admin/order_list');
            // ->setTemplate('admin/order/list.phtml');
        $this->getLayout()->getChild('content')->addChild('list', $list);
        $this->getLayout()->getChild('head')->addCss('admin/widget/grid.css');
        $this->getLayout()->toHtml();
    }

    public function viewAction()
    {
        $orderId = Mage::getModel('core/request')->getQuery('view_id');
        $orderModel = Mage::getModel('sale/order')->load($orderId);

        $orderView = $this->getLayout()->createBlock('admin/order_view');
        $this->getLayout()->getChild('content')->addChild('order', $orderView);
        $orderView->setOrder($orderModel);

        $orderInfo =  $this->getLayout()->createBlock('admin/order_view_info'); //->setOrderInfoBlock($orderView);
        $this->getLayout()->getChild('content')->getChild('order')->addChild('order_info', $orderInfo);

        $orderAddress =  $this->getLayout()->createBlock('admin/order_view_address'); //->setOrderAddressBlock($orderView);
        $this->getLayout()->getChild('content')->getChild('order')->addChild('order_address', $orderAddress);

        $orderItem =  $this->getLayout()->createBlock('admin/order_view_item'); //->setOrderItemBlock($orderView);
        $this->getLayout()->getChild('content')->getChild('order')->addChild('order_item', $orderItem);

        $this->getLayout()->toHtml();
    }

    public function updateStatusAction()
    {
        $request = Mage::getModel('core/request')
            ->getParams();

        Mage::getModel('sale/order')
            ->setOrderId($request['order_id'])
            ->setOrderStatus($request['order_status'])
            ->save();
        header('location:http://localhost/mvc_new/admin/order/list');
    }
    public function exportCsvAction()
    {
        // Load product collection with necessary attributes
        $order = Mage::getModel('sale/order')->getCollection()->getData();

        Mage::getModel('admin/csv')->getCsv($order);
    }
}
