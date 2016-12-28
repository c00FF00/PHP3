<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;
use App\Reestr;

class ReestrService extends Controller
{

    public function create(Request $request)
    {

        $record = new Reestr();

        return response()->json(['answer' => $record]);
    }


}