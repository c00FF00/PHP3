<?php

require __DIR__ . '/Test.php';


$format1 = "Запрошено приложением байт%'.20d" . PHP_EOL;
$format2 = "Выделено PHP байт.........%'.20d" . PHP_EOL;
$format3 = "Пиковое значение байт.....%'.20d" . PHP_EOL;


echo 'Версия PHP ' . phpversion();
echo PHP_EOL;
echo PHP_EOL;

printf($format1, memory_get_usage(false));
printf($format2, memory_get_usage(true));

$count = 1000000;

while ($count) {

    $obj = new Test();
    $obj->value = random_int(1, 1000000);
    $obj->self = $obj;

    if (false == ($count % 500)) {
        echo $count . ' ';
        printf($format3, memory_get_peak_usage(true));
    }

    --$count;
}


echo PHP_EOL;

