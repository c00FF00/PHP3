<?php

require __DIR__ . '/classes/TextHndlr.php';

$handler = new TextHndlr();

$path ='/var/www/html/PHP3/htdocs/current/app/Mail/reportvisitors.php';

$handler->text = file_get_contents($path);

$text = $handler->makeLine()->spacesToOneSpace()->semicolonToOneSpace()->getText();

$result = $handler->makeArrayOfLines($text, ' $');

echo $handler->searchMaxChain($result, '->');
