<?php
class Customer_Controller_Account_Address extends Core_Controller_Customer_Action
{
    public function saveAction()
    {
        $layout = Mage::getBlock('core/layout');
        $address = Mage::getModel('core/request')->getParam('customer_address');
        print_r($address);
        Mage::getModel('customer/account_address')->setData($address)
            ->save();
        $url = $layout->getUrl("customer/account_profile/dashboard");
        header("Location: $url");
    }

    public function removeAction()
    {
        $layout = Mage::getBlock('core/layout');
        $addressId = Mage::getModel('core/request')->getQuery('address_id');
        Mage::getModel('customer/account_address')->load($addressId)
            ->delete();
        $url = $layout->getUrl("customer/account_profile/dashboard");
        header("Location: $url");
    }

    public function setdefaultAction()
    {
        $addressId = Mage::getModel('core/request')->getQuery('address_id');
        $customerId = Mage::getModel('core/session')->get('customer_id');
        $addressModel = Mage::getModel('customer/account_address');
        $addressData = $addressModel->getCollection()
                                    ->addFieldToFilter('customer_id',$customerId)
                                    ->getData();
        foreach($addressData as $address)
        {
            if($address->getAddressId() == $addressId){
                $addressModel->setDefaultAddress(1)
                             ->setAddressId($address->getAddressId())
                             ->save();
            }else{
                $addressModel->setDefaultAddress(0)
                             ->setAddressId($address->getAddressId())
                             ->save();
            }
        }
    }
}
