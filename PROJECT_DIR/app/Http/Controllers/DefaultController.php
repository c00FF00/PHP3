<?php

namespace App\Http\Controllers;

use App\EmailToSend;
use App\Config;
use App\configOptions;
use Illuminate\Http\Request;

class DefaultController extends Controller
{

    protected $template = 'bestseller';

    public function index()
    {
        $domain = config('app.domain');
        return view('index')->with(compact('domain'));
    }

    public function emailprepare()
    {


        return view('emailform');


    }

    public function emailservice()
    {
        $email = new EmailToSend();
        
        $data = json_decode(file_get_contents('php://input'));
        //var_dump($data); die;
        $email->user_id = $data->user_id;
        $email->emailto = $data->email;
        $email->bodymessage = $data->body;
        $email->emailpattern = 'asdfasdfasdf';
        $email->save();

       // var_dump($data); echo $data->fooo;
//        $data->fooo = $data->fooo;
    }

    public function client()
    {

//        var_dump($_POST); die;

        $url = 'http://localhost/server/emailservice';
        $data = ['user_id' => $_POST['id'], 'email' => $_POST['email'], 'body' => $_POST['body']];
//        $data = ['user_id' => 1, 'email' => 'email', 'body' => 'body'];
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
