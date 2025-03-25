<?php
class Customer_Controller_Account_Profile extends Core_Controller_Customer_Action
{
    public function dashboardAction(){
      

        $customerId = Mage::getSingleton('core/session')->get('customer_id');
        $customerModel = Mage::getModel('customer/account')->load($customerId);

        $layout = Mage::getBlock('core/layout');
        $customerView = $layout->createBlock('customer/account_profile_dashboard');              
        $layout->getChild('content')->addChild('customer',$customerView);
        $layout->getChild('head')->addCss('customer/account/profile/dashboard.css');
        $customerView->setProfile($customerModel);

        $customerInfo = $layout->createBlock('customer/account_profile_dashboard_detail');//->setOrderInfoBlock($orderView);
        $layout->getChild('content')->getChild('customer')->addChild('customer_info',$customerInfo);

        $customerAddress = $layout->createBlock('customer/account_profile_dashboard_address');//->setOrderAddressBlock($orderView);
        $layout->getChild('content')->getChild('customer')->addChild('customer_address',$customerAddress);

        
        $layout->toHtml();
    }

    public function saveAction(){
        $request = Mage::getModel('core/request')->getParam('customer');
        Mage::getModel('customer/account')->setData($request)
                                          ->save();
    }

}
?>