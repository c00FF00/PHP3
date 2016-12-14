<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailToSend extends Model
{
    protected $table = 'mailqueue';
    protected $fillable = ['user_id', 'bodymessage', 'emailpattern', 'status'];

    public function user()
    {
        return $this->belongsTo('App\Users', 'user_id');
    }



}
