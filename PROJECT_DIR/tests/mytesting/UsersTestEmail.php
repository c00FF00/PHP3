<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UsersTestEmail extends TestCase
{

    public function testEmail()
    {
        $this->assertEquals('root@localhost', App\Users::detail('', 'Отчество','Фамилия', 'root@localhost'));
    }
}
