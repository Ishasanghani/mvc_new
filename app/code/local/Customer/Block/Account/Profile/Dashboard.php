<?php
class Customer_Block_Account_Profile_Dashboard extends Core_Block_Template{
    protected $_customerData = null;

    public function __construct()
    {
        $this->setTemplate('customer/account/profile/dashboard.phtml');
    }

    public function setProfile($customerModel)
    {
       $this->_customerData = $customerModel;
       return $this;
    } 

    public function getProfile()
    {
        return $this->_customerData;
    }
}
?>