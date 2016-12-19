<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Users;
use App\Mail\Message;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;


class MailController extends Controller
{

    public function index()
    {

        $datas = json_decode(file_get_contents('php://input'));

        $res = $datas->command;

        if ('commandSend' == $res) {

            $recipients = App\EmailToSend::where('status', 'expect')->get();

            foreach ($recipients as $recipient) {

                $recipientEmail = $recipient->find($recipient->id);

                try {

                    Mail::to($recipientEmail->emailto)->send(new App\Mail\Message($recipientEmail->user->name, $recipientEmail->bodymessage, $recipientEmail->emailpattern));
                    $recipientEmail->status = 'sent';
                    $recipientEmail->save();

                } catch (Exception $e) {

                    $recipientEmail->status = 'error';
                    $recipientEmail->save();
                    

                }

            }

        }

    }
}
