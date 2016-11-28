<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
    protected $fillable = ['user', 'roles_id'];

    public function Roles()
    {
        return $this->belongsTo('App\Roles', 'roles_id');
    }

}
