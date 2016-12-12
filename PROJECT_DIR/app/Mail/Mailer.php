<?php

require_once __DIR__ . '/../../bootstrap/autoload.php';

class Mailer extends Swift
{

    protected $mailer;
    protected $content = '';

    public function __construct(string $smtpHost, int $port)
    {
        $this->mailer = Swift_Mailer::newInstance(Swift_SmtpTransport::newInstance($smtpHost, $port));
    }

    public function setContent($fullpath)
    {
        $this->content = file_get_contents($fullpath);
    }

    public function Send($to, $from, $subject)
    {
        if ($this->validateEmail($to) && $this->validateEmail($from)) {
            $message = Swift_Message::newInstance()
                ->setSubject($subject)
                ->setFrom($from)
                ->setTo($to)
                ->addPart($this->content, 'text/html');

            $this->mailer->send($message);

            return true;

        } else {

            return false;

        }

    }

    protected function validateEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

}

