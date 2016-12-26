<?php

require (__DIR__ . '/Classes/mailToBase.php');
require_once __DIR__ . '/Classes/Message.php';
require_once __DIR__ . '/Classes/Mailer.php';

//$request = new mailToBase('localhost', '8000');
//
//$res = $request->setMethod('get')->sendRequest('message/status/expect');
////
////function generateData($res) {
////
////    while ($res) {
////        yield $res->answer;
////    }
////}
//
//
//
//foreach ($res->answer as $obj) {
//    echo $obj->status; echo PHP_EOL;
//}

$mail = new Mailer('localhost', 25);

$content = new Message('Петя', 'MESSA', __DIR__ . '/../templates/message.view.php');

$mail->Compose('root@localhost', 'root@localhost', 'тест')
    ->setContent('SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS')
    ->Send();
