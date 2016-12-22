<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller as BaseController;
use App\MailQueue;
use Mockery\CountValidator\Exception;

class MailQueueService extends BaseController
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

            return response()->json(['answer' => '200']);

        }


    }


    public function isValidEmail($email)
    {

        return filter_var($email, FILTER_VALIDATE_EMAIL);

    }
}
