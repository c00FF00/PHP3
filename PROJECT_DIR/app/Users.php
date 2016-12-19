<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
    protected $fillable = ['name', 'patronymic', 'family', 'email', 'roles_id'];
    protected $template = '';

    public function roles()
    {
        return $this->belongsTo('App\Roles', 'roles_id');
    }

    public function setTemplateFullName($template)
    {
        $this->template = $template;
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

    /**
     * @template "$firstName $lastName"
     *
     */
    public function getFullName($firstName, $patrName, $lastName, $email)
    {
        $template = $this->getTemplateFullName($this->template);

        if ($template) {

            switch ($template) {

                case '@template $firstName $lastName' :
                    $patrName = '';
                    $email = '';
                    return static::detail($firstName, $patrName, $lastName, $email);
                    break;

                case '@template $lastName $firstName' :
                    $patrName = '';
                    $email = '';
                    return static::detail($lastName, $patrName, $firstName, $email);
                    break;

                default :
                    return static::detail($firstName, $patrName, $lastName, $email);
            }

        } else {

            return static::detail($firstName, $patrName, $lastName, $email);

        }


    }

    protected function getTemplateFullName($commentkey)
    {
        $reflect = new \ReflectionMethod('App\Users', 'getFullName');

        $comment = $reflect->getDocComment();

        if (false <> $comment) {

            $pattern = '@' . $commentkey . ' .*';

            if (true == preg_match('/' . $pattern . '/', $comment, $result)) {

                $tmp = preg_replace('/\s+/', ' ', trim($result[0]));

                $template = str_replace('"', '', $tmp);

                return $template;

            } else {

                return false;
            }

        } else {

            return false;

        }

    }

}





