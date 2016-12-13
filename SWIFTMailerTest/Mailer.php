<?php

require_once __DIR__ . '/vendor/autoload.php';

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
        return $this;
    }

    public function Compose($to, $from, $subject)
    {

        $this->message = Swift_Message::newInstance()
            ->setSubject($subject)
            ->setFrom($from)
            ->setTo($to)
            ->addPart($this->content, 'text/html');
        return $this;

    }

    protected function validateEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function Send()
    {
        $this->mailer->send($this->message);
    }

}


$mail = new Mailer('localhost', 25);

$mail->Compose('root@localhost', 'root@localhost', 'тест')->setContent(__DIR__ . '/composer.json')->Send();
