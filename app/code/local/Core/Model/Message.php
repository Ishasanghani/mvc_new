<?php
class Core_Model_Message extends Core_Model_Session
{
    public function addMessage($type, $message)
    {
        $add = "add" . ucfirst($type);
        $this->$add($message);
        // echo "<pre>";
    }

    public function addError($message)
    {
        $message_array = $this->get('message');
        if (isset($message_array)) {
            $message_array['error'] = $message;
            $this->set("message", $message_array);
        } else {
            $this->set('message', ['error' => $message]);
        }

        // print_r($_SESSION); 
    }

    public function addSuccess($message)
    {
        $message_array = $this->get('message');
        if (isset($message_array)) {
            $message_array['sucess'] = $message;
            $this->set("message", $message_array);
        } else {
            $this->set('message', ['sucess' => $message]);
        }

        // print_r($_SESSION); 
    }

    public function addWarning($message)
    {
        $message_array = $this->get('message');
        if (isset($message_array)) {
            $message_array['warning'] = $message;
            $this->set("message", $message_array);
        } else {
            $this->set('message', ['warning' => $message]);
        }

        // print_r($_SESSION); 
    }

    public function getMessage($type)
    {
        $type = "get" . ucfirst($type);
        return $this->$type();
    }

    public function getError()
    {
        if (isset($this->get("message")["error"])) {
            $message = $this->get("message")["error"];
            $this->removeMessage("error");
            return $message;
        }
    }
    public function getSuccess()
    {
        if (isset($this->get("message")["success"])) {
            $message = $this->get("message")["success"];
            $this->removeMessage("success");
            return $message;
        }
    }
    public function getWarning()
    {
        if (isset($this->get("message")["warning"])) {
            $message = $this->get("message")["warning"];
            $this->removeMessage("warning");
            return $message;
        }
    }
}
