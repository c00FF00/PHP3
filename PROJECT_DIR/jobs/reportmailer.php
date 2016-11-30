<?php

$configfile = __DIR__ . '/reportmailer.json';

$cfg = json_decode(file_get_contents($configfile));

$to = $cfg->to;

$subject = $cfg->subject;

$message = file_get_contents($cfg->messagefile);

$headers = 'From: ' . $cfg->from . "\r\n" .
           'Reply-To: ' . $cfg->replyto . "\r\n" .
           'Content-Type: text/html; charset=utf-8' . "\r\n" .
           'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

?>