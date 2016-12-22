<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class MailQueue extends Model
{
    protected $table = 'queue';
    protected $fillable = [
        '$message_id',
        '$email_to',
        '$message_body',
        '$message_pattern',
        '$user_name'
    ];

}

