<?php
class Core_Block_Message extends Core_Block_Template
{

    public function __construct()
    {
        $this->setTemplate('page/message.phtml');
    }

    public function getMessageModel()
    {
        return Mage::getModel('core/message');
    }
    public function addMessage($type, $message)
    {
        $this->getMessageModel()->addMessage($type, $message);
    }
    public function getErrorMessage()
    {
        return $this->getMessageModel()->getMessage('error');
    }
    public function getSuccessMessage()
    {
        return $this->getMessageModel()->getMessage('success');
    }
    public function getWarningMessage()
    {
        return $this->getMessageModel()->getMessage('warning');
    }
}
