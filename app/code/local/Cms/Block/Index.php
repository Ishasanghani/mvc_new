<?php
class Cms_Block_Index extends Core_Block_Template{
  
    public function getProductList()
    {
        
       $productModel = Mage::getModel('catalog/product');
       $productData = $productModel->getCollection()
                                   ->select(['name','price','product_id'])
                                   ->leftJoin(["cmg"=>'catalog_media_gallery'],'main_table.product_id = cmg.product_id',["file_path"=>"file_path"])
                                   ->limit(10);
       $data = $productData->getData();
       
    //    echo "<pre>";
    //    print_r($data);
    
       return $data;
    }
}
?>