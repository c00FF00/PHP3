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

$app->post('/message', 'MailQueueService@create');
$app->get('/message', 'MailQueueService@index');
$app->get('/message/{id:[0-9]+}', 'MailQueueService@show');
$app->get('/message/status/{status}', 'MailQueueService@showstatus');
$app->put('/message/{id:[0-9]+}', 'MailQueueService@update');
