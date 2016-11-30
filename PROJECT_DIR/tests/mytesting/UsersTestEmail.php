<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UsersTestEmail extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function __construct()
    {
        $this->users = new App\Users();
    }

    public function testEmail()
    {
        $this->assertEquals('root@localhost', $this->users->detail('', 'Отчество','Фамилия', 'root@localhost'));
    }
}
