<?php





//$date = date('Y-m-d','22.02.1957');

$date = implode('-', array_reverse(explode('.', '22.02.1957')));

//$date = implode('-', $date);



var_dump($date);