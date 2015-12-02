<?php namespace App\Http\Controllers;

class IndexController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Index Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders the Index Area for the application
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Serve the index page to the user
     *
     * @return Response
     */
    public function get_index()
    {
        return view("index");
    }

}
