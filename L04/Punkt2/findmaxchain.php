<?php

require __DIR__ . '/classes/TextHandler.php';

$handler = new TextHandler();

$handler->text = file_get_contents('/var/www/html/PHP3/htdocs/current/app/Mail/reportvisitors.php');
$handler->text = $handler->makeLine();
$handler->text = $handler->spacesToOneSpace();
$handler->text = $handler->semicolonToOneSpace();

$result = $handler->makeArrayOfLines($handler->text, ' $');

echo $handler->searchMaxChain($result, '->');
