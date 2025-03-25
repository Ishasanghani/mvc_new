<?php 
class Customer_Block_Account_Profile_Dashboard_Detail extends Core_Block_Template{
    public function __construct(){
        $this->setTemplate('customer/account/profile/dashboard/detail.phtml');
    } 

    public function getCustomerData()
    {
        return  $this->getParent()
                     ->getProfile();
                  
    }
}
?>