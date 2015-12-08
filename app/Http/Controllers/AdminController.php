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
        $entries = Entry::orderBy("category", "ASC")->get();
        return view('admin.index')->with(["entries" => $entries]);
    }

    public function get_entry_edit($id)
    {
        $entry = Entry::findOrFail($id);
        return view('admin.entry_edit')->with(["entry" => $entry]);
    }

    public function post_entry_edit($id) {
        $entry = Entry::findOrFail($id);
        $input = Request::all();
        $image = Request::file('inputImage');
        //Start some validation
        $validator = Validator::make([
            "name" => $input["inputName"],
            "email" => $input["inputEmail"],
            "tokens" => $input["inputTokens"],
            "category" => $input["inputCategory"],
            "image" => $image,
            "title" => $input["inputTitle"],
        ], [
            "name" => "required",
            "email" => "required|email",
            "category" => "required|in:0,1",
            "image" => "image",
            "title" => "required",
        ]);
        //Run our validator
        if ($validator->fails())
        {
            return redirect()->route('adminentryedit', $id)->withErrors($validator);
        }
        //Ok all of our validation is complete and now we can update the entry
        $entry->name = $input["inputName"];
        $entry->tokens = $input["inputTokens"];
        $entry->code = $input["inputCode"];
        $entry->email = $input["inputEmail"];
        $entry->category = $input["inputCategory"];
        $entry->title = $input["inputTitle"];
        $entry->body = $input["inputBody"];
        //Save our new checkin
        $entry->save();
        //Are we uploading a new image?
        if (Request::hasFile('inputImage')) {
            $imageExtension = $image->getClientOriginalExtension();
            $entry->image = $entry->id . "." . $imageExtension;
            $entry->save();
            //Use our ID as our image name
            //We need to retain the original extension the user used.
            $image->move(public_path() . "/artwork", $entry->image);
        }
        return redirect()->route("adminentryedit", $id)->with("message", "Entry saved successfully.");
    }
    public function post_entry_new() {
        $input = Request::all();
        $image = Request::file('inputImage');
        //Start some validation
        $validator = Validator::make([
            "email" => $input["inputEmail"],
            "category" => $input["inputCategory"],
            "image" => $image,
            "title" => $input["inputTitle"],
        ], [
            "email" => "required|email",
            "category" => "required|in:0,1",
            "image" => "required|image",
            "title" => "required",
        ]);
        //Run our validator
        if ($validator->fails())
        {
            return redirect()->route('adminresults')->withErrors($validator);
        }
        $entry = new Entry;
        $entry->email = $input["inputEmail"];
        $entry->category = $input["inputCategory"];
        $entry->title = $input["inputTitle"];
        $entry->body = $input["inputBody"];
        //Save our new checkin
        $entry->save();
        $id = $entry->id;
        $imageExtension = $image->getClientOriginalExtension();
        $entry->image = $id . "." . $imageExtension;
        $entry->save();
        //Use our ID as our image name
        //We need to retain the original extension the user used.
        $image->move(public_path() . "/artwork", $entry->image);
        return redirect()->route("adminresults")->with("message", "Entry added successfully.");
    }
}
