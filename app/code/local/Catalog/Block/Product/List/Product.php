<?php
class Catalog_Block_Product_List_Product extends Catalog_Block_Product_List
{
    public function __construct()
    {
        $this->setTemplate('catalog/product/list/product.phtml');
        $toolbar = $this->getLayout()
            ->createBlock('catalog/grid_toolbar')
            ->setTemplate('catalog/grid/toolbar.phtml');
        $this->addChild('toolbar', $toolbar);
        $this->init();
    }

    public function getProductData()
    {
        // $cat = Mage::getSingleton('catalog/filter')->getProductCollection() ;
        // print_r($cat);
        $productData = $this->getCollection()->getData();
        foreach ($productData as $product) {

            $product_id = $product->getProductId();
            //print_r($product_id);
            $imageModel = Mage::getModel('catalog/media_gallery')
                ->getCollection()
                ->AddFieldToFilter("product_id", $product_id)
                ->AddFieldToFilter("default_image", "1")
                ->getData();
            // echo "<pre>";
            // $image = $imageModel->getData()[0];
            if (!empty($imageModel) && isset($imageModel[0])) {
                $product->setMainImage($imageModel[0]->getFilePath());
            } else {
                // echo "No default image found for product ID: " . $product_id;
            }

            // print_r($product);
        }


        //print_r($cat);
        //$request = Mage::getModel('core/request');
        // $category_id = $request->getQuery('category_id');
        // $productModel = Mage::getModel('catalog/product');
        // $productQuery = $productModel->getCollection()
        //     ->select(['name', 'price','product_id'])
        //     ->addFieldToFilter('category_id', $category_id)
        //     ->leftJoin(
        //        ["cmg"=>'catalog_media_gallery'] ,
        //         'main_table.product_id = cmg.product_id',
        //         ['file_path' => 'file_path'])
        //     ->groupBy(['main_table.product_id'])
        //     ;
        //  echo "<pre>";



        // $product = Mage::getModel('catalog/product')
        // ->getCollection()
        // ->select('catlog_product.*')
        // ->leftJoin('catlog_category'," catlog_category.category_id = catlog_product.category_id",["category_name"=>"name"])
        // ;

        // $this->url = Mage::getBaseUrl();
        // $data = $product->getData();
        // echo "<pre>";
        // print_r($data);
        // die();

        //cartid, customer_id,total_amount,oder_id
        //order_item,cart_item, product_id, quantity, grant total 
        // echo "<pre>";
        // print_r($productData);
        // die();
        return $productData;
    }

    public function init()
    {
        $this->_collection = Mage::getSingleton('catalog/filter')->getProductCollection();
        $this->getChild('toolbar')->prepareToolbar();
    }

    public function getCollection()
    {
        return $this->_collection;
    }
}
