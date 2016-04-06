<?php

namespace App\Http\Controllers\Resources;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Resource extends Controller
{

    /**  GET|HEAD
     *   Resource@index
     */
    public function index() {
        return $this->renderJson();
    }


    /**  POST
     *   Resource@store
     */
    public function store(  Request $request  ) {

        $this->set_data('all', $request->all() );
        return $this->renderJson();
    }

    /**  GET|HEAD
     *   Resource@create
     */
    public function create(  Request $request ) {

    }


    /**  PUT|PATCH
     *   Resource@update
     */
    public function update( Request $request, $id ) {

    }

    /**  GET|HEAD
     *   Resource@show
     */
    public function show(  Request $request, $id  ) {

    }

    /**  DELETE
     *   Resource@destroy
     */
    public function destroy(  Request $request, $id  ) {

    }

    /**  GET|HEAD
     *   Resource@edit
     */
    public function edit(  Request $request, $id  ) {

    }




}
