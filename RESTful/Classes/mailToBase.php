<?php

/**
 * Class mailToBase
 */
class mailToBase
{

    protected $url;
    protected $message_id = '';
    protected $email_to = '';
    protected $message_body = '';
    protected $message_pattern = '';
    protected $user_name = '';
    protected $command = '';

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function setCommand($command)
    {
        $this->command = $command;
        return $this;
    }


    public function setMessageId()
    {
        $this->message_id = microtime(true);
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

        foreach ($properties as $key => $value) {

            if ( '' <> $this->$key) {
                $properties[$key] = $this->$key;
            } else {
                unset($properties[$key]);
            }
        }

        return json_encode($properties);

    }

    public function sendRequest()
    {
        $okCode = '200';

        $curl = curl_init($this->url);

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');

        curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-type: application/json']);

        curl_setopt($curl, CURLOPT_POSTFIELDS, $this->getJsonData());

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($curl);

        $data = json_decode($result);

        if (is_null($data)) {

            return null;

        } else {

            return $data->answer;

        }
    }
}



