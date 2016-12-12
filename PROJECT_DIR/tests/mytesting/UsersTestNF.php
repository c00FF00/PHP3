<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UsersTestNF extends TestCase
{

    protected $comment = '';
    protected $firstName = '';
    protected $lastName = '';
    protected $patronymic = '';
    protected $email = 'root@localhost';
    protected $template = 'template';

    public function __construct()
    {

        $reflect = new ReflectionMethod('App\Users', 'detail');
        $this->comment = $reflect->getDocComment();
        $this->setPropertiesValue();

    }


    public function testNameFamily()
    {
        $this->assertEquals('Имя Фамилия', App\Users::detail($this->firstName, $this->patronymic, $this->lastName, $this->email));
    }

    public function getTagComment($commentkey)
    {

        $pattern = '@' . $commentkey . '.*';
        preg_match('/' . $pattern . '/', $this->comment, $result);
        preg_replace('/\s+/', ' ', $result[0]);
        $tmp = str_replace('"', '', $result[0]);
        $res = explode(' ', $tmp);
        unset($res[0]);
        return $res;

    }

    protected function setValue($key, $firstName, $patronymic, $lastName )
    {

        switch ($key) {
            case '$firstName' :
                $this->firstName = $firstName;
                break;
            case '$lastName':
                $this->lastName = $lastName;
                break;
            case '$patronymic':
                $this->patronymic = $patronymic;
            default:
                return false;

        }

    }

    protected function setPropertiesValue()
    {

        foreach ($this->getTagComment($this->template) as $key)
        {
            $this->setValue($key, 'Имя', 'Отчество', 'Фамилия');
        }

    }
}
