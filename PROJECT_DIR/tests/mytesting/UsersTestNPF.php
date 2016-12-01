<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UsersTestNPF extends TestCase
{
  
    public function testNamePatrFamily()
    {
        $this->assertEquals('Имя Отчество Фамилия', App\Users::detail('Имя', 'Отчество', 'Фамилия', 'root@localhost'));
    }
}
