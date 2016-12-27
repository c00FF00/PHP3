<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/Classes/mailToBase.php';
require_once __DIR__ . '/Classes/Message.php';
require_once __DIR__ . '/Classes/Mailer.php';
require_once __DIR__ . '/Lib/ServiceHelpers.php';

function generateD($res)
{
    foreach ($res->answer as $item) {

        yield $item;

    }
}

$subject = 'Оповещение';

$from = 'root@localhost';

$request = new mailToBase('localhost', '8000');

$response = $request->setMethod('get')->sendRequest('message/status/expect');

$mail = new Mailer('localhost', 25);

foreach (generateD($response) as $id) {

    $result = $request->setMethod('get')->sendRequest('message/' . $id);

    $tmpl = __DIR__ . '/templates/' . $result->answer->message_pattern . '.view.php';
    
    if(false == template($tmpl) || false == isEmail($result->answer->email_to)) {

        $request->setMethod('put')->setStatus('error')->sendRequest('message/' . $id);

    } else {
        
        $obj = new Message($result->answer->user_name, $result->answer->message_body, template($tmpl));
        
        $mail->SetContent($obj->message())->Compose($result->answer->email_to, $from, $subject);

        $mail->Send();

        $request->setMethod('put')->setStatus('sent')->sendRequest('message/' . $id); }

}




