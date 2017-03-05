<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;

class ContactController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactFormRequest $request)
    {
        $data = [
        'name' => $request->get('name'),
        'email' => $request->get('email'),
        'user_message' => $request->get('message')
        ];

        \Mail::send('emails.contact', $data, function($message){
            $message->from(env('MAIL_FROM'));
            $message->to(env('MAIL_FROM'), env('MAIL_NAME'));
            $message->subject('WeDewLawns.com inquiry');

        });

        return \Redirect::route('contact')->with('message', 'Thanks for contacting us');
    }
}
