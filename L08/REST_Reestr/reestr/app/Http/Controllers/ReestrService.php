<?php

namespace App\Http\Controllers;

use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;
use App\Reestr;

class ReestrService extends Controller
{

    public function create(Request $request)
    {

        $record = new Reestr();
        $record->number_of_the_record = $request->number_of_the_record;
        $record->full_name = $request->full_name;
        $record->date_of_birth = $request->date_of_birth;
        $record->place_of_birth = $request->place_of_birth;
        $record->name_of_the_organization = $request->name_of_the_organization;
        $record->number_of_the_organization = $request->number_of_the_organization;
        $record->post_of_the_person = $request->post_of_the_person;
        $record->administrative_code = $request->administrative_code;
        $record->punitive_organization = $request->punitive_organization;
        $record->name_of_the_judge = $request->name_of_the_judge;
        $record->position_of_the_judge = $request->position_of_the_judge;
        $record->period_of_ineligibility = $request->period_of_ineligibility;
        $record->start_date = $request->start_date;
        $record->date_of_expiry = $request->date_of_expiry;
        try {
            $record->save();
            return response()->json(['answer' => 'saved']);
        } catch (\Exception $e) {
            return response()->json(['answer' => $e->getCode()]);
        }

    }


}