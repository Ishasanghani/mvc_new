<?php

class Admin_Block_Dashboard_List extends Core_Block_Template
{
    public function getTotalProduct()
    {
        return Mage::getModel('catalog/product')->getCollection()
            ->select(['total_product' => 'COUNT(product_id)'])
            ->getFirstItem()
            ->getData();
    }

    public function getTotalCategory()
    {
        return Mage::getModel('catalog/category')->getCollection()
            ->select(['total_category' => 'COUNT(category_id)'])
            ->getFirstItem()
            ->getData();
    }

    public function getTotalOrder()
    {
        return Mage::getModel('sale/order')->getCollection()
            ->select(['total_order' => 'COUNT(order_id)'])
            ->getFirstItem()
            ->getData();
    }

    public function getCategoryProductCount()
    {
        return Mage::getModel('catalog/product')
            ->getCollection()
            ->select(['product_count' => 'COUNT(main_table.product_id)', 'total_product' => '(SELECT COUNT(*) FROM catalog_product)'])
            ->leftJoin(["cc" => "catalog_category"], " cc.category_id = main_table.category_id", ["category_name" => "name"])
            ->groupBy(['main_table.category_id'])
            ->getData();
    }

    public function getOrderProductCount()
    {
        return  Mage::getModel('catalog/product')
            ->getCollection()
            ->select(['order_count' => 'COUNT(o.order_id)'])
            ->leftJoin(["cc" => "catalog_category"], " cc.category_id = main_table.category_id ", ["category_name" => "name"])
            ->leftJoin(['o' => "order_item"], ' o.product_id = main_table.product_id', [])
            ->groupBy(['main_table.product_id'])
            ->getData();
    }
}
