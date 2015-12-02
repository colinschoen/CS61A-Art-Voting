<?php namespace App\Http\Controllers;

use App\Entry;
use Request;
use App\Vote;

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

    /**
     * Process a submit vote request
     *
     * @return int
     */
    public function post_submit_vote()
    {
        $email = Request::input('inputEmail');
        $feather = Request::input('inputFeather');
        $heavy = Request::input('inputHeavy');
        $f = Entry::findOrFail($feather);
        $h = Entry::findOrFail($heavy);
        $json = file_get_contents("https://ok-server.appspot.com/enrollment?email=" . $email);
        $courses = json_decode($json);
        $enrolled = false;
        foreach ($courses as $course) {
            if ($course->year == 2015 && $course->term == "fall") {
                $enrolled = true;
            }
        }
        if (!$enrolled)
            return 2;
        //Check to see if they have already submitted a vote
        $submissionsCount = Vote::where("email", "=", $email)->count();
        if ($submissionsCount > 0)
            return 1;
        //Ok all clear. Create their new votes
        $vote = new Vote;
        $vote->submission = $feather;
        $vote->email = $email;
        $vote->save();
        $vote2 = new Vote;
        $vote2->submission = $heavy;
        $vote2->email = $email;
        $vote2->save();
        //All clear
        return 0;
    }

}
