<?php

function getCountChain($word)
{
    $res = explode('->', $word);
    return count($res) - 1;
}

function prepareText($text)
{
    
}


$text = 'require __DIR__.\'/../../bootstrap/autoload.php\';

$transport = Swift_SmtpTransport::newInstance(\'localhost\', 25);

$mailer = Swift_Mailer::newInstance($transport);

$body = file_get_contents(__DIR__ . \'/../../resources/views/email/visitors.blade.php\');

$message = \Swift_Message::newInstance()
            ->setSubject(\'VisitorsReport\')
            ->setFrom([\'webmaster@localhost\' => \'Web Master\'])
            ->setTo([\'root@localhost\' => \'Root\'])
            ->addPart($body, \'text/html\');

$mailer->send($message);
';


$o = trim($text);
$a = str_replace(["\r","\n"],"", $o);
$b = str_replace([';'],";\n",$a);
$d = explode(';', $b);
//var_dump($d);



foreach ($d as $stro)
{

echo getCountChain($stro);
    echo PHP_EOL;

}









