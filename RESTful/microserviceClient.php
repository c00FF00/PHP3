<?php
require (__DIR__ . '/Classes/mailToBase.php');

$request = new mailToBase('localhost', '8000');

$res = $request->setMethod('get')->sendRequest('message/status/expect');





print_r($res);