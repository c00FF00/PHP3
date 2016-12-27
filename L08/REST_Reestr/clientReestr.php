<?php


//$curl = curl_init('https://www.nalog.ru/opendata/7707329152-registerdisqualified/data-25122016-structure-24062015.csv');

curl_setopt($curl, CURLOPT_CUSTOMREQUEST, strtoupper('get'));

//curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-type: application/json']);
//
//curl_setopt($curl, CURLOPT_POSTFIELDS, $this->getJsonData());

//curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

//$result = curl_exec($curl);

//$reestr = explode(PHP_EOL, $result);

$reestr = file_get_contents('https://www.nalog.ru/opendata/7707329152-registerdisqualified/data-25122016-structure-24062015.csv');

$count = 0;

$res = explode("\n",$reestr);

foreach ($res as $stro) {
    print_r(explode(';', $stro));
    $count++;
}

echo $count;




