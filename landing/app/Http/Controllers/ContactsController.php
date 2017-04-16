<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ContactUserRequest;
use App\Mail\UserContactMessage;
use Mail;

class ContactsController extends Controller
{
    public function __construct(){
        return $data = ['title' => 'contact us'];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     return view('site.contacts.index');
 }

 public function sendMail(ContactUserRequest $request){



     $data = [
     "to" => 'kokolina18@abv.bg',
     "from" => $request->email,
     'name'=>$request->name,
     "content" =>$request->text,

     ];


     Mail::send('site.email', $data, function($m) use($data) { 
        $m->from($data['from']);
        $m->to($data['to']);
    });



     return back()->withSuccess('Thank you for your message. It has been send.');
            //mail
 }
 // public function sendEmailReminder(Request $request, $id)
 //    {
 //        $user = User::findOrFail($id);

 //        Mail::send('emails.reminder', ['user' => $user], function ($m) use ($user) {
 //            $m->from('hello@app.com', 'Your Application');

 //            $m->to($user->email, $user->name)->subject('Your Reminder!');
 //        });
 //    }
//TO DO USER CAN SEND MAIL ONLY AFTER LOGIN

}
