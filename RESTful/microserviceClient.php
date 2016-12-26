<?php

require (__DIR__ . '/Classes/mailToBase.php');

$request = new mailToBase('localhost', '8000');

$res = $request->setMethod('get')->sendRequest('message/status/expect');


foreach ($res->answer as $obj) {
    echo $obj->status; echo PHP_EOL;
}



//print_r($res);