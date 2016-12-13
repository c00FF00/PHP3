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

    public function service()
    {
        $res = file_get_contents('php://input');
        var_dump($res);
    }


}
