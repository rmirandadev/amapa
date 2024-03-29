<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\UserSystem;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    protected function credentials(Request $request)
    {
        return [
            'email' => request()->email,
            'password' => request()->password,
            'status' => 1
        ];
    }

    protected function authenticated(Request $request, $user)
    {
        Auth::logoutOtherDevices(request('password'));

        $user->monitor()->create([
            'ip'            => UserSystem::get_ip(),
            'browsers'      => UserSystem::get_browsers(),
            'os'            => UserSystem::get_os(),
            'device'        => UserSystem::get_device(),
        ]);
    }

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

}
