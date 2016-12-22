<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});


$app->post('/server', function() use ($app) {
    $res = json_decode(file_get_contents('php://input'));
    $waiting = 'hello';
//    if ($waiting == $res) {
        return response()->json(['answer' => 'ready']);
//    }
});


$app->post('/mail', 'MailQueueService@index');

$app->get('/client', function() use ($app) {

    $url = 'http://localhost:8000/mail';
 //   $hello = ['request' => 'hello'];
   //$data = ['user_id' => '1', 'email' => 'rr@tt.rr'];

    $data = ['user_id' => '1', 'email' => 'root@localhost', 'body' => 'Сообщение', 'emailpattern' => 'message'];


    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($curl, CURLOPT_HEADER, ['Content-type: application/json']);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($curl);
    var_dump($result);
$answer = trim(explode(PHP_EOL, $result)[0]);
$waiting = 'HTTP/1.0 200 OK';

    //dd($result);

if ($answer == $waiting) {
    return 'OK';
} else {
    return 'ERR';
}
});

