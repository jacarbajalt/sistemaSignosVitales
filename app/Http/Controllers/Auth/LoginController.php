<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use GuzzleHttp\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
    public function username()
    {
        return 'username';
    }
    //Login por medio de una peticion post por username y password
    public function login(Request $request)
    {
        $this->validateLogin($request);

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('MyApp')->accessToken;
            //return response()->json(['token' => $token]);
            //Redirigir a la pagina de inicio
            return redirect()->intended('/home');
        } else {
            //return response()->json(['error' => 'Usuario o contraseña incorrectos'], 401);
            //Redirigir al login
            return redirect()->intended('/login');
        }
    }
    //Validar los datos de login
    public function validateLogin(Request $request)
    {
        return $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    }
}
