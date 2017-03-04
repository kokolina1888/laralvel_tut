<?php

namespace Sim\Http\Controllers\Auth;

use Sim\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = 'backend/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
        
    }

    public function login(Request $request)
    {
       //dd($request['email']);


        $this->validate($request, [
            'email'     =>'required|email',
            'password'  => 'required']);

       if (!Auth::attempt(['email'=>$request['email'], 'password'=>$request['password']])) {
            return redirect()->back()->with(['fail'=>'could not log you in']);
        } else {
        
                return redirect()->route('backend.dashboard');
            }
    }
   
}
