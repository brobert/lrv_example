<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\Models\User;

class UserController extends Controller
{

    public function __construct() {

        parent::__construct();

        $this->base = 'user';
    }

    public function user_list( Request $request ) {

        $this->set_view('list');

        $sort_by = $request->input('sort')?: 'name';
        $sort_dir = $request->input('dir')?: 'asc';

        $user = new User();

        $this->set_data( 'sort', [
            'name' => $sort_by === 'name'? $sort_dir === 'asc'? 'desc': 'asc' : 'asc',
            'surName' => $sort_by === 'surName'? $sort_dir === 'asc'? 'desc': 'asc' : 'asc',
            'email' => $sort_by === 'email'? $sort_dir === 'asc'? 'desc': 'asc' : 'asc',
        ]);
        $this->set_data( 'users', $user->orderBy( $sort_by, $sort_dir )->get() );

        return $this->render();
    }
}
