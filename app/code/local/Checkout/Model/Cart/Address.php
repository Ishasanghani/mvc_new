<?php
class Checkout_Model_Cart_Address extends Core_Model_Abstract
{

    public function init()
    {
        $this->_resourceClassName = "Checkout_Model_Resource_Cart_Address";
        $this->_collectionClass = "Checkout_Model_Resource_Cart_Address_Collection";
    }

    public function _beforeSave()
    {
           // Get the current date and time
           $now = new DateTime();
         
           // Set the updated_at field before saving
           
           $this->setUpdatedAt( $now->format('Y-m-d H:i:s'));
           
         return $this;   
    } 
   
}
