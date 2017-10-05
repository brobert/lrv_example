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

        parent::__construct();
        $this->middleware('auth');

    }

    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */
    public function index( Request $request ) {

        $debug_data = get_class_methods( $request );
        \asort($debug_data);

        $this->set_data('this_methods', $request->session() );

        $this->set_view('home');
        return $this->render('home');
    }
}
