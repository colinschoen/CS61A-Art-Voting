<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//GET
Route::get('/', ["as" => "index", "uses" => "IndexController@get_index"]);
Route::get('winners', ["as" => "winners", "uses" => "IndexController@get_winners"]);
//POST
Route::post('/', ["as" => "submitvote", "uses" => "IndexController@post_submit_vote"]);


//Admin Routes
    //GET
//    Route::get('admin', ["as" => "admin", "uses" => "AdminController@get_admin"]);
//    Route::get('admin/entries', ["as" => "adminentries", "uses" => "AdminController@get_admin"]);
//    Route::get('admin/entry/edit/{id}', ["as" => "adminentryedit", "uses" => "AdminController@get_entry_edit"]);
//    Route::get('admin/results', ["as" => "adminresults", "uses" => "AdminController@get_admin"]);
    //POST
//    Route::post('admin/entries/new', ["as" => "adminresultnew", "uses" => "AdminController@post_entry_new"]);
//    Route::post('admin/entry/edit/{id}', ["as" => "adminentryeditsave", "uses" => "AdminController@post_entry_edit"]);


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
