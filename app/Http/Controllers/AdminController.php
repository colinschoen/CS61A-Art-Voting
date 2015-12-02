<?php namespace App\Http\Controllers;
use App\Entry;
use Request, Validator;

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
        $entries = Entry::orderBy("category", "ASC");
        return view('admin')->with(["entries" => $entries]);
    }

    public function post_entry_new() {
        $input = Request::all();
        $image = Request::file('inputImage');
        //Start some validation
        $validator = Validator::make([
            "email" => $input["inputEmail"],
            "category" => $input["inputCategory"],
            "image" => $image,
        ], [
            "email" => "required|email",
            "category" => "required|in:0,1",
            "image" => "required|image",
        ]);
        //Run our validator
        if ($validator->fails())
        {
            return redirect()->route('adminresults')->withErrors($validator);
        }
        //Ok all of our validation is complete and we can now log this checkin
        $entry = new Entry;
        $entry->email = $input["inputEmail"];
        $entry->category = $input["inputCategory"];
        $imageExtension = $image->getClientOriginalExtension();
        $entry->image = $id . "." . $imageExtension;
        //Save our new checkin
        $entry->save();
        //Use our ID as our image name
        $id = $entry->id;
        //We need to retain the original extension the user used.
        $image->move(public_path() . "/artwork", $entry->image);
        return redirect()->route("adminresults")->with("message", "Entry added successfully.");
    }
}
