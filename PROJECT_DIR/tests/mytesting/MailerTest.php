<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

require_once __DIR__ . '/../../app/Mail/Mailer.php';

class MailerTest extends TestCase
{
    protected $reflector;
    protected $mailer;

    public function __construct()
    {

        $this->mailer = new Mailer('localhost', 25);
        $this->reflector = new ReflectionMethod($this->mailer, 'validateEmail');
        $this->reflector->setAccessible(true);

    }

    public function testEmail()
    {

        $this->assertEquals('root@localhost.ru', $this->reflector->invokeArgs($this->mailer, ['root@localhost.ru']));

    }

}
