<?php

namespace App\Http\Controllers;

use App\MailQueue;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;
use App\Reestr;


class ReestrService extends Controller
{

    public function create(Request $request)
    {

        $record = Reestr::create($request->all());

    }


}