<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
    protected $fillable = ['name', 'patronymic', 'family', 'email', 'roles_id'];

    public function roles()
    {
        return $this->belongsTo('App\Roles', 'roles_id');
    }

}
