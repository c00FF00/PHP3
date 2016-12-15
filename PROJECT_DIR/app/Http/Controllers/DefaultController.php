<?php

namespace App\Http\Controllers;

use App\EmailToSend;
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

    public function emailprepare()
    {


        return view('emailform');


    }

    public function emailservice()
    {
        $email = new EmailToSend();
        
        $data = json_decode(file_get_contents('php://input'));
        $email->user_id = $data->user_id;
        $email->emailto = $data->email;
        $email->bodymessage = $data->body;
        $email->emailpattern = $data->emailpattern;
        $email->save();

    }

    public function client(Request $request)
    {

        $url = 'http://localhost/server/emailservice';
        $data = ['user_id' => $request->id, 'email' => $request->email, 'body' => $request->body, 'emailpattern' => $request->emailpattern,];
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl, CURLOPT_HEADER, ['Content-type: application/json']);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);

    }


}
