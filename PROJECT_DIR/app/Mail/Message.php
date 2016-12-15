<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Message extends Mailable
{
    use Queueable, SerializesModels;

    public $username;
    public $body;
    public $pattern;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($username, $body, $pattern)
    {
        $this->username = $username;
        $this->body = $body;
        $this->pattern = $pattern;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.' . $this->pattern);
    }
}
