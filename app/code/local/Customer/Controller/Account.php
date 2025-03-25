<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Customer_Controller_Account //extends Core_Controller_Customer_Action
{
    protected $_allowedAction = ['login', 'registration', 'reset', 'validate'];

    public function loginAction()
    {
        $layout = Mage::getBlock('core/layout');
        $login = $layout->createBlock('customer/account_login')
            ->setTemplate('customer/account/login.phtml');
        $layout->getChild('content')->addChild('login', $login);
        $layout->getChild('head')->addCss('customer/account/login.css');
        $layout->toHtml();
    }

    public function validateAction()
    {
        $loginData = Mage::getModel('core/request')->getParam('customer_account');
        $email = $loginData['email'];
        $password = $loginData['password_hash'];

        $data = Mage::getModel('customer/account')->load($email, 'email');
        if (is_null($data->getData())) {
            header('location:http://localhost/mvc_new/Customer/Account/login');
        } else if ($data->getPassword() == $password) {


            Mage::getSingleton('core/session')->set('customer_id', $data->getCustomerId());
            $url = Mage::getBaseUrl();

            header("Location: $url");
        }
    }

    public function logoutAction()
    {
        Mage::getSingleton('core/session')->remove('customer_id');
    }

    public function registrationAction()
    {
        $layout = Mage::getBlock('core/layout');
        $register = $layout->createBlock('customer/account_registration')
            ->setTemplate('customer/account/registration.phtml');
        $layout->getChild('content')->addChild('register', $register);
        $layout->getChild('head')->addCss('customer/account/registration.css');
        $layout->toHtml();
    }

    public function saveAction()
    {
        $customerData = Mage::getModel("core/request")->getParam('customer');
        print_r($customerData);
        $layout = Mage::getBlock('core/layout');
        $customer = Mage::getModel('customer/account')->setData($customerData);
        $customer->save();
        $url = $layout->getUrl("*/*/login");
        header("Location: $url");
    }

    public function forgetpasswordAction()
    {
        $layout =  Mage::getBlock('core/layout');
        $view = $layout->createBlock('Customer/Account_Forgetpassword')
            ->setTemplate('customer/account/forgetpassword.phtml');
        $layout->getChild('content')
            ->addChild('forgetpassword', $view);
        $layout->toHtml();
    }


    public function forgetAction()
    {
        
        $requestEmail = Mage::getModel('core/request')->getParam('email');

        require 'vendor/autoload.php';

        $mail = new PHPMailer(true);
        $customer = Mage::getModel('customer/account')
            ->getCollection()
            ->addFieldToFilter('email', ['=' => $requestEmail])
            ->getdata();
       
        if (empty($customer)) {
            header("Location: http://localhost/mvc_new/customer/account/forgetpassword");
        } else {
            $otp = rand(1000, 9999);

            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'ishasanghani06@gmail.com'; // Replace with your email
                $mail->Password = 'xitg bpav iydy xuve'; // Use App Password, not your Gmail password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->setFrom('ishasanghani06@gmail.com', 'Sanghani Isha');
                $mail->addAddress($requestEmail);
                $mail->isHTML(true);
                $mail->Subject = "Your One-Time Password (OTP)";
                $mail->Body = "Dear User,\n\nYour OTP is: $otp\n\nThis OTP is valid for 10 minutes. Do not share it.";
                $mail->send();

                // Store OTP in session
                $session = Mage::getSingleton('core/session');
                $session->set('forgot_password_otp', $otp);
                $session->set('forgot_password_otp_time', time());
                $session->set('forgot_password_email', $requestEmail);
                header("Location: http://localhost/mvc_new/customer/account/verifyotp");

                echo 'Email sent successfully!';
            } catch (Exception $e) {
                echo "Error sending email: {$mail->ErrorInfo}";
            }
        }
    }


    public function verifyotpAction()
    {
        $layout =  Mage::getBlock('core/layout');
        $view = $layout->createBlock('Customer/Account_verifyotp')
            ->setTemplate('customer/account/verifyotp.phtml');
        $layout->getChild('content')
            ->addChild('verifyotp', $view);
        $layout->toHtml();
    }

    public function verifyAction()
    {
        $request = Mage::getModel('core/request');
        $enteredOtp = $request->getParam('otp');


        if (empty($enteredOtp)) {
            header("Location: http://localhost/mvc_new/customer/account/verify");
        }

        $session = Mage::getSingleton('core/session');
        $storedOtp = $session->get('forgot_password_otp');
        $otpTime = $session->get('forgot_password_otp_time');
        $email = $session->get('forgot_password_email');

        if (empty($storedOtp) || empty($otpTime) || empty($email)) {
            header("Location: http://localhost/mvc_new/customer/account/forgetpassword");
        }

        if (time() - $otpTime > 600) {
            header("Location: http://localhost/mvc_new/customer/account/forgetpassword");
        }

        if ($enteredOtp == $storedOtp) {
            header("Location:http://localhost/mvc_new/customer/account/createpassword");
        } else {
            header("Location: http://localhost/mvc_new/customer/account/verifyotp");
        }
    }
    public function createpasswordAction()
    {

        $layout =  Mage::getBlock('core/layout');
        $view = $layout->createBlock('Customer/Account_Createpassword')
            ->setTemplate('customer/account/createpassword.phtml');
        $layout->getChild('content')
            ->addChild('createpassword', $view);
        $layout->toHtml();
    }
    public function newPasswordAction()
    {
        $session = Mage::getSingleton('core/session');
        $request = Mage::getModel('core/request');
        $password = $request->getParam('password');
        $email = $session->get('forgot_password_email');

        if (empty($password) || empty($email)) {
            header("Location: http://localhost/mvc_new/customer/account/forgetpassword");
        }

        try {
            $customerModel = Mage::getModel('customer/account')
                ->load($email, 'email');

            $customerData = $customerModel->getData();
            $customerData['password'] = $password;
            $setpassword = Mage::getModel('customer/account')
                ->setdata($customerData)
                ->save();

            $session->remove('forgot_password_otp');
            $session->remove('forgot_password_otp_time');
            $session->remove('forgot_password_email');

            header("Location: http://localhost/mvc_new/customer/account/login");
        } catch (Exception $e) {
            header("Location: http://localhost/mvc_new/customer/account/forgetpassword");
        }
    }
}
