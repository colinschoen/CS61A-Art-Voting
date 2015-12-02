<?php namespace App\Http\Controllers;

class AdminController extends Controller {

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
     * Serve the admin page to the user
     *
     * @return Response
     */
    public function get_admin()
    {
        return view("admin.index");
    }

}
