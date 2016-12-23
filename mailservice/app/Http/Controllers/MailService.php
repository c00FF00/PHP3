<?php

namespace App\Http\Controllers;

use App;
use App\MailQueue;
use App\Mail\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class MailService extends Controller
{
    public function index()
    {
        $validCommand = 'commandPut';

        $data = json_decode(file_get_contents('php://input'));
        
        if ($data->command == $validCommand) {

            $email = new MailQueue();

            $email->message_id = $data->message_id;

            $email->message_body = $data->message_body;

            $email->message_pattern = $data->message_pattern;

            $email->user_name = $data->user_name;

            if ($this->isValidEmail($data->email_to)) {

                $email->email_to = $data->email_to;

            } else {

                return response()->json(['answer' => 'Error: E-mail is not valid.']);

            }

            try {

                $email->save();

                return response()->json(['answer' => '200']);

            } catch (Exception $e) {

                return response()->json(['answer' => $e->getMessage()]);

            }

        } else {

            return response()->json(['answer' => 'Error: Service does not handles this request.']);
        }
    }

    public function send()
    {
        $data = json_decode(file_get_contents('php://input'));

        $validCommand = 'commandSend';

        if ($validCommand == $data->command) {

            $recipients = MailQueue::where('status', 'expect')->get();

            foreach ($recipients as $recipient) {

                if (false == $this->isExistPattern($recipient->message_pattern) || false == $this->isValidEmail($recipient->email_to)) {

                    $recipient->status = 'error';

                    $recipient->save();

                } else {

                    Mail::to($recipient->email_to)->send(new Message($recipient->user_name, $recipient->message_body, $recipient->message_pattern));

                    $recipient->status = 'sent';

                    $recipient->save();

                }

            }

        }

    }


    public function isExistPattern($pattern)
    {

        return view()->exists('email.' . $pattern);

    }

    public function isValidEmail($email)
    {

        return filter_var($email, FILTER_VALIDATE_EMAIL);

    }


}
