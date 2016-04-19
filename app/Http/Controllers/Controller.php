<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Auth;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * przechowuje dane dla widoku lub odpowiedzi
     * @var $data
     */
    private $data = [];

    private $breadCrumbs = [1,2,3];

    /**
     *
     * @var unknown
     */
    private $meta = [];

    /**
     *
     * @var unknown
     */
    private $req_status = 0;

    /**
     *
     * @var unknown
     */
    private $view = false;

    /**
     *
     * @var unknown
     */
    protected $base = false;


    public function __construct() {

//         parent::__construct();

        $this->set_data('user', Auth::user() );
    }


    /**
     *
     * @method set_data
     * Controller
     * @param unknown $key
     * @param unknown $value
     */
    protected function set_data( $key, $value)
    {
        $this->data[ $key ] = $value;
    }


    /**
     *
     * @method get_data
     * Controller
     */
    protected function get_data()
    {
        return $this->data;
    }


    /**
     *
     * @method set_view
     * Controller
     * @param unknown $view_path
     * @throws ModelNotFoundException
     */
    protected function set_view( $view_path )
    {
        if ( $this->base )
        {
            $view_path = $this->base . '.' . $view_path;
        }

        if ( ! view()->exists( $view_path ) ) {
            throw new \InvalidArgumentException('View not found');
        }
        $this->view = $view_path;
    }


    /**
     *
     * @method get_view
     * Controller
     */
    protected function get_view()
    {
        return $this->view;
    }


    /**
     *
     * @method render
     * Controller
     */
    protected function render()
    {
        // add breadcrumbs
        $this->set_data('breadCrumbs', $this->breadCrumbs );


        return view( $this->get_view(), $this->get_data() );
    }


    protected function get_meta()
    {
        return $this->meta;
    }


    protected function get_req_status()
    {
        return $this->req_status;
    }

    /**
     *
     * @method renderJson
     * Controller
     */
    protected function renderJson() {
        return response()->json([
            'data'      => $this->get_data(),
            'meta'      => $this->get_meta(),
            'status'    => $this->get_req_status()
        ]);
    }
}
