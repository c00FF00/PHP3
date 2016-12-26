<?php

class Message
{

    protected $name;
    protected $message;
    protected $template;

    public function __construct($name, $message, $pathtotemplate)
    {

        if (is_file($pathtotemplate)) {

            $this->name = $name;
            $this->message = $message;
            include $pathtotemplate;

        } else {

            return false;

        }


    }




}


