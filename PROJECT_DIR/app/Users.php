<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
    protected $fillable = ['name', 'patronymic', 'family', 'email', 'roles_id'];
    protected $comment = 'template';
    protected $firstName = 'Имя';
    protected $lastName = 'Фамилия';


    public function roles()
    {
        return $this->belongsTo('App\Roles', 'roles_id');
    }

    /**
     * @template "$firstName $lastName"
     *
     */
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

    /**
     * @template "$firstName $lastName"
     *
     */
    public function getFullName()
    {

        $name = $this->getTagComment($this->comment);

        $name1 = str_replace('$', '', $name[1]);
        $name2 = str_replace('$', '', $name[2]);

        return  $this->$name1 . ' ' . $this->$name2;

    }



    public function getTagComment($commentkey)
    {
        $reflect = new \ReflectionMethod('App\Users', 'getFullName');
        $this->comment = $reflect->getDocComment();

        $pattern = '@' . $commentkey . '.*';

        preg_match('/' . $pattern . '/', $this->comment, $result);
        preg_replace('/\s+/', ' ', $result[0]);

        $tmp = str_replace('"', '', $result[0]);

        $element = explode(' ', $tmp);

        unset($element[0]);

        return $element;

    }

    
}





