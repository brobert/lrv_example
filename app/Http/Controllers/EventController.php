<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EventController extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index( Request $request) {
        return $this->render('home');
    }
}
