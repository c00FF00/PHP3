<?php

namespace App\Http\Controllers;

use App\Config;
use App\configOptions;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function index()
    {
        $domain = configOptions::domain();
        return view('index')->with(compact('domain'));
    }
}
