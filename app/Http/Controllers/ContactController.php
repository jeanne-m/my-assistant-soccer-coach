<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * Display the contact page
     *
     * @return Response
     */
    public function index()
    {
        return view('contact');
    }

    /**
     * Send the message and display the confirmation
     *
     * @param Request $request Request object
     *
     * @return Response
     */
    public function send(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'subject' => 'required',
            'content' => 'required',
            'spam' => 'size:0'
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('contact')->withErrors($validator)->withInput();
        }

        // Send the email
        \Mail::send(
            'emails.contact', $request->all(), function ($message) {
                $message->from(\Request::input('email'));
                $message->to(env('MAIL_TO'));
                $message->subject('[MYASC.CLUB] ' . \Request::input('subject'));
            }
        );
        return redirect()->route('contact')->withMessage('Your message has been sent.')->withInput();
    }
}
