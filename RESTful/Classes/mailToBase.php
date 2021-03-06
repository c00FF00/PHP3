<?php

class mailToBase
{

    protected $url;
    protected $user_id = '';
    protected $email_to = '';
    protected $message_body = '';
    protected $message_pattern = '';
    protected $user_name = '';
    protected $command = '';
    protected $status = '';
    protected $method = '';

    public function __construct($host, $port)
    {
	$this->url = 'http://' . $host . ':' . $port;
    }

    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    public function setCommand($command)
    {
        $this->command = $command;
        return $this;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function setEmailto($emailto)
    {
        $this->email_to = $emailto;
        return $this;
    }

    public function setMessageBody($message_body)
    {
        $this->message_body = $message_body;
        return $this;
    }
    
    public function setMessagePattern($message_pattern)
    {
        $this->message_pattern = $message_pattern;
        return $this;
    }

    public function setUserName($user_name)
    {
        $this->user_name = $user_name;
        return $this;
    }

    public function getJsonData()
    {
        $properties = get_class_vars(__CLASS__);

        unset($properties['url']);
        unset($properties['method']);

        foreach ($properties as $key => $value) {

            if ( '' <> $this->$key) {
                $properties[$key] = $this->$key;
            } else {
                unset($properties[$key]);
            }
        }

        return json_encode($properties);

    }

    public function sendRequest($urlpath = null)
    {
        
        $curl = curl_init($this->url . '/' . $urlpath);

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, strtoupper($this->method));

        curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-type: application/json']);

        curl_setopt($curl, CURLOPT_POSTFIELDS, $this->getJsonData());

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($curl);

        $data = json_decode($result);

        if (is_null($data)) {

            return null;

        } else {

            return $data;

        }
    }
}



