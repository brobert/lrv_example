<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 *
 * @author rb5169
 * @package WorklogController
 */
class WorklogController extends Controller {
    //
    protected $base = 'worklog';

    public function index() {
        $this->set_view('index');
        return $this->render();
    }
}
