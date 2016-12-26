<?php

require __DIR__ . '/Classes/mailToBase.php';
require_once __DIR__ . '/Classes/Message.php';
require_once __DIR__ . '/Classes/Mailer.php';

//
//function generateD($res) {
//
//    foreach ($res->answer as $item) {
//
//        yield $item;
//
//    }
//
//}
////
//
//$request = new mailToBase('localhost', '8000');
//
//$res = $request->setMethod('get')->sendRequest('message/status/expect');
//
//foreach ( generateD($res) as $id) {
//
//    $rr = $request->setMethod('get')->sendRequest('message/' . $id);
//    print_r($rr->answer);
//
//}

$mail = new Mailer('localhost', 25);

//var_dump($mail->setReadReceiptTo('your@address.tld'));


$mail->Compose('root@localhost', 'root@localhost', 'тест')
     ->setContent(new Message('Петя', 'Сообщение большое', __DIR__ . '/templates/message.view.php'));

$mail->Send();
