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
        $feathers = Entry::where("category", "=", "0")->get();
        $heavies = Entry::where("category", "=", "1")->get();
        return view("index")->with(["feathers" => $feathers, "heavies" => $heavies]);
    }

}
