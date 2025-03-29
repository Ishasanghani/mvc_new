<?php

class Catalog_Controller_Product
{

    public function listAction()
    {
        $request = Mage::getModel('core/request');

        $layout = Mage::getBlockSingleton('core/layout');
        //$layout->removeChild('header');
        $list = $layout->createBlock('catalog/product_list');
        if($request->isAjax())
        {
            $layout->removeChild('header');
            $layout->removeChild('footer');
            $list->removeChild('filter');
        }
            
        $layout->getChild('content')->addChild('list', $list);
        $layout->getChild('head')->addCss('catalog/product/list.css');
        $layout->getChild('head')->addJs('catalog/list.js');
        $layout->toHtml();
    }
    
    public function viewAction()
    {
        $product = Mage::getModel('catalog/product');
        //echo "<pre>";
        //print_r($product);
        $model = $product->getResource();
        //print_r($model);
        $layout = Mage::getBlock('core/layout');
        $view = $layout->createBlock('catalog/product_view')
            ->setTemplate('catalog/product/view.phtml');
        $layout->getChild('content')->addChild('view', $view);
        $layout->toHtml();
    }

    public function testAction()
    {
        //  echo "<pre>";
        //  $collection = Mage::getModel('catalog/filter')->getProductCollection();
        //  $query = $collection->prepareQuery();
        //  print($query);
         
        //  print_r($collection);
        // echo "<pre>";
       

        // $cart = Mage::getSingleton('checkout/session')->getCart()->getItemCollection();
        // $cart->select(["sumtotal"=>"maintable.subtotal"]);
        // Mage::log($cart->prepareQuery());

        
    }
}
