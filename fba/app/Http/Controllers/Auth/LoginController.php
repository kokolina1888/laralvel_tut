<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Socialite;
use App\User;
use Auth;

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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $data = Socialite::driver('facebook')->stateless()->user();
        $user =  User::where('email', $data->email)->first();
        
    if (!is_null($user)) {
        Auth::login($user);
        $user->name = $data->user['name'];
        $user->facebook_id = $data->user['id'];
        $user->save();
    } else {

        $user = User::where('facebook_id', $data->user['id'])->first();

        if (is_null($user)) {
            // Create a new user
            $user = new User();
            $user->name = $data->user['name'];
            $user->email = $data->email;
            $user->facebook_id = $data->user['id'];
            $user->save();
        }

       
    }


    Auth::login($user);
    \Session::flash('msg', 'Changes Saved.' );

    return view('home');
       

        // $user->token;
    }
}
