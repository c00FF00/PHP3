<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UsersGetFullName extends TestCase
{
    protected $user;

    public function __construct()
    {

        $this->user = new App\Users();

    }


    /**
     * A basic functional test.
     * Get way from docs template.
     * 
     * @return $firstName $lastName
     */
    public function testGetFullName()
    {

        $this->assertEquals('Имя Фамилия', $this->user->getFullName('Имя', 'Отчество', 'Фамилия', 'root@localhost'));

    }
}
