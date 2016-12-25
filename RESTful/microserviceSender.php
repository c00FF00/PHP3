<?php

require (__DIR__ . '/Classes/mailToBase.php');

$rr = new mailToBase('http://localhost:8000');

$rr->setCommand('commandPut')
    ->setMessageId()
    ->setEmailto('root@localhost.ru')
    ->setUserName('Петяdddddddddd')
    ->setMessageBody('Сообщениеееее')
    ->setMessagePattern('message');

echo $rr->sendRequest(); echo PHP_EOL;
//
