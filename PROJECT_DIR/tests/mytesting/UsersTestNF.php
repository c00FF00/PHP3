<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UsersTestNF extends TestCase
{
  
    protected $comment = '';
    protected $firstName = 'Имя';
    protected $lastName = 'Фамилия';

    public function __construct()
    {

        $reflect = new ReflectionMethod('App\Users', 'detail');
        $this->comment = $reflect->getDocComment();
        var_dump($this->getTagComment('template')); die;

    }


    public function testNameFamily()
    {
        $this->assertEquals('Имя Фамилия', App\Users::detail('Имя', '', 'Фамилия', 'root@localhost'));
    }

    public function getTagComment($commentkey)
    {

        $pattern = '@' . $commentkey . '.*';
        preg_match('/' . $pattern . '/', $this->comment, $result);
        preg_replace('/\s+/', ' ', $result[0]);
        $tmp = str_replace('"', '', $result[0]);
        $res =  explode(' ', $tmp);
        unset($res[0]);
        return $res;
//        foreach ($res as $r)
//        {
//            if ($r == '$firstName') {
//            }
//        }
//        return $res;
    }
}
