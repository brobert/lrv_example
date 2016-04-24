<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Auth;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Support\Facades\Input as Input;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    /**
     * AuthController::__construct()
     *
     * @return
     */
    public function __construct()
    {
        parent::__construct();
        $this->base = 'auth';
        $this->middleware('guest', ['only' => 'login']);

//         $this->middleware('auth', ['except' => 'logout']);
    }

    /**
     * AuthController::login()
     *
     * @return
     */
    public function login() {

        $email      = Input::get( 'email' );
        $password   = Input::get( 'password' );

        if ( Auth::attempt( [ 'email' => $email, 'password' => $password ] ) ) {
            return redirect()->action('HomeController@index')->with('message_error', trans( 'auth.ok' ) );


        }
        return redirect()->action('Auth\AuthController@showLoginForm')->with('message_success', trans( 'auth.failed' ));

    }

    public function showRegistrationForm() {

        $this->set_view('register');
        return $this->render();
    }

    /**
     * AuthController::logout()
     *
     * @return
     */
    public function logout() {
        Auth::logout();
        return redirect( $this->redirectTo );
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    /**
     * AuthController::validator()
     *
     * @param mixed $data
     * @return
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'          => 'required|alpha|max:255',
            'secondName'    => 'alpha|max:255',
            'surName'       => 'required|alpha|max:255',
            'role'          => 'required|in:developer,admin,agency,parent',
            'email'         => 'required|email|max:255|unique:users',
            'password'      => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    /**
     * AuthController::create()
     *
     * @param mixed $data
     * @return
     */
    protected function create(array $data)
    {
        return User::create([
            'name'          => $data['name'],
            'secondName'    => $data['secondName'],
            'surName'       => $data['surName'],
            'role'          => $data['role'],
            'email'         => $data['email'],
            'password'      => bcrypt($data['password']),
        ]);
    }
}
