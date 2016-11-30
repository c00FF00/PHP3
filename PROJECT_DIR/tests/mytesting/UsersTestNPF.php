<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UsersTestNPF extends TestCase
{
    public function __construct()
    {
        $this->users = new App\Users();
    }

    public function testNamePatrFamily()
    {
        $this->assertEquals('Имя Отчество Фамилия', $this->users->find(2)->detail());
    }
}
