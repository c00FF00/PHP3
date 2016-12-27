<?php

class Mailer extends Swift
{

    protected $mailer;
    protected $content = null;

    public function __construct(string $smtpHost, int $port)
    {
        $this->mailer = Swift_Mailer::newInstance(Swift_SmtpTransport::newInstance($smtpHost, $port));
    }

    public function setContent($obj)
    {
        $this->content = $obj;
        return $this;
    }

    public function Compose($to, $from, $subject)
    {

        $this->message = Swift_Message::newInstance()
             ->setSubject($subject)
             ->setFrom($from)
             ->setTo($to)
             ->setBody($this->content, 'text/html');
    }

    public function Send()
    {
        $this->mailer->send($this->message);
    }

}
