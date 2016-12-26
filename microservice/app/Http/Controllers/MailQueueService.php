<?php

namespace App\Http\Controllers;

use App\MailQueue;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;


class MailQueueService extends Controller
{
    public function index()
    {
        $message = MailQueue::all()->where('status', 'expect');

        return response()->json(['answer' => $message]);
    }

    public function showstatus($status)
    {
        $message = MailQueue::all()->where('status', $status);

        return response()->json(['answer' => $message]);
    }
    
    public function show($id)
    {
        $message = MailQueue::findorFail($id);

        return response()->json(['answer' => $message]);
    }

    public function update(Request $request, $id)
    {

        $message = MailQueue::findorFail($id);

        $message->status = $request->status;

        try {

            $message->save();

            return response()->json(['answer' => '200']);

        } catch (\Exception $e) {

            return response()->json(['answer' => $e->getCode()]);

        }

    }

    public function create(Request $request)
    {
        $validCommand = 'commandPut';

        if ($request->command == $validCommand) {

            $email = new MailQueue();

            $email->message_id = $request->message_id;

            $email->message_body = $request->message_body;

            $email->message_pattern = $request->message_pattern;

            $email->user_name = $request->user_name;

            if ($this->isValidEmail($request->email_to)) {

                $email->email_to = $request->email_to;

            } else {

                return response()->json(['answer' => 'Error: e-mail is not valid.']);
            }

            try {

                $email->save();

                return response()->json(['answer' => '200']);

            } catch (\Exception $e) {

                return response()->json(['answer' => $e->getCode()]);

            }

        } else {

            return response()->json(['answer' => 'Error: unknown command.']);
        }
    }

    protected function isValidEmail($email)
    {

        return filter_var($email, FILTER_VALIDATE_EMAIL);

    }

}
