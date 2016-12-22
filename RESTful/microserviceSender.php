<?php

require (__DIR__ . '/Classes/mailToBase.php');

$rr = new mailToBase('http://localhost:9925/mail');

$rr->setCommand('commandPut')
    ->setMessageId()
    ->setEmailto('root@localhost.ru')
    ->setUserName('Петя')
    ->setMessageBody('Сообщениеееее')
    ->setMessagePattern('message');

echo $rr->sendRequest(); echo PHP_EOL;
//
