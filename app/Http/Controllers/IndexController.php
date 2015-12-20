<?php namespace App\Http\Controllers;

use App\Entry;
use Request;
use App\Vote;
use DB;

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
     * Serve the winners page to the user
     *
     * @return Response
     */
    public function get_winners()
    {
        //Let's get our results
        $featherResults = DB::table("votes")
            ->join("submissions", "votes.submission", "=", "submissions.id")
            ->select(DB::raw("votes.submission as id, submissions.image as image, submissions.title as title, submissions.name as name, submissions.tokens as tokens, submissions.code as code, submissions.body as body, count(*) as total"))
            ->where("submissions.category", "=", 0) //<-- This is for feather weight
            ->groupBy("submission")
            ->orderBy(DB::raw("total"), "DESC")
            ->take(3) //<-- We only  care about the top 3 winners
            ->get();
        $heavyResults = DB::table("votes")
            ->join("submissions", "votes.submission", "=", "submissions.id")
            ->select(DB::raw("votes.submission as id, submissions.image as image, submissions.title as title, submissions.name as name, submissions.tokens as tokens, submissions.code as code, submissions.body as body, count(*) as total"))
            ->where("submissions.category", "=", 1) //<-- This is for heavy weight
            ->groupBy("submission")
            ->orderBy(DB::raw("total"), "DESC")
            ->take(3) //<-- We only  care about the top 3 winners
            ->get();
        return view("winners")->with(["featherResults" => $featherResults, "heavyResults" => $heavyResults]);
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
