<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * przechowuje dane dla widoku lub odpowiedzi
     * @var $data
     */
    private $data = [];

    private $view = false;

    protected $base = false;

    protected function set_data( $key, $value)
    {
        $this->data[ $key ] = $value;
    }

    protected function get_data()
    {
        return $this->data;
    }

    protected function set_view( $view_path )
    {
        if ( $this->base )
        {
            $view_path = $this->base . '.' . $view_path;
        }

        if ( ! view()->exists( $view_path ) ) {
            throw ModelNotFoundException();
        }
        $this->view = $view_path;
    }

    protected function get_view()
    {
        return $this->view;
    }

    protected function render()
    {
        return view( $this->get_view(), $this->get_data() );
    }
}
