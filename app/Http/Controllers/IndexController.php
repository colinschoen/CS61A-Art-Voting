<?php namespace App\Http\Controllers;

use App\Entry;

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
        $feather = Entry::where("category", "=", "0")->get();
        $heavy = Entry::where("category", "=", "1")->get();
        return view("index")->with(["feather" => $feather, "heavy" => $heavy]);
    }

}
