<?php 
class Customer_Block_Account_Profile_Dashboard_Address extends Core_Block_Template{
    public function __construct(){
        $this->setTemplate('customer/account/profile/dashboard/address.phtml');
    } 

    public function getAddress()
    {
        return  $this->getParent()
                     ->getProfile()
                     ->getAddressCollection()
                     ->getData();
                       
    }
}
?>