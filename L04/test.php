<?php


function arr(int $x)
{
    return range(0, $x);
}

$format1 = "Запрошено приложением байт%'.20d" . PHP_EOL;
$format2 = "Выделено PHP байт.........%'.20d" . PHP_EOL;
$format3 = "Пиковое значение байт.....%'.20d" . PHP_EOL;


echo 'Версия PHP ' . phpversion();
echo PHP_EOL;
echo PHP_EOL;
printf($format1, memory_get_usage(false));
printf($format2, memory_get_usage(true));
arr(1000000);
printf($format3, memory_get_peak_usage(true));
echo PHP_EOL;