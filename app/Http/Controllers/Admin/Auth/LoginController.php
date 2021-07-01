<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

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
    protected $redirectTo = RouteServiceProvider::ADMIN;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    protected function authenticated(Request $request, $user) {
        return $user;
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * gruadの認証方式を決める
     *
    */
    public function gaurd()
    {
        return Auth::guard('admin');
    }

    protected function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        Auth::attempt(['email' => $email, 'password' => $password]);
        // セッションから全データを削除す
        session()->flush();

        return $this->loggedOut($request);
    }

    protected function loggedOut(Request $request)
    {
        // セッションを再生成する
        $request->session()->regenerate();

        return response()->json();
    }

    /**
     * Validate the user login request.
     * usename() -> emailがリターンされる。それをバリデーションに記述
     * http://program-memo.com/archives/646
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|email',
            'password' => 'required|string',
        ]);
    }

}
