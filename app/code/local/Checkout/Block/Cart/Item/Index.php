<?php 
class Checkout_Block_Cart_Item_Index extends Core_Block_Template{
    
        public function getItem()
        {
            $cart_model = Mage::getSingleton("checkout/session")->getCart();
            $cart_item_data = $cart_model->getItemCollection()->getData();
            // echo "<pre>";
            // print_r($cart_item_data);
            return $cart_item_data;
        }

     public function getTotalAmount()
     {

       return Mage::getSingleton("checkout/session")->getCart();
        
     }
    

}
?>