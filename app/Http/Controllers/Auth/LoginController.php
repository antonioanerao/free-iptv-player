<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        if (!empty(session('login'))) {
            return redirect(route('index'));
        } else {
            return view('auth.login');
        }
    }

    public function login() {
        $data = request()->all();
        $path = env('IPTV_URL').':'.env('IPTV_PORT').'/'.env('IPTV_PLAYER_API').'?username='
            .$data['login'].'&password='.request('password');

        $json = file_get_contents($path);

        $json = json_decode($json, true);

        if($json['user_info']['auth'] == 1){
            if($json['user_info']['status'] == "Active") {
                request()->session()->put('authenticated', time());
                request()->session()->put('login', $json['user_info']['username']);
                request()->session()->put('password', $json['user_info']['password']);
                return redirect()->intended('home');
            } else {
                return back()->with('error', 'Your account has expired');
            }
        } else {
            return back()->with('error', 'Invalid account or password');
        }
    }
}
