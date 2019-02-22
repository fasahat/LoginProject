<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;
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
    public function __construct(User $user)
    {
        $this->middleware('guest')->except('logout');
    }

    public function index() {
        return view('Login.login');
    }
    public function getUser() {
        return User::get();
    }
    public function login(Request $request,Input $input){
//        $user = User::where('email', '=', $request->get('email'))->where('password', '=', $request->get('password'))->get();

        switch ($request->input('action')) {
            case 'Login':
                $user = User::where('email', '=', $input->get('email'))->where('password', '=', $input->get('password'))->get();

                if (!$user->isEmpty()){
                    Session::put('User_Login','Yes');
                    Session::put('User_ID',$user->toArray()[0]['id']);

                    return redirect()->route('showProfile');

                }
                return view('Login.login');

            case 'SignUpُ':

                $insertedUser = User::insert([
                    'name' =>'',
                    'email' => $request->input('email'),
                    'password' => $request->input('password')
                ]);
                if ($insertedUser == true ) {
                    return view('Login.login');
                } else {
                    dd($insertedUser);
                }
        }
        return view('Login.login');

    }

    public function showProfile(){
        return view('profile.profile');
    }
}
