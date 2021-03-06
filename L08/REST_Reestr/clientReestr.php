<?php

require_once __DIR__ . '/HelperLib.php';

$conf = include __DIR__ . '/config.php';

$curl = curl_init($conf['urlAPI'] . '/create');

curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');

curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-type: application/json']);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$fullurl = makeRegisterdisqualifiedURL($conf['urlPage'], $conf['csvPattern']);

$reestr = file($fullurl, FILE_SKIP_EMPTY_LINES);

unset($reestr[0]);

$counAll = count($reestr);

$count = 1;

$data = [];

echo 'All records: ' . $counAll;
echo PHP_EOL;

foreach ($reestr as $stro) {
    $temp = explode(';', $stro);
    $data['number_of_the_record'] = $temp[0];
    $data['full_name'] = $temp[1];
    $data['date_of_birth'] = formatDate($temp[2]);
    $data['place_of_birth'] = $temp[3];
    $data['name_of_the_organization'] = $temp[4];
    $data['number_of_the_organization'] = $temp[5];
    $data['post_of_the_person'] = $temp[6];
    $data['administrative_code'] = $temp[7];
    $data['punitive_organization'] = $temp[8];
    $data['name_of_the_judge'] = $temp[9];
    $data['position_of_the_judge'] = $temp[10];
    $data['period_of_ineligibility'] = $temp[11];
    $data['start_date'] = formatDate($temp[12]);
    $date_of_expiry = removeControlCharacter($temp[13]);
    $data['date_of_expiry'] = formatDate($date_of_expiry);

    $jsonData = json_encode($data);

    curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonData);

    $result = curl_exec($curl);

    $response = json_decode($result);

    if ('saved' == $response->answer) {
        echo 'Saved record: ' . $count;
        echo "\r";
    } else {
        echo 'Get Error:    ' . $response->answer;
        echo PHP_EOL;
    }

    $count++;
}

echo PHP_EOL;


