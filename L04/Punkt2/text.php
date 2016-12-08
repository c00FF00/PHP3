<?php

require __DIR__ . '/TextHandler.php';

define('DL', ';');

$text = file_get_contents('/var/www/html/PHP3/htdocs/current/app/Mail/reportvisitors.php');

$handler = new TextHandler();
$a = $handler->makeLine($text, DL);
$b = $handler->makeArrayOfLines($a, DL);

//var_dump(str_replace(["  "], " ", $a));

//preg_match('/\$.*/', $a, $result);

//$dd = preg_replace('/\s\s+/', ' ', $a);
//var_dump(preg_replace('/ ->/', '->', $dd));

$raw = $handler->removeSpace($a);

$aa = str_replace(';', ' ', $raw);

//echo $aa;


$result = (explode(' $', $aa));

$counter = 0;
$chain = '';

foreach ($result as $s)
{
     
     $handler->getCountChain($s);
}



//preg_match('/( [$].*->[a-z].*)/', $aa, $result);

//var_dump($result);


//foreach ($b as $stroka) {
//
//    preg_match('/\$.*/', $stroka, $result);
//
//    var_dump($result);
//}
//echo str_replace(' ', '', $a);


//$b = $handler->makeArrayOfLines($a, DL);

//var_dump($b);