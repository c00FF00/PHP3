<?php
$url = 'http://localhost/mails';
$data = ['command' => 'commandSend'];
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($curl, CURLOPT_HEADER, ['Content-type: application/json']);
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($curl);
