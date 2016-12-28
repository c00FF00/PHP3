<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Reestr extends Model
{
    protected $table = 'reestr';
    protected $fillable = [
        'number_of_the_record',
        'full_name',
        'date_of_birth',
        'place_of_birth',
        'name_of_the_organization',
        'number_of_the_organization',
        'post_of_the_person',
        'administrative_code',
        'punitive_organization',
        'name of_the_judge',
        'position_of_the_judge',
        'period_of_ineligibility',
        'start_date',
        'date_of_expiry'
    ];
}

