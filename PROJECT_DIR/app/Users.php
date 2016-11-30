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

    public function detail()
    {

        if (!empty($this->name) && !empty($this->patronymic) && !empty($this->family)) {

            return $this->name . ' ' . $this->patronymic . ' ' . $this->family;

        } elseif (!empty($this->name) && !empty($this->family)) {

            return $this->name . ' ' . $this->family;

        } elseif (empty($this->name) || empty($this->family)) {

            return $this->email;

        } else {

            return null;

        }

    }

}
