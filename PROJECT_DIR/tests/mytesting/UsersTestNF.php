<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UsersTestNF extends TestCase
{
    public function __construct()
    {
        $this->users = new App\Users();
    }

    public function testNameFamily()
    {
        $this->assertEquals('Имя Фамилия', $this->users->detail('Имя', '', 'Фамилия', 'root@localhost'));
    }
}
