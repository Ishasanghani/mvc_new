<?php
class Customer_Model_Account extends Core_Model_Abstract{
    public function init()
    {
        $this->_resourceClassName = "Customer_Model_Resource_Account";
        $this->_collectionClass = "Customer_Model_Resource_Account_Collection";
    }

    public function _afterSave(){
    
        $customerId = $this->getCustomerId();
        Mage::getModel('customer/account_address')->setCustomerId($customerId)
                                                  ->setData($this->getData())
                                                  ->setDefaultAddress(1)
                                                  ->save();
    }

   

    public function getAddressCollection()
    {
        return Mage::getModel('customer/account_address')
                    ->getCollection()
                    ->addFieldToFilter('customer_id', $this->getCustomerId());
    }
}
?>