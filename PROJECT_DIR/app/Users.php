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

    public static function detail($name, $patronymic, $family, $email)
    {

        if (!empty($name) && !empty($patronymic) && !empty($family)) {

            return $name . ' ' . $patronymic . ' ' . $family;

        } elseif (!empty($name) && !empty($family)) {

            return $name . ' ' . $family;

        } elseif (empty($name) || empty($family)) {

            return $email;

        } else {

            return null;

        }

    }

}
