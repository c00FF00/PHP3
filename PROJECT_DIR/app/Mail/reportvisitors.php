<?php

require __DIR__.'/../../bootstrap/autoload.php';

$transport = Swift_SmtpTransport::newInstance('localhost', 25);

$mailer = Swift_Mailer::newInstance($transport);

$body = file_get_contents(__DIR__ . '/../../resources/views/email/visitors.blade.php');

$message = \Swift_Message::newInstance()
            ->setSubject('VisitorsReport')
            ->setFrom(['webmaster@localhost' => 'Web Master'])
            ->setTo(['root@localhost' => 'Root'])
            ->addPart($body, 'text/html');

$mailer->send($message);

