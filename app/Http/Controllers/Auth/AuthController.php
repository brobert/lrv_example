<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

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
    public function __construct()
    {
        $this->base = 'auth';
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function login() {}

    public function logout() {
        return redirect( $this->redirectTo );
    }

    public function settings() {
        $this->set_view('settings');
        return $this->render();
    }

    public function tree()
    {
        return $this->_make_tree(10, 3);
    }

    private function _make_tree( $max_items, $deep) {

        $items_count = \rand(3, $max_items);

        $result = [];

        while ( $items_count !== 0 ) {
            $item = [ 'id' => 1, 'name' => 'name_1'];
            if ( $deep > 0 ) {
                $item['children'] = $this->_make_tree($max_items, $deep - 1);
            }
            $result[] = $item;
            $items_count--;
        }
        return $result;
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
