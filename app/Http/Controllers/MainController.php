<?php

namespace App\Http\Controllers;


class MainController extends Controller
{


    public function __construct()
    {
        $this->base = 'main';
    }

    public function index()
    {
        $this->set_data( 'title', 'Laravel examples - dashboard');
        $this->set_view('index');

        return $this->render();
    }

    public function logout() {
        return redirect('/');
    }
}