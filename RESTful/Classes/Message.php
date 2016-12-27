<?php

class Message
{

    protected $name;
    protected $body;
    protected $template;

    public function __construct($name, $message, $pathtotemplate)
    {
        if (is_file($pathtotemplate)) {

            $this->name = $name;
            $this->body = $message;
            ob_start();
            include $pathtotemplate;
            $this->template = ob_get_contents();
            ob_end_clean();
        
        } else {

            $this->template = false;

        }
    }

    public function message()
    {

        return $this->template;

    }

}

