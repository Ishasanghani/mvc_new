<?php
class Checkout_Model_Convert_Order
{
    public function convert($model)
    {
        $data = $model->getData();
        
        // echo "<pre>";
        // print_r($data);
        unset($data['cart_id']);

        // Get the User's IP Address
        $ip = $_SERVER['HTTP_CLIENT_IP'] ??
            $_SERVER['HTTP_X_FORWARDED_FOR'] ??
            $_SERVER['HTTP_X_FORWARDED'] ??
            $_SERVER['HTTP_FORWARDED_FOR'] ??
            $_SERVER['HTTP_FORWARDED'] ??
            $_SERVER['REMOTE_ADDR'] ?? 'Unknown';

        // Convert localhost IPv6 (::1) to IPv4 (127.0.0.1)
        if ($ip === '::1') {
            $ip = '127.0.0.1';
        }

        // Validate IP
        $ip = filter_var(trim(explode(",", $ip)[0]), FILTER_VALIDATE_IP) ?: "Invalid IP";

        //echo "User IP: " . $ip;

        
        $order = Mage::getModel('sale/order')
                    ->setData($data)
                    ->setOrderIp($ip)
                    ->setOrderNumber($model->getCartId())
                    ->save();

        $itemDatas = $model->getItemCollection()
                          ->getData();
        //print_r($order->getOrderId());
        foreach($itemDatas as $itemData)
        {
            $item = $itemData->getData();
            unset($item['item_id']);
            unset($item['cart_id']);
          //  print_r($item);
            Mage::getModel('sale/order_item')
                ->setData($item)
                ->setOrderId($order->getOrderId())
                ->save();
        }

        $billingAddress = $model->getBillingAddress()->getData();
        unset($billingAddress['address_id']);
        $addressModel = Mage::getModel('sale/order_address');
        $addressModel->setData($billingAddress)
                     ->setOrderId($order->getOrderId())
                     ->save();
            
        $shippingAddress = $model->getShippingAddress()->getData();
        unset($shippingAddress['address_id']);
      //  $addressModel = Mage::getModel('sale/order_address');
        $addressModel->setData($shippingAddress)
                     ->setOrderId($order->getOrderId())
                     ->save();
                                 
                                
        // print_r($billingAddress);
     
        
    }
}
