<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;

use App\Models\User;


class HomeController extends Controller {
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */
    public function index() {
        $this->set_data( 'user', User::all() );
        $this->set_view('home');
        return $this->render('home');
    }
}
