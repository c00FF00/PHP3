<?php

namespace App\Http\Controllers;

use App\Config;
use App\configOptions;
use Illuminate\Http\Request;

class DefaultController extends Controller
{

    public function index()
    {
        $domain = config('app.domain');
        return view('index')->with(compact('domain'));
    }

    public function server()
    {
        $data = json_decode(file_get_contents('php://input'));
        var_dump($data); echo $data->fooo;
//        $data->fooo = $data->fooo;
    }

    public function client()
    {
        $url = 'http://localhost/server';
        $data = ['fooo' => 42, 'dddd' => 'Опоздал'];
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl, CURLOPT_HEADER, ['Content-type: application/json']);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        echo $result;
        var_dump($result);
        die;


    }


}
